<?php

if (strpos(strtolower($_SERVER['PHP_SELF']), 'custom_useragent.php') !== FALSE) {
    die('This file can not be used on its own!');
}

/**
* custom_useragent.php
*
* @copyright  (C) 2011 mystral-kk
* @author     mystral-kk - geeklog AT mystral-kk DOT net
* @license    GPL v2 or later
* @updated    2011-08-09
*/

//===============================================
// Functions
//===============================================

/**
* Parses a user agent string and returns info
*
* @param    string  $useragent  a user agent expression (optional)
* @return   array(
*               string   'class'    class name to be used in <body> tag
*               string   'os'       OS name
*               string   'browser'  browser name
*               string   'shorty'   short hand for browser name
*               string   'version'  browser version
*               boolean  'mobile'   TRUE = mobile, FALSE = otherwise
*           )
*
*           'class'    - 'os' . ' ' . 'browser' . (' ' . 'shorty' . 'version')
*                        . (' mobile')
*           'os'       - 'mac', 'win-ce', 'win', 'ios', 'android', 'blackberry',
*                        'symbian', 'webos', 'unix', 'unknown'
*           'browser'  - 'ie', 'firefox', 'chrome', 'omniweb', 'safari',
*                        'opera-mini', 'opera-mobile', 'opera', 'ie-mobile',
*                        'camino', 'konqueror', 'other',  'docomo', 'au',
*                        'softbank', 'willcom'
*           'shorty'   - 'ie', 'fx', 'ch', 'ow', 'sf', 'oi', 'om', 'op', 'im',
*                        'ca', 'ko', ''
* @note     This function doesn't require Geeklog.
*/
function CUSTOM_parseUserAgent($useragent = NULL) {
	// The following code is adapted from the agent method of the Environment
	// class used in Contao Open Source CMS.

	/**
	* Contao Open Source CMS
	* Copyright (C) 2005-2011 Leo Feyer
	*
	* Formerly known as TYPOlight Open Source CMS.
	*
	* This program is free software: you can redistribute it and/or
	* modify it under the terms of the GNU Lesser General Public
	* License as published by the Free Software Foundation, either
	* version 3 of the License, or (at your option) any later version.
	* 
	* This program is distributed in the hope that it will be useful,
	* but WITHOUT ANY WARRANTY; without even the implied warranty of
	* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
	* Lesser General Public License for more details.
	* 
	* You should have received a copy of the GNU Lesser General Public
	* License along with this program. If not, please visit the Free
	* Software Foundation website at &lt;http://www.gnu.org/licenses/&gt;.
	*
	* PHP version 5
	* @copyright  Leo Feyer 2005-2011
	* @author     Leo Feyer <http://www.contao.org>
	* @package    System
	* @license    LGPL
	* @filesource
	*/
	$os      = 'unknown';
	$browser = 'other';
	$shorty  = '';
	$version = '';
	$mobile  = FALSE;

	if ($useragent === NULL) {
		$useragent = $_SERVER['HTTP_USER_AGENT'];
	}

	$useragent = strip_tags($useragent);
	$ua = preg_replace('/javascript|vbscri?pt|script|applet|alert|document|write|cookie/i', '', $useragent);

	// Operating system (checks Windows CE before Windows and Android before Linux!)
	if (stripos($ua, 'Macintosh') !== FALSE) {
		$os = 'mac';
	} else if ((stripos($ua, 'Windows CE') !== FALSE)
			OR (stripos($ua, 'Windows Phone') !== FALSE)) {
		$os     = 'win-ce';
		$mobile = TRUE;
	} else if (stripos($ua, 'Windows') !== FALSE) {
		$os = 'win';
	} else if ((stripos($ua, 'iPad') !== FALSE)
			OR (stripos($ua, 'iPhone') !== FALSE)
			OR (stripos($ua, 'iPod') !== FALSE)) {
		$os     = 'ios';
		$mobile = TRUE;
	} else if (stripos($ua, 'Android') !== FALSE) {
		$os     = 'android';
		$mobile = (stripos($ua, 'mobile') !== FALSE);
	} else if (stripos($ua, 'Blackberry') !== FALSE) {
		$os     = 'blackberry';
		$mobile = TRUE;
	} else if (stripos($ua, 'Symbian') !== FALSE) {
		$os     = 'symbian';
		$mobile = TRUE;
	} else if (stripos($ua, 'WebOS') !== FALSE) {
		$os     = 'webos';
		$mobile = TRUE;
	} else if ((stripos($ua, 'Linux') !== FALSE)
			OR (stripos($ua, 'FreeBSD') !== FALSE)
			OR (stripos($ua, 'OpenBSD') !== FALSE)
			OR (stripos($ua, 'NetBSD') !== FALSE)) {
		$os = 'unix';
	}

	// Browser and version (check OmniWeb before Safari and Opera Mini/Mobi before Opera!)
	if (stripos($ua, 'MSIE') !== FALSE) {
		$browser = 'ie';
		$shorty  = 'ie';
		$version = preg_replace('/^.*?MSIE (\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'Firefox') !== FALSE) {
		$browser = 'firefox';
		$shorty  = 'fx';
		$version = preg_replace('/^.*Firefox\/(\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'Chrome') !== FALSE) {
		$browser = 'chrome';
		$shorty  = 'ch';
		$version = preg_replace('/^.*Chrome\/(\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'OmniWeb') !== FALSE) {
		$browser = 'omniweb';
		$shorty  = 'ow';
		$version = preg_replace('/^.*Version\/(\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'Safari') !== FALSE) {
		$browser = 'safari';
		$shorty  = 'sf';
		$version = preg_replace('/^.*Version\/(\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'Opera Mini') !== FALSE) {
		$browser = 'opera-mini';
		$shorty  = 'oi';
		$version = preg_replace('/^.*Opera Mini\/(\d+).*$/', '$1', $ua);
		$mobile  = TRUE;
	} else if (stripos($ua, 'Opera Mobi') !== FALSE) {
		$browser = 'opera-mobile';
		$shorty  = 'om';
		$version = preg_replace('/^.*Version\/(\d+).*$/', '$1', $ua);
		$mobile  = TRUE;
	} else if (stripos($ua, 'Opera') !== FALSE) {
		$browser = 'opera';
		$shorty  = 'op';
		$version = preg_replace('/^.*Version\/(\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'IEMobile') !== FALSE) {
		$browser = 'ie-mobile';
		$shorty  = 'im';
		$version = preg_replace('/^.*IEMobile (\d+).*$/', '$1', $ua);
		$mobile  = TRUE;
	} else if (stripos($ua, 'Camino') !== FALSE) {
		$browser = 'camino';
		$shorty  = 'ca';
		$version = preg_replace('/^.*Camino\/(\d+).*$/', '$1', $ua);
	} else if (stripos($ua, 'Konqueror') !== FALSE) {
		$browser = 'konqueror';
		$shorty  = 'ko';
		$version = preg_replace('/^.*Konqueror\/(\d+).*$/', '$1', $ua);
	}

	/**
	* Checks for mobile phones used in Japan
	*
	* The following code is adapted from Tatsumi Imai's work
	*
	* Geeklog hack for cellular phones.
	* Copyright (c) 2006 - 2008 Tatsumi Imai(http://im-ltd.ath.cx)
	* License: GPL v2 or later
	* Time-stamp: <2009-03-09 03:13:44 imai>
	*/
	if (($os === 'unknown') AND ($browser === 'other')) {
		if (stripos($ua, 'DoCoMo') === 0) {
			$browser = 'docomo';
			$version = (stripos($ua, 'DoCoMo/2.0') === 0) ? '3g' : '';
			$mobile  = TRUE;
		} else if ((stripos($ua, 'UP.Browser') !== FALSE)
				OR (stripos($ua, 'KDDI-') !== FALSE)) {
			$browser = 'au';
			$version = (stripos($ua, 'KDDI-') === 0) ? '3g' : '';
			$mobile  = TRUE;
		} else if ((stripos($ua, 'Softbank') === 0)
				OR (stripos($ua, 'J-PHONE') === 0)
				OR (stripos($ua, 'Vodafone') === 0)
				OR (stripos($ua, 'MOT-C') === 0)
				OR (stripos($ua, 'MOT-V') === 0)
				OR (stripos($ua, 'Semulator') === 0)) {
			$browser = 'softbank';
			$version = (stripos($ua, 'J-PHONE') === FALSE) ? '3g' : '';
			$mobile  = TRUE;
		} else if ((stripos($ua, 'WILLCOM') !== FALSE)
				OR (stripos($ua, 'DDIPOCKET') !== FALSE)) {
			$browser = 'willcom';
			$mobile  = TRUE;
		} else if ((stripos($ua, 'jigbrowserweb') !== FALSE)
				OR (stripos($ua, 'NetFront') !== FALSE)
				OR (stripos($ua, 'Y!J-SRD/1.0') !== FALSE)
				OR (stripos($ua, 'Y!J-MBS/1.0') !== FALSE)) {
			$mobile  = TRUE;
		} else if (preg_match('/PDA;.*NetFront/i', $ua)) {
			$mobile  = TRUE;
			$version = '3g';
		}
	}

	$class = $os . ' ' . $browser;

	// Adds the version number if available
	if ($version !== '') {
		$class .= ' ' . $shorty . $version;
	}

	// Marks mobile devices
	if ($mobile) {
		$class .= ' mobile';
	}

	$retval = array(
		'class'   => $class,
		'os'      => $os,
		'browser' => $browser,
		'shorty'  => $shorty,
		'version' => $version,
		'mobile'  => $mobile,
	);

	return $retval;
}

/**
* Exports info about a user agent as template variables that can be referenced
* in template files in Geeklog
*
* @param   object  $template  reference to a Template(-like) object
* @return  (void)
*/
function CUSTOM_setUserAgentTemplateVars($template) {
	if (is_object($template) AND method_exists($template, 'set_var')) {
		$prefix = 'custom_';
		$data   = CUSTOM_parseUserAgent();

		$template->set_var($prefix . 'class', $data['class']);
		$template->set_var($prefix . 'os', $data['os']);
		$template->set_var($prefix . 'browser', $data['browser']);
		$template->set_var($prefix . 'shorty', $data['shorty']);
		$template->set_var($prefix . 'version', $data['version']);
		$template->set_var($prefix . 'mobile', $data['mobile'] ? 'mobile' : '');
	} else {
		$msg = __FUNCTION__
			 . ': Error!  $template must be a reference to a Template(-like) object.';

		if (is_callable('COM_errorLog')) {
			COM_errorLog($msg);
		}

		die($msg);
	}
}
