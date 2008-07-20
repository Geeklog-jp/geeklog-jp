<?php
//
// +---------------------------------------------------------------------------+
// | Theme Editor Plugin for Geeklog - The Ultimate Weblog                     |
// +---------------------------------------------------------------------------+
// | functions.inc                                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 - geeklog AT mystral-kk DOT net                        |
// |                                                                           |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
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
// $Id: functions.inc,v 1.1 2006/10/02 06:49:57 kenji Exp $

/**
* Language file Include
*/
$langfile = $_CONF['path'] . 'plugins/themedit/language/' . $_CONF['language'] . '.php';

if ( file_exists ( $langfile ) ) {
    include_once ( $langfile );
} else {
    include_once $_CONF['path'] . 'plugins/themedit/language/english.php';
}

/*
* Include themedit config file
*/

require_once $_CONF['path'] . 'plugins/themedit/config.php';

if ( !defined( 'LB' ) ) {
	define( 'LB', "\n" );
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
* Universal Plugin:  Uncomment and fill in variables;
* 
* @return    array   Associative array of menu items to be added to menu
*
*/

function plugin_getmenuitems_themedit()
{
//	global $_CONF, $LANG_THM;

//    $menuitems = array();
//	$menuitems[] = array( 
//		$LANG_THM['menu_label'],
//		$_CONF['site_url'] . "/themedit/index.php"
//	 );
//	if ( SEC_hasRights( 'themedit.view' ) ) {
//    	$menuitems["$menulabel"] = $menurul;
//    }
//    return $menuitems;
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

function plugin_commentsupport_themedit() 
{
    return false;
}

/**
* Shows the statistics for the plugin on stats.php.  If
* $showsitestats is 1 then we are to only print the overall stats in the 'site
* statistics' box otherwise we show the detailed stats for the plugin
*
* Universal Plugin:  Modify/uncomment use it
*
* @param    int showsitestate   Flag to let us know which stats to get
* @return   string  returns formatted HTML to insert in stats page
*
*/

function plugin_showstats_themedit( $showsitestats ) 
{
//    global $_CONF, $_TABLES;

//    $stat_templates = new Template( $_CONF['path_layout'] . 'stats' );
//    $stat_templates->set_file( array( 'itemstats'=>'itemstatistics.thtml',
//                            'statrow'=>'singlestat.thtml' ) );
        $retval='';
//    if ( $showsitestats == 1 ) {
        // This shows in the summary box
//        $total_pages=DB_count( $_TABLES['table1'] );     // Fill this with count for summary
//        $summary_label = "themedit";                   // Fill this with label displayed
        
//        $retval = "<table border = '0' width='100%' cellspacing='0' cellpadding='0'>";
//        $retval .= "<tr><td>$summary_label</td>";
//        $retval .= "<td align='right'>" . $total_pages . "&nbsp;&nbsp </td></tr></table>";
//    } else {
        // This fills the top the box  Use the following as a template
//        $result = DB_query( "SELECT id, title, hits from {$_TABLES['table1'] WHERE hits > 0 ORDER BY hits desc LIMIT 10" );
//        $nrows  = DB_numRows( $result );
//        $retval .= COM_startBlock( "Top Ten Static Pages" );
//        if ( $nrows > 0 ) {
//            $stat_templates->set_var( 'item_label',"Page Title" );
//            $stat_templates->set_var( 'stat_name',"Hits" );
//            for ( $i = 0; $i < $nrows; $i++ ) {
//                $A = DB_fetchArray( $result );
//                $stat_templates->set_var( 'item_url', $_CONF['site_url'] . '/themedit/index.php?item=' . $A['id'] );
//                $stat_templates->set_var( 'item_text', $A['title'] );
//                $stat_templates->set_var( 'item_stat', $A['hits'] );
//                $stat_templates->parse( 'stat_row','statrow',true ); 
//            }
//            $stat_templates->parse( 'output','itemstats' );
//            $retval .= $stat_templates->finish( $stat_templates->get_var( 'output' ) );
//        } else {
//            $retval .= 'It appears that there are no themedits on this site or no one has ever viewed them.';
//        }	
//        $retval .= COM_endBlock();
//    }
    return $retval;
}

/**
* This will put an option for the plugin in the command and control block on moderation.php
*
* Add the plugin name, icon and link to the command and control block in moderation.php
*
* @return   array   Array containing ( plugin name, admin url, url of plugin icon )
*
*/

function plugin_cclabel_themedit() 
{
    global $_CONF, $LANG_THM;

	$pi_name   = $LANG_THM['cc_label'];
	$admin_url = $_CONF['site_admin_url'] . '/plugins/themedit/index.php';
	$icon_url  = $_CONF['site_admin_url'] . '/plugins/themedit/images/themedit.gif';
//	$icon_url  = $_CONF['site_url'] . '/themedit/images/themedit.gif';

    return array( $pi_name, $admin_url, $icon_url );
}

/**
* Returns the administrative option for this plugin
*
* Adds the plugin to the Admin menu
*
* Universal Plugin:  Modify/Uncomment use it
*
* @return   array   Array containing ( plugin name, plugin admin url, # of items in plugin or '' )
*
*/

function plugin_getadminoption_themedit() 
{
	global $_CONF, $LANG_THM, $_TABLES;

	if ( SEC_hasRights( 'themedit.admin' ) ) {
		$pi_name   = $LANG_THM['cc_label'];
		$admin_url = $_CONF['site_admin_url'] . '/plugins/themedit/index.php';
//		$num_items = '';
		$num_items = DB_count( $_TABLES['thm_contents'] );
		return array( $pi_name, $admin_url, $num_items );
	}
}

/*
 * Returns the version for this plugin
 *
 * @return string VersionNo
 */

function plugin_chkVersion_themedit() {
	global $_THM_CONF;
	
	return $_THM_CONF['pi_version'];
}

/**
* Returns the user option for this plugin
*
* Adds the plugin to the user menu
*
* Universal Plugin:  modify/uncomment use it
*
* @return   array   Array containing ( plugin name, plugin user url, 0 )
*
*/

function plugin_getuseroption_themedit() 
{
//    global $_CONF;

//    if ( SEC_hasRights( 'themedit.edit,themedit.view','OR' ) ) {
//        $pi_name = ucfirst( "themedit" );
//        $url     = $_CONF['site_url'] . '/themedit/index.php';
//        return array( $pi_name, $url, 0 );
//    }
}

/**
* Upgrade the plugin
*
* Universal Plugin:  modify/uncomment use it
*
* @return   boolean true ( = success )
*
*/

function plugin_upgrade_themedit() {
	global $_CONF, $_TABLES, $_THM_CONF;

	$result = DB_query( "SELECT pi_version FROM {$_TABLES['plugins']} WHERE ( pi_name = 'themedit' )" );
	$A = DB_fetchArray( $result );
	$pi_version = $A['pi_version'];		// Version info stored in database
	
	// Do upgrading
	
// 	switch ( $pi_version ) {
// 		case '':
// 		break;
// 		
// 		case '':
// 		break;
// 		
// 	}
	
	// Update plugin info
	
	$result = DB_query( "UPDATE {$_TABLES['plugins']} SET pi_version = \"{$_THM_CONF['pi_version']}\" WHERE ( pi_name = 'themedit' )" );
	COM_errorLog( ucfirst( "themedit" ) . " plugin was successfully updated to version {$_THM_CONF['pi_version']}." );
	
	return true;
}

// Returns JavaScript to be inserted into the header

function plugin_getheadercode_themedit() {
	global $_CONF;
	
	$header = <<<EOD
<meta http-equiv="Content-Script-Type" content="text/javascript">
<script type="text/javascript">
<!--
  function insert_var( var_name ){
  	var o_text   = document.getElementById( 'theme_contents' );
	
	// Get caret position
	var s = new Selection( o_text );
	var res = s.create();
	var ca_begin = res.start;
	var ca_end   = res.end;
	var part1    = o_text.value.substr( 0, ca_begin );
	var part2    = o_text.value.substr( ca_end, o_text.value.length - ca_end + 1 );
	var data     = '{' + var_name + '}';
	var data_len = data.length;

	// Insert {template_var}
	o_text.value = part1 + data + part2;
	
	// Set caret position
	if ( document.all ) { // IE
	} else { // FF
		o_text.selectionStart = ca_begin + data_len;
		o_text.selectionEnd   = o_text.selectionStart;
	}
	o_text.focus();
  }

// Cross Browser selectionStart/selectionEnd
// Version 0.1
// Copyright ( c ) 2005 KOSEKI Kengo
// 
// This script is distributed under the MIT licence.
// http://www.opensource.org/licenses/mit-license.php

function Selection( textareaElement ) {
    this.element = textareaElement;
}

Selection.prototype.create = function() {
    if ( document.selection != null && this.element.selectionStart == null ) {
        return this._ieGetSelection();
    } else {
        return this._mozillaGetSelection();
    }
}

Selection.prototype._mozillaGetSelection = function() {
    return { 
        start: this.element.selectionStart, 
        end: this.element.selectionEnd 
    };
}

Selection.prototype._ieGetSelection = function() {
    this.element.focus();

    var range = document.selection.createRange();
    var bookmark = range.getBookmark();

    var contents = this.element.value;
    var originalContents = contents;
    var marker = this._createSelectionMarker();
    while( contents.indexOf( marker ) != -1 ) {
        marker = this._createSelectionMarker();
    }
    var selection = range.text;

    var parent = range.parentElement();
    if ( parent == null || parent.type != "textarea" ) {
        return { start: 0, end: 0 };
    }
    range.text = marker + range.text + marker;
    contents = this.element.value;

    var result = {};
    result.start = contents.indexOf( marker );
    contents = contents.replace( marker, "" );
    result.end = contents.indexOf( marker );

    this.element.value = originalContents;
    range.moveToBookmark( bookmark );
    range.select();

    return result;
}

Selection.prototype._createSelectionMarker = function() {
    return "##SELECTION_MARKER_" + Math.random() + "##";
}
//-->
</script>
EOD;

	return $header;
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

function plugin_uninstall_themedit( $installCheck= '' )
{
    global $_TABLES, $LANG_THM;

    // $FEATURES and $TABLES have to be changed accodrding to your plugin
    $pi_name  = 'themedit';
    $FEATURES = array ( 'themedit.admin' );
    $TABLES   = array ( 'thm_contents' );
    
    // Check and see if plugin is still enabled - if so display warning and exit
    if ( $installCheck != '' && DB_getItem( $_TABLES['plugins'],'pi_enabled', 'pi_name = "' .$pi_name. '"' ) ) {
	    COM_errorLog( "Plugin is installed and enabled. Disable first if you want to de-install it",1 );
		$display .= COM_startBlock( $LANG_THM['warning'] );
		$display .= $LANG_THM['enabled'];
		$display .= COM_endBlock();
		echo $display;
		return false;
		exit;
	}
    	
	// Ok to proceed and delete plugin

    // Unregister the plugin with Geeklog
    COM_errorLog( 'Attempting to unregister the themedit plugin from Geeklog',1 );
    DB_query( "DELETE FROM {$_TABLES['plugins']} WHERE pi_name = 'themedit'",1 );

    // Drop themedit tables
    foreach( $TABLES as $table ) {
        $t = $_TABLES["$table"];
        COM_errorLog( "Removing Table $t", 1 );
        DB_query( "DROP TABLE $t", 1 );
    }

    // Remove Security for this plugin
    $grp_id = DB_getItem( $_TABLES['vars'], 'value', "name = '{$pi_name}_gid'" );
    
    COM_errorLog( "Removing $pi_name Admin Group", 1 );
    DB_query( "DELETE FROM {$_TABLES['groups']} WHERE grp_id = $grp_id",1 );
    DB_query( "DELETE FROM {$_TABLES['vars']} WHERE name = '{$pi_name}_gid'" );
    COM_errorLog( "Removing root users from admin of $pi_name" );
    DB_query( "DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $grp_id",1 );
    
    // Remove all the associated features -- access rights
    foreach ( $FEATURES as $feature ) {
        COM_errorLog( "Removing $feature feature and rights to it",1 );
        $feat_id = DB_getItem( $_TABLES['features'], 'ft_id', "ft_name = '$feature'" );
        DB_query( "DELETE FROM {$_TABLES['access']} WHERE acc_ft_id = $feat_id",1 );
        DB_query( "DELETE FROM {$_TABLES['features']} WHERE ft_id = $feat_id",1 );
    }
        
    COM_errorLog( '...success', 1 );
    return true;
}

// Return template vars stored in DB
// @return: array of string: names of template vars

function THM_getTemplateVars( $theme, $filename ) {
	global $_TABLES;
	
	$retval = array();
	$sql = "SELECT thm_vars FROM {$_TABLES['thm_contents']} WHERE "
		 . "( thm_name = '{$theme}' ) AND ( thm_filename = '{$filename}' )";
	$result = DB_query( $sql );
	if ( DB_error() == '' ) {
		$A = DB_fetchArray( $result );
		if ( ! empty( $A['thm_vars'] ) ) {
			$retval = explode( ',', $A['thm_vars'] );
		}
	}
	
	return $retval;
}

// Return template vars
//
// @parameter: $text - string: the contents of a template
// @return: array of string: names of template vars

function THM_scanTemplateVars( $text ) {
	$retval = array();
	
	$result = preg_match_all( '/\{( [^}].*? )\}/', $text, $match );
	if ( $result >= 1 ) {
		$retval = array_unique( $match[1] );
		sort( $retval );
	}
	
	return $retval;
}

// Return the current contents of a given file stored on Web server
//
// @parameter: $theme - string: theme name
//             $filename - string: file name
// @return: string: the current contents of a given file

function THM_getContents( $theme, $filename ) {
	global $_CONF, $_THM_CONF;
	
	$retval = '';
	$path = $_CONF['path_themes'] . $theme . '/' . $filename;
	if ( file_exists( $path ) ) {
		$contents = @file_get_contents( $path );
		if ( $contents === false ) {
			$retval = '';
		} else {
			$retval = $contents;
		}
	} else {
		$retval = '';
	}
	
	return $retval;
}


// Return the initial contents of a given file stored in DB
//
// @parameter: $theme - string: theme name
//             $filename - string: file name
// @return: string: the initial contents of a given file

function THM_getInitalContents( $theme, $filename ) {
	global $_CONF, $_TABLES, $_THM_CONF;

	$contents = '';
	$sql = "SELECT thm_init_contents FROM {$_TABLES['thm_contents']} "
	     . "WHERE ( thm_name = '{$theme}' ) AND ( thm_filename = '{$filename}' )";
	$result = DB_query( $sql );
	if ( DB_error() == '' ) {
		$A = DB_fetchArray( $result );
		$contents = $A['thm_init_contents'];
	}

	return $contents;
}

// Return allowed theme names, considering $_THM_CONF['allowed_themes']
// @return array of string: theme names

function THM_getAllowedThemes() {
	global $_CONF, $_THM_CONF;
	
	$retval = array();
	$dh = @opendir( $_CONF['path_themes'] );
	if ( $dh !== false ) {
		do {
			$theme = readdir( $dh );
			if ( $theme !== false && $theme != '.' && $theme != '..' ) {
				clearstatcache();
			 	if ( is_dir( $_CONF['path_themes'] . $theme )
				 && in_array( $theme, $_THM_CONF['allowed_themes'] ) ) {
					$retval[] = $theme;
				}
			}
		} while ( $theme !== false );
	}
	
	return $retval;
}

// Import the designated file and scan template vars in case of a template file
// and save the contents into database
// @return - boolean: true = success, false = fail

function THM_importFile( $theme, $filename ) {
	global $_TABLES;

	$contents = THM_getContents( $theme, $filename );
	$path_parts = pathinfo( $filename );
	if ( strtolower( $path_parts['extension'] ) == 'thtml' ) {
		$vars = implode( ',', THM_scanTemplateVars( $contents ) );
	} else {
		$vars = '';
	}
	$contents = addslashes( $contents );
	$vars = addslashes( $vars );
	$sql = "INSERT INTO {$_TABLES['thm_contents']} ( thm_name, thm_filename, thm_init_contents, thm_vars ) VALUES ( '{$theme}', '{$filename}', '{$contents}', '{$vars}' )";
	$result = DB_query( $sql );
	return ! ( $result === false );
}

// Initialize themedit database -- populate the table with default file contents

function THM_initDatabase() {
	global $_CONF, $_TABLES, $_THM_CONF;
	
	$themes = THM_getAllowedThemes();
	foreach ( $themes as $theme ) {
		foreach ( $_THM_CONF['allowed_files'] as $filename ) {
			THM_importFile( $theme, $filename );
		}
	}
}

// Save the file on the web
// @return: boolean - true = success, false = fail

function THM_saveFile( $theme, $filename, $contents ) {
	global $_CONF;
	
	$path = $_CONF['path_themes'] . $theme . '/' . $filename;
	$fh = @fopen( $path, "wb" );
	if ( $fh === false ) {
		return false;
	}
	
	$result1 = fwrite( $fh, $contents );
	$result2 = fclose( $fh );
	if ( $result1 === false || $result1 != strlen( $contents ) || $result2 === false ) {
		return false;
	}
	
	return true;
}

// Initialize the contnets on the web with the data stored in DB

function THM_initFile( $theme, $filename ) {
	$contents = THM_getInitalContents( $theme, $filename );
	return THM_saveFile( $theme, $filename, $contents );
}

// Returns if a file and its parent directory is writable

function THM_isWritable( $theme, $filename ) {
	global $_CONF;
	
	$path = $_CONF['path_themes'] . $theme . '/' . $filename;
	clearstatcache();
	$retval = is_writable( $path );
	if ( $retval ) {
		$path_parts = pathinfo( $path );
		clearstatcache();
		$retval = is_writable( $path_parts['dirname'] );
	}
	
	return $retval;
}

// Returns if themes and/or files are added and/or removed
// @TODO: this function doesn't work well when themes are deleted from
//   $_THM_CONF['allowed_themes'].

function THM_isAddedOrRemoved() {
	global $_CONF, $_TABLES, $_THM_CONF;
	
	$retval = array();
	$retval['added']   = array();
	$retval['removed'] = array();
	$themes = THM_getAllowedThemes();
	
	foreach ( $themes as $theme ) {
		$sql = "SELECT thm_filename FROM {$_TABLES['thm_contents']} WHERE ( thm_name = '{$theme}' )";
		$result = DB_query( $sql );
		if ( DB_error() ) {
			exit;
		} else {
			$db_files = array();
			while ( ( $A = DB_fetchArray( $result ) ) !== false ) {
				$db_files[] = $A['thm_filename'];
			}
		}
		
		foreach ( $_THM_CONF['allowed_files'] as $filename ) {
			$path = $_CONF['path_themes'] . $theme . '/' . $filename;
			clearstatcache();
			if ( file_exists( $path ) ) {
				// file exists, but not in DB
				if ( ! in_array( $filename, $db_files ) ) {
					$retval['added'][] = array( 'theme' => $theme, 'file' => $filename );
				}
			} else {
				// the file no longer exits but the corresponding DB record still remains
				if ( in_array( $filename, $db_files ) ) {
					$retval['removed'][] = array( 'theme' => $theme, 'file' => $filename );
				}
			}
		}
	}
			
	return $retval;
}

// Update all files and/or database according to $_THM_CONF['allowed_themes']
// and $_THM_CONF['allowed_files']

function THM_updateAll() {
	global $_CONF, $_TABLES;

	$diff = THM_isAddedOrRemoved();
	
	// Add new files into database
	foreach ( $diff['added'] as $added ) {
		$theme = $added['theme'];
		$file  = $added['file'];
		THM_importFile( $theme, $file );
	}
	
	// Delete old files from database
	foreach ( $diff['removed'] as $removed ) {
		$theme = $removed['theme'];
		$file  = $removed['file'];
		$sql = "DELETE FROM {$_TABLES['thm_contents']} WHERE ( thm_name = '{$theme}' ) AND ( thm_filename = '{$file}' )";
		DB_query( $sql );
	}
	
	COM_errorLog( "Themedit: Updated the information stored in the database successfully." );
	echo COM_refresh( $_CONF['site_admin_url'] . '/plugins/themedit/index.php' );
}

// Returns the preview HTML by doing the same way as /public_html/index

function THM_getPreview() {
	global $_CONF, $_USER, $_TABLES;

// The code below is adopted from public_html/index.php
// <code>
	require_once ( $_CONF['path_system'] . 'lib-story.php' );

	$newstories = false;
	$displayall = false;
	if ( isset ( $_GET['display'] ) && empty ( $topic ) ) {
	    if ( $_GET['display'] == 'new' ) {
	        $newstories = true;
	    } else if ( $_GET['display'] == 'all' ) {
	        $displayall = true;
	    }
	}

	$page = 1;
	if ( isset ( $_GET['page'] ) ) {
	    $page = COM_applyFilter ( $_GET['page'], true );
	    if ( $page == 0 ) {
	        $page = 1;
	    }
	}

	$display = '';

	if ( !$newstories && !$displayall ) {
	    // give plugins a chance to replace this page entirely
	    $newcontent = PLG_showCenterblock ( 0, $page, $topic );
	    if ( !empty ( $newcontent ) ) {
	        echo $newcontent;
	        exit;
	    }
	}

	$display .= COM_siteHeader();
	if ( isset ( $_GET['msg'] ) ) {
	    $display .= COM_showMessage ( COM_applyFilter ( $_GET['msg'], true ),COM_applyFilter ( $_GET['plugin'] ) );
	}


	// Show any Plugin formatted blocks
	// Requires a plugin to have a function called plugin_centerblock_<plugin_name>
	$displayBlock = PLG_showCenterblock ( 1, $page, $topic ); // top blocks
	if ( !empty ( $displayBlock ) ) {
	    $display .= $displayBlock;
	    // Check if theme has added the template which allows the centerblock
	    // to span the top over the rightblocks
	    if ( file_exists( $_CONF['path_layout'] . 'topcenterblock-span.thtml' ) ) {
	            $topspan = new Template( $_CONF['path_layout'] );
	            $topspan->set_file ( array ( 'topspan'=>'topcenterblock-span.thtml' ) );
	            $topspan->parse ( 'output', 'topspan' );
	            $display .= $topspan->finish ( $topspan->get_var( 'output' ) );
	            $GLOBALS['centerspan'] = true;
	    }
	}

	if ( isset ( $_USER['uid'] ) && ( $_USER['uid'] > 1 ) ) {
	    $result = DB_query( "SELECT maxstories,tids,aids FROM {$_TABLES['userindex']} WHERE uid = '{$_USER['uid']}'" );
	    $U = DB_fetchArray( $result );
	} else {
	    $U['maxstories'] = 0;
	}

	$maxstories = 0;
	if ( $U['maxstories'] >= $_CONF['minnews'] ) {
	    $maxstories = $U['maxstories'];
	}
	if ( ( !empty ( $topic ) ) && ( $maxstories == 0 ) ) {
	    $topiclimit = DB_getItem ( $_TABLES['topics'], 'limitnews',
	                              "tid = '{$topic}'" );
	    if ( $topiclimit >= $_CONF['minnews'] ) {
	        $maxstories = $topiclimit;
	    }
	}
	if ( $maxstories == 0 ) {
	    $maxstories = $_CONF['limitnews'];
	}

	$limit = $maxstories;

	// Geeklog now allows for articles to be published in the future.  Because of
	// this, we need to check to see if we need to rebuild the RDF file in the case
	// that any such articles have now been published
	COM_rdfUpToDateCheck();

	// For similar reasons, we need to see if there are currently two featured
	// articles.  Can only have one but you can have one current featured article
	// and one for the future...this check will set the latest one as featured
	// solely
	COM_featuredCheck();

	// Retrieve the archive topic - currently only one supported
	$archivetid = DB_getItem ( $_TABLES['topics'], 'tid', "archive_flag='1'" );

	// Scan for any stories that have expired and should be archived or deleted
	$asql = "SELECT sid,tid,title,expire,statuscode FROM {$_TABLES['stories']} ";
	$asql .= 'WHERE ( expire <= NOW() ) AND ( statuscode = ' . STORY_DELETE_ON_EXPIRE;
	if ( empty ( $archivetid ) ) {
	    $asql .= ' )';
	} else {
	    $asql .= ' OR statuscode = ' . STORY_ARCHIVE_ON_EXPIRE . " ) AND tid != '$archivetid'";
	}
	$expiresql = DB_query ( $asql );
	while ( list ( $sid, $expiretopic, $title, $expire, $statuscode ) = DB_fetchArray ( $expiresql ) ) {
	    if ( $statuscode == STORY_ARCHIVE_ON_EXPIRE ) {
	        if ( !empty ( $archivetid )  ) {
	            COM_errorLOG( "Archive Story: $sid, Topic: $archivetid, Title: $title, Expired: $expire" );
	            DB_query ( "UPDATE {$_TABLES['stories']} SET tid = '$archivetid', frontpage = '0', featured = '0' WHERE sid='{$sid}'" );
	        }
	    } else if ( $statuscode == STORY_DELETE_ON_EXPIRE ) {
	        COM_errorLOG( "Delete Story and comments: $sid, Topic: $expiretopic, Title: $titler, Expired: $expire" );
	        STORY_deleteImages ( $sid );
	        DB_query( "DELETE FROM {$_TABLES['comments']} WHERE sid='{$sid}' AND type = 'article'" );
	        DB_query( "DELETE FROM {$_TABLES['stories']} WHERE sid='{$sid}'" );
	    }
	}

	$sql = " ( date <= NOW() ) AND ( draft_flag = 0 )";

	// if a topic was provided only select those stories.
	if ( !empty( $topic ) ) {
	    $sql .= " AND s.tid = '$topic' ";
	} elseif ( !$newstories ) {
	    $sql .= " AND frontpage = 1 ";
	}
	if ( $topic != $_CONF['archivetopic'] ) {
	    $sql .= " AND s.tid != '{$_CONF['archivetopic']}' ";
	}

	$sql .= COM_getPermSQL ( 'AND', 0, 2, 's' );

	if ( !empty( $U['aids'] ) ) {
	    $sql .= " AND s.uid NOT IN ( " . str_replace(  ' ', ",", $U['aids']  ) . " ) ";
	}

	if ( !empty( $U['tids'] ) ) {
	    $sql .= " AND s.tid NOT IN ( '" . str_replace(  ' ', "','", $U['tids']  ) . "' ) ";
	}

	$sql .= COM_getTopicSQL ( 'AND', 0, 's' ) . ' ';

	if ( $newstories ) {
	    $sql .= "AND ( date >= ( date_sub( NOW(), INTERVAL {$_CONF['newstoriesinterval']} SECOND ) ) ) ";
	}

	$offset = ( $page - 1 ) * $limit;
	$sql .= "ORDER BY featured DESC, date DESC";

	$result = DB_query ( "SELECT STRAIGHT_JOIN s.*, UNIX_TIMESTAMP( s.date ) as day, "
	         . "u.username, u.fullname, u.photo, t.topic, t.imageurl "
	         . "FROM {$_TABLES['stories']} as s, {$_TABLES['users']} as u, "
		 . "{$_TABLES['topics']} as t WHERE ( s.uid = u.uid ) AND ( s.tid = t.tid ) AND"
	         . $sql . " LIMIT $offset, $limit" );
	$nrows = DB_numRows ( $result );

	$data = DB_query ( "SELECT COUNT( * ) AS count FROM {$_TABLES['stories']} as s WHERE" . $sql );
	$D = DB_fetchArray ( $data );
	$num_pages = ceil ( $D['count'] / $limit );

	if (  $A = DB_fetchArray(  $result  )  ) {

	    if (  $_CONF['showfirstasfeatured'] == 1  ) {
	        $A['featured'] = 1;
	    }

	    // display first article
	    $display .= STORY_renderArticle ( $A, 'y' );

	    // get plugin center blocks after featured article
	    if ( $A['featured'] == 1 ) {
	        $display .= PLG_showCenterblock ( 2, $page, $topic );
	    }

	    // get reamaining stories
	    while (  $A = DB_fetchArray( $result )  ) {
	        $display .= STORY_renderArticle ( $A, 'y' );
	    }

	    // get plugin center blocks that follow articles
	    $display .= PLG_showCenterblock ( 3, $page, $topic ); // bottom blocks

	    // Print Google-like paging navigation
	    if ( empty( $topic ) ) {
	        $base_url = $_CONF['site_url'] . '/index.php';
	        if ( $newstories ) {
	            $base_url .= '?display=new';
	        }
	    } else {
	        $base_url = $_CONF['site_url'] . '/index.php?topic=' . $topic;
	    }
	    $display .= COM_printPageNavigation( $base_url,$page, $num_pages );
	} else { // no stories to display
	    $display .= COM_startBlock ( $LANG05[1], '',
	                    COM_getBlockTemplate ( '_msg_block', 'header' ) ) . $LANG05[2];
	    if ( !empty( $topic ) ) {
	        $topicname = DB_getItem ( $_TABLES['topics'], 'topic', "tid='{$topic}'" );
	        $display .= sprintf ( $LANG05[3], $topicname );
	    }
	    $display .= COM_endBlock ( COM_getBlockTemplate ( '_msg_block', 'footer' ) );

	    $display .= PLG_showCenterblock ( 3, $page, $topic ); // bottom blocks
	}

	$display .= COM_siteFooter ( true ); // The true value enables right hand blocks.
// </code>

	return $display;
}

// Returns a directory tree with the current directory bold-faced

function THM_getDirTree( $theme, $selected_dir = '/images' ) {
	global $_CONF, $_USER, $_TABLES;
	
	// Checks for '..' in case of the directory-traversal attack
	
	if ( strpos( $selected_dir, '..' ) !== false ) {
		COM_errorLog( "Themedit: someone tried directory-traversal attack on THM_getDirTree(): Userid = {$_USER['uid']}" );
		return '';
	}
	
	$retval  = '<ul>' . LB;
	$cgi_path = $_CONF['site_admin_url'] . '/plugins/themedit/upload.php';
	
	// images/
	$retval .= '<li>';
	if ( $selected_dir == '/images' ) {
		$retval .= "<strong>{$theme}/images</strong>";
	} else {
		$retval .= "<a href='{$cgi_path}?path=/images&amp;theme={$theme}'>{$theme}/images<a>";
	}
	$retval .= '<br>' . LB;
	$retval .= '<ul>' . LB;
	
	// images/admin/
	$retval .= '<li>' . LB;
	if ( $selected_dir == '/images/admin' ) {
		$retval .= '<strong>/admin</strong>';
	} else {
		$retval .= "<a href='{$cgi_path}?path=/images/admin&amp;theme={$theme}'>/admin</a>";
	}
	$retval .= '</li>' . LB;
	
	// images/buttons/
	$retval .= '<li>' . LB;
	if ( $selected_dir == '/images/buttons' ) {
		$retval .= '<strong>/buttons</strong>';
	} else {
		$retval .= "<a href='{$cgi_path}?path=/images/buttons&amp;theme={$theme}'>/buttons</a>";
	}
	$retval .= '</li>' . LB;

	// images/icons/
	$retval .= '<li>' . LB;
	if ( $selected_dir == '/images/icons' ) {
		$retval .= '<strong>/icons</strong>';
	} else {
		$retval .= "<a href='{$cgi_path}?path=/images/icons&amp;theme={$theme}'>/icons</a>";
	}
	$retval .= '</li>' . LB;
	
	$retval .= '</ul>' . LB;
	$retval .= '</li>' . LB;
	$retval .= '</ul>' . LB;
	return $retval;
}

?>
