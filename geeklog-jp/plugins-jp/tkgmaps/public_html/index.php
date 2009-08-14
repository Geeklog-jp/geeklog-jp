<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------+
// | public_html/tkgmaps/index.php                                            |
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

require_once '../lib-common.php';

// Check user has rights to access this page
if ( !SEC_hasRights( 'tkgmaps.edit,tkgmaps.view,tkgmaps.admin','OR' ) ) {
    // Someone is trying to illegally access this page
    COM_errorLog( "Someone has tried to illegally access the tkgmaps page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR", 1 );
    $display  = COM_siteHeader();
    $display .= COM_startBlock( $LANG_{lang_var_postfix}['access_denied'] );
    $display .= $LANG_{lang_var_postfix}['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter( true );
    COM_output( $display );
    exit;
}

/* 
* Main Function
*/

$display = COM_siteHeader();
$T = new Template( $_CONF['path'] . 'plugins/tkgmaps/templates' );
$T->set_file( 'page', 'index.thtml' );
$T->set_var( 'header', $LANG_{lang_var_postfix}['plugin'] );
$T->set_var( 'site_url', $_CONF['site_url'] );
$T->set_var( 'icon_url', $_CONF['site_url'] . '/tkgmaps/images/tkgmaps.gif' );
$T->set_var( 'plugin', 'tkgmaps' );

// your code goes here


$T->parse( 'output', 'page' );
$display .= $T->finish( $T->get_var( 'output' ) );
$display .= COM_siteFooter();

COM_output( $display );

?>