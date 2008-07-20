<?php

// +---------------------------------------------------------------------------+
// | userconfig Geeklog Plugin 1.0                                          |
// +---------------------------------------------------------------------------+
// | install.php                                                               |
// |                                                                           |
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

global $_TABLES,$_USER, $_USERCONFIG,$_CONF;

require_once('../../../lib-common.php');
require_once($_CONF['path'] . 'plugins/userconfig/config.php');
require_once($_CONF['path'] . 'plugins/userconfig/functions.inc');

//
// Universal plugin install variables
// Change these to match your plugin
//

$pi_name    = 'userconfig';             // Plugin name  Must be 15 chars or less
$pi_version = $_USERCONFIG['version'];  // Plugin Version
$gl_version = '1.4.0';                  // GL Version plugin for
//$pi_url     = 'http://www.tktools.jp/'; // Plugin Homepage
$pi_url     = 'http://nmox.com/'; // Plugin Homepage

//
// Default data
// Insert table name and sql to insert default data for your plugin.
//
$DEFVALUES = array();

// Default data
//$DEFVALUES['zencart Japan'] = "INSERT INTO {$_TABLES['pingservice']} (name, ping_url, site_url, method, is_enabled) VALUES ('zencart Japan', 'http://rpc.zencart.jp/rpc/ping', 'http://zencart.jp/', 'weblogUpdates.ping', 1)";
//$DEFVALUES['zencart'] = "INSERT INTO {$_TABLES['pingservice']} (name, ping_url, site_url, method, is_enabled) VALUES ('zencart', 'http://rpc.zencart.com', 'http://zencart.com/', 'weblogUpdates.ping', 1)";


// Only let Root users access this page
if (!SEC_inGroup('Root')) {
    // Someone is trying to illegally access this page
    COM_errorLog("Someone has tried to illegally access the zencart install/uninstall page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR",1);
    $display = COM_siteHeader();
    $display .= COM_startBlock($LANG_USERCONFIG['access_denied']);
    $display .= $LANG_USERCONFIG['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter(true);
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
function plugin_install_userconfig()
{
    global $pi_name, $pi_version, $gl_version, $pi_url;
    global $_TABLES,$_CONF,$_USERCONFIG;
    $result=copy($_USERCONFIG['userconfig_prepare'],$_USERCONFIG['userconfig_now']);
    $result*=chmod($_USERCONFIG['userconfig_now'],0666);
    if ($result==false) {
        plugin_uninstall_userconfig();
        return false;
        exit;
    }
    $result=copy($_USERCONFIG['userconfig_prepare'],$_USERCONFIG['userconfig_bak']);
    $result*=chmod($_USERCONFIG['userconfig_bak'],0666);
    if ($result==false) {
        plugin_uninstall_userconfig();
        return false;
        exit;
    }
    DB_query ("INSERT INTO {$_TABLES['groups']} (grp_name, grp_descr) VALUES ('userconfig Admin', 'Users in this group can administer the userconfig plugin')", 1);
    if (DB_error ()) {
        COM_errorLog ("userconfig plugin: Failed to create the userconfig Admin group.", 1);
        plugin_uninstall_userconfig ();
        return false;
    }
    $group_id = DB_getItem ($_TABLES['groups'], 'grp_id', "grp_name = 'userconfig Admin'");

    // Save the grp id for later uninstall
    COM_errorLog('About to save group_id to vars table for use during uninstall',1);
    DB_query("INSERT INTO {$_TABLES['vars']} VALUES ('{$pi_name}admingrpid', $group_id)",1);
    if (DB_error()) {
        plugin_uninstall_userconfig();
        return false;
        exit;
    }

    $NEWFEATURE = array ('userconfig.edit'=>"userconfig Admin Rights");
    // Add plugin Features
    foreach ($NEWFEATURE as $feature => $desc) {
        COM_errorLog("Adding $feature feature",1);
        DB_query("INSERT INTO {$_TABLES['features']} (ft_name, ft_descr) "
        . "VALUES ('$feature','$desc')",1);
        if (DB_error()) {
            COM_errorLog("Failure adding $feature feature",1);
            plugin_uninstall_userconfig();
            return false;
            exit;
        }
        $feat_id = DB_insertId();
        COM_errorLog("Success",1);
        COM_errorLog("Adding $feature feature to admin group",1);
        DB_query("INSERT INTO {$_TABLES['access']} (acc_ft_id, acc_grp_id) VALUES ($feat_id, $group_id)");
        if (DB_error()) {
            COM_errorLog("Failure adding $feature feature to admin group",1);
            plugin_uninstall_userconfig();
            return false;
            exit;
        }
        COM_errorLog("Success",1);
    }

    DB_query ("INSERT INTO {$_TABLES['group_assignments']} (ug_main_grp_id, ug_uid, ug_grp_id) VALUES ($group_id, NULL, 1)");
    if (DB_error ()) {
        COM_errorLog ("userconfig plugin: Failed to add userconfig Admin group to Root group.", 1);
        plugin_uninstall_userconfig ();
        return false;
    }

    //  DB_query ("INSERT INTO {$_TABLES['vars']} (name, value) VALUES ('userconfig.edit', 1)");
    //  if (DB_error ()) {
    //      COM_errorLog ("userconfig plugin: Failed to set default for userconfig.edit setting.", 1);
    //      plugin_uninstall_userconfig ();
    //      return false;
    //  }
    //
    //  DB_query ("INSERT INTO {$_TABLES['vars']} (name, value) VALUES ('userconfig.delete', 1)");
    //  if (DB_error ()) {
    //      COM_errorLog ("userconfig plugin: Failed to set default for userconfig.delete setting.", 1);
    //      plugin_uninstall_userconfig ();
    //      return false;
    //  }

    // Register the plugin with Geeklog
    COM_errorLog("Registering {$pi_name} plugin with Geeklog", 1);
    DB_delete($_TABLES['plugins'],'pi_name',$pi_name);
    DB_query("INSERT INTO {$_TABLES['plugins']} (pi_name, pi_version, pi_gl_version, pi_homepage, pi_enabled) "
    . "VALUES ('$pi_name', '$pi_version', '$gl_version', '$pi_url', 1)");

    if (DB_error()) {
        plugin_uninstall_userconfig();
        return false;
        exit;
    }

    COM_errorLog("Succesfully installed the {$pi_name} Plugin!",1);
    return true;
}

/*
* Main Function
*/
//print($_POST['action']);
$display = COM_siteHeader();
$T = new Template($_CONF['path'] . 'plugins/userconfig/templates');
$T->set_file('install', 'install.thtml');
$T->set_var('install_header', $LANG_USERCONFIG['install_header']);
$T->set_var('cgiurl', $_CONF['site_admin_url'] . '/plugins/userconfig/install.php');

$action = COM_applyFilter($_POST['action']);
if ($action == $LANG_USERCONFIG['install']) {
//if ($action == "install") {
    if (plugin_install_userconfig()) {
        $T->set_var('installmsg1',$LANG_USERCONFIG['install_success']);
    } else {
        $T->set_var('installmsg1',$LANG_USERCONFIG['install_failed']);
    }
} else if ($action == $LANG_USERCONFIG["uninstall"]) {
    plugin_uninstall_userconfig('installed');
    $T->set_var('installmsg1',$LANG_USERCONFIG['uninstall_msg']);
}

if (DB_count($_TABLES['plugins'], 'pi_name', $pi_name) == 0) {
    $T->set_var('installmsg2', $LANG_USERCONFIG['uninstalled']);
    $T->set_var('btnmsg', $LANG_USERCONFIG['install']);
    $T->set_var('action',$LANG_USERCONFIG['install']);
} else {
    $T->set_var('installmsg2', $LANG_USERCONFIG['installed']);
    $T->set_var('btnmsg', $LANG_USERCONFIG['uninstall']);
    $T->set_var('action',$LANG_USERCONFIG['uninstall']);
}
$T->parse('output','install');
$display .= $T->finish($T->get_var('output'));
$display .= COM_siteFooter(true);

echo $display;

?>