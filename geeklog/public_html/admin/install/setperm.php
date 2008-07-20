<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.4.1                                                             |
// +---------------------------------------------------------------------------+
// | setperm.php                                                               |
// |                                                                           |
// | Geeklog check pre-installation script                                     |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006-2007 by the following authors:                         |
// |                                                                           |
// | Authors: hiroshi sakuramoto - hiro AT winkey DOT jp                       |
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
* @author   hiroshi sakuramoto <hiro AT winkey DOT jp>
* @version  1.0.0 (2007-04-04)
*
*/

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>Geeklog 自動パーミッション設定</title>
<link rel="stylesheet" type="text/css" href="css/inst.css" title="InstallCSS">
</head>
<body>
<p class="header">
<img src="images/logo.png" alt="Geeklogロゴ">
</p>
<p>
<strong>setperm.php</strong> ～自動パーミッション設定
</p>

<h1>Geeklog自動パーミッション設定</h1>
<p>このスクリプト(setperm.php)は，Geeklogを日本語使用サイトにインストールする際のパーミッションを自動で設定します。</p>

<?php

//error_reporting( E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR );

function ftp_file_exists($ftpstrm, $path) {
    $res = ftp_rawlist($ftpstrm, $path);
    if ( isset( $res[0] ) and strlen( $res[0] ) ) {
        return true;
    } else {
        return false;
    }
}
if (!function_exists('ftp_connect') && function_exists('socket_create')) {
//	echo 'include(./FTP/Socket.php);';
	include('./FTP/Socket.php');
}
if (!function_exists('ftp_chmod')) {
    function ftp_chmod($ftpstrm, $mode, $path) {
        return ftp_site($ftpstrm, sprintf('CHMOD %o %s', $mode, $path));
    }
}

if ( @file_exists( '../../lib-common.php' ) ) {
    clearstatcache();
    $libcommon = file_get_contents( '../../lib-common.php' );
//    $libcommon = str_replace( array( "\r\n", "\r" ), LB, $libcommon );
    if ( preg_match( "/^[ \t]*require_once\( ('.*config\.php')/mi", $libcommon, $match ) ) {
        $config_path = trim( $match[1] );
        $config_path = substr( $config_path, 1, -1 );
        if ( file_exists( $config_path ) ) {
            require_once $config_path;
        }
    }
}

$multi_config = empty($_CONF['path_config']) ? $_CONF['path'] : $_CONF['path_config'];

$checklist = array(
    $_CONF['path']."backups" => "DIR_W",
    $_CONF['path']."data" => "DIR_W",
    $_CONF['path']."logs" => "DIR_W",
    $_CONF['path']."logs/*.log" => "FILE_W",
    $_CONF['path']."plugins/filemgmt/filemgmt.php" => "FILE_W",
    $multi_config."plugins/userconfig" => "DIR_W",
    $multi_config."plugins/userconfig/userconfig_*.php" => "FILE_W",
    $_CONF['path_html']."admin/plugins/themedit/preview.*" => "FILE_W",
    $_CONF['path_html']."backend" => "DIR_W",
    $_CONF['path_html']."backend/*.rss" => "FILE_W",
    $_CONF['path_html']."filemgmt_data" => "DIR_W",
    $_CONF['path_html']."filemgmt_data/*" => "DIR_W",
    $_CONF['path_html']."filemgmt_data/*/tmp" => "DIR_W",
    $_CONF['path_html']."images/articles" => "DIR_W",
    $_CONF['path_html']."images/library" => "DIR_W",
    $_CONF['path_html']."images/library/*" => "DIR_W",
    $_CONF['path_html']."images/topics" => "DIR_W",
    $_CONF['path_html']."images/userphotos" => "DIR_W",
    $_CONF['path_html']."layout/*" => "DIR_W",
    $_CONF['path_html']."layout/*.thtml" => "FILE_W",
    $_CONF['path_html']."layout/*.css" => "FILE_W",
    $_CONF['path_html']."layout/*/*" => "DIR_W",
    $_CONF['path_html']."layout/*/*.thtml" => "FILE_W",
    $_CONF['path_html']."layout/*/*.css" => "FILE_W",
    // ZenCart on Geeklog
    $_CONF['path_html']."shop/admin/includes/configure.php" => "FILE_W_OP",
    $_CONF['path_html']."shop/admin_sub/includes/configure.php" => "FILE_W_OP",
    $_CONF['path_html']."shop/includes/configure.php" => "FILE_W_OP",
    $_CONF['path_html']."shop/cache" => "DIR_W_OP",
    $_CONF['path_html']."shop/images" => "DIR_W_OP",
    $_CONF['path_html']."shop/media" => "DIR_W_OP",
    $_CONF['path_html']."shop/pub" => "DIR_W_OP",
    $_CONF['path_html']."shop/admin/backups" => "DIR_W_OP",
    $_CONF['path_html']."shop/admin/images/graphs" => "DIR_W_OP",
    $_CONF['path_html']."shop/includes/languages/japanese/html_includes" => "DIR_W_OP",
    );

$check_dir_perm = array( 0755, 0757, 0777);
$check_file_perm = array( 0644, 0646, 0666);

$check_mode_w = array( "DIR_W" => false, "FILE_W" => false, "DIR_W_OP" => false, "FILE_W_OP" => false);

function checkFileList( $path ) {
    if ( strpos($path, '*') !== false ) {
        exec("find $path -maxdepth 0", $cmd);
    } else {
        $cmd = $path;
    }
    if ( !is_array($cmd) ) { $cmd = array($cmd); }
    return $cmd;
}

function file2ftpfile( $path, $private, $public ) {
    global $_CONF;
    foreach ( array($_CONF['path'] => $private, $_CONF['path_html'] => $public) as $k => $v ) {
        $prepath = substr($path, 0, strlen($k));
        if ( $k === $prepath ) {
            return $v . substr($path, strlen($k));
        }
    }
    return false;
}

// Checks the write permission for a given path
//
// @param  path          string - real path to be tested
// @return               bool   - true: writable / false: not writable
function checkPerm( $path, $mode=null ) {

    $perm     = fileperms( $path );
    $perm_str = substr( sprintf( '%o', $perm ), -4 );
    clearstatcache();
    if ( !empty($mode) ) { return $perm_str == $mode ? true: false; }
    return is_writable( $path ) ? true : false ;
}

function setPerm( $path, $mode ) {
    if ( !file_exists($path) ) { return false; }
    @chmod($path, $mode);
    return checkPerm($path, $mode);
}

function setPerm_ftp($ftpstrm, $path, $mode, $private, $public ) {
    $ftppath = file2ftpfile($path, $private, $public);
    return ftp_chmod($ftpstrm, $mode, $ftppath);
}

function checkMode( $path, $mode ) {
    global $check_mode_w, $check_dir_perm, $check_file_perm;
    
    if ( !file_exists($path) ) { return false; }
    
    $checkperm = (substr($mode,0,5) == "DIR_W") ? $check_dir_perm : $check_file_perm;
    foreach ( $checkperm as $v ) {
        if ( !setPerm( $path, $v ) ) {
            return false;
        }
        if ( checkPerm($path) ) {
            $check_mode_w[$mode] = $v;
            return true;
        }
    }
    return false;
}

function checkMode_ftp( $ftpstrm, $path, $mode, $private, $public ) {
    global $check_mode_w, $check_dir_perm, $check_file_perm;
    
    if ( !file_exists($path) ) { return false; }
    
    $checkperm = (substr($mode,0,5) == "DIR_W") ? $check_dir_perm : $check_file_perm;
    foreach ( $checkperm as $v ) {
        if ( !setPerm_ftp( $ftpstrm, $path, $v, $private, $public ) ) {
            return false;
        }
        if ( checkPerm($path) ) {
            $check_mode_w[$mode] = $v;
            return true;
        }
    }
    return false;
}

$err = false;
if ( !isset($_POST['ftpid']) ) {
    echo "<h2>1. このスクリプト(setperm.php)からパーミッションを自動で設定</h2>".LB;
    foreach ( $checklist as $k => $v ) {
        $cmd = checkFileList($k);
        foreach ( $cmd as $a ) {
            if ( $check_mode_w[$v] !== false ) {
                if ( !setPerm($a, $check_mode_w[$v]) ) {
                    $err = true;
                    break;
                }
            } else {
                if ( !checkMode($a, $v) ) {
                    $err = true;
                    break;
                }
            }
        }
        if ($err) { break; }
    }
    if ( $err ) {
        echo "<p class='ng'>お使いのサーバ環境では、このスクリプトからのパーミッション設定が許可されておりませんでしたので、設定できませんでした。</p>".LB;
    } else {
        echo "<p>パーミッションの設定が完了しました。</p>".LB;
    }
} else {
    $ftpserver = $_POST['ftpserver'];
    $ftpid = $_POST['ftpid'];
    $ftppasswd = $_POST['passwd'];
    $ftpprivate = $_POST['private'];
    $ftppublic = $_POST['public'];
    
    echo "<h2>1. FTP接続にてパーミッションを自動で設定</h2>".LB;
    
    if ( function_exists('ftp_connect') ) {
        $ftpstrm = ftp_connect($ftpserver);
        if ( $ftpstrm !== false) {
            if ( !empty($ftpid) && !empty($ftppasswd) && ftp_login($ftpstrm, $ftpid, $ftppasswd) ) {
                if ( !empty($ftpprivate) && !empty($ftppublic) ) {
                    if ( strpos($_CONF['path'], $ftpprivate) !== false && strpos($_CONF['path_html'], $ftppublic) !== false ) {
                        $notfilepath = '';
                        foreach ( $checklist as $k => $v ) {
                            $cmd = checkFileList($k);
                            foreach ( $cmd as $a ) {
                                if ( !ftp_file_exists($ftpstrm, file2ftpfile($a, $ftpprivate, $ftppublic)) ) {
                                    if ( substr($v,-2) != 'OP' ) {
                                        $notfilepath .= "<tr><td class='ng'>存在しません</td><td class='ng'>".file2ftpfile($a, $ftpprivate, $ftppublic)."</td></tr>".LB;
                                        $err = true;
                                        break;
                                    } else {
                                        continue;
                                    }
                                }
                                if ( $check_mode_w[$v] !== false ) {
                                    if ( !setPerm_ftp($ftpstrm, $a, $check_mode_w[$v], $ftpprivate, $ftppublic) && substr($v,-2) != 'OP' ) {
                                        $err = true;
                                        break;
                                    }
                                } else {
                                    if ( !checkMode_ftp($ftpstrm, $a, $v, $ftpprivate, $ftppublic) ) {
                                        $err = true;
                                        break;
                                    }
                                }
                            }
                        }
                    } else {
                        $err = true;
                    }
                } else {
                    $err = true;
                }
                if ( $err ) {
                    echo "<p class='warning'>FTPでのパーミッションの設定に失敗しました。このエラーは大抵、FTP情報の「FTP接続でのパス」の間違いですので、再度確認の上、もう一度お試しください。</p>".LB;
                    echo "<p class='ng'>何度試しても駄目なときは申し訳ございませんが、お使いのFTPソフトで手動で設定してください。</p>".LB;
                } else {
                     ftp_close($ftpstrm);
                    echo "<h2>FTPでのパーミッションの設定が完了しました。</h2>".LB;
                }
            } else {
                $err = true;
                echo "<p class='ng'>FTPログインに失敗しました。アカウント情報を再度確認の上、もう一度お試しください。</p>".LB;
            }
        } else {
            $err = true;
            echo "<p class='ng'>FTP接続に失敗しました[".$ftpserver."]。FTP接続サーバ名を変えて再度お試しください。それでも失敗する場合は、お使いのサーバ環境ではこのスクリプトからのFTP接続ができませんので申し訳ございませんが、お使いのFTPソフトで手動で設定ください。</p>".LB;
        }
    } else {
            echo "<p class='ng'>お使いのサーバ環境ではこのスクリプトからのFTP接続ができませんので申し訳ございませんが、お使いのFTPソフトで手動で設定ください。</p>".LB;
    }
}
echo "<p><a href='precheck.php'>ここ</a>をクリックするとGeeklogインストール前チェックに戻ります。</p>".LB;

if ( $err ) {
    if ( function_exists('ftp_connect') ) {
        $servername = empty($_SERVER["HTTP_HOST"]) ? 'localhost' : $_SERVER["HTTP_HOST"];
        $ftpserver = empty($ftpserver) ? gethostbyname($servername) : $ftpserver;
        $ftpid = empty($ftpid) ? '' : $ftpid;
        $ftppasswd = empty($ftppasswd) ? '' : $ftppasswd;
        $ftpprivate = empty($ftpprivate) ? $_CONF['path'] : $ftpprivate;
        $ftppublic = empty($ftppublic) ? $_CONF['path_html'] : $ftppublic;
        echo "<h2>2. ここからFTP接続を行い、パーミッションを自動で設定</h2>".LB;
        echo "<form action='setperm.php' method='post'>".LB;
        echo "<p>FTP接続を行い、パーミッションの設定を試みる場合は以下にFTPアカウントの情報を入力し「自動設定をFTP接続から試みる」を押してください。</p>".LB;
        echo "<table><tr><th>項目</th><th>FTP情報入力</th><th>説明</th></tr>".LB;
        echo "<tr><td>FTP接続サーバ名:</td><td><input type='text' name='ftpserver' size='40' value='$ftpserver' /></td><td>FTP接続サーバの接続先です。通常はこのままで大丈夫です。<br />「FTP接続に失敗しました...」と出る場合はFTP接続サーバ名を入力ください</td></tr>".LB;
        echo "<tr><td>FTPアカウント名:</td><td><input type='text' name='ftpid' size='20' value='$ftpid' /></td><td>サーバへFTP接続するためのアカウント名を入力</td></tr>".LB;
        echo "<tr><td>FTPパスワード:</td><td><input type='passwd' name='passwd' size='20' value='$ftppasswd' /></td><td>サーバへFTP接続するためのパスワードを入力</td></tr>".LB;
        echo "<tr><td>FTP接続での非公開領域までのパス:</td><td><input type='text' name='private' size='40' value='$ftpprivate' /></td><td>サーバへFTP接続した状態での非公開領域までの場所。最後のスラッシュ（/）が必須<br />入力サポートとしてconfig.php内の設定を初回入力済み<br />一般的に先頭からいくつか削除すれば有効です</td></tr>".LB;
        echo "<tr><td>FTP接続での公開領域までのパス:</td><td><input type='text' name='public' size='40' value='$ftppublic' /></td><td>サーバへFTP接続した状態での公開領域までの場所。最後のスラッシュ（/）が必須<br />入力サポートとしてconfig.php内の設定を初回入力済み。<br />一般的に先頭からいくつか削除すれば有効です</td></tr>".LB;
        echo "<tr><td colspan='3'><input type='submit' name='submit' value='自動設定をFTP接続から試みる' /></td></tr>".LB;
        echo "</table></form>".LB;
        if (!empty($notfilepath)) {
            echo "<table><tr><th colspan='2'>ファイル存在エラー詳細情報</th></tr>".LB;
            echo $notfilepath;
            echo "</table>".LB;
        }
    } else {
        echo "<h2>お使いのサーバ環境では、このスクリプトからパーミッションを設定できませんので申し訳ございませんが、お使いのFTPソフトで手動で設定ください。</h2>".LB;
    }
}
?>


<div id="footer">
<a href="http://www.geeklog.jp" title="Geeklog.jp">Geeklog Japanese</a>&nbsp;|&nbsp;<a href="http://wiki.geeklog.jp" title="GeeklogJpWiki">Wiki Document</a>
</div>
</body>
</html>
