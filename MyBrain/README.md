# MyBrain — ifh_theme（案件固有ナレッジ）

WordPressテーマ `ifh_theme` の案件固有ルール・手順を置く場所。
共通Vault（`C:\AI\MyBrain`）には書かない案件専用の情報をここに集約する。

## このリポジトリの基本情報

- **gitルート**: `C:\docker-project\ifh\html\wp-content\themes\ifh_theme`（テーマそのものがリポジトリ）
- **リモート**: `git@github.com:Arkkazu/ifh.git`
- **デフォルトブランチ**: `main`
- **ビルド**: Vite 6 + Tailwind CSS v4（`npm run dev` / `npm run build`）
- **本番反映**: `main` へ push → GitHub Actions が自動デプロイ（詳細は [rules/deploy.md](rules/deploy.md)）

## rules

- [rules/deploy.md](rules/deploy.md) — 本番デプロイの仕組みと手順
