<?php
// +--------------------------------------------------------------------------+
// | Captcha Plugin 3.4 - geeklog CMS                                         |
// +--------------------------------------------------------------------------+
// | ajax.php                                                                 |
// +--------------------------------------------------------------------------+
// | Copyright (C) 2013 by the following authors:                             |
// |                                                                          |
// | Authors: ::Ben - cordiste AT free DOT fr                                 |
// +--------------------------------------------------------------------------+
// |                                                                          |
// | This program is free software; you can redistribute it and/or            |
// | modify it under the terms of the GNU General Public License              |
// | as published by the Free Software Foundation; either version 2           |
// | of the License, or (at your option) any later version.                   |
// |                                                                          |
// | This program is distributed in the hope that it will be useful,          |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
// | GNU General Public License for more details.                             |
// |                                                                          |
// | You should have received a copy of the GNU General Public License        |
// | along with this program; if not, write to the Free Software Foundation,  |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.          |
// |                                                                          |
// +--------------------------------------------------------------------------+


require_once '../lib-common.php';

// Incoming variable filter
$vars = array('action'    => 'alpha'
			  );
			  
CAPTCHA_filterVars($vars, $_REQUEST);

$allowed_actions = array('visit_captcha_config');


if ( !in_array($_REQUEST['action'], $allowed_actions) ) {
	exit();
}

switch ($_REQUEST['action']) 
{
	case 'visit_captcha_config' :
		DB_query("UPDATE {$_TABLES['vars']} SET value='0' WHERE name = 'captcha_upgrade'");
		break;
	
	default :
	    echo $LANG_SPHERE_1['loading'];
		break;
}

?>