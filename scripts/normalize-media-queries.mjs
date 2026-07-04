import { readdir, readFile, writeFile } from "node:fs/promises";
import { fileURLToPath } from "node:url";
import path from "node:path";

const assetsDir = path.resolve(path.dirname(fileURLToPath(import.meta.url)), "../dist/assets");
const mediaRangePattern = /\(\s*width\s*(<=|>=|<|>)\s*([0-9]*\.?[0-9]+(?:px|rem|em)?)\s*\)/g;

const offsetValue = (value, amount) => {
  const match = value.match(/^([0-9]*\.?[0-9]+)(px)$/);

  if (!match) {
    return `calc(${value} ${amount > 0 ? "+" : "-"} 0.02px)`;
  }

  const nextValue = Number(match[1]) + amount;
  return `${Number(nextValue.toFixed(2))}${match[2]}`;
};

const toLegacyWidthQuery = (_match, operator, value) => {
  switch (operator) {
    case ">=":
      return `(min-width:${value})`;
    case "<=":
      return `(max-width:${value})`;
    case ">":
      return `(min-width:${offsetValue(value, 0.02)})`;
    case "<":
      return `(max-width:${offsetValue(value, -0.02)})`;
    default:
      return _match;
  }
};

const files = await readdir(assetsDir);
let replacements = 0;

for (const file of files.filter((name) => name.endsWith(".css"))) {
  const filePath = path.join(assetsDir, file);
  const css = await readFile(filePath, "utf8");
  const nextCss = css.replace(mediaRangePattern, (...args) => {
    replacements += 1;
    return toLegacyWidthQuery(...args);
  });

  if (nextCss !== css) {
    await writeFile(filePath, nextCss);
  }
}

console.log(`Normalized ${replacements} media query range(s).`);