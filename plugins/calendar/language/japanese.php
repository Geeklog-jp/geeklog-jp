<?php

###############################################################################
# japanese.php
#
# This is the Japanese EUC language file for the Geeklog Calendar plugin
#
# Copyright (C) 2001 Tony Bibbs
# tony AT tonybibbs DOT com
# Copyright (C) 2005 Trinity Bays
# trinity93 AT gmail DOT com
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
# Last Update 2007/02/19 by Ivy (Geeklog Japanese)

global $LANG32;

###############################################################################
# Array Format:
# $LANGXX[YY]:  $LANG - variable name
#               XX    - file id number
#               YY    - phrase id number
###############################################################################

# index.php
$LANG_CAL_1 = array(
    1 => 'イベントカレンダ',
    2 => '-',
    3 => '日時',
    4 => '場所',
    5 => '詳細',
    6 => 'イベントの追加',
    7 => 'これからのイベント',
    8 => '個人カレンダにこのイベントを追加すると，「個人カレンダ」をユーザ管理メニューから選択することで見ることができます。',
    9 => '個人カレンダに追加',
    10 => '個人カレンダから削除',
    11 => "このイベントを %sの個人カレンダに追加",
    12 => 'イベント',
    13 => '開始',
    14 => '終了',
    15 => 'カレンダに戻る',
    16 => 'カレンダ',
    17 => '開始',
    18 => '終了',
    19 => 'イベントの登録申請',
    20 => 'タイトル',
    21 => '開始',
    22 => 'URL',
    23 => '個人イベント',
    24 => '全体イベント',
    25 => '-',
    26 => 'イベントを投稿しますか',
    27 => "{$_CONF['site_name']}にイベントを投稿すると，サイト全体のカレンダに登録されます。<br" . XHTML . ">全体カレンダのイベントは，各ユーザが必要に応じて個人カレンダに登録できます。",
    28 => 'タイトル',
    29 => '日時',
    30 => '日時',
    31 => '全日',
    32 => '住所1',
    33 => '住所2',
    34 => '市町村名',
    35 => '都道府県',
    36 => '郵便番号',
    37 => '種類',
    38 => 'イベントの種類を編集',
    39 => '場所',
    40 => 'イベントを追加：',
    41 => '全体カレンダ',
    42 => '個人カレンダ',
    43 => 'リンク',
    44 => 'HTMLタグは使用できません',
    45 => '投稿',
    46 => 'システムのイベント',
    47 => 'イベント上位10件',
    48 => '閲覧数',
    49 => 'このサイトにはイベントがないか，誰もイベントをクリックしていないかどちらかのようです。',
    50 => 'イベント',
    51 => '削除'
);

$_LANG_CAL_SEARCH = array(
    'results' => 'イベント情報の検索結果',
    'title' => 'タイトル',
    'date_time' => '日時',
    'location' => '場所',
    'description' => '詳細'

);

###############################################################################
# calendar.php ($LANG30)

$LANG_CAL_2 = array(
    8 => '個人のイベントを追加',
    9 => '%s イベント',
    10 => 'イベント：',
    11 => '全体カレンダ',
    12 => '個人カレンダ',
    25 => '戻る：',
    26 => '全日',
    27 => '週',
    28 => '個人カレンダ：',
    29 => '全体カレンダ',
    30 => 'イベントを削除',
    31 => '追加',
    32 => 'イベント',
    33 => '日付',
    34 => '時間',
    35 => '簡単追加',
    36 => '投稿',
    37 => 'このサイトでは，個人カレンダを有効にしていません。',
    38 => '個人イベントエディタ',
    39 => '日',
    40 => '週',
    41 => '月',
    42 => '全体イベントを追加',
    43 => 'イベント投稿',
);

###############################################################################
# admin/plugins/calendar/index.php, formerly admin/event.php ($LANG22)

$LANG_CAL_ADMIN = array(
    1 => 'イベントエディタ',
    2 => 'エラー',
    3 => '投稿モード',
    4 => 'URL',
    5 => '開始',
    6 => '終了',
    7 => '場所',
    8 => '詳細',
    9 => '(http://から始めてください)',
    10 => 'イベントの日付・時間，タイトル，詳細を入力してください。',
    11 => 'カレンダ管理',
    12 => 'イベントの編集・削除は，下のイベントの編集アイコンをクリックしてください。新しいイベントを作る場合，上の「新規イベント」をクリックしてください。コピーを作る場合は既存イベントのコピーアイコンをクリックしてください。',
    13 => '投稿者',
    14 => '時間',
    15 => '時間',
    16 => '',
    17 => "管理権限のないイベントを編集しようとしました。この行為は記録されました。<a href=\"{$_CONF['site_admin_url']}/plugins/calendar/index.php\">イベント編集画面</a>に戻ってください。",
    18 => '',
    19 => '',
    20 => '保存',
    21 => 'キャンセル',
    22 => '削除',
    23 => '開始日時をただしく入力してください。',
    24 => '終了日時をただしく入力してください。',
    25 => '終了日時をただしく入力してください。',
    26 => '古いイベントの削除',
    27 => '以下のリストは ',
    28 => ' ヶ月以上前のイベントです。 これらを削除する場合はゴミ箱アイコンをクリックしてください。または、異なる期間を選択してください：<br' . XHTML . '> ',
    29 => ' ヶ月以上前のイベントを検索します。',
    30 => 'リストの更新',
    31 => '選択したユーザを本当に削除してもよろしいですか?',
    32 => '全てのリスト',
    33 => '削除対象のイベントが選択されていません。',
    34 => 'イベント ID',
    35 => '削除できませんでした。',
    36 => '削除したイベント'
);

$LANG_CAL_MESSAGE = array(
    'save'      => 'イベントが保存されました。',
    'delete'    => 'イベントが削除されました。',
    'private'   => 'イベントが個人カレンダに保存されました。',
    'login'     => '個人カレンダを開くには，最初にログインしてください。',
    'removed'   => '個人カレンダからイベントが削除されました。',
    'noprivate' => '申し訳ありませんが，このサイトでは，個人カレンダが無効です。',
    'unauth'    => '申し訳ありませんが，イベント管理ページにアクセスする権限がありません。このアクセスは記録させていただきましたのでご了承ください。',
);

$PLG_calendar_MESSAGE4  = "{$_CONF['site_name']}にイベントを投稿していただき，ありがとうございます。スタッフに送信され，承認待ちの状態になりました。承認された場合，このサイトの<a href=\"{$_CONF['site_url']}/calendar/index.php\">カレンダ</a>セクションに表示されます。";
$PLG_calendar_MESSAGE17 = 'イベントが保存されました。';
$PLG_calendar_MESSAGE18 = 'イベントが削除されました。';
$PLG_calendar_MESSAGE24 = 'イベントが個人カレンダに保存されました。';
$PLG_calendar_MESSAGE26 = 'イベントが削除されました。';

// Messages for the plugin upgrade
$PLG_calendar_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_calendar_MESSAGE3002 = $LANG32[9];

// Localization of the Admin Configuration UI
$LANG_configsections['calendar'] = array(
    'label' => 'Calendar',
    'title' => 'Calendar Configuration'
);

$LANG_confignames['calendar'] = array(
    'calendarloginrequired' => 'Calendar Login Required?',
    'hidecalendarmenu' => 'Hide Calendar Menu Entry?',
    'personalcalendars' => 'Enable Personal Calendars?',
    'eventsubmission' => 'Enable Submission Queue?',
    'showupcomingevents' => 'Show upcoming Events?',
    'upcomingeventsrange' => 'Upcoming Events Range',
    'event_types' => 'Event Types',
    'hour_mode' => 'Hour Mode',
    'notification' => 'Notification Email?',
    'delete_event' => 'Delete Events with Owner?',
    'aftersave' => 'After Saving Event',
    'default_permissions' => 'Event Default Permissions'
);

$LANG_configsubgroups['calendar'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_fs['calendar'] = array(
    'fs_main' => 'General Calendar Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, 6, 9, 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['calendar'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    6 => array('12' => '12', '24' => '24'),
    9 => array('Forward to Event' => 'item', 'Display Admin List' => 'list', 'Display Calendar' => 'plugin', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3)
);

?>
