<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | public_html/admin/plugins/nmoxqrblock/install.php                         |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007-2012 by nmox                                           |
// |                            mystral-kk - geeklog AT mystral-kk DOT net     |
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
// +---------------------------------------------------------------------------+

global $_CONF, $_TABLES, $_USER, $_NMOXQRBLOCK, $LANG_NMOXQRBLOCK;

require_once '../../../lib-common.php';
require_once $_CONF['path'] . 'plugins/nmoxqrblock/functions.inc';

// Universal plugin install variables
$pi_name    = 'nmoxqrblock';				// Plugin name  Must be 15 chars or less
$pi_version = $_NMOXQRBLOCK['pi_version'];	// Plugin Version
$gl_version = $_NMOXQRBLOCK['gl_version'];	// GL Version plugin for
$pi_url     = $_NMOXQRBLOCK['pi_url'];		// Plugin Homepage

// Default data
$NEWFEATURE = $_NMOXQRBLOCK['FEATURES'];

// Default data

// Only let Root users access this page
if (!SEC_inGroup('Root')) {
	// Someone is trying to illegally access this page
	COM_errorLog("Someone has tried to illegally access the nmoxqrblock install/uninstall page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: {$_SERVER['REMOTE_ADDR']}",1);
	$display = COM_siteHeader()
			 . COM_startBlock($LANG_NMOXQRBLOCK['access_denied'])
			 . $LANG_NMOXQRBLOCK['access_denied_msg']
			 . COM_endBlock()
			 . COM_siteFooter();
	echo $display;
	exit;
}

/**
* Puts the datastructures for this plugin into the Geeklog database
*
* @return   boolean True if successful False otherwise
*/
function plugin_install_now() {
	global $pi_name, $pi_version, $gl_version, $pi_url, $NEWFEATURE, $_CONF,
		   $_TABLES, $LANG_NMOXQRBLOCK;
	
	DB_query("INSERT INTO {$_TABLES['groups']} (grp_name, grp_descr) "
		. "VALUES ('$pi_name Admin', 'Users in this group can administer the $pi_name plugin')", 1);
	
	if (DB_error()) {
		COM_errorLog('failed insert groups table', 1);
		plugin_uninstall_nmoxqrblock();
		return FALSE;
	}
	
	$group_id = DB_insertId();
	DB_query("INSERT INTO {$_TABLES['vars']} VALUES ('{$pi_name}_admin', '$group_id')", 1);
	
	if (DB_error()) {
		COM_errorLog('failed insert vars table',1);
		plugin_uninstall_nmoxqrblock();
		return FALSE;
	}
	
	foreach ($NEWFEATURE as $feature => $desc) {
		DB_query("INSERT INTO {$_TABLES['features']} (ft_name, ft_descr) "
			. "VALUES ('{$feature}', '{$desc}')", 1);
		
		if (DB_error()) {
			COM_errorLog('failed insert feature table',1);
			plugin_uninstall_nmoxqrblock();
			return FALSE;
		}
		
		$feat_id = DB_insertId();
		DB_query("INSERT INTO {$_TABLES['access']} (acc_ft_id, acc_grp_id) VALUES ($feat_id, $group_id)");
		
		if (DB_error()) {
			COM_errorLog('failed insert access table',1);
			plugin_uninstall_nmoxqrblock();
			return FALSE;
		}
	}
	
	DB_query("INSERT INTO {$_TABLES['group_assignments']} VALUES ($group_id, NULL, 1)");
	
	if (DB_error()) {
		COM_errorLog('failed insert group_assignments table',1);
		plugin_uninstall_nmoxqrblock();
		return FALSE;
	}

	DB_delete($_TABLES['plugins'],'pi_name','nmoxqrblock');
	DB_query("INSERT INTO {$_TABLES['plugins']} (pi_name, pi_version, pi_gl_version, pi_homepage, pi_enabled) "
		. "VALUES ('$pi_name', '$pi_version', '$gl_version', '$pi_url', 1)");
	
	if (DB_error()) {
		COM_errorLog('failed insert plugin table',1);
		plugin_uninstall_nmoxqrblock();
		return FALSE;
	}

	$rc = DB_getItem(
		$_TABLES['blocks'],
		'COUNT(*)',
		"(tid = '" . $LANG_NMOXQRBLOCK['title_block'] . "')"
	);
	
	if ($rc < 1) {
		$sql = "INSERT INTO {$_TABLES['blocks']} "
			 . "  (is_enabled, name, type, title, tid, blockorder, onleft, "
			 . "  phpblockfn, owner_id, group_id) "
			 . "VALUES (1, 'nmoxqrblock', 'phpblock', "
			 . "  '{$LANG_NMOXQRBLOCK['title_block']}', 'all', 90, 1, "
			 . "  'phpblock_nmoxqrblock', 2, {$group_id})";
		DB_query($sql, 1);
		
		if (DB_error()) {
			COM_errorLog('failed insert blocks table', 1);
			plugin_uninstall_nmoxqrblock();
			return FALSE;
		}
	}

	return TRUE;
}

/*
* Main Function
*/
$display = '';

if ($_REQUEST['action'] === 'uninstall') {
	$uninstall_plugin = 'plugin_uninstall_' . $pi_name;
	
	if ($uninstall_plugin ()) {
		$display = COM_refresh($_CONF['site_admin_url'] . '/plugins.php?msg=45');
	} else {
		$display = COM_refresh($_CONF['site_admin_url'] . '/plugins.php?msg=73');
	}
} else if (DB_count($_TABLES['plugins'], 'pi_name', $pi_name) == 0) {
	// plugin not installed
	if (plugin_install_now ()) {
		$display = COM_refresh($_CONF['site_admin_url'] . '/plugins.php?msg=44');
	} else {
		$display = COM_refresh($_CONF['site_admin_url'] . '/plugins.php?msg=72');
	}
} else {
	// plugin already installed
	$display .= COM_siteHeader('menu', $LANG01[77])
			 .  COM_startBlock($LANG32[6])
			 .  '<p>' . $LANG32[7] . '</p>'
			 .  COM_endBlock ()
			 .  COM_siteFooter();
}

echo $display;
