# Mercurialの設定 #

プロジェクトのメンバーのためのMercurialの設定の手引きです。
(この文書は完全なものではありません。)


## 設定方法 ##

Mercurialの設定は、ソースコードを取り出す前に行ってください。

### 設定ファイルの編集の方法 ###

#### UNIX系OSの場合 ####

Mercurialの設定はホームディレクトリの`.hgrc`で行いますが、cloneしたローカルリポジトリで個別の設定も可能です。例えば、

```
% hg clone https://code.google.com/p/geeklog-jp/
```

としてcloneした場合は、カレントディレクトリの`geeklog-jp/.hg/hgrc`にローカルリポジトリに固有の設定ができます。(cloneした段階では`{hgrc`}のファイルはありません。)


## 設定ファイルの編集内容 ##

設定ファイルは`#`で始まる行はコメントです。`[ ]`で囲まれたセクションを示す行に続いて、各設定パラメータが = で名前と値を区切られた形で指定されています。

以下は必ずしも設定しなければならないわけではなく、いくつかのヒントの情報です。

### uiセクション ###

  * username
    * コミットに使用する自分のユーザー情報を設定します。

以下は例です。
```
[ui]
username = Geek Taro <user@example.jp>
```

### webセクション ###

HTTPS(SSL)でアクセスするときの認証局(CA)を設定します。

```
[web]
cacert = /etc/openssl/certs/cacert.pem
```

### パスワードの入力の省略 ###

以下の設定でパスワードの入力を省略できます。

```
[hostfingerprints]
code.google.com = e2:9e:46:29:a0:fd:3c:57:a0:68:30:c5:0a:45:97:63:bf:8d:75:fc

[auth]
googlecode.prefix = https://code.google.com/
googlecode.username = user
googlecode.password = himitsu
```

この場合、`~/.hgrc`やローカルリポジトリのhgrcファイルのアクセス権の設定に十分注意してください。

また、Google Codeを相手にする場合は`code.google.com`としてアクセスするホストによって、HTTPS(SSL)でアクセスするホストによって証明書の指紋(fingerprints)が異なって失敗する場合もあるようです。