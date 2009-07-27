<?php
 /* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.6 for Geeklog - The Ultimate Weblog               |
// | Release date: Oct 30,2006                                                 |
// +---------------------------------------------------------------------------+
// | Moderation.php                                                            |
// | Forum Moderation Program                                                  |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000,2001,2002,2003 by the following authors:               |
// | Geeklog Author: Tony Bibbs       - tony@tonybibbs.com                     |
// +---------------------------------------------------------------------------+
// | Plugin Authors                                                            |
// | Blaine Lang,                  blaine@portalparts.com, www.portalparts.com |
// | Version 1.0 co-developer:     Matthew DeWyer, matt@mycws.com              |
// | Prototype & Concept :         Mr.GxBlock, www.gxblock.com                 |
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

require_once '../lib-common.php';
require_once $CONF_FORUM['path_include'] . 'gf_format.php';
require_once $CONF_FORUM['path_include'] . 'gf_showtopic.php';

if (!in_array('forum', $_PLUGINS)) {
    echo COM_refresh($_CONF['site_url'] . '/index.php');
    exit;
}

// Check for access privilege and pass true to check that user is signed in.
forum_chkUsercanAccess(true);

$display = '';

// Display Common headers
$display .= gf_siteHeader();

// Debug Code to show variables
$display .= gf_showVariables();

$forum     = COM_applyFilter($_REQUEST['forum'],true);
$showtopic = COM_applyFilter($_REQUEST['showtopic'],true);

ForumHeader($forum, $showtopic, $display);

// Pass thru filter any get or post variables to only allow numeric values and remove any hostile data
$fortopicid  = COM_applyFilter($_REQUEST['fortopicid'],true);
$moveid      = COM_applyFilter($_REQUEST['moveid'],true);
$top         = COM_applyFilter($_REQUEST['top']);
$movetoforum = COM_applyFilter($_REQUEST['movetoforum'],true);
$msgid       = COM_applyFilter($_REQUEST['msgid'],true);
$msgpid      = COM_applyFilter($_REQUEST['msgpid'],true);
$fortopicid  = COM_applyFilter($_REQUEST['fortopicid'],true);
$modfunction = COM_applyFilter($_REQUEST['modfunction']);
$submit = $_POST['submit'];

if ($forum == 0) {
    $display .= alertMessage($LANG_GF02['msg71']);
    $display .= gf_siteFooter();
    echo $display;
    exit();
}

if (forum_modPermission($forum,$_USER['uid'])) {

    //Moderator check OK, everything dealing with moderator permissions go here.
    if ($_POST['modconfirmdelete'] == 1 && $msgid != '') {
        if ($submit == $LANG_GF01['CANCEL']) {
            echo COM_refresh("viewtopic.php?showtopic=$msgpid");
            exit();
        } else {

            $topicparent = DB_getItem($_TABLES['gf_topic'],"pid","id='$msgid'");
            if ($top == 'yes') {
                DB_query("DELETE FROM {$_TABLES['gf_topic']} WHERE (id='$msgid')");
                PLG_itemDeleted($msgid, 'forum');
                DB_query("DELETE FROM {$_TABLES['gf_topic']} WHERE (pid='$msgid')");

                DB_query("DELETE FROM {$_TABLES['gf_watch']} WHERE (id='$msgid')");
                $postCount = DB_Count($_TABLES['gf_topic'],'forum',$forum);
                DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=topic_count-1,post_count=$postCount WHERE forum_id=$forum");
                $query = DB_query("SELECT MAX(id)as maxid FROM {$_TABLES['gf_topic']} WHERE forum=$forum");
                list($last_topic) = DB_fetchArray($query);
                if ($last_topic > 0) {
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET last_post_rec=$last_topic WHERE forum_id=$forum");
                } else {
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET last_post_rec=0 WHERE forum_id=$forum");
                }
            } else {
                DB_query("UPDATE {$_TABLES['gf_topic']} SET replies=replies-1 WHERE (id='$topicparent')");
                DB_query("DELETE FROM {$_TABLES['gf_topic']} WHERE (id='$msgid')");
                PLG_itemDeleted($msgid, 'forum');
                DB_query("UPDATE {$_TABLES['gf_forums']} SET post_count=post_count-1 WHERE forum_id=$forum");
                // Get the post id for the last post in this topic
                $query = DB_query("SELECT MAX(id)as maxid FROM {$_TABLES['gf_topic']} WHERE forum=$forum");
                list($last_topic) = DB_fetchArray($query);
                if ($last_topic > 0) {
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET last_post_rec=$last_topic WHERE forum_id=$forum");
                }
            }

            if ($topicparent == 0) {
                $topicparent = $msgid;
            } else {
                $lsql = DB_query("SELECT MAX(id) FROM {$_TABLES['gf_topic']} WHERE pid='$topicparent' ");
                list($lastrecid) = DB_fetchArray($lsql);
                if ($lastrecid == NULL) {
                    $topicdatecreated = DB_getItem($_TABLES['gf_topic'],date,"id=$topicparent");
                    DB_query("UPDATE {$_TABLES['gf_topic']} SET last_reply_rec=$topicparent, lastupdated='$topicdatecreated' WHERE id='$topicparent'");
                } else {
                    $topicdatecreated = DB_getItem($_TABLES['gf_topic'],date,"id=$lastrecid");
                    DB_query("UPDATE {$_TABLES['gf_topic']} SET last_reply_rec=$lastrecid, lastupdated=$topicdatecreated WHERE id={$topicparent}");
                }
            }

            // Remove any lastviewed records in the log so that the new updated topic indicator will appear
            DB_query("DELETE FROM {$_TABLES['gf_log']} WHERE topic='$topicparent'");

            if ($top == 'yes') {
                $link = "{$_CONF['site_url']}/forum/index.php?forum=$forum";
                $display .= forum_statusMessage($LANG_GF02['msg55'],$link,$LANG_GF02['msg55'],true,$forum);
            } else {
                $link = "{$_CONF['site_url']}/forum/viewtopic.php?showtopic=$msgpid";
                $display .= forum_statusMessage($LANG_GF02['msg55'],$link,$LANG_GF02['msg55'],true,$forum);
            }
            $display .= gf_siteFooter();
            echo $display;
            exit();
        }
    }

    if ($_POST['confirmbanip'] == '1') {
        if ($submit == $LANG_GF01['CANCEL']) {
            echo COM_refresh("viewtopic.php?showtopic=$fortopicid");
            exit();
        } else {
            $hostip = COM_applyFilter($_POST['hostip']);
            DB_query("INSERT INTO {$_TABLES['gf_banned_ip']} (host_ip) VALUES ('$hostip')");
            $link = "{$_CONF['site_url']}/forum/viewtopic.php?showtopic=$fortopicid";
            $display .= forum_statusMessage($LANG_GF02['msg56'],$link,$LANG_GF02['msg56']);
            $display .= gf_siteFooter();
            echo $display;
            exit();
        }
    }

    if ($_POST['confirm_move'] == '1' AND forum_modPermission($forum,$_USER['uid'],'mod_move') AND $moveid != 0) {
        if ($submit == $LANG_GF01['CANCEL']) {
            echo COM_refresh("viewtopic.php?showtopic=$moveid");
            exit();
        } else {
            $date = time();
            $movetoforum = gf_preparefordb($_POST['movetoforum'],text);
            $movetitle = gf_preparefordb($_POST['movetitle'],text);
            $newforumid = DB_getItem($_TABLES['gf_forums'],"forum_id","forum_name='$movetoforum'");
            /* Check and see if we are splitting this forum thread */

            if (isset($_POST['splittype'])) {  // - Yes
                $curpostpid = DB_getItem($_TABLES['gf_topic'],"pid","id='$moveid'");
                if ($_POST['splittype'] == 'single') {  // Move only the single post - create a new topic
                    $topicdate = DB_getItem($_TABLES['gf_topic'],"date","id='$moveid'");
                    $sql  = "UPDATE {$_TABLES['gf_topic']} SET forum='$newforumid', pid='0',lastupdated='$topicdate', ";
                    $sql .= "subject='$movetitle', replies = '0' WHERE id='$moveid' ";
                    DB_query($sql);
                    PLG_itemSaved($moveid, 'forum');
                    DB_query("UPDATE {$_TABLES['gf_topic']} SET replies=replies-1 WHERE id='$curpostpid' ");

                    // Update Topic and Post Count for the effected forums
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=topic_count+1, post_count=post_count+1 WHERE forum_id=$newforumid");
                    $topicsQuery = DB_query("SELECT id FROM {$_TABLES['gf_topic']} WHERE forum=$forum and pid=0");
                    $topic_count = DB_numRows($topicsQuery);
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=$topic_count, post_count=post_count-1 WHERE forum_id=$forum");

                    // Update the Forum and topic indexes
                    gf_updateLastPost($forum,$curpostpid);
                    gf_updateLastPost($newforumid,$moveid);

                } else {
                    $movesql = DB_query("SELECT id,date FROM {$_TABLES['gf_topic']} WHERE pid='$curpostpid' AND id >= '$moveid'");
                    $numreplies = DB_numRows($movesql);
                    $topicparent = 0;
                    while($movetopic = DB_fetchArray($movesql)) {
                        if ($topicparent == 0) {
                            $sql  = "UPDATE {$_TABLES['gf_topic']} SET forum='$newforumid', pid='0',lastupdated='{$movetopic['date']}', ";
                            $sql .= "replies=$numreplies - 1, subject='$movetitle' WHERE id='{$movetopic['id']}'";
                            DB_query($sql);
                            PLG_itemSaved($movetopic['id'], 'forum');
                            $topicparent = $movetopic['id'];
                        } else {
                            $sql  = "UPDATE {$_TABLES['gf_topic']} SET forum='$newforumid', pid='$topicparent', ";
                            $sql .= "subject='$movetitle' WHERE id='{$movetopic['id']}'";
                            DB_query($sql);
                            PLG_itemSaved($movetopic['id'], 'forum');
                            $topicdate = DB_getItem($_TABLES['gf_topic'],"date","id='{$movetopic['id']}'");
                            DB_query("UPDATE {$_TABLES['gf_topic']} SET lastupdated='$topicdate' WHERE id='$topicparent'");
                        }
                    }
                    // Update the Forum and topic indexes
                    gf_updateLastPost($forum,$curpostpid);
                    gf_updateLastPost($newforumid,$topicparent);

                    /* Update the number of replies now in all previous topic post records */
                    DB_query("UPDATE {$_TABLES['gf_topic']} SET replies=replies-$numreplies WHERE id='$curpostpid' ");

                    // Update Topic and Post Count for the effected forums
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=topic_count+1, post_count=post_count+$numreplies WHERE forum_id=$newforumid");
                    DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=topic_count-1, post_count=post_count-$numreplies WHERE forum_id=$forum");
                }
                $link = "{$_CONF['site_url']}/forum/viewtopic.php?showtopic=$moveid";
                $display .= forum_statusMessage(sprintf($LANG_GF02['msg183'],$movetoforum),$link,$LANG_GF02['msg183']);

            } else {  // Move complete topic
                $moveResult = DB_query("SELECT id FROM {$_TABLES['gf_topic']} WHERE pid=$moveid");
                $postCount = DB_numRows($moveResult) +1;  // Need to account for the parent post
                while($movetopic = DB_fetchArray($moveResult)) {
                    DB_query("UPDATE {$_TABLES['gf_topic']} SET forum='$newforumid' WHERE id='{$movetopic['id']}'");
                    PLG_itemSaved($movetopic['id'], 'forum');
                }
                // Update any topic subscription records - need to change the forum ID record
                DB_query("UPDATE {$_TABLES['gf_watch']} SET forum_id = '$newforumid' WHERE topic_id='{$moveid}'");
                DB_query("UPDATE {$_TABLES['gf_topic']} SET forum = '$newforumid', moved = '1' WHERE id=$moveid");
                PLG_itemSaved($moveid, 'forum');

                // Update the Last Post Information
                gf_updateLastPost($newforumid,$moveid);
                gf_updateLastPost($forum);

                // Update Topic and Post Count for the effected forums
                DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=topic_count+1, post_count=post_count+$postCount WHERE forum_id=$newforumid");
                DB_query("UPDATE {$_TABLES['gf_forums']} SET topic_count=topic_count-1, post_count=post_count-$postCount WHERE forum_id=$forum");

                // Remove any lastviewed records in the log so that the new updated topic indicator will appear
                DB_query("DELETE FROM {$_TABLES['gf_log']} WHERE topic='$moveid'");
                $link = "{$_CONF['site_url']}/forum/viewtopic.php?showtopic=$moveid";
                $display .= forum_statusMessage($LANG_GF02['msg163'],$link,$LANG_GF02['msg163']);
            }
            $display .= gf_siteFooter();
            echo $display;
            exit();

        }
    }

    if ($modfunction == 'deletepost' AND forum_modPermission($forum,$_USER['uid'],'mod_delete') AND $fortopicid != 0) {

        if ($top == 'yes') {
            $alertmessage = $LANG_GF02['msg65'] . "<p>";
        } else {
            $alertmessage = '';
        }
        $subject = DB_getItem($_TABLES['gf_topic'],"subject","id='$msgpid'");
        $alertmessage .= sprintf($LANG_GF02['msg64'],$fortopicid,$subject);

        $promptform  = '<p><form action="' .$_CONF['site_url'] . '/forum/moderation.php" method="post">';
        $promptform .= '<input type="hidden" name="modconfirmdelete" value="1"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="msgid" value="' .$fortopicid. '"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="forum" value="' .$forum. '"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="msgpid" value="' .$msgpid. '"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="top" value="' .$top. '"' . XHTML . '>';
        $promptform .= '<center><input type="submit" name="submit" value="' .$LANG_GF01['CONFIRM']. '"' . XHTML . '>&nbsp;&nbsp;';
        $promptform .= '<input type="submit" name="submit" value="' .$LANG_GF01['CANCEL']. '"' . XHTML . '></center>';
        $promptform .= '</center></form></p>';
        $display .= alertMessage($alertmessage,$LANG_GF02['msg182'],$promptform);

    } elseif ($modfunction == 'editpost' AND forum_modPermission($forum,$_USER['uid'],'mod_edit') AND $fortopicid != 0) {
        $page = COM_applyFilter($_REQUEST['page'],true);
        echo COM_refresh("createtopic.php?method=edit&amp;id=$fortopicid&amp;page=$page");
        echo $LANG_GF02['msg110'];

    } elseif ($modfunction == 'lockedpost' AND forum_modPermission($forum,$_USER['uid'],'mod_edit') AND $fortopicid != 0) {
        echo COM_refresh("createtopic.php?method=postreply&amp;id=$fortopicid");
        echo $LANG_GF02['msg173'];

    } elseif ($modfunction == 'movetopic' AND forum_modPermission($forum,$_USER['uid'],'mod_move') AND $fortopicid != 0) {

        $SECgroups = SEC_getUserGroups();  // Returns an Associative Array - need to parse out the group id's
        $modgroups = '';
        foreach ($SECgroups as $key) {
          if ($modgroups == '') {
             $modgroups = $key;
          } else {
              $modgroups .= ",$key";
          }
        }
        /* Check and see if user had moderation rights to another forum to complete the topic move */
        $sql = "SELECT DISTINCT forum_name FROM {$_TABLES['gf_moderators']} a , {$_TABLES['gf_forums']} b ";
        $sql .= "where a.mod_forum = b.forum_id AND ( a.mod_uid='{$_USER['uid']}' OR a.mod_groupid in ($modgroups))";
        $query = DB_query($sql);

        if (DB_numRows($query) == 0) {
            $display .= alertMessage($LANG_GF02['msg181'],$LANG_GF01['WARNING']);
        } else {
            $topictitle = DB_getItem($_TABLES['gf_topic'],"subject","id='$fortopicid'");
            $promptform  = '<div style="padding:10 0 5 0px;">';
            $promptform .= '<form action="' .$_CONF['site_url'] . '/forum/moderation.php" method="post">';
            $promptform .= '<input type="hidden" name="moveid" value="' .$fortopicid. '"' . XHTML . '>';
            $promptform .= '<input type="hidden" name="confirm_move" value="1"' . XHTML . '>';
            $promptform .= '<input type="hidden" name="forum" value="' .$forum. '"' . XHTML . '>';
            $promptform .= '<div>'.$LANG_GF03['selectforum'];
            $promptform .= '&nbsp;<select name="movetoforum" style="width:120px;">';
            while($showforums = DB_fetchArray($query)){
                $promptform  .= "<option>$showforums[forum_name]";
            }
            $promptform .= '</select>';
            $promptform .= '</div><div style="padding:10 0 5 0px;">'.$LANG_GF02['msg186'].':&nbsp;';
            $promptform .= '<input type="text" size="60" name="movetitle" value="' .$topictitle. '"' . XHTML . '>';


            /* Check and see request to move complete topic or split the topic */
            if (DB_getItem($_TABLES['gf_topic'],"pid","id='$fortopicid'") == 0) {
                $promptform .= '</div><div style="padding:20 0 5 20px;">';
                $promptform .= '<input type="submit" name="submit" value="' .$LANG_GF03['movetopic']. '"' . XHTML . '>';
                $promptform .= '&nbsp;&nbsp;<input type="submit" name="submit" value="' .$LANG_GF01['CANCEL']. '"' . XHTML . '></div>';
                $promptform .= '</form></div>';
                $alertmessage = sprintf($LANG_GF03['movetopicmsg'],$topictitle);
                $display .= alertMessage($alertmessage,$LANG_GF02['msg182'],$promptform);
            } else {
                $poster   = DB_getItem($_TABLES['gf_topic'],"name","id='$fortopicid'");
                $postdate = COM_getUserDateTimeFormat(DB_getItem($_TABLES['gf_topic'],"date","id='$fortopicid'"));
                $promptform .= '<div style="padding-top:10px;">'.$LANG_GF03['splitheading'] .'<br' . XHTML . '>';
                $promptform .= '<input type="radio" name="splittype" value="remaining" checked="checked"' . XHTML . '>'.$LANG_GF03['splitopt1'] .'<br' . XHTML . '>';
                $promptform .= '<input type="radio" name="splittype" value="single"' . XHTML . '>'.$LANG_GF03['splitopt2'] .'</div>';
                $promptform .= '</div><div style="padding:20 0 5 20px;">';
                $promptform .= '<input type="submit" name="submit" value="' .$LANG_GF03['movetopic']. '"' . XHTML . '>';
                $promptform .= '&nbsp;&nbsp;<input type="submit" name="submit" value="' .$LANG_GF01['CANCEL']. '"' . XHTML . '></div>';
                $promptform .= '</form></div>';
                $alertmessage = sprintf($LANG_GF03['splittopicmsg'],$topictitle,$poster,$postdate[0]);
                $display .= alertMessage($alertmessage,$LANG_GF02['msg182'],$promptform);
            }
        }


    } elseif ($modfunction == 'banip' AND forum_modPermission($forum,$_USER['uid'],'mod_ban') AND $fortopicid != 0) {

        $iptobansql = DB_query("SELECT ip FROM {$_TABLES['gf_topic']} WHERE id='$fortopicid'");
        $forumpostipnum = DB_fetchArray($iptobansql);
        if ($forumpostipnum['ip'] == '') {
            $display .= alertMessage($LANG_GF02['msg174']);
            exit;
        }
        $alertmessage =  '<p>' .$LANG_GF02['msg68'] . '</p><p>';
        $ip_address = $forumpostipnum['ip'];
        if (!empty($_CONF['ip_lookup'])) {
            $iplookup = str_replace('*', $ip_address, $_CONF['ip_lookup']);
            $ip_address = '<a href="' . $iplookup . '">' . $ip_address . '</a>';
        }
        $alertmessage .= sprintf($LANG_GF02['msg69'], $ip_address) . '</p>';

        $promptform  = '<p><form action="' .$_CONF['site_url'] . '/forum/moderation.php" method="post">';
        $promptform .= '<input type="hidden" name="hostip" value="' .$forumpostipnum['ip']. '"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="confirmbanip" value="1"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="forum" value="' .$forum. '"' . XHTML . '>';
        $promptform .= '<input type="hidden" name="fortopicid" value="' .$fortopicid. '"' . XHTML . '>';
        $promptform .= '<center><input type="submit" name="submit" value="' .$LANG_GF01['CONFIRM']. '"' . XHTML . '>';
        $promptform .= '&nbsp;&nbsp;<input type="submit" name="submit" value="' .$LANG_GF01['CANCEL']. '"' . XHTML . '>';
        $promptform .= '</center></form></p>';
        $display .= alertMessage($alertmessage,$LANG_GF02['msg182'],$promptform);

    } else {
        $display .= alertMessage($LANG_GF02['msg71'],$LANG_GF01['WARNING']);
    }

} else {
    $display .= alertMessage($LANG_GF02['msg72'],$LANG_GF01['ACCESSERROR']);
}

$display .= gf_siteFooter();

echo $display;
?>