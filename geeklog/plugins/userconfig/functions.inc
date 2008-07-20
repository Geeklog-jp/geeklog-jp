<?php
//
// +---------------------------------------------------------------------------+
// | userconfig Geeklog Plugin 1.0                                             |
// +---------------------------------------------------------------------------+
// | function.inc                                                              |
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

/**
* This is the generic functions.inc for the Universal Plugin Toolkit for Geeklog.
*/

/**
* Language file Include
*/
$langfile = $_CONF['path'] . 'plugins/userconfig/language/' . $_CONF['language'] . '.php';

if (file_exists ($langfile))
{
	include_once ($langfile);
}
else
{
	include_once ($_CONF['path'] . 'plugins/userconfig/language/english.php');
}

require_once ($_CONF['path'] . 'plugins/userconfig/config.php');

// +---------------------------------------------------------------------------+
// | Geeklog Plugin API Implementations                                        |
// +---------------------------------------------------------------------------+

function plugin_chkVersion_userconfig() {
	global $_USERCONFIG;

	return $_USERCONFIG['version'];
}

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
function plugin_getmenuitems_userconfig()
{
	global $_CONF, $LANG_USERCONFIG, $_USERCONFIG;

	//	if ($_USERCONFIG['hideuserconfigmenu'] == 0) {
	//$menuitems['Shop'] = $_CONF['site_url'] . '/userconfig/index.php';
	//	}
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
function plugin_commentsupport_userconfig()
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
function plugin_showstats_userconfig($showsitestats)
{
	$retval = '';
	return $retval;
}

function plugin_upgrade_userconfig ()
{
    global $_TABLES, $_USERCONFIG;

    $v = DB_getItem ($_TABLES['plugins'], 'pi_version', "pi_name = 'userconfig'");

    if ($v != $_USERCONFIG['version']) {
        // update version numbers
        DB_query ("UPDATE {$_TABLES['plugins']} SET pi_version = '{$_USERCONFIG['version']}', pi_gl_version = '1.4.1' WHERE pi_name = 'userconfig'");

        // check if version number was updated successfully
        $v = DB_getItem ($_TABLES['plugins'], 'pi_version', "pi_name = 'spamx'");
    }

    if ($v == $_USERCONFIG['version']) {
        return true;
    }

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
* @param    string   $installCheck     Defult is blank but if set, check if plugin is disabled first
* 
* @return   boolean True if successful false otherwise
*
*/  
function plugin_uninstall_userconfig($installCheck = '')
{
	global $_TABLES, $LANG_USERCONFIG,$_CONF,$_USERCONFIG;

	// The zencarts need to be changed to the name of your plugin
	//

	$pi_name  = 'userconfig';
	// Check and see if plugin is still enabled - if so display warning and exit

	// Ok to proceed and delete plugin

	// Unregister the plugin with Geeklog
	COM_errorLog('Attempting to unregister the userconfig plugin from Geeklog',1);
	DB_query("DELETE FROM {$_TABLES['plugins']} WHERE pi_name = 'userconfig'",1);

	// Remove the Admin group definition for this plugin
	$grp_id = DB_getItem($_TABLES['vars'], 'value', "name = '{$pi_name}admingrpid'");
	COM_errorLog("Removing $pi_name Admin Group", 1);
	DB_query("DELETE FROM {$_TABLES['groups']} WHERE grp_id = $grp_id",1);
	DB_query("DELETE FROM {$_TABLES['vars']} WHERE name = '{$pi_name}admingrpid'");
	COM_errorLog("Removing root users from Admin Group of $pi_name");
	DB_query("DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $grp_id",1);

	// Remove User group definition for this plugin
	$grp_id = DB_getItem($_TABLES['vars'], 'value', "name = '{$pi_name}_usersgrp_id'");
	COM_errorLog("Removing $pi_name User Group", 1);
	DB_query("DELETE FROM {$_TABLES['groups']} WHERE grp_id = $grp_id",1);
	DB_query("DELETE FROM {$_TABLES['vars']} WHERE name = '{$pi_name}_usersgrp_id'");
	COM_errorLog("Removing root users from Users Group of $pi_name");
	DB_query("DELETE FROM {$_TABLES['group_assignments']} WHERE ug_main_grp_id = $grp_id",1);

	$FEATURES = array ('userconfig.edit');
	// Remove all the associated features - access rights. The feature ID's were stored in the vars table during install.
	foreach ($FEATURES as $feature) {
		COM_errorLog("Removing $feature feature and rights to it",1);
		$feat_id = DB_getItem($_TABLES['features'], 'ft_id', "ft_name = '$feature'");
		COM_errorLog("DELETE FROM {$_TABLES['access']} WHERE acc_ft_id = $feat_id");
		DB_query("DELETE FROM {$_TABLES['access']} WHERE acc_ft_id = $feat_id",1);
		DB_query("DELETE FROM {$_TABLES['features']} WHERE ft_id = $feat_id",1);
	}
	// Drop zencart tables

	//unkink config_now.php
	
	unlink($_USERCONFIG['userconfig_now']);
	unlink($_USERCONFIG['userconfig_bak']);
	
	
	// Remove Security for this plugin
	COM_errorLog('...success',1);
	return true;
}

function plugin_getheadercode_userconfig(){
	$retval = '';

	return $retval ;
}

function plugin_templatesetvars_userconfig($templatename, &$template) {
	if ($templatename == 'header') {
		//		if (isset($mycontent)) {
		//			$template->set_var( 'myvar', $mycontent );
		//		}
	}
}

//function plugin_getBlocks_userconfig($side, $topic=''){
//	$retval = '';
//
//	return $retval ;
//}

/**
* returns the administrative option for this plugin
*
*/
function plugin_getadminoption_userconfig(){
	global $_CONF, $_USERCONFIG, $_TABLES;

	if (SEC_hasRights ('userconfig.edit', 'OR')) {
		return array ($_USERCONFIG['userconfig'], $_CONF['site_admin_url'] . '/plugins/userconfig/index.php');
	}
}

function plugin_user_create_userconfig($uid) {
	global $_TABLES;
	
//	$result = DB_query("INSERT INTO {$_TABLES['pm_prefs']} (uid) VALUES ({$uid})");
}

// Notified that a user account is deleted.  Now, drop the record for this
// user in $_TABLE['pm_prefs'].

function plugin_user_delete_userconfig($uid) {
	global $_TABLES;
	
}

function lang_caption(){
	global $LANG_USERCONFIG;
	return array(
		'japanese'=>$LANG_USERCONFIG["lang_japanese"],
		'english'=>$LANG_USERCONFIG["lang_english"],
		'spanish'=>$LANG_USERCONFIG["lang_spanish"],
		'bulgarian'=>$LANG_USERCONFIG["lang_bulgarian"],
		'hebrew'=>$LANG_USERCONFIG["lang_hebrew"],
		'slovenian'=>$LANG_USERCONFIG["lang_slovenian"],
		'romanian'=>$LANG_USERCONFIG["lang_romanian"],
		'chinese_simplified'=>$LANG_USERCONFIG["lang_chinese_simplified"],
		'croatian'=>$LANG_USERCONFIG["lang_croatian"],
		'french_canada'=>$LANG_USERCONFIG["lang_french_canada"],
		'catalan'=>$LANG_USERCONFIG["lang_catalan"],
		'bosnian'=>$LANG_USERCONFIG["lang_bosnian"],
		'danish'=>$LANG_USERCONFIG["lang_danish"],
		'french_france'=>$LANG_USERCONFIG["lang_french_france"],
		'german_formal'=>$LANG_USERCONFIG["lang_german_formal"],
		'slovak'=>$LANG_USERCONFIG["lang_slovak"],
		'czech'=>$LANG_USERCONFIG["lang_czech"],
		'turkish'=>$LANG_USERCONFIG["lang_turkish"],
		'portuguese_brazil'=>$LANG_USERCONFIG["lang_portuguese_brazil"],
		'dutch'=>$LANG_USERCONFIG["lang_dutch"],
		'italian'=>$LANG_USERCONFIG["lang_italian"],
		'indonesian'=>$LANG_USERCONFIG["lang_indonesian"],
		'portuguese'=>$LANG_USERCONFIG["lang_portuguese"],
		'polish'=>$LANG_USERCONFIG["lang_polish"],
		'finnish'=>$LANG_USERCONFIG["lang_finnish"],
		'korean'=>$LANG_USERCONFIG["lang_korean"],
		'afrikaans'=>$LANG_USERCONFIG["lang_afrikaans"],
		'swedish'=>$LANG_USERCONFIG["lang_swedish"],
		'russian'=>$LANG_USERCONFIG["lang_russian"],
		'farsi'=>$LANG_USERCONFIG["lang_farsi"],
		'norwegian'=>$LANG_USERCONFIG["lang_norwegian"],
		'chinese_traditional'=>$LANG_USERCONFIG["lang_chinese_traditional"],
		'spanish_argentina'=>$LANG_USERCONFIG["lang_spanish_argentina"],
		'hellenic'=>$LANG_USERCONFIG["lang_hellenic"],
		'german'=>$LANG_USERCONFIG["lang_german"],
		'ukrainian'=>$LANG_USERCONFIG["lang_ukrainian"]
	);
}

function lang_val(){
	return array(
		'japanese'=>'ja',
		'english'=>'en',
		'spanish'=>'es',
		'bulgarian'=>'bg',
		'hebrew'=>'he',
		'slovenian'=>'sl',
		'romanian'=>'ro',
		'chinese_simplified'=>'zs',
		'croatian'=>'hr',
		'french_canada'=>'fc',
		'catalan'=>'ca',
		'bosnian'=>'bs',
		'danish'=>'da',
		'french_france'=>'fr',
		'german_formal'=>'df',
		'slovak'=>'sk',
		'czech'=>'cs',
		'turkish'=>'tr',
		'portuguese_brazil'=>'pb',
		'dutch'=>'nl',
		'italian'=>'it',
		'indonesian'=>'id',
		'portuguese'=>'pt',
		'polish'=>'pl',
		'finnish'=>'fi',
		'korean'=>'ko',
		'afrikaans'=>'af',
		'swedish'=>'sv',
		'russian'=>'ru',
		'farsi'=>'fa',
		'norwegian'=>'no',
		'chinese_traditional'=>'zt',
		'spanish_argentina'=>'ea',
		'hellenic'=>'el',
		'german'=>'de',
		'ukrainian'=>'uk'
	);
}

function phpblock_userconfig(){
	
	global $_CONF,$LANG_USERCONFIG,$_PLUGINS,$_USER,$_USERCONFIG;

	if (strcmp(VERSION, '1.4.1') < 0) {
	  $v_flag=0;
	  $cal_flag=1;
	} else {
	  $v_flag=1;
	  $cal_flag=0;
	}
	
	switch($_POST["nmode"]){
		case "backup":
		case $LANG_USERCONFIG["backup_button"]:
			$rows=file($_USERCONFIG['userconfig_now']);
			$fp=fopen($_USERCONFIG['userconfig_bak'],"w");
			foreach($rows as $row){
				fwrite($fp,$row);
			}
			fclose($fp);
			$retval="
			<div align='center'>".$LANG_USERCONFIG["finished_backup"]."<br><br><a href='".$_SERVER["PHP_SELF"]."'>OK</a></div>
			";
			break;
		case "restore":
		case $LANG_USERCONFIG["restore_button"]:
			$rows=file($_USERCONFIG['userconfig_bak']);
			$fp=fopen($_USERCONFIG['userconfig_now'],"w");
			foreach($rows as $row){
				fwrite($fp,$row);
			}
			fclose($fp);
			$retval="
			<div align='center'>".$LANG_USERCONFIG["finished_restore"]."<br><br><a href='".$_SERVER["PHP_SELF"]."'>OK</a></div>
			";
			break;
		case "write":
		case $LANG_USERCONFIG["submit"]:
			if (preg_match('/^[a-zA-Z0-9_\.\-]+?@[A-Za-z0-9_\.\-]+$/',nmox_truestring($_POST["site_mail"]))) {
			    //site_mail is OK
				$retval="
				<meta http-equiv='refresh' content='0'>
				<br><br><br><div align='center'>".$LANG_USERCONFIG["updating"]."</div><br><br><br>
				";
				$rows=file($_USERCONFIG['userconfig_now']);
				$rows=nmox_setparam("site_name",$rows,"'".nmox_truestring($_POST["site_name"])."'");
				$rows=nmox_setparam("site_slogan",$rows,"'".nmox_truestring($_POST["site_slogan"])."'");
				$rows=nmox_setparam("theme",$rows,"'".nmox_truestring($_POST["theme"])."'");
				//$rows=nmox_setparam("language",$rows,"'".nmox_truestring($_POST["language_name"])."'");
				
				if($v_flag){
					$rows=nmox_setparam("language_flag",$rows,$_POST["language_flag"]);
					$langshortcut=lang_val();
					$langcaption=lang_caption();
					$languages=(isset($_POST["language"])?$_POST["language"]:array("no data"));
					foreach($languages as $language){
						$language_checked[]="'".$langshortcut[$language]."'=>'".$langcaption[$language]."'";
						$language_files_checked[]="'".$langshortcut[$language]."'=>'".$language."_utf-8'";
					}
					$languages_array=implode(",",$language_checked);
					$language_files=implode(",",$language_files_checked);
					$rows=nmox_setparam("languages",$rows,"array(".$languages_array.")");
					$rows=nmox_setparam("language_files",$rows,"array(".$language_files.")");
				}else{
					$rows=nmox_setparam("languages",$rows,"array('no data','no data')");
					$rows=nmox_setparam("language_files",$rows,"array('no data','no data')");
				}
				
				$menusorts=$_POST["menusort"];
				$menus=$_POST["menus"];
				for($j=0;$j<count($menusorts)-1;$j++){
					for($i=0;$i<count($menusorts)-1;$i++){
						if((int)$menusorts[$i]>(int)$menusorts[($i+1)]){
							$temp1=$menusorts[($i+1)];
							$menusorts[($i+1)]=$menusorts[$i];
							$menusorts[$i]=$temp1;
							$temp2=$menus[($i+1)];
							$menus[($i+1)]=$menus[$i];
							$menus[$i]=$temp2;
						}
					}
				}
				ksort($menus);
				$menu_elements="'".implode("','",$menus)."'";
				$rows=nmox_setparam("menu_elements",$rows,"array(".$menu_elements.")");
		
				$rows=nmox_setparam("site_mail",$rows,"'".nmox_truestring($_POST["site_mail"])."'");
				$rows=nmox_setparam("disable_new_user_registration",$rows,$_POST["disable_new_user_registration"]);
				$rows=nmox_setparam("loginrequired",$rows,$_POST["loginrequired"]);
				$rows=nmox_setparam("submitloginrequired",$rows,$_POST["submitloginrequired"]);
				$rows=nmox_setparam("commentsloginrequired",$rows,$_POST["commentsloginrequired"]);
				if($cal_flag){
					$rows=nmox_setparam("calendarloginrequired",$rows,$_POST["calendarloginrequired"]);
				}
				$rows=nmox_setparam("statsloginrequired",$rows,$_POST["statsloginrequired"]);
				$rows=nmox_setparam("searchloginrequired",$rows,$_POST["searchloginrequired"]);
				$rows=nmox_setparam("profileloginrequired",$rows,$_POST["profileloginrequired"]);
				$rows=nmox_setparam("emailuserloginrequired",$rows,$_POST["emailuserloginrequired"]);
				$rows=nmox_setparam("emailstoryloginrequired",$rows,$_POST["emailstoryloginrequired"]);
				$rows=nmox_setparam("directoryloginrequired",$rows,$_POST["directoryloginrequired"]);
				$rows=nmox_setparam("storysubmission",$rows,$_POST["storysubmission"]);
				if($cal_flag){
					$rows=nmox_setparam("eventsubmission",$rows,$_POST["eventsubmission"]);
				}
				$rows=nmox_setparam("usersubmission",$rows,$_POST["usersubmission"]);
				$rows=nmox_setparam("allow_user_themes",$rows,$_POST["allow_user_themes"]);
				$rows=nmox_setparam("allow_username_change",$rows,$_POST["allow_username_change"]);
				$rows=nmox_setparam("allow_account_delete",$rows,$_POST["allow_account_delete"]);
				$rows=nmox_setparam("hide_author_exclusion",$rows,$_POST["hide_author_exclusion"]);
				$rows=nmox_setparam("advanced_editor",$rows,$_POST["advanced_editor"]);
				$notis=array_unique($_POST["notis"]);
				$temp=array_shift($notis);
				$notification="'".implode("','",$notis)."'";
				$rows=nmox_setparam("notification",$rows,"array(".$notification.")");
				$rows=nmox_setparam("listdraftstories",$rows,$_POST["listdraftstories"]);
				$rows=nmox_setparam("maximagesperarticle",$rows,nmox_truenumeric1($_POST["maximagesperarticle"]));
				$rows=nmox_setparam("limitnews",$rows,nmox_truenumeric1($_POST["limitnews"]));
				$rows=nmox_setparam("minnews",$rows,nmox_truenumeric1($_POST["minnews"]));
				$rows=nmox_setparam("contributedbyline",$rows,$_POST["contributedbyline"]);
				$rows=nmox_setparam("hideviewscount",$rows,$_POST["hideviewscount"]);
				$rows=nmox_setparam("hideemailicon",$rows,$_POST["hideemailicon"]);
				$rows=nmox_setparam("hideprintericon",$rows,$_POST["hideprintericon"]);
				$rows=nmox_setparam("allow_page_breaks",$rows,$_POST["allow_page_breaks"]);
				$rows=nmox_setparam("article_image_align",$rows,"'".$_POST["article_image_align"]."'");
				$rows=nmox_setparam("show_topic_icon",$rows,$_POST["show_topic_icon"]);
				$rows=nmox_setparam("max_image_width",$rows,nmox_truenumeric1($_POST["max_image_width"]));
				$rows=nmox_setparam("max_image_height",$rows,nmox_truenumeric1($_POST["max_image_height"]));
				$rows=nmox_setparam("max_topicicon_width",$rows,nmox_truenumeric1($_POST["max_topicicon_width"]));
				$rows=nmox_setparam("max_topicicon_height",$rows,nmox_truenumeric1($_POST["max_topicicon_height"]));
				$rows=nmox_setparam("postmode",$rows,"'".$_POST["postmode"]."'");
				$rows=nmox_setparam("showstorycount",$rows,$_POST["showstorycount"]);
				$rows=nmox_setparam("showsubmissioncount",$rows,$_POST["showsubmissioncount"]);
				$rows=nmox_setparam("hide_home_link",$rows,$_POST["hide_home_link"]);
				$rows=nmox_setparam("hidenewstories",$rows,$_POST["hidenewstories"]);
				$rows=nmox_setparam("hidenewcomments",$rows,$_POST["hidenewcomments"]);
				$rows=nmox_setparam("hidenewtrackbacks",$rows,$_POST["hidenewtrackbacks"]);
				$rows=nmox_setparam("hidenewplugins",$rows,$_POST["hidenewplugins"]);
				if($cal_flag){
					$rows=nmox_setparam("personalcalendars",$rows,$_POST["personalcalendars"]);
					$rows=nmox_setparam("showupcomingevents",$rows,$_POST["showupcomingevents"]);
					$rows=nmox_setparam("upcomingeventsrange",$rows,"'".nmox_truenumeric1($_POST["upcomingeventsrange"])."'");
					$rows=nmox_setparam("event_types",$rows,"'".nmox_truestring($_POST["event_types"])."'");
				}
				$rows=nmox_setparam("default_permissions_block",$rows,"array(3,".$_POST["dpb01"].",".$_POST["dpb02"].",".$_POST["dpb03"].")");
				if($cal_flag){
					$rows=nmox_setparam("default_permissions_event",$rows,"array(3,".$_POST["dpe01"].",".$_POST["dpe02"].",".$_POST["dpe03"].")");
				}
				$rows=nmox_setparam("default_permissions_story",$rows,"array(3,".$_POST["dps01"].",".$_POST["dps02"].",".$_POST["dps03"].")");
				$rows=nmox_setparam("default_permissions_topic",$rows,"array(3,".$_POST["dpt01"].",".$_POST["dpt02"].",".$_POST["dpt03"].")");
				$rows=nmox_setparam("censormode",$rows,$_POST["censormode"]);
				$rows=nmox_setparam("censorreplace",$rows,"'".nmox_truestring($_POST["censorreplace"])."'");
				$censors=explode(",",nmox_truestring($_POST["censorlist"]));
				$censorlist="'".implode("','",$censors)."'";
				$rows=nmox_setparam("censorlist",$rows,"array(".$censorlist.")");
				$rows=nmox_setparam("allow_domains",$rows,"'".$_POST["allow_domains"]."'");
				$rows=nmox_setparam("url_rewrite",$rows,$_POST["url_rewrite"]);
				$rows=nmox_setparam("date",$rows,"'".nmox_truestring($_POST["date"])."'");
				$rows=nmox_setparam("daytime",$rows,"'".nmox_truestring($_POST["daytime"])."'");
				$rows=nmox_setparam("shortdate",$rows,"'".nmox_truestring($_POST["shortdate"])."'");
				$rows=nmox_setparam("dateonly",$rows,"'".nmox_truestring($_POST["dateonly"])."'");
				$rows=nmox_setparam("timeonly",$rows,"'".nmox_truestring($_POST["timeonly"])."'");
				$rows=nmox_setparam("week_start",$rows,"'".nmox_truestring($_POST["week_start"])."'");
				$rows=nmox_setparam("image_lib",$rows,"'".$_POST["image_lib"]."'");
				$rows=nmox_setparam("keep_unscaled_image",$rows,"'".$_POST["keep_unscaled_image"]."'");
				$rows=nmox_setparam("trackback_enabled",$rows,$_POST["trackback_enabled"]);
				$rows=nmox_setparam("pingback_enabled",$rows,$_POST["pingback_enabled"]);
				$rows=nmox_setparam("ping_enabled",$rows,$_POST["ping_enabled"]);
				$rows=nmox_setparam("trackback_code",$rows,$_POST["trackback_code"]);
				$rows=nmox_setparam("trackbackspeedlimit",$rows,nmox_truenumeric1($_POST["trackbackspeedlimit"]));
				$rows=nmox_setparam("backend",$rows,$_POST["backend"]);
				$rows=nmox_setparam("rdf_file",$rows,"'".nmox_truestring($_POST["rdf_file"])."'");
				$rows=nmox_setparam("rdf_limit",$rows,nmox_truenumeric1($_POST["rdf_limit"]));
				$rows=nmox_setparam("rdf_storytext",$rows,nmox_truenumeric($_POST["rdf_storytext"]));
				$rows=nmox_setparam("syndication_max_headlines",$rows,nmox_truenumeric($_POST["syndication_max_headlines"]));
				$rows=nmox_setparam("commentspeedlimit",$rows,nmox_truenumeric($_POST["commentspeedlimit"]));
				$rows=nmox_setparam("comment_limit",$rows,nmox_truenumeric($_POST["comment_limit"]));
				$rows=nmox_setparam("comment_code",$rows,nmox_truenumeric($_POST["comment_code"]));

				$rows=nmox_setparam("check_trackback_link",$rows,nmox_truenumeric($_POST["check_trackback_link"]));
				$rows=nmox_setparam("multiple_trackbacks",$rows,nmox_truenumeric($_POST["multiple_trackbacks"]));
				$rows=nmox_setparam("pingback_self",$rows,nmox_truenumeric($_POST["pingback_self"]));
				$rows=nmox_setparam("locale",$rows,"'".nmox_truestring($_POST["locale"])."'");
				$rows=nmox_setparam("show_right_blocks",$rows,"'".nmox_truestring($_POST["show_right_blocks"])."'");
				//1.4.1
				if($v_flag){
				$rows=nmox_setparam("hour_mode",$rows,nmox_truenumeric($_POST["hour_mode"]));
				//$rows=nmox_setparam("rootdebug",$rows,nmox_truenumeric($_POST["rootdebug"]));
				$rows=nmox_setparam("disallow_domains",$rows,"'".$_POST["disallow_domains"]."'");
				$rows=nmox_setparam("title_trim_length",$rows,nmox_truenumeric1($_POST["title_trim_length"]));
				$rows=nmox_setparam("draft_flag",$rows,nmox_truenumeric($_POST["draft_flag"]));
				$rows=nmox_setparam("frontpage",$rows,nmox_truenumeric($_POST["frontpage"]));
				$rows=nmox_setparam("hide_no_news_msg",$rows,nmox_truenumeric($_POST["hide_no_news_msg"]));
				$rows=nmox_setparam("hide_main_page_navigation",$rows,nmox_truenumeric($_POST["hide_main_page_navigation"]));
				$rows=nmox_setparam("onlyrootfeatures",$rows,nmox_truenumeric($_POST["onlyrootfeatures"]));

				//$rows=nmox_setparam("comment_mode",$rows,"'".nmox_truestring($_POST["comment_mode"])."'");
				}
		
				$fp=fopen($_USERCONFIG['userconfig_now'],"w");
				foreach($rows as $row){
					fwrite($fp,$row);
				}
				fclose($fp);
			} else {
			    //site_mail is NG
				$retval="
				<div align='center'>
				<strong><br>".$LANG_USERCONFIG["mail_error"]."</strong><br><br>
				<a href='index.php'>".$LANG_USERCONFIG["go_index"]."</a>
				</div>
				";
			}
			break;
		case "clear":
		case $LANG_USERCONFIG["default"]:
			$rows=file($_USERCONFIG['userconfig_now']);
			$rows=nmox_setparam("site_name",$rows,"'no data'");
			$rows=nmox_setparam("site_slogan",$rows,"'no data'");
			//$rows=nmox_setparam("language",$rows,"'no data'");
			if($v_flag){
				$rows=nmox_setparam("language_flag",$rows,"'no data'");
				$rows=nmox_setparam("languages",$rows,"array('no data','no data')");
				$rows=nmox_setparam("language_files",$rows,"array('no data','no data')");
			}
			$rows=nmox_setparam("theme",$rows,"'no data'");
			$rows=nmox_setparam("menu_elements",$rows,"array('no data','no data')");
			$rows=nmox_setparam("site_mail",$rows,"'no data'");
			$rows=nmox_setparam("disable_new_user_registration",$rows,"'no data'");
			$rows=nmox_setparam("loginrequired",$rows,"'no data'");
			$rows=nmox_setparam("submitloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("commentsloginrequired",$rows,"'no data'");
			if($cal_flag){
				$rows=nmox_setparam("calendarloginrequired",$rows,"'no data'");
			}
			$rows=nmox_setparam("statsloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("searchloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("profileloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("emailuserloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("emailstoryloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("directoryloginrequired",$rows,"'no data'");
			$rows=nmox_setparam("storysubmission",$rows,"'no data'");
			$rows=nmox_setparam("eventsubmission",$rows,"'no data'");
			$rows=nmox_setparam("usersubmission",$rows,"'no data'");
			$rows=nmox_setparam("allow_user_themes",$rows,"'no data'");
			$rows=nmox_setparam("allow_username_change",$rows,"'no data'");
			$rows=nmox_setparam("allow_account_delete",$rows,"'no data'");
			$rows=nmox_setparam("hide_author_exclusion",$rows,"'no data'");
			$rows=nmox_setparam("advanced_editor",$rows,"'no data'");
			$rows=nmox_setparam("notification",$rows,"'no data'");
			$rows=nmox_setparam("listdraftstories",$rows,"'no data'");
			$rows=nmox_setparam("maximagesperarticle",$rows,"'no data'");
			$rows=nmox_setparam("limitnews",$rows,"'no data'");
			$rows=nmox_setparam("minnews",$rows,"'no data'");
			$rows=nmox_setparam("contributedbyline",$rows,"'no data'");
			$rows=nmox_setparam("hideviewscount",$rows,"'no data'");
			$rows=nmox_setparam("hideemailicon",$rows,"'no data'");
			$rows=nmox_setparam("hideprintericon",$rows,"'no data'");
			$rows=nmox_setparam("allow_page_breaks",$rows,"'no data'");
			$rows=nmox_setparam("article_image_align",$rows,"'no data'");
			$rows=nmox_setparam("show_topic_icon",$rows,"'no data'");
			$rows=nmox_setparam("max_image_width",$rows,"'no data'");
			$rows=nmox_setparam("max_image_height",$rows,"'no data'");
			$rows=nmox_setparam("max_topicicon_width",$rows,"'no data'");
			$rows=nmox_setparam("max_topicicon_height",$rows,"'no data'");
			$rows=nmox_setparam("postmode",$rows,"'no data'");
			$rows=nmox_setparam("showstorycount",$rows,"'no data'");
			$rows=nmox_setparam("showsubmissioncount",$rows,"'no data'");
			$rows=nmox_setparam("hide_home_link",$rows,"'no data'");
			$rows=nmox_setparam("hidenewstories",$rows,"'no data'");
			$rows=nmox_setparam("hidenewcomments",$rows,"'no data'");
			$rows=nmox_setparam("hidenewtrackbacks",$rows,"'no data'");
			$rows=nmox_setparam("hidenewplugins",$rows,"'no data'");
			if($cal_flag){
				$rows=nmox_setparam("personalcalendars",$rows,"'no data'");
				$rows=nmox_setparam("showupcomingevents",$rows,"'no data'");
				$rows=nmox_setparam("upcomingeventsrange",$rows,"'no data'");
				$rows=nmox_setparam("event_types",$rows,"'no data'");
			}
			$rows=nmox_setparam("default_permissions_block",$rows,"'no data'");
			if($cal_flag){
				$rows=nmox_setparam("default_permissions_event",$rows,"'no data'");
			}
			$rows=nmox_setparam("default_permissions_story",$rows,"'no data'");
			$rows=nmox_setparam("default_permissions_topic",$rows,"'no data'");
			$rows=nmox_setparam("censormode",$rows,"'no data'");
			$rows=nmox_setparam("censorreplace",$rows,"'no data'");
			$rows=nmox_setparam("censorlist",$rows,"'no data'");
			$rows=nmox_setparam("allow_domains",$rows,"'no data'");
			$rows=nmox_setparam("url_rewrite",$rows,"'no data'");
			$rows=nmox_setparam("date",$rows,"'no data'");
			$rows=nmox_setparam("daytime",$rows,"'no data'");
			$rows=nmox_setparam("shortdate",$rows,"'no data'");
			$rows=nmox_setparam("dateonly",$rows,"'no data'");
			$rows=nmox_setparam("timeonly",$rows,"'no data'");
			$rows=nmox_setparam("week_start",$rows,"'no data'");
			$rows=nmox_setparam("image_lib",$rows,"'no data'");
			$rows=nmox_setparam("keep_unscaled_image",$rows,"'no data'");
			$rows=nmox_setparam("trackback_enabled",$rows,"'no data'");
			$rows=nmox_setparam("pingback_enabled",$rows,"'no data'");
			$rows=nmox_setparam("ping_enabled",$rows,"'no data'");
			$rows=nmox_setparam("trackback_code",$rows,"'no data'");
			$rows=nmox_setparam("trackbackspeedlimit",$rows,"'no data'");
			$rows=nmox_setparam("backend",$rows,"'no data'");
			$rows=nmox_setparam("rdf_file",$rows,"'no data'");
			$rows=nmox_setparam("rdf_limit",$rows,"'no data'");
			$rows=nmox_setparam("rdf_storytext",$rows,"'no data'");
			$rows=nmox_setparam("syndication_max_headlines",$rows,"'no data'");
			$rows=nmox_setparam("commentspeedlimit",$rows,"'no data'");
			$rows=nmox_setparam("comment_limit",$rows,"'no data'");
			$rows=nmox_setparam("comment_code",$rows,"'no data'");

			$rows=nmox_setparam("check_trackback_link",$rows,"'no data'");
			$rows=nmox_setparam("multiple_trackbacks",$rows,"'no data'");
			$rows=nmox_setparam("pingback_self",$rows,"'no data'");
			$rows=nmox_setparam("locale",$rows,"'no data'");
			$rows=nmox_setparam("show_right_blocks",$rows,"'no data'");
			//1.4.1
			if($v_flag){
			$rows=nmox_setparam("hour_mode",$rows,"'no data'");
			//$rows=nmox_setparam("rootdebug",$rows,"'no data'");
			$rows=nmox_setparam("disallow_domains",$rows,"'no data'");
			$rows=nmox_setparam("title_trim_length",$rows,"'no data'");
			$rows=nmox_setparam("draft_flag",$rows,"'no data'");
			$rows=nmox_setparam("frontpage",$rows,"'no data'");
			$rows=nmox_setparam("hide_no_news_msg",$rows,"'no data'");
			$rows=nmox_setparam("hide_main_page_navigation",$rows,"'no data'");
			$rows=nmox_setparam("onlyrootfeatures",$rows,"'no data'");

			//$rows=nmox_setparam("comment_mode",$rows,"'no data'");
			}
			
			$fp=fopen($_USERCONFIG['userconfig_now'],"w");
			foreach($rows as $row){
				fwrite($fp,$row);
			}
			$retval="
			<div align='center'>".$LANG_USERCONFIG["return_default"]."<br><br><a href='".$_SERVER["PHP_SELF"]."'>OK</a></div>
			";
			fclose($fp);
			break;
		case "input":
		default:
// @@@@ 2007.05.27 changed by dengen -->>
//			$colorfront="#eeeeee";
//			$colorback="#3355cc";
//			$retval.="
//			<link rel='stylesheet' type='text/css' href='style.css'>
//			<tt>
//			<form action='".$_SERVER["PHP_SELF"]."' method='post'>
//			<h1 class='block-title'>".$LANG_USERCONFIG["userconfig"]."</h1>
//			<script type='text/javascript'>
//			<!--
//			function page01(){
//				document.getElementById('page01').style.display='block';
//				document.getElementById('page02').style.display='none';
//				document.getElementById('page03').style.display='none';
//				document.getElementById('page04').style.display='none';
//				document.getElementById('page05').style.display='none';
//				document.getElementById('tab01').style.backgroundColor='".$colorfront."';
//				document.getElementById('tab02').style.backgroundColor='".$colorback."';
//				document.getElementById('tab03').style.backgroundColor='".$colorback."';
//				document.getElementById('tab04').style.backgroundColor='".$colorback."';
//				document.getElementById('tab05').style.backgroundColor='".$colorback."';
//				document.getElementById('tab06').style.backgroundColor='".$colorback."';
//				document.getElementById('tab01').style.color='".$colorback."';
//				document.getElementById('tab02').style.color='".$colorfront."';
//				document.getElementById('tab03').style.color='".$colorfront."';
//				document.getElementById('tab04').style.color='".$colorfront."';
//				document.getElementById('tab05').style.color='".$colorfront."';
//				document.getElementById('tab06').style.color='".$colorfront."';
//			}
//			function page02(){
//				document.getElementById('page01').style.display='none';
//				document.getElementById('page02').style.display='block';
//				document.getElementById('page03').style.display='none';
//				document.getElementById('page04').style.display='none';
//				document.getElementById('page05').style.display='none';
//				document.getElementById('tab01').style.backgroundColor='".$colorback."';
//				document.getElementById('tab02').style.backgroundColor='".$colorfront."';
//				document.getElementById('tab03').style.backgroundColor='".$colorback."';
//				document.getElementById('tab04').style.backgroundColor='".$colorback."';
//				document.getElementById('tab05').style.backgroundColor='".$colorback."';
//				document.getElementById('tab06').style.backgroundColor='".$colorback."';
//				document.getElementById('tab01').style.color='".$colorfront."';
//				document.getElementById('tab02').style.color='".$colorback."';
//				document.getElementById('tab03').style.color='".$colorfront."';
//				document.getElementById('tab04').style.color='".$colorfront."';
//				document.getElementById('tab05').style.color='".$colorfront."';
//				document.getElementById('tab06').style.color='".$colorfront."';
//			}
//			function page03(){
//				document.getElementById('page01').style.display='none';
//				document.getElementById('page02').style.display='none';
//				document.getElementById('page03').style.display='block';
//				document.getElementById('page04').style.display='none';
//				document.getElementById('page05').style.display='none';
//				document.getElementById('tab01').style.backgroundColor='".$colorback."';
//				document.getElementById('tab02').style.backgroundColor='".$colorback."';
//				document.getElementById('tab03').style.backgroundColor='".$colorfront."';
//				document.getElementById('tab04').style.backgroundColor='".$colorback."';
//				document.getElementById('tab05').style.backgroundColor='".$colorback."';
//				document.getElementById('tab06').style.backgroundColor='".$colorback."';
//				document.getElementById('tab01').style.color='".$colorfront."';
//				document.getElementById('tab02').style.color='".$colorfront."';
//				document.getElementById('tab03').style.color='".$colorback."';
//				document.getElementById('tab04').style.color='".$colorfront."';
//				document.getElementById('tab05').style.color='".$colorfront."';
//				document.getElementById('tab06').style.color='".$colorfront."';
//			}
//			function page04(){
//				document.getElementById('page01').style.display='none';
//				document.getElementById('page02').style.display='none';
//				document.getElementById('page03').style.display='none';
//				document.getElementById('page04').style.display='block';
//				document.getElementById('page05').style.display='none';
//				document.getElementById('tab01').style.backgroundColor='".$colorback."';
//				document.getElementById('tab02').style.backgroundColor='".$colorback."';
//				document.getElementById('tab03').style.backgroundColor='".$colorback."';
//				document.getElementById('tab04').style.backgroundColor='".$colorfront."';
//				document.getElementById('tab05').style.backgroundColor='".$colorback."';
//				document.getElementById('tab06').style.backgroundColor='".$colorback."';
//				document.getElementById('tab01').style.color='".$colorfront."';
//				document.getElementById('tab02').style.color='".$colorfront."';
//				document.getElementById('tab03').style.color='".$colorfront."';
//				document.getElementById('tab04').style.color='".$colorback."';
//				document.getElementById('tab05').style.color='".$colorfront."';
//				document.getElementById('tab06').style.color='".$colorfront."';
//			}
//			function page05(){
//				document.getElementById('page01').style.display='none';
//				document.getElementById('page02').style.display='none';
//				document.getElementById('page03').style.display='none';
//				document.getElementById('page04').style.display='none';
//				document.getElementById('page05').style.display='block';
//				document.getElementById('tab01').style.backgroundColor='".$colorback."';
//				document.getElementById('tab02').style.backgroundColor='".$colorback."';
//				document.getElementById('tab03').style.backgroundColor='".$colorback."';
//				document.getElementById('tab04').style.backgroundColor='".$colorback."';
//				document.getElementById('tab05').style.backgroundColor='".$colorfront."';
//				document.getElementById('tab06').style.backgroundColor='".$colorback."';
//				document.getElementById('tab01').style.color='".$colorfront."';
//				document.getElementById('tab02').style.color='".$colorfront."';
//				document.getElementById('tab03').style.color='".$colorfront."';
//				document.getElementById('tab04').style.color='".$colorfront."';
//				document.getElementById('tab05').style.color='".$colorback."';
//				document.getElementById('tab06').style.color='".$colorfront."';
//			}
//			function page06(){
//				document.getElementById('page01').style.display='block';
//				document.getElementById('page02').style.display='block';
//				document.getElementById('page03').style.display='block';
//				document.getElementById('page04').style.display='block';
//				document.getElementById('page05').style.display='block';
//				document.getElementById('tab01').style.backgroundColor='".$colorback."';
//				document.getElementById('tab02').style.backgroundColor='".$colorback."';
//				document.getElementById('tab03').style.backgroundColor='".$colorback."';
//				document.getElementById('tab04').style.backgroundColor='".$colorback."';
//				document.getElementById('tab05').style.backgroundColor='".$colorback."';
//				document.getElementById('tab06').style.backgroundColor='".$colorfront."';
//				document.getElementById('tab01').style.color='".$colorfront."';
//				document.getElementById('tab02').style.color='".$colorfront."';
//				document.getElementById('tab03').style.color='".$colorfront."';
//				document.getElementById('tab04').style.color='".$colorfront."';
//				document.getElementById('tab05').style.color='".$colorfront."';
//				document.getElementById('tab06').style.color='".$colorback."';
//			}
//			-->
//			</script>
//			<body onload='javascript:page01()'>
//
//			<div id='navcontainer'>
//			<ul id='navlist' style='padding-left:4px;padding-top:2px;padding-bottom:2px;'>
//			<li><a href='javascript:page01()' id='tab01'><span style='padding-top:5px;'>".$LANG_USERCONFIG["setting_general"]."</span></a></li>
//			<li><a href='javascript:page02()' id='tab02'><span style='padding-top:5px;'>".$LANG_USERCONFIG["setting_userwork"]."</span></a></li>
//			<li><a href='javascript:page03()' id='tab03'><span style='padding-top:5px;'>".$LANG_USERCONFIG["setting_admin_general"]."</span></a></li>
//			<li><a href='javascript:page04()' id='tab04'><span style='padding-top:5px;'>".$LANG_USERCONFIG["setting_contents"]."</span></a></li>
//			<li><a href='javascript:page05()' id='tab05'><span style='padding-top:5px;'>".$LANG_USERCONFIG["setting_system"]."</span></a></li>
//			<li><a href='javascript:page06()' id='tab06'><span style='padding-top:5px;'>".$LANG_USERCONFIG["setting_all"]."</span></a></li>
//			</ul>
//			</div>
//			<div style='clear:both;'></div>
//
// @@@@ 2007.05.27 changed by dengen --||

            require_once ($_CONF['path_system'] . 'classes/navbar.class.php');
            $navbar = new navbar;
            $navbar->add_menuitem($LANG_USERCONFIG["setting_general"],      'showhideEditorDiv("page01",0);return false;',true);
            $navbar->add_menuitem($LANG_USERCONFIG["setting_userwork"],     'showhideEditorDiv("page02",1);return false;',true);
            $navbar->add_menuitem($LANG_USERCONFIG["setting_admin_general"],'showhideEditorDiv("page03",2);return false;',true);
            $navbar->add_menuitem($LANG_USERCONFIG["setting_contents"],     'showhideEditorDiv("page04",3);return false;',true);
            $navbar->add_menuitem($LANG_USERCONFIG["setting_system"],       'showhideEditorDiv("page05",4);return false;',true);
            $navbar->add_menuitem($LANG_USERCONFIG["setting_all"],          'showhideEditorDiv("all",5)   ;return false;',true);
            $navbar->set_selected($LANG_USERCONFIG["setting_general"]);
            $navlist = $navbar->generate();
			$retval.="
			<script type=\"text/javascript\">
			<!--
			function showhideEditorDiv(option,selindex)
			{
				var divarray = new Array('page01','page02','page03','page04','page05');

				var current = document.getElementById('current');
				if (current) current.id = '';
				var navbar = document.getElementById('navlist');
				var menuitems = new Array(8);
				var item = 0;
				for (var i=0 ;i < navbar.childNodes.length ; i++ ) {
					if (navbar.childNodes[i].nodeName.toLowerCase() == 'li') {
						menuitems[item] = navbar.childNodes[i];
						item++;
					}
				}
				var menuitem = menuitems[selindex];
				for (var j=0 ;j < menuitem.childNodes.length ; j++ ) {
					if (menuitem.childNodes[j].nodeName.toLowerCase() == 'a')  menuitem.childNodes[j].id = 'current';
				}

				for (i=0; i < divarray.length; i++) {
					div = divarray[i];
					if (option != 'all' && option != divarray[i]) {
						document.getElementById(div).style.display = 'none';
					} else {
						document.getElementById(div).style.display = 'block';
					}
				}
			}
			-->
			</script>
			<link rel='stylesheet' type='text/css' href='style.css'>
			<tt>
			<form action='".$_SERVER["PHP_SELF"]."' method='post'>
			<h1 class='block-title'>".$LANG_USERCONFIG["userconfig"]."</h1>

            " . $navlist;

// @@@@ 2007.05.27 changed by dengen --<<

			$retval.="
			<div id='page01' style='display:block;'>
			<h2 class='ce'>".$LANG_USERCONFIG["setting_general"]."</h2>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_site"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["site_name"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["site_name"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='site_name' value='".$_CONF["site_name"]."' size='60'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["site_slogan"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["site_slogan"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='site_slogan' value='".$_CONF["site_slogan"]."' size='60'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["theme"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["theme_public"]."</span>&nbsp;-&gt;&nbsp;<select name='theme'>
			";

			$d=dir($_CONF['path_html']."layout");
			while (false !== ($theme = $d->read())) {
				if(substr($theme,0,1)!="."){
					$retval.="<option".($_CONF["theme_public"]==$theme?" selected":"")." value='".$theme."'>".$theme."</option>";
				}
			}
			$d->close();

			$retval.="
			</select>
			</li>
			</ul>
			";

			if($v_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["language_flag"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='language_flag' value='1'".($_CONF["language_flag"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_on"]."</span></option>
				<input type='radio' name='language_flag' value='0'".($_CONF["language_flag"]!=1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_off"]."</span></option></li>
				";
	/*
				$d=dir($_CONF['path']."language");
				while (false !== ($language = $d->read())) {
					if(substr($language,-10)=="_utf-8.php"){
						$language_name=substr($language,0,-4);
						if($_CONF["language"]==$language_name){
							$selected=" selected";
						}else{
							$selected="";
						}
						$retval.="<option value='".$language_name."'".$selected.">".$language_name."</option>";
					}
				}
				$d->close();
				
				$retval.="
				</select></li>
				";
	*/
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["languagelist"]."</p>
				<ul class='ce'>
				<li>
				";
	
				$langshortcut=lang_val();
				$langcaption=lang_caption();
				$d=dir($_CONF['path']."language");
				$n=0;
				while (false !== ($language = $d->read())) {
					if(substr($language,-10)=="_utf-8.php"){
						$language_name=substr($language,0,-10);
						if(!empty($langcaption[$language_name])){
							if(in_array(substr($language,0,-4),(isset($_CONF["language_files"])?$_CONF["language_files"]:array("no data")))){
								$checked=" checked><span style='color:#060;'>";
							}else{
								$checked="><span>";
							}
							$retval.="<input type='checkbox' name='language[".$n."]' value='".$language_name."'".$checked.$langcaption[$language_name]."<strong>(".$langshortcut[$language_name].")</strong></span>&nbsp;&nbsp;";
							$n++;
							if(($n%3)==0){
								$retval.="<br>";
							}
						}
					}
				}
				$d->close();
				
				$retval.="
				</li>
				</ul>
				</ul>
				<p class='cememo'>".$LANG_USERCONFIG["languagelist1"]."</p>
				";
			}
			$n=0;
			$retval.="
			<p class='ce'>".$LANG_USERCONFIG["menu_elements"]."<input type='hidden' name='menusort[0]' value='999'><input type='hidden' name='menus[0]' value=''></p>
			<ul class='ce'>
			
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"home")==""?999:((array_search("home",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"home")==""?999:((array_search("home",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='home'"      .nmox_checkarrayparam($_CONF["menu_elements"],"home").$LANG_USERCONFIG["menu_home"]."</span></li>
			
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"contribute")==""?999:((array_search("contribute",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"contribute")==""?999:((array_search("contribute",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='contribute'".nmox_checkarrayparam($_CONF["menu_elements"],"contribute").$LANG_USERCONFIG["menu_contribute"]."</span></li>
			";
			if($cal_flag){
				$retval.="
				<li><span style='color:#060;'>".
				(nmox_checkarrayparam($_CONF["menu_elements"],"calendar")==""?999:((array_search("calendar",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
				<input type='text' name='menusort[".$n."]' size='3' value='".
				(nmox_checkarrayparam($_CONF["menu_elements"],"calendar")==""?999:((array_search("calendar",$_CONF["menu_elements"])+1)*10))."'>
				<input type='checkbox' name='menus[".$n++."]' value='calendar'"  .nmox_checkarrayparam($_CONF["menu_elements"],"calendar").$LANG_USERCONFIG["menu_calendar"]."</span></li>
				";
			}
			$retval.="
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"search")==""?999:((array_search("search",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"search")==""?999:((array_search("search",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='search'"    .nmox_checkarrayparam($_CONF["menu_elements"],"search").$LANG_USERCONFIG["menu_search"]."</span></li>
			
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"stats")==""?999:((array_search("stats",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"stats")==""?999:((array_search("stats",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='stats'"     .nmox_checkarrayparam($_CONF["menu_elements"],"stats").$LANG_USERCONFIG["menu_stats"]."</span></li>
			
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"directory")==""?999:((array_search("directory",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"directory")==""?999:((array_search("directory",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='directory'" .nmox_checkarrayparam($_CONF["menu_elements"],"directory").$LANG_USERCONFIG["menu_directory"]."</span></li>
			
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"prefs")==""?999:((array_search("prefs",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"prefs")==""?999:((array_search("prefs",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='prefs'"     .nmox_checkarrayparam($_CONF["menu_elements"],"prefs").$LANG_USERCONFIG["menu_prefs"]."</span></li>
			
			<li><span style='color:#060;'>".
			(nmox_checkarrayparam($_CONF["menu_elements"],"plugins")==""?999:((array_search("plugins",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
			<input type='text' name='menusort[".$n."]' size='3' value='".
			(nmox_checkarrayparam($_CONF["menu_elements"],"plugins")==""?999:((array_search("plugins",$_CONF["menu_elements"])+1)*10))."'>
			<input type='checkbox' name='menus[".$n++."]' value='plugins'"   .nmox_checkarrayparam($_CONF["menu_elements"],"plugins").$LANG_USERCONFIG["menu_plugins"]."</span></li>
			";
			if(function_exists( 'CUSTOM_menuEntries' )){
				$retval.="
				<li><span style='color:#060;'>".
				(nmox_checkarrayparam($_CONF["menu_elements"],"custom")==""?999:((array_search("custom",$_CONF["menu_elements"])+1)*10))."</span>&nbsp;-&gt;&nbsp;
				<input type='text' name='menusort[".$n."]' size='3' value='".
				(nmox_checkarrayparam($_CONF["menu_elements"],"custom")==""?999:((array_search("custom",$_CONF["menu_elements"])+1)*10))."'>
				<input type='checkbox' name='menus[".$n++."]' value='custom'".nmox_checkarrayparam($_CONF["menu_elements"],"custom").$LANG_USERCONFIG["menu_custom"]."</span></li>
				";
			}
			$retval.="
			<input type='hidden' name='menusort[".$n."]' value='999'><input type='hidden' name='menus[".$n."]' value=''>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["site_mail"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["site_mail"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='site_mail' value='".$_CONF["site_mail"]."' size='40'></li>
			</ul>
			</div>
			
			
			<div id='page02' style='display:none;'>
			<h2 class='ce'>".$LANG_USERCONFIG["setting_userwork"]."</h2>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_newuser"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["disable_new_user_registration"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='disable_new_user_registration' value=0".($_CONF["disable_new_user_registration"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_allow"]."</span>
			<input type='radio' name='disable_new_user_registration' value=1".($_CONF["disable_new_user_registration"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noallow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["loginrequired"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='loginrequired' value='1'".($_CONF["loginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["loginrequired1"]."</span>
			<input type='radio' name='loginrequired' value='0'".($_CONF["loginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["loginrequired2"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["setting_loginre"]."</p>
			<ul class='ce'>
			<li>".$LANG_USERCONFIG["submitloginrequired"]."<input type='radio' name='submitloginrequired' value='1'".($_CONF["submitloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='submitloginrequired' value='0'".($_CONF["submitloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			<li>".$LANG_USERCONFIG["commentsloginrequired"]."<input type='radio' name='commentsloginrequired' value='1'".($_CONF["commentsloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='commentsloginrequired' value='0'".($_CONF["commentsloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			";
			if($cal_flag){
				$retval.="
				<li>".$LANG_USERCONFIG["calendarloginrequired"]."<input type='radio' name='calendarloginrequired' value='1'".($_CONF["calendarloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
				<input type='radio' name='calendarloginrequired' value='0'".($_CONF["calendarloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
				";
			}
			$retval.="
			<li>".$LANG_USERCONFIG["statsloginrequired"]."<input type='radio' name='statsloginrequired' value='1'".($_CONF["statsloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='statsloginrequired' value='0'".($_CONF["statsloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			<li>".$LANG_USERCONFIG["searchloginrequired"]."<input type='radio' name='searchloginrequired' value='1'".($_CONF["searchloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='searchloginrequired' value='0'".($_CONF["searchloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			<li>".$LANG_USERCONFIG["profileloginrequired"]."<input type='radio' name='profileloginrequired' value='1'".($_CONF["profileloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='profileloginrequired' value='0'".($_CONF["profileloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			<li>".$LANG_USERCONFIG["emailuserloginrequired"]."<input type='radio' name='emailuserloginrequired' value='1'".($_CONF["emailuserloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='emailuserloginrequired' value='0'".($_CONF["emailuserloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			<li>".$LANG_USERCONFIG["emailstoryloginrequired"]."<input type='radio' name='emailstoryloginrequired' value='1'".($_CONF["emailstoryloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='emailstoryloginrequired' value='0'".($_CONF["emailstoryloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			<li>".$LANG_USERCONFIG["directoryloginrequired"]."<input type='radio' name='directoryloginrequired' value='1'".($_CONF["directoryloginrequired"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_need"]."</span>
			<input type='radio' name='directoryloginrequired' value='0'".($_CONF["directoryloginrequired"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noneed"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["storysubmission"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='storysubmission' value='1'".($_CONF["storysubmission"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_submission1"]."</span>
			<input type='radio' name='storysubmission' value='0'".($_CONF["storysubmission"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_submission2"]."</span></li>
			</ul>
			";
			if($cal_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["eventsubmission"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='eventsubmission' value='1'".($_CONF["eventsubmission"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_submission1"]."</span>
				<input type='radio' name='eventsubmission' value='0'".($_CONF["eventsubmission"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_submission2"]."</span></li>
				</ul>
				";
			}
			$retval.="
			<p class='ce'>".$LANG_USERCONFIG["usersubmission"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='usersubmission' value='1'".($_CONF["usersubmission"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_submission1"]."</span>
			<input type='radio' name='usersubmission' value='0'".($_CONF["usersubmission"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_submission2"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["allow_user_themes"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='allow_user_themes' value='1'".($_CONF["allow_user_themes"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["allow_user_themes1"]."</span>
			<input type='radio' name='allow_user_themes' value='0'".($_CONF["allow_user_themes"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["allow_user_themes2"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["allow_username_change"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='allow_username_change' value='1'".($_CONF["allow_username_change"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_edit"]."</span>
			<input type='radio' name='allow_username_change' value='0'".($_CONF["allow_username_change"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noedit"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["allow_account_delete"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='allow_account_delete' value='1'".($_CONF["allow_account_delete"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_delete"]."</span>
			<input type='radio' name='allow_account_delete' value='0'".($_CONF["allow_account_delete"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nodelete"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hide_author_exclusion"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hide_author_exclusion' value='1'".($_CONF["hide_author_exclusion"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["hide_author_exclusion1"]."</span>
			<input type='radio' name='hide_author_exclusion' value='0'".($_CONF["hide_author_exclusion"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["hide_author_exclusion2"]."</span></li>
			</ul>
			</div>
			
			
			<div id='page03' style='display:none;'>
			<h2 class='ce'>".$LANG_USERCONFIG["setting_admin_general"]."</h2>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_admin"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["advanced_editor"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='advanced_editor' value='1'".(($_CONF["advanced_editor"]==1)?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["advanced_editor1"]."</span>
			<input type='radio' name='advanced_editor' value='0'".(($_CONF["advanced_editor"]==0)?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["advanced_editor2"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["postmode"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='postmode' value='html'".($_CONF["postmode"]=="html"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["postmode1"]."</span>
			<input type='radio' name='postmode' value='plaintext'".($_CONF["postmode"]=="plaintext"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["postmode2"]."</span></li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["postmode_memo"]."</p>
			<p class='ce'>".$LANG_USERCONFIG["notification"]."<input type='hidden' name='notis[0]' value=''></p>
			<ul class='ce'>
			<li><input type='checkbox' name='notis[1]' value='story'".nmox_checkarrayparam($_CONF["notification"],"story").$LANG_USERCONFIG["notification_story"]."</span></li>
			<li><input type='checkbox' name='notis[2]' value='comment'".nmox_checkarrayparam($_CONF["notification"],"comment").$LANG_USERCONFIG["notification_comment"]."</span></li>
			<li><input type='checkbox' name='notis[3]' value='link'".nmox_checkarrayparam($_CONF["notification"],"link").$LANG_USERCONFIG["notification_link"]."</span></li>
			<li><input type='checkbox' name='notis[4]' value='event'".nmox_checkarrayparam($_CONF["notification"],"event").$LANG_USERCONFIG["notification_event"]."</span></li>
			<li><input type='checkbox' name='notis[5]' value='user'".nmox_checkarrayparam($_CONF["notification"],"user").$LANG_USERCONFIG["notification_user"]."</span></li>
			<li><input type='checkbox' name='notis[6]' value='trackback'".nmox_checkarrayparam($_CONF["notification"],"trackback").$LANG_USERCONFIG["notification_trackback"]."</span></li>
			<li><input type='checkbox' name='notis[7]' value='pingback'".nmox_checkarrayparam($_CONF["notification"],"pingback").$LANG_USERCONFIG["notification_pingback"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["listdraftstories"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='listdraftstories' value='1'".($_CONF["listdraftstories"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='listdraftstories' value='0'".($_CONF["listdraftstories"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			</div>
			
			
			<div id='page04' style='display:none;'>
			<h2 class='ce'>".$LANG_USERCONFIG["setting_contents"]."</h2>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_story"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["maximagesperarticle"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["maximagesperarticle"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='maximagesperarticle' value='".$_CONF["maximagesperarticle"]."' size='20'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["limitnews"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["limitnews"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='limitnews' value='".$_CONF["limitnews"]."' size='20'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["minnews"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["minnews"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='minnews' value='".$_CONF["minnews"]."' size='20'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["contributedbyline"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='contributedbyline' value='1'".($_CONF["contributedbyline"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_search"]."</span>
			<input type='radio' name='contributedbyline' value='0'".($_CONF["contributedbyline"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nosearch"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hideviewscount"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hideviewscount' value='1'".($_CONF["hideviewscount"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_hide"]."</span>
			<input type='radio' name='hideviewscount' value='0'".($_CONF["hideviewscount"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nohide"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hideemailicon"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hideemailicon' value='1'".($_CONF["hideemailicon"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_hide"]."</span>
			<input type='radio' name='hideemailicon' value='0'".($_CONF["hideemailicon"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nohide"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hideprintericon"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hideprintericon' value='1'".($_CONF["hideprintericon"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_hide"]."</span>
			<input type='radio' name='hideprintericon' value='0'".($_CONF["hideprintericon"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nohide"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["allow_page_breaks"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='allow_page_breaks' value='1'".($_CONF["allow_page_breaks"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_allow"]."</span>
			<input type='radio' name='allow_page_breaks' value='0'".($_CONF["allow_page_breaks"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noallow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["article_image_align"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='article_image_align' value='left'".($_CONF["article_image_align"]=="left"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["article_image_align1"]."</span>
			<input type='radio' name='article_image_align' value='right'".($_CONF["article_image_align"]=="right"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["article_image_align2"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["show_topic_icon"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='show_topic_icon' value='1'".($_CONF["show_topic_icon"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='show_topic_icon' value='0'".($_CONF["show_topic_icon"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			";
			if($v_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["draft_flag"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='draft_flag' value='1'".($_CONF["draft_flag"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["draft_flag1"]."</span>
				<input type='radio' name='draft_flag' value='0'".($_CONF["draft_flag"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["draft_flag2"]."</span></li>
				</ul>
				<p class='ce'>".$LANG_USERCONFIG["frontpage"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='frontpage' value='1'".($_CONF["frontpage"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["frontpage1"]."</span>
				<input type='radio' name='frontpage' value='0'".($_CONF["frontpage"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["frontpage2"]."</span></li>
				</ul>
				";
			}
			$retval.="
			<p class='ce'>".$LANG_USERCONFIG["max_image_width"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["max_image_width"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='max_image_width' value='".$_CONF["max_image_width"]."' size='20'>".$LANG_USERCONFIG["pixel"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["max_image_height"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["max_image_height"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='max_image_height' value='".$_CONF["max_image_height"]."' size='20'>".$LANG_USERCONFIG["pixel"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["keep_unscaled_image"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='keep_unscaled_image' value='1'".($_CONF["keep_unscaled_image"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["keep_unscaled_image1"]."</span>
			<input type='radio' name='keep_unscaled_image' value='0'".($_CONF["keep_unscaled_image"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["keep_unscaled_image2"]."</span></li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["keep_unscaled_image_memo"]."</p>
			<p class='ce'>".$LANG_USERCONFIG["max_topicicon_width"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["max_topicicon_width"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='max_topicicon_width' value='".$_CONF["max_topicicon_width"]."' size='20'>".$LANG_USERCONFIG["pixel"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["max_topicicon_height"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["max_topicicon_height"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='max_topicicon_height' value='".$_CONF["max_topicicon_height"]."' size='20'>".$LANG_USERCONFIG["pixel"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["comment_code"].$_CONF["comment_code"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='comment_code' value='0'".($_CONF["comment_code"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["comment_allow"]."</span>
			<input type='radio' name='comment_code' value='-1'".($_CONF["comment_code"]==-1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["comment_noallow"]."</span></li>
			</ul>
			";
			if($v_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["hide_no_news_msg"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='hide_no_news_msg' value='1'".($_CONF["hide_no_news_msg"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span>
				<input type='radio' name='hide_no_news_msg' value='0'".($_CONF["hide_no_news_msg"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span></li>
				</ul>
				<p class='ce'>".$LANG_USERCONFIG["onlyrootfeatures"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='onlyrootfeatures' value='1'".($_CONF["onlyrootfeatures"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_on"]."</span>
				<input type='radio' name='onlyrootfeatures' value='0'".($_CONF["onlyrootfeatures"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_off"]."</span></li>
				</ul>
				";
			}
			$retval.="
			<h3 class='ce'>".$LANG_USERCONFIG["setting_topics"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["showstorycount"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='showstorycount' value='1'".($_CONF["showstorycount"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='showstorycount' value='0'".($_CONF["showstorycount"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["showsubmissioncount"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='showsubmissioncount' value='1'".($_CONF["showsubmissioncount"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='showsubmissioncount' value='0'".($_CONF["showsubmissioncount"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hide_home_link"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hide_home_link' value='1'".($_CONF["hide_home_link"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_hide"]."</span>
			<input type='radio' name='hide_home_link' value='0'".($_CONF["hide_home_link"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span></li>
			</ul>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_block"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["hidenewstories"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hidenewstories' value='0'".($_CONF["hidenewstories"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='hidenewstories' value='1'".($_CONF["hidenewstories"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hidenewcomments"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hidenewcomments' value='0'".($_CONF["hidenewcomments"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='hidenewcomments' value='1'".($_CONF["hidenewcomments"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hidenewtrackbacks"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hidenewtrackbacks' value='0'".($_CONF["hidenewtrackbacks"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='hidenewtrackbacks' value='1'".($_CONF["hidenewtrackbacks"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["hidenewplugins"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='hidenewplugins' value='0'".($_CONF["hidenewplugins"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
			<input type='radio' name='hidenewplugins' value='1'".($_CONF["hidenewplugins"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
			</ul>
			";
			if($v_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["title_trim_length"]."</p>
				<ul class='ce'>
				<li><span style='color:#060;'>".$_CONF["title_trim_length"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='title_trim_length' value='".$_CONF["title_trim_length"]."' size='20'></li>
				</ul>
				";
			}
			if($cal_flag){
				$retval.="
				<h3 class='ce'>".$LANG_USERCONFIG["setting_calendar"]."</h3>
				<p class='ce'>".$LANG_USERCONFIG["personalcalendars"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='personalcalendars' value='1'".($_CONF["personalcalendars"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_on"]."</span>
				<input type='radio' name='personalcalendars' value='0'".($_CONF["personalcalendars"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_off"]."</span></li>
				</ul>
				<p class='ce'>".$LANG_USERCONFIG["showupcomingevents"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='showupcomingevents' value='1'".($_CONF["showupcomingevents"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_show"]."</span>
				<input type='radio' name='showupcomingevents' value='0'".($_CONF["showupcomingevents"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noshow"]."</span></li>
				</ul>
				<p class='ce'>".$LANG_USERCONFIG["upcomingeventsrange"]."</p>
				<ul class='ce'>
				<li><span style='color:#060;'>".$_CONF["upcomingeventsrange"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='upcomingeventsrange' value='".$_CONF["upcomingeventsrange"]."' size='20'>".$LANG_USERCONFIG["day"]."</li>
				</ul>
				<p class='ce'>".$LANG_USERCONFIG["event_types"]."</p>
				<ul class='ce'>
				<li><span style='color:#060;'>".$_CONF["event_types"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='event_types' value='".$_CONF["event_types"]."' size='60'></li>
				</ul>
				";
			}
			$retval.="
			<h3 class='ce'>".$LANG_USERCONFIG["setting_permissions"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["default_permissions_block"]."</p>
			<ul class='ce'>
			<li>".$LANG_USERCONFIG["member_group"]."
			<input type='radio' name='dpb01' value='3'".($_CONF["default_permissions_block"][1]==3?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_editview"]."</span>
			<input type='radio' name='dpb01' value='2'".($_CONF["default_permissions_block"][1]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dpb01' value='0'".($_CONF["default_permissions_block"][1]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			<li>".$LANG_USERCONFIG["member_login"]."
			<input type='radio' name='dpb02' value='2'".($_CONF["default_permissions_block"][2]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dpb02' value='0'".($_CONF["default_permissions_block"][2]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			<li>".$LANG_USERCONFIG["member_nologin"]."
			<input type='radio' name='dpb03' value='2'".($_CONF["default_permissions_block"][3]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dpb03' value='0'".($_CONF["default_permissions_block"][3]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			</ul>
			";
			if($cal_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["default_permissions_event"]."</p>
				<ul class='ce'>
				<li>".$LANG_USERCONFIG["member_group"]."
				<input type='radio' name='dpe01' value='3'".($_CONF["default_permissions_event"][1]==3?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_editview"]."</span>
				<input type='radio' name='dpe01' value='2'".($_CONF["default_permissions_event"][1]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
				<input type='radio' name='dpe01' value='0'".($_CONF["default_permissions_event"][1]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
				<li>".$LANG_USERCONFIG["member_login"]."
				<input type='radio' name='dpe02' value='2'".($_CONF["default_permissions_event"][2]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
				<input type='radio' name='dpe02' value='0'".($_CONF["default_permissions_event"][2]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
				<li>".$LANG_USERCONFIG["member_nologin"]."
				<input type='radio' name='dpe03' value='2'".($_CONF["default_permissions_event"][3]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
				<input type='radio' name='dpe03' value='0'".($_CONF["default_permissions_event"][3]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
				</ul>
				";
			}
			$retval.="
			<p class='ce'>".$LANG_USERCONFIG["default_permissions_story"]."</p>
			<ul class='ce'>
			<li>".$LANG_USERCONFIG["member_group"]."
			<input type='radio' name='dps01' value='3'".($_CONF["default_permissions_story"][1]==3?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_editview"]."</span>
			<input type='radio' name='dps01' value='2'".($_CONF["default_permissions_story"][1]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dps01' value='0'".($_CONF["default_permissions_story"][1]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			<li>".$LANG_USERCONFIG["member_login"]."
			<input type='radio' name='dps02' value='2'".($_CONF["default_permissions_story"][2]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dps02' value='0'".($_CONF["default_permissions_story"][2]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			<li>".$LANG_USERCONFIG["member_nologin"]."
			<input type='radio' name='dps03' value='2'".($_CONF["default_permissions_story"][3]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dps03' value='0'".($_CONF["default_permissions_story"][3]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["default_permissions_topic"]."</p>
			<ul class='ce'>
			<li>".$LANG_USERCONFIG["member_group"]."
			<input type='radio' name='dpt01' value='3'".($_CONF["default_permissions_topic"][1]==3?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_editview"]."</span>
			<input type='radio' name='dpt01' value='2'".($_CONF["default_permissions_topic"][1]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dpt01' value='0'".($_CONF["default_permissions_topic"][1]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			<li>".$LANG_USERCONFIG["member_login"]."
			<input type='radio' name='dpt02' value='2'".($_CONF["default_permissions_topic"][2]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dpt02' value='0'".($_CONF["default_permissions_topic"][2]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			<li>".$LANG_USERCONFIG["member_nologin"]."
			<input type='radio' name='dpt03' value='2'".($_CONF["default_permissions_topic"][3]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_view"]."</span>
			<input type='radio' name='dpt03' value='0'".($_CONF["default_permissions_topic"][3]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noview"]."</span></li>
			</ul>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_censor"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["censormode"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='censormode' value='1'".($_CONF["censormode"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_do"]."</span>
			<input type='radio' name='censormode' value='0'".($_CONF["censormode"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nodo"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["censorreplace"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["censorreplace"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='censorreplace' value='".$_CONF["censorreplace"]."' size='20'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["censorlist"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".implode(",",$_CONF["censorlist"])."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='censorlist' value='".implode(",",$_CONF["censorlist"])."' size='60'></li>
			</ul>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_blocks"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["show_right_blocks"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='show_right_blocks' value='1'".($_CONF["show_right_blocks"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_yes"]."</span>
			<input type='radio' name='show_right_blocks' value='0'".($_CONF["show_right_blocks"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_no"]."</span></li>
			</ul>
			</div>
			
			
			<div id='page05' style='display:none;'>
			<h2 class='ce'>".$LANG_USERCONFIG["setting_system"]."</h2>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_domains"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["allow_domains"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["allow_domains"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='allow_domains' value='".$_CONF["allow_domains"]."' size='60'></li>
			</ul>
			";
			if($v_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["disallow_domains"]."</p>
				<ul class='ce'>
				<li><span style='color:#060;'>".$_CONF["disallow_domains"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='disallow_domains' value='".$_CONF["disallow_domains"]."' size='60'></li>
				</ul>
				";
			}
/*
			if(isset($_CONF["url_rewrite"])){
				$url_rewrite=1;
			}else{
				$url_rewrite=0;
			}
*/
			$retval.="
			<h3 class='ce'>".$LANG_USERCONFIG["setting_url"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["url_rewrite"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='url_rewrite' value='1'".(($_CONF["url_rewrite"]==true)?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_functionon"]."</span>
			<input type='radio' name='url_rewrite' value='0'".(($_CONF["url_rewrite"]==false)?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_functionoff"]."</span></li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["url_rewrite_memo"]."</p>
			";
			if($v_flag){
				$retval.="
				<!--
				<p class='ce'>".$LANG_USERCONFIG["rootdebug"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='rootdebug' value='0'".($_CONF["rootdebug"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_functionoff"]."</span>
				<input type='radio' name='rootdebug' value='1'".($_CONF["rootdebug"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_functionon"]."</span></li>
				</ul>
				-->
				<p class='ce'>".$LANG_USERCONFIG["hide_main_page_navigation"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='hide_main_page_navigation' value='1'".($_CONF["hide_main_page_navigation"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_hide"]."</span>
				<input type='radio' name='hide_main_page_navigation' value='0'".($_CONF["hide_main_page_navigation"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nohide"]."</span></li>
				</ul>
				";
			}
			
			$retval.="
			<h3 class='ce'>".$LANG_USERCONFIG["locale_setting"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["locale"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["locale"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='locale' value='".$_CONF["locale"]."' size='20'></li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["locale_memo"]."</p>
			";
			
			if($v_flag){
				$retval.="
				<p class='ce'>".$LANG_USERCONFIG["hour_mode"]."</p>
				<ul class='ce'>
				<li><input type='radio' name='hour_mode' value='12'".($_CONF["hour_mode"]==12?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["hour_mode1"]."</span>
				<input type='radio' name='hour_mode' value='24'".($_CONF["hour_mode"]==24?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["hour_mode2"]."</span></li>
				</ul>
				";
			}
			$retval.="
			<p class='ce'>".$LANG_USERCONFIG["date"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["date"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='date' value='".($_CONF["date"])."' size='40'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["daytime"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["daytime"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='daytime' value='".($_CONF["daytime"])."' size='40'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["shortdate"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["shortdate"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='shortdate' value='".($_CONF["shortdate"])."' size='40'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["dateonly"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["dateonly"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='dateonly' value='".($_CONF["dateonly"])."' size='40'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["timeonly"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["timeonly"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='timeonly' value='".($_CONF["timeonly"])."' size='40'></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["week_start"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='week_start' value='Sun'".($_CONF["week_start"]=="Sun"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["sunday"]."</span>
			<input type='radio' name='week_start' value='Mon'".($_CONF["week_start"]=="Mon"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["monday"]."</span></li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["datetime_char1"]."</p>
			<h3 class='ce'>".$LANG_USERCONFIG["setting program"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["image_lib"]."</p>
			<ul class='ce'>
			<li>
			<input type='radio' name='image_lib' value=''".($_CONF["image_lib"]==""?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["image_lib1"]."</span>
			<input type='radio' name='image_lib' value='gdlib'".($_CONF["image_lib"]=="gdlib"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["image_lib2"]."</span>
			<input type='radio' name='image_lib' value='imagemagick'".($_CONF["image_lib"]=="imagemagick"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["image_lib3"]."</span>
			<input type='radio' name='image_lib' value='netpbm'".($_CONF["image_lib"]=="netpbm"?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["image_lib4"]."</span>
			</li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["image_lib_memo"]."</p>
			<h3 class='ce'>".$LANG_USERCONFIG["setting_comment"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["commentspeedlimit"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["commentspeedlimit"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='commentspeedlimit' value='".$_CONF["commentspeedlimit"]."' size='20'>".$LANG_USERCONFIG["second"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["comment_limit"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["comment_limit"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='comment_limit' value='".$_CONF["comment_limit"]."' size='20'></li>
			</ul>
			";
			/*
			<p class='ce'>".$LANG_USERCONFIG["comment_mode"].$_CONF["comment_mode"]."</p>
			<ul class='ce'>
			<li>
			<input type='radio' name='comment_mode' value='threaded'".($_CONF["comment_mode"]=="threaded"?" checked":"").">threaded
			<input type='radio' name='comment_mode' value='nested'".($_CONF["comment_mode"]=="nested"?" checked":"").">nested
			<input type='radio' name='comment_mode' value='flat'".($_CONF["comment_mode"]=="flat"?" checked":"").">flat
			<input type='radio' name='comment_mode' value='nocomments'".($_CONF["comment_mode"]=="nocomments"?" checked":"").">nocomments
			</li>
			</ul>
			*/
			$retval.="
			<h3 class='ce'>".$LANG_USERCONFIG["setting_trackback"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["trackback_enabled"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='trackback_enabled' value='1'".($_CONF["trackback_enabled"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_allow"]."</span>
			<input type='radio' name='trackback_enabled' value='0'".($_CONF["trackback_enabled"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noallow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["pingback_enabled"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='pingback_enabled' value='1'".($_CONF["pingback_enabled"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_allow"]."</span>
			<input type='radio' name='pingback_enabled' value='0'".($_CONF["pingback_enabled"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noallow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["ping_enabled"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='ping_enabled' value='1'".($_CONF["ping_enabled"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_allow"]."</span>
			<input type='radio' name='ping_enabled' value='0'".($_CONF["ping_enabled"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_noallow"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["trackback_code"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='trackback_code' value='0'".($_CONF["trackback_code"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["trackback_code1"]."</span>
			<input type='radio' name='trackback_code' value='-1'".($_CONF["trackback_code"]==-1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["trackback_code2"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["trackbackspeedlimit"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["trackbackspeedlimit"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='trackbackspeedlimit' value='".$_CONF["trackbackspeedlimit"]."' size='20'>".$LANG_USERCONFIG["second"]."</li>
			</ul>

			<p class='ce'>".$LANG_USERCONFIG["check_trackback_link"]."</p>
			<ul class='ce'>
			<li>
			<input type='radio' name='check_trackback_link' value='0'".($_CONF["check_trackback_link"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["check_trackback_link0"]."</span>
			<input type='radio' name='check_trackback_link' value='1'".($_CONF["check_trackback_link"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["check_trackback_link1"]."</span>
			<input type='radio' name='check_trackback_link' value='2'".($_CONF["check_trackback_link"]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["check_trackback_link2"]."</span>
			</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["multiple_trackbacks"]."</p>
			<ul class='ce'>
			<li>
			<input type='radio' name='multiple_trackbacks' value='0'".($_CONF["multiple_trackbacks"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["multiple_trackbacks0"]."</span>
			<input type='radio' name='multiple_trackbacks' value='1'".($_CONF["multiple_trackbacks"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["multiple_trackbacks1"]."</span>
			<input type='radio' name='multiple_trackbacks' value='2'".($_CONF["multiple_trackbacks"]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["multiple_trackbacks2"]."</span>
			</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["pingback_self"]."</p>
			<ul class='ce'>
			<li>
			<input type='radio' name='pingback_self' value='0'".($_CONF["pingback_self"]==0?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["pingback_self0"]."</span>
			<input type='radio' name='pingback_self' value='1'".($_CONF["pingback_self"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["pingback_self1"]."</span>
			<input type='radio' name='pingback_self' value='2'".($_CONF["pingback_self"]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["pingback_self2"]."</span>
			</li>
			</ul>


			<h3 class='ce'>".$LANG_USERCONFIG["setting_rss"]."</h3>
			<p class='ce'>".$LANG_USERCONFIG["backend"]."</p>
			<ul class='ce'>
			<li><input type='radio' name='backend' value='1'".($_CONF["backend"]==1?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_create"]."</span>
			<input type='radio' name='backend' value='2'".($_CONF["backend"]==2?" checked><span style='color:#060;'>":"><span>").$LANG_USERCONFIG["option_nocreate"]."</span></li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["rdf_file"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["rdf_file"]."</span>&nbsp;-&gt;&nbsp;<br><input type='text' name='rdf_file' value='".$_CONF["rdf_file"]."' size='60'></li>
			</ul>
			<p class='cememo'>".$LANG_USERCONFIG["rdf_file_memo"]."</p>
			<p class='ce'>".$LANG_USERCONFIG["rdf_limit"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["rdf_limit"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='rdf_limit' value='".$_CONF["rdf_limit"]."' size='20'>".$LANG_USERCONFIG["rdf_limit_memo"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["rdf_storytext"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["rdf_storytext"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='rdf_storytext' value='".$_CONF["rdf_storytext"]."' size='20'>".$LANG_USERCONFIG["rdf_storytext_memo"]."</li>
			</ul>
			<p class='ce'>".$LANG_USERCONFIG["syndication_max_headlines"]."</p>
			<ul class='ce'>
			<li><span style='color:#060;'>".$_CONF["syndication_max_headlines"]."</span>&nbsp;-&gt;&nbsp;<input type='text' name='syndication_max_headlines' value='".$_CONF["syndication_max_headlines"]."' size='20'>".$LANG_USERCONFIG["rdf_storytext_memo"]."</li>
			</ul>
			</div>
			
			<hr>
			<div align='center'>
			<input type='submit' name='nmode' value='".$LANG_USERCONFIG["submit"]."'>
			<input type='submit' name='nmode' value='".$LANG_USERCONFIG["backup_button"]."'>
			<input type='submit' name='nmode' value='".$LANG_USERCONFIG["restore_button"]."'>
			<input type='submit' name='nmode' value='".$LANG_USERCONFIG["default"]."'>
			</form>
			</div>
			<p class='cememo'>".$LANG_USERCONFIG["return_default_memo"]."</p>
			</tt>
			";
	}
	
	return $retval;
}

function nmox_setparam($name_val,$rows,$value){
	global $_CONF;
	$n=0;
	foreach($rows as $row){
		if(substr($row,1,strlen("nmox_".$name_val."="))=="nmox_".$name_val."="){
			$data=explode("=",$row);
			$rows[$n]=$data[0]."=".$value.";\n";
		}
		$n++;
	}
	return $rows;
}

function nmox_checkarrayparam($arraydata,$word){
	array_unshift($arraydata,"dumy");
	if(array_search($word,$arraydata)>0){
		$value=" checked><span style='color:#060;'>";
	}else{
		$value="><span>";
	}
	return $value;
}

function nmox_truenumeric($lc_num_it){
	$lc_value_it=trim($lc_num_it);
	$lc_value_it=mb_convert_kana($lc_value_it,"n","utf-8");
	if(!is_numeric($lc_value_it)){
		$lc_value_it=0;
	}
	return $lc_value_it;
}

function nmox_truenumeric1($lc_num_it){
	$lc_value_it=trim($lc_num_it);
	$lc_value_it=mb_convert_kana($lc_value_it,"n","utf-8");
	if(!is_numeric($lc_value_it) or $lc_value_it==0){
		$lc_value_it="'no data'";
	}
	return $lc_value_it;
}

function nmox_truestring($lc_string_ch){
	global $_DB_dbms;
	$lc_value_ch=COM_applyFilter($lc_string_ch);
	return $lc_value_ch;
}
?>
