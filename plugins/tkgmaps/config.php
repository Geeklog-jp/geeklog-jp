<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------+
// | config.php                                                                |
// +---------------------------------------------------------------------------+
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

$_TKGMAPS_CONF = array();

// アイコンサイズのデフォルト  横pix,縦pix
$_TKGMAPS_CONF['iconsize']      = '32,32';
// 影アイコンサイズのデフォルト  横pix,縦pix
$_TKGMAPS_CONF['iconshadowsize'] = '59,32';
// アイコン位置のデフォルト  TOP位置,LEFT位置
$_TKGMAPS_CONF['iconanchor']    = '16,16';
// インフォウィンドウ位置のデフォルト  TOP位置,LEFT位置
$_TKGMAPS_CONF['infowindowanchor'] = '15,10';

$_TKGMAPS_CONF['hidemenu']      = 1;

$_TKGMAPS_CONF['loginrequired'] = 0;

$_TKGMAPS_CONF['version']       = '0.9.4';   // Plugin Version

// Add to $_TABLES array the tables your plugin uses

$_TABLES['tkgmaps'] = $_DB_table_prefix . 'tkgmaps';

?>