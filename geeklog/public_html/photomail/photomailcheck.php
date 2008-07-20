<?php

// メールで記事投稿(Ver2.xxxxxxxx)チェック用プログラム
// 読んだメールはサーバから削除していません。
// 使用しないときは、当プログラムをサーバから削除してかまいません。
// 最終更新日 2007/01/30

//log 出力モード設定　0:作成しない,1:ファイルに出力 2:画面にも出力
$logmode =2; 

require_once ('../lib-common.php');

// 設定ファイル読み込み
require_once ($_CONF['path'].'system/custom/custom_photomail_ini.php');

// テンプレートのパス テーマに関わらず共通
$TemplatePath = $_CONF['path_html'].'photomail/layout/';
// テーマ毎に作成したい場合の例
//$TemplatePath = $_CONF['path_layout'].'photomail/';

// コマンド送信
function _sendcmd($sock,$cmd) {
    fputs($sock, $cmd."\r\n");
    $buf = fgets($sock, 512);
    if(substr($buf, 0, 3) == '+OK') {
        return $buf;
    }
    return false;
}

// エラー処理
function error_handler($errno, $errmsg, $file, $line, $vars) {
    
    echo "<br/>";
    echo "エラーNo        ：".$errno."<br/>";
    echo "エラーメッセージ：".$errmsg."<br/>";
    echo "エラーファイル  ：".$file."<br/>";
    echo "エラー発生ライン：".$line."<br/>";
    echo "エラー発生VARS  ：".$vars."<br/>";
    echo "</body> </html> ";

    exit;
}

// ログ出力処理
function OutLog( $logentry ,$logmode)
{
    global $_CONF,$LANG01;

    $retval = '';

    if (!empty($logmode)) {
        if( !empty( $logentry )) {
            $logentry = str_replace( array( '<?', '?>' ), array( '(@', '@)' ),
                                     $logentry );

            $timestamp = strftime( '%c' );
            $logfile = $_CONF['path_log'] . 'photomail.log';

            if (!file_exists($logfile)) {
                echo $logfile ." が存在しません。";
                exit();
            }
            if (!is_writable($logfile)) {
                echo $logfile ." が書込できません。";
                exit();
            }

            set_error_handler('error_handler');
            $file = fopen( $logfile, 'a' );
            restore_error_handler();
            if( empty($file)) {
                $retval .= $LANG01[33] . ' ' . $logfile . ' (' . $timestamp . ')<br/><br/>' . LB;
            } else {
                fputs( $file, "$timestamp - $logentry\n" );
            }

            if ($logmode ==2){
                $retval .="$timestamp - $logentry<br/>" . LB;
            }
        }
    }

    return $retval;
}


//********
//* MAIN *
//********

clearstatcache();//キャッシュクリア

echo "<html>";
echo "<head>";
echo "<title>{$_CONF['site_name']} - An Error Occurred</title>";
echo "<meta http-equiv=Content-Type content=text/html; charset=";
echo $_CONF['default_charset'].">";
echo "</head>";
echo "<body>";
echo "<br/>";

echo OutLog( "----- photomailcheck.php start",$logmode);

$gdary=gd_info();
if ($gdary==false) { 
    echo OutLog( "GDモジュールが使用できません",$logmode);
}
$logmsg= "GDの Versionは".$gdary['GD Version']."です。";
echo OutLog( $logmsg,$logmode);
if  ($gdary['JPG Support']) {
    $logmsg= "GDは JPG をサポートしています。";
} else {
    $logmsg="GDは JPG をサポートしていません。";
}
echo OutLog( $logmsg,$logmode);

if ($this['anonymous']) {
    $logmsg="ゲストユーザの投稿を許可しています。";
    $logmsg.= "ゲストユーザの投稿は、承認が必要です。";
} else {
    $logmsg="ゲストユーザの投稿を許可していません。";
}
echo OutLog( $logmsg,$logmode);

$result = DB_query ("SELECT topic FROM {$_TABLES['topics']} WHERE tid = '$tida'");
$nrows = DB_numRows ($result);
if ($nrows == 1) {
    $A = DB_fetchArray ($result);
    $logmsg="話題用IDの既定値は ".$tida."(".$A['topic'].") です。";
    echo OutLog( $logmsg,$logmode);
} else {
    $logmsg="話題用IDの既定値 ".$tida." は登録されていません。";
    echo OutLog( $logmsg,$logmode);
}


set_error_handler('error_handler');
$sock = fsockopen($this['host'], 110, $err, $errno, 10);
restore_error_handler();

$logmsg="ソケットオープンしました。";
echo OutLog( $logmsg,$logmode);

set_error_handler('error_handler');
$buf = fgets($sock, 512);
restore_error_handler();
if(substr($buf, 0, 3) == '+OK') {
    $logmsg="情報の取得に成功しました。";
    echo OutLog( $logmsg,$logmode);
} else {
    $logmsg="情報の取得に失敗しました。";
    echo OutLog( $logmsg,$logmode);
    die();
}


$buf = _sendcmd($sock, "USER $this[user]");
if(substr($buf, 0, 3) == '+OK') {
    $logmsg="メールサーバ　ユーザーID 送信OK";
    echo OutLog( $logmsg,$logmode);
} else {
    $logmsg="メールサーバ　ユーザーID 送信エラー";
    echo OutLog( $logmsg,$logmode);
    die();
}

$buf = _sendcmd($sock, "PASS $this[pass]");
if(substr($buf, 0, 3) == '+OK') {
    $logmsg="メールサーバ　パスワード 送信OK";
    echo OutLog( $logmsg,$logmode);
} else {
    $logmsg="メールサーバ　パスワード 送信エラー ユーザーIDまたはパスワードを確認してください";
    echo OutLog( $logmsg,$logmode);
    die();
}

// STAT -件数とサイズ取得 +OK 8 1234
$data = _sendcmd($sock, "STAT");
sscanf($data, '+OK %d %d', $num, $size);

// メールがない時
if ($num == "0") {
    $buf = _sendcmd($sock, "QUIT");
    fclose($sock);
    $logmsg= "メールは受信していません。";
    echo OutLog( $logmsg ,$logmode);
// メールがある時
}else{
   // ----- $num件のメールを読み込
   for($i=1;$i<=$num;$i++) {
        $line = _sendcmd($sock, "RETR $i");//RETR n -n番目のメッセージ取得（ヘッダ含）
        while (!ereg("^\.\r\n",$line)) {//EOFの.まで読む
            $line = fgets($sock,512);
            $dat[$i].= $line;
        }
    }
    $buf = _sendcmd($sock, "QUIT"); //バイバイ
    fclose($sock);
    $logmsg= $num."件メールを受信しています。";
    echo OutLog( $logmsg ,$logmode);
}

echo OutLog( "----- photomailcheck.php end",$logmode );

?>
