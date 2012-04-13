<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/language/english_utf-8.php                    |
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

$LANG_NMOXQRBLOCK= array (
	'plugin'				=> 'nmoxqrblock',
	'access_denied'			=> 'Access Denied',
	'access_denied_msg'		=> 'Only Root Users have Access to this Page.  Your user name and IP have been recorded.',
	'install_header'		=> 'Install/Uninstall Plugin',
	'installed'				=> 'The Plugin is Installed',
	'uninstalled'			=> 'The Plugin is Not Installed',
	'install_success'		=> 'Installation Successful',
	'install_failed'		=> 'Installation Failed -- See your error log to find out why.',
	'uninstall_msg'			=> 'Plugin Successfully Uninstalled',
	'install'				=> 'Install',
	'uninstall'				=> 'UnInstall',
	'title_block'			=> 'QR code'
);

// Localization of the Admin Configuration UI
$LANG_configsections['nmoxqrblock'] = array(
	'label' => $LANG_NMOXQRBLOCK['plugin'],
	'title' => $LANG_NMOXQRBLOCK['plugin'] . ' Configuration'
);

$LANG_confignames['nmoxqrblock'] = array(
	'image_type'	=> 'Image type',
	'ecc_level'		=> 'Error correction level',
	'module_size'	=> 'Image module size',
);

$LANG_configsubgroups['nmoxqrblock'] = array(
	'sg_main' => 'Main Settings'
);

$LANG_fs['nmoxqrblock'] = array(
	'fs_main'        => $LANG_NMOXQRBLOCK['plugin'] . ' Main Settings',
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['nmoxqrblock'] = array(
	 0 => array('True' => 1, 'False' => 0),
	 1 => array('True' => TRUE, 'False' => FALSE),
	12 => array('JPEG' => 'J', 'PNG' => 'P'),
	13 => array('L' => 'L', 'M' => 'M', 'Q' => 'Q', 'H' => 'H'),
);
