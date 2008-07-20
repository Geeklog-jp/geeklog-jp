<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Polls Plugin 1.0                                                          |
// +---------------------------------------------------------------------------+
// | config.php                                                                |
// |                                                                           |
// | Polls plugin configuration file                                           |
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
// $Id: config.php,v 1.9 2006/06/17 12:22:44 dhaun Exp $

$_PO_CONF['version']            = '1.1.0'; // Plugin Version

// 投稿・アンケート設定

// 投票にログイン要求　1:要求　0:不要
// この指定よりもconfig.phpの$_CONF['loginrequired']が優先します
$_PO_CONF['pollsloginrequired'] = 0;

/**
 * ヘッダメニューリンク　1:隠す　0:表示
 * 
 * @global array $_PO_CONF['hidepollsmenu']
 */
$_PO_CONF['hidepollsmenu']      = 0;

$_PO_CONF['maxanswers']         = 10; // 選択肢の最大数

// 投票項目の自動並べ替え　回答の多かった順（'voteorder'）入力順（'submitorder'）
$_PO_CONF['answerorder']        = 'submitorder';

// 投稿したことを記憶する秒数　その間は再投稿できません。（重複投票の回避対策）
$_PO_CONF['pollcookietime']     = 86400;  // 秒 (= 24 時間)
$_PO_CONF['polladdresstime']    = 604800; // 秒 (= 7 日)

// 所有者が退会したときの投票とコメント　1:削除 0: Rootユーザに所有者が移る
$_PO_CONF['delete_polls'] = 0;

// 管理者の管理画面で新規作成の際のパーミッションのデフォルトを設定。
// 所有者、グループ、メンバ、ゲストユーザごとに、次の値を設定できます。
// 3 = R:閲覧 + E:編集(所有者、グループのみ)
// 2 = R:閲覧のみ
// 0 = どちらも許可しない
$_PO_CONF['default_permissions'] = array (3, 2, 2, 2);

// データベーステーブル名 - 変更禁止
$_TABLES['pollanswers']         = $_DB_table_prefix . 'pollanswers';
$_TABLES['pollquestions']       = $_DB_table_prefix . 'pollquestions';
$_TABLES['pollvoters']          = $_DB_table_prefix . 'pollvoters';

?>
