# 本番デプロイ手順（ifh_theme）

最終確認: 2026-07-11

## 結論（通常はこれだけ）

**`main` ブランチに push すれば、GitHub Actions が自動で本番反映する。**

```powershell
git add -A
git commit -m "..."
git push origin main
```

- リモート: `git@github.com:Arkkazu/ifh.git`
- push すると `.github/workflows/deploy-production.yml` の `deploy` ジョブが `direct-deploy` モード・`dry_run=false` で走る。
- 実行状況は `gh run list` / `gh run watch <id>` で確認できる。所要 2分前後。

## 仕組み（GitHub Actions / deploy-production.yml）

- **トリガー**
  - `push` → `main`：自動で `direct-deploy`（dry_run=false、本番に実際に反映）
  - `workflow_dispatch`（手動実行）：`mode` と `dry_run` を選べる
    - `mode`: `direct-deploy` / `cleanup-theme-junk` / `repair-theme-options` / `diagnose-production`
    - `dry_run`: true で変更せずプレビューのみ
- **concurrency**: `deploy-production` グループで多重実行を防止（`cancel-in-progress: false`）
- **environment**: `production`（Secrets はこの environment にスコープ）
- **direct-deploy の流れ**
  1. Checkout（Git LFS 有効）
  2. Setup Node.js（`node-version: 22` + npm cache）
  3. `npm ci`
  4. `npm run build`（Vite ビルドで `dist/` 生成）
  5. Prepare SSH：`PROD_SSH_KEY` を `~/.ssh/deploy_key` に書き出し、`ssh-keyscan`
  6. **rsync `-az`** でテーマを本番 `PROD_PATH` へ同期
     - 除外: `.git/` `.github/` `node_modules/` `.env` `*.local`
     - `PROD_PATH` がシンボリックリンクなら実ディレクトリへ変換してから同期
  7. WordPress の有効テーマ option 修復（`template` / `stylesheet` を該当テーマ名に更新し、`theme_roots` 系キャッシュを削除）
     - 実行系のフォールバック順: SHORTINIT PHP → WP-CLI → 直接DB更新
  8. 本番 PHP OPcache リセット（一時 `.deploy-opcache-reset-*.php` を置いて curl 実行後に削除）
  9. Health check：`PROD_HEALTHCHECK_URL` に curl（`--retry 3`）

## Secrets（GitHub → Settings → Environments → production）

値はここには書かない（機密）。名前のみ:

- `PROD_HOST` / `PROD_PORT` / `PROD_USER` / `PROD_PATH`
- `PROD_SSH_KEY`（デプロイ用秘密鍵）
- `PROD_HEALTHCHECK_URL`（疎通確認 URL）

## 手動デプロイ（代替：ローカルの PowerShell スクリプト）

Actions を使わずローカルから直接送る手段も用意されている。リポジトリ外（親ディレクトリ）にある。

- スクリプト: `C:\docker-project\ifh\deploy-theme.ps1`
- 設定: `C:\docker-project\ifh\.deploy.local.json`（gitignore 済み、`sshHost` / `remoteThemeDir` 等。機密なのでコミットしない）
- 手順書: `C:\docker-project\ifh\DEPLOY.md`

```powershell
# ドライラン（アーカイブ作成のみ、アップロードしない）
powershell -ExecutionPolicy Bypass -File C:\docker-project\ifh\deploy-theme.ps1 -DryRun
# 本番反映（tar → scp → リモートで backup 作成後に展開）
powershell -ExecutionPolicy Bypass -File C:\docker-project\ifh\deploy-theme.ps1
# クリーンデプロイ（リモートを空にしてから展開。backup は取る）
powershell -ExecutionPolicy Bypass -File C:\docker-project\ifh\deploy-theme.ps1 -Clean
```

npm build → （php があれば）PHP 構文チェック → tar 圧縮 → scp → リモートで既存テーマを backup 後に展開 → `verifyUrls` を HEAD で疎通確認、という流れ。

## 注意点・ハマりどころ

- **デプロイされるのはテーマファイルのみ。DB（`wp_posts` 等）は同期されない。**
  ローカルで作った固定ページ（例: `upgrade` = アップグレードチケットLP）は、本番の WordPress 管理画面で**別途ページを作成**しないと表示されない。テンプレート（`page-{slug}.php`）だけ送っても中身のページレコードが無ければ 404。
- **`node-version: 22` はビルド用 Node**。Actions ログに出る「Node.js 20 is deprecated」警告は `actions/checkout@v4` / `actions/setup-node@v4` の**アクション実行ランタイム**（GitHub が Node 24 で強制実行）についてのもので、`node-version` 入力とは別物。警告解消には `uses:` のメジャーバージョンを上げる必要がある。
- **dev CSS の落とし穴**は共通メモリ [[dev-css-injection-fragile-to-js-errors]] を参照（本番は `<link>` 読み込みなので影響なし）。
