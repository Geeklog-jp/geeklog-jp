<?php

// +---------------------------------------------------------------------------+
// | Precheck for Geeklog 1.7                                                  |
// +---------------------------------------------------------------------------+
// | public_html/admin/install/precheck.php                                    |
// |                                                                           |
// | Part of Geeklog pre-installation check scripts                            |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006-2011 by the following authors:                         |
// |                                                                           |
// | Authors: mystral-kk - geeklog AT mystral-kk DOT net                       |
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

/**
* This script tests the file and directory permissions, thus addressing the
* most common errors / omissions when setting up a new Geeklog site ...
*
* @author   mystral-kk <geeklog AT mystral-kk DOT net>
* @date     2011-01-05
* @version  1.4.0
* @license  GPLv2 or later
*/
error_reporting(E_ALL);

require_once './precheck.lang.php';

define('GL_VERSION', '1.7.1');

//===================================================================
// DO NOT CHANGE ANYTHING BELOW THIS LINE!
//===================================================================

define('PRECHECK_VERSION', '1.4.0');
define('LB', "\n");
define('DS', DIRECTORY_SEPARATOR);
define('THIS_SCRIPT', basename(__FILE__));
define('OS_WIN', strcasecmp(substr(PHP_OS, 0, 3), 'WIN') === 0);
define('LANG', 'ja');

$gl_version = preg_replace('/[^0-9\.]/', '', GL_VERSION);

if (version_compare($gl_version, '1.5.0') < 0) {
	die('e_precheck_not_supported');
} else if (version_compare($gl_version, '1.6.0') < 0) {
	define('MIN_PHP_VERSION', '4.1.0');
} else if (version_compare($gl_version, '1.7.0') < 0) {
	define('MIN_PHP_VERSION', '4.3.0');
} else if (version_compare($gl_version, '1.8.0') < 0) {
	define('MIN_PHP_VERSION', '4.4.0');
} else {
	define('MIN_PHP_VERSION', '5.2.0');
}

if (version_compare($gl_version, '1.7.0') < 0) {
	define('MIN_MYSQL_VERSION', '3.23.2');
} else {
	define('MIN_MYSQL_VERSION', '4.0.18');
}

$_CONF = array();

/**
* For older PHP version
*/
if (!is_callable('file_get_contents')) {
	function file_get_contents($path) {
		$retval = '';
		
		if (($fp = fopen($fp, 'rb')) !== FALSE) {
			while (!feof($fp)) {
				$retval .= fread($fp, 8192);
			}
			
			fclose($fp);
		} else {
			$retval = FALSE;
		}
		
		return $retval;
	}
}

if (!is_callable('file_put_contents')) {
	function file_put_contents($filename, $data) {
		$retval = FALSE;
		
		if (($fh = @fopen($filename, 'r+b')) !== FALSE) {
			if (flock($fh, LOCK_EX)) {
				if (ftruncate($fh, 0)) {
					if (rewind($fh)) {
						$retval = fwrite($fh, $data);
					}
				}
			}
			
			@fclose($fh);
		}
		
		return $retval;
	}
}

function PRECHECK_str($name) {
	global $LANG_PRECHECK;
	
	return $LANG_PRECHECK[LANG][$name];
}

class Precheck
{
	var $path_html;
	var $path;
	var $mode;
	var $step;
	var $fatal_error;
	var $warning;
	var $error;
	var $_vars;
	
	/**
	* Constructor
	*
	* @access  public
	*/
	function Precheck()
	{
		$this->fatal_error = 0;
		$this->error       = 0;
		$this->warning     = 0;
		
		$this->_vars     = array();
		$this->path_html = realpath(dirname(__FILE__) . DS . '..' . DS . '..' . DS);
	}
	
	/**
	* Escapes a string so we can print it as HTML
	*
	* @access  public
	* @param   str  string
	* @return       string
	*/
	function esc($str)
	{
		return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
	}
	
	/**
	* Sets a template var
	*/
	function setVar($name, $value)
	{
		$this->_vars[$name] = $value;
	}
	
	/**
	* Parses the template file
	*/
	function parse()
	{
		$template = file_get_contents('./precheck.thtml');
		
		foreach ($this->_vars as $key => $value) {
			$template = str_replace('{' . $key . '}', $value, $template);
		}
		
		// Removes empty tags
		$template = preg_replace('/\{[^\}]*\}/ms', '', $template);
		
		return $template;
	}
	
	/**
	* Returns error info and warning info neatly
	*
	* @access  public
	* @param   msg  string
	* @return       string
	*/
	function displayErrorAndWarning($msg)
	{
		$retval = '<span class="';
		
		if (($this->error == 0) AND ($this->warning == 0)) {
			$retval .= 'good">' . PRECHECK_str('ok') . '</span>';
		} else {
			$retval .= ($this->error > 0) ? 'bad' : 'none'
					.  '">' . $this->error . PRECHECK_str('num_error')
					.  '</span>' . PRECHECK_str('and') . '<span class="'
					.  (($this->warning > 0) ? 'warning' : 'none') . '">'
					.  $this->warning . PRECHECK_str('num_warning') . '</span>';
		}
		
		if ($msg != '') {
			$retval .= '<br />';
		if (($this->error == 0) AND ($this->warning == 0)) {
				$retval .= '<p class="good">' . $msg . '</p>';
			} else {
				$retval .= $msg;
			}
		}
		
		return $retval;
	}
	
	/**
	* Guesses the path to db-config.php
	*
	* @access  public
	* @return          mixed - string = path, FALSE = didn't find path
	*/
	function guessDbConfigPath()
	{
		global $_CONF;
		
		// Checks if siteconfig.php exists and it is valid
		clearstatcache();
		$siteconfig = @realpath(dirname(__FILE__) . '/../../siteconfig.php');
		
		if (file_exists($siteconfig)) {
			require_once $siteconfig;
			
			if (isset($_CONF['path'])
			 AND ($_CONF['path'] != '/path/to/Geeklog/')
			 AND file_exists($_CONF['path'] . 'db-config.php')) {
				return $_CONF['path'];
			}
		}
		
		// Check the parent directory of path_html
		$path = @realpath(dirname(__FILE__) . '/../../../');
		clearstatcache();
		
		return file_exists($path . 'db-config.php') ? $path : FALSE;
	}
	
	function _return_bytes($val)
	{
		$val = trim($val);
		$last = strtolower($val[strlen($val) - 1]);
		
		switch($last) {
			// 'G' is availabe since PHP 5.1.0
			case 'g':
				$val *= 1024;
				
			case 'm':
				$val *= 1024;
				
			case 'k':
				$val *= 1024;
		}
		
		return $val;
	}
	
	/**
	* Check the default setting of PHP
	*
	* @access  public
	* @return       string
	*/
	function menuCheckPHPSettings()
	{
		$this->error   = 0;
		$this->warning = 0;
		
		$has_php6 = (version_compare(PHP_VERSION, '6') >= 0);
		$msgs = array();
		
		$s_warning = '<span class="warning">' . PRECHECK_str('warning')
				   . '</span>&nbsp;';
		$s_error   = '<span class="bad">' . PRECHECK_str('error')
				   . '</span>&nbsp;';
		
		// magic_quotes_gpc
		if (!$has_php6 AND @get_magic_quotes_gpc()) {
			$msgs[] = $s_warning . PRECHECK_str('w_magic_quotes_gpc');
			$this->warning ++;
		}
		
		// magic_quotes_runtime
		if (!$has_php6 AND @get_magic_quotes_runtime()) {
			$msgs[] = $s_warning . PRECHECK_str('w_get_magic_quotes_runtime');
			$this->warning ++;
		}
		
		if (!is_callable('ini_get')) {
			$msgs[] = $s_error . PRECHECK_str('e_ini_get_disabled');
			$this->error ++;
		} else {
			// display_errors
			if (ini_get('display_errors')) {
				$msgs[] = $s_warning . PRECHECK_str('w_display_errors');
				$this->warning ++;
			}
			
			// magic_quotes_sybase
			if (!$has_php6 AND @ini_get('magic_quotes_sybase')) {
				$msgs[] = $s_warning . PRECHECK_str('w_magic_quotes_sybase');
				$this->warning ++;
			}
			
			// mbstring.language
			$mbstring_language = ini_get('mbstring.language');
			if (strcasecmp($mbstring_language, 'japanese') != 0) {
				if (strcasecmp($mbstring_language, 'neutral') == 0) {
					$msgs[] = $s_warning . PRECHECK_str('w_mbstring_language_neutral');
					$this->warning ++;
				} else {
					$msgs[] = $s_error . PRECHECK_str('e_mbstring_language_others');
					$this->error ++;
				}
			}
			
			// mbstring.http_output
			$mbstring_http_output = ini_get('mbstring.http_output');
			if ((strcasecmp($mbstring_http_output, 'pass') != 0)
			 AND (strcasecmp($mbstring_http_output, 'utf-8') != 0)) {
				$msgs[] = $s_error . PRECHECK_str('e_mbstring_http_output');
				$this->error ++;
			}
			
			$mbstring_encoding_translation = @ini_get('mbstring.encoding_translation');
			if ($mbstring_encoding_translation) {
				$msgs[] = $s_error . PRECHECK_str('e_mbstring_encoding_translation');
				$this->error ++;
			}
			
			// mbstring.internal_encoding
			$mbstring_internal_encoding = ini_get('mbstring.internal_encoding');
			if (($mbstring_internal_encoding != '')
			 AND (strcasecmp($mbstring_internal_encoding, 'utf-8') != 0)) {
				$msgs[] = $s_warning . PRECHECK_str('w_mbstring.internal_encoding');
				$this->warning ++;
			}
			
			// default_charset
			$default_charset = @ini_get('default_charset');
			if (($default_charset != '')
			 AND (strcasecmp($default_charset, 'utf-8') != 0)) {
				$msgs[] = $s_error . PRECHECK_str('e_default_charset');
				$this->error ++;
			}
			
			// register_globals
			if (!$has_php6 AND @ini_get('register_globals')) {
				$msgs[] = $s_warning . PRECHECK_str('w_register_globals');
				$this->warning ++;
			}
			
			// memory_limit
			$mem = $this->_return_bytes(@ini_get('memory_limit'));
			
			if ($mem < 1024 * 1024 * 64) {	// 64M bytes
				$msgs[] = $s_warning . PRECHECK_str('w_memory_limit');
				$this->warning ++;
			}
		}
		
		$retval = '';
		
		if (count($msgs) > 0) {
			$retval .= '<ul>' . LB;
			
			foreach ($msgs as $msg) {
				$retval .= '<li>' . $msg . '</li>' . LB;
			}
			
			$retval .= '</ul>' . LB;
		}
		
		return $retval;
	}
	
	/**
	* Check write permissions of paths
	*
	* @access  public
	* @return       string
	*/
	function menuCheckWritable()
	{
		$this->error   = 0;
		$this->warning = 0;
		
		$msgs = array();
		$path = $this->path;
		$path_html = $this->path_html;
		
		$s_error   = '<span class="bad">' . PRECHECK_str('error')
				   . '</span>&nbsp;';
		
		// path_html/siteconfig.php
		clearstatcache();
		if (!is_writable($path_html . DS . 'siteconfig.php')) {
			$msgs[] = $s_error . PRECHECK_str('e_siteconfig_php');
			$this->error ++;
		}
		
		// path/db-config.php
		clearstatcache();
		if (!is_writable($path . 'db-config.php')) {
			$msgs[] = $s_error . PRECHECK_str('e_db_config_php');
			$this->error ++;
		}
		
		// path/data
		clearstatcache();
		if (!is_writable($path . 'data' . DS)) {
			$msgs[] = $s_error . PRECHECK_str('e_data');
			$this->error ++;
		}
		
		// path/backups
		clearstatcache();
		if (!is_writable($path . 'backups' . DS)) {
			$msgs[] = $s_error . PRECHECK_str('e_backups');
			$this->error ++;
		}
		
		// path/logs/error.log
		clearstatcache();
		if (!is_writable($path . 'logs' . DS . 'error.log')) {
			$msgs[] = $s_error . PRECHECK_str('e_error_log');
			$this->error ++;
		}
		
		// path/logs/access.log
		clearstatcache();
		if (!is_writable($path . 'logs' . DS . 'access.log')) {
			$msgs[] = $s_error . PRECHECK_str('e_access_log');
			$this->error ++;
		}
		
		// path/logs/spamx.log
		clearstatcache();
		if (!is_writable($path . 'logs' . DS . 'spamx.log')) {
			$msgs[] = $s_error . PRECHECK_str('e_spamx_log');
			$this->error ++;
		}
		
		// path_html/backend/geeklog.rss
		clearstatcache();
		if (!is_writable($path_html . DS . 'backend' . DS . 'geeklog.rss')) {
			$msgs[] = $s_error . PRECHECK_str('e_backend_geeklog_rss');
			$this->error ++;
		}
		
		// path_html/backend
		clearstatcache();
		if (!is_writable($path_html . DS . 'backend' . DS)) {
			$msgs[] = $s_error . PRECHECK_str('e_backend');
			$this->error ++;
		}
		
		$retval = '';
		
		if (count($msgs) > 0) {
			$retval .= '<ul>' . LB;
			
			foreach ($msgs as $msg) {
				$retval .= '<li>' . $msg . '</li>' . LB;
			}
			
			$retval .= '</ul>' . LB;
		}
		
		return $retval;
	}
	
	/**
	* Return a string of information
	*
	* @access  public
	* @param   item    string
	* @return          string
	*/
	function getInfo($item)
	{
		$retval = '<div class="infobox">' . LB
				. '<h2>' . $item . PRECHECK_str('info_config') . '</h2>' . LB;
		
		$items = array(
			'magic_quotes_gpc', 'magic_quotes_runtime', 'display_errors',
			'magic_quotes_sybase', 'mbstring_language', 'mbstring_http_output',
			'mbstring_encoding_translation', 'mbstring_internal_encoding',
			'default_charset', 'register_globals', 'memory_limit',
		);
		
		if (in_array($item, $items)) {
			$retval .= PRECHECK_str('info_' . $item);
		} else {
			$retval .= '<p>?</p>';
		}
		
		$retval .= '</div>' . LB
				.  '<p><a href="javascript:history.back()" title="'
				.  PRECHECK_str('back_hint') . '">' . PRECHECK_str('back')
				. '</a></p>' . LB;
		
		return $retval;
	}
	
	/**
	* Write the system path into "siteconfig.php"
	*
	* @access  public
	* @return  boolean  TRUE = success, FALSE = otherwise
	*/
	function writeSiteconfig()
	{
		$siteconfig = realpath(dirname(__FILE__) . '/../../siteconfig.php');
		clearstatcache();
		if (file_exists($siteconfig)) {
			$content = file_get_contents($siteconfig);
			if ($content !== FALSE) {
				if (OS_WIN) {
					$path = str_replace("//", "/", $this->path);
				    $path = str_replace("'", "\\'", $path);
				} else {
				    $path = str_replace("'", "\\'", $this->path);
				}
				$content = str_replace('/path/to/Geeklog/', $path, $content);
				if (file_put_contents($siteconfig, $content) !== FALSE) {
					return TRUE;
				}
			}
		}
		
		return FALSE;
	}
	
	function _formatInfo($item, $value, $result, $additionalInfo = NULL)
	{
		$retval = '<li>' . PRECHECK_str($item) . ': ' . $value . '&nbsp;';
		
		if ($result === 'good') {
			$retval .= '<span class="good">' . PRECHECK_str('ok') . '</span>';
		} else if ($result === 'warning') {
			$retval .= '<span class="warning">' . PRECHECK_str('warning') . '</span>';
		} else if ($result === 'bad') {
			$retval .= '<span class="bad">' . PRECHECK_str('error') . '</span>';
		}
		
		if ($additionalInfo !== NULL) {
			$retval .= '&nbsp;' . $additionalInfo;
		}
		
		$retval .= '</li>' . LB;
		
		return $retval;
	}
	
	/**
	* Step 0: Checks PHP settings
	*
	* @access  private
	*/
	function _step0()
	{
		global $gl_version;
		
		$retval = '<h2 class="heading">' . PRECHECK_str('step0') . '</h2>' . LB
				. '<ol>' . LB;
		
		// Checks PHP version
		if (version_compare(PHP_VERSION, MIN_PHP_VERSION) >= 0) {
			$retval .= $this->_formatInfo('item_php_version', PHP_VERSION, 'good');
		} else {
			$retval .= $this->_formatInfo(
				'item_php_version', PHP_VERSION, 'bad',
				PRECHECK_str('e_php_version1') . MIN_PHP_VERSION . PRECHECK_str('e_php_version2')
			);
			$this->fatal_error ++;
		}
		
		// Checks PHP extensions
		$extensions = get_loaded_extensions();
		$extensions = array_map('strtolower', $extensions);
		$dbms = array();
		
		if (in_array('mysql', $extensions)) {
			$dbms[] = 'MySQL';
		}
		
		if (in_array('mssql', $extensions)) {
			$dbms[] = 'Microsoft SQL Server';
		}
		
		if ((version_compare($gl_version, '1.7.0') >= 0) AND in_array('pgsql', $extensions)) {
			$dbms[] = 'PostgreSQL';
		}
		
		$dbms = implode(', ', $dbms);
		
		if ($dbms != '') {
			$retval .= $this->_formatInfo('item_database', $dbms, 'good');
		 } else {
			$retval .= $this->_formatInfo('item_database', $dbms, 'bad', PRECHECK_str('e_database_disabled'));
			$this->fatal_error ++;
		}
		
		// Checks mbstring functions
		if (in_array('mbstring', $extensions)) {
			$retval .= $this->_formatInfo('item_mbstring', PRECHECK_str('enabled'), 'good');
		} else {
			$retval .= $this->_formatInfo('item_mbstring', PRECHECK_str('e_disabled'), 'bad', PRECHECK_str('e_mbstring_disabled'));
			$this->fatal_error ++;
		}
		
		$retval .= '</ol>';
		
		if ($this->fatal_error > 0) {
			$retval .= '<p>' . PRECHECK_str('e_fatal_error') . '</p>' . LB;
		}
		
		return $retval;
	}
	
	/**
	* Step 1: Guess the path to "db-config.php"
	*
	* @access  private
	*/
	function _step1()
	{
		$retval = '<h2 class="heading">' . PRECHECK_str('step1') . '</h2>' . LB
				. '<ol>' . LB;
		$this->path = $this->guessDbConfigPath();
		
		if ($this->path != '') {
			$retval .= $this->_formatInfo('item_dbconfig_path', $this->path, 'good');
		} else {
			$fb = '<p style="margin: 20px 0;"><a class="big-button" href="fb.php">'
				. PRECHECK_str('use_filebrowser') . '</a></p>' . LB;
			$retval .= $this->_formatInfo('item_dbconfig_path', PRECHECK_str('e_dbconfig_not_found'), 'bad', $fb);
			$this->fatal_error ++;
		}
		
		$retval .= '</ol>' . LB;
		
		return $retval;
	}
	
	/**
	* Step 2: Select install type
	*
	* @access  private
	*/
	function _step2()
	{
		$path = rawurlencode($this->path);

		$retval = '<h2 class="heading">' . PRECHECK_str('step2') . '</h2>' . LB
				. '<p style="margin: 20px 0;">' . LB
				. '<a class="big-button" href="' . THIS_SCRIPT
				. '?step=3&amp;mode=install&amp;path=' . $path . '">'
				. PRECHECK_str('fresh_install') . '</a>&nbsp;'
				. '<a class="big-button" href="' . THIS_SCRIPT
				. '?step=3&amp;mode=upgrade&amp;path=' . $path . '">'
				. PRECHECK_str('upgrade') . '</a>&nbsp;'
				. '<a class="big-button" href="' . THIS_SCRIPT
				. '?step=3&amp;mode=migrate&amp;path=' . $path . '">'
				. PRECHECK_str('migrate') . '</a></p>' . LB;

		return $retval;
	}
	
	/**
	* Check PHP settings and path permissions
	*
	* @access  private
	*/
	function _step3()
	{
		$retval = '<h2 class="heading">' . PRECHECK_str('step3') . '</h2>' . LB
				. '<ol>' . LB
				. '<li><strong>' . PRECHECK_str('check_php_config') . '</strong>:'
				. $this->displayErrorAndWarning($this->menuCheckPHPSettings())
				. '</li>' . LB;
		$this->fatal_error += $this->error;
		
		if (($this->mode === 'install') OR ($this->mode === 'migrate')) {
			$retval .= '<li><strong>' . PRECHECK_str('check_path') . '</strong>:'
					.  $this->displayErrorAndWarning($this->menuCheckWritable())
					.  '</li>' . LB;
			$this->fatal_error += $this->error;
		}
		
		$retval .= '</ol>' . LB
				.  '<h2 class="heading">' . PRECHECK_str('result') . '</h2>' . LB;
		
		if ($this->fatal_error > 0) {
			$retval .= '<p>' . PRECHECK_str('e_fatal_error') . '</p>' . LB
					.  '<p style="margin: 20px 0;"><a class="big-button" href="'
					.  THIS_SCRIPT . '">' . PRECHECK_str('check_again')
					.  '</a></p>' . LB;
		} else {
			if ($this->mode === 'install') {
				$target = THIS_SCRIPT . '?mode=install&amp;step=4&amp;path='
						. rawurlencode($this->path);
			} else if ($this->mode === 'migrate') {
				$target = 'migrate.php?'
						. "dbconfig_path="
						. rawurlencode($this->path . 'db-config.php')
						. "&amp;public_html_path=" . rawurlencode($this->path_html)
						. "&amp;language=japanese_utf-8";
			} else {
				global $_DB_host, $_DB_name, $_DB_user, $_DB_pass, $_DB_table_prefix, $_DB_dbms;
				
				require_once $this->path . 'db-config.php';
				$target = 'index.php?mode=upgrade&amp;language=japanese_utf-8'
						. '&amp;dbconfig_path='
						. rawurlencode($this->path . 'db-config.php');
			}
			
			$retval .= '<p>' . PRECHECK_str('success') . '</p>' . LB
					.  '<form action="' . $target. '" method="post">' . LB
					.  '<p><input class="submit button big-button" type="submit" name="submit" value="'
					.  PRECHECK_str('continue') . '" /></p>' . LB;
			
			if ($this->mode === 'upgrade') {
				$retval .= '<input type="hidden" name="db_host" value="'
						.  $_DB_host . '" />' . LB
						.  '<input type="hidden" name="db_name" value="'
						.  $_DB_name . '" />' . LB
						.  '<input type="hidden" name="db_user" value="'
						.  $_DB_user . '" />' . LB
						.  '<input type="hidden" name="db_pass" value="'
						.  $_DB_pass . '" />' . LB
						.  '<input type="hidden" name="db_prefix" value="'
						.  $_DB_table_prefix . '" />' . LB
						.  '<input type="hidden" name="db_type" value="'
						.  $_DB_dbms . '" />' . LB;
			}
			
			$retval .= '</form>' . LB;
		}
		
		return $retval;
	}
	
	/**
	* Step 4. Check DB settings
	*
	* @access  private
	*/
	function _step4()
	{
		$extensions = get_loaded_extensions();
		$extensions = array_map('strtolower', $extensions);
		$mysql = in_array('mysql', $extensions) ? '' : ' disabled="disabled"';
		$mssql = in_array('mssql', $extensions) ? '' : ' disabled="disabled"';
		$pgsql = in_array('pgsql', $extensions) ? '' : ' disabled="disabled"';
		
		$this->writeSiteconfig();
		$mode     = $this->mode;
		$language = 'japanese_utf-8';
		$path     = rawurlencode($this->path . 'db-config.php');
		$params   = "mode={$mode}&amp;language={$language}&amp;dbconfig_path={$path}&amp;display_step=2";
		$retval = '<div id="container">' . LB
				. '<h1 class="heading">' . PRECHECK_str('step4') . '</h1>' . LB
				. '<form action="index.php?' . $params . '" method="post">' . LB
				. '<fieldset>' . LB
				. '<legend>' . PRECHECK_str('info') . '</legend>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('db_type')
				. ':</label>&nbsp;' . LB
				. '<select id="db_type" name="db_type">' . LB
				. '<option value="mysql" selected="selected"' . $mysql
				. '>MySQL</option>' . LB
				. '<option value="mysql-innodb"' . $mysql
				. '>MySQL (InnoDB)</option>' . LB
				. '<option value="mssql"' . $mssql . '>Microsoft SQL</option>' . LB
				. '<option value="pgsql"' . $pgsql . '>PostgreSQL</option>' . LB
				. '</select>' . LB
				. '</p>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('db_host')
				. ':</label>&nbsp;'
				. '<input type="text" id="db_host" name="db_host" size="30" maxlength="30" value="localhost" /></p>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('db_user')
				. ':</label>&nbsp;'
				. '<input type="text" id="db_user" name="db_user" size="30" maxlength="30" /></p>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('db_pass')
				. ':</label>&nbsp;'
				. '<input type="password" id="db_pass" name="db_pass" size="30" maxlength="30" /></p>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('db_name')
				. ':</label>&nbsp;'
				. '<input type="text" id="db_name_input" name="db_name" size="30" maxlength="30" /><select id="db_name" name="db_name" class="none"><option>--</option></select><span id="db_name_warning" class="hidden">'
				. PRECHECK_str('e_database_not_empty') . '</span></p>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('db_prefix')
				. ':</label>&nbsp;'
				. '<input type="text" id="db_prefix" name="db_prefix" size="30" maxlength="30" value="gl_" /></p>' . LB
				. '<p><label class="lbl right">' . PRECHECK_str('use_utf8')
				. ':</label>&nbsp;'
				. '<input id="utf8on" type="radio" name="utf8" value="on" checked="checked" />'
				. PRECHECK_str('yes') . '<input id="utf8off" type="radio" name="utf8" value="off" />'
				. PRECHECK_str('no') . '</p>' . LB
				. '</fieldset>' . LB
				. '<p><input id="install_submit" class="submit button big-button" type="submit" value="'
				. PRECHECK_str('go_to_installer') . '" /></p>' . LB
				. '</form>' . LB
				. '</div>' . LB;
		
		return $retval;
	}
	
	/**
	* Returns the names of databases
	*
	* @access  public
	* @param   string  $_GET['type'], $_GET['host'], $_GET['user'],
	*                  $_GET['name'], $_GET['pass']
	* @return  string  DB names separated by a semicolon on success,
	*                  otherwise '-ERR'.
	*/
	function lookupDb()
	{
		$retval = array();
		$err    = '-ERR';
		
		$type = isset($_GET['type']) ? $_GET['type'] : '';
		$host = isset($_GET['host']) ? $_GET['host'] : '';
		$user = isset($_GET['user']) ? $_GET['user'] : '';
		$pass = isset($_GET['pass']) ? $_GET['pass'] : '';
		if ($host == 'localhost') {
			$host = '127.0.0.1';
		}
		
		if (($type === 'mysql') OR ($type === 'mysql-innodb')) {
			if (($db = @mysql_connect($host, $user, $pass)) === FALSE) {
				return $err;
			}
			
			$v = mysql_get_server_info($db);
			
			if (version_compare($v, MIN_MYSQL_VERSION) < 0) {
				$err .= PRECHECK_str('e_mysql1') . '(<strong>' . $v
					 .  '</strong>)' . PRECHECK_str('e_mysql2') . '<strong>'
					 .  MIN_MYSQL_VERSION . '</strong>' . PRECHECK_str('e_mysql3');
				return $err;
			}
			
			if (($result = @mysql_list_dbs($db)) === FALSE) {
				return $err;
			}
			
			while (($A = mysql_fetch_object($result)) !== FALSE) {
				if (($A->Database != 'mysql')
				 AND ($A->Database != 'information_schema')) {
					$retval[] = $A->Database;
				}
			}
			
			$retval = implode(';', $retval);
			if ($retval == '') {
				$err .= PRECHECK_str('e_mysql_database_not_found');
			}
			
			return $retval;
		} else if ($type === 'mssql') {
			if (($db = @mssql_connect($host, $user, $pass)) === FALSE) {
				return $err;
			}
			
			// @TODO: Add extra checks here
			
			return '';
		} else if ($type === 'pgsql') {
			$cns = 'host=' . $host . ' dbname=information_schema' . $name
				 . ' user=' . $user . ' password=' . $pass;
			
			if (($db = @pg_connect($cns)) === FALSE) {
				return $err;
			}
			
			// @TODO: Add extra checks here
			
			return '';
		} else {
			return $err;
		}
	}
	
	/**
	* Return the number of tables in a given MySQL database
	*
	* @access  private
	* @param   string  $host, $user, $pass, $name, $prefix
	* @return  mixed   FALSE = DB error, otherwise the number of tables
	*/
	function _countMysqlTable($host, $user, $pass, $name, $prefix)
	{
		$retval = FALSE;
		
		if (($db = @mysql_connect($host, $user, $pass)) !== FALSE) {
			if (mysql_select_db($name, $db) === TRUE) {
				// '_' is a wild character in MySQL, so we have to escape it
				// with '\'
				$prefix = str_replace('_', '\\_', $prefix);
				
				if (($result = mysql_query("SHOW TABLES LIKE '{$prefix}%'", $db)) !== FALSE) {
					$retval = mysql_num_rows($result);
				}
			}
			
			@mysql_close($db);
		}
		
		return $retval;
	}
	
	/**
	* Returns the number of tables in a given Microsoft SQL Server database
	*
	* @access  private
	* @param   string  $host, $user, $pass, $name, $prefix
	* @return  mixed   FALSE = DB error, otherwise the number of tables
	*/
	function _countMssqlTable($host, $user, $pass, $name, $prefix)
	{
		$retval = FALSE;
		
		if (($db = @mssql_connect($host, $user, $pass)) !== FALSE) {
			// Escapes the db name with '[' and ']'
			if (!preg_match('/^\[.*\]$/', $name)) {
				$name = '[' . $name . ']';
			}
			
			if (mssql_select_db($name, $db) === TRUE) {
				// @TODO: Adds code to count tables here
			}
			
			@mssql_close($db);
		}
		
		return $retval;
	}
	
	/**
	* Returns the number of tables in a given PostgreSQL database
	*
	* @access  private
	* @param   string  $host, $user, $pass, $name, $prefix
	* @return  mixed   FALSE = DB error, otherwise the number of tables
	*/
	function _countPgsqlTable($host, $user, $pass, $name, $prefix)
	{
		$retval = FALSE;
		$cns = 'host=' . $host . ' dbname=' . $name . ' user=' . $user
			 . ' password=' . $pass;
		
		if (($db = @pg_connect($cns)) !== FALSE) {
			// @TODO: Adds code to count tables here
			
			@pg_close($db);
		}
		
		return $retval;
	}
	
	/**
	* Return the number of tables in a given database
	*
	* @access  public
	* @param   string  $_GET['type'], $_GET['host'], $_GET['user'],
	*                  $_GET['name'], $_GET['pass'], $_GET['prefix']
	* @return  string  '-ERR' = DB error, otherwise a string representing the
	*                  number of tables the given DB has
	*/
	function countTable()
	{
		$err = '-ERR';
		
		$type   = isset($_GET['type']) ? $_GET['type'] : '';
		$host   = isset($_GET['host']) ? $_GET['host'] : '';
		$user   = isset($_GET['user']) ? $_GET['user'] : '';
		$pass   = isset($_GET['pass']) ? $_GET['pass'] : '';
		$name   = isset($_GET['name']) ? $_GET['name'] : '';
		$prefix = isset($_GET['prefix']) ? $_GET['prefix'] : '';
		
		if ($host === 'localhost') {
			$host = '127.0.0.1';
		}
		
		if (($type == 'mysql') OR ($type == 'mysql-innodb')) {
			$retval = $this->_countMysqlTable($host, $user, $pass, $name, $prefix);
		} else if ($type === 'mssql') {
			$retval = $this->_countMssqlTable($host, $user, $pass, $name, $prefix);
		} else if ($type === 'pgsql') {
			$retval = $this->_countPgsqlTable($host, $user, $pass, $name, $prefix);
		} else {
			$retval = FALSE;
		}
		
		return ($retval === FALSE) ? '-ERR' : (string) $retval;
	}
}

//=============================================================================
// MAIN
//=============================================================================

/**
* step 1. Check the path to "db-config.php"
*	v
* step 2. Select install type
*   v
* step 3. Check PHP settings and path permissions -- upgrade --+
*   v                                                          |
* step 4. Check DB settings                                    |
*   v                                                          |
* step 5. Redirect to public_html/admin/install/index.php <----+
*/

// Get the request vars
$step = 0;

if (isset($_GET['step'])) {
	$step = intval($_GET['step']);
} else if (isset($_POST['step'])) {
	$step = intval($_POST['step']);
}
if (($step < 1) OR ($step > 4)) {
	$step = 0;
}

$mode = '';

if (isset($_GET['mode'])) {
	$mode = $_GET['mode'];
} else if (isset($_POST['mode'])) {
	$mode = $_POST['mode'];
}

if (!in_array($mode, array('install', 'upgrade', 'migrate', 'info', 'lookupdb', 'counttable'))) {
	$step = 2;
}

$path = '';

if (isset($_GET['path'])) {
	$path = $_GET['path'];
} else if (isset($_POST['path'])) {
	$path = $_POST['path'];
}

if ($path == '') {
	$step = 0;
} else {
	$path = str_replace("\\", '/', $path);
	$path = rawurldecode($path);
}

$precheck = new Precheck;
$precheck->mode = $mode;
$precheck->step = $step;
$precheck->path = $path;

// JavaScript driver process
if ($mode === 'lookupdb') {
	$result = $precheck->lookupDb();
    header('Content-Type: text/html; charset=utf-8');
	echo $result;
	exit;
} else if ($mode === 'counttable') {
	$result = $precheck->countTable();
    header('Content-Type: text/plain; charset=utf-8');
	echo $result;
	exit;
}

// Sets template vars
$precheck->setVar('lang', 'ja');
$precheck->setVar('precheck_version', PRECHECK_VERSION);
$precheck->setVar('nav_step1_class', ($step == 1) ? 'hilight' : 'normal');
$precheck->setVar('nav_step2_class', ($step == 2) ? 'hilight' : 'normal');
$precheck->setVar('nav_step3_class', ($step == 3) ? 'hilight' : 'normal');
$precheck->setVar('nav_step4_class', ($step == 4) ? 'hilight' : 'normal');
$precheck->setVar('nav_visibility', ($step > 0) ? 'visible' : 'hidden');
$precheck->setVar('lang_help', PRECHECK_str('lang_help'));
$precheck->setVar('lang_step1', PRECHECK_str('step1'));
$precheck->setVar('lang_step2', PRECHECK_str('step2'));
$precheck->setVar('lang_step3', PRECHECK_str('step3'));
$precheck->setVar('lang_step4', PRECHECK_str('step4'));
$precheck->setVar('lang_precheck', PRECHECK_str('lang_precheck'));
$precheck->setVar('lang_version', PRECHECK_str('lang_version'));

// Adds JavaScript support
if ($step == 4) {
	$precheck->setVar(
		'javascript',
		'<script type="text/javascript" src="core.js"></script>' . LB
		. '<script type="text/javascript" src="precheck.js"></script>' . LB
	);
}

$content = '';

if ($mode === 'info') {
	$content .= $precheck->getInfo($_GET['item']);
} else {
	switch ($step) {
		case 0: // Checks PHP setting
			$content .= $precheck->_step0();
			
			if (($precheck->fatal_error > 0) OR ($precheck->error > 0)) {
				break;
			}
			
			/* Fall through intentionally */
		    $precheck->step = 1;
			
		case 1:	// Check the path to "db-config.php"
			$content .= $precheck->_step1();
			
			if (($precheck->fatal_error > 0) OR ($precheck->error > 0)) {
				break;
			}
			
			/* Fall through intentionally */
		    $precheck->step = 2;
		
		case 2:	// Select install type
			$content .= $precheck->_step2();
			break;
		
		case 3:	// Check PHP settings and path permissions
			$content .= $precheck->_step3();
			break;
		
		case 4:	// Check DB settings
			$content .= $precheck->_step4();
			break;
	}
}

$precheck->setVar('content', $content);

header('Content-Type: text/html; charset=utf-8');
echo $precheck->parse();
