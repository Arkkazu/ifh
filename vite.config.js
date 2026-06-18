import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import fg from "fast-glob";
import path from "node:path";

export default defineConfig(({ mode }) => {
  /* ─── ワイルドカードでエントリ収集 ─── */
  const patterns = ["./src/js/archive-*.js", "./src/js/single-*.js", "./src/js/page-*.js", "./src/js/front-*.js"];
  const files = fg.sync(patterns, { onlyFiles: true });
  const entries = Object.fromEntries(files.map((f) => [path.basename(f, ".js"), f]));

  /* ─── 共通エントリを追加 ─── */
  entries.main = "./src/main.js"; // 必須
  entries.style = "./src/style.css"; // 空 style.js が不要なら削除し main.js で import

  return {
    base: mode === "development" ? "/" : "/wp-content/themes/ifh_theme/dist/",
    plugins: [tailwindcss()],
    server: {
      host: "localhost",
      port: 5173,
      cors: true,
    },
    build: {
      outDir: "dist",
      //manifest: true, // <-- この行を追加
      rollupOptions: {
        input: entries,
        output: {
          entryFileNames: "assets/[name].js",
          chunkFileNames: "assets/[name].js",
          assetFileNames: "assets/[name].[ext]",
        },
      },
    },
  };
});
