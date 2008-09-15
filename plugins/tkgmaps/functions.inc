<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------+
// | functions.inc                                                             |
// +---------------------------------------------------------------------------+
// | This file does two things: 1) it implements the necessary Geeklog Plugin  |
// | API method and 2) implements all the common code needed by the tkgmaps   |
// | PHP files.                                                                |
// |                                                                           |
// | This is a generic functions.inc for Geeklog 1.4.1.  Edit this file with   |
// | your favorite editor and replace every instance of tkgmaps,              |
// | TKGMAPS, TKGMAPS and GoogleMaps with the name    |
// | of your plugin.  You will then have a skeletal working functions.inc.     |
// | See documentation to fill in API implementations you man need.            |
// | You must also fill in the two arrays in the uninstall routine for it to   |
// | work properly.                                                            |
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

/**
* This is the generic functions.inc for the Universal Plugin Toolkit for Geeklog.
* You need to change all instances of tkgmaps with the name of your plugin.
*/

if (strpos ($_SERVER['PHP_SELF'], 'functions.inc') !== false) {
    die ('This file can not be used on its own.');
}

if (!defined('XHTML')) {
    define('XHTML', '');
}

/**
* Language file Include
*/

$langfile = $_CONF['path'] . 'plugins/tkgmaps/language/'
          . $_CONF['language'] . '.php';

if ( file_exists( $langfile ) ) {
    include_once $langfile;
} else {
    include_once $_CONF['path'] . 'plugins/tkgmaps/language/japanese_utf-8.php';
}

/*
* Include tkgmaps config file
*/

require_once $_CONF['path'] . 'plugins/tkgmaps/config.php';
require_once $_CONF['path'] . 'plugins/tkgmaps/function_tkgmaps.php';
require_once $_CONF['path'] . 'plugins/tkgmaps/function_tkgmaps-admin.php';

if (version_compare(VERSION, '1.5.0') < 0) {
    if (!function_exists('SEC_checkToken')) {
        function SEC_checkToken() {
            return true;
        }
    }
}


// +---------------------------------------------------------------------------+
// | Geeklog Plugin API Implementations                                        |
// +---------------------------------------------------------------------------+

/**
* Returns the items for this plugin that should appear on the main menu
*
* NOTE: this MUST return the url/value pairs in the following format
* $<arrayname>[<label>] = <url>
*
* @return    array   Associative array of menu items to be added to menu
*
*/

function plugin_getmenuitems_tkgmaps ()
{
    global $_CONF, $_USER, $_TKGMAPS_CONF, $LANG_TKGMAPS;

    $anon = (empty ($_USER['uid']) || ($_USER['uid'] <= 1)) ? true : false;
    if (($_TKGMAPS_CONF['hidemenu'] == 1) || ($anon &&
            ($_CONF['loginrequired'] || $_TKGMAPS_CONF['loginrequired']))) {
        return false;
    }

    $menuitems[ $LANG_TKGMAPS['menu_title'] ] = $_CONF['site_url'] . '/tkgmaps/index.php';

    return $menuitems;
}

/**
* Check to see if this Plugin uses comments
*
* Geeklog is checking to see if this plugin supports comments, tell it no!
* NOTE: to support comments you must use the same date/time based ID for your
* widget.  In other words, to make primary keys for your plugin you should call
* makesid().  Comments are keyed off of that...it is a limitation on how geeklog
* does comments.
*
* @return   boolean true or false
*
*/

function plugin_commentsupport_tkgmaps ()
{
    return false;
}

/**
* Shows the statistics for the tkgmaps plugin on stats.php.
* If $showsitestats is 1 then we are to only print the overall stats in the
* 'site statistics box' otherwise we show the detailed stats
*
* @param    int showsitestate   Flag to let us know which stats to get
* @return   string  returns formatted HTML to insert in stats page
*
*/

function plugin_showstats_tkgmaps ( $showsitestats )
{
//    global $_CONF, $_TABLES, $LANG_TKGMAPS;
//
//    require_once ($_CONF['path_system'] . 'lib-admin.php');

    $retval = '';

//    $result = DB_query ("SELECT title,value FROM {$_TABLES['tkgmaps']} WHERE (value > 0)" . COM_getPermSQL ('AND') . " ORDER BY value DESC LIMIT 10");
//    $nrows  = DB_numRows ($result);
//    if ($nrows > 0) {
//        $header_arr = array(
//            array('text'         => $LANG_TKGMAPS['stats_title'],
//                  'field'        => 'title',
//                  'header_class' => 'stats-header-title'
//            ),
//            array('text'         => $LANG_TKGMAPS['stats_value'],
//                  'field'        => 'value',
//                  'header_class' => 'stats-header-count',
//                  'field_class'  => 'stats-list-count'
//            )
//        );
//        $data_arr = array();
//        $text_arr = array('has_menu' => false,
//                          'title'    => $LANG_TKGMAPS['stats_headline'],
//        );
//        for ($i = 0; $i < $nrows; $i++) {
//            $A = DB_fetchArray ($result);
//            $title = stripslashes (str_replace ('$', '&#36;', $A['title']));
//            $value = COM_numberFormat ($A['value']);
//            $data_arr[] = array('title' => $title,
//                                'value' => $value
//                          );
//        }
//        $retval .= ADMIN_simpleList ('', $header_arr, $text_arr, $data_arr);
//    } else {
//        $retval .= COM_startBlock ($LANG_TKGMAPS['stats_headline']);
//        $retval .= $LANG_TKGMAPS['stats_no_value'];
//        $retval .= COM_endBlock ();
//    }

    return $retval;
}

/**
* This will put an option for tkgmaps in the command and control block on
* moderation.php
*
* Add the plugin name, icon and link to the command and control block in moderation.php
*
* @return   array   Array containing (plugin name, admin url, url of plugin icon)
*
*/

function plugin_cclabel_tkgmaps ()
{
    global $_CONF, $LANG_TKGMAPS;

    if (SEC_hasRights ('tkgmaps.admin')) {
        return array ($LANG_TKGMAPS['display_name'],
                      $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
                      plugin_geticon_tkgmaps ());
    }

    return false;
}

/**
* Returns the URL of the plugin's icon
*
* @return   string      URL of the icon
*
*/

function plugin_geticon_tkgmaps ()
{
    global $_CONF;

    return $_CONF['site_url'] . '/tkgmaps/images/tkgmaps.gif';
}

/**
* returns the administrative option for this plugin
*
* Adds the plugin to the Admin menu
*
* Universal Plugin:  Modify use it
*
* @return   mixed   array(title, url, num. items), or void when not allowed
*
*/

function plugin_getadminoption_tkgmaps ()
{
    global $_CONF, $_TABLES, $LANG_TKGMAPS;

//  if ( SEC_hasRights( 'tkgmaps.admin,tkgmaps.edit', 'OR' ) ) {
    if ( SEC_hasRights( 'tkgmaps.admin', 'OR' ) ) {
        $pi_name   = $LANG_TKGMAPS['display_name'];
        $admin_url = $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php';
        $num_items = '';
//      $num_items = DB_count( $_TABLES['tkgmaps'] );
        return array ( $pi_name, $admin_url, $num_items );
    }
}

/**
* Called by the plugin Editor to display the current plugin code version
* This may be different than the version installed and registered currently.
* If newer then you may want to run the update
*
* @return   string  version number
*
*/

function plugin_chkVersion_tkgmaps () 
{
    global $_TKGMAPS_CONF;
    
    return $_TKGMAPS_CONF['version'];
}

/**
* Returns the user option for this plugin
*
* Adds the plugin to the user menu
*
* Universal Plugin:  modify/uncomment use it
*
* @return   array   Array containing (plugin name, plugin user url, 0)
*
*/

function plugin_getuseroption_tkgmaps ()
{
//    global $_CONF;

//    if ( SEC_hasRights( 'tkgmaps.edit,tkgmaps.view','OR' ) ) {
//        $pi_name = ucfirst( "tkgmaps" );
//        $url     = $_CONF['site_url'] . '/tkgmaps/index.php';
//        return array ( $pi_name, $url, 0 );
//    }
}

/**
* Upgrade the tkgmaps plugin
*
* @return   int     Number of message to display (true = generic success msg)
*
*/

function plugin_upgrade_tkgmaps ()
{
    global $_CONF, $_TABLES, $_TKGMAPS_CONF;

    // the plugin needs these functions so complain when they doesn't exist
    if (!function_exists ('COM_truncate') || !function_exists ('MBYTE_strpos')) {
        return 3002;
    }

    // no db changes - just update the version numbers
    DB_query ("UPDATE {$_TABLES['plugins']} SET pi_version = '{$_TKGMAPS_CONF['version']}', pi_gl_version = '"
            . VERSION . "' WHERE pi_name = 'tkgmaps'");

    return true;
}

/**
* Removes the datastructures for this plugin from the Geeklog database.
* This routine will get called from the Plugin install program if user select De-Install or if Delete is used in the Plugin Editor.
* The Plugin Installer will also call this routine upon and install error to remove anything it has created.
* The Plugin installer will pass the optional parameter which will then double check that plugin has first been disabled. 
* 
* For this plugin, this routine will also remove the Block definition.
* 
* Returns True if all Plugin related data is removed without error
*
* @param    string   $installCheck     Default is blank but if set, check if plugin is disabled first
* 
* @return   boolean True if successful false otherwise
*
*/  

function plugin_uninstall_tkgmaps ( $installCheck = '' )
{
    global $_TABLES, $LANG_TKGMAPS;

    $pi_name  = 'tkgmaps';
    $pi_admin = 'GoogleMaps Admin';

    // $FEATURES and $TABLES have to be changed accodrding to your plugin
    $FEATURES = array ( 'tkgmaps.admin' );
//  $FEATURES = array ( 'tkgmaps.admin', 'tkgmaps.view', 'tkgmaps.edit' );
    $TABLES   = array ( 'tkgmaps' );
    
    // Check and see if plugin is still enabled - if so display warning and exit
    if ( $installCheck != '' && DB_getItem ( $_TABLES['plugins'], 'pi_enabled', 'pi_name = "' . $pi_name . '"' ) ) {
        COM_errorLog ( "Plugin is installed and enabled. Disable first if you want to de-install it", 1 );
        $display .= COM_startBlock ( $LANG_TKGMAPS['warning'] );
        $display .= $LANG_TKGMAPS['enabled'];
        $display .= COM_endBlock ();
        echo $display;
        return false;
        exit;
    }
        
    // Ok to proceed and delete plugin

    // Drop GoogleMaps tables
    foreach ( $TABLES as $table ) {
        $t = $_TABLES["$table"];
        COM_errorLog ('Dropping $table table', 1);
        DB_query ( "DROP TABLE $t", 1 );
        COM_errorLog ('...success', 1);
    }

    // Remove Security for this plugin
    $grp_id = DB_getItem ($_TABLES['groups'], 'grp_id',"grp_name = '$pi_admin'");
    if (!empty ($grp_id)) {
        // Remove GoogleMaps Admin group from all other groups
        COM_errorLog ('Attempting to remove $pi_admin group from all groups' , 1);
        DB_query ("DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $grp_id");
        COM_errorLog ('...success', 1);

        // Remove the GoogleMaps Admin group
        COM_errorLog('Attempting to remove the $pi_admin Group', 1);
        DB_query ("DELETE FROM {$_TABLES['groups']} WHERE grp_id = $grp_id");
        COM_errorLog('...success', 1);
    }
    
    // Remove related features
    foreach ($FEATURES as $f) {
        $feat_id = DB_getItem ($_TABLES['features'], 'ft_id', "ft_name = '$f'");
        if (!empty ($feat_id)) {
            COM_errorLog ("Attempting to remove $f rights from all groups", 1);
            DB_query ("DELETE FROM {$_TABLES['access']} WHERE acc_ft_id = $feat_id");
            COM_errorLog ('...success', 1);

            COM_errorLog ("Attempting to remove the $f feature", 1);
            DB_query ("DELETE FROM {$_TABLES['features']} WHERE ft_id = $feat_id");
            COM_errorLog ('...success', 1);
        }
    }
    
    // Unregister the plugin with Geeklog
    // Always attempt to remove these entries or lib-common.php would still
    // try and read our functions.inc file ...
    COM_errorLog ('Attempting to unregister the $pi_name plugin from Geeklog', 1);
    DB_query ("DELETE FROM {$_TABLES['plugins']} WHERE pi_name = '$pi_name'");
    COM_errorLog ('...success',1);

    COM_errorLog ('Finished uninstalling the $pi_name plugin.', 1);

    return true;
}


?>