<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------|
// | language/japanese.php                                                     |
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
//
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

$LANG_{lang_var_postfix} = array (
    'display_name'      => '{display_name}',
    'menu_title'        => '{display_name}',
    'plugin'            => '{display_name}プラグイン',
    'access_denied'     => 'アクセスは拒否されました。',
    'access_denied_msg' => 'このページにアクセスできるのは，Rootユーザだけです。あなたのユーザ名とIPアドレスは記録されました。',
    'admin'             => '{display_name}プラグイン管理',
    'install_header'    => '{display_name}プラグインのインストール/アンインストール',
    'installed'         => '{display_name}プラグインはインストールされています。',
    'uninstalled'       => '{display_name}プラグインはインストールされていません。',
    'install_success'   => '{display_name}プラグインのインストールに成功しました。',
    'install_failed'    => '{display_name}プラグインのインストールに失敗しました。詳細はエラーログ(error.log)をご覧ください。',
    'uninstall_msg'     => '{display_name}プラグインはアンインストールされました。',
    'install'           => 'インストール',
    'uninstall'         => 'アンインストール',
    'warning'           => '警告！　{display_name}プラグインは有効なままです。',
    'enabled'           => 'アンインストールする前に，{display_name}プラグインを無効にしてください。',
    'readme'            => 'ちょっと待って！　「インストール」をクリックする前に，お読みください：',
    'installdoc'        => 'インストール手順書',

    // for stats
    'stats_headline'    => '{display_name}(上位10件)',
    'stats_title'       => '件名',
    'stats_value'       => '件',
    'stats_no_value'    => 'データがありません。',
    
    // for admin
    'manager'           => '{display_name}管理',
    'instructions'      => 'データを修正，削除する場合は各データの「編集」アイコンをクリックしてください。新規作成は「新規作成」をクリックしてください。',

);

?>