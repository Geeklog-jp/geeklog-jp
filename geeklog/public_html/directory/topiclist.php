<?php

require_once ('../lib-common.php');

// name of this script
define ('THIS_SCRIPT', 'directory/topiclist.php');
if (!defined ("LB")) {
    define("LB", "\n");
}

$show=30; // 1ページの行数

$_FORM = array_merge($_GET,$_POST);
$tid = COM_applyFilter($_FORM['tid']);
$lst = COM_applyFilter($_FORM['lst']);
$page = COM_applyFilter($_FORM['page'],true);
if (!isset($page) OR $page == 0) {
    $page = 1;
}


/**
* Displays a list of topics
*
* Lists all the topics and their icons.
*
* @return   string      HTML for the topic list
*
*/
function listtopics($lst,$tid)
{
    global $_CONF, $_TABLES, $_USER, $_BLOCK_TEMPLATE,
           $page, $newstories;

    $sql = "SELECT tid,topic,imageurl FROM {$_TABLES['topics']}";


    if ($tid!=""){
        $sql .= ' WHERE ';      
        $sql .= ' tid="'.$tid.'"';
    }

 
    if( !empty( $_USER['uid'] ) && ( $_USER['uid'] > 1 )) {
        $tids = DB_getItem( $_TABLES['userindex'], 'tids',
                            "uid = '{$_USER['uid']}'" );
        if( !empty( $tids )) {
            if ($tid==""){
                $sql .= ' WHERE ';
            }else{
                $sql .= ' and ';
            }
            $sql .= " (tid NOT IN ('" . str_replace( ' ', "','", $tids )
                 . "'))" . COM_getPermSQL( 'AND' );
        }else{
            if ($tid!=''){
                $sql .= COM_getPermSQL( 'AND' );
            }else{
                $sql .= COM_getPermSQL();
            }
        }
    }else{
        if ($tid!=''){
            $sql .= COM_getPermSQL( 'AND' );
        }else{
            $sql .= COM_getPermSQL();
        }
    }
    
    if( $_CONF['sortmethod'] == 'alpha' ){
        $sql .= ' ORDER BY topic ASC';
    }else{
        $sql .= ' ORDER BY sortnum';
    }
    $result = DB_query( $sql );

    $retval = '';
    $sections = new Template( $_CONF['path_layout'] );
 
    $sql = "SELECT tid, count(*) AS count FROM {$_TABLES['stories']} "
         . 'WHERE (draft_flag = 0) AND (date <= NOW()) '
         . COM_getPermSQL( 'AND' )
         . ' GROUP BY tid';
    $rcount = DB_query( $sql );
    while( $C = DB_fetchArray( $rcount )){
        $storycount[$C['tid']] = $C['count'];
    }

        $retval .='<h1 style="background:none;margin:0;padding:0;">';
        $retval .='<a href="/directory.php"><img src="/layout/IvySOHO/images/gerbera/menu_news_release.gif" ';
        $retval .='alt="ニュースリリース" /></a></h1>'.LB;

    while( $A = DB_fetchArray( $result ) )    {
        $topicname = stripslashes( $A['topic'] );
        $retval .='<h2>';
        if (  empty($storycount[$A['tid']]) ) {
              $retval .=$topicname;
        } else {
            $url = $_CONF['site_url'] . '/' . THIS_SCRIPT . '?lst=topics&tid=';
            $url .=$A['tid'];
            $retval .= '<a href="' . $url . '">';
            $retval .=$topicname;
            $retval .=  ' (' . COM_numberFormat ($storycount[$A['tid']]) . ')';
            $retval .=  '</a>';
        }
        $retval .='</h2>';
        
        if ($lst=="all") {
            $retval .= liststory($A['tid']);
        }

    }

    return $retval;
}

function liststory ($tid)
{
    global $_CONF, $_TABLES,  $LANG_DIR;
    global $page, $show;

    $retval = '';

    $sql = "SELECT COUNT(*) ";
    $sql .= " FROM {$_TABLES['stories']} WHERE (draft_flag = 0) AND (date <= NOW())";
    if ($tid != '') {
        $sql .= " AND (tid = '$tid')";
    }
    $sql .= COM_getTopicSql ('AND') . COM_getPermSql ('AND') ;
    list($maxrows) = DB_fetchArray(DB_query($sql));

    $offset = ($page - 1) * $show;

    $sql = "SELECT sid,title,UNIX_TIMESTAMP(date) AS day" ;
    $sql .= " FROM {$_TABLES['stories']} WHERE (draft_flag = 0) AND (date <= NOW())";
    if ($tid != '') {
        $sql .= " AND (tid = '$tid')";
    }
    $sql .= COM_getTopicSql ('AND') . COM_getPermSql ('AND') ;
    $sql .=  " ORDER BY date DESC";
    $sql .= " LIMIT $offset, $show";

    $result = DB_query ($sql);
    $numrows = DB_numRows ($result);


    if ($numrows > 0) {
        $entries = array ();

        for ($i = 0; $i < $numrows; $i++) {
            $A = DB_fetchArray ($result);
            //日付編集
            $curtime = COM_getUserDateTimeFormat ($A['day']);
            $day = $curtime[0];
            //$day = strftime ($_CONF['shortdate'], $A['day']);
            $day = strftime ('%Y.%m.%d', $A['day']);

            $url = COM_buildUrl ($_CONF['site_url'] . '/article.php?story='
                                 . $A['sid']);
            $entries[] =  $day. '  '. '<a href="' . $url . '">' . stripslashes ($A['title']). '</a>';
        }

        if (sizeof ($entries) > 0) {
            $retval .= COM_makeList ($entries);


            // ページナビゲーション設定
            $base_url= $_CONF['site_url'] ."/". THIS_SCRIPT;
            $page_str='page=';
            $numpages = ceil($maxrows / $show);//ページ数
            $page_str='page=';

            $retval .= COM_printPageNavigation($base_url,$page, $numpages,$page_str);

        }

    } else {
        $retval .= '<p>' . $LANG_DIR['no_articles'] . '</p>';
    }

    $retval .= LB;

    return $retval;
}

function navBar ($tid)
{
    global $_CONF, $_TABLES, $LANG05, $LANG_DIR;

    $retval = '';

    $retval .= '<div class="pagenav">';


    $url = $_CONF['site_url'] . '/' . THIS_SCRIPT;
    $retval .= '<a href="' . $url . '">' . $LANG_DIR['nav_top'] . '</a>';

    $retval .= '</div>' . LB;

    return $retval;
}

function menutopics($tid)
{
    global $_CONF, $_TABLES, $_USER, $_BLOCK_TEMPLATE,
           $page, $newstories;

    $sql = "SELECT tid,topic,imageurl FROM {$_TABLES['topics']}";

    if( !empty( $_USER['uid'] ) && ( $_USER['uid'] > 1 )) {
        $tids = DB_getItem( $_TABLES['userindex'], 'tids',
                            "uid = '{$_USER['uid']}'" );
        if( !empty( $tids )) {
            $sql .= ' WHERE ';
            $sql .= " (tid NOT IN ('" . str_replace( ' ', "','", $tids )
                 . "'))" . COM_getPermSQL( 'AND' );
        }else{
            $sql .= COM_getPermSQL();
        }
    }else{
        $sql .= COM_getPermSQL();
    }

    if( $_CONF['sortmethod'] == 'alpha' ){
        $sql .= ' ORDER BY topic ASC';
    }else{
        $sql .= ' ORDER BY sortnum';
    }
    $result = DB_query( $sql );

    $retval = '';
    $sections = new Template( $_CONF['path_layout'] );
 
    $sql = "SELECT tid, count(*) AS count FROM {$_TABLES['stories']} "
         . 'WHERE (draft_flag = 0) AND (date <= NOW()) '
         . COM_getPermSQL( 'AND' )
         . ' GROUP BY tid';
    $rcount = DB_query( $sql );
    while( $C = DB_fetchArray( $rcount )){
        $storycount[$C['tid']] = $C['count'];
    }


    $opttopics='<option value=""';
    if (empty($tid)){
        $opttopics .= ' selected="selected"';
    }
    $opttopics .='>すべて</option>'.LB;
    while( $A = DB_fetchArray( $result ) )    {
        $topicname = stripslashes( $A['topic'] );
        $opttopics.='<option value="'.$A['tid'].'"';
        if ($A['tid'] == $tid) {
            $opttopics .= ' selected="selected"';
        }
        $opttopics.='>'.$topicname.'</option>'.LB;
    }

    $retval .='<div id="topiclist"><form style="float:right" action="'.$_CONF['site_url'] . '/' . THIS_SCRIPT.'" method="post">'.LB;
    $retval .='<select name="tid" style="width: 200px" onchange="this.form.submit()">'.LB;
    $retval .=$opttopics;
    $retval .='</select>'.LB;
//    $retval .='</form><h1><a href="/directory/topiclist.php">記事リスト</a></h1>'.LB;   2008/03/09 by k-holy
    $retval .='</form><h1><a href="' . $_CONF['site_url'] . '/' . THIS_SCRIPT . '">記事リスト</a></h1>'.LB;

    $retval .= liststory($tid);
    $retval .='</div>';

    return $retval;
}


// MAIN

$display = '';

$display .= COM_siteHeader('menu', $LANG_DIR['title']);
if (isset($_GET['msg'])) {
    $display .= COM_showMessage (COM_applyFilter ($_GET['msg'], true));
}

$display .= menutopics($tid);


//
$display .= COM_siteFooter();
echo $display;

?>
