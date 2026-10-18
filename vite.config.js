import { defineConfig } from "vite";
import tailwindcss from "@tailwindcss/vite";
import fg from "fast-glob";
import path from "node:path";

function wordpressTemplateReload() {
  return {
    name: "ifh-wordpress-template-reload",
    hotUpdate({ file }) {
      // PHPの更新通知はCSS生成後の一度だけにする。
      if (file.endsWith(".php")) return [];
    },
    configureServer(server) {
      const boot = `${Date.now()}-${Math.random().toString(36).slice(2)}`;
      let revision = 0;
      let generation = 0;
      let pending = false;
      let timer;
      let queue = Promise.resolve();

      server.middlewares.use((req, res, next) => {
        const pathname = req.url?.split("?")[0];
        if (pathname !== "/__ifh_live/revision" && pathname !== "/__ifh_live/client.js") return next();
        res.setHeader("Cache-Control", "no-store");
        if (pathname === "/__ifh_live/revision") {
          res.setHeader("Content-Type", "application/json");
          res.end(JSON.stringify({ revision: `${boot}:${revision}`, ready: !pending }));
          return;
        }
        res.setHeader("Content-Type", "text/javascript");
        res.end(`let seen;
let checking = false;
async function check() {
  if (checking) return;
  checking = true;
  try {
    const response = await fetch('/__ifh_live/revision', { cache: 'no-store', signal: AbortSignal.timeout(5000) });
    if (!response.ok) return;
    const state = await response.json();
    if (!state.ready) return;
    if (seen !== undefined && seen !== state.revision) location.reload();
    seen = state.revision;
  } catch {} finally { checking = false; }
}
check();
setInterval(check, 1500);
document.addEventListener('visibilitychange', () => { if (!document.hidden) check(); });
`);
      });

      const reload = (file) => {
        if (!file.endsWith(".php")) return;
        pending = true;
        const current = ++generation;
        clearTimeout(timer);
        timer = setTimeout(() => {
          queue = queue.then(async () => {
            if (current !== generation) return;
            // PHP内の新しいTailwindクラスを生成してから更新を通知する。
            const graph = server.environments.client.moduleGraph;
            const cssUrls = new Set(["/src/style.css"]);
            const sourceRoot = path.resolve(server.config.root, "src") + path.sep;
            for (const module of graph.idToModuleMap.values()) {
              if (module.type === "css" && module.file?.startsWith(sourceRoot)) {
                graph.invalidateModule(module);
                cssUrls.add(module.url);
              }
            }
            await Promise.all([...cssUrls].map((url) => server.transformRequest(url)));
            if (current !== generation) return;
            revision += 1;
            pending = false;
            server.ws.send({ type: "full-reload", path: "*" });
          }).catch((error) => {
            if (current === generation) pending = false;
            server.config.logger.error(`WordPress live reload: ${error.message}`);
          });
        }, 200);
      };
      server.watcher.on("change", reload);
      server.watcher.on("add", reload);
      server.watcher.on("unlink", reload);
      server.httpServer?.once("close", () => clearTimeout(timer));
    },
  };
}

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
    plugins: [tailwindcss(), wordpressTemplateReload()],
    server: {
      host: wordpressProxyTarget ? "0.0.0.0" : "localhost",
      port: 5173,
      strictPort: true,
      cors: true,
      allowedHosts: hmrHost ? [hmrHost] : undefined,
      origin: hmrHost ? `https://${hmrHost}` : undefined,
      watch: {
        usePolling,
        interval: usePolling ? Number(process.env.CHOKIDAR_INTERVAL || 1000) : undefined,
        ignored: ["**/media/**", "**/dist/**", "**/MyBrain/**"],
      },
      hmr: hmrHost
        ? {
            host: hmrHost,
            clientPort: Number(process.env.VITE_HMR_CLIENT_PORT || 443),
            protocol: "wss",
            path: "/__vite_hmr",
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
