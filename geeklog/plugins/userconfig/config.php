<?php
//
// +---------------------------------------------------------------------------+
// | userconfig Geeklog Plugin 1.0                                             |
// +---------------------------------------------------------------------------+
// | config.php                                                                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 by nmox                                                |
// |                                                                           |
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
//



$_USERCONFIG['version'] = '1.3.3';

$_USERCONFIG['hideuserconfigmenu']=0;

$_USERCONFIG['userconfig'] = (isset($LANG_USERCONFIG['userconfig'])?$LANG_USERCONFIG['userconfig']:"userconfig");

$_USERCONFIG['userconfig_now'] = $_CONF['path_data']."userconfig_now.php";
$_USERCONFIG['userconfig_bak'] = $_CONF['path_data']."userconfig_bak.php";
$_USERCONFIG['userconfig_prepare'] = $_CONF['path']."plugins/userconfig/userconfig_prepare.php";

?>
