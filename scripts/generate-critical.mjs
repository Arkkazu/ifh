import { generate } from "critical";
import fs from "node:fs";
import path from "node:path";

// =========================
// 基本設定
// =========================
const ROOT_DIR = process.cwd();
const BASE_URL = process.env.CRITICAL_BASE_URL || "http://localhost:8080/";
const OUT_DIR = path.resolve(ROOT_DIR, "dist/critical");
const CSS_PATH = path.resolve(ROOT_DIR, "dist/assets/style.css");
const NAME = process.env.CRITICAL_NAME || "front-page";

// class を抽出したいテンプレート
const SCAN_FILES = (process.env.CRITICAL_SCAN_FILES || "inc-header.php")
  .split(",")
  .map((s) => s.trim())
  .filter(Boolean);

// 動的 class など、静的抽出できないものだけ必要に応じて追加
const EXTRA_FORCE = (process.env.CRITICAL_FORCE_SELECTORS || "")
  .split(",")
  .map((s) => s.trim())
  .filter(Boolean);

// 複数ビューポートで critical 生成
const VIEWPORTS = [
  { name: "sp", width: 375, height: 812 },
  { name: "md", width: 768, height: 1024 },
  { name: "pc", width: 1272, height: 1080 },
];

// =========================
// 汎用関数
// =========================
function readFileSafe(filePath) {
  try {
    return fs.readFileSync(filePath, "utf8");
  } catch (_) {
    return "";
  }
}

function ensureDir(dirPath) {
  fs.mkdirSync(dirPath, { recursive: true });
}

function unique(arr) {
  return Array.from(new Set(arr));
}

function escapeCssSelector(value) {
  return value.replace(/([!"#$%&'()*+,./:;<=>?@[\\\]^`{|}~])/g, "\\$1");
}

function stripCssComments(css) {
  return css.replace(/\/\*[\s\S]*?\*\//g, "");
}

function removeFontFaceRules(css) {
  return css.replace(/@font-face\s*\{[\s\S]*?\}\s*/g, "");
}

function normalizeCss(css) {
  return removeFontFaceRules(stripCssComments(css))
    .replace(/\r\n/g, "\n")
    .replace(/\n{3,}/g, "\n\n")
    .trim();
}

// 単純な重複除去
function mergeCssChunks(chunks) {
  const seen = new Set();
  const out = [];

  for (const chunk of chunks) {
    const normalized = normalizeCss(chunk);
    if (!normalized) continue;
    if (seen.has(normalized)) continue;
    seen.add(normalized);
    out.push(normalized);
  }

  return out.join("\n\n");
}

// =========================
// PHP/HTML テンプレートから class 値を抽出
// =========================
function collectClassTokensFromFiles(files) {
  const classTokens = new Set();
  const classAttrRE = /class\s*=\s*(["'])([\s\S]*?)\1/g;

  for (const relPath of files) {
    const absPath = path.resolve(ROOT_DIR, relPath);
    const content = readFileSafe(absPath);
    if (!content) continue;

    let match;
    while ((match = classAttrRE.exec(content)) !== null) {
      const raw = (match[2] || "").trim();
      if (!raw) continue;

      raw
        .split(/\s+/)
        .map((token) => token.trim())
        .filter(Boolean)
        .forEach((token) => {
          if (token.includes("<?") || token.includes("?>")) return;
          if (token.includes("<?=") || token.includes("<?php")) return;
          classTokens.add(token);
        });
    }
  }

  return Array.from(classTokens);
}

function collectSelectorsFromFiles(files) {
  const tokens = collectClassTokensFromFiles(files);
  return tokens.map((token) => `.${escapeCssSelector(token)}`);
}

// =========================
// CSS からフォールバックルール抽出
// =========================

// 通常ルール抽出
function extractSimpleRulesForSelectors(cssText, selectors) {
  if (!cssText || !selectors.length) return "";

  const results = [];
  const seen = new Set();

  for (const selector of selectors) {
    const escaped = selector.replace(/[.*+?^${}()|[\]\\]/g, "\\$&");
    const ruleRE = new RegExp(`([^{}]*${escaped}[^{}]*)\\{([^{}]*)\\}`, "g");

    let match;
    while ((match = ruleRE.exec(cssText)) !== null) {
      const rule = `${match[1]}{${match[2]}}`.trim();
      if (!seen.has(rule)) {
        seen.add(rule);
        results.push(rule);
      }
    }
  }

  return results.join("\n");
}

// @media ブロックを中括弧対応で抽出
function extractMediaBlocks(cssText) {
  const blocks = [];
  let i = 0;

  while (i < cssText.length) {
    const mediaStart = cssText.indexOf("@media", i);
    if (mediaStart === -1) break;

    const firstBrace = cssText.indexOf("{", mediaStart);
    if (firstBrace === -1) break;

    let depth = 0;
    let end = firstBrace;

    for (; end < cssText.length; end++) {
      const ch = cssText[end];
      if (ch === "{") depth++;
      if (ch === "}") {
        depth--;
        if (depth === 0) {
          end++;
          break;
        }
      }
    }

    blocks.push(cssText.slice(mediaStart, end));
    i = end;
  }

  return blocks;
}

function extractResponsiveMediaRules(cssText, selectors) {
  if (!cssText || !selectors.length) return "";

  const mediaBlocks = extractMediaBlocks(cssText);
  const results = [];
  const seen = new Set();

  for (const block of mediaBlocks) {
    for (const selector of selectors) {
      if (!block.includes(selector)) continue;
      if (!seen.has(block)) {
        seen.add(block);
        results.push(block);
      }
      break;
    }
  }

  return results.join("\n");
}

function buildResponsiveSelectorSet(selectors) {
  const extra = [];

  for (const sel of selectors) {
    if (sel.startsWith(".max-") || sel.startsWith(".sp\\:") || sel.startsWith(".md\\:") || sel.startsWith(".lg\\:") || sel.startsWith(".pc\\:") || sel.startsWith(".2pc\\:")) {
      extra.push(sel);
    }
  }

  return unique(extra);
}

// =========================
// デバッグレポート
// =========================
function writeForceReport(reportPath, cssText, selectors) {
  const lines = selectors.map((sel) => {
    const hit = cssText.includes(sel);
    return `${hit ? "hit " : "miss"}\t${sel}`;
  });

  fs.writeFileSync(reportPath, lines.join("\n"), "utf8");
}

// =========================
// 1ビューポート分の critical 生成
// =========================
async function generateForViewport({ width, height, targetFile, forcedSelectors }) {
  await generate({
    src: BASE_URL,
    css: [CSS_PATH],
    width,
    height,
    inline: false,
    base: ROOT_DIR,
    target: { css: targetFile },
    penthouse: {
      forceInclude: forcedSelectors,
      timeout: 60000,
      renderWaitTime: 1200,
      blockJSRequests: false,
      keepLargerMediaQueries: true,
    },
  });

  return readFileSafe(targetFile);
}

// =========================
// メイン処理
// =========================
async function main() {
  ensureDir(OUT_DIR);

  if (!fs.existsSync(CSS_PATH)) {
    throw new Error(`CSS file not found: ${CSS_PATH}`);
  }

  const cssText = readFileSafe(CSS_PATH);
  if (!cssText) {
    throw new Error(`CSS file is empty or unreadable: ${CSS_PATH}`);
  }

  const targetFile = path.join(OUT_DIR, `${NAME}.css`);

  const selectorsFromFiles = collectSelectorsFromFiles(SCAN_FILES);
  const forcedSelectors = unique([...selectorsFromFiles, ...EXTRA_FORCE]).sort();

  console.log(`[critical] Generate '${NAME}' from: ${BASE_URL}`);
  console.log(`[critical] CSS source: ${CSS_PATH}`);
  console.log(`[critical] Scan files: ${SCAN_FILES.join(", ")}`);
  console.log(`[critical] forceInclude selectors: ${forcedSelectors.length}`);

  writeForceReport(path.join(OUT_DIR, `${NAME}.force-report.txt`), cssText, forcedSelectors);

  // 複数ビューポートで生成
  const generatedChunks = [];

  for (const viewport of VIEWPORTS) {
    const tempTarget = path.join(OUT_DIR, `${NAME}.${viewport.name}.tmp.css`);

    console.log(`[critical] viewport: ${viewport.name} (${viewport.width}x${viewport.height})`);

    const cssChunk = await generateForViewport({
      width: viewport.width,
      height: viewport.height,
      targetFile: tempTarget,
      forcedSelectors,
    });

    if (cssChunk.trim()) {
      generatedChunks.push(removeFontFaceRules(cssChunk));
    }

    if (fs.existsSync(tempTarget)) {
      fs.unlinkSync(tempTarget);
    }
  }

  // 通常ルール fallback
  const responsiveSelectors = buildResponsiveSelectorSet(forcedSelectors);
  const nonResponsiveSelectors = forcedSelectors.filter((sel) => !responsiveSelectors.includes(sel));
  const fallbackSimpleRules = extractSimpleRulesForSelectors(cssText, nonResponsiveSelectors);

  // レスポンシブ系 fallback
  const fallbackResponsiveMedia = extractResponsiveMediaRules(cssText, responsiveSelectors);

  const finalCss = mergeCssChunks([...generatedChunks, fallbackSimpleRules ? `/* fallback: simple rules */\n${fallbackSimpleRules}` : "", fallbackResponsiveMedia ? `/* fallback: responsive media rules */\n${fallbackResponsiveMedia}` : ""]);

  const cleanedFinalCss = removeFontFaceRules(finalCss);

  fs.writeFileSync(targetFile, `${cleanedFinalCss}\n`, "utf8");

  console.log(`[critical] Wrote: ${targetFile}`);
}

main().catch((err) => {
  console.error("[critical] Failed:", err?.stack || err?.message || err);
  process.exit(1);
});
