<?php

###############################################################################
# japanese_utf-8.php
# This is the Japanese language file for the Geeklog Static Page plugin!
#
# Copyright (C) 2001 Tony Bibbs
# tony@tonybibbs.com
# Tranlated by Geeklog Japanese group SaY and Ivy
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
# Last Update 2007/01/30 by Ivy (Geeklog Japanese)

global $LANG32;

###############################################################################
# Array Format:
# $LANGXX[YY]:	$LANG - variable name
#		  	XX - file id number
#			YY - phrase id number
###############################################################################

$LANG_STATIC = array(
    'newpage' => '新規ページ',
    'adminhome' => '管理画面',
    'staticpages' => '静的ページ',
    'staticpageeditor' => '静的ページの編集',
    'writtenby' => '所有者',
    'date' => '最終更新日',
    'title' => 'タイトル',
    'content' => '内容',
    'hits' => '閲覧件数',
    'staticpagelist' => '静的ページ管理',
    'url' => 'URL',
    'edit' => '編集',
    'lastupdated' => '最終更新日：',
    'pageformat' => 'レイアウト',
    'leftrightblocks' => 'ヘッダ・フッタ・左右ブロックあり',
    'blankpage' => '全画面表示（ヘッダ・フッタ・ブロックなし）',
    'noblocks' => 'ヘッダ・フッタあり（ブロックなし）',
    'leftblocks' => 'ヘッダ・フッタ・左ブロックあり（右ブロックなし）',
    'addtomenu' => 'ヘッダメニュー',
    'label' => 'メニュー名',
    'nopages' => '静的ページがありません',
    'save' => '保存',
    'preview' => 'プレビュー',
    'delete' => '削除',
    'cancel' => 'キャンセル',
    'access_denied' => '申し訳ありませんが，先にログインしてください。',
    'access_denied_msg' => 'チェックするとアクセス権限がない場合に画面が自動的に遷移してログイン画面が表示されます。チェックをしない場合には「権限がない」というメッセージが表示されます。',
    'all_html_allowed' => 'すべてのHTMLが利用できます。',
    'results' => '静的ページ検索結果',
    'author' => '所有者',
    'no_title_or_content' => '<b>タイトル</b>と<b>内容</b>を記入してください。',
    'no_such_page_anon' => 'ログインしてください。',
    'no_page_access_msg' => "この問題は，まだログインしていないか，そもそもこのサイト（{$_CONF["site_name"]}）のメンバーではないためだと考えられます。{$_CONF["site_name"]}に<a href=\"{$_CONF['site_url']}/users.php?mode=new\"> メンバー登録</a>するか，適切なアクセス権を管理者から取得してください。",
    'php_msg' => 'PHP: ',
    'php_warn' => '<br' . XHTML . '>注意：このオプションを有効にすると，あなたのページに含まれるPHPコードが実行されます。静的ページPHPを利用する場合には，あらかじめ管理画面「グループ:Static Page Admin」で，権限「staticpages.PHP」にチェックしてください。PHPを使う場合，通常(return)なしの「PHPを実行する」モードで利用します。利用には細心の注意を払ってください。',
    'exit_msg' => 'ログイン要求: ',
    'exit_info' => 'チェックすると，閲覧権限がない場合にログイン要求画面が表示されます。<br' . XHTML . '>　　　チェックをしない場合には「権限がない」というメッセージが表示されます。',
    'deny_msg' => 'ページへのアクセスは拒否されました。ページが移動または削除されたか，権限がないかのいずれかです。',
    'stats_headline' => '静的ページ（上位10件）',
    'stats_page_title' => 'タイトル',
    'stats_hits' => '閲覧数',
    'stats_no_hits' => '静的ページがないか，閲覧者がいないかのどちらかです。',
    'id' => 'ID',
    'duplicate_id' => '指定したIDはすでに使われています。別のIDをご使用ください。',
    'instructions' => 'ページを編集・削除は，各ページの先頭の編集アイコンをクリック。ページの閲覧は，タイトルをクリック。新しいページを作成する場合は「新規作成」リンクをクリック。ページのコピーは[C]をクリックしてください。',
    'centerblock' => 'センターエリア: ',
    'centerblock_msg' => 'チェックすると，トップページまたは話題のトップページのセンターエリアに表示されます。表示はIDでソートされます。',
    'topic' => '話題: ',
    'position' => '表示エリア: ',
    'all_topics' => 'すべて',
    'no_topic' => 'ホームページのみ',
    'position_top' => 'ページの最上部',
    'position_feat' => '注目記事の下',
    'position_bottom' => 'ページの下',
    'position_entire' => 'ページ全体',
    'head_centerblock' => 'トップ表示',
    'centerblock_no' => 'いいえ',
    'centerblock_top' => '上部',
    'centerblock_feat' => '注目記事',
    'centerblock_bottom' => '下部',
    'centerblock_entire' => 'ページ全体',
    'inblock_msg' => 'ブロックで囲む: ',
    'inblock_info' => 'タイトルが表示され，コンテンツがブロックで囲まれます。',
    'title_edit' => '編集',
    'title_copy' => 'コピーを作成',
    'title_display' => 'ページを表示する',
    'select_php_none' => 'PHPを実行しない',
    'select_php_return' => 'PHPを実行する (return)',
    'select_php_free' => 'PHPを実行する',
    'php_not_activated' => '静的ページでPHPは使用しない設定になっています。詳細については <a href="' . $_CONF['site_url'] . '/docs/staticpages.html#php">関連ドキュメント</a> をご覧下さい。',
    'printable_format' => '印刷用フォーマット',
    'edit' => '編集',
    'copy' => 'コピー',
    'limit_results' => '絞込検索',
    'search' => '検索',
    'submit' => '登録'
);


// Messages for the plugin upgrade
$PLG_staticpages_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_staticpages_MESSAGE3002 = $LANG32[9];


// Localization of the Admin Configuration UI
$LANG_configsections['staticpages'] = array(
    'label' => 'Static Pages',
    'title' => 'Static Pages Configuration'
);

$LANG_confignames['staticpages'] = array(
    'allow_php' => 'Allow PHP?',
    'sort_by' => 'Sort Centerblocks by',
    'sort_menu_by' => 'Sort Menu Entries by',
    'delete_pages' => 'Delete Pages with Owner?',
    'in_block' => 'Wrap Pages in Block?',
    'show_hits' => 'Show Hits?',
    'show_date' => 'Show Date?',
    'filter_html' => 'Filter HTML?',
    'censor' => 'Censor Content?',
    'default_permissions' => 'Page Default Permissions',
    'aftersave' => 'After Saving Page',
    'atom_max_items' => 'Max. Pages in Webservices Feed'
);

$LANG_configsubgroups['staticpages'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_fs['staticpages'] = array(
    'fs_main' => 'Static Pages Main Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, 9, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['staticpages'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    2 => array('Date' => 'date', 'Page ID' => 'id', 'Title' => 'title'),
    3 => array('Date' => 'date', 'Page ID' => 'id', 'Title' => 'title', 'Label' => 'label'),
    9 => array('Forward to page' => 'item', 'Display List' => 'list', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3)
);

?>
