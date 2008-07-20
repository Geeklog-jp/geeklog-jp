<?php

/**
* Theme Tester Function for Geeklog
*
* @authors SaY (Yushuke SAKATA)
*          mystral-kk (Kenji ITO) - geeklog AT mystral-kk DOT net
*
* @caution 1. このスクリプトはUTF-8で書かれています。EUC-JPで使う場合は，EUC-JP
*            で保存し直してください。
*          2. テーマテスター全体は，<div id="themetester">と</div>で囲まれていま
*            す。
*/

//=====================================
//  Changes
//=====================================

/**
* 2008-02-28
*
*   1. [New] Added an option to ignore chameleon plugin, because the current
*     chamelon doesn't go with theme tester
*   2. [New] Modified to hide themes for mobile user agents
*   3. [New] Modified to hide theme tester in case of mobile user agents
*
* 2007-10-15
*
*   1. [Fix] Fixed the possible XSS vulnerabilities reported by Phize.
*   2. [Fix] Fixed to respect $_CONF['allow_user_themes'] and $_CONF['cookie_theme'].
*   3. [New] Like dengen's version, we changed to show the name of the current theme.
*   4. [New] Like dengen's version, we changed to save the registered users' choice
*            to DB immediately.
*   5. [New] Made XHTML availabe optionally.
*
* 2006-04-07
*
*   1. Modified to work properly in case the "register_long_arrays" directive is off
*   2. Modified to work properly in case JavaScript is disabled (added <input 
*     type="submit" ...>)
*   3. Removed the </center> tag near the bottom, which has no corresponding <center>
*     tag and replaced with <div style="align: center;">.
*   4. When anonymous users change their themes, we try to store them in cookies
*     (this feature is not available for logged-in users).
*/

//=====================================
//  Configurations
//=====================================

/**
* whether to ignore chameleon plugin
*/

// カメレオンテーマを選択可能にするには，true を false に変えてください
define('THEMETESTER_IGNORE_CHAMELEON', true);

//=====================================
//  Functions
//=====================================

/**
* Returns a string in HTML to be safely displayed
*/
function THEMETESTER_escape($str) {
	global $_CONF, $LANG_CHARSET;
	
	if (isset($LANG_CHARSET)) {
		$encoding = $LANG_CHARSET;
	} else if (isset($_CONF['default_charset'])) {
		$encoding = $_CONF['default_charset'];
	} else {
		$encoding = 'UTF-8';
	}
	
	return htmlspecialchars($str, ENT_QUOTES, $encoding);
}

/**
* Cleans a URL
*
* @note This function removes the strings 'JavaScript:', '<script>', 
*       '</script>', or 'document.write' in a given URL.  This might be a bit
*       too strict.
*/
function THEMETESTER_cleanUrl($url) {
	
	/**
	* Decodes HTML entities
	*/
	
	// %dd --> chr(0xdd)
	$url = preg_replace('/%([\dA-F]{2})/ie', "chr(hexdec('\\1'))", $url);
	
	// \xdd --> chr(0xdd)
	$url = preg_replace('/\\\\x([\dA-F]{2})/ie', "chr(hexdec('\\1'))", $url);
	
	// \udddd --> chr(0xdddd)
	$url = preg_replace('/\\\\u([\dA-F]{4})/ie', "chr(hexdec('\\1'))", $url);
	
	// &[lL][tT](;) --> &
	$search  = array('/&lt;?/i', '/&gt;?/i', '/&quot;?/i', '/&raquo;?/i');
	$replace = array('<', '>', '"', "'");
	$url = preg_replace($search, $replace, $url);
	
	// &#\d{1,7}(;) --> d
	$url = preg_replace('/&#(\d{1,7});?/e', "chr('\\1')", $url);
	
	// &#x[0-9a-fA-F]{1,7}(;) --> d
	$url = preg_replace('/&#x([\dA-F]{1,7});?/ie', "chr(hexdec('\\1'))", $url);
	
	/**
	* Starts cleaning
	*/
	
	// Removes control codes
	$url = preg_replace('/[\x00-\x20\x7F\xAD]/', '', $url);
	
	// '+' --> ' '
	$url = str_replace('+', ' ', $url);

	// Removes 'JavaScript:'
	$url = preg_replace('/J\s*A\s*V\s*A\s*S\s*C\s*R\s*I\s*P\s*T\s*/i', '', $url);
	
	// Maybe, the three functions are not necessary to sanitize URLs
	// Removes '<script>'
	$url = preg_replace('/<SCRIPT[^>]*>/i', '', $url);
	
	// Removes '</script>'
	$url = preg_replace('/<\/SCRIPT>/i', '', $url);

	// Removes 'document.write'
	$url = preg_replace('/DOCUMENT\.WRITE/i', '', $url);
	
	return $url;
}

/**
* Checks if the user agent is mobile
*
* @note  the code below is borrowed from custom_cellular.php written by Imai
*/
function THEMETESTER_isMobile() {
	$ua = $_SERVER['HTTP_USER_AGENT'];
	
	/**
	* ケータイの判定基準を変えるには以下のif文を修正する
	*/
	if (preg_match("/^(DoCoMo\/1|DoCoMo\/2)\.0/i", $ua)) {
		// DoCoMo
		return true;
	} else if (preg_match("/^(Softbank|J\-PHONE|Vodafone|MOT\-[CV]|Vemulator)/i", $ua)) {
		// SoftBank
		return true;
	} else if (preg_match("/(UP\.Browser|KDDI\-)/i", $ua)) {
		// AU
		return true;
	} else if (preg_match("/(DDIPOCKET|WILLCOM)/i", $ua)) {
		// Wilcom
		return true;
	} else if (preg_match("/Windows *CE/i", $ua)
		 OR preg_match("/jigbrowserweb/i", $ua)
		 OR preg_match("/NetFront/i", $ua)
		 OR preg_match("/(Y!J-SRD\/1.0|Y!J-MBS\/1.0)/i", $ua)) {
		// その他ケータイと判定するもの
		return true;
	} else {
		return false;
	}
}

/**
* Provides a PHP function to be used in blocks
*/
function phpblock_themetester() {
	global $_CONF, $_PLUGINS, $_TABLES, $_USER;
	
	$retval = '';

	if (!defined('XHTML')) {
		define('XHTML', '');
	}
	if (!defined('LB')) {
		define('LB', "\n");
	}
	
 	// テーマ変更が禁止されている or 携帯からのアクセス
	if ($_CONF['allow_user_themes'] == 0 OR THEMETESTER_isMobile() === true) {
		return $retval;
	}
	
	$installed_themes = COM_getThemes();
	
	// カメレオンテーマをチェック
	$has_chameleon = array_search('chameleon', $installed_themes);
	if ($has_chameleon !== false AND !is_null($has_chameleon)) {
		if (!in_array('chameleon', $_PLUGINS)
		 OR THEMETESTER_IGNORE_CHAMELEON === true) {
			unset($installed_themes[$has_chameleon]);
		}
	}
	
	// モバイル用のテーマを除く
	$temp = $installed_themes;
	$installed_themes = array();
	
	foreach ($temp as $t) {
		if (!preg_match("/mobile/i", $t)) {
			$installed_themes[] = $t;
		}
	}
	
	if (count($installed_themes) <= 1) {
		// 選択の余地なし
		return $retval;
	}
	
	if (isset($_POST['themetester_theme'])) {
		$theme = COM_applyFilter($_POST['themetester_theme']);
	} else {
		$theme = '';
	}
	
	// 現在のテーマを取得
	if (isset($_COOKIE[$_CONF['cookie_theme']])) {
		$current_theme = COM_applyFilter($_COOKIE[$_CONF['cookie_theme']]);
	} else {
		$current_theme = '';
	}
	
	// 現在のURLを取得して，XSS対策を施す
	$url = COM_getCurrentURL();
	$url = THEMETESTER_cleanUrl($url);
	if (empty($url)) {
		$url = $_CONF['site_url'];
	}
	$url = THEMETESTER_escape($url);
	
	// テーマが変更された
	if (!empty($theme) AND $theme != $current_theme
	 AND in_array($theme, $installed_themes)) {
		// 登録ユーザの場合はテーマの変更をデータベースに保存
		if (isset($_USER['uid']) AND $_USER['uid'] > 1) {
			$sql = "UPDATE {$_TABLES['users']} "
				 . "SET theme='" . addslashes($theme) . "' "
				 . "WHERE (uid = '" . addslashes($_USER['uid']) . "')";
			DB_query($sql);
		}
		
		// テーマをクッキーに保存
		@setcookie (
			$_CONF['cookie_theme'],
			THEMETESTER_escape($theme),
			time() + 3600 * 24 * 365,	// 1年間
			$_CONF['cookie_path'],
			$_CONF['cookiedomain'],
			$_CONF['cookiesecure']
		);
		
		// 現在のページにリダイレクト
		echo COM_refresh($url);
		exit;	// これは本来は不要
	}
	
	// テーマを変更するためのフォームを表示
	$retval .= '<div id="themetester">' . LB
			.  '  <form action="' . $url . '" method="post">' . LB
			.  '    <select name="themetester_theme" onchange="this.form.submit()">' . LB;

	foreach ($installed_themes as $theme) {
		$retval .= '      <option value="' . THEMETESTER_escape($theme) . '"';
		if ($theme == $current_theme) {
			$retval .= ' selected="selected"';
		}
		
		$retval .= '>' . THEMETESTER_escape($theme) . '</option>' . LB;
	}

	$retval .= '    </select>' . LB
			.  '    <noscript>' . LB
			.  '      <input name="submit" type="submit" value="選択"' . XHTML . '>' . LB
			.  '    </noscript>' . LB
			.  '  </form>' . LB
			.  '</div>' . LB;
	
	return $retval;
}

?>
