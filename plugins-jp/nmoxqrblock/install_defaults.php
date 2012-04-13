<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/install_defaults.php                          |
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
    die('This file cannot be used on its own!');
}

/**
* nmoxqrblock default settings
*
* Initial Installation Defaults used when loading the online configuration
* records.  These settings are only used during the initial installation
* and not referenced any more once the plugin is installed
*
*/
global $_NMOXQRBLOCK_DEFAULT;

$_NMOXQRBLOCK_DEFAULT = array();

// Image type
$_NMOXQRBLOCK_DEFAULT['image_type'] = 'P';

// Error correction level L, M, Q, H
$_NMOXQRBLOCK_DEFAULT['ecc_level'] = 'M';

// Image module size
$_NMOXQRBLOCK_DEFAULT['module_size'] = 2;

/**
* Initializes nmoxqrblock plugin configuration
*
* @return   boolean     TRUE: success; FALSE: an error occurred
*/
function plugin_initconfig_nmoxqrblock() {
    global $_NMOXQRBLOCK_DEFAULT;
	
	$me = 'nmoxqrblock';
    $c = config::get_instance();
	
    if (!$c->group_exists($me)) {
        $c->add('sg_main', NULL, 'subgroup', 0, 0, NULL, 0, TRUE, $me);
        $c->add('fs_main', NULL, 'fieldset', 0, 0, NULL, 0, TRUE, $me);
        $c->add('image_type', $_NMOXQRBLOCK_DEFAULT['image_type'], 'select', 0, 0, 12, 10, TRUE, $me);
        $c->add('ecc_level', $_NMOXQRBLOCK_DEFAULT['ecc_level'], 'select', 0, 0, 13, 20, TRUE, $me);
        $c->add('module_size', $_NMOXQRBLOCK_DEFAULT['module_size'], 'text', 0, 0, NULL, 30, TRUE, $me);
    }
	
    return TRUE;
}
