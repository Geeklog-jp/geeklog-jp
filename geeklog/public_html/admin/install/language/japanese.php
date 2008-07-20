<?php

###############################################################################
# japanese.php (EUC-JP)
# This is the on-installation english language page for GeekLog!
#
# Copyright (C) 2000-2006 by the following authors:
#
# Authors: Jason Whittenburg - jwhitten AT securitygeeks DOT com
#          Tony Bibbs        - tony AT tonybibbs DOT com
#          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net
#          Jason Whittenburg - jwhitten AT securitygeeks DOT com
#          Dirk Haun         - dirk AT haun-online DOT de|
#          Randy Kolenko     - randy AT nextide DOT ca
#          mystral-kk        - geeklog AT mystral-kk DOT net
#
###############################################################################
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

// IMPORTANT: DO NOT REMOVE '%s' from the messages below!

$LANG_CHARSET = 'euc-jp';

$LANG_INST = array(
	'and'      => ' と ',
    'welcome_title' => 'Geeklog %sのインストール', // %s=VERSION
	'php_required' => '<h1>PHP 4.1.0が必要です</h1>' . LB
	            . '<p>申し訳ありませんが，Geeklogを動かすには少なくともPHP 4.1.0が必要です。PHPをアップグレードするか，ホスティングサービス会社にアップグレードを依頼してください。</p>' . LB
				. '</body>' . LB . '</html>' . LB,
	'mysql_required' => '<h1>MySQL 3.23.2が必要です</h1>' . LB
	            . '<p>申し訳ありませんが，Geeklogを動かすには少なくともMySQL 3.23.2が必要です。MySQLをアップグレードするか，ホスティングサービス会社にアップグレードを依頼してください。</p>' . LB
				. '</body>' . LB . '</html>' . LB,
	'wc_msg1' => 'Geeklogのインストール(手順 1 / 2)',
	'wc_msg2' => 'Geeklogを選んでいただき，ありがとうございます。',
	'wc_msg3' => '2ステップでGeeklog %sを動かすことができます。', // %s=VERSION
	'wc_msg4' => '<strong>このスクリプトを実行する前にconfig.phpを編集してください。</strong>その後でこのスクリプトを使い，新規インストールの場合もアップグレードの場合も，データベース処理を行ってください。',
	'wc_msg5' => 'アップグレード',
	'wc_msg6' => 'インストールを始める前に，既存のGeeklogをアップグレードするなら，データベースとファイルシステム両方のバックアップを作成するのが重要です。<strong>このインストール用スクリプトはGeeklogデータベースを書き換えます。</strong>したがって，トラブルが起きてアップグレードをやり直す場合，元のデータベースのバックアップファイルが必要になります。<strong>ご注意ください</strong>！',
	'wc_msg7' => '次の画面で現在使用しているGeeklogのバージョンを正しく選択してください。このスクリプトは現在のバージョンから少しずつアップグレードしていきます（つまり，どの旧バージョンからでも直接バージョン %s にアップグレードできます）。', // %s=VERSION
	'wc_msg8' => 'このスクリプトでは，Geeklogのベータ版やリリース候補版(RC)からの<strong>アップグレードは行いません。</strong>',
	'wc_msg9' => '重要注意事項',
	'wc_msg10' => '<p><strong>注意1:</strong>　サイトのURL中に"public_html"が含まれないようにしてください。<a href="../../docs/install.html#public_html">インストール時の注意</a>の中のpublic_htmlの項を読み，インストールを続行する前に，サイトの設定を適切なものに変更してください。</p>',
	'wc_msg11' => '<p><strong>注意2:</strong>　<tt>php.ini</tt>で %s が設定されています。Geeklog本体はこの設定でもきちんと動作しますが，プラグインやアドオンの中には動作しないものがあります。そのようなプラグインをインストールする場合には，%s を設定して（Webサーバーを再起動して）ください。</p>' . LB
	            . '<p><tt>php.ini</tt>がどこにあるかわからない場合は，<a href="info.php">ここをクリックしてください</a>。</p>', // %s = warn_message, %s = help_message
	'wc_msg12' => 'インストールのオプション',
	'wc_msg13' => 'インストールの種類:',
	'wc_msg14' => 'Geeklogのconfig.phpのパス:',
	'wc_msg15' => 'ヒント:',
	'wc_msg16' => 'このファイルの完全なパスは，',
	'wc_msg17' => 'Geeklogのパスは次のようです：',
	'inst_option1' => 'MySQLで新規インストール',
	'inst_option2' => 'Microsoft SQLサーバで新規インストール',
	'inst_option3' => 'MySQLでアップグレード',
	'next' => '次へ >>',
	'back' => '<< 戻る',
	'error_title1' => 'Geeklogのインストール - エラー',
	'error_title2' => 'Geeklogのインストール - エラー',
	'error_not_path' => '<p><b>%s</b> はパスではありません。<br>Webサーバーのファイルシステムの中で，config.phpが存在するパスを入力してください。</p>', // %s = $_POST['geeklog_path']
	'error_wrong_path' => '<p>入力したパスにconfig.phpはありません: <b>%s</b><br>' . LB
	              . 'パスを確認して入力し直してください。ファイルシステムのルートから始まる絶対パスを指定してください。</p>' . LB, // %s = $_POST['geeklog_path']
	'error_table_exists' => '<p>Geeklogのテーブルがデータベース中に既に存在しています。考えられる理由としては，</p>' . LB
	           . '<ol>' . LB
			   . '<li>以前，インストールスクリプトを実行したことがある。<br>前回インストールしようとして，パスやURLの問題に遭遇した場合は，インストールスクリプトを再度実行する必要はありません。しかしながら，今回，インストールスクリプトを再実行したいなら，まず最初にGeeklogのテーブルを全部削除してください（あるいはデータベースをいったん削除してから，作成し直してください）。</li>' . LB
			   . '<li>本当はデータベースを（Geeklogの新バージョン用に）アップグレードしたいのに，最初の画面のドロップダウンメニューで「データベースのアップグレード」を選択していない。</li>' . LB
			   . '</ol>' . LB,
	'dbsettings_title1' => 'Geeklogのインストール: データベースの設定',
	'dbsettings_title2' => 'Geeklogのデータベースの設定(手順 2 / 2)',
	'dbsettings_text' => 'さて，必要なデータをデータベースに追加する準備が整いました。アップグレードするなら，現在のGeeklogのバージョンを下で選択してください。新規インストールなら，「次へ」というボタンをクリックするだけです。現時点でデータベースのバックアップを作成されていると思います（データベースが既に存在している場合）。まだなら，<strong>「次へ」をクリックする前に，バックアップを作成してください</strong>。間違いのないようにお願いします。',
	'version_dd1' => '<tr><td align="left"><b>データベースは既に最新のものになっています。</b>' . LB
	           . '<p>データベースは既に最新版になっているようです。たぶん，アップグレード用スクリプトを実行したことがあるのでしょう。再度アップグレードを実行する必要があるなら，まずバックアップファイルを使ってデータを復元してからにしてください。</td></tr>',
	'version_dd2' => '<tr><td align="right"><b>現在のGeeklogのバージョン:</b></td><td><select name="version">',
	'inno_db_supported' => '<tr><td align="left">'
	            . '<p>InnoDBテーブルを使用すると，（とても）大規模なサイトではパフォーマンスが改善される可能性がありますが，バックアップを作成するのが難しくなります。理解していないのなら，このオプションにチェックを入れないでください。</p>'
	            . '<input type="checkbox" name="innodb"> InnoDBテーブルを使用する'
				. '</td></tr>',
	'sc_title' => 'インストール完了',
	'sc_msg1' => 'Geeklog %s インストール完了!', // %s=VERSION
	'sc_msg2' => 'おめでとうございます。Geeklogのインストールに成功しました。下に表示されている情報もご覧ください。',
	'sc_msg3' => 'その後で，<a href="%s">ここをクリック</a>して，サイトのトップページへ移動し，<b>デフォルトの設定でログインしてください</b>。',
	'sc_msg4' => 'パーミッションのチェック',
	'sc_msg5' => 'Geeklogでは，書込可能にしなければならないファイルやディレクトリがあります。適切に設定されているかどうかを確認するには，<a href="check.php">このスクリプト</a>を使用してください。',
	'sc_msg6' => 'セキュリティ警告',
	'sc_msg7' => 'いったんサイトが稼働し始めたら，必ず<strong>installディレクトリ（<tt>{path_html}admin/install</tt>）を削除</strong>し，デフォルトの\'Admin\'アカウントの<strong>パスワードを変更してください</strong>。',
	'sc_msg8' => '<p><strong>注:</strong> セキュリティモデルが変更されたため，新サイトを管理する権限を持ったアカウントを作成しました。このアカウントのユーザ名は<b>NewAdmin</b>でパスワードは<b>password</b>です。</p>',
);

?>
