import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import fg from "fast-glob";
import path from "node:path";

export default defineConfig(({ mode }) => {
  /* ─── ワイルドカードでエントリ収集 ─── */
  const patterns = ["./src/js/archive-*.js", "./src/js/single-*.js", "./src/js/page-*.js", "./src/js/front-*.js"];
  const files = fg.sync(patterns, { onlyFiles: true });
  const entries = Object.fromEntries(files.map((f) => [path.basename(f, ".js"), f]));
  const wordpressProxyTarget = process.env.VITE_WP_PROXY_TARGET;
  const hmrHost = process.env.VITE_HMR_HOST;
  const usePolling = process.env.CHOKIDAR_USEPOLLING === "true";

  /* ─── 共通エントリを追加 ─── */
  entries.main = "./src/main.js"; // 必須
  entries.style = "./src/style.css"; // 空 style.js が不要なら削除し main.js で import

  return {
    base: mode === "development" ? "/" : "/wp-content/themes/ifh_theme/dist/",
    plugins: [tailwindcss()],
    server: {
      host: wordpressProxyTarget ? "0.0.0.0" : "localhost",
      port: 5173,
      strictPort: true,
      cors: true,
      allowedHosts: hmrHost ? [hmrHost] : undefined,
      origin: hmrHost ? `http://${hmrHost}` : undefined,
      watch: {
        usePolling,
        interval: usePolling ? Number(process.env.CHOKIDAR_INTERVAL || 1000) : undefined,
        ignored: ["**/media/**", "**/dist/**", "**/MyBrain/**"],
      },
      hmr: hmrHost
        ? {
            host: hmrHost,
            clientPort: Number(process.env.VITE_HMR_CLIENT_PORT || 80),
            protocol: "ws",
          }
        : undefined,
      proxy: wordpressProxyTarget
        ? {
            "/": {
              target: wordpressProxyTarget,
              changeOrigin: false,
              bypass(req) {
                const vitePaths = [
                  "/@vite/",
                  "/@id/",
                  "/@fs/",
                  "/@react-refresh",
                  "/src/",
                  "/node_modules/",
                ];

                if (vitePaths.some((path) => req.url.startsWith(path))) {
                  return req.url;
                }
              },
              configure(proxy) {
                proxy.on("proxyReq", (proxyReq) => {
                  proxyReq.setHeader("X-Ifh-Vite", "1");
                });
              },
            },
          }
        : undefined,
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
