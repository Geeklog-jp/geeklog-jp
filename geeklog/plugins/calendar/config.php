<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Calendar Plugin 1.0                                                       |
// +---------------------------------------------------------------------------+
// | config.php                                                                |
// |                                                                           |
// | Calendar plugin configuration file                                        |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                    |
// |          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net    |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com            |
// |          Dirk Haun         - dirk AT haun-online DOT de                   |
// |          Trinity Bays      - trinity93 AT steubentech DOT com             |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+
//
// $Id: config.php,v 1.8 2006/09/03 21:08:03 dhaun Exp $
// @@@@@2007/01/10 日本語化 文字コードに注意！
// 翻訳 by Ivy AT ivysoho.co.jp

$_CA_CONF['version']            = '1.0.0'; // Plugin Version

// Calendar Settings

//$_CONF['loginrequired'] = 0に設定した場合は
//投稿にログイン要求　1:要求　0:不要
$_CA_CONF['calendarloginrequired']   = 0; 

// イベント投稿承認作業　1:承認待ちリストで管理者が投稿承認作業　0:即投稿
$_CA_CONF['eventsubmission'] = 1;     // イベント投稿承認作業

/**
 * ヘッダメニューリンク　1:隠す　0:表示
 * 
 * @global array $_CA_CONF['hidecalendarmenu']
 */
$_CA_CONF['hidecalendarmenu']    = 0;

// カレンダー設定
$_CA_CONF['personalcalendars']     = 1;// 個人のカレンダー機能　1:有効　0:無効
$_CA_CONF['showupcomingevents']    = 1;// 新着イベント予定を表示　1:表示　0:非表示
$_CA_CONF['upcomingeventsrange']   = 90;//イベントブロックに行事予定を何日先まで表示するか

// イベントの種類
$_CA_CONF['event_types']           = 
    "記念日,約束,誕生日,打ち合わせ,セミナー,休日,会議,用事"
    .",個人の用事,電話,特別な行事,旅行,休暇"
;

// 時間制 12時間制 (am/pm) または 24時間制
$_CA_CONF['hour_mode'] = $_CONF['hour_mode']; 

// 所有者のユーザアカウントが削除されたとき　1:削除 0: Rootユーザに所有者が移る
$_CA_CONF['delete_event'] = 0;

// 新規作成の際のパーミッションのデフォルトを設定。
// 所有者、グループ、メンバ、ゲストユーザごとに、次の値を設定できます。
// 3 = R:閲覧 + E:編集(所有者、グループのみ)
// 2 = R:閲覧のみ
// 0 = どちらも許可しない
$_CA_CONF['default_permissions'] = array (3, 2, 2, 2);

// データベーステーブル名 - 変更禁止
$_TABLES['events']              = $_DB_table_prefix . 'events';
$_TABLES['eventsubmission']     = $_DB_table_prefix . 'eventsubmission';
$_TABLES['personal_events']     = $_DB_table_prefix . 'personal_events';

?>
