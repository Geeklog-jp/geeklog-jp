<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Autotags Plugin 1.0                                                       |
// +---------------------------------------------------------------------------+
// | autoinstall.php                                                           |
// +---------------------------------------------------------------------------+
// | Autotags Plugin Copyright (C) 2006 by the following authors:              |
// |          Joe Mucchiello    - jmucchiello AT yahoo DOT com                 |
// +---------------------------------------------------------------------------+
// | Based on the Universal Plugin and prior work by the following authors:    |
// |                                                                           |
// | Copyright (C) 2000-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs       - tony AT tonybibbs DOT com                     |
// |          Tom Willett      - twillett AT users DOT sourceforge DOT net     |
// |          Blaine Lang      - langmail AT sympatico DOT ca                  |
// |          Dirk Haun        - dirk AT haun-online DOT de                    |
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

/**
* Plugin autoinstall function
*
* @param    string  $pi_name    Plugin name
* @return   array               Plugin information
*/
function plugin_autoinstall_autotags($pi_name) {
	$pi_name         = 'autotags';
	$pi_display_name = 'Autotags';
	$pi_admin        = $pi_display_name . ' Admin';

	$info = array(
		'pi_name'         => $pi_name,
		'pi_display_name' => $pi_display_name,
		'pi_version'      => '1.02jp3',
		'pi_gl_version'   => '1.4.0',
		'pi_homepage'     => 'http://www.geeklog.net/'
	);

	$groups = array(
		$pi_admin => 'Users in this group can administer the '
					 . $pi_display_name . ' plugin'
	);

	$features = array(
		$pi_name . '.admin' => 'Ability to create new Autotags',
		$pi_name . '.PHP'   => 'Ability to create Autotags which use a PHP function',
	);

	$mappings = array(
		$pi_name . '.admin'     => array($pi_admin)
	);

# 	$tables = array(
# 	);

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
* Check if the plugin is compatible with this Geeklog version
*
* @param    string  $pi_name    Plugin name
* @return   boolean             TRUE: plugin compatible; FALSE: not compatible
*/
function plugin_compatible_with_this_version_autotags($pi_name) {
	global $_CONF, $_DB_dbms;
	
	return ($_DB_dbms === 'mysql');
}

// Database tables
global $_DB_table_prefix, $_TABLES;

$_TABLES['autotags']  = $_DB_table_prefix . 'autotags_plg';	
