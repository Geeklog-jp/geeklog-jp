<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/config.php                                    |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), strtolower(basename(__FILE__))) !== FALSE) {
    die('This file can not be used on its own!');
}

global $_DB_table_prefix, $_TABLES, $_NMOXQRBLOCK;

// DB settings
$_TABLES['nmoxqrblock']  = $_DB_table_prefix . 'nmoxqrblock';

// Plugin info
$_NMOXQRBLOCK = array(
	'pi_version' => '1.2.0',			// Plugin version
	'gl_version' => '1.4.0',			// GL version
	'pi_url'     => 'http://nmox.com/',	// Plugin Homepage
	'GROUPS'     => array(
		'nmoxqrblock Admin' => 'Users in this group can administer the nmoxqrblock plugin',
	),
	'FEATURES'   => array(
		'nmoxqrblock.edit' => 'Access to nmoxqrblock editor',
	),
	'MAPPINGS'   => array(
		'nmoxqrblock.edit' => array('nmoxqrblock Admin'),
	),
);

// Configuration values for GL-1.4.*.  Don't edit these for GL-1.5 or later.
// Instead, go to Configuration > nmoxqrblock
$_NMOXQRBLOCK['image_type']  = 'P';	// J=jpeg P=png
$_NMOXQRBLOCK['ecc_level']   = 'M';	// Error correction level
$_NMOXQRBLOCK['module_size'] = 2;	// Image module size
