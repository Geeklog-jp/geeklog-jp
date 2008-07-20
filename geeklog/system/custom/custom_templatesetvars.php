<?php
//@@@@@20060725
//@@@@@20071114 Geeklog Japanese Ivy for multiple languages
function CUSTOM_templatesetvars($templatename, &$template) {
	global  $LANG01, $LANG_JPN, $_USER,$_CONF, $topic, $page;

	switch ($templatename) {
		case 'header':
			/* 2006/10/16 Geeklog Japanese ivy added ---------------- */

			$template->set_var( 'topic_id', $topic );
			$template->set_var( 'story_topic_id', $topic );  /* 2007.8.26 Ivy added*/
			$template->set_var( 'sp_id', $page );

			if (isset($_USER['uid']) && $_USER['uid'] > 1) {
				$template->set_var( 'login_status', 'member' );
			} else {
				$template->set_var( 'login_status', 'guest' );
			}

			if( ! COM_isFrontpage() ){
				$template->set_var( 'home_id', 'home' );
			} else {
				$template->set_var( 'home_id', 'sub' );
			}

			/* ---------------- 2006/10/16 Geeklog Japanese Ivy added */
			/* ---------------- 2007/12/22 Geeklog Japanese Ivy changed ログインしていないときは，ようこそゲストユーザさんを削除 */

			// prof_url_jp
			if ($_USER['uid'] >= 2) {
				$prof_url = "{$_CONF['site_url']}/users.php?mode=profile&amp;uid={$_USER['uid']}";
				// welcome_msg_jp
				//    $msg = 'さん'; Geeklog Japanese Ivy 20071114
				$msg = "{$LANG01[67]}";
				$msg .= ' ' . COM_getDisplayName()." {$LANG_JPN[1]}";
				$template->set_var( 'welcome_msg_jp', $msg );
			} else {
				$prof_url = "{$_CONF['site_url']}/";
				$template->set_var( 'welcome_msg_jp', '' );
			}
			$template->set_var( 'prof_url_jp', $prof_url );

			/* ---------------- 2007/05/14 Geeklog Japanese kino changed -> */
			// memberlogin
			$msg ="";
			if (!empty ($_USER['uid']) && ($_USER['uid'] > 1)) {
				$msg = "<a href='{$_CONF['site_url']}/users.php?mode=logout' >{$LANG01[19]}</a> ";
				$template->set_var( 'memberlogin', $msg);
			} else {
				if (file_exists($_CONF['path_layout'] . 'custom-memberlogin.thtml')) {
					$template->set_file(array('member_login' => 'custom-memberlogin.thtml'));
					$template->parse( 'memberlogin', 'member_login' );
				} else {
					$msg = "<a href='{$_CONF['site_url']}/users.php?mode=login'>{$LANG01[58]}</a> ";
					$template->set_var( 'memberlogin', $msg);
				}
			}
			/* ---------------- 2007/05/14 Geeklog Japanese kino changed <- */
	}
}
?>