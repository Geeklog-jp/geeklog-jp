<?php

###############################################################################
# japanese_utf-8.php
#
# This is the Japanese language file for the Geeklog Links Plugin
#
# Copyright (C) 2001 Tony Bibbs
# tony AT tonybibbs DOT com
# Copyright (C) 2005 Trinity Bays
# trinity93 AT gmail DOT com
# Tranlated by Geeklog Japanese group
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
# $Id: japanese_utf-8.php,v 1.30 2008/03/17 21:12:54 dhaun Exp $
# Last Update 2008/01/01 by Ivy (Geeklog Japanese)

/**
 * This is the english language page for the Geeklog links Plug-in!
 *
 * @package Links
 * @subpackage Language
 * @filesource
 * @version 2.0
 * @since GL 1.4.0
 * @copyright Copyright &copy; 2005-2007
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author Trinity Bays <trinity93 AT gmail DOT com>
 * @author Tony Bibbs <tony AT tonybibbs DOT com>
 * @author Tom Willett <twillett AT users DOT sourceforge DOT net>
 *
 */

global $LANG32;

###############################################################################
# Array Format:
# $LANGXX[YY]:    $LANG - variable name
#                 XX - file id number
#                 YY - phrase id number
###############################################################################

/**
* the link plugin's lang array
*
* @global array $LANG_LINKS
*/
$LANG_LINKS = array(
    10 => '投稿',
    14 => 'リンク',
    84 => 'リンク',
    88 => '新しいリンクはありません',
    114 => 'リンク',
    116 => 'リンクの追加',
    117 => 'Report Broken Link',
    118 => 'Broken Link Report',
    119 => 'The following link has been reported to be broken: ',
    120 => 'To edit the link, click here: ',
    121 => 'The broken Link was reported by: ',
    122 => 'Thank you for reporting this broken link. The administrator will correct the problem as soon as possible',
    123 => 'Thank you',
    124 => 'Go',
    125 => 'Categories',
    126 => 'You are here:',
    'root' => 'Root' // title used for top level category
);

###############################################################################
# for stats
/**
* the link plugin's lang stats array
*
* @global array $LANG_LINKS_STATS
*/
$LANG_LINKS_STATS = array(
    'links' => '登録されているリンク（クリック数）',
    'stats_headline' => 'リンク(上位10件)',
    'stats_page_title' => 'リンク',
    'stats_hits' => 'ヒット',
    'stats_no_hits' => 'このサイトにはリンクがないか，クリックした人がいないかのどちらかのようです。',
);

###############################################################################
# for the search
/**
* the link plugin's lang search array
*
* @global array $LANG_LINKS_SEARCH
*/
$LANG_LINKS_SEARCH = array(
 'results' => 'リンクの検索結果',
 'title' => 'タイトル',
 'date' => '追加した日時',
 'author' => '投稿者',
 'hits' => 'クリック数'
);

###############################################################################
# for the submission form
/**
* the link plugin's lang submit form array
*
* @global array $LANG_LINKS_SUBMIT
*/
$LANG_LINKS_SUBMIT = array(
    1 => 'リンクの登録',
    2 => 'リンク',
    3 => 'カテゴリ',
    4 => 'その他',
    5 => '新しいカテゴリ名',
    6 => 'エラー：カテゴリを選んでください',
    7 => '「その他」を選択する場合には新しいカテゴリ名を記入してください。',
    8 => 'タイトル',
    9 => 'URL',
    10 => 'カテゴリ',
    11 => 'リンクの登録申請'
);

###############################################################################
# Messages for COM_showMessage the submission form

$PLG_links_MESSAGE1 = "{$_CONF['site_name']}にリンク登録ありがとうございます。スタッフが内容を確認します。承認されたら<a href={$_CONF['site_url']}/links/index.php>リンク</a>セクションに表示されます。";
$PLG_links_MESSAGE2 = 'リンクは無事登録されました。';
$PLG_links_MESSAGE3 = 'リンクの削除が完了しました。';
$PLG_links_MESSAGE4 = "{$_CONF['site_name']}にリンク登録ありがとうございます。<a href={$_CONF['site_url']}/links/index.php>リンク</a>でご確認ください。";
$PLG_links_MESSAGE5 = "You do not have sufficient access rights to view this category.";
$PLG_links_MESSAGE6 = 'You do not have sufficient rights to edit this category.';
$PLG_links_MESSAGE7 = 'Please enter a Category Name and Description.';

$PLG_links_MESSAGE10 = 'Your category has been successfully saved.';
$PLG_links_MESSAGE11 = 'You are not allowed to set the id of a category to "site" or "user" - these are reserved for internal use.';
$PLG_links_MESSAGE12 = 'You are trying to make a parent category the child of it\'s own subcategory. This would create an orphan category, so please first move the child category or categories up to a higher level.';
$PLG_links_MESSAGE13 = 'The category has been successfully deleted.';
$PLG_links_MESSAGE14 = 'Category contains links and/or categories. Please remove these first.';
$PLG_links_MESSAGE15 = 'You do not have sufficient rights to delete this category.';
$PLG_links_MESSAGE16 = 'No such category exists.';

// Messages for the plugin upgrade
$PLG_links_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_links_MESSAGE3002 = $LANG32[9];

###############################################################################
# admin/link.php
/**
* the link plugin's lang admin array
*
* @global array $LANG_LINKS_ADMIN
*/
$LANG_LINKS_ADMIN = array(
    1 => 'リンクの編集',
    2 => 'ID',
    3 => 'タイトル',
    4 => 'URL',
    5 => 'カテゴリ',
    6 => '(http://を含む)',
    7 => 'その他',
    8 => 'リンクの参照',
    9 => '説明',
    10 => 'タイトル，URL，説明が必要です',
    11 => 'リンクの管理',
    12 => 'リンクを修正，削除する場合は各リンクの「編集」アイコンをクリックしてください。新規作成は上の「新規」をクリックしてください。',
    14 => 'カテゴリ',
    16 => 'アクセスが拒否されました',
    17 => "権限のないリンクにアクセスしようとしましたのでログに記録しました。<a href=\"{$_CONF['site_admin_url']}/plugins/links/index.php\">リンクの管理画面に戻って</a>ください。",
    20 => 'その他を指定',
    21 => '保存',
    22 => 'キャンセル',
    23 => '削除',
    24 => 'リンク先が見つかりません',
    25 => '編集対象のリンクが見つかりませんでした.',
    26 => 'リンクの確認',
    27 => 'HTMLステータス',
    28 => 'カテゴリの編集',
    29 => '以下の項目を入力または編集してください。',
    30 => 'カテゴリ',
    31 => '説明',
    32 => 'カテゴリID',
    33 => '話題',
    34 => '親カテゴリ',
    35 => 'すべて',
    40 => 'このカテゴリを編集する',
    41 => '子カテゴリを作成する',
    42 => 'このカテゴリを削除する',
    43 => 'サイトカテゴリ',
    44 => '追加&nbsp;子',
    46 => 'ユーザー %s は、アクセス権限がないカテゴリを削除しようとしました。',
    50 => 'カテゴリの一覧',
    51 => 'リンクの作成',
    52 => 'カテゴリの作成',
    53 => 'リンクの一覧',
    54 => 'カテゴリマネージャ',
    55 => '以下のカテゴリを編集してください。 Note that you cannot delete a category that contains other categories or links - you should delete these first, or move them to another category.',
    56 => 'カテゴリエディタ',
    57 => 'まだ確認されていません。',
    58 => 'リンクの確認',
    59 => '<p>表示されている全てのリンクを確認する場合は、下の「リンクの確認」をクリックしてください。この処理はリンクの数に応じてかなりの時間がかかるかもしれない点に注意してください。</p>',
    60 => 'ユーザ %s は権限なしにカテゴリ %s を編集しようとしました。'
);

$LANG_LINKS_STATUS = array(
    100 => "Continue",
    101 => "Switching Protocols",
    200 => "OK",
    201 => "Created",
    202 => "Accepted",
    203 => "Non-Authoritative Information",
    204 => "No Content",
    205 => "Reset Content",
    206 => "Partial Content",
    300 => "Multiple Choices",
    301 => "Moved Permanently",
    302 => "Found",
    303 => "See Other",
    304 => "Not Modified",
    305 => "Use Proxy",
    307 => "Temporary Redirect",
    400 => "Bad Request",
    401 => "Unauthorized",
    402 => "Payment Required",
    403 => "Forbidden",
    404 => "Not Found",
    405 => "Method Not Allowed",
    406 => "Not Acceptable",
    407 => "Proxy Authentication Required",
    408 => "Request Timeout",
    409 => "Conflict",
    410 => "Gone",
    411 => "Length Required",
    412 => "Precondition Failed",
    413 => "Request Entity Too Large",
    414 => "Request-URI Too Long",
    415 => "Unsupported Media Type",
    416 => "Requested Range Not Satisfiable",
    417 => "Expectation Failed",
    500 => "Internal Server Error",
    501 => "Not Implemented",
    502 => "Bad Gateway",
    503 => "Service Unavailable",
    504 => "Gateway Timeout",
    505 => "HTTP Version Not Supported",
    999 => "Connection Timed out"
);


// Localization of the Admin Configuration UI
$LANG_configsections['links'] = array(
    'label' => 'Links',
    'title' => 'Links Configuration'
);

$LANG_confignames['links'] = array(
    'linksloginrequired' => 'Links Login Required?',
    'linksubmission' => 'Enable Submission Queue?',
    'newlinksinterval' => 'New Links Interval',
    'hidenewlinks' => 'Hide New Links?',
    'hidelinksmenu' => 'Hide Links Menu Entry?',
    'linkcols' => 'Categories per Column',
    'linksperpage' => 'Links per Page',
    'show_top10' => 'Show Top 10 Links?',
    'notification' => 'Notification Email?',
    'delete_links' => 'Delete Links with Owner?',
    'aftersave' => 'After Saving Link',
    'show_category_descriptions' => 'Show Category Description?',
    'root' => 'ID of Root Category',
    'default_permissions' => 'Link Default Permissions'
);

$LANG_configsubgroups['links'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_fs['links'] = array(
    'fs_public' => 'Public Links List Settings',
    'fs_admin' => 'Links Admin Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['links'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    9 => array('Forward to Linked Site' => 'item', 'Display Admin List' => 'list', 'Display Public List' => 'plugin', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3)
);

?>
