<?php

/**
 * File: japanese_utf-8.php
 * This is the Japanese language file for the Geeklog Spam-X plugin
 * 
 * Copyright (C) 2004-2008 by the following authors:
 * Author        Tom Willett        tomw AT pigstye DOT net
 * Tranlated by Ivy (Geeklog Japanese)
 * Copyright (C) 2008 Takahiro Kambe
 * Additional translation to Japanese by taca AT back-street DOT net
 * Copyright (C) 2006,2007,2008 Geeklog.jp group
 * Additional translation to Japanese by Geeklog.jp group info AT geeklog DOT jp
 * 
 * Licensed under GNU General Public License
 *
 * $Id: japanese_utf-8.php,v 1.14 2008/09/09 18:26:18 dhaun Exp $
 */

global $LANG32;

$LANG_SX00 = array(
    'inst1' => '<p>これを行うと、他の人も ',
    'inst2' => 'あなたのパーソナルブラックリストを閲覧・インポートすることができ、さらに効果的な',
    'inst3' => 'データベースを作ることができます。</p><p>Webサイトを登録した後で、やはりリストから削除するには、',
    'inst4' => '<a href="mailto:spamx@pigstye.net">spamx@pigstye.net</a>にメールで連絡してください。',
    'inst5' => 'リクエストは尊重されます。',
    'submit' => '実行',
    'subthis' => 'このSpam-X情報をSpam-X Central Databaseに送信します。',
    'secbut' => '2番目のボタンをクリックすると、RDFフィードが作成され、あなたが作成したリストを他の人がインポートできるようになります。',
    'sitename' => 'サイト名:',
    'URL' => 'URL Spam-Xリスト:',
    'RDF' => 'RDF URL: ',
    'impinst1a' => 'Spam-Xコメントスパムブロック機能を使用して他のサイトのパーソナルブラックリストを閲覧・インポートする前に、',
    'impinst1b' => 'つぎの2つのボタンをクリックしてください(最後のボタンをクリックする必要があります)。',
    'impinst2' => '最初のボタンをクリックすると、あなたのサイトの情報がGplugs/Spam-Xサイトに送信され、ブラックリストを共有しているサイトのマスターリストに加えられます。',
    'impinst2a' => '(注: 複数のサイトがあるなら、その中の1つをマスターとして指定し、その名前だけを送信する必要があります。',
    'impinst2b' => 'こうすることで、サイトの更新が簡単になり、マスターリストもコンパクトになります。) ',
    'impinst2c' => '実行ボタンをクリックしたら、 Webブラウザの[戻る]をクリックしてこのページに戻ってください。',
    'impinst3' => '以下の内容が送信されます(間違いがあれば、編集することができます)。',
    'availb' => '利用可能なブラックリスト',
    'clickv' => 'クリックしてブラックリストを閲覧',
    'clicki' => 'クリックしてブラックリストをインポート',
    'ok' => 'OK',
    'rsscreated' => 'RSSフィードを作成しました',
    'add1' => '',
    'add2' => ' 個のエントリを ',
    'add3' => 'さんのブラックリストから追加しました。',
    'adminc' => '管理者コマンド:',
    'mblack' => 'マイブラックリスト:',
    'rlinks' => '関連リンク:',
    'e3' => 'Geeklogのバッドワード一覧から追加するには、ボタンをクリックしてください。',
    'addcen' => 'バッドワードリストを追加',
    'addentry' => 'エントリ追加',
    'e1' => 'クリックしてエントリを削除',
    'e2' => 'エントリを追加するには、入力してエントリ追加ボタンをクリックしてください。エントリは完全なPerl互換正規表現を使用することができます。',
    'pblack' => 'Spam-X パーソナルブラックリスト',
    'sfseblack' => 'Spam-X 掲示板のスパム防止のメールのブラックリスト',
    'conmod' => 'Spam-X モジュール設定',
    'acmod' => 'Spam-X アクションモジュール',
    'exmod' => 'Spam-X 検証モジュール',
    'actmod' => '有効になっているモジュール',
    'avmod' => '利用可能なモジュール',
    'coninst' => '<hr' . XHTML . '>クリックして有効になっているモジュールを削除、クリックして利用可能なモジュールを追加。<br' . XHTML . '>モジュールは、表示されている順序で実行されます。',
    'fsc' => 'マッチするスパム投稿を見つけました:',
    'fsc1' => ' 投稿ユーザ:',
    'fsc2' => ' IPアドレス:',
    'uMTlist' => 'MT-ブラックリストを更新',
    'uMTlist2' => ': 追加 ',
    'uMTlist3' => ' 投稿と削除 ',
    'entries' => ' 投稿',
    'uPlist' => 'パーソナルブラックリストを更新',
    'entriesadded' => 'エントリを追加しました',
    'entriesdeleted' => 'エントリを削除しました',
    'viewlog' => 'Spam-Xログ閲覧',
    'clearlog' => 'Spam-Xログファイル削除',
    'logcleared' => '- Spam-Xログファイルの内容を消去しました',
    'plugin' => 'プラグイン',
    'access_denied' => 'アクセスを拒否しました',
    'access_denied_msg' => 'rootユーザだけがこのページにアクセスできます。あなたのユーザ名とIPアドレスを記録しました。',
    'admin' => 'プラグイン管理',
    'install_header' => 'インストール/アンインストールプラグイン',
    'installed' => 'プラグインをインストールしました',
    'uninstalled' => 'プラグインをインストールしませんでした',
    'install_success' => 'インストールに成功',
    'install_failed' => 'インストールに失敗 -- エラーログを見て原因を調べてください。',
    'uninstall_msg' => 'プラグインをアンインストールしました',
    'install' => 'インストール',
    'uninstall' => 'アンインストール',
    'warning' => '警告! プラグインがまだ有効です',
    'enabled' => 'アンインストールする前に無効にしてください。',
    'readme' => 'ちょっと待って! インストールの前にインストールドキュメントをお読みください。',
    'installdoc' => 'インストールドキュメント。',
    'spamdeleted' => 'スパム投稿削除',
    'foundspam' => 'マッチするスパム投稿を見つけました:',
    'foundspam2' => ' 投稿ユーザ:',
    'foundspam3' => ' IPアドレス:',
    'deletespam' => 'スパム削除',
    'numtocheck' => 'チェックするコメント数',
    'note1' => '<p>注: 一括削除機能は、コメントスパムが投稿されたにもかかわらず、',
    'note2' => 'Spam-Xが検出できなかった場合の助けになるものです。</p><ul><li>ます最初に、このコメントスパムのリンクや識別子を見つけて',
    'note3' => 'パーソナルブラックリストに追加します。</li><li>',
    'note4' => '次に、ここに戻り、Spam-Xにスパムに対応する最新のコメントをチェックさせます。</li></ul><p>コメントが',
    'note5' => '新しいものから古いものへとチェックされます。チェックするコメントの数が増えれば増えるほど、',
    'note6' => '時間がかかります。</p>',
    'masshead' => '<hr' . XHTML . '><h1 align="center">スパムコメントを一括削除</h1>',
    'masstb' => '<hr' . XHTML . '><h1 align="center">トラックバックスパムを一括削除</h1>',
    'comdel' => 'コメントを削除しました。',
    'initial_Pimport' => '<p>パーソナルブラックリストのインポート"',
    'initial_import' => 'MT-ブラックリストの初期インポート',
    'import_success' => '<p> %d 個のブラックリストエントリをインポートしました。',
    'import_failure' => '<p><strong>エラー:</strong> エントリが1つもありません。',
    'allow_url_fopen' => '<p>申し訳ありませんが、あなたのWebサーバのコンフィギュレーションはリモートファイルの読み込みを許可していません。 (<code>allow_url_fopen</code> がオフ)。次のURLからブラックリストをダウンロードしてGeeklogの "data" ディレクトリにアップロードしてください。<tt>%s</tt>, 再実行の前に:',
    'documentation' => 'Spam-X プラグインドキュメント',
    'emailmsg' => "新しいスパム投稿 \"%s\"\nUser UID: \"%s\"\n\nコンテンツ: \"%s\"",
    'emailsubject' => 'スパム投稿: %s',
    'ipblack' => 'Spam-X IPアドレスのブラックリスト',
    'ipofurlblack' => 'Spam-X URLのIPアドレスのブラックリスト',
    'headerblack' => 'Spam-X HTTPヘッダのブラックリスト',
    'headers' => 'リクエストヘッダ:',

    'stats_headline' => 'Spam-X 統計',
    'stats_page_title' => 'ブラックリスト',
    'stats_entries' => 'エントリ',
    'stats_mtblacklist' => 'MT-ブラックリスト',
    'stats_pblacklist' => 'パーソナルブラックリスト',
    'stats_ip' => 'ブロックしたIPアドレス',
    'stats_ipofurl' => 'URLのIPアドレスによってブロックしました',
    'stats_header' => 'HTTPヘッダ',
    'stats_deleted' => 'スパム投稿削除数',

    'invalid_email_or_ip' => '不正なe-mailアドレスまたはIPアドレスをブロックしています。',
    'email_ip_spam' => '%s または %s の登録を試みますが、スパマーだと思われます。',
    'edit_personal_blacklist' => 'パーソナルブラックリストを編集',
    'mass_delete_spam_comments' => 'スパムコメントを一括削除',
    'mass_delete_trackback_spam' => 'トラックバックスパムを一括削除',
    'edit_http_header_blacklist' => 'HTTPヘッダブラックリストを編集',
    'edit_ip_blacklist' => 'IPアドレスブラックリストを編集',
    'edit_ip_url_blacklist' => 'URLのIPアドレスブラックリストを編集',
    'edit_sfs_blacklist' => '掲示板のスパム防止のEmailブラックリストを編集',
    'edit_slv_whitelist' => 'スパムリンク検証のホワイトリストを編集',

    'plugin_name' => 'Spam-X',
    'slvwhitelist' => 'スパムリンク検証のホワイトリスト'
);

// Define Messages that are shown when Spam-X module action is taken
$PLG_spamx_MESSAGE128 = 'スパムを検出。投稿を削除しました。';
$PLG_spamx_MESSAGE8 = 'スパムを検出。メールを管理者に送りました。';

// Messages for the plugin upgrade
$PLG_spamx_MESSAGE3001 = 'プラグインのアップグレードはサポートしていません。';
$PLG_spamx_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['spamx'] = array(
    'label' => 'Spam-X',
    'title' => 'Spam-Xの設定'
);

$LANG_confignames['spamx'] = array(
    'spamx_action' => 'Spam-Xアクション',
    'notification_email' => 'メールで通知',
    'logging' => 'ログを有効',
    'timeout' => 'タイムアウト',
    'sfs_enabled' => '掲示板のスパム防止を有効',
    'snl_enabled' => 'スパムリンク検証を有効',
    'snl_num_links' => 'リンク数'
);

$LANG_configsubgroups['spamx'] = array(
    'sg_main' => '主な設定'
);

$LANG_tab['spamx'] = array(
    'tab_main' => 'Spam-Xのメイン設定',
    'tab_modules' => 'モジュール'
);

$LANG_fs['spamx'] = array(
    'fs_main' => 'Spam-Xの設定',
    'fs_sfs' => '掲示板のスパム防止',
    'fs_snl' => 'スパムリンク検証'
);

// Note: entries 0, 1, 9, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['spamx'] = array(
    0 => array('はい' => 1, 'いいえ' => 0),
    1 => array('はい' => true, 'いいえ' => false)
);

?>
