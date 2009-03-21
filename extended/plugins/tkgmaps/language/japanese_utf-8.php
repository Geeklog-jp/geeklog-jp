<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------|
// | language/japanese_utf-8.php                                               |
// +---------------------------------------------------------------------------|
// | Copyright (C) 2002 by the following authors:                              |
// |                                                                           |
// | Author:                                                                   |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
// |                                                                           |
// | modified by mystral-kk      - geeklog AT mystral-k DOT net                |
// | modified by dengen          - dengen AT mail DOT trybase DOT com          |
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
// 2008.05.14 v0.9 customed by G-COE, CSEAS. Addition of GoogleMapsEditor API Auto Tags
// Authors: Kinoshita
// Authors: Hiroron
// Director: IVY WE CO.,LTD. Komma
// $Id$

// +---------------------------------------------------------------------------+
// | Array Format:                                                             |
// | $LANGXX[YY]:   $LANG - variable name                                      |
// |        XX - file id number                                                |
// |        YY - phrase id number                                              |
// +---------------------------------------------------------------------------+

/**
* Generic Install language
* 
* Be sure and change the name of this array to match your plugin
* e.g. $LANG_ST00
*
*/

$LANG_TKGMAPS = array (
    'display_name'      => 'GoogleMaps',
    'menu_title'        => 'GoogleMaps',
    'plugin'            => 'GoogleMapsプラグイン',
    'access_denied'     => 'アクセスは拒否されました。',
    'access_denied_msg' => 'このページにアクセスできるのは，Rootユーザだけです。あなたのユーザ名とIPアドレスは記録されました。',
    'admin'             => 'GoogleMapsプラグイン管理',
    'install_header'    => 'GoogleMapsプラグインのインストール/アンインストール',
    'installed'         => 'GoogleMapsプラグインはインストールされています。',
    'uninstalled'       => 'GoogleMapsプラグインはインストールされていません。',
    'install_success'   => 'GoogleMapsプラグインのインストールに成功しました。',
    'install_failed'    => 'GoogleMapsプラグインのインストールに失敗しました。詳細はエラーログ(error.log)をご覧ください。',
    'uninstall_msg'     => 'GoogleMapsプラグインはアンインストールされました。',
    'install'           => 'インストール',
    'uninstall'         => 'アンインストール',
    'warning'           => '警告！　GoogleMapsプラグインは有効なままです。',
    'enabled'           => 'アンインストールする前に，GoogleMapsプラグインを無効にしてください。',
    'readme'            => 'ちょっと待って！　「インストール」をクリックする前に，お読みください：',
    'installdoc'        => 'インストール手順書',

    // for stats
    'stats_headline'    => 'GoogleMaps(上位10件)',
    'stats_title'       => '件名',
    'stats_value'       => '件',
    'stats_no_value'    => 'データがありません。',
    'googlemapsapikey' => 'GoogleMaps API Key',
    // for admin
    'manager'           => 'GoogleMaps管理',
    'instructions'      => 'データを修正，削除する場合は各データの「編集」アイコンをクリックしてください。',

);

?>