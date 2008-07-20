<?php

/***
*
* Directory()
*
* Php function to list menu.
* 
* modified 2006/10/19 ivy AT geeklog DOT jp
* modified 2006/10/20 mystral-kk - geeklog AT mystral-kk DOT net
*
**/

function phpblock_sitemapmenu($tid = '', $lst = '') {

	$retval = '<div class="sitemapmenu">';

	if ($lst == 'topics') {
	    $retval .= phpblock_sitemapmenu_listtopics('all', $tid);
	    $retval .= phpblock_sitemapmenu_navBar($tid);
	} else if ($lst == 'topicsonly') {
	    $retval .= phpblock_sitemapmenu_listtopics('', '');
	} else {
	    $retval .= phpblock_sitemapmenu_listtopics('all', '');
	}
	$retval .= '</div>';

	return $retval;
}

/**
* Displays a list of topics
*
* Lists all the topics and their icons.
*
* @return   string      HTML for the topic list
*
*/

function phpblock_sitemapmenu_listtopics($lst, $tid) {
    global $_CONF, $_TABLES, $_USER;

    $sql = "SELECT tid,topic,imageurl FROM {$_TABLES['topics']}";

    if ($tid != ''){
        $sql .= " WHERE (tid = '{$tid}')";
    }
	
    if(! empty($_USER['uid']) && ($_USER['uid'] > 1)) {
        $tids = DB_getItem($_TABLES['userindex'], 'tids', "uid = '{$_USER['uid']}'" );
        if(! empty($tids)) {
            if ($tid == '') {
                 $sql .= ' WHERE ';
            } else {
				$sql .= ' AND ';
			}
            $sql .= " (tid NOT IN ('" . str_replace(' ', "','", $tids )
                 . "'))" . COM_getPermSQL('AND');
        } else {
            if ($tid != '') {
				$sql .= COM_getPermSQL('AND');
			} else {
				$sql .= COM_getPermSQL();
			}
        }
    } else {
        if ($tid != ''){
			$sql .= COM_getPermSQL('AND');
		} else {
			$sql .= COM_getPermSQL();
		}
    }
    
    if($_CONF['sortmethod'] == 'alpha') {
        $sql .= ' ORDER BY topic ASC';
    } else {
        $sql .= ' ORDER BY sortnum';
    }
    $result = DB_query( $sql );

    $retval = '';
    $sections = new Template($_CONF['path_layout']);

    $sql = "SELECT tid, count(*) AS count FROM {$_TABLES['stories']} "
         . 'WHERE (draft_flag = 0) AND (date <= NOW()) '
         . COM_getPermSQL('AND')
         . ' GROUP BY tid';
    $rcount = DB_query($sql);
    while($C = DB_fetchArray($rcount)) {
        $storycount[$C['tid']] = $C['count'];
    }

    while($A = DB_fetchArray($result)) {
        $topicname = stripslashes($A['topic']);
    	
        $retval .='<h3 class="nav-title">';
        if (empty($storycount[$A['tid']])) {
			$retval .=$topicname;
        } else {
// changed by komma 2007.3.21
//            $url = $_CONF['site_url'] . '/index.php?topic=' . $A['tid'];
//            $retval .= '<a href="' . $url . '">'; 
            $retval .= $topicname;
//          $retval .=  ' (' . COM_numberFormat ($storycount[$A['tid']]) . ')';
//            $retval .=  '</a>';
        }
        $retval .= '</h3>';
        
        if ($lst== 'all') {
            $retval .= phpblock_sitemapmenu_liststory($A['tid']);
        }

    }

    return $retval;
}

function phpblock_sitemapmenu_liststory ($tid) {
    global $_CONF, $_TABLES, $LANG_DIR;

    $retval = '';

    $sql = "SELECT sid, title, UNIX_TIMESTAMP(date) AS day" ;
    $sql .= " FROM {$_TABLES['stories']} WHERE (draft_flag = 0) AND (date <= NOW())";
    if ($tid != 'all') {
        $sql .= " AND (tid = '$tid')";
    }
    $sql .= COM_getTopicSql('AND') . COM_getPermSql('AND') ;
    $sql .=  " ORDER BY date DESC";

    $result = DB_query($sql);
    $numrows = DB_numRows($result);

    if ($numrows > 0) {
        $entries = array ();

        for ($i = 0; $i < $numrows; $i ++) {
            $A = DB_fetchArray ($result);
            $url = COM_buildUrl($_CONF['site_url'] . '/article.php?story=' . $A['sid']);
            $entries[] = '<a class="nav-link" href="' . $url . '">'
					   . stripslashes($A['title']) . '</a>';
        }

        if (sizeof($entries) > 0) {
            $retval .= COM_makeList($entries);
        }

    } else {
/* changed by komma 2007.3.21
        $retval .= '<p>' . $LANG_DIR['no_articles'] . '</p>'; */
    }

    $retval .= LB;
    return $retval;
}

function phpblock_sitemapmenu_navBar($tid) {
    global $_CONF, $_TABLES, $LANG05, $LANG_DIR;

    $retval = '<div class="pagenav">';

    $url = $_CONF['site_url'] . '/index.php';
    $retval .= '<a href="' . $url . '">' . $LANG_DIR['nav_top'] . '</a>';
    $retval .= '</div>' . LB;

    return $retval;
}

?>
