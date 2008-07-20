<?php
/**
* This is an example of a function that returns menu entries to be used for
* the 'custom' entry in $_CONF['menu_elements'] (see config.php).
*
*/
function CUSTOM_menuEntries ()
{
    global $_CONF, $_USER , $LANG01;

    $myentries = array();

    if (!empty ($_USER['uid']) && ($_USER['uid'] > 1)) {
        //ログアウト
        $myentries[] = array ('url'   => $_CONF['site_url']
                                         . '/users.php?mode=logout',
                              'label' => $LANG01['19']);
    } else {
        //ログイン
        $myentries[] = array ('url'   => $_CONF['site_url']
                                         . '/users.php?mode=login',
                              'label' => $LANG01['47']);
    }


/* komma added */
        $myentries[] = array ('url'   => $_CONF['site_url']. '/directory/topiclist.php','label' => "記事リスト");
        $myentries[] = array ('url'   => $_CONF['site_url']. '/directory/sitemap.php','label' => "サイトマップ");

    return $myentries;
}

?>