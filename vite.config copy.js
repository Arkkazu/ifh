import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig(({ mode }) => ({
  base: mode === "development" ? "/" : "/wp-content/themes/ifh_theme/dist/",
  plugins: [tailwindcss()],
  server: {
    host: "localhost",
    port: 5173,
    cors: true, // WordPress側からアクセスできるようにCORSを有効化（重要）
  },
  build: {
    outDir: "dist",
    rollupOptions: {
      input: {
        main: "./src/main.js",
        style: "./src/style.css", // 追加
      },
      output: {
        // ファイル名にハッシュをつけない（assets フォルダは維持）
        entryFileNames: `assets/[name].js`,
        chunkFileNames: `assets/[name].js`,
        assetFileNames: `assets/[name].[ext]`,
      },
    },
  },
}));
