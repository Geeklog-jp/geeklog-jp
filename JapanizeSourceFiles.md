# Introduction #

本家版から追加・修正する日本語化ファイルリストとその概要。

日本語化でどのような修正が行われているか概要を確認するためのリストです。


# Details #

| **携帯ハック** | | | |
|:--------------------|:|:|:|
|ファイル名（パス）|内容|リビジョン|備考|
|public\_html/lib-common.php|修正|- |- |
|system/lib-sessions.php|修正|- |- |
|system/custom/custom\_cellular.php|追加|- |- |
|public\_html/layout/theme/mobile/|追加|- |- |
|public\_html/layout/theme/mobile\_3g/|追加|- |- |
| **lib-custom.php** | | | |
|ファイル名（パス）|内容|リビジョン|備考|
|system/lib-custom.php|修正|- |携帯カスタム関数読み込み追加　phpblock\_showrights()注意|
| **siteconfig.php** | | | |
|ファイル名（パス）|内容|リビジョン|備考|
|public\_html/siteconfig.php|修正|- |エンコードをutf-8|
| **インストーラ** | | | |
|ファイル名（パス）|内容|リビジョン|備考|
|public\_html/admin/install/index.php|修正|- |- |
|public\_html/admin/install/disable-userconfig.php|追加|- |- |
| **テーマ** | | | |
|ファイル名（パス）|内容|リビジョン|備考|
|public\_html/layout/professional/header.thtml|修正|- |日本語エンコードutf-8指定追加|
|public\_html/layout/professional/style.css|修正|- |@charset　"utf-8";とfont-family追加|
|public\_html/layout/professional/admin/story/storyeditor\_advanced.thtml|修正|[r335](https://code.google.com/p/geeklog-jp/source/detail?r=335)|記事エディタのテキストエリアの幅を90%に設定|
|public\_html/layout/professional/functions.php|修正|- |Validateを通るように修正|
|public\_html/layout/professional/loginform\_openid.thtml|修正|[r327](https://code.google.com/p/geeklog-jp/source/detail?r=327)|Validateを通るように修正|
|public\_html/layout/すべてのテーマ/admin/story/(any).japanese\_utf-8.php追加l|修正|- |日付を日本語化|
| **日本語化プラグイン追加** | | | |
|ファイル名（パス）|内容|リビジョン|備考|
|plugins/japanize/|追加|- |- |
|public\_html/admin/plugins/japanize/|追加|- |- |
|public\_html/japanize/|追加|- |- |
|system/lib-portalparts.php|追加|- |（インストール時に存在チェックされる）|