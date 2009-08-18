<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Site Calendar Plugin 'mycaljp' version 2.0.0                      |
// | Only Supported with Geeklog 1.4.1 and new Search Class                    |
// +---------------------------------------------------------------------------+
// | functions.inc                                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2007 by the following authors:                         |
// | Geeklog Author:       Tony Bibbs   - tony@tonybibbs.com                   |
// | mycal Block Author:   Blaine Lang  - geeklog@langfamily.ca                |
// | mycaljp Plugin Author: Yoshinori Tahara - dengen                          |
// | Original PHP Calendar by Scott Richardson - srichardson@scanonline.com    |
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
//

/**
* This is the generic functions.inc for the Universal Plugin Toolkit for Geeklog.
* You need to change all instances of mycaljp with the name of your plugin.
*/

if (strpos(strtolower($_SERVER['PHP_SELF']), 'functions.inc') !== false) {
    die ('This file can not be used on its own.');
}

if ( !defined('XHTML') ) {
    define('XHTML', '');
}

if (!defined('GL_VERSION_15')) {
    define('GL_VERSION_15', (version_compare(VERSION, '1.5') >= 0));
}

if (!defined(CSRF_TOKEN)) {
    define('CSRF_TOKEN', 'token');
}

/**
* Language file Include
*/
$langfile = $_CONF['path'] . 'plugins/mycaljp/language/'
          . $_CONF['language'] . '.php';

if ( file_exists( $langfile ) ) {
    include_once $langfile;
} else {
    include_once $_CONF['path'] . 'plugins/mycaljp/language/english.php';
}

/*
* Include mycaljp config file
*/
require_once $_CONF['path'] . 'plugins/mycaljp/config.php';

// +---------------------------------------------------------------------------+
// | Geeklog Plugin API Implementations                                        |
// +---------------------------------------------------------------------------+


/**
* This will put an option for the plugin in the command and control block on moderation.php
*
* Add the plugin name, icon and link to the command and control block in moderation.php
*
* @return   array   Array containing (plugin name, admin url, url of plugin icon)
*
*/

function plugin_cclabel_mycaljp()
{
    global $_CONF;

    $pi_name   = ucfirst( 'mycaljp' );
    $admin_url = $_CONF['site_admin_url'] . '/plugins/mycaljp/index.php';
    $icon_url  = $_CONF['site_url'] . '/mycaljp/images/mycaljp.png';

    return array ( $pi_name, $admin_url, $icon_url );
}

/**
* Returns the administrative option for this plugin
*
* Adds the plugin to the Admin menu
*
* @return   array   Array containing (plugin name, plugin admin url, # of items in plugin or '')
*
*/

function plugin_getadminoption_mycaljp()
{
    global $_CONF, $_TABLES;

    if ( SEC_hasRights( 'mycaljp.admin' ) ) {
        $pi_name   = ucfirst( 'mycaljp' );
        $admin_url = $_CONF['site_admin_url'] . '/plugins/mycaljp/index.php';
        $num_items = '';
        return array ( $pi_name, $admin_url, $num_items );
    }
}

/*
 * Returns the version for this plugin
 *
 * @return string VersionNo
 */

function plugin_chkVersion_mycaljp()
{
    global $_MYCALJP2_CONF;
    
    return $_MYCALJP2_CONF['pi_version'];
}

/**
* Upgrade the plugin
*
* @return   boolean true (= success)
*
*/

function plugin_upgrade_mycaljp()
{
    global $_CONF, $_TABLES, $_MYCALJP2_CONF;

    $result = DB_query( "SELECT pi_version FROM {$_TABLES['plugins']} WHERE (pi_name = 'mycaljp')" );
    $A = DB_fetchArray( $result );
    $pi_version = $A['pi_version'];     // Version info stored in database
    
    // Update plugin info
    
    $result = DB_query( "UPDATE {$_TABLES['plugins']} SET pi_version = \"{$_MYCALJP2_CONF['pi_version']}\" WHERE (pi_name = 'mycaljp')" );
    COM_errorLog( ucfirst( "mycaljp" ) . " plugin was successfully updated to version {$_MYCALJP2_CONF['pi_version']}." );
    
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

function plugin_uninstall_mycaljp ( $installCheck = '' )
{
    global $_TABLES, $LANG_MYCALJP, $_CONF;

    $pi_name  = 'mycaljp';
    $pi_admin = 'Mycaljp Admin';

    // $FEATURES and $TABLES have to be changed accodrding to your plugin
    $FEATURES = array ( 'mycaljp.admin' );
    $TABLES   = array ();
    
    // Check and see if plugin is still enabled - if so display warning and exit
    if ( $installCheck != '' && DB_getItem ( $_TABLES['plugins'], 'pi_enabled', 'pi_name = "' . $pi_name . '"' ) ) {
        COM_errorLog ( "Plugin is installed and enabled. Disable first if you want to de-install it", 1 );
        $display .= COM_startBlock ( $LANG_MYCALJP['warning'] );
        $display .= $LANG_MYCALJP['enabled'];
        $display .= COM_endBlock();
        echo $display;
        return false;
        exit;
    }
        
    // Ok to proceed and delete plugin

    // Drop mycaljp tables
    foreach ( $TABLES as $table ) {
        $t = $_TABLES["$table"];
        COM_errorLog ('Dropping $table table', 1);
        DB_query ( "DROP TABLE $t", 1 );
        COM_errorLog ('...success', 1);
    }

    // Remove Security for this plugin
    $grp_id = DB_getItem ($_TABLES['groups'], 'grp_id',"grp_name = '$pi_admin'");
    if (!empty ($grp_id)) {
        // Remove Mycaljp Admin group from all other groups
        COM_errorLog ('Attempting to remove $pi_admin group from all groups' , 1);
        DB_query ("DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $grp_id");
        COM_errorLog ('...success', 1);

        // Remove the Mycaljp Admin group
        COM_errorLog('Attempting to remove the $pi_admin Group', 1);
        DB_query ("DELETE FROM {$_TABLES['groups']} WHERE grp_id = $grp_id");
        COM_errorLog('...success', 1);
    }

    // Remove the block
    DB_query( "DELETE FROM {$_TABLES['blocks']} WHERE phpblockfn = 'phpblock_mycaljp2'", 1 );
    
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
    
    $fname = $_CONF['path_data'] . 'mycaljp_conf.php';
    if ( file_exists( $fname ) ) {
        @unlink( $fname );
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


// +-------------------------------------------------------------------------+
// | Main Program                                                            |
// +-------------------------------------------------------------------------+

if ( empty($_MYCALJP2_CONF['template']) ) {
    $_MYCALJP2_CONF['template'] = 'default';
}

// テンプレートパスおよびCSSのURLを設定する
if ( ( isset( $_MYCALJP2_CONF['themes'] ) && in_array( $_CONF['theme'], $_MYCALJP2_CONF['themes'] ) )
    && is_dir( $_CONF['path_layout'] . 'mycaljp' ) ) {
    $_MYCALJP2_CONF['path_layout'] = $_CONF['path_layout'] . 'mycaljp';
    $_MYCALJP2_CONF['css_url'] = $_CONF['layout_url'] . '/mycaljp';
} else {
    $_MYCALJP2_CONF['path_layout'] = $_CONF['path_html'] . 'mycaljp/templates/' . $_MYCALJP2_CONF['template'];
    $_MYCALJP2_CONF['css_url'] = $_CONF['site_url'] . '/mycaljp/templates/' . $_MYCALJP2_CONF['template'];
}

// テンプレートのパスを設定する
// slidecalendarのために残す。
if ( ! function_exists('mycaljp_setlayoutpath') )
{
    function mycaljp_setlayoutpath()
    {
    }
}

function MYCALJP_setLayoutPath_old() // for slidecalendar
{
    global $_CONF, $_MYCALJP2_CONF;
    
    if ( is_dir( $_CONF['path_layout'] . 'mycaljp' ) ) {
      $_MYCALJP2_CONF['path_layout'] = $_CONF['path_layout'] . 'mycaljp';
      $_MYCALJP2_CONF['css_url'] = $_CONF['layout_url'] . '/mycaljp';
    } else {
      $_MYCALJP2_CONF['path_layout'] = $_CONF['path_html'] . 'mycaljp/templates/' . $_MYCALJP2_CONF['template'];
      $_MYCALJP2_CONF['css_url'] = $_CONF['site_url'] . '/mycaljp/templates/' . $_MYCALJP2_CONF['template'];
    }
}


// もし、テンプレートパス内に config.php があればインクルードする
@include($_MYCALJP2_CONF['path_layout'] . '/config.php');


function MYCALJP_getTemplates()
{
    global $_CONF, $_MYCALJP2_CONF;

    $templates = array();
    $index = 0;
    $path_mycaljp = $_CONF['path_html'] . 'mycaljp/templates/';
    $fd = opendir( $path_mycaljp );
    while( ( $dir = @readdir( $fd ) ) == true ) {
        if( is_dir( $path_mycaljp . $dir) && $dir <> '.' && $dir <> '..' && $dir <> 'default' && substr( $dir, 0 , 1 ) <> '.' ) {
            clearstatcache();
            $templates[$index] = $dir;
            $index++;
        }
    }
    sort($templates);
    $templates = array_merge( array('default'), $templates );

    return $templates;
}


/**
* Get header code for inclusion
*
* @return   string
*
*/
function plugin_getheadercode_mycaljp()
{
    global $_CONF, $_MYCALJP2_CONF;

    return '
<!-- Include CSS & Script for Site Calendar Mycaljp -->
<link rel="stylesheet" type="text/css" href="' . $_MYCALJP2_CONF['css_url'] . '/mycaljp.css">
<script type="text/javascript" src="' . $_CONF['site_url'] . '/mycaljp/xmlhttp.js"></script>
';
}

define ( "_MYCAL_DAY_", 86400 ); // 60 * 60 * 24
define ( "_STORY_"  , 1 ); 
define ( "_ACTIVE_" , 2 ); 

function MYCALJP_showCalendar( $caltype = 1 )
{
    global $_TABLES, $_CONF, $_PLUGINS, $_USER, $_MYCALJP2_CONF, $LANG_MYCALJP;

    if ( isset( $_USER['uid'] ) AND ( $_USER['uid'] > 1 ) ) {
        $uid = $_USER['uid'];
    } else {
        $uid = 1;
    }

    setlocale(LC_TIME, $_CONF['locale']);

    if( isset( $GLOBALS['WorkDate'] ) )
        $WorkDate = $GLOBALS['WorkDate'];
    else if( !isset($_GET['month']) ) 
        $WorkDate = date("Y-m-d");
    else {
        $WorkDate = $_GET['month'];
        $GLOBALS['WorkDate'] = $WorkDate;
    }
    
    // Determine the first and last day to display
    $base               = strtotime($WorkDate) + 60 * 60 * 12;
    $firstdayofmonth    = $base - ((date("d", $base) - 1) * _MYCAL_DAY_);
    $daysinmonth        = date("t", $firstdayofmonth);
    $lastdayofmonth     = $firstdayofmonth + (($daysinmonth - 1) * _MYCAL_DAY_);
    $firstdaytodisplay  = $firstdayofmonth - (strftime ('%w', $firstdayofmonth) * _MYCAL_DAY_);
    $lastdaytodisplay   = $lastdayofmonth + ((6 - strftime ('%w', $lastdayofmonth)) * _MYCAL_DAY_);
    $totaldays          = ((($lastdaytodisplay - $firstdaytodisplay) / _MYCAL_DAY_) + 1);
    $totalweeks         = $totaldays / 7;
    
    $firststr = date("Y-m-d", $firstdaytodisplay);
    $laststr  = date("Y-m-d", $lastdaytodisplay);
    $ds = explode("-", $firststr);
    $de = explode("-", $laststr);
    $startdate = mktime( 0, 0, 0,$ds[1],$ds[2],$ds[0]);
    $enddate   = mktime(23,59,59,$de[1],$de[2],$de[0]);
    
    $thismonth = date("Y-m-01", $base);
    $prevmonth = date("Y-m-01", strtotime($thismonth . "-1 month"));
    $nextmonth = date("Y-m-01", strtotime($thismonth . "+1 month"));

    $firstdayofmonthstr = date("Y-m-d", $firstdayofmonth);
    $lastdayofmonthstr  = date("Y-m-d", $lastdayofmonth);

    $firstdayofyearstr  = date("Y-01-01", $base);
    $lastdayofyearstr   = date("Y-12-31", $base);

    $days = array();

    if ( isset($_MYCALJP2_CONF['contents']) ) {
        foreach ( $_MYCALJP2_CONF['contents'] as $pi_name )
        {
            // Check stories
            if ( $pi_name == "stories" )
            {
                $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
                     . "FROM {$_TABLES['stories']} "
                     . "WHERE (draft_flag = 0) AND (date <= NOW()) "
                     . "AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') "
                     . COM_getTopicSQL('AND')
                     . COM_getPermSQL('AND')
                     . COM_getLangSQL( 'sid', 'AND' );
                $result = DB_query ($sql);
                while ( $o = DB_fetchArray($result) )
                    $days[ date( "Y-m-d", $o['day'] ) ] |= _STORY_;
            }

            // Check comments
            else if ( $pi_name == "comments" )
            {
                //暫定的に記事へのコメントのみ対応する。(search.class.phpもそうなっている)
                $stsql =  COM_getPermSQL ('AND', 0, 2, 's');
                $stsql .= COM_getTopicSQL ('AND');
                $stsql .= COM_getLangSQL ('sid', 'AND', 's');
                $sql = "SELECT UNIX_TIMESTAMP(c.date) AS day "
                     . "FROM {$_TABLES['comments']} AS c "
                     . "LEFT JOIN {$_TABLES['stories']} AS s ON ((s.sid = c.sid) " . $stsql . ") "
                     . "WHERE (c.date <= NOW()) AND (UNIX_TIMESTAMP(c.date) BETWEEN '$startdate' AND '$enddate') "
                     . "AND (c.type = 'article') "
                     . "AND (s.draft_flag = 0) AND (s.commentcode = 0) AND (s.date <= NOW()) ";
                $result = DB_query ($sql);
                while ( $o = DB_fetchArray($result) )
                    $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
            }

            else if ( in_array( $pi_name, $_PLUGINS ) )
            {
                switch ( $pi_name ) {
                case "calendar":
                case "calendarjp":
                case "wkyevecal":
                    if ( MYCALJP_pi_enabled($pi_name) ) {
                        if ($pi_name == "calendar") {
                            $table = $_TABLES['events'];
                        } else if ($pi_name == "calendarjp") {
                            $table = $_TABLES['eventsjp'];
                        } else {
                            $table = $_TABLES['wkyevecal'];
                        }
                        $events = array();
                        $sql = "SELECT eid,title,url,datestart,dateend,timestart,timeend,group_id,owner_id,perm_owner,perm_group,perm_members,perm_anon "
                             . "FROM {$table} "
                             . "WHERE (datestart >= '$firststr') AND (datestart <= '$laststr') "
                             . COM_getPermSQL('AND');
                        $result = DB_query($sql);
                        while ( $o = DB_fetchArray($result) ) {
                            $events[ $o['datestart'] ][ $o['eid'] ] = $o; // $o['datestart']は"Y-m-d"形式文字列
                            if ( $o['datestart'] != $o['dateend'] ) {
                                $e_ds = explode("-", $o['datestart']);
                                $e_de = explode("-", $o['dateend']);
                                $e_ts = explode(":", $o['timestart']);
                                $e_te = explode(":", $o['timeend']);
                                $event_startdate = mktime($e_ts[0],$e_ts[1],$e_ts[2],$e_ds[1],$e_ds[2],$e_ds[0]);
                                $event_enddate   = mktime($e_te[0],$e_te[1],$e_te[2],$e_de[1],$e_de[2],$e_de[0]);

                                if ( $event_enddate - $event_startdate >= _MYCAL_DAY_ ) {
                                    $event_middledate = $event_startdate + _MYCAL_DAY_;
                                    while ( $event_enddate >= $event_middledate ) {
                                        $events[ date( "Y-m-d", $event_middledate ) ][ $o['eid'] ] = $o;
                                        $event_middledate += _MYCAL_DAY_;
                                    }
                                    $events[ $o['dateend'] ][ $o['eid'] ] = $o;
                                }
                            }
                        }
                    }
                    break;

                case "forum":
                    if ( MYCALJP_pi_enabled($pi_name) ) {
                        $sql = "SELECT date AS day "
                             . "FROM {$_TABLES['gf_topic']} "
                             . "WHERE (date <= NOW()) AND (date BETWEEN '$startdate' AND '$enddate') ";
                        $result = DB_query ($sql);
                        while ( $o = DB_fetchArray($result) )
                            $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                    }
                    break;

                case "staticpages":
                    if ( MYCALJP_pi_enabled($pi_name) ) {
                        $sql = "SELECT UNIX_TIMESTAMP(sp_date) AS day "
                             . "FROM {$_TABLES['staticpage']} "
                             . "WHERE (sp_date <= NOW()) AND (UNIX_TIMESTAMP(sp_date) BETWEEN '$startdate' AND '$enddate') "
                             . "AND (sp_php <> 1)"
                             . COM_getPermSQL('AND')
                             . COM_getLangSql ('sp_id', 'AND');
                        $result = DB_query ($sql);
                        while ( $o = DB_fetchArray($result) )
                            $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                    }
                    break;

                case "links":
                    if ( MYCALJP_pi_enabled($pi_name) ) {
                        $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
                             . "FROM {$_TABLES['links']} "
                             . "WHERE (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') AND (date <> 1) "
                             . COM_getPermSQL('AND');
                        $result = DB_query ($sql);
                        while ( $o = DB_fetchArray($result) )
                            $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                    }
                    break;

                case "filemgmt":
                    if ( MYCALJP_pi_enabled($pi_name) ) {
                        global $_FM_TABLES;
                        $sql = "SELECT date AS day "
                             . "FROM {$_FM_TABLES['filemgmt_filedetail']} AS f "
                             . "LEFT JOIN {$_FM_TABLES['filemgmt_cat']} AS c ON f.cid = c.cid "
                             . "WHERE (date BETWEEN '$startdate' AND '$enddate') "
                             . "AND (c.grp_access IN (" . implode( ',', SEC_getUserGroups( $uid ) ) . ")) "
                             . "AND (f.status > 0)";
                        $result = DB_query ($sql);
                        while ( $o = DB_fetchArray($result) )
                            $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                    }
                    break;
                }
            }
        }
    }

    if ( $caltype == 2 ) { // for slidecalendar
        MYCALJP_setLayoutPath_old();
        // もし、テンプレートパス内に config.php があればインクルードする
        @include($_MYCALJP2_CONF['path_layout'] . '/config.php');
    }
    $cal = new Template( $_MYCALJP2_CONF['path_layout'] );
    $cal->set_file( array(
        'calendar' => 'calendar.thtml',
        'header'   => 'header.thtml',
        'week'     => 'week.thtml',
        'day'      => 'day.thtml'
    ));
    $cal->set_var ( 'site_url', $_CONF['site_url'] );

    if ( $_MYCALJP2_CONF['headertitleyear'] )
        $headertitleyear = date( $_MYCALJP2_CONF['headertitleyear'], $base );
    else
        $headertitleyear = ucfirst( strftime( ( substr($_CONF['locale'],0,2) == "ja" ) ? "%Y年" : "%Y", $base ) );
    $anchor = '<a href="' . $_CONF["site_url"] . '/mycaljp/calsearch.php?datestart=' . $firstdayofyearstr 
        . '&amp;dateend=' . $lastdayofyearstr . '&amp;type=all&amp;mode=search&amp;topic=0&amp;author=0&amp;month=' . $thismonth
        . '" title="'. $LANG_MYCALJP['headeroflink'] . $headertitleyear . $LANG_MYCALJP['footeroflink'] . '">' . $headertitleyear . '</a>';
    $cal->set_var('title_' . ( ( $_MYCALJP2_CONF['titleorder'] == '1' ) ? '1' : '2' ) ,$anchor);
    $cal->set_var('title_year',$anchor); // for slidecalendar

    if ( $_MYCALJP2_CONF['headertitlemonth'] )
        $headertitlemonth = date( $_MYCALJP2_CONF['headertitlemonth'], $base );
    else
        $headertitlemonth = ucfirst( strftime( ( substr($_CONF['locale'],0,2) == "ja" ) ? "%m月" : "%B", $base ) );
    $anchor = '<a href="' . $_CONF["site_url"] . '/mycaljp/calsearch.php?datestart=' . $firstdayofmonthstr 
        . '&amp;dateend=' . $lastdayofmonthstr . '&amp;type=all&amp;mode=search&amp;topic=0&amp;author=0'
        . '" title="'. $LANG_MYCALJP['headeroflink'] . $headertitlemonth . $LANG_MYCALJP['footeroflink'] . '">' . $headertitlemonth . '</a>';
    $cal->set_var('title_' . ( ( $_MYCALJP2_CONF['titleorder'] == '1' ) ? '2' : '1' ) ,$anchor);
    $cal->set_var('title_month',$anchor); // for slidecalendar

    // Header with Month Title and Next/Prev links
    $qstr = preg_replace( '/[&]*month=[0-9]{4}-[0-9]{2}-[0-9]{2}/', '', $_SERVER["QUERY_STRING"] );
    $qstr = MYCALJP_htmlspecialchars( $qstr );

    $url = MYCALJP_htmlspecialchars( $_SERVER['PHP_SELF'] );

    $cal->set_var('lang_skipcalendar', $LANG_MYCALJP['skipcalendar'] ); // I consider the visually impaired.

    $tmp = $url . "?" . $qstr . "&amp;month=" . $prevmonth;
    $tmp = str_replace( '?&amp;', '?', $tmp );
    $cal->set_var('prevmonth', $tmp );
    
    $tmp = $url . "?" . $qstr . "&amp;month=" . $nextmonth;
    $tmp = str_replace( '?&amp;', '?', $tmp );
    $cal->set_var('nextmonth', $tmp );

    $cal->set_var('testprevmonth', $_CONF["site_url"] . "/mycaljp/showcal.php" . "?month=" . $prevmonth );
    $cal->set_var('testnextmonth', $_CONF["site_url"] . "/mycaljp/showcal.php" . "?month=" . $nextmonth );

    $cal->set_var('lang_prevmonth', $LANG_MYCALJP['prevmonth'] );
    $cal->set_var('lang_nextmonth', $LANG_MYCALJP['nextmonth'] );

    $wdays = array('sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday');
    for ( $i = 0; $i < 7; $i++ )
    {
        $cal->set_var( 'weekday_class', $wdays[$i] );

        if (  $_MYCALJP2_CONF[ $wdays[$i] ] )
            $cal->set_var( 'title_weekday', $_MYCALJP2_CONF[ $wdays[$i] ] );
        else
            $cal->set_var( 'title_weekday', ucfirst(strftime("%a", $firstdaytodisplay + ($i * _MYCAL_DAY_))) );

        $cal->parse( 'dayofweeks_title', 'header', true );
    }

    for ( $w = 0; $w < $totalweeks; $w++ )
    {
        for ( $d = 0; $d < 7; $d++ )
        {
            $cal->set_var( 'daylink', MYCALJP_getDaysURL($events, $firstdaytodisplay + (_MYCAL_DAY_ * ($d + ($w * 7))), $base, $days, $d, $caltype) );
            $cal->parse( 'calendar_days','day', ($d > 0) );
        }
        $cal->parse( 'calendar_week', 'week', true );
    }

    return $cal->parse ( 'output', 'calendar' );
}


function MYCALJP_getDaysURL(&$events, $timestamp, $base, &$days, $weekday, $caltype=1)
{
    global $_TABLES, $_CONF, $_MYCALJP2_CONF;

    $day = date( "j", $timestamp );
    $key = date( "Y-m-d", $timestamp );
    $today = ( date("Y-m-d") == $key );
    $story  = ( ( $days[ $key ] & _STORY_  ) > 0 );
    $active = ( ( $days[ $key ] & _ACTIVE_ ) > 0 );
    $thismonth = ( date( "m", $timestamp ) == date( "m", $base ) );
    $sunday = false;
    $saturday = false;
    $holiday = false;

    if ( $_MYCALJP2_CONF['showholiday'] )
    {
        $sunday   = ( $weekday == 0 );
        $saturday = ( $weekday == 6 );
        if ( $_MYCALJP2_CONF['checkjpholiday'] )
            $holiday  = is_Japanese_Holiday($timestamp);
    }

    $event = '';
    if ( ( ! empty($events) ) && count( $events[$key] ) )
    {
        while ( list($k,$v) = each($events[$key]) )
        {
            if (SEC_hasAccess($v['owner_id'],$v['group_id'],$v['perm_owner'],$v['perm_group'],$v['perm_members'],$v['perm_anon']) > 0)
            {
                if ($event != '') $event .= ', ';
                $event .= $v['title'];
            }
        }
    }

    if ( $event || $active || $story )
    {
        $anchor = '<a href="' . $_CONF["site_url"] . '/mycaljp/calsearch.php?datestart=' . $key 
            . '&amp;dateend=' . $key . '&amp;type=all&amp;mode=search&amp;topic=0&amp;author=0';
        $anchor .= $event ? '" title="'. $event : '';
        $anchor .= '">' . $day . '</a>';
    }
    
    $holidayclass = '';
    if ( $sunday )
        $holidayclass = ' sunday';
    elseif ( $saturday )
        $holidayclass = ' saturday';
    if ( $holiday )
        $holidayclass .= ' holiday';

    if ( ( ! $thismonth ) && ( $caltype != 1 ) ) return ''; // for slidecalender

    if ( $event )
    {
        if ( ! $thismonth )
        {
            $event_url = '<td class="NotThisMonth">';
        } 
        else 
        {
            $event_url = '<td class="' . ( $today ? 'TodayEvent' : 'Event' ) . $holidayclass . '">' . $anchor;
        }
    }
    elseif ( $story )
    {
        if ( ! $thismonth )
        {
            $event_url = '<td class="NotThisMonth">';
        }
        else 
        {
            if ( $today )
            {
                $event_url = '<td class="Today' . $holidayclass . '">' . $day;

                if ( $story )
                {
                    $event_url = '<td class="TodayStory' . $holidayclass . '">' . $anchor; 
                }
            }
            else
            {
                $event_url = ( $holidayclass ? '<td class="' . ltrim($holidayclass) . '">' : '<td>' ) . $day;
                
                if ( $story )
                {
                    $event_url = '<td class="Story' . $holidayclass . '">' . $anchor; 
                }
            }
        }
    }
    else
    {
        if ( ! $thismonth )
        {
            $event_url = '<td class="NotThisMonth">';
        }
        else 
        {
            if ( $today )
            {
                $event_url = '<td class="Today' . $holidayclass . '">' . $day;

                if ( $active )
                {
                    $event_url = '<td class="TodayActive' . $holidayclass . '">' . $anchor; 
                }
            }
            else
            {
                $event_url = ( $holidayclass ? '<td class="' . ltrim($holidayclass) . '">' : '<td>' ) . $day;
                
                if ( $active )
                {
                    $event_url = '<td class="Active' . $holidayclass . '">' . $anchor; 
                }
            }
        }
    }

    $event_url .= "</td>";
        
    return $event_url;
}


//
// Unixタイムスタンプ形式の日付が日本の休日かどうか判定する関数
//
// 判定ロジックは次のサイトを参照しています。
// http://www.h3.dion.ne.jp/~sakatsu/holiday_logic.htm
//
function is_Japanese_Holiday($timestamp)
{
  $weekday = strftime("%w",$timestamp);  // 日(0),月(1)‥土(6)
  $year    = strftime("%Y",$timestamp);
  $month   = strftime("%m",$timestamp);
  $day     = strftime("%d",$timestamp);

  switch ( $month )
  {
      case 1:// 1月
          if ( $day == 1 ) return true; //元日
          if ( $day == 2 && $weekday == 1 ) return true; //振替休日
          if ( $year >= 2000 )
          {
              $week = floor( ( $day - 1 ) / 7 ) + 1;
              if ( $week == 2 && $weekday == 1 ) return true; //成人の日(第2月曜日)
          }
          break;
      
      case 2:// 2月
          if ( $year >= 1967 )
          {
              if ( $day == 11 ) return true; //建国記念の日
              if ( $day == 12 && $weekday == 1 ) return true; //振替休日
          }
          break;
      
      case 3:// 3月
          if( $year > 1979 && $year < 2100 )
          {
              $SpringEquinox = floor( 20.8431 + 0.242194 * ( $year - 1980 ) - floor( ( $year - 1980 ) / 4 ) );
              if ( $day == $SpringEquinox ) return true; //春分の日
              if ( ( $day == $SpringEquinox + 1 ) && $weekday == 1 ) return true; //振替休日
          }
          break;
      
      case 4:// 4月
          if ( $day == 29 ) return true; //昭和の日
          if ( $day == 30 && $weekday == 1 ) return true; //振替休日
          break;
      
      case 5:// 5月
          if ( $day == 3 ) return true; //憲法記念日
          if ( $day == 4 )
          {
              if ( $year >= 2007 ) return true; //みどりの日
              if ( $year >= 1986 )
              {
                  // 5/4が日曜日は『只の日曜』､月曜日は『憲法記念日の振替休日』(～2006年)
                  if ( $weekday > 1 ) return true; //国民の休日
              }
          }
          if ( $day == 5 ) return true; //こどもの日
          if ( $year >= 2007 )
          {
              if ( $day == 6 && ( $weekday == 2 || $weekday == 3 ) ) return true; //振替休日
          }
          break;

      case 7:// 7月
          if ( $year >= 2003 )
          {
              $week = floor( ( $day - 1 ) / 7 ) + 1;
              if ( $week == 3 && $weekday == 1 ) return true; //海の日(第3月曜日)
          }
          elseif ( $year >= 1996 )
          {
              if ( $day == 20 ) return true; //海の日
          }
          break;
      
      case 9:// 9月
          $AutumnEquinox = floor( 23.2488 + 0.242194 * ( $year - 1980 ) - floor( ( $year - 1980 ) / 4 ) );
          if( $year > 1979 && $year < 2100 )
          {
              if ( $day == $AutumnEquinox ) return true; //秋分の日
              if ( ( $day == $AutumnEquinox + 1 ) && $weekday == 1 ) return true; //振替休日
          }
          if ( $year >= 2003 )
          {
              $week = floor( ( $day - 1 ) / 7 ) + 1;
              if ( $week == 3 && $weekday == 1 ) return true; //敬老の日(第3月曜日)
              if ( ( $day == $AutumnEquinox - 1 ) && $weekday == 2 ) return true; //国民の休日(敬老の日と秋分の日にはさまれた日)
          }
          elseif ( $year >= 1966 )
          {
              if ( $day == 15 ) return true; //敬老の日
          }
          break;
      
      case 10:// 10月
          if ( $year >= 2000 )
          {
              $week = floor( ( $day - 1 ) / 7 ) + 1;
              if ( $week == 2 && $weekday == 1 ) return true; //体育の日(第2月曜日)
          }
          elseif ( $year >= 1966 )
          {
              if ( $day == 10 ) return true; //体育の日
          }
          break;
      
      case 11:// 11月
          if ( $day == 3 ) return true; //文化の日
          if ( $day == 4 && $weekday == 1 ) return true; //振替休日
          if ( $day == 23 ) return true; //勤労感謝の日
          if ( $day == 24 && $weekday == 1 ) return true; //振替休日
          break;
      
      case 12:// 12月
          if ( $year >= 1989 )
          {
              if ( $day == 23 ) return true; //天皇誕生日
              if ( $day == 24 && $weekday == 1 ) return true; //振替休日
          }
          break;
  }
  return false;
}

function MYCALJP_htmlspecialchars( $str )
{
    global $_CONF, $LANG_CHARSET;

    if ( isset( $LANG_CHARSET ) )
    {
        $encoding = $LANG_CHARSET;
    }
    else if ( isset( $_CONF['default_charset'] ) )
    {
        $encoding = $_CONF['default_charset'];
    }
    else 
    {
        $encoding = 'utf-8';
    }
    $str = str_replace('%27', "'", $str);
    return htmlspecialchars( $str, ENT_QUOTES, $encoding );
}

function MYCALJP_pi_enabled($pi_name)
{
    global $_TABLES;

    return ( DB_getItem($_TABLES['plugins'], 'pi_enabled', "pi_name = '$pi_name'") == 1 );
}

// PHPブロック関数
function phpblock_mycaljp2()
{
    return MYCALJP_showCalendar();
}

if ( ! function_exists('phpblock_mycaljp') )
{
    // PHPブロック関数
    function phpblock_mycaljp()
    {
        return MYCALJP_showCalendar();
    }
}

if ( ! function_exists('mycaljp_slidecalender') )
{
    // slidecalender
    function mycaljp_slidecalender()
    {
        return MYCALJP_showCalendar( 2 );
    }
}

if ((!GL_VERSION_15) && (!function_exists('SEC_checkToken'))) {
    function SEC_checkToken() {
        return true;
    }
}

if ((!GL_VERSION_15) && (!function_exists('SEC_createToken'))) {
    function SEC_createToken() {
        return "1";
    }
}

?>
