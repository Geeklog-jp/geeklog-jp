# ブランチとタグ #

Mercurialのブランチとタグを説明します。

## ブランチ ##

各ブランチは以下の目的のソースツリーのために使用します。

  * 通常の開発用
  * リリース用
  * 過去のバージョンの保守用
  * 実験的な開発目的用

リリース用と過去のバージョンの保守には明確な区別があるわけではありません。

| ブランチ名 | 内容の説明 | 担当 | 使用中 |
|:----------------|:----------------|:-------|:----------|
| default | 通常の開発用(Geeklog 2.0ベースの日本語版) | 開発者全員 | ◯ |
| geeklog-1.8.1-jp | Geeklog 1.8.1日本語版の保守用 | tacahi | ◯ |
| geeklog-1.8.0-jp | Geeklog 1.8.0日本語版の保守用 | tacahi | ◯ |
| geeklog-1.7.2-jp | Geeklog 1.7.2日本語版の保守用 | tacahi |  |
| geeklog-1.7.0-jp | Geeklog 1.7.0日本語版の保守用 | tacahi |  |
| geeklog-1.6.1-jp | Geeklog 1.6.1日本語版の保守用 | tacahi |  |
| geeklog-1.6.0-jp | Geeklog 1.6.0系の日本語版の保守用 | tacahi |  |
| geeklog-1.5.2-jp | Geeklog 1.5.2系の日本語版の保守用 | tacahi |  |
| geeklog-new-tree | Geeklog日本語版の通常版と拡張版の統合ツリーの開発用 | tacahi |  |
| geeklog-1.5.1-jp | Geeklog 1.5.1日本語通常版の保守用 | tacahi |  |
| geeklog-1.5.1-jp-extended | Geeklog 1.5.1日本語拡張版の保守用 | tacahi |  |
| geeklog-1.5.0-jp | Geeklog 1.5.0日本語通常版の保守用 | tacahi |  |
| geeklog-1.5.0-jp-extended | Geeklog 1.5.0日本語拡張版の保守用 | tacahi |  |
| geeklog-1.5.0-jp-extended-1.1 | Geeklog 1.5.0日本語拡張版1.1の保守 | tacahi |  |
| geeklog-1.5.0-extended-1.1 |  |  |  |
| geeklog-1.5-jp |  |  |  |
| geeklog-1-jp-extended | Geeklog 1.5.2sr4までの日本語拡張版の開発用 |  |  |
| geeklog-1-jp | Geeklog 1.5.2sr4までの日本語通常版の開発用 |  |  |
| geeklog-1.4.x | Geeklog 1.4日本語版の保守用 |  |  |
| plugins | プラグインの開発・保守用 |  |  |
| mystralkk | 実験的な開発用 | mystralkk |  |
| custom |  |  |  |
| Geeklog-1.x-language\_auto\_select | 言語自動選択の開発 | maruyo123 |  |
| geeklog-jp |  |  |  |
| Geeklog-1.x |  |  |  |
| geeklog-1.4.1-20080709 |  |  |  |


> 古いものはSubversionによるリポジトリの頃の名残と言えるものも少なくありません。

## タグ ##

> リリースと一時的なスナップショットを表します。リリースは必ずタグ付けしたソースツリーから行います。