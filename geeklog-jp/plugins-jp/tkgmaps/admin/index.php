<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------+
// | admin/index.php                                                           |
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

require_once '../../../lib-common.php';
require_once ('../../auth.inc.php');

// Only let admin users access this page
if ( !SEC_hasRights( 'tkgmaps.admin' ) ) {
	// Someone is trying to illegally access this page
	COM_errorLog( "Someone has tried to illegally access the tkgmaps Admin page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR", 1 );
	$display  = COM_siteHeader();
	$display .= COM_startBlock( $LANG_TKGMAPS['access_denied'] );
	$display .= $LANG_TKGMAPS['access_denied_msg'];
	$display .= COM_endBlock();
	$display .= COM_siteFooter( true );
	COM_output( $display );
	exit;
}

function listtkgmaps()
{
	global $_CONF, $_TABLES, $LANG_ADMIN, $LANG_TKGMAPS;

	require_once( $_CONF['path_system'] . 'lib-admin.php' );

	$retval = '';

	$header_arr = array(
	array( 'text'  => $LANG_ADMIN['edit'],	'field' => 'edit',	'sort'  => false),
	array( 'text'  => $LANG_TKGMAPS['googlemapsapikey'],	'field' => 'googlemapsapikey',	'sort'  => false)
	);

	$defsort_arr = array(
	'field'     => 'googlemapsapikey',
	'direction' => 'desc'
	);

	$menu_arr = array (
	array( 'url'  => 'http://code.google.com/intl/ja/apis/maps/signup.html',	'text' => 'GoogleMapAPIKey の取得'),
	array( 'url'  => $_CONF['site_admin_url'],	'text' => $LANG_ADMIN['admin_home']
	)
	);

	$text_arr = array(
	'has_menu'     => true,
	'has_extras'   => true,
	'instructions' => $LANG_TKGMAPS['instructions'],
	'icon'         => $_CONF['site_url'] . '/tkgmaps/images/tkgmaps.gif',
	'form_url'     => $_CONF['site_admin_url'] . "/plugins/tkgmaps/index.php"
	);

	$query_arr = array(
	'table'          => 'tkgmaps',
	'sql'            => "SELECT * FROM {$_TABLES['tkgmaps']} WHERE 1=1",
	'query_fields'   => array('title'),
	'default_filter' => COM_getPermSql ('AND')
	);
	
	$defsort_arr = array();
//	$query_arr = array();

    if (version_compare(VERSION, '1.5.0') >= 0) {
        $retval .= COM_startBlock($LANG_TKGMAPS['manager'], '', COM_getBlockTemplate('_admin_block', 'header'));
        $retval .= ADMIN_createMenu($menu_arr, $text_arr['instructions'], $text_arr['icon']);
        $retval .= ADMIN_list ('tkgmaps', 'plugin_getListField_tkgmaps', $header_arr,
            $text_arr, $query_arr, $defsort_arr);
        $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    } else {
        $text_arr['title'] = $LANG_TKGMAPS['manager'];
        $retval = ADMIN_list ('tkgmaps', 'plugin_getListField_tkgmaps', $header_arr,
            $text_arr, $query_arr, $menu_arr, $defsort_arr);
    }
    
	return $retval;
}

function plugin_getListField_tkgmaps ($fieldname, $fieldvalue, $A, $icon_arr)
{
    global $_CONF, $LANG25, $LANG_ACCESS;

    $retval = '';

    $access = SEC_hasAccess ($A['owner_id'], $A['group_id'],
                             $A['perm_owner'], $A['perm_group'],
                             $A['perm_members'], $A['perm_anon']);
    if ($access > 0) {
        switch($fieldname) {
            case 'edit':
                if ($access == 3) { // User is in Root group
                    $retval = "<a href='{$_CONF['site_admin_url']}/plugins/tkgmaps/index.php?mode=edit'>{$icon_arr['edit']}</a>";
                }
                break;
            default:
                $retval = $fieldvalue;
                break;
        }
    } else {
        $retval = false;
    }

    return $retval;
}

// MAIN

$display = '';

$mode = '';
if (isset ($_REQUEST['mode'])) {
	$mode = COM_applyFilter($_REQUEST['mode']);
}

if (($mode == 'edit') || ($mode == 'edit_submit' && SEC_checkToken())){

	$display .= COM_siteHeader ('menu', 'Editor');
	$display .= edit_tkgmaps ($mode);

} else if (($mode == $LANG_ADMIN['save']) && !empty ($LANG_ADMIN['save'])) {

	$display .= COM_siteHeader ('menu', $LANG_TKGMAPS['manager']);



} else if (($mode == $LANG_ADMIN['delete']) && !empty ($LANG_ADMIN['delete'])) {

	$display .= COM_siteHeader ('menu', $LANG_TKGMAPS['manager']);



} else { // 'cancel' or no mode at all

	$display .= COM_siteHeader ('menu', $LANG_TKGMAPS['manager']);
	$display .= listtkgmaps();

}

$display .= COM_siteFooter ();

COM_output( $display );

?>