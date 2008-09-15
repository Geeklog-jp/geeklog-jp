<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------+
// | admin/install.php                                                         |
// +---------------------------------------------------------------------------+
// | This file installs and removes the data structures for the                |
// | plugin for Geeklog.                                                       |
// | This is a complete functioning install routine.  All you have to do is    |
// | remove the sample data from the arrays and fill in the $GROUPS, $FEATURES |
// | $MAPPINGS, and $DEFVALUES arrays with your data.  Then replace all        |
// | occurances of tkgmaps and GoogleMaps with the name of your plugin    |
// | and you will have a functioning install page for your plugin.             |
// | Then customize the install display language in english.php and you are    |
// | ready to distribute your plugin.                                          |
// | Simply put here is what this install does:                                |
// | 1) It creates the tables                                                  |
// | 2) It creates an admin security group for you plugin                      |
// | 3) It adds the security features and adds them to the admin group         |
// | 4) It adds the plugin to the gl_plugins table                             |
// | 5) It adds any default data you have provided                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2002 by the following authors:                              |
// |                                                                           |
// | Author:                                                                   |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
// |                                                                           |
// | modified by mystral-kk      - geeklog AT mystral-k DOT net                |
// | modified by dengen          - dengen AT mail DOT trybase DOT com          |
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
// 2008.05.14 v0.9 customed by G-COE, CSEAS. Addition of GoogleMapsEditor API Auto Tags
// Authors: Kinoshita
// Authors: Hiroron
// Director: IVY WE CO.,LTD. Komma
// $Id$

require_once '../../../lib-common.php';
require_once $_CONF['path'] . 'plugins/tkgmaps/config.php';
require_once $_CONF['path'] . 'plugins/tkgmaps/functions.inc';

//
// Universal plugin install variables
// Change these to match your plugin
//

// Plugin display name
$pi_display_name = 'GoogleMaps';


// Plugin name  Must be 15 chars or less
$pi_name    = 'tkgmaps';


// Plugin Version
$pi_version = $_TKGMAPS_CONF['version'];


// GL Version plugin for
$gl_version = '1.4.1';


// Plugin Homepage
$pi_url     = 'http://www.tktools.jp';


// Name of the Admin group
$pi_admin   = $pi_display_name . ' Admin';


// The plugin's groups - assumes first group to be the Admin group
$GROUPS = array();
$GROUPS[$pi_admin] = 'Has full access to ' . $pi_name . ' features';


//
// Security Feature(s) to add
// Fill in your security features here
// Note you must add these features to the uninstall routine in function.inc so that they will
// be removed when the uninstall routine runs.
// You do not have to use these particular features.  You can edit/add/delete them
// to fit your plugins security model
//
$FEATURES = array ();
$FEATURES['tkgmaps.admin'] = "GoogleMaps Admin";
//$FEATURES['tkgmaps.view']  = "GoogleMaps Viewer";
//$FEATURES['tkgmaps.edit']  = "GoogleMaps Editor";

$MAPPINGS = array ();
$MAPPINGS['tkgmaps.admin'] = array ($pi_admin);
//$MAPPINGS['tkgmaps.view']  = array ($pi_admin);
//$MAPPINGS['tkgmaps.edit']  = array ($pi_admin);


//
// (optional) data to pre-populate tables with
// Insert table name and sql to insert default data for your plugin.
// Note: '#group#' will be replaced with the id of the plugin's admin group.
//
$DEFVALUES = array ();
$DEFVALUES[] = "INSERT INTO " . $_TABLES['tkgmaps'] . " (googlemapsapikey) VALUES ('取得したkeyを入れてください')";
//$DEFVALUES[] = "INSERT INTO " . $_TABLES['table1'] . " (title, value) VALUES ('More Sample Data', 200)";
//$DEFVALUES[] = "INSERT INTO " . $_TABLES['table2'] . " VALUES ('" . $_SERVER['REMOTE_ADDR'] . "')";
//$DEFVALUES[] = "REPLACE INTO " . $_TABLES['autotags'] . " VALUES('googlemaps', '', 1, 1, '')";
//$DEFVALUES[] = "REPLACE INTO " . $_TABLES['autotags'] . " VALUES('map', '', 1, 1, '')";


/**
 * Checks the requirements for this plugin and if it is compatible with this
 * version of Geeklog.
 *
 * @return   boolean     true = proceed with install, false = not compatible
 *
 */
function plugin_compatible_with_this_geeklog_version ()
{
    if (!function_exists ('COM_truncate') || !function_exists ('MBYTE_strpos')) {
        return false;
    }

    return true;
}

//
// ----------------------------------------------------------------------------
//
// The code below should be the same for most plugins and usually won't
// require modifications.

$base_path = $_CONF['path'] . 'plugins/' . $pi_name . '/';

//$langfile = $base_path . 'language/' . $_CONF['language'] . '.php';
//if (file_exists ($langfile)) {
//    require_once ($langfile);
//} else {
//    require_once ($base_path . 'language/english.php');
//}
//require_once ($base_path . 'config.php');
//require_once ($base_path . 'functions.inc');


// Only let Root users access this page
if ( !SEC_inGroup( 'Root' ) ) {
    // Someone is trying to illegally access this page
    COM_accessLog( "Someone has tried to illegally access the tkgmaps install/uninstall page.  "
             . "User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR", 1 );

    $display = COM_siteHeader('menu', $LANG_ACCESS['accessdenied'])
             . COM_startBlock($LANG_ACCESS['accessdenied'])
             . $LANG_ACCESS['plugin_access_denied_msg']
             . COM_endBlock()
             . COM_siteFooter();

    echo $display;
    exit;
}
 
/**
* Puts the datastructures for this plugin into the Geeklog database
*
* Note: Corresponding uninstall routine is in functions.inc
* 
* @return   boolean True if successful False otherwise
*
*/

function plugin_install_now()
{
    global $_CONF, $_TABLES, $_USER, $_DB_dbms,
           $GROUPS, $FEATURES, $MAPPINGS, $DEFVALUES, $base_path,
           $pi_name, $pi_display_name, $pi_version, $gl_version, $pi_url;

    COM_errorLog ("Attempting to install the $pi_display_name plugin", 1);

    $uninstall_plugin = 'plugin_uninstall_' . $pi_name;

    // Create the plugin's groups
    $admin_group_id = 0;
    foreach ($GROUPS as $name => $desc) {
        COM_errorLog ("Attempting to create $name group", 1);

        $grp_name = addslashes ($name);
        $grp_desc = addslashes ($desc);
        DB_query ("INSERT INTO {$_TABLES['groups']} (grp_name, grp_descr) VALUES ('$grp_name', '$grp_desc')", 1);
        if (DB_error ()) {
            $uninstall_plugin ();

            return false;
        }

        // replace the description with the new group id so we can use it later
        $GROUPS[$name] = DB_insertId ();

        // assume that the first group is the plugin's Admin group
        if ($admin_group_id == 0) {
            $admin_group_id = $GROUPS[$name];
        }
    }
    
    // Create the plugin's table(s)
    $_SQL = array ();
    if (file_exists ($base_path . 'sql/' . $_DB_dbms . '_install.php')) {
        require_once ($base_path . 'sql/' . $_DB_dbms . '_install.php');
    }

    if (count ($_SQL) > 0) {
        $use_innodb = false;
        if (($_DB_dbms == 'mysql') &&
            (DB_getItem ($_TABLES['vars'], 'value', "name = 'database_engine'")
                == 'InnoDB')) {
            $use_innodb = true;
        }
        foreach ($_SQL as $sql) {
            $sql = str_replace ('#group#', $admin_group_id, $sql);
            if ($use_innodb) {
                $sql = str_replace ('MyISAM', 'InnoDB', $sql);
            }
            DB_query ($sql);
            if (DB_error ()) {
                COM_errorLog ('Error creating table', 1);
                $uninstall_plugin ();

                return false;
            }
        }
    }
    
    // Add the plugin's features
    COM_errorLog ("Attempting to add $pi_display_name feature(s)", 1);

    foreach ($FEATURES as $feature => $desc) {
        $ft_name = addslashes ($feature);
        $ft_desc = addslashes ($desc);
        DB_query ("INSERT INTO {$_TABLES['features']} (ft_name, ft_descr) "
                  . "VALUES ('$ft_name', '$ft_desc')", 1);
        if (DB_error ()) {
            $uninstall_plugin ();

            return false;
        }

        $feat_id = DB_insertId ();

        if (isset ($MAPPINGS[$feature])) {
            foreach ($MAPPINGS[$feature] as $group) {
                COM_errorLog ("Adding $feature feature to the $group group", 1);
                DB_query ("INSERT INTO {$_TABLES['access']} (acc_ft_id, acc_grp_id) VALUES ($feat_id, {$GROUPS[$group]})");
                if (DB_error ()) {
                    $uninstall_plugin ();

                    return false;
                }
            }
        }
    }

    // Add plugin's Admin group to the Root user group
    // (assumes that the Root group's ID is always 1)
    COM_errorLog ("Attempting to give all users in the Root group access to the $pi_display_name's Admin group", 1);

    DB_query ("INSERT INTO {$_TABLES['group_assignments']} VALUES "
              . "($admin_group_id, NULL, 1)");
    if (DB_error ()) {
        $uninstall_plugin ();

        return false;
    }

    // Pre-populate tables or run any other SQL queries
    COM_errorLog ('Inserting default data', 1);
    foreach ($DEFVALUES as $sql) {
        $sql = str_replace ('#group#', $admin_group_id, $sql);
        DB_query ($sql, 1);
        if (DB_error ()) {
            $uninstall_plugin ();

            return false;
        }
    }

    // Finally, register the plugin with Geeklog
    COM_errorLog ("Registering $pi_display_name plugin with Geeklog", 1);

    // silently delete an existing entry
    DB_delete ($_TABLES['plugins'], 'pi_name', $pi_name);

    DB_query("INSERT INTO {$_TABLES['plugins']} (pi_name, pi_version, pi_gl_version, pi_homepage, pi_enabled) "
        . "VALUES ('$pi_name', '$pi_version', '$gl_version', '$pi_url', 1)");

    if (DB_error ()) {
        $uninstall_plugin ();

        return false;
    }

    // give the plugin a chance to perform any post-install operations
    if (function_exists ('plugin_postinstall')) {
        if (!plugin_postinstall ()) {
            $uninstall_plugin ();

            return false;
        }
    }

    COM_errorLog ("Successfully installed the $pi_display_name plugin!", 1);
    
    return true;
}

// MAIN
$display = '';

if ($_REQUEST['action'] == 'uninstall') {
    $uninstall_plugin = 'plugin_uninstall_' . $pi_name;
    if ($uninstall_plugin ()) {
        $display = COM_refresh ($_CONF['site_admin_url']
                                . '/plugins.php?msg=45');
    } else {
        $display = COM_refresh ($_CONF['site_admin_url']
                                . '/plugins.php?msg=73');
    }
} else if (DB_count ($_TABLES['plugins'], 'pi_name', $pi_name) == 0) {
    // plugin not installed

    if (plugin_compatible_with_this_geeklog_version ()) {
        if (plugin_install_now ()) {
            $display = COM_refresh ($_CONF['site_admin_url']
                                    . '/plugins.php?msg=44');
        } else {
            $display = COM_refresh ($_CONF['site_admin_url']
                                    . '/plugins.php?msg=72');
        }
    } else {
        // plugin needs a newer version of Geeklog
        $display .= COM_siteHeader ('menu', $LANG32[8])
                 . COM_startBlock ($LANG32[8])
                 . '<p>' . $LANG32[9] . '</p>'
                 . COM_endBlock ()
                 . COM_siteFooter ();
    }
} else {
    // plugin already installed
    $display .= COM_siteHeader ('menu', $LANG01[77])
             . COM_startBlock ($LANG32[6])
             . '<p>' . $LANG32[7] . '</p>'
             . COM_endBlock ()
             . COM_siteFooter();
}

echo $display;

?>