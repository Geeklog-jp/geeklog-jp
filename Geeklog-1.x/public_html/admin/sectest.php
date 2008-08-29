<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.5                                                               |
// +---------------------------------------------------------------------------+
// | sectest.php                                                               |
// |                                                                           |
// | Does a quick security check of the Geeklog install                        |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2002-2007 by the following authors:                         |
// |                                                                           |
// | Authors: Dirk Haun            - dirk AT haun-online DOT de                |
// |          Jeffrey Schoolcraft  - dream AT dr3amscap3 DOT com               |
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
// $Id: sectest.php,v 1.13 2007/12/09 18:05:39 dhaun Exp $

require_once '../lib-common.php';
require_once 'auth.inc.php';

if (!SEC_inGroup ('Root')) {
    $display .= COM_startBlock ($MESSAGE[30], '',
                                COM_getBlockTemplate ('_msg_block', 'header'));
    $display .= $MESSAGE[46];
    $display .= COM_endBlock (COM_getBlockTemplate ('_msg_block', 'footer'));
    $display .= COM_siteFooter ();
    COM_accessLog ("User {$_USER['username']} tried to illegally access the security check.");
    echo $display;
    exit;
}

// ugh, global variable ...
$failed_tests = 0;

/**
* Send an HTTP HEAD request for the given URL
*
* @param    string  $url        URL to request
* @param    string  $errmsg     error message, if any (on return)
* @return   int                 HTTP response code or 777 on error
*
*/
function doHeadRequest ($url, &$errmsg)
{
    require_once ('HTTP/Request.php');

    $req = new HTTP_Request ($url);
    $req->setMethod (HTTP_REQUEST_METHOD_HEAD);
    $req->addHeader ('User-Agent', 'Geeklog/' . VERSION);
    $response = $req->sendRequest ();
    if (PEAR::isError ($response)) {
        $errmsg = $response->getMessage();
        return 777;
    } else {
        return $req->getResponseCode ();
    }
}

/**
* Determine the site's base URL to check
*
* @return   string      site URL or empty string (= nothing to check)
*
*/
function urlToCheck()
{
    global $_CONF;

    $url = '';
    if ($_CONF['path'] == $_CONF['path_html']) {
        // not good ...
        $url = $_CONF['site_url'];
    } else if (substr ($_CONF['path'], 0, strlen ($_CONF['path_html'])) == $_CONF['path_html']) {
        // "geeklog" dir in the document root
        $rest = substr ($_CONF['path'], -(strlen ($_CONF['path']) - strlen ($_CONF['path_html'])));
        $url = $_CONF['site_url'] . '/' . $rest;
    } else {
        // check for sites like www.example.com/geeklog
        $u = $_CONF['site_url'];
        if (substr ($u, -1) == '/') {
            $u = substr ($u, 0, -1);
        }
        $pos = strpos ($u, ':');
        if ($pos !== false) {
            $u2 = substr ($u, $pos + 3);
        } else {
            $u2 = $u;
        }
        $p = explode ('/', $u2);
        if (count ($p) > 1) {
            $cut = strlen ($p[count ($p) - 1]) + 1;
            $url = substr ($u, 0, -$cut) . '/';
        }
    }

    return $url;
}

/**
* Give an interpretation of the test result
*
* @param    int     $retcode    HTTP response code of the test
* @param    string  $msg        file or directory that was checked
* @return   string              text explaining the result of the test
*
*/
function interpretResult ($retcode, $msg)
{
    global $failed_tests, $LANG_SECTEST;

    $retval = '';

    if ($retcode == 200) {
        $retval = $LANG_SECTEST[1] . '<strong>' . $msg . '</strong>' . $LANG_SECTEST[2] . '<br' . XHTML . '><em>' . $LANG_SECTEST[3] . '</em>';
        $failed_tests++;
    } elseif (($retcode == 401) || ($retcode == 403) || ($retcode == 404)) {
        $retval = $LANG_SECTEST[4] . $msg . $LANG_SECTEST[5];
    } else if (is_numeric ($retcode)) {
        $retval = $LANG_SECTEST[6] . $retcode . $LANG_SECTEST[7] . $msg . $LANG_SECTEST[8];
        $failed_tests++;
    } else {
        $retval = $retcode;
    }

    return $retval;
}

/**
* Create a temporary file
*
* @param    string  $file   full path of the file to create
* @return   boolean         true: success; false: file creation failed
*
*/
function makeTempfile ($file)
{
    $retval = false;

    $tempfile = @fopen ($file, 'w');
    if ($tempfile) {
        $retval = true;
        fclose ($tempfile);
    }

    return $retval;
}

/**
* Perform a test
*
* @param    string  $baseurl        the site's base URL
* @param    string  $urltocheck     relative URL to check
* @param    string  $what           explanatory text: what is being checked
* @return   string                  test result as a list item
*
*/
function doTest ($baseurl, $urltocheck, $what)
{
    global $failed_tests;

    $retval = '';

    $retval .= '<li>';
    $retcode = doHeadRequest ($baseurl . $urltocheck, $errmsg);
    if ($retcode == 777) {
        $retval .= $errmsg;
        $failed_tests++;
    } else {
        $retval .= interpretResult ($retcode, $what);
    }
    $retval .= '</li>' . LB;

    return $retval;
}

/**
* Check for the existence of the install directory
*
* @return   string      text explaining the result of the test
*
* @note This test used to be part of the "Get Bent" block in lib-custom.php
*
*/
function checkInstallDir ()
{
    global $_CONF, $failed_tests, $LANG_SECTEST;

    $retval = '';

    // we don't have the path to the admin directory, so try to figure it out
    // from $_CONF['site_admin_url']
    $adminurl = $_CONF['site_admin_url'];
    if (strrpos ($adminurl, '/') == strlen ($adminurl)) {
        $adminurl = substr ($adminurl, 0, -1);
    }
    $pos = strrpos ($adminurl, '/');
    if ($pos === false) {
        // only guessing ...
        $installdir = $_CONF['path_html'] . 'admin/install';
    } else {
        $installdir = $_CONF['path_html'] . substr ($adminurl, $pos + 1)
                    . '/install';
    }

    if (is_dir ($installdir)) {
        $retval .= '<li>' . $LANG_SECTEST[9] . '<b>' . $installdir . '</b>' . $LANG_SECTEST[10];
        $retval .= $LANG_SECTEST[11] . '</li>';
        $failed_tests++;
    } else {
        $retval .= '<li>' . $LANG_SECTEST[12] . '</li>';
    }

    return $retval;
}

/**
* Check for accounts that still use the default password
*
* @return   string      text explaining the result of the test
*
* @note If one of our users is also using "password" as their password, this
*       test will also detect that, as it checks all accounts.
*
*/
function checkDefaultPassword ()
{
    global $_TABLES, $failed_tests, $LANG_SECTEST, $LANG_DIRECTION;

    $retval = '';

    // check to see if any account still has 'password' as its password.
    $pwdRoot = 0;
    $pwdUser = 0;
    $result = DB_query("SELECT uid FROM {$_TABLES['users']} WHERE passwd='" . SEC_encryptPassword('password') . "'");
    $numPwd = DB_numRows($result);
    if ($numPwd > 0) {
        for ($i = 0; $i < $numPwd; $i++) {
            list($uid) = DB_fetchArray($result);
            if (SEC_inGroup('Root', $uid)) {
                $pwdRoot++;
            } else {
                $pwdUser++;
            }
        }
    }
    if ($pwdRoot > 0) {
        $retval .= '<li>' . $LANG_SECTEST[13] . $pwdRoot . $LANG_SECTEST[14] . '</li>';
        $failed_tests++;
    } else {
        $retval .= '<li>' . $LANG_SECTEST[15] . '</li>';
    }

    return $retval;
}

// MAIN
$display = COM_siteHeader ('menu', $LANG_SECTEST[16]);
$display .= '<div dir="';
$display .= empty($LANG_DIRECTION) ? 'ltr' : $LANG_DIRECTION;
$display .= '">' . LB;
$display .= COM_startBlock ($LANG_SECTEST[17]);

$url = urlToCheck ();
if (!empty ($url)) {

    $display .= '<ol>';

    if (strpos ($_SERVER['PHP_SELF'], 'public_html') !== false) {
        $display .= '<li>' . $LANG_SECTEST[18]
            . $LANG_SECTEST[19]
            . COM_createLink($LANG_SECTEST[20], "../docs/install.html#public_html")
            . $LANG_SECTEST[21] . '</li>';
        $failed_tests++;
    }

    $display .= checkInstallDir ();

    $urls = array
        (
        array ('db-config.php',                     'db-config.php'),
        array ('logs/error.log',                    $LANG_SECTEST[22]),
        array ('plugins/staticpages/functions.inc', $LANG_SECTEST[23]),
        array ('system/lib-security.php',           $LANG_SECTEST[24])
        );

    foreach ($urls as $tocheck) {
        $display .= doTest ($url, $tocheck[0], $tocheck[1]);
    }

    // Note: We're not testing the 'sql' and 'language' directories.

    if (($_CONF['allow_mysqldump'] == 1) && ($_DB_dbms == 'mysql')) {
        if (makeTempfile ($_CONF['backup_path'] . 'test.txt')) {
            $display .= doTest ($url, 'backups/test.txt', $LANG_SECTEST[25]);
            @unlink ($_CONF['backup_path'] . 'test.txt');
        } else {
            $display .= '<li>' . $LANG_SECTEST[26] . '</li>';
        }
    }

    if (makeTempfile ($_CONF['path_data'] . 'test.txt')) {
        $display .= doTest ($url, 'data/test.txt', $LANG_SECTEST[27]);
        @unlink ($_CONF['path_data'] . 'test.txt');
    } else {
        $display .= '<li>' . $LANG_SECTEST[28] . '</li>';
    }

    $display .= checkDefaultPassword ();

    $display .= '</ol>';

} else {

    $resultInstallDirCheck = checkInstallDir ();
    $resultPasswordCheck = checkDefaultPassword ();

    if ($failed_tests == 0) {
        $display .= '<p>' . $LANG_SECTEST[29] . '</p>';
    } else {
        $display .= '<ol>';
        $display .= $resultInstallDirCheck . LB . $resultPasswordCheck;
        $display .= '</ol>';
    }

}

if ($failed_tests > 0) {
    $display .= '<p class="warningsmall"><strong>' . $LANG_SECTEST[30] . '</strong></p>';

    DB_save ($_TABLES['vars'], 'name,value', "'security_check','0'");
} else {
    $display .= '<p>' . $LANG_SECTEST[31] . '</p>';

    DB_save ($_TABLES['vars'], 'name,value', "'security_check','1'");
}

if (empty ($LANG_DIRECTION)) {
    $versioncheck = '<strong>' . $LANG01[107] . '</strong>';
} else {
    $versioncheck = '<strong dir="' . $LANG_DIRECTION . '">' . $LANG01[107]
                  . '</strong>';
}

$display .= '<p>' . $LANG_SECTEST[32]
    . COM_createLink('geeklog-announce', 'http://lists.geeklog.net/mailman/listinfo/geeklog-announce')
    . $LANG_SECTEST[33] . $versioncheck
    . $LANG_SECTEST[34] . '</p>';

$display .= COM_endBlock ();
$display .= '</div>' . LB;
$display .= COM_siteFooter ();

echo $display;

?>
