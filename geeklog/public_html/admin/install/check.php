<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.4                                                               |
// +---------------------------------------------------------------------------+
// | check.php                                                                 |
// |                                                                           |
// | Geeklog check installation script                                         |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2002-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Dirk Haun        - dirk AT haun-online DOT de                    |
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
// $Id: check.php,v 1.8 2006/01/28 17:48:49 dhaun Exp $

/**
* This script tests the file and directory permissions, thus addressing the
* most common errors / omissions when setting up a new Geeklog site ...
*
* @author   Dirk Haun <dirk AT haun-online DOT de>
*
*/

require_once ('../../lib-common.php');

//@@@@@20070124update----->
//$numTests   = 7;  // total number of tests to perform
$numTests   = 8;  // total number of tests to perform
//@@@@@20070124update<-----
$successful = 0;  // number of successful tests
$failed     = 0;  // number of failed tests
$notTested  = 0;  // number of tests that were skipped (for disabled features)

//@@@@@20070124add ----->
$msg1= '<b>757(または775,777)</b>に設定してください<br>' . LB;
//@@@@@20070124add <-----

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . LB;
echo '<html>' . LB;
echo '<head>' . LB;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8 ">';
echo '<title>Geeklog installation check</title>' . LB;
echo '</head>' . LB;
echo '<body text="#000000" bgcolor="#ffffff">' . LB;
echo '<h2>Geeklogのパーミッションのテストを行ないます</h2>' . LB;

//-----
echo $_CONF['path_log'] . ' ...' . LB;
$errfile = @fopen ($_CONF['path_log'] . 'error.log', 'a');
if ($errfile) fclose ($errfile);
$accfile = @fopen ($_CONF['path_log'] . 'access.log', 'a');
if ($accfile) fclose ($accfile);

if (!$errfile || !$accfile) {
    echo "<br>";
    echo '<font color="#ff0000"> ';
    if (!$errfile) {
        echo '<b>error.log</b> ';
    }
    if (!$errfile && !$accfile) {
        echo 'と ';
    }
    if (!$accfile) {
        echo '<b>access.log</b> ';
    }
    echo 'の書き込み権限に問題があります。';
    echo '</font> ';
    $logPerms = sprintf ("%3o", @fileperms ($_CONF['path_log']) & 0777);
    $errPerms = sprintf ("%3o", @fileperms ($_CONF['path_log'] . 'error.log') & 0777);
    $accPerms = sprintf ("%3o", @fileperms ($_CONF['path_log'] . 'access.log') & 0777);
    echo '<br>';
    if ($errPerms==0) {
        echo '<b>error.log</b>は存在しません。<br>'. LB;
    } else {
        echo '<b>error.log</b>の現在の設定は<b>'.$errPerms.'</b>です。<br>'. LB;
    }
    if ($accPerms==0) {
        echo '<b>access.log</b>は存在しません。<br>' . LB;
    } else {
        echo '<b>access.log</b>の現在の設定は<b>'.$accPerms.'</b>です。<br>' . LB;
    }

    $failed++;
} else {
    echo 'OK <br>' . LB;
    $successful++;
}
echo "<br>";
//-----
if ($_CONF['backend'] > 0) {
    echo 'RSS配信ファイル<br>';

    //@@@@@20070124---->
    $rdfDirname=dirname($_CONF['rdf_file']);
    echo $rdfDirname."...";
    if (is_writable($rdfDirname)) {
        echo 'OK<br>' . LB;
        $successful++;
    } else {
        $rdfPerms = sprintf ("%3o", @fileperms ($rdfDirname) & 0777);
        echo '<br>';
        echo '<font color="#ff0000">書き込むことができません。';
        echo  'ディレクトリが存在することを確認し、 ';
        echo  $msg1;
        echo  '</font>'; 
        echo "現在の設定は<b>$rdfPerms</b>です。<br>" . LB;
        $failed++;
    }
    //@@@@@20070124<----

    echo $_CONF['rdf_file']."...";
    if (!$file = @fopen ($_CONF['rdf_file'], 'w')) {
        echo '<br>';
        echo '<font color="#ff0000">';
        echo '書き込むことができません。';
        echo '</font>';
        $endPerms = sprintf ("%3o", @fileperms (SYND_getFeedPath()) & 0777);
        $rdfPerms = sprintf ("%3o", @fileperms ($_CONF['rdf_file']) & 0777);
        if ($rdfPerms==0) {
            echo "<br>" . LB;
        } else {
            echo "現在の設定は<b>$rdfPerms</b>です。<br>" . LB;
        }
        $failed++;
    } else {
        fclose ($file);
        echo 'OK<br>' . LB;
        $successful++;
    }
} else {
    echo '<p>GeeklogのRSS配信はオフに設定されいています。ファイルはチェクしませんでした。</p>' . LB;
    $notTested++;
}
echo "<br>";

//-----
if ($_CONF['allow_user_photo'] > 0) {
    echo $_CONF['path_images'] . 'userphotos/ ...' . LB;
    if (!$file = @fopen ($_CONF['path_images'] . 'userphotos/test.gif', 'w')) {
        echo '<br>';
        echo '<font color="#ff0000">書き込むことができません。';
        echo  'ディレクトリが存在することを確認し、 ';
        echo  $msg1;
        echo  '</font>'; 
        echo '現在の設定は<b>' . sprintf ("%3o", @fileperms ($_CONF['path_images'] . 'userphotos/') & 0777);
        echo "</b>です。<br>";
        $failed++;
    } else {
        fclose ($file);
        unlink ($_CONF['path_images'] . 'userphotos/test.gif');
        echo 'OK<br>' . LB;
        $successful++;
    }
} else {
    echo '<p>ユーザ写真機能はオフです。 ディレクトリはチェックしませんでした。</p>' . LB;
    $notTested++;
}
echo "<br>";

//-----
if ($_CONF['maximagesperarticle'] > 0) {
    echo $_CONF['path_images'] . 'articles/ ...' . LB;
    if (!$file = @fopen ($_CONF['path_images'] . 'articles/test.gif', 'w')) {
        echo '<br>';
        echo '<font color="#ff0000">書き込むことができません。';
        echo  'ディレクトリが存在することを確認し、 ';
        echo  $msg1;
        echo  '</font>'; 
        echo '現在の設定は <b>' . sprintf ("%3o", @fileperms ($_CONF['path_images'] . 'articles/') & 0777);
        echo "</b>です。<br>";
        $failed++;
    } else {
        fclose ($file);
        unlink ($_CONF['path_images'] . 'articles/test.gif');
        echo 'OK<br>' . LB;
        $successful++;
    }
} else {
    echo '<p>記事に写真を表示する機能を利用しない設定になっています。ディレクトリはチェックしませんでした。</p>' . LB;
    $notTested++;
}
echo "<br>";
//-----
echo  $_CONF['path_images'] . 'topics/ ...' . LB;
if (!$file = @fopen ($_CONF['path_images'] . 'topics/test.gif', 'w')) {
        echo '<br>';
        echo '<font color="#ff0000">書き込むことができません。';
        echo  'ディレクトリが存在することを確認し、 ';
        echo  $msg1;
        echo  '</font>'; 
        echo '現在の設定は <b>' . sprintf ("%3o", @fileperms ($_CONF['path_images'] . 'topics/') & 0777);
        echo "</b>です。<br>";
    $failed++;
} else {
    fclose ($file);
    unlink ($_CONF['path_images'] . 'topics/test.gif');
    echo 'OK<br>' . LB;
    $successful++;
}

/*

if ($_CONF['pdf_enabled'] != 0) {
    echo '<p>Testing <b>pdfs</b> directory ' . $_CONF['path_pdf'] . ' ...<br>' . LB;
    if (!$file = @fopen ($_CONF['path_pdf'] . 'test.pdf', 'w')) {
        echo '<font color="#ff0000">Could not write to <b>' . $_CONF['path_pdf'] . '</b>.</font><br>Please make sure this directory exists and is set to <b>chmod 775</b>.<br>' . LB; 
        echo 'Current permissions for <b>pdfs</b>: ' . sprintf ("%3o", @fileperms ($_CONF['path_pdf']) & 0777);
        $failed++;
    } else {
        fclose ($file);
        unlink ($_CONF['path_pdf'] . 'test.pdf');
        echo '<b>pdfs</b> directory is okay.' . LB;
        $successful++;
    }
} else {
    echo '<p>PDF support is disabled - <b>pdfs</b> directory not tested.' . LB;
    $notTested++;
}

*/

echo "<br>";
//-----
if ($_CONF['allow_mysqldump'] == 1) {
    echo  $_CONF['backup_path'] . ' ...' . LB;
    if (!$file = @fopen ($_CONF['backup_path'] . 'test.txt', 'w')) {
        echo '<br>';
        echo '<font color="#ff0000">書き込むことができません。';
        echo  'ディレクトリが存在することを確認し、 ';
        echo  $msg1;
        echo  '</font>'; 
        echo '現在の設定は <b>' . sprintf ("%3o", @fileperms ($_CONF['backup_path']) & 0777);
        echo "</b>です。<br>";
        $failed++;
    } else {
        fclose ($file);
        unlink ($_CONF['backup_path'] . 'test.txt');
        echo 'OK<br>' . LB;
        $successful++;
    }
} else {
    echo 'データベースバックアップ機能はオフになっています。<br>' . LB;
    $notTested++;
}

echo "<br>";
//-----
echo $_CONF['path_data'] . ' ...' . LB;
if (!$file = @fopen ($_CONF['path_data'] . 'test.txt', 'w')) {
        echo '<br>';
        echo '<font color="#ff0000">書き込むことができません。';
        echo  'ディレクトリが存在することを確認し、 ';
        echo  $msg1;
        echo  '</font>'; 
        echo '現在の設定は <b>' . sprintf ("%3o", @fileperms ($_CONF['path_data'] ) & 0777);
        echo "</b>です。<br>";
    $failed++;
} else {
    fclose ($file);
    unlink ($_CONF['path_data'] . 'test.txt');
    echo 'OK<br>' . LB;
    $successful++;
}

echo "<p><strong>テスト結果：</strong> $numTests件中" . ($numTests - $notTested) . "件のテストが実行されました。";
if ($failed > 0) {
    echo "<font color=\"#ff0000\">$failed 件の問題があります</font>。</p>" . LB;
} else {
}

if ($failed > 0) {
    echo '<p><strong>問題のあるところを修正して再度テストしてください</strong></p>';
    echo '<p>環境によっては、757または775設定で書き込みができない場合があります。その場合は777に設定してください。</p>';
} else {
    echo '<p><strong>おめでとう！ このGeeklogサイトのパーミッションは正しく設定されています。</strong></p>';

}

echo '</body>' . LB;
echo '</html>' . LB;

?>
