# Introduction #

TortoiseHgを活用すると、WYSIWYGでソースを管理できます。


# Details #

TortoiseHg http://tortoisehg.bitbucket.org/ が便利です。

Hg WorkbenchというGUIのツールが付属するのでこれを活用します。ディレクトリのプロパティで表示されます。

## 初期設定 ##
  * 中央リポジトリをローカルにclone

ソース:
Source - Checkout
hg clone https://＊＊＊＊
と表示されていますが、このhttps以降を指定します

ターゲット：
ローカルのディレクトリを指定します。


## ローカルリポジトリで作業 ##
  * 作業ディレクトリが最新になっていることを確認したうえで作業してください。
  * 必要に応じてリポジトリを「Pull」や「特定のリビジョンへ更新」。
  * ローカルで作業していた場合、「ローカルとマージ」で、最新リビジョンとマージします。

## ローカルリポジトリ内でコミット ##
  * 必要な回数コミット。

## push ##
  * 最後に中央リポジトリのリモートディレクトリへpush。

パスワードは 以下からのリンク先から取得してください。

Source - Checkout

To push your changes, authenticate with your Google Account and your generated googlecode.com password.