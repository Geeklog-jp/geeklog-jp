<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog SiteCalendar Block version 2.3                                    |
// | Only Supported with Geeklog 1.4.0 and new Search Class                    |
// +---------------------------------------------------------------------------+
// | main.php                                                                  |
// | Main program to view site calendar that displays GL Calendar              |
// | events and hooks into the GL search to show any site updates              |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000,2001 by the following authors:                         |
// | Geeklog Author: Tony Bibbs       - tony@tonybibbs.com                     |
// | Block Author:   Blaine Lang      - geeklog@langfamily.ca                  |
// | Block Modified: Yoshinori Tahara                                          |
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
// Release History
/********************************************************************************
* June 12/2002: Blaine Lang                                                     *
* Modified to work with Geeklog - structured as functions                       *
* and building HTML output to be called as a phpblock and                       *
*                                                                               *
* Sept 2/02: Fixed a bug where today was not being higlighted in the next month *
* Changed all occurances of $InThisMonth to $GLOBALS['InThisMonth']             *
*                                                                               *
* Sept 15/02: Version 2.0                                                       *
* ALmost a complete re-write, code restructured                                 *
* Integrated vesion with Site Search and Events Calendar                        *
* Displayed dates are now active hyperlinks to search results for that day      *
* Added ability to view next/prev months                                        *
* Now using Template classes for fonts                                          *
* Fixed bug with extra week showing up occasionally                             *
*                                                                               *
* Sept 16/02: Fixed bug where I was not checking access to events that were     *
* displayed on the calendar - added access checks.                              *
* Note: Currently only checking system calendar for events  - not personal      *
* Nov 08/02: Gorka Olaizola <gorka@escomposlinux.org>                           *
*    Fixed dates when week starts in previous month                             *
*    Fixed dates when switching years                                           *
*    Added setlocale and strftime for printing the month in local language      *
*                                                                               *
* Dec 03/02: Replaced a couple HTML fixes that had been made since the version  *
* used by Gorka when he did his changes                                         *
*                                                                               *
* January 25/2003: Stephen Magyari                                              *
* Removed the height=100% attribute from the first and last tables in           *
* $BlockDisplay to address a display anomaly in IE 5.2 on Mac OS X, added a     *
* missing </tr> after the month header, and added class="mycallink" attribute   *
* to the 3 occurrences of $event_url                                            *
*                                                                               *
* Feb 01/2003: Blaine Lang                                                      *
* Fixed sellocale() error displayed that occured under PHP 4.3                  *
*                                                                               *
*                                                                               *
* Jul 19/2003: Blaine Lang                                                      *
* Modified for Geeklog 1.3.8 - Core GL Search completely replaced               *
* New Search Class is now being used. No longer need to modify GL Files         *
* Rename SiteCalendar - and is now self contained - no modifications requried   *
*                                                                               *
* Apr 13/2004: Niels Leenheer                                                   *
* Large rewrite to ensure the calender only uses one query to fetch all events  *
* instead of one query for each day. This reduces the number of queries by      *
* 27 or 34. Also, multiple bugs are fixed such as:                              *
* - Multiple events on the same say are now properly shown                      *
* - If there were multiple events on the same day and the first event was       *
*   off limits for the current user, the other events were not taken into       *
*   acount, and as a result that day was not marked as a day with an event      *
* - Weekday abbreviations are now displayed according to the current locale     *
* - Removed <html> and <body> tags from the output, because the output is used  *
*   in an already existing html document.                                       *
*                                                                               *
* Mar 29/2006: Blaine Lang    ( mycal version 1.5 )                             *
* Updated for Geeklog Version 1.4                                               *
*                                                                               *
* Jun 16/2006: Komma Tetsuko (for japanese)                                     *
* Oct 22/2006: mystral-kk - a minor bug fix                                     *
*********************************************************************************/

/********************************************************************************
* modified version 0.1                                                          *
* 2007.1.8 : Yoshinori Tahara as dengen                                         *
* Geeklog SiteCalendar Block "mycal" version 2.5 をベースにして開発しました。   *
* 変更点：検索結果のない日にちにはリンク処理をおこないません。                  *
*                                                                               *
* modified version 0.2                                                          *
* 2007.1.21 : Yoshinori Tahara as dengen                                        *
* 見逃していたmystral-kk氏の修正(Oct 22/2006)を反映させました。                 *
*                                                                               *
* modified version 0.3                                                          *
* 2007.2.14 : Yoshinori Tahara as dengen                                        *
* 先月または翌月のイベントが表示されてしまう不具合を修正しました。              *
*********************************************************************************/

define ("_MYCAL_DAY_", 60 * 60 * 24);

function display_calendar() 
{
    global $_TABLES, $_CONF;
    global $_PLUGINS;

    
    //@@@@@ setlocale(LC_TIME, "");
    setlocale(LC_TIME,$_CONF['locale']);

    if( !isset($_GET['month']) ) 
    {
        $WorkDate = date("Y-m-d");
    }
    else
    {
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
    
    $prevmonth = date("Y-m-d", strtotime($WorkDate . "-1 month")); // komma
    $nextmonth = date("Y-m-d", strtotime($WorkDate . "+1 month")); // komma

    $title = ucfirst( strftime( ( substr($_CONF['locale'],0,2) == "ja" ) ? "%Y年 %m月" : "%B %Y", $base ) );


    // Get the events
    $events = array();
    $sql = "SELECT eid, title,url,datestart,dateend,group_id,owner_id,perm_owner,perm_group,perm_members,perm_anon  FROM {$_TABLES['events']} WHERE datestart >= '$firststr' AND datestart <= '$laststr' ";
    $result = DB_query($sql);
    while ( $o = DB_fetchArray($result) )
        $events[ $o['datestart'] ][ $o['eid'] ] = $o;

    // Check stories
    $days = array();
    $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
         . "FROM {$_TABLES['stories']} "
         . "WHERE (draft_flag = 0) AND (date <= NOW()) "
         . "AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') ";
    $result = DB_query ($sql);
    while ( $o = DB_fetchArray($result) )
        $days[ date( "Y-m-d", $o['day'] ) ] = 1;

    // Check comments
    $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
         . "FROM {$_TABLES['comments']} "
         . "WHERE (date <= NOW()) AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') ";
    $result = DB_query ($sql);
    while ( $o = DB_fetchArray($result) )
        $days[ date( "Y-m-d", $o['day'] ) ] = 1;

    // Check forum
//@@@@@update20070211---->
    //if ( function_exists( 'plugin_dopluginsearch_forum' ) )
    $ret= DB_getItem($_TABLES['plugins'],'pi_enabled', 'pi_name = "Forum" AND pi_enabled=1' );
    if ( $ret==1 )
//@@@@@update20070211<----
    {
        $sql = "SELECT date AS day "
             . "FROM {$_TABLES['gf_topic']} "
             . "WHERE (date <= NOW()) AND (date BETWEEN '$startdate' AND '$enddate') ";
        $result = DB_query ($sql);
        while ( $o = DB_fetchArray($result) )
            $days[ date( "Y-m-d", $o['day'] ) ] = 1;
    }

    // Check staticpages
    if ( function_exists( 'plugin_dopluginsearch_staticpage' ) )
    {
        $sql = "SELECT UNIX_TIMESTAMP(sp_date) AS day "
             . "FROM {$_TABLES['staticpage']} "
             . "WHERE (sp_date <= NOW()) AND (UNIX_TIMESTAMP(sp_date) BETWEEN '$startdate' AND '$enddate') ";
        $result = DB_query ($sql);
        while ( $o = DB_fetchArray($result) )
            $days[ date( "Y-m-d", $o['day'] ) ] = 1;
    }

    // Check links
    if ( function_exists( 'plugin_dopluginsearch_links' ) )
    {
        $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
             . "FROM {$_TABLES['links']} "
             . "WHERE (date <= NOW()) AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') ";
        $result = DB_query ($sql);
        while ( $o = DB_fetchArray($result) )
            $days[ date( "Y-m-d", $o['day'] ) ] = 1;
    }

    // Header with Month Title and Next/Prev buttons
    $BlockDisplay .= "<!-- SiteCalendar Block -->\r<table style='text-align:center' class='mycalTitle' summary='Site Calendar'>\r"
        . "<tr><td colspan='7' class='mycalTitle'>\r"
        . "<a href='" . $_CONF['site_url'] . "/index.php?month=" . $prevmonth . "' >&#171;</a>"
        . "&nbsp;" . $title . "&nbsp;"
        . "<a href='" . $_CONF['site_url'] . "/index.php?month=" . $nextmonth . "' >&#187;</a>\r"
        . "</td></tr>\r"; 

    // Main Calendar
    $BlockDisplay .= "<tr>";
    if ( substr($_CONF['locale'],0,2) == "ja" )
    {
        // ロケールを提供していないサーバ向け対応 ( by mystral-kk )
        $wdays = array('日', '月', '火', '水', '木', '金', '土');
        for ($i = 0; $i < 7; $i++)
            $BlockDisplay .= "<th>" . $wdays[$i] . "</th>";
    }
    else
    {
        for ($i = 0; $i < 7; $i++)
            $BlockDisplay .= "<th>" . ucfirst(strftime("%a", $firstdaytodisplay + ($i * _MYCAL_DAY_))) . "</th>";
    }

    $BlockDisplay .= "</tr>\r";
    for ($w = 0; $w < $totalweeks; $w++)
    {
        $BlockDisplay .= "<tr class='day'>\r";
        for ($d = 0; $d < 7; $d++)
        {
            $BlockDisplay .= mycal_eventurl($events, $firstdaytodisplay + (_MYCAL_DAY_ * ($d + ($w * 7))), $base, $days);
        }
        $BlockDisplay .= "</tr>\r";
    }
    $BlockDisplay .= "</table>\r";

    return $BlockDisplay;
}

function mycal_eventurl(&$events, $timestamp, $base, $days) 
{
    global $_TABLES, $_CONF;

    $day = date( "j", $timestamp );
    $key = date( "Y-m-d", $timestamp );
    $today = ( date("Y-m-d") == $key );
    $active = ( $days[ $key ] == 1 );
    $thismonth = ( date( "m", $timestamp ) == date( "m", $base ) );

    $event = '';
    if ( count( $events[$key] ) )
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

    if ( $event || $active )
    {
        $anchor = '<a href="' . $_CONF["site_url"] . '/mycal/calsearch.php?datestart=' . $key 
            . '&amp;dateend=' . $key . '&amp;type=all&amp;mode=search&amp;topic=0&amp;author=0';
        $anchor .= $event ? '" title="'. $event : '';
        $anchor .= '">' . $day . '</a>';
    }
        
    if ( $event )
    {
        if ( ! $thismonth )
        {
            $event_url = '<td class="mycalNextMonth">';
        } 
        else 
        {
            $event_url = '<td class="' . ( $today ? "mycalTodayEventHighlight" : "mycalEventHighlight" ) . '">' . $anchor;
        }
    }
    else
    {    
        if ( ! $thismonth )
        {
            $event_url = '<td class="mycalNextMonth">';
        }
        else 
        {
            if ( $today )
            {
                $event_url = '<td class="mycalTodayHighlight">' . $day;

                if ( $active )
                {
                    $event_url = '<td class="mycalTodayActiveHighlight">' . $anchor; 
                }
            }
            else
            {
                $event_url = '<td>' . $day;

                if ( $active )
                {
                    $event_url = '<td class="mycalActiveHighlight">' . $anchor; 
                }
            }
        }
    }

    $event_url .= "</td>\r";
        
    return $event_url;
}

?>