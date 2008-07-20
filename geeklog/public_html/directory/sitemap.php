<?php

require_once ('../lib-common.php');

// name of this script
define ('THIS_SCRIPT', 'directory/sitemap.php');
if (!defined ("LB")) {
    define("LB", "\n");
}

$_FORM = array_merge($_GET,$_POST);
$tid = COM_applyFilter($_FORM['tid']);
$lst = COM_applyFilter($_FORM['lst']);

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

 
    if( !empty( $_USER['uid'] ) && ( $_USER['uid'] > 1 ))
    {
        $tids = DB_getItem( $_TABLES['userindex'], 'tids',
                            "uid = '{$_USER['uid']}'" );
        if( !empty( $tids ))
        {

            if ($tid==""){
                 $sql .= ' WHERE ';
            }else{$sql .= ' and ';}
            $sql .= " (tid NOT IN ('" . str_replace( ' ', "','", $tids )
                 . "'))" . COM_getPermSQL( 'AND' );
        }
        else
        {
            if ($tid!=''){$sql .= COM_getPermSQL( 'AND' );
}else{$sql .= COM_getPermSQL();}
        }
    }
    else
    {
        if ($tid!=''){$sql .= COM_getPermSQL( 'AND' );
}else{$sql .= COM_getPermSQL();}
    }
    
 
    if( $_CONF['sortmethod'] == 'alpha' )
    {
        $sql .= ' ORDER BY topic ASC';
    }
    else
    {
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
    while( $C = DB_fetchArray( $rcount ))
    {
        $storycount[$C['tid']] = $C['count'];
    }


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

    $retval = '';


    $sql = "SELECT sid,title,UNIX_TIMESTAMP(date) AS day" ;
    $sql .= " FROM {$_TABLES['stories']} WHERE (draft_flag = 0) AND (date <= NOW())";
    if ($tid != 'all') {
        $sql .= " AND (tid = '$tid')";
    }
    $sql .= COM_getTopicSql ('AND') . COM_getPermSql ('AND') ;
    $sql .=  " ORDER BY date DESC";

    $result = DB_query ($sql);
    $numrows = DB_numRows ($result);

    if ($numrows > 0) {
        $entries = array ();

        for ($i = 0; $i < $numrows; $i++) {
            $A = DB_fetchArray ($result);

            $url = COM_buildUrl ($_CONF['site_url'] . '/article.php?story='
                                 . $A['sid']);
            $entries[] = '<a href="' . $url . '">' . stripslashes ($A['title'])
                       . '</a>';
        }

        if (sizeof ($entries) > 0) {
            $retval .= COM_makeList ($entries);
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


// MAIN

$display = '';

$display .= COM_siteHeader('menu', $LANG_DIR['title']);
if (isset ($_GET['msg'])) {
    $display .= COM_showMessage (COM_applyFilter ($_GET['msg'], true));
}

if ( $lst=="topics") {
    $display .= listtopics("all",$tid);
    $display .= navBar($tid);
}elseif ( $lst=="topicsonly") {
    $display .= listtopics("","");
}else {
    $display .= listtopics("all","");
}

$display .= COM_siteFooter();
echo $display;

?>
