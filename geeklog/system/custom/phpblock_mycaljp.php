<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +-------------------------------------------------------------------------+
// | Geeklog Site Calendar Block 'mycaljp' version 1.0.7                     |
// | Only Supported with Geeklog 1.4.1 and new Search Class                  |
// +-------------------------------------------------------------------------+
// | phpblock_mycaljp.php                                                    |
// | Main program to view site calendar                                      |
// +-------------------------------------------------------------------------+
// | Copyright (C) 2000-2007 by the following authors:                       |
// | Geeklog Author:       Tony Bibbs   - tony@tonybibbs.com                 |
// | mycal Block Author:   Blaine Lang  - geeklog@langfamily.ca              |
// | mycaljp Block Author: Yoshinori Tahara - dengen                         |
// | Original PHP Calendar by Scott Richardson - srichardson@scanonline.com  |
// +-------------------------------------------------------------------------+
// |                                                                         |
// | This program is free software; you can redistribute it and/or           |
// | modify it under the terms of the GNU General Public License             |
// | as published by the Free Software Foundation; either version 2          |
// | of the License, or (at your option) any later version.                  |
// |                                                                         |
// | This program is distributed in the hope that it will be useful,         |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
// | GNU General Public License for more details.                            |
// |                                                                         |
// | You should have received a copy of the GNU General Public License       |
// | along with this program; if not, write to the Free Software Foundation, |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.         |
// |                                                                         |
// +-------------------------------------------------------------------------+

// +-------------------------------------------------------------------------+
// | Configuration                                                           |
// +-------------------------------------------------------------------------+

$_MYCALJP_CONF = array();

/*
 * チェックするコンテンツの設定
 * ----------------------------
 */
//チェック（検索）しないコンテンツをコメントアウトしてください。
//カンマの消し忘れ、つけすぎに注意してください。

$_MYCALJP_CONF['contents'] = array(
    'stories',          //記事
    'comments',         //コメント
    'calendar',         //イベントカレンダ
    'staticpages',      //静的ページ
    'forum',            //掲示板
    'filemgmt',         //ダウンロード
    'links',            //リンク
    'wkyevecal'         //wkyevecal 事前連絡メール付きカレンダ
);

/*
 * 土・日・休日の色分け表示の設定
 * ------------------------------
 *   true  : 色分けする (default)
 *   false : 色分けしない
 */

$_MYCALJP_CONF['show_holiday'] = true;

/*
 * 日本の休日を調べるかどうかの設定
 * --------------------------------
 *   true  : 調べる (default)
 *   false : 調べない
 */

$_MYCALJP_CONF['check_jp_holiday'] = true;

/*
 * タイトル(年・月)の設定
 * ----------------------
 * "m"  月．数字。先頭にゼロをつける．  (01 から 12)
 * "n"  月．数字。先頭にゼロをつけない．(1 から 12)
 * "F"  月．フルスペルの文字．          (January から December)
 * "M"  月．3 文字形式．                (Jan から Dec)
 * "Y"  年．4 桁の数字．                (例: 1999または2003)
 * "y"  年．2 桁の数字．                (例: 99 または 03)
 */

/* 和風 (default) */
$_MYCALJP_CONF['title_year']     = "Y年";
$_MYCALJP_CONF['title_month']    = "m月";

/* 洋風 */
//$_MYCALJP_CONF['title_year']   = "Y";
//$_MYCALJP_CONF['title_month']  = "F";

/*
 * 曜日の表示文字列リストの設定
 * ----------------------------
 */

/* 和風 (default) */
$_MYCALJP_CONF['wdays'] = array('日', '月', '火', '水', '木', '金', '土');

/* 洋風(1) */
//$_MYCALJP_CONF['wdays'] = array('Su', 'M', 'Tu', 'W', 'Th', 'F', 'Sa');

/* 洋風(2) */
//$_MYCALJP_CONF['wdays'] = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
// スタイルシートによる文字サイズの調整が必要でしょう.


/*
 * 日付クリック後の検索結果表示において、右サイドバーを表示するかどうかの設定
 * --------------------------------------------------------------------------
 *   true  : 表示する (default)
 *   false : 表示しない
 */

$_MYCALJP_CONF['enables_right_blocks'] = true;

/*
 * 日付クリック後の検索結果表示において、記事の導入部(イントロ)を表示するかどうかの設定
 * ------------------------------------------------------------------------------------
 *   true  : 表示する (default)
 *   false : 表示しない
 */

$_MYCALJP_CONF['show_stories_intro'] = true;

// Configurationはここまで

// +-------------------------------------------------------------------------+
// | Main Program                                                            |
// +-------------------------------------------------------------------------+

// テンプレートのパスを設定する
mycaljp_setlayoutpath();

define ( "_MYCAL_DAY_", 86400 ); // 60 * 60 * 24
define ( "_STORY_"  , 1 ); 
define ( "_ACTIVE_" , 2 ); 

function phpblock_mycaljp( $caltype = 1 )
{
    global $_TABLES, $_CONF, $_PLUGINS, $_MYCALJP_CONF;


    //@@@@@ setlocale(LC_TIME, "");
    setlocale(LC_TIME,$_CONF['locale']);

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
    $prevmonth = date("Y-m-01", strtotime($thismonth . "-1 month")); // komma
    $nextmonth = date("Y-m-01", strtotime($thismonth . "+1 month")); // komma

    $firstdayofmonthstr = date("Y-m-d", $firstdayofmonth);
    $lastdayofmonthstr  = date("Y-m-d", $lastdayofmonth);

    $firstdayofyearstr  = date("Y-01-01", $base);
    $lastdayofyearstr   = date("Y-12-31", $base);

    $days = array();

    foreach ( $_MYCALJP_CONF['contents'] as $pi_name )
    {

        // Check stories
        if ( $pi_name == "stories" )
        {
            $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
                 . "FROM {$_TABLES['stories']} "
                 . "WHERE (draft_flag = 0) AND (date <= NOW()) "
                 . "AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') ";
            $result = DB_query ($sql);
            while ( $o = DB_fetchArray($result) )
                $days[ date( "Y-m-d", $o['day'] ) ] |= _STORY_;
        }

        // Check comments
        else if ( $pi_name == "comments" )
        {
            $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
                 . "FROM {$_TABLES['comments']} "
                 . "WHERE (date <= NOW()) AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') ";
            $result = DB_query ($sql);
            while ( $o = DB_fetchArray($result) )
                $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
        }

        // Get the events ( for version <= 1.4.0 )
        //else if ( ( substr( VERSION, 0, 5 ) <= "1.4.0" ) && $pi_name == "calendar" )
        //{
        //    $events = array();
        //    $sql = "SELECT eid,title,url,datestart,dateend,group_id,owner_id,perm_owner,perm_group,perm_members,perm_anon "
        //         . "FROM {$_TABLES['events']} "
        //         . "WHERE (datestart >= '$firststr') AND (datestart <= '$laststr') ";
        //    $result = DB_query($sql);
        //    while ( $o = DB_fetchArray($result) )
        //        $events[ $o['datestart'] ][ $o['eid'] ] = $o;
        //}

        else if ( in_array( $pi_name, $_PLUGINS ) )
        {

            // Get the events
            if ( $pi_name == "calendar" || $pi_name == "wkyevecal" )
            {
                $table = ($pi_name == "calendar") ? $_TABLES['events'] : $_TABLES['wkyevecal'];
                $events = array();
                $sql = "SELECT eid,title,url,datestart,dateend,timestart,timeend,group_id,owner_id,perm_owner,perm_group,perm_members,perm_anon "
                     . "FROM {$table} "
                     . "WHERE (datestart >= '$firststr') AND (datestart <= '$laststr') ";
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

            // Check forum
            else if ( $pi_name == "forum" )
            {
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
                        $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                }
            }

            // Check staticpages
            else if ( $pi_name == "staticpages" )
            {
                if ( function_exists( 'plugin_dopluginsearch_' . $pi_name ) )
                {
                    $sql = "SELECT UNIX_TIMESTAMP(sp_date) AS day "
                         . "FROM {$_TABLES['staticpage']} "
                         . "WHERE (sp_date <= NOW()) AND (UNIX_TIMESTAMP(sp_date) BETWEEN '$startdate' AND '$enddate') ";
                    $result = DB_query ($sql);
                    while ( $o = DB_fetchArray($result) )
                        $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                }
            }

            // Check links
            else if ( $pi_name == "links" )
            {
                if ( function_exists( 'plugin_dopluginsearch_' . $pi_name ) )
                {
                    $sql = "SELECT UNIX_TIMESTAMP(date) AS day "
                         . "FROM {$_TABLES['links']} "
                         . "WHERE (date <= NOW()) AND (UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') ";
                    $result = DB_query ($sql);
                    while ( $o = DB_fetchArray($result) )
                        $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                }
            }

            // Check filemgmt
            else if ( $pi_name == "filemgmt" )
            {
                if ( function_exists( 'plugin_dopluginsearch_' . $pi_name ) )
                {
                    global $_FM_TABLES;
                    // Collect ids of files open to all users (grp_access = 2)
                    $sql = "SELECT date AS day "
                         . "FROM {$_FM_TABLES['filemgmt_filedetail']} AS f "
                         . "LEFT JOIN {$_FM_TABLES['filemgmt_cat']} AS c ON f.cid = c.cid "
                         . "WHERE (date BETWEEN '$startdate' AND '$enddate') AND ( c.grp_access = 2 )";
                    $result = DB_query ($sql);
                    while ( $o = DB_fetchArray($result) )
                        $days[ date( "Y-m-d", $o['day'] ) ] |= _ACTIVE_;
                }
            }
        }
    }

    $cal = new Template( $_MYCALJP_CONF['path_layout'] );
    $cal->set_file( array(
        'calendar' => 'calendar.thtml',
        'header'   => 'header.thtml',
        'week'     => 'week.thtml',
        'day'      => 'day.thtml'
    ));
    $cal->set_var ( 'site_url', $_CONF['site_url'] );

    if ( $_MYCALJP_CONF['title_year'] )
        $title_year = date( $_MYCALJP_CONF['title_year'], $base );
    else
        $title_year = ucfirst( strftime( ( substr($_CONF['locale'],0,2) == "ja" ) ? "%Y年" : "%Y", $base ) );
    $anchor = '<a href="' . $_CONF["site_url"] . '/mycaljp/search.php?datestart=' . $firstdayofyearstr 
        . '&amp;dateend=' . $lastdayofyearstr . '&amp;type=all&amp;mode=search&amp;topic=0&amp;author=0&amp;month=' . $thismonth
        . '" title="'. $title_year . 'のコンテンツ">' . $title_year . '</a>';
    $cal->set_var('title_year',$anchor);

    if ( $_MYCALJP_CONF['title_month'] )
        $title_month = date( $_MYCALJP_CONF['title_month'], $base );
    else
        $title_month = ucfirst( strftime( ( substr($_CONF['locale'],0,2) == "ja" ) ? "%m月" : "%B", $base ) );
    $anchor = '<a href="' . $_CONF["site_url"] . '/mycaljp/search.php?datestart=' . $firstdayofmonthstr 
        . '&amp;dateend=' . $lastdayofmonthstr . '&amp;type=all&amp;mode=search&amp;topic=0&amp;author=0'
        . '" title="'. $title_month . 'のコンテンツ">' . $title_month . '</a>';
    $cal->set_var( 'title_month', $anchor );

    // Header with Month Title and Next/Prev links
    $qstr = preg_replace( '/[&]*month=[0-9]{4}-[0-9]{2}-[0-9]{2}/', '', $_SERVER["QUERY_STRING"] );
    $qstr = htmlspecialchars( $qstr );

    $url = mycaljp_escape( $_SERVER['PHP_SELF'] );

    $tmp = $url . "?" . $qstr . "&amp;month=" . $prevmonth;
    $tmp = str_replace( '?&amp;', '?', $tmp );
    $cal->set_var('prevmonth', $tmp );
    
    $tmp = $url . "?" . $qstr . "&amp;month=" . $nextmonth;
    $tmp = str_replace( '?&amp;', '?', $tmp );
    $cal->set_var('nextmonth', $tmp );

    $cal->set_var('testprevmonth', $_CONF["site_url"] . "/mycaljp/res.php" . "?" . $qstr . "&month=" . $prevmonth );
    $cal->set_var('testnextmonth', $_CONF["site_url"] . "/mycaljp/res.php" . "?" . $qstr . "&month=" . $nextmonth );

    $wdays = array('sunday','monday','tuesday','wednesday','thursday','friday','saturday');
    for ( $i = 0; $i < 7; $i++ )
    {
        $cal->set_var( 'weekday_class', $wdays[$i] );

        if ( substr($_CONF['locale'],0,2) == "ja" && ( $_MYCALJP_CONF['wdays'] ) )
            $cal->set_var( 'title_weekday', $_MYCALJP_CONF['wdays'][$i] );
        else
            $cal->set_var( 'title_weekday', ucfirst(strftime("%a", $firstdaytodisplay + ($i * _MYCAL_DAY_))) );

        $cal->parse( 'dayofweeks_title', 'header', true );
    }

    for ( $w = 0; $w < $totalweeks; $w++ )
    {
        for ( $d = 0; $d < 7; $d++ )
        {
            $cal->set_var( 'daylink', mycaljp_daysurl($events, $firstdaytodisplay + (_MYCAL_DAY_ * ($d + ($w * 7))), $base, $days, $d, $caltype) );
            $cal->parse( 'calendar_days','day', ($d > 0) );
        }
        $cal->parse( 'calendar_week', 'week', true );
    }

    return $cal->parse ( 'output', 'calendar' );
}


function mycaljp_daysurl(&$events, $timestamp, $base, &$days, $weekday, $caltype) 
{
    global $_TABLES, $_CONF, $_MYCALJP_CONF;

    $day = date( "j", $timestamp );
    $key = date( "Y-m-d", $timestamp );
    $today = ( date("Y-m-d") == $key );
    $story  = ( ( $days[ $key ] & _STORY_  ) > 0 );
    $active = ( ( $days[ $key ] & _ACTIVE_ ) > 0 );
    $thismonth = ( date( "m", $timestamp ) == date( "m", $base ) );
    $sunday = false;
    $saturday = false;
    $holiday = false;

    if ( $_MYCALJP_CONF['show_holiday'] )
    {
        $sunday   = ( $weekday == 0 );
        $saturday = ( $weekday == 6 );
        if ( $_MYCALJP_CONF['check_jp_holiday'] )
            $holiday  = is_JP_Holiday($timestamp);
    }

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

    if ( $event || $active || $story )
    {
        $anchor = '<a href="' . $_CONF["site_url"] . '/mycaljp/search.php?datestart=' . $key 
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
function is_JP_Holiday($timestamp)
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
              if ( $week == 3 && $weekday == 1 ) return true; //成人の日(第3月曜日)
          }
          elseif ( $year >= 1996 )
          {
              if ( $day == 20 ) return true; //海の日
          }
          break;
      
      case 9:// 9月
          $AutumnEquinox = floor( 23.2488 + 0.242194 * ( $year - 1980 ) - floor( ( $year - 1980 ) / 4 ) );
          if( year > 1979 && year < 2100 )
          {
              if ( $day == $AutumnEquinox ) return true; //秋分の日
          }
          if ( $year >= 2003 )
          {
              $week = floor( ( $day - 1 ) / 7 ) + 1;
              if ( $week == 3 && $weekday == 1 ) return true; //敬老の日(第3月曜日)
              if ( $weekday == 2 && ( $day == $MyAutumnEquinox - 1 ) ) return true; //国民の休日(敬老の日と秋分の日にはさまれた日)
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

function mycaljp_escape( $str )
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
    return htmlspecialchars( $str, ENT_QUOTES, $encoding );
}

// スライドカレンダー
function mycaljp_slidecalender()
{
    return phpblock_mycaljp( 2 );
}

// テンプレートのパスを設定する
function mycaljp_setlayoutpath()
{
    global $_CONF, $_MYCALJP_CONF;
    
    if ( is_dir( $_CONF['path_layout'] . 'mycaljp' ) )
      $_MYCALJP_CONF['path_layout'] = $_CONF['path_layout'] . 'mycaljp';
    else
      $_MYCALJP_CONF['path_layout'] = $_CONF['path_html'] . 'mycaljp/templates';
}


?>
