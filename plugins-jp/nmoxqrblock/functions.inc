<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/functions.inc                                 |
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

// This file can't be used on its own
if (strpos(strtolower($_SERVER['PHP_SELF']), 'functions.inc') !== FALSE) {
	die ('This file can not be used on its own.');
}

// Includes language file
$langfile = $_CONF['path'] . 'plugins/nmoxqrblock/language/' . $_CONF['language'] . '.php';

if (file_exists ($langfile)) {
	include_once $langfile;
} else {
	include_once $_CONF['path'] . 'plugins/nmoxqrblock/language/english.php';
}

require_once $_CONF['path'] . 'plugins/nmoxqrblock/config.php';
NMOXQRBLOCK_loadConfig();

// +---------------------------------------------------------------------------+
// | Geeklog Plugin API Implementations                                        |
// +---------------------------------------------------------------------------+

/**
* Returns a URL to icon
*/
function plugin_geticon_nmoxqrblock() {
	global $_CONF;
	
	return $_CONF['site_url'] . '/nmoxqrblock/image/nmoxqrblock.png';
}

/**
* Returns the version for this plugin
*
* @return string VersionNo
*/
function plugin_chkVersion_nmoxqrblock() {
	global $_NMOXQRBLOCK;

	return $_NMOXQRBLOCK['pi_version'];
}

/**
* Check to see if this Plugin uses comments
*
* @return   boolean true or false
*/
function plugin_commentsupport_nmoxqrblock() {
	return FALSE;
}

function plugin_upgrade_nmoxqrblock() {
	global $_CONF, $_TABLES, $_NMOXQRBLOCK;

	if (version_compare(VERSION, '1.5.0') >= 0) {
		$v = DB_getItem($_TABLES['plugins'], 'pi_version', "pi_name = 'nmoxqrblock'");

		while ($v != $_NMOXQRBLOCK['pi_version']) {
			switch ($v) {
				case '1.1.1':
					require_once $_CONF['path_system'] . 'classes/config.class.php';
					require_once $_CONF['path'] . 'plugins/nmoxqrblock/install_defaults.php';
					plugin_initconfig_nmoxqrblock();
					$v = '1.2.0';
					break;
			}
		}

		// Updates version number
		$sql = "UPDATE {$_TABLES['plugins']} "
			 . "SET pi_version = '{$_NMOXQRBLOCK['pi_version']}' "
			 . "WHERE (pi_name = 'nmoxqrblock') ";
		DB_query($sql);
	}
	
	return TRUE;
}

function plugin_enablestatechange_nmoxqrblock($enable) {
	global $_TABLES;

	$is_enabled = $enable ? 1 : 0;

	// toggle nmoxqrblock block
	$sql = "UPDATE {$_TABLES['blocks']} "
		 . "SET is_enabled = {$is_enabled} "
		 . "WHERE (type = 'phpblock') AND (phpblockfn = 'phpblock_nmoxqrblock') ";
	DB_query($sql);
}

/**
* Removes the datastructures for this plugin from the Geeklog database.
*
* @param    string   $installCheck  Defult is blank but if set, check if
*                                   plugin is disabled first
* @return   boolean True if successful false otherwise
*/
function plugin_uninstall_nmoxqrblock($installCheck = '') {
	global $_TABLES, $LANG_NMOXQRBLOCK, $_CONF;

	$pi_name  = 'nmoxqrblock';

	$grp_id = DB_getItem($_TABLES['vars'], 'value', "name = '{$pi_name}_admin'");
	DB_delete($_TABLES['plugins'], 'pi_name', 'nmoxqrblock');
	DB_query("DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $grp_id",1);
	$FEATURES = array('nmoxqrblock.edit', 'nmoxqrblock.user');
	
	foreach ($FEATURES as $feature) {
		$feat_id = DB_getItem($_TABLES['features'], 'ft_id', "ft_name = '$feature'");
		DB_query("DELETE FROM {$_TABLES['access']} WHERE acc_ft_id = $feat_id", 1);
		DB_query("DELETE FROM {$_TABLES['features']} WHERE ft_id = $feat_id", 1);
	}
	
	DB_query("DELETE FROM {$_TABLES['vars']} WHERE name = '{$pi_name}_admin'", 1);
	DB_query("DELETE FROM {$_TABLES['groups']} WHERE grp_id = $grp_id", 1);
	DB_query("DELETE FROM {$_TABLES['blocks']} WHERE name='nmoxqrblock'", 1);

	return TRUE;
}

/**
* Puts an option for the plugin in the command and control block on moderation.php
*
* @return   array   Array containing (plugin name, admin url, url of plugin icon)
*/
function plugin_cclabel_nmoxqrblock() {
	global $_CONF, $LANG_NMOXQRBLOCK;
	
	if (SEC_hasRights('nmoxqrblock.edit') AND
		(version_compare(VERSION, '1.5.0') >= 0)) {
		return array(
				$LANG_NMOXQRBLOCK['plugin'],
				$_CONF['site_admin_url'] . '/configuration.php',
				plugin_geticon_nmoxqrblock(),
		);
	} else {
		return FALSE;
	}
}

/**
* Returns the administrative option for this plugin
*
* @return   array   Array containing (plugin name, plugin admin url, # of items
* in plugin or '')
*/
function plugin_getadminoption_nmoxqrblock() {
	global $_CONF, $_TABLES;
	
	if (SEC_hasRights('nmoxqrblock.edit') AND
		(version_compare(VERSION, '1.5.0') >= 0)) {
		$pi_name   = 'nmoxqrblock';
		$admin_url = $_CONF['site_admin_url'] . '/configuration.php';
		$num_items = NULL;
		return array($pi_name, $admin_url, $num_items);
	} else {
		return FALSE;
	}
}

/**
* Automatic uninstall function for plugins
*
* @return   array
*/
function plugin_autouninstall_nmoxqrblock() {
	global $_NMOXQRBLOCK;
	
	$out = array (
		/* give the name of the tables, without $_TABLES[] */
		'tables' => array(),
		/* give the full name of the group, as in the db */
		'groups' => array('nmoxqrblock Admin'),
		/* give the full name of the feature, as in the db */
		'features' => $_NMOXQRBLOCK['FEATURES'],
		/* give the full name of the block, including 'phpblock_', etc */
		'php_blocks' => array('phpblock_nmoxqrblock'),
		/* give all vars with their name */
		'vars'=> array()
	);
	
	return $out;
}

function NMOXQRBLOCK_display(array $params = array()) {
	global $_CONF, $_TABLES, $_NMOXQRBLOCK;
	
	if (!isset($params['d'])) {
		$params['d'] = COM_buildURL(COM_getCurrentURL());
	}
	
	if (isset($params['t'])) {
		$params['t'] = strtoupper($params['t']);
		
		if (($params['t'] !== 'J') AND ($params['t'] !== 'P')) {
			$params['t'] = $_NMOXQRBLOCK['image_type'];
		}
	} else {
		$params['t'] = $_NMOXQRBLOCK['image_type'];
	}
	
	if (isset($params['e'])) {
		$params['e'] = strtoupper($params['e']);
		
		if (!in_array($params['e'], array('L', 'M', 'Q', 'H'))) {
			$params['e'] = $_NMOXQRBLOCK['ecc_level'];
		}
	} else {
		$params['e'] = $_NMOXQRBLOCK['ecc_level'];
	}
	
	if (isset($params['s'])) {
		if (!is_numeric($params['s'])) {
			$params['s'] = $_NMOXQRBLOCK['module_size'];
		}
	} else {
		$params['s'] = $_NMOXQRBLOCK['module_size'];
	}
	
	if (isset($params['v'])) {
		if (($params['v'] < 1) OR ($params['v'] > 40)) {
			unset($params['v']);
		}
	}
	
	ksort($params);
	$q = http_build_query($params);
	$cahce_file = md5($q) . ($params['t'] === 'J' ? '.jpg' : '.png');
	$data = NULL;
	
	if (file_exists($_CONF['path_data'] . $cahce_file)) {
		$data = file_get_contents($_CONF['path_data'] . $cahce_file);
	} else {
		require_once 'HTTP/Request.php';
		$client = new HTTP_Request($_CONF['site_url'] . '/nmoxqrblock/qr_img.php?' . $q);
		
		if ($client->sendRequest()) {
			$data = $client->getResponseBody();
			file_put_contents($_CONF['path_data'] . $cahce_file, $data);
		}
	}
	
	if (!empty($data)) {
		if ($params['t'] === 'J') {
			header('Content-Type: image/jpeg');
		} else {
			header('Content-Type: image/png');
		}
		
		echo $data;
	}
}

function phpblock_nmoxqrblock($d = NULL, $t = NULL, $e = NULL, $s = NULL, $v = NULL) {
	global $_CONF, $_TABLES, $_NMOXQRBLOCK;
	
	if (!defined('XHTML')) {
		define('XHTML', '');
	}
	
	$agent = $_SERVER['HTTP_USER_AGENT'];
	
	if (($agent === '') OR
		preg_match("@^DoCoMo/(1|2)\.0@i", $agent) OR
		preg_match("/^(J\-PHONE|Vodafone|MOT\-[CV]|Vemulator)/i", $agent) OR
		preg_match("/^(UP\.Browser|KDDI\-)/i", $agent) OR
		preg_match("/DDIPOCKET/i", $agent)) {
		$html = '';
	} else {
		$params = compact('d', 't', 'e', 's', 'v');
		$html = '<div class="block-box">' . LB
			  . '<img alt="QR code" src="' . $_CONF['site_url']
			  . '/nmoxqrblock/index.php?' . http_build_query($params) . '"'
			  . XHTML . '>' . LB
			  . '</div>' . LB;
	}
	
	return $html;
}

/**
* Loads config infor with config.class.php
*/
function NMOXQRBLOCK_loadConfig() {
	global $_CONF, $_NMOXQRBLOCK;
	
	if (version_compare(VERSION, '1.5.0') >= 0) {
		require_once $_CONF['path_system'] . 'classes/config.class.php';
		$config = config::get_instance();
	
		if ($config->group_exists('nmoxqrblock')) {
			$temp = $config->get_config('nmoxqrblock');
		
			if (is_array($temp) AND (count($temp) > 0)) {
				$_NMOXQRBLOCK = array_merge($_NMOXQRBLOCK, $temp);
			}
		}
	}
}

/**
* Returns the URL to a given document
*/
function plugin_getdocumentationurl_nmoxqrblock($file) {
	global $_CONF;
	
	$lang = COM_getLanguageName();
	$path = $_CONF['path_html'] . 'admin/plugins/nmoxqrblock/docs/' . $lang . '/'
		  . $file . '.html';
	clearstatcache();
	
	if (!file_exists($path)) {
		$lang = 'english';
	}
	
	$retval = $_CONF['site_admin_url'] . '/plugins/nmoxqrblock/docs/' . $lang . '/'
			. $file . '.html';
	
	return $retval;
}

/**
* Provides text for a Configuration tooltip
*
* @param    string  $id     Id of config value
* @return   mixed           Text to use regular tooltip, NULL to use config 
*                           tooltip hack, or empty string when not available
*/
function plugin_getconfigtooltip_nmoxqrblock($id) {
	// Use config tooltip hack where tooltip is read from the config documentation
	return NULL;
}

function plugin_autotags_nmoxqrblock($op, $content = '', $autotag = '') {
	global $_CONF, $_TABLES;
	
	if (!defined('XHTML')) {
		define('XHTML', '');
	}
	
	// Change this if it seems to be long
	$autotag_name = 'nmoxqrblock';
	
	if ($op === 'tagname' ) {
		return array($autotag_name);
	} else if ($op === 'parse') {
		if ($autotag['tag'] === $autotag_name) {
			$d = trim($autotag['parm1']);
			$params  = array('d' => $d);
			$replace = '<img alt="' . htmlspecialchars($d, ENT_QUOTES)
					 . '" src="' . $_CONF['site_url'] . '/nmoxqrblock/index.php?'
					 . http_build_query($params) . '"' . XHTML . '>';
			$content = str_replace($autotag['tagstr'], $replace, $content);
		}
		
		return $content;
	}
}
