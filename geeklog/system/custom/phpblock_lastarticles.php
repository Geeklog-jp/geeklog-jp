<?php

/***
*
* phpblock_lastarticles()
*
* Php function to list menu.
* 
* by Nakanishi

phpblock_lastarticles(行数,先頭文字数)
次の２行を静的ページPHPで記述
$exclude=array('');  // 見せたくない記事カテゴリIDをリスト
echo phpblock_lastarticles(10,60,$exclude);

*
**/
//@@@@@20080709update ブロックで使用したときの問題対応 ---->
//function phpblock_lastarticles($numrows=10, $Length=50, $exclude )
function phpblock_lastarticles($numrows=10, $Length=50, $exclude = array())
//@@@@@20080709update<----
{
    global $_CONF, $_TABLES, $LANG04;
    //$Length=50;
    //$numrows=10;
    //Get appropriate stories from DB
    
    $exc = '';
    if (count($exclude)>0) {
       foreach ($exclude as $topic) {
         $exc .= " AND s.tid!='" . $topic ."'";
       }
    }
    $sql = "SELECT STRAIGHT_JOIN s.sid, s.tid,s.title, s.date, s.group_id,s.owner_id,s.perm_owner,s.perm_group,s.perm_members,s.perm_anon,t.topic,s.introtext from {$_TABLES['stories']} as s, {$_TABLES['topics']} as t WHERE s.title<>'' AND (s.tid = t.tid) AND (s.draft_flag = 0)". $exc . " ORDER BY s.date DESC LIMIT " . $numrows;
    //    echo $sql;
    $result = DB_query($sql);
    $nrows = DB_numRows($result);    

    //Display title of stories.
    $i=0;
    $retval='';
    do{
        $A = DB_fetchArray($result);
        //$descr = filter_ALL_HTML($A['introtext']);
        //$descr = mb_strimwidth ($descr, 0, 256, "...");
        $datestr = '['.substr($A['date'],0,10) . ']';
        $TACCESS=SEC_hasTopicAccess($A['tid']);
        $ACCESS=SEC_hasAccess($A['owner_id'], $A['group_id'] ,$A['perm_owner'] ,$A['perm_group'] ,$A['perm_members'] ,$A['perm_anon']);
        //@@@@@@@@@@ 記事のアクセス値($permv)を取得、アクセス値が＞３（自分以外に許可されている）の場合は表示する 
        $perm=array($A['perm_owner'],$A['perm_group'],$A['perm_members'],$A['perm_anon']);
        $permv=SEC_getPermissionValue($perm);
                if ( $permv > 3 )
                {
                    $retval .= $datestr .' '. $A['topic'] .'::';
            $title =  mb_strimwidth ($A['title'], 0, $Length);
            if ($ACCESS>0 AND $TACCESS>0)
            {
            // $title=COM_truncate($A['title'],$Length,'...');
/*              $retval .= '<a class="new-story" href="' . $_CONF['site_url'] . '/article.php?story=' . $A['sid']. '">' . $title . '<span>' . $descr . '</span></a><br>' ; changed by komma and kino */
            $retval .= '<a class="new-story" href="' . COM_buildUrl($_CONF['site_url'] . '/article.php?story=' . $A['sid']) . '">' . $title . '<span>' . $descr . '</span></a><br>' ;
            } else {
            // $title=COM_truncate($A['title'],$Length,'...');
            $retval .= '<span class="new-story">' . $title . "</span><br>";
            }
            $i++;
                }
    }while ($nrows>$i);

//    $retval .= '<small>リンクのない記事にはログイン、または権限が必要です</small>';
    return $retval;
}



/***
*
* phpblock_lastarticles2()
*
* Php function to list menu.
* 
* by T.Kinoshita

phpblock_lastarticles2(行数,先頭文字数)
次の２行を静的ページPHPで記述
$include=array('');  // 見せたい記事カテゴリIDをリスト
echo phpblock_lastarticles2(10,60,$include);

*
**/

//@@@@@20080709update ブロックで使用したときの問題対応 ---->
//function phpblock_lastarticles2($numrows=10, $Length=50, $include)
function phpblock_lastarticles2($numrows=10, $Length=50, $include= array())
//@@@@@20080709update <-----
{
    global $_CONF, $_TABLES, $LANG04;
    //$Length=50;
    //$numrows=10;
    //Get appropriate stories from DB
    
    $inc = '';
    if (count($include)>0) {
       foreach ($include as $topic) {
         if(strlen($inc)==0) {
            $inc .= " ( s.tid='" . $topic ."')";
         } else {
            $inc .= " OR ( s.tid='" . $topic ."')";
         }
       }
       $inc = ' AND (' . $inc . ' ) ';
    }
    $sql = "SELECT STRAIGHT_JOIN s.sid, s.tid,s.title, s.date, s.group_id,s.owner_id,s.perm_owner,s.perm_group,s.perm_members,s.perm_anon,t.topic,s.introtext from {$_TABLES['stories']} as s, {$_TABLES['topics']} as t WHERE s.title<>'' AND (s.tid = t.tid) AND (s.draft_flag = 0)". $inc . " ORDER BY s.date DESC LIMIT " . $numrows;
    //    echo $sql;
    $result = DB_query($sql);
    $nrows = DB_numRows($result);    

    //Display title of stories.
    $i=0;
    $retval='';
    do{
        $A = DB_fetchArray($result);
        //$descr = filter_ALL_HTML($A['introtext']);
        //$descr = mb_strimwidth ($descr, 0, 256, "...");
        $datestr = '['.substr($A['date'],0,10) . ']';
        $TACCESS=SEC_hasTopicAccess($A['tid']);
        $ACCESS=SEC_hasAccess($A['owner_id'], $A['group_id'] ,$A['perm_owner'] ,$A['perm_group'] ,$A['perm_members'] ,$A['perm_anon']);
        $retval .= $datestr .' '. $A['topic'] .'::';
        $title =  mb_strimwidth ($A['title'], 0, $Length);
        if ($ACCESS>0 AND $TACCESS>0)
        {
            // $title=COM_truncate($A['title'],$Length,'...');
/*              $retval .= '<a class="new-story" href="' . $_CONF['site_url'] . '/article.php?story=' . $A['sid']. '">' . $title . '<span>' . $descr . '</span></a><br>' ; changed by komma and kino */
            $retval .= '<a class="new-story" href="' . COM_buildUrl($_CONF['site_url'] . '/article.php?story=' . $A['sid']) . '">' . $title . '<span>' . $descr . '</span></a><br>' ;
        } else {
            // $title=COM_truncate($A['title'],$Length,'...');
            $retval .= '<span class="new-story">' . $title . "</span><br>";
        }
        $i++;
    }while ($nrows>$i);

//    $retval .= '<small>リンクのない記事にはログイン、または権限が必要です</small>';
    return $retval;
}



?>