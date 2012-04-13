<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | public_html//nmoxqrblock/index.php                                        |
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

require_once '../lib-common.php';

if (in_array('nmoxqrblock', $_PLUGINS)) {
	if (isset($_GET['q'])) {
		$q = COM_applyFilter($_GET['q']);
		
		if (file_exists($_CONF['path_data'] . $q)) {
			if (preg_match('/\.jpg$/', $q)) {
				header('Content-Type: image/jpeg');
			} else {
				header('Content-Type: image/png');
			}
			
			echo file_get_contents($_CONF['path_data'] . $q);
		}
	} else {
		NMOXQRBLOCK_display($_GET);
	}
}
