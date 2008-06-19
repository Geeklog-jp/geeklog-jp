<?php
// $Id$
// +---------------------------------------------------------------------------+
// | テーブルをDropする                                                        |
// +---------------------------------------------------------------------------+
// Last Update 2008/06/02

// (01) 
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."access"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."article_images"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."blocks"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."commentcodes"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."commentmodes"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."comments"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."cookiecodes"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."dateformats"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."events"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."eventsubmission"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."faq_categories"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."faq_topics"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."featurecodes"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."features"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_broken"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_category"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_downloadhistory"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_filedesc"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_filedesc"
    ;


$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_filedetail"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."filemgmt_votedata"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_banned_ip"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_categories"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_forums"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_log"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_moderators"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_settings"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_topic"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_userinfo"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_userprefs"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."forum_watch"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."frontpagecodes"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."group_assignments"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."groups"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."links"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."linksubmission"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."maillist"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."personal_events"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."plugins"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."pollanswers"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."pollquestions"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."pollvoters"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."postmodes"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."sessions"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."sortcodes"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."spamx"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."speedlimit"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."staticpage"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."statuscodes"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."stories"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."storysubmission"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."syndication"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."topics"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."tzcodes"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."usercomment"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."userindex"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."userinfo"
    ;

$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."userprefs"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."users"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."vars"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."trackback"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."pingservice"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."trackbackcodes"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."jpml_rules"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."nmoxmenu"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."thm_contents"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."users_opt"
    ;

// add for Ver.1.5.0
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."tokens"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."conf_values"
    ;
$_SQL[] = "DROP TABLE IF EXISTS  "
    .$_DB_table_prefix."polltopics"
    ;

?>
