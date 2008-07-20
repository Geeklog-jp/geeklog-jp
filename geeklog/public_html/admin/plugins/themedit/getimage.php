<?php

// +---------------------------------------------------------------------------+
// | Theme Editor Plugin for Geeklog - The Ultimate Weblog                     |
// +---------------------------------------------------------------------------+
// | upload.php                                                                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 - geeklog AT mystral-kkDOT net                         |
// |                                                                           |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
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

require_once '../../../lib-common.php';

// Security check

if ( !SEC_inGroup( 'Root' ) ) {
    // Someone is trying to illegally access this page
    COM_errorLog( "Someone has tried to illegally access the themedit uploader.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR", 1 );
    $display  = COM_siteHeader();
    $display .= COM_startBlock( $LANG_THM['access_denied'] );
    $display .= $LANG_THM['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter( true );
    echo $display;
    exit;
}

$url = $_GET['url'];
$ih = imagecreatetruecolor( $_THM_CONF['image_width'], $_THM_CONF['image_size'] );

?>
