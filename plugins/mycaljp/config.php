<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Site Calendar Plugin 'mycaljp' version 2.0.1                      |
// | Only Supported with Geeklog 1.4.1 and new Search Class                    |
// +---------------------------------------------------------------------------+
// | config.php                                                                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2007 by the following authors:                         |
// | Geeklog Author:       Tony Bibbs   - tony@tonybibbs.com                   |
// | mycal Block Author:   Blaine Lang  - geeklog@langfamily.ca                |
// | mycaljp Plugin Author: Yoshinori Tahara - dengen                          |
// | Original PHP Calendar by Scott Richardson - srichardson@scanonline.com    |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), 'config.php') !== false) {
    die('This file can not be used on its own.');
}

//global $_DB_table_prefix, $_TABLES;

// set Plugin Table Prefix the Same as Geeklogs
//$_MYCALJP_table_prefix = $_DB_table_prefix;

// Add to $_TABLES array the tables your plugin uses
//$_TABLES['mycaljp'] = $_DB_table_prefix . 'mycaljp';


$_MYCALJP2_CONF = array();

// Plugin info

$_MYCALJP2_CONF['pi_version'] = '2.0.7';  // Plugin Version
$_MYCALJP2_CONF['gl_version'] = '1.4.1';  // GL Version plugin for
$_MYCALJP2_CONF['pi_url']     = 'http://www.trybase.com/~dengen/log/';    // Plugin Homepage


if ( file_exists( $_CONF['path_data'] . 'mycaljp_conf.php' ) ) {
    require( $_CONF['path_data'] . 'mycaljp_conf.php' );
} else {
    MYCALJP_initConfig();
    MYCALJP_writeConfig();
}


function MYCALJP_writeConfig () 
{
    global $_CONF, $_MYCALJP2_CONF;

    $A= array();
    $A = $_MYCALJP2_CONF;
    unset($A['pi_version']);
    unset($A['gl_version']);
    unset($A['pi_url']);
    unset($A['_glsectoken']);
    $str = "\$_MYCALJP2_CONF_DATA = " . var_export($A,true) . ";\n";
    
    $fname = $_CONF['path_data'] . 'mycaljp_conf.php';
    $fp = @fopen( $fname, 'w' );
    if ( $fp ) {
//      $str = mb_convert_encoding( $str, strtoupper( $_CONF['default_charset'] ) ) ; //内部エンコードから$_CONF['default_charset']に変換
        $str = "<?php\n" . $str . "\n" . '$_MYCALJP2_CONF = array_merge( $_MYCALJP2_CONF, $_MYCALJP2_CONF_DATA );' . "\n?" . ">";
        $len = strlen( $str );
        @flock( $fp, LOCK_EX );
        @fwrite( $fp, $str, $len );
        @flock( $fp, LOCK_UN );
        @fclose( $fp );
        return true;
    } else {
        COM_errorLog( "Cannot open $fname for writing.", 1 );
    }
}

function MYCALJP_initConfig() {

    global $_CONF, $_MYCALJP2_CONF, $LANG_MYCALJP;

    /*
     * サポートするコンテンツの設定
     * ----------------------------
     */

    $_MYCALJP2_CONF['support'] = array(
        'stories',          //記事
        'comments',         //コメント
        'calendar',         //イベントカレンダ
        'calendarjp',       //イベントカレンダ
        'staticpages',      //静的ページ
        'forum',            //掲示板
        'filemgmt',         //ダウンロード
        'links',            //リンク
        'wkyevecal'         //wkyevecal 事前連絡メール付きカレンダ
    );
    
    /*
     * チェックするコンテンツの設定
     * ----------------------------
     */

    $_MYCALJP2_CONF['contents'] = $_MYCALJP2_CONF['support'];

    /*
     * 土・日・休日の色分け表示の設定
     * ------------------------------
     *   true  : 色分けする (default)
     *   false : 色分けしない
     */

    $_MYCALJP2_CONF['showholiday'] = true;

    /*
     * 日本の休日を調べるかどうかの設定
     * --------------------------------
     *   true  : 調べる (default)
     *   false : 調べない
     */

    $_MYCALJP2_CONF['checkjpholiday'] = true;

    /*
     * タイトル(年・月)の設定
     * ----------------------
     * "m"  月．数字。先頭にゼロをつける．  (01 から 12)
     * "n"  月．数字。先頭にゼロをつけない．(1 から 12)
     * "F"  月．フルスペルの文字．          (January から December)
     * "M"  月．3 文字形式．                (Jan から Dec)
     * "Y"  年．4 桁の数字．                (例: 1999または2003)
     * "y"  年．2 桁の数字．                (例: 99 または 03)
     */

    if ( ($_CONF['language'] == 'japanese')
      || ($_CONF['language'] == 'japanese_utf-8') ) {

        $_MYCALJP2_CONF['headertitleyear']  = "Y年";
        $_MYCALJP2_CONF['headertitlemonth'] = "m月";

    } else {

        $_MYCALJP2_CONF['headertitleyear']   = "Y";
        $_MYCALJP2_CONF['headertitlemonth']  = "F";

    }
    
    /*
     * タイトル(年・月)の表示順序の設定
     * ----------------------
     *   true  : 年 月
     *   false : 月 年
     */

    if ( ($_CONF['language'] == 'japanese')
      || ($_CONF['language'] == 'japanese_utf-8') ) {

        $_MYCALJP2_CONF['titleorder'] = true;

    } else {

        $_MYCALJP2_CONF['titleorder'] = false;

    }

    /*
     * 曜日の表示文字列の設定
     * ----------------------------
     */
    $_MYCALJP2_CONF['sunday']    = $LANG_MYCALJP['sunday'];
    $_MYCALJP2_CONF['monday']    = $LANG_MYCALJP['monday'];
    $_MYCALJP2_CONF['tuesday']   = $LANG_MYCALJP['tuesday'];
    $_MYCALJP2_CONF['wednesday'] = $LANG_MYCALJP['wednesday'];
    $_MYCALJP2_CONF['thursday']  = $LANG_MYCALJP['thursday'];
    $_MYCALJP2_CONF['friday']    = $LANG_MYCALJP['friday'];
    $_MYCALJP2_CONF['saturday']  = $LANG_MYCALJP['saturday'];

    /*
     * 日付クリック後の検索結果表示において、右サイドバーを表示するかどうかの設定
     * --------------------------------------------------------------------------
     *   true  : 表示する (default)
     *   false : 表示しない
     */

    $_MYCALJP2_CONF['enablesrblocks'] = true;

    /*
     * 日付クリック後の検索結果表示において、記事の導入部(イントロ)を表示するかどうかの設定
     * ------------------------------------------------------------------------------------
     *   true  : 表示する (default)
     *   false : 表示しない
     */

    $_MYCALJP2_CONF['showstoriesintro'] = true;
    
    
    /*
     * 曜日の表示文字列の設定
     * ----------------------------
     */

    $_MYCALJP2_CONF['template'] = 'default';
    
    $_MYCALJP2_CONF['themes'] = array();
}

?>
