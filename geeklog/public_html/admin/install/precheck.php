<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.4.1                                                             |
// +---------------------------------------------------------------------------+
// | precheck.php                                                              |
// |                                                                           |
// | Geeklog pre-installation check script                                     |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006-2008 by the following authors:                         |
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
//
// $Id$

/**
* This script tests the file and directory permissions, thus addressing the
* most common errors / omissions when setting up a new Geeklog site ...
*
* @author   mystral-kk <geeklog AT mystral-kk DOT net>
* @version  1.2.2 (2008-02-01)
*
*/

error_reporting(E_ALL);
ob_start();

// Vars and constants

$PRECHECK_VERSION = '1.2.2 (2008-02-01)';

error_reporting(E_ALL);
define('PCHK_INTERNAL_ENCODING', 'UTF-8');
define('THIS_SCRIPT', $_SERVER['PHP_SELF']); // Geeklog Japanese Ivy changed SCRIPT_NAME to PHP_SELF by Tsuchi
define('HELP_URL', dirname(THIS_SCRIPT) . '/precheck.html');
define('COOKIE_NAME', 'PRECHECK_TEST');
define('OK', 'OK');
define('NG', '問題あり:');
define('WARNING', '要確認:');
define('INFO', '情報:');
define('RESULT_OK', 1);
define('RESULT_NG', 2);
define('RESULT_WARNING', 3);
define('RESULT_INFO', 4);
if (!defined('DIRECTORY_SEPARATOR')) {
    define('DIRECTORY_SEPARATOR',
        (substr(PHP_OS, 0, 3) == 'WIN') ? '\\' : '/'
   );
}
if (!defined('LB')) {
    define('LB', "\n");
}

$lang_data = array(
    array('lang_name' => 'utf-8',  'lang_label' => '日本語(UTF-8)'),
    array('lang_name' => 'euc-jp', 'lang_label' => '日本語(EUC-JP)'),
);

// Paths we should check to see if writable from Web server

// Genuine Geeklog

$PATHS_TO_BE_CHECKED = array();
$PATHS_TO_BE_CHECKED['private']['original'] = (
    array(
        'backups', 'data', 'logs', 'logs/access.log', 'logs/error.log', 'logs/spamx.log'
	)
);

$PATHS_TO_BE_CHECKED['public']['original'] = (
    array(
        'backend', 'images/articles', 'images/topics','images/userphotos'
	)
);

// Additional paths added by Geeklog.jp (except <public_html>/layout/*)

$PATHS_TO_BE_CHECKED['private']['optional'] = (
    array(
        'plugins/filemgmt/filemgmt.php',
	)
);

$PATHS_TO_BE_CHECKED['public']['optional'] = (
    array(
        'admin/plugins/themedit/preview.html', 'admin/plugins/themedit/preview.css',
        'filemgmt_data/category_snaps', 'filemgmt_data/files',
        'filemgmt_data/files/tmp', 'filemgmt_data/snaps', 'filemgmt_data/snaps/tmp',
	)
);

// Sets PCHK_INTERNAL_ENCODING to mb_internal_encoding

if (!function_exists('mb_internal_encoding')) {
    echo NG . '<b>マルチバイト文字列関数(mbstring)が有効になっていません。チェックを終了します。</b><p>MS Windowsをお使いの方は，php.iniに extension=php_mbstring.dll の設定があるかどうか，PHPをソースからビルドした方は --enable-mbstring オプションをつけたかどうか確認してみてください。';
    @ob_end_flush();
    exit;
} else {
    // Saves mb_internal_encoding()
    $old_mb_internal_encoding = mb_internal_encoding();
    mb_internal_encoding(PCHK_INTERNAL_ENCODING);
}

// Undoes magic_quotes_gpc if it is on

if (get_magic_quotes_gpc()) {
    $_GET    = array_map('stripcslashes', $_GET);
    $_POST   = array_map('stripcslashes', $_POST);
    $_COOKIE = array_map('stripcslashes', $_COOKIE);
}

// Gets the language and encoding you're going to install Geeklog with

$precheck_lang = '';
if (isset($_POST['precheck_lang']) AND isset($_POST['submit'])) {
    $tmp = $_POST['precheck_lang'];
    foreach ($lang_data as $lang_data_tmp) {
        if ($tmp == $lang_data_tmp['lang_name']) {
            $precheck_lang = $tmp;
            break;
        }
    }
}

// Gets whether to check files

if (isset($_POST['check_files'])) {
	$check_files = ($_POST['check_files'] == 1);
} else {
	$check_files = false;
}

// Tries to redirect to install script

if (isset($_POST['path_config']) AND ($_POST['submit'] == 'インストール実行')) {
    $path_config = $_POST['path_config'];
    if (file_exists($path_config)) {
        if (isset($_COOKIE[COOKIE_NAME])
         AND $_COOKIE[COOKIE_NAME] == md5(COOKIE_NAME)) {
            clearstatcache();
            require_once $path_config;
            $install_script = dirname(THIS_SCRIPT) . '/install.php';
            $lang = ($precheck_lang == 'utf-8') ? 'japanese_utf-8' : 'japanese';
            echo "<html><head><meta http-equiv=\"refresh\" content=\"0; URL={$install_script}?lang={$lang}&amp;glPath={$_POST['path_config']}\"></head></html>" . LB;
            @ob_end_flush();
            exit;
        } else {
            echo '<p>テスト用のクッキーを書き込めませんでした。このままでは，インストール後にログインできません。<br>お使いのブラウザがクッキーを受け入れるように設定されているか（<a herf="http://www.geeklog.jp/staticpages/index.php/cookie">参考URL</a>），config.php中のクッキー関係の設定（特に$_CONF[\'cookie_path\']と$_CONF[\'cookiedomain\']）が正しいか確認してください。</p><p><a href="' . THIS_SCRIPT . '">再チェックする</a></p>' . LB;
            @ob_end_flush();
            exit;
        }
    }
}

$temp_internal_encoding = PCHK_INTERNAL_ENCODING;
echo <<<EOD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset={$temp_internal_encoding}">
    <title>Geeklogインストール前チェック</title>
    <style type="text/css">
    <!--
        body {
            font-size: small;
            margin-left: 30px;
        }
        table {
            background-color: #6b6bff;
            font-size: small;
            width: 700px;
        }
        table.legend {
            width: 400px;
        }
        th {
            background-color: #6b6bff;
            color: #ffffff;
        }
        col1 {
            width: 250px;
        }
        col2 {
            width: 150px;
        }
        td {
            background-color: #f2f2f2;
            padding: 5px;
        }
        td.row_warning {
            color: #ffffff;
            background-color: #cc0000;
        }
        h1 {
            width: 688px;
            margin-top: 40px;
            font-size: medium;
            color: #00005b;
            border-left: 12px solid #00005b;
            padding-left: 12px;
        }
        h2 {
            width: 682px;
            margin-top: 40px;
            border-left: 8px solid #6b6bff;
            border-bottom: 1px solid #6b6bff;
            color: #6b6bff;
            padding-left: 10px;
            padding-bottom: 3px;
            font-size: medium;
        }
        h2.install_ok {
            color: #339900;
            border-left: 8px solid #339900;
            border-bottom: 1px solid #339900;
        }
        h2.install_ng {
            color: #cc0000;
            border-left: 8px solid #cc0000;
            border-bottom: 1px solid #cc0000;
        }
        img {
            border-width: 0px;
        }
        p {
            width: 700px;
        }
        .ok {
        }
        .ng {
            color: #ffffff;
            background-color: #cc0000;
        }
        .warning {
            color: black;
            background-color: #ffcc33;
        }
        .info {
            color: black;
            background-color: #99cc00;
        }
        .path {
            background-color: #eeeeee;
            padding: 15px;
            margin: 15px;
            width: 600px;
        }
        #header {
            background-color: #6b6bff;
            width: 700px;
        }
        #footer {
            margin-top:40px;
            width: 700px;
            padding-top: 5px;
            text-align: center;
            margin-top: 40px;
            border-top: 1px solid #6b6bff;
            font-size: small;
        }
        .copyright {
            font-size: medium;
            color: white;
            font-style: italic;
            border: solid 1px #ff9900;
            background-color: #000099;
        }
    -->
    </style>
</head>
<body>
    <p class="header">
        <img src="images/logo.png" alt="Geeklogロゴ">
    </p>
    <p>
        <strong>precheck.php-{$PRECHECK_VERSION}</strong> ～インストール前チェックとインストール実行プログラムの呼び出しまで
    </p>

    <h1>Geeklogインストール前チェック</h1>
    <p>このスクリプト(precheck.php)は，Geeklog.jpが公開している日本語版をインストールする際に問題になりそうな点をチェックします。</p>
EOD;

if (empty($precheck_lang)) {
    echo '<form name="formEncoding" action="' . THIS_SCRIPT . '" method="post">' . LB
       . '<table>' . LB
       . '<tr>' . LB
       . '<th width="300">インストールしたい言語を選択してください：</th>' . LB
       . '<td>' . LB
       . '<select name="precheck_lang">' . LB
       . '<option value="--" selected="selected">選択してください</option>' . LB;
    
    foreach ($lang_data as $L) {
        echo '<option value="' . $L['lang_name'] . '">' . $L['lang_label'] . '</option>' . LB;
    }

    echo '</select>' . LB
       . '</td>' . LB
	   . '</tr>' . LB
	   . '</table><br>' . LB
	   . '<table>' . LB
	   . '<tr>' . LB
	   . '<th width="300">ファイルが完全にアップロードされているかチェックしますか?</th>' . LB
	   . '<td>' . LB
	   
	   . 'はい<input name="check_files" type="radio" value="1">　' . LB
	   . 'いいえ<input name="check_files" type="radio" value="0" checked="checked"><br><br>' . LB
	   . '<span style="font-size: 10px; ">※ひろろんさんが開発されたwkyGeeklogインストーラ（超簡単自動インストーラ）を使用している場合は，アップロードチェックは不要です。チェックする場合でも，サーバに負荷がかかっている場合はWebブラウザがタイムアウトする可能性があります。その場合には「いいえ」を選択してください。</span>' . LB
	   . '</td>' . LB
	   . '</tr>' . LB
	   . '<tr>' . LB
	   . '<td colspan="2" style="text-align: center;">' . LB
       . '<input name="submit" type="submit" value="実行">' . LB
	   . '</td>' . LB
       . '</tr>' . LB
       . '</table>' . LB
       . '</form>';
    
    @ob_end_flush();
    exit;
}

// Tries to create a databse if so ordered

if (isset($_POST['submit']) AND $_POST['submit'] == '作成を試みる'
 AND isset($_POST['host']) AND isset($_POST['name'])
 AND isset($_POST['user']) AND isset($_POST['pass'])
 AND isset($_POST['db_charset'])) {
    PCHK_createDatabase(
        $_POST['host'], $_POST['name'], $_POST['user'], $_POST['pass'],
        $_POST['db_charset']
   );
}

// Shows legends

echo '<table class="legend">' . LB
   . '<caption>＜凡例＞</caption>' . LB
   . '<tr>' . LB
   . '<td class="ok">この色の項目は問題ありません。</td>' . LB
   . '</tr>' . LB
   . '<tr>' . LB
   . '<td class="info">この色の項目は参考情報です。まず問題ありません。</td>' . LB
   . '</tr>' . LB
   . '<tr>' . LB
   . '<td class="warning">この色の項目は問題になるかもしれません。</td>' . LB
   . '</tr>' . LB
   . '<tr>' . LB
   . '<td class="ng">この色の項目は問題ありです。</td>' . LB
   . '</tr>' . LB
   . '</table>' . LB;

// ========================================================
//   Functions
// ========================================================

// Gets the contents of $_CONF['language_files'] array

function PCHK_getLanguageFiles() {
    global $_CONF;
    
    if (!isset($_CONF['language_files'])) {
        return '';
    }
    
    $retval = array();
    foreach ($_CONF['language_files'] as $k => $v) {
        $retval[] = $k . ' => ' . $v;
    }
    
    return implode('<br>' . LB, $retval);
}

// Gets the contents of $_CONF['languages'] array

function PCHK_getLanguages() {
    global $_CONF;
    
    if (!isset($_CONF['languages'])) {
        return '';
    }
    
    $retval = array();
    foreach ($_CONF['languages'] as $k => $v) {
        $retval[] = $k . ' => ' . $v;
    }
    
    return implode('<br>' . LB, $retval);
}

// Checks the write permission for a given path
//
// @param  path          string - real path to be tested
// @param  path4dislay   string - path to be displayed
// @param  required      string - either 'original' or 'optional'
// @return               boolean - true (not exist), false otherwise

function PCHK_checkPerm($path, $path4display, $required) {
    
    $retval = false;
    
    $flag = file_exists($path);
    clearstatcache();
    if ($flag) {
        $perm = fileperms($path);
        clearstatcache();
        $perm_str = substr(sprintf('%o', $perm), -4);
        if (is_writable($path)) {
            $status = RESULT_OK;
            $msg = OK;
        } else {
            $status = RESULT_NG;
            $msg = 'パーミッションが不適切です。Webサーバーから書き込めるように，パーミッションを変更してください。';
        }
        PCHK_printResult($path4display, $perm_str, $msg, $status);
    } else {
        if ($required == 'original') {
            PCHK_printResult($path4display, '?', 'パスが存在しません。', RESULT_NG);
            $retval = true;
        } else {
            PCHK_printResult($path4display, '?', 'パスが存在しません。', RESULT_WARNING);
        }
    }
    
    return $retval;
}

// Creates a database

function PCHK_createDatabase($host, $name, $user, $pass, $db_charset) {

    $dh = @mysql_connect($host, $user, $pass);
    if ($dh !== false) {
        if ($db_charset == 'utf-8') {
            $charset = 'CHARACTER SET utf8';
        } else if ($db_charset == 'ujis') {
            $charset = 'CHARACTER SET ujis';
        } else {
            $charset = '';
        }
        $result = @mysql_query("CREATE DATABASE {$name} {$charset}");
        if ($result === false) {
            echo 'データベースの作成に失敗しました。<br>' . LB;
        } else {
            echo 'データベースの作成に成功しました。<br>' . LB;
        }
    } else {
        echo 'データベースを作成しようとしましたが，サーバーに接続できませんでした。<br>' . LB;
    }
    
    @mysql_close($dh);
}

// Gets MySQL server version
//
// This function is adopted from Geeklog's system/databases/mysql.class.php

function PCHK_getMySQLVersion() {

    $v = mysql_get_server_info();
    preg_match('/^([0-9]+).([0-9]+).([0-9]+)/', $v, $match);
    $v = array(intval($match[1]), intval($match[2]), intval($match[3]));
    
    return $v;
}

// Checks if the database server saves UTF-8 strings correctly
//
// @return string  a diagnostic message

function PCHK_createTempTable() {
    global  $_CONF, $_DB_host, $_DB_user, $_DB_pass, $_DB_name, $_DB_table_prefix;

    $table_name = $_DB_table_prefix . 'precheck_test';
    $test_data  = '雀の往来，猫も喜ぶGeeklogの先進性';
    $sql1 = "USE {$_DB_name}";
    $sql2 = "CREATE TABLE {$table_name} ("
          . "id INTEGER NOT NULL DEFAULT '0',"
          . "data VARCHAR(255) NOT NULL DEFAULT '',"
          . "PRIMARY KEY (id)"
          . ") TYPE=MyISAM";
    $sql3 = "INSERT INTO {$table_name} (id, data) VALUES ('1', '"
          . addslashes($test_data) . "')";
    $sql4 = "SELECT data FROM {$table_name} WHERE (id = '1')";
    $sql5 = "DROP TABLE {$table_name}";
    $retval = false;
    
    // ==========================================
    // "SET NAMES 'utf8' なしで接続を試みる
    // ==========================================

    $dh = @mysql_connect($_DB_host, $_DB_user, $_DB_pass);
    if ($dh === false) {
        return 'サーバーに接続できません。';
    }
    
    $result = @mysql_query($sql1);
    if ($result === false) {
        return 'データベースを選択できません。';
    }
    $result = @mysql_query($sql2);
    if ($result === false) {
        return 'テスト用のテーブルを作成できません。';
    }

    $result = @mysql_query($sql3);
    if ($result !== false) {
        $result = @mysql_query($sql4);
        if ($result !== false) {
            $A = @mysql_fetch_array($result);
            if ($A['data'] == $test_data) {
                $retval = "SET NAMES 'utf8' なしで正常に動作します。<span style='warning'>つまり，Geeklogのバージョンが1.4.1以上の場合，非公開領域/system/databases/mysql.class.phpの144行目をコメントアウトする必要があります。</span>";
            }
        }
    }

    @mysql_query($sql5);
    @mysql_close($dh);
    if ($retval !== false) {
        return $retval;
    }

    // ==========================================
    // "SET NAMES 'utf8' ありで接続を試みる
    // ==========================================

    $dh = @mysql_connect($_DB_host, $_DB_user, $_DB_pass);
    if ($dh === false) {
        return 'サーバーに接続できません。';
    }
    
    @mysql_query("SET NAMES 'utf8'");
    
    $result = @mysql_query($sql1);
    if ($result === false) {
        return 'データベースを選択できません。';
    }
    $result = @mysql_query($sql2);
    if ($result === false) {
        return 'テスト用のテーブルを作成できません。';
    }

    $result = @mysql_query($sql3);
    if ($result !== false) {
        $result = @mysql_query($sql4);
        if ($result !== false) {
            $A = @mysql_fetch_array($result);
            if ($A['data'] === $test_data) {
                $retval = "SET NAMES 'utf8' ありで正常に動作します。非公開領域/system/databases/mysql.class.phpを修正する必要はありません。";
            }
        }
    }

    @mysql_query($sql5);
    @mysql_close($dh);
    
    if ($retval === false) {
        $retval = "SET NAMES 'utf8' に関係なく文字化けします。サーバーかデータベースの文字セットがUTF-8になっていない（たぶん，ISO-8859-1になっている）ようです。";
    }
    
    return $retval;
}

function PCHK_checkConnectionStr() {

    return PCHK_createTempTable();
}

// Checks MySQL server's default charset when version >= 4.1 and
// $_CONF['default_charset'] is 'utf-8'

function PCHK_checkDefaultCharset() {
    global  $_CONF, $_DB_host, $_DB_user, $_DB_pass, $_DB_name, $_DB_table_prefix;
    
    $sql1 = "USE {$_DB_name}";
    $sql2 = "SHOW VARIABLES LIKE '%character_set_database%'";

    $dh = @mysql_connect($_DB_host, $_DB_user, $_DB_pass);
    if ($dh === false) {
        return 'サーバーに接続できません。';
    }
    
    $result = @mysql_query($sql1);
    if ($result === false) {
        return 'データベースを選択できません。';
    }
    
    $result = @mysql_query($sql2);
    if ($result === false) {
        $retval = mysql_error();
    } else {
        $A = @mysql_fetch_array($result);
        $retval = $A['Value'];
    }
    
    @mysql_close();
    return $retval;
}

/**
* Displays a diagnostic message
*
* @param $item_name
* @param $item_value
* @param $message
* @param $status - RESULT_OK, RESULT_NG, RESULT_WARNING, RESULT_INFO
*/

function PCHK_printResult($item_name, $item_value, $message, $status, $help_link = '') {

    $class = '';
    switch ($status) {
        case RESULT_OK:
            $class = ' ok';
            break;
		
        case RESULT_NG:
            $class = ' ng';
            break;
		
        case RESULT_WARNING:
            $class = ' warning';
            break;
		
        case RESULT_INFO:
            $class = ' info';
            break;
		
		default:
			break;
    }
    
    $disp  = "<tr><td class=\"col1{$class}\">";
    $disp .= htmlspecialchars($item_name, ENT_QUOTES, PCHK_INTERNAL_ENCODING) . '</td>';
    
    $disp .= "<td class=\"col2{$class}\">";
    if (is_bool($item_value)) {
        $disp .= $item_value == true ? 'On' : 'Off';
    } else {
        if (is_string($item_value) AND empty($item_value)) {
            $item_value = '(empty)';
        }
        $disp .= htmlspecialchars($item_value, ENT_QUOTES, PCHK_INTERNAL_ENCODING) . '</td>';
    }
    
    $disp .= "<td class=\"{$class}\">" . htmlspecialchars($message, ENT_QUOTES, PCHK_INTERNAL_ENCODING) . '</td></tr>' . LB;
    
    if (!empty($help_link)) {
        $disp = str_replace('__LINK__', "<a href=\"{$help_link}\">こちら</a>", $disp);
    }
    
    echo $disp;
}

function PCHK_havePear() {

    // Checks 'include_path' setting
    
    if (!function_exists('ini_get')) {
        return array(RESULT_WARNING, 'ini_get()が無効にされているので，PEARが正しくインストールされているか判定できません。');
    } else {
        $ini_include_path = ini_get('include_path');
    }
    
    // Code below to determine the path separator adopted from lib-common.php
    if (defined('PATH_SEPARATOR')) {
        $separator = PATH_SEPARATOR;
    } else {
        // prior to PHP 4.3.0, we have to guess the correct separator ...
        $separator = ';';
        if (strpos($ini_include_path, $separator) === false) {
            $separator = ':';
        }
    }
    
    $ini_include_paths = explode($separator, $ini_include_path);
    $found_pear = false;
    foreach ($ini_include_paths as $include_path) {
        if (strpos(strtolower($include_path), 'pear') !== false) {
            $found_pear = true;
            break;
        }
    }
    
    if ($found_pear) {
        return array(RESULT_OK, 'PEARは正しくインストールされています。');
    } else {
        return array(RESULT_WARNING, 'PEARは正しくインストールされていないようです。');
    }
}

function PCHK_checkDbExistence() {
    global $_DB_name, $_CONF;

    $result = mysql_query("SHOW DATABASES");
    $dbs = array();
    while ($A = mysql_fetch_array($result)) {
        $dbs[] = $A['Database'];
    }
    @mysql_close($dh);
    
    // データベースは作成されている
    if (in_array($_DB_name, $dbs)) {

        // バージョン4.1以上では，ユニコードがサポートされているので，
        // データベースの文字コードをチェック

        $v = PCHK_getMySQLVersion();
        if ((10000 * $v[0] + 100 * $v[1] + $v[2]) >= 40100
             AND $_CONF['default_charset'] == 'utf-8') {
            $retval = PCHK_checkDefaultCharset();
            
            if (preg_match('/utf[\-]?8/i', $retval)) {
                $status = RESULT_OK;
                $msg = 'データベースは作成されています。データベースのデフォルト文字コードは UTF-8 です。';
            } else {
                $status = RESULT_WARNING;
                $msg  = 'データベースは作成されていますが，データベースのデフォルト文字コードは ';
                $msg .= $retval . ' です。';
                $msg .= 'UTF-8ではないので，文字化けする可能性があります。';
            }
            $msg .= '<br>書込テストの結果：' . PCHK_checkConnectionStr();
        } else {
            $status = RESULT_OK;
            $msg = 'データベースは作成されています。';
        }
    } else {
        $status = RESULT_NG;
        $msg = 'データベースは作成されていません。';
    }
    
    return array($status, $msg);
}

function PCHK_checkEncoding($str, $expected_encoding) {
	$result = strtoupper(mb_detect_encoding($str, 'UTF-8,SJIS,EUC-JP,ASCII', true));
	if (!is_array($expected_encoding)) {
		$expected_encoding = (array) $expected_encoding;
	}
	
	$expected_encoding[] = 'ASCII';
	$expected_encoding = array_unique($expected_encoding);
	$expected_encoding = array_map('strtoupper', $expected_encoding);
	
	return in_array($result, $expected_encoding);
}

/**
* Compatibe functions for PHP 4.2.x or earlier
*/
if (!function_exists('file_get_contents')) {
	function file_get_contents($path) {
		if (($fp = @fopen($path, 'rb')) !== false) {
			$retval = @fread($fp, filesize($path));
			@fclose($fp);
			return $retval;
		} else {
			return false;
		}
	}
}

// ============================================================================
//   MAIN
// ============================================================================

$fatal_error = false;

// ========================================================
//  1. lib-common.phpをチェック
// ========================================================

echo '<h2>1. lib-common.phpの設定</h2>' . LB;
if (@file_exists('../../lib-common.php')) {
    clearstatcache();
    echo '<ul><li>（ヒント）precheck.phpのパスは次の通りです：<br><div class="path">' . realpath(__FILE__) . '</div></li>' . LB;
	echo '<li>lib-common.phpのファイル設置状況：' . OK . '　（lib-common.phpは所定の位置にあります。）</li>' . LB;
    $libcommon = file_get_contents('../../lib-common.php');
	
	// lib-common.phpの文字コードを確認
	if (PCHK_checkEncoding($libcommon, $precheck_lang) === false) {
		echo '<li style="color: red;">lib-common.phpの文字コードが<strong>' . mb_detect_encoding($libcommon) . '</strong>になっています。<strong>' . $precheck_lang . '</strong>で保存し直してください。</li>' . LB;
		$fatal_error = true;
	}
    $libcommon = str_replace(array("\r\n", "\r"), LB, $libcommon);
    if (preg_match("|^[ \t]*require_once[(]? ('.*config\.php')|mi", $libcommon, $match)) {
        $config_path = trim($match[1]);
        $config_path = substr($config_path, 1, -1);   // Removes quotes
        echo '<li>lib-common.php内で，config.phpのパスは次の絶対パスに設定されています。<br>';
        echo '<div class="path">' . $config_path . '</div></li>' . LB;
        echo '<li>config.phpのファイル設置状況：';
        if (file_exists($config_path)) {
            echo OK . '　（config.phpは指定されたパスに存在しています。）</li>' . LB;
        } else {
            $fatal_error = true;
            echo NG . 'config.phpは指定されたパスに存在していません。診断を終了します。</li>' . LB;
            @ob_end_flush();
            exit;
        }
		// config.phpの文字コードを確認
		$temp_config = file_get_contents($config_path);
		if (PCHK_checkEncoding($temp_config, $precheck_lang) === false) {
			echo '<li style="color: red;">config.phpの文字コードが<strong>' . mb_detect_encoding($temp_config) . '</strong>になっています。<strong>' . $precheck_lang . '</strong>で保存し直してください。いったん診断を終了します。</li></ul>' . LB;
			$fatal_error = true;
	        @ob_end_flush();
    	    exit;
		}
		
        echo '</ul>' . LB;
        clearstatcache();
    } else {
        $fatal_error = true;
        echo '<li>' . NG . 'lib-common.php内で config.php を require_once している箇所が見つかりません。診断を終了します。</li></ul>' . LB;
        @ob_end_flush();
        exit;
    }
} else {
    $fatal_error = true;
    echo '<p>' . NG . 'lib-common.phpが見つかりません。診断を終了します。</p>' . LB;
    @ob_end_flush();
    exit;
}

// ========================================================
//  2. ファイルの存在チェック
// ========================================================

echo '<h2>2. ファイルの存在チェック</h2>' . LB;

if ($check_files === true) {
	require_once dirname(__FILE__) . '/check_files.php';
	$result_check_files = CHKF_checkFiles(substr($config_path, 0, strlen($config_path) - strlen('config.php')));
	if (empty($result_check_files)) {
		echo '<p>ファイルはすべてきちんとアップロードされています。</p>' . LB;
	} else {
		echo '<p style="color: red;">ファイルの存在チェックに失敗しました。以下のファイルリストを確認してください。<br>（凡例）[B]=ファイル破損の可能性，[M]=ファイルが見つからない</p>' . LB;
		if (strpos($result_check_files, '[M]') !== false) {
			$fatal_error = true;
		}
		echo $result_check_files;
	}
} else {
	echo '<p>スキップしました。</p>' . LB;
}

// ========================================================
//  3. config.phpの設定をチェック
// ========================================================

require_once $config_path;
echo '<h2>3. config.phpの設定</h2>' . LB
   . '<table>' . LB
   . '<tr>' . LB
   . '<th class="col1">config.phpの設定</th><th class="col2">設定値</th><th>状態</th>' . LB
   . '</tr>';

// $_CONF['path']
if (strcasecmp($_CONF['path'] . 'config.php', $config_path)) {
    $fatal_error = true;
    $msg    = 'lib-common.php内で指定されているパスと一致しません。';
    $status = RESULT_NG;
} else {
    $msg = OK;
    $status = RESULT_OK;
}
PCHK_printResult('$_CONF[\'path\']', $_CONF['path'], $msg, $status);

// $_CONF['path_html']
$libcommon_path = str_replace('\\', '/', realpath('../../lib-common.php'));
if (strcasecmp($libcommon_path, str_replace(array('\\\\', '\\'), '/', $_CONF['path_html'] . 'lib-common.php'))) {
    $fatal_error = true;
    $msg    = '指定されているパスにlib-common.phpはありません。';
    $status = RESULT_NG;
} else {
    $msg = OK;
    $status = RESULT_OK;
}
PCHK_printResult('$_CONF[\'path_html\']', $_CONF['path_html'], $msg, $status);

// $_CONF['site_url']
if ($_CONF['site_url'] == 'http://www.☆ドメイン') {
    $msg    = 'デフォルト値から変更されていません。';
    $status = RESULT_WARNING;
} else if (substr($_CONF['site_url'], -1) == '/') {
    $fatal_error = true;
    $msg = '最後の / をつけてはいけません。';
    $status = RESULT_NG;
} else {
    $msg = OK;
    $status = RESULT_OK;
}
PCHK_printResult('$_CONF[\'site_url\']', $_CONF['site_url'], $msg, $status);

// $_CONF['site_mail']
if ($_CONF['site_mail'] == 'noreply@yourdomain') {
    $msg    = 'デフォルト値から変更されていません。';
    $status = RESULT_WARNING;
} else {
    if (preg_match("/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/i", $_CONF['site_mail'])) {
        $msg = OK;
        $status = RESULT_OK;
    } else {
        $msg ='Eメールのアドレスとしては不自然です。';
        $status = RESULT_WARNING;
    }
}
PCHK_printResult('$_CONF[\'site_mail\']', $_CONF['site_mail'], $msg, $status);

/*
// $_CONF['site_name']
if ($_CONF['site_name'] == 'サイト名') {
    $msg    = 'デフォルト値から変更されていません。';
    $status = RESULT_WARNING;
} else {
    $msg = OK;
    $status = RESULT_OK;
}
PCHK_printResult('$_CONF[\'site_name\']', $_CONF['site_name'], $msg, $status);
*/

/*
// $_CONF['site_slogan']
if ($_CONF['site_slogan'] == 'スローガン') {
    $msg    = 'デフォルト値から変更されていません。';
    $status = RESULT_WARNING;
} else {
    $msg = OK;
    $status = RESULT_OK;
}
PCHK_printResult('$_CONF[\'site_slogan\']', $_CONF['site_slogan'], $msg, $status);
*/

// $_CONF['language']
if ($_CONF['language'] == 'japanese') {
    if ($precheck_lang == 'utf-8') {
        $msg = '「UTF-8でインストールする」を選択したのに，config.phpの設定ではそうなっていません。';
        $status = RESULT_WARNING;
    } else {
        $msg = OK;
        $status = RESULT_OK;
    }
} else if ($_CONF['language'] == 'japanese_utf-8') {
    if ($precheck_lang == 'utf-8') {
        $msg = OK;
        $status = RESULT_OK;
    } else {
        $msg = '「EUC-JPでインストールする」を選択したのに，config.phpの設定ではそうなっていません。';
        $status = RESULT_WARNING;
    }
} else {
    $msg = '日本語以外を設定しています。';
    $status = RESULT_INFO;
}
PCHK_printResult('$_CONF[\'language\']', $_CONF['language'], $msg, $status);

// $_CONF['default_charset']
if (strcasecmp($_CONF['default_charset'], 'utf-8') == 0) {
    if ($precheck_lang == 'utf-8') {
        $msg = OK;
        $status = RESULT_OK;
    } else {
        $msg = '「UTF-8でインストールする」を選択したのに，config.phpの設定ではそうなっていません。';
        $status = RESULT_WARNING;
    }
} else {
    if ($precheck_lang == 'utf-8') {
        $msg = '「EUC-JPでインストールする」を選択したのに，config.phpの設定ではそうなっていません。';
        $status = RESULT_WARNING;
    } else {
        $msg = OK;
        $status = RESULT_OK;
    }
}
PCHK_printResult('$_CONF[\'default_charset\']', $_CONF['default_charset'], $msg, $status);

// $_CONF['locale']
if (PHP_OS == 'WINNT'
     AND (! strcasecmp($_CONF['locale'], 'ja_JP.UTF-8') OR ! strcasecmp($_CONF['locale'], 'ja_JP'))) {
    $msg = 'この値はMicrosoft Windowsでは無効です。"C"に設定することをお勧めします。';
    $status = RESULT_WARNING;
} else {
    $msg = OK;
    $status = RESULT_OK;
}
PCHK_printResult('$_CONF[\'locale\']', $_CONF['locale'], $msg, $status);

// $_CONF['have_pear']
if ($_CONF['have_pear'] === false) {
    $msg = OK;
    $status = RESULT_OK;
} else {
    $msg = 'デフォルト値から変更されています。';
    list ($status, $msg2) = PCHK_havePear();
    $msg .= $msg2;
}
PCHK_printResult('$_CONF[\'have_pear\']', $_CONF['have_pear'], $msg, $status);
// 後で掲示板プラグイン（バージョン2.5系列）をインストールする場合は，<a href="precheck.html#forum">こちらをご覧ください</a>

// 多言語サポートチェック（1.4.1以降）

/*
if (strcasecmp(VERSION, '1.4.1') >= 0) {
    $LanguageFiles = PCHK_getLanguageFiles();
    $Languages     = PCHK_getLanguages();
    
    // $_CONF['language_files']
    if (isset($_CONF['language_files'])) {
        if (isset($_CONF['languages'])) {
            PCHK_printResult('多言語サポート', '', OK, RESULT_OK);
        } else {
            PCHK_printResult('多言語サポート', '', '$_CONF["language_files"]が未定義なので，多言語サポートが有効になりません。', RESULT_NG);
        }
    } else {
        if (isset($_CONF['languages'])) {
            PCHK_printResult('多言語サポート', '', '$_CONF["languages"]が未定義なので，多言語サポートが有効になりません。', RESULT_NG);
        } else {
            PCHK_printResult('多言語サポート', '', '（無効になっています）', RESULT_OK);
        }
    }
}
*/

echo '</table>' . LB;

// ========================================================
//  4. データベースの設定
// ========================================================

echo '<h2>4. データベースの設定</h2>' . LB
   . '<table>' . LB
   . '<tr>' . LB
   . '<th class="col1">項目</th><th class="col2">状態</th>' . LB
   . '</tr>' . LB;

// $_DB_host
if ($_DB_host == 'localhost') {
    $msg = 'デフォルト値です。';
} else {
    $msg = 'デフォルト値から変更されています。';
}
$status = RESULT_INFO;
PCHK_printResult('$_DB_host', $_DB_host, $msg, $status);

// $_DB_name
if ($_DB_name == '☆アカウント') {
    $msg = 'デフォルト値です。';
} else {
    $msg = 'デフォルト値から変更されています。';
}
$status = RESULT_INFO;
PCHK_printResult('$_DB_name', $_DB_name, $msg, $status);

// $_DB_user
if ($_DB_user == '☆アカウント') {
    $msg = 'デフォルト値です。';
    $status = RESULT_WARNING;
} else {
    $msg = 'デフォルト値から変更されています。';
    $status = RESULT_INFO;
}
PCHK_printResult('$_DB_user', $_DB_user, $msg, $status);

// $_DB_pass
if ($_DB_user == '*******') {
    $msg = 'デフォルト値です。';
    $status = RESULT_WARNING;
} else {
    $msg = 'デフォルト値から変更されています。';
    $status = RESULT_INFO;
}
PCHK_printResult('$_DB_pass', '********', $msg, $status);

// データベースの接続チェック
if ($_DB_dbms == 'mysql') {
    $dh = @mysql_connect($_DB_host, $_DB_user, $_DB_pass);
    if ($dh === false) {
        $fatal_error = true;
        PCHK_printResult('サーバーとの接続', '', 'サーバーに接続できません。', RESULT_NG);
    } else {
        $v = PCHK_getMySQLVersion();
        PCHK_printResult(
            'サーバーとの接続', '',
            "サーバーに接続しました。サーバーのバージョンは {$v[0]}.{$v[1]}.{$v[2]} です。", RESULT_OK
       );
        
        // データベースの存在チェック
        
        list ($db_status, $msg) = PCHK_checkDbExistence();
        PCHK_printResult('データベースの構築状態', '', $msg, $db_status);
    }
} else if ($_DB_dbms == 'mssql') {
    $db_status = null;
    echo ('<tr><td colspan="3"><span class="warning">' . NG . 'データベースとしてMicrosoft SQL Serverが使用されているので，このスクリプトでは検証できません。</span></td></tr>');
}

echo '</table><br>' . LB;

if ($db_status == RESULT_NG) {    // Database doesn't exist
    $fatal_error = true;
    $is_utf8 = 0;
    if (10000 * $v[0] + 100 * $v[1] + $v[2] >= 40100) {
        if ($_CONF['default_charset'] == 'utf-8') {
            $db_charset = 'utf-8';
        } else {
            $db_charset = 'ujis';
        }
    } else {
        $db_charset = '';
    }
    
    echo '<form action="' . THIS_SCRIPT . '" method="post">' . LB
       . '<input name="submit" type="submit" value="作成を試みる">' . LB
       . "<input name='host' type='hidden' value='{$_DB_host}'>" . LB
       . "<input name='name' type='hidden' value='{$_DB_name}'>" . LB
       . "<input name='user' type='hidden' value='{$_DB_user}'>" . LB
       . "<input name='pass' type='hidden' value='{$_DB_pass}'>" . LB
       . "<input name='db_charset' type='hidden' value='{$db_charset}'>" . LB
       . "<input name='precheck_lang' type='hidden' value='{$precheck_lang}'>" . LB
       . '</form>' . LB;
} else if ($db_status == RESULT_WARNING) {    // Database exists, but character sets
                                                // don't match.
    
}

// ========================================================
//  5. ディレクトリ・ファイルの書込パーミッションをチェック
// ========================================================

// Checks the paths original to Geeklog

$base_config_path = dirname($config_path) . DIRECTORY_SEPARATOR;
echo '<h2>5. ディレクトリ・ファイルのパーミッション</h2>' . LB
   . '<p>※自動でパーミッション設定をする場合は、<a href="setperm.php">ここをクリックしてください</a>。</p>' . LB
   . '<table>' . LB
   . '<caption>＜非公開領域・Geeklog本体＞</caption>' . LB
   . '<tr>' . LB
   . '<th class="col1">パス</th><th class="col2">パーミッション</th><th>状態</th>' . LB
   . '</tr>' . LB;

// Adds the info of the userconfig plugin here

$functions_userconfig = $_CONF['path'] . '/plugins/userconfig/functions.inc';
if (file_exists($functions_userconfig)) {
	require_once $functions_userconfig;

    if (strcmp($_USERCONFIG['version'], '1.3.0') < 0) {
        $PATHS_TO_BE_CHECKED['private']['optional'][] = 'plugins/userconfig';
        $PATHS_TO_BE_CHECKED['private']['optional'][] = 'plugins/userconfig/userconfig_prepare.php';
        $PATHS_TO_BE_CHECKED['private']['optional'][] = 'plugins/userconfig/userconfig_bak.php';
    } else {    // >= 1.3.0
//      $PATHS_TO_BE_CHECKED['private']['optional'][] = 'plugins/userconfig';
//      $PATHS_TO_BE_CHECKED['private']['optional'][] = 'plugins/userconfig/userconfig_prepare.php';
//      $PATHS_TO_BE_CHECKED['private']['optional'][] = 'plugins/userconfig/userconfig_bak.php';
    }
    
    unset($_USERCONFIG['version']);
}

foreach ($PATHS_TO_BE_CHECKED['private']['original'] as $path) {
    $fatal_error |= PCHK_checkPerm($base_config_path . $path, '<geeklog>/' . $path, 'original');
}

echo '</table><br>' . LB;

echo '<table>' . LB
   . '<caption>＜公開領域・Geeklog本体＞</caption>' . LB
   . '<tr>' . LB
   . '<th class="col1">パス</th><th class="col2">パーミッション</th><th>状態</th>' . LB
   . '</tr>' . LB;

foreach ($PATHS_TO_BE_CHECKED['public']['original'] as $path) {
    $fatal_error |= PCHK_checkPerm($_CONF['path_html'] . $path, '<public_html>/' . $path, 'original');
}

// backend/geeklog.rss
PCHK_checkPerm($_CONF['rdf_file'], '<public_html>/backend/' . basename($_CONF['rdf_file']), 'original');

echo '</table><br>' . LB;

// Checks the paths optional to Geeklog

echo '<table>' . LB
   . '<caption>＜非公開領域・Geeklog（オプションのプラグイン）＞</caption>' . LB
   . '<tr>' . LB
   . '<th class="col1">パス</th><th class="col2">パーミッション</th><th>状態</th>' . LB
   . '</tr>' . LB;

foreach ($PATHS_TO_BE_CHECKED['private']['optional'] as $path) {
    $fatal_error |= PCHK_checkPerm($base_config_path . $path, '<geeklog>/' . $path, 'optional');
}

echo '</table><br>' . LB;

echo '<table>' . LB
   . '<caption>＜公開領域・Geeklog（オプションのプラグイン）＞</caption>' . LB
   . '<tr>' . LB
   . '<th class="col1">パス</th><th class="col2">パーミッション</th><th>状態</th>' . LB
   . '</tr>' . LB;

foreach ($PATHS_TO_BE_CHECKED['public']['optional'] as $path) {
    $fatal_error |= PCHK_checkPerm($_CONF['path_html'] . $path, '<public_html>/' . $path, 'optional');
}

echo '</table><br>' . LB;
echo '（注）上記の「非公開領域・Geeklog（オプションのプラグイン）」，「公開領域・Geeklog（オプションのプラグイン）」については，日本語版のバージョンによってはチェックしているパスが存在していない可能性がありますので，参考情報として見てください。<br>' . LB;

// ========================================================
//  6. phi.iniをチェック
// ========================================================

echo '<h2>6. php.iniの設定</h2>' . LB
   . '<table>' . LB
   . '<tr>' . LB
   . '<th class="col1">php.iniの設定</th><th class="col2">設定値</th><th>状態</th>' . LB
   . '</tr>' . LB;

if (!function_exists('ini_get')) {
    echo '<tr><td class="warning" colspan="3">ini_get()がphp.iniで無効にされているので，診断できません。' . LB;
} else {

    // default_charset
    $default_charset = strtolower(ini_get('default_charset'));
    if (empty($default_charset)) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = "文字化けの原因となるので，default_charset は空にすることをお勧めします。変更する場合は__LINK__をご覧ください。";
        $help_url = HELP_URL . '#default_charset';
    }

    PCHK_printResult('default_charset', $default_charset, $msg, $status, $help_url);

    // mbstring.internal_encoding
    $internal_encoding = $old_mb_internal_encoding;
    if (strcasecmp($precheck_lang, $internal_encoding) == 0) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = "最初に選択したエンコーディング({$precheck_lang})とPHPの内部エンコーディング({$internal_encoding})が一致していません。文字化けする場合には変更した方がよいかもしれません。その際には__LINK__をご覧ください。";
        $help_url = HELP_URL . '#internal_encoding';
    }
    PCHK_printResult('mbstring.internal_encoding', $internal_encoding, $msg, $status, $help_url);

    // mbstring.http_input
    $http_input = ini_get('mbstring.http_input');
    if (strcasecmp($http_input, 'pass') == 0) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = 'PASS 以外を指定すると，思いがけないところでエンコーディング変換が行われて文字化けする可能性があります。AUTOを指定している場合は，PASSに変更し，同時に mbstring.detect_order を明示的に指定することをお勧めします。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#http_input';
    }
    PCHK_printResult('mbstring.http_input', $http_input, $msg, $status, $help_url);

    // mbstring.detect_order
    $detect_order = ini_get('mbstring.detect_order');
    if (strcasecmp($detect_order, 'auto') != 0) {
        $status = RESULT_INFO;
        $msg = '文字化けする場合は，エンコーディングを検出する順序を適宜，変更してください。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#detect_order';
    } else {
        $status = RESULT_WARNING;
        $msg = 'AUTO は文字化けの原因になるので，明示的に指定することをお勧めします。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#detect_order';
    }
    PCHK_printResult('mbstring.detect_order', $detect_order, $msg, $status, $help_url);

    // mbstring.encoding_translation
    $encoding_translation = (bool) ini_get('mbstring.encoding_translation');
    if (empty($encoding_translation) OR $encoding_translation === false) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = 'Onにすると文字化けの原因になるので，Offにすることをお勧めします。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#encoding_translation';
    }
    PCHK_printResult('mbstring.encoding_translation', $encoding_translation, $msg, $status, $help_url);

    // magic_quotes_gpc
    $magic_quotes_gpc = (bool) get_magic_quotes_gpc();
    if ($magic_quotes_gpc === false) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = 'Onにすると文字化けの原因になるので，Offにすることをお勧めします。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#magic_quotes_gpc';
    }
    PCHK_printResult('magic_quotes_gpc', $magic_quotes_gpc, $msg, $status, $help_url);
    
    // magic_quotes_runtime
    $magic_quotes_runtime = (bool) get_magic_quotes_runtime();
    if ($magic_quotes_runtime === false) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = 'Onにすると文字化けの原因になるので，Offにすることをお勧めします。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#magic_quotes_runtime';
    }
    PCHK_printResult('magic_quotes_runtime', $magic_quotes_runtime, $msg, $status, $help_url);
    
    // magic_quotes_sybase
    $magic_quotes_sybase = (bool) ini_get('magic_quotes_sybase');
    if ($magic_quotes_sybase === false) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = 'Onにすると文字化けの原因になるので，Offにすることをお勧めします。変更する場合は__LINK__をご覧ください。';
        $help_url = HELP_URL . '#magic_quotes_sybase';
    }
    PCHK_printResult('magic_quotes_sybase', $magic_quotes_sybase, $msg, $status, $help_url);

    // register_globals
    $register_globals = (bool) ini_get('register_globals');
    if ($register_globals === false) {
        $status = RESULT_OK;
        $msg = OK;
        $help_url = '';
    } else {
        $status = RESULT_WARNING;
        $msg = 'バージョン1.4.0以降，Geeklog本体はregister_globals = offで動作します。セキュリティの観点からもregister_globals = offとし，やむえない場合（一部のプラグインなど）に限って，register_globals=onとすることをお勧めします。対策は__LINK__</a>をご覧ください。';
        $help_url = HELP_URL . '#register_globals';
    }
    PCHK_printResult('register_globals', $register_globals, $msg, $status, $help_url);
    
    echo '</table>' . LB;
    echo '<p>※PHPの他の設定を確認する場合は，<a href="info.php">ここをクリックしてください</a>。</p>' . LB;
}

// Displays if it is possible to go on to installation

if ($fatal_error) {
    // Can't go on to install
    echo '<h2 class="install_ng">インストール不可</h2>'
       . '<p><strong>残念ながら，重大な不備が見つかりました。このままインストールしても正常に動作しないものと思われます。問題点を修正してから，precheck.phpで再びチェックしてみてください。</strong><a href="' . THIS_SCRIPT . '">再チェックする</a></p>' . LB;
} else {
    // Goes on to install

    echo '<h2 class="install_ok">インストール可能</h2>' . LB
       . '<p>大きな問題点は見つかりませんでした。続いて，インストールできます。「インストールのオプション」で，「Geeklogのconfig.phpのパス」には正しい値が設定されているので，再入力する必要はありません。「インストールの種類」だけ，入力してください。</p>' . LB
       . '<form action="' . THIS_SCRIPT . '" method="post">' . LB
       . '<input name="submit" type="submit" value="インストール実行">' . LB
       . "<input name=\"path_config\" type=\"hidden\" value=\"{$config_path}\">" . LB
       . "<input name=\"precheck_lang\" type=\"hidden\" value=\"{$precheck_lang}\">" . LB
       . '</form>' . LB
       . '<div id="footer">' . LB
       . '<a href="http://www.geeklog.jp" title="Geeklog.jp">Geeklog Japanese</a>&nbsp;|&nbsp;<a href="http://wiki.geeklog.jp" title="GeeklogJpWiki">Wiki Document</a>' . LB
       . '</div>' . LB;
    
    // Writes a cookie for a later test
    setcookie(COOKIE_NAME, md5(COOKIE_NAME), 0, $_CONF['cookie_path'], $_CONF['cookiedomain'], $_CONF['cookiesecure']);
}

echo '</body>' . LB
   . '</html>'. LB;

@ob_end_flush();

// Restores mb_internal_encoding()

mb_internal_encoding($old_mb_internal_encoding);

?>
