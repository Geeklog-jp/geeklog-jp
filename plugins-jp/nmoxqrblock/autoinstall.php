<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/autoinstall.php                               |
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
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+

if (strpos(strtolower($_SERVER['PHP_SELF']), strtolower(basename(__FILE__))) !== FALSE) {
	die('This file can not be used on its own!');
}

/**
* Plugin autoinstall function
*
* @param    string  $pi_name    Plugin name
* @return   array               Plugin information
*/
function plugin_autoinstall_nmoxqrblock($pi_name) {
	global $_NMOXQRBLOCK;
	
	require_once dirname(__FILE__) . '/config.php';
	
	$pi_name         = 'nmoxqrblock';
	$pi_display_name = 'nmoxqrblock';
	$pi_admin        = $pi_name . ' Admin';
	
	$info = array(
		'pi_name'         => $pi_name,
		'pi_display_name' => $pi_display_name,
		'pi_version'      => $_NMOXQRBLOCK['pi_version'],
		'pi_gl_version'   => $_NMOXQRBLOCK['gl_version'],
		'pi_homepage'     => $_NMOXQRBLOCK['pi_url'],
	);
	
	$groups   = $_NMOXQRBLOCK['GROUPS'];
	$features = $_NMOXQRBLOCK['FEATURES'];
	$mappings = $_NMOXQRBLOCK['MAPPINGS'];
	
	$tables = array();
	
	$inst_parms = array(
		'info'      => $info,
		'groups'    => $groups,
		'features'  => $features,
		'mappings'  => $mappings,
		'tables'    => $tables
	);
	
	return $inst_parms;
}

/**
* Load plugin configuration from database
*
* @param    string  $pi_name    Plugin name
* @return   boolean             TRUE on success, otherwise FALSE
* @see      plugin_initconfig_nmoxqrblock
*/
function plugin_load_configuration_nmoxqrblock($pi_name) {
    global $_CONF;
    
    $base_path = $_CONF['path'] . 'plugins/' . $pi_name . '/';
    
    require_once $_CONF['path_system'] . 'classes/config.class.php';
    require_once $base_path . 'install_defaults.php';
    
    return plugin_initconfig_nmoxqrblock();
}

/**
* Checks if the plugin is compatible with this Geeklog version
*
* @param    string  $pi_name    Plugin name
* @return   boolean             TRUE: plugin compatible; FALSE: not compatible
*/
function plugin_compatible_with_this_version_nmoxqrblock($pi_name) {
	global $_CONF, $_DB_dbms;
	
	return TRUE;
}

function plugin_postinstall_nmoxqrblock($pi_name) {
	global $_CONF, $_TABLES, $_USER, $LANG_NMOXQRBLOCK;
	
	// Includes language file
	$langfile = $_CONF['path'] . 'plugins/nmoxqrblock/language/'
			  . $_CONF['language'] . '.php';

	if (file_exists ($langfile)) {
		include_once $langfile;
	} else {
		include_once $_CONF['path'] . 'plugins/nmoxqrblock/language/english.php';
	}

	$rc = DB_getItem(
		$_TABLES['blocks'],
		'COUNT(*)',
		"(name = 'nmoxqrblock') "
	);
	
	if ($rc < 1) {
		$result = TRUE;
		$sqls = array();
		
		$group_id = DB_getItem(
			$_TABLES['groups'], 'grp_id', "grp_name = 'nmoxqrblock Admin'"
		);
		
		if (is_callable('COM_createHTMLDocument')) {
			$sql = "INSERT INTO {$_TABLES['blocks']} "
				 . "  (is_enabled, name, type, title, blockorder, onleft, "
				 . "  phpblockfn, owner_id, group_id) "
				 . "VALUES (1, 'nmoxqrblock', 'phpblock', "
				 . "  '{$LANG_NMOXQRBLOCK['title_block']}', 90, 1, "
				 . "  'phpblock_nmoxqrblock', {$_USER['uid']}, {$group_id})";
			DB_query($sql, 1);
			
			if (DB_error()) {
				$result = FALSE;
			} else {
				$bid = DB_insertId();
				$sql = "INSERT INTO {$_TABLES['topic_assignments']} "
					 . "  (tid, type, id, inherit, tdefault) "
					 . "  VALUES ('all', 'block', {$bid}, 1, 0) ";
				DB_query($sql, 1);
				
				if (DB_error()) {
					$result = FALSE;
				}
			}
		} else {
			$sql = "INSERT INTO {$_TABLES['blocks']} "
				 . "  (is_enabled, name, type, title, tid, blockorder, onleft, "
				 . "  phpblockfn, owner_id, group_id) "
				 . "VALUES (1, 'nmoxqrblock', 'phpblock', "
				 . "  '{$LANG_NMOXQRBLOCK['title_block']}', 'all', 90, 1, "
				 . "  'phpblock_nmoxqrblock', {$_USER['uid']}, {$group_id})";
			DB_query($sql, 1);
			
			if (DB_error()) {
				$result = FALSE;
			}
		}
		
		if ($result === FALSE) {
			COM_errorLog('Failed to insert a new QR block', 1);
			return FALSE;
		}
	}
	
	return TRUE;
}
