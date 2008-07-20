<?php

// +---------------------------------------------------------------------------+
// | This php for Geeklog ver 1.4                                              |
// +---------------------------------------------------------------------------+
// | メールで記事投稿   custom_photomail.php   Ver2.20070130                   |
// +---------------------------------------------------------------------------+
// | gl_photomail.php      ver0.13                                             |
// | Geeklogにて、携帯からPhotoGalleryに追加するパッチ                         |
// |                                                                           |
// | Copyright (C) 2005 by the following authors:                              |
// |                                                                           |
// | Authors: Y.Nakata        - http://ibd.vonakata.com/                       |
// |                                                                           |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | 参考サイト http://xx.nakahara21.net/                                      |
// | 参考記事   http://xx.nakahara21.net/item_133.html                         |
// |    上のNP_HeelloWorld.phpを一部流用しています。                           |
// |                                                                           |
// +---------------------------------------------------------------------------+
// | をベースに改造しています。                                                |
// | 2005/03/29 modify by TSUCHITANI,Kazuko tsuchi AT geeklog DOT jp           |
// +---------------------------------------------------------------------------+
// | 変更履歴  Ver 2.20070130～                                                |
// |           以前の変更履歴については public_html/photomail/docs/history1    |
// | 2007.01.30 ファイル構成変更、エラー処理変更など                           |
// | 2007.03.12 テンプレートのパス訂正                                         |
// +---------------------------------------------------------------------------+
// | 最新ソースの配布場所　http://www.geeklog.JP/                              |
// +---------------------------------------------------------------------------+
// | ファイル構成：                                                            |
// |   public_html/photomail/photomail.php    (呼び出し用プログラムサンプル）  |
// |   public_html/photomail/photomailimg.php (自動実行用プログラムサンプル）  |
// |   public_html/photomail/photomailimg.php (チェック用プログラム）          |
// |   public_html/photomail/templates/photo_thumb_no.thtml                    |
// |        (サムネイルを使用しない場合のテンプレート)                         |
// |   public_html/photomail/templates/photomail/photo_thumb_yes.thtml         |
// |        (サムネイルを使用する場合のテンプレート)                           |
// |   private/system/custom/custom_photomail.php                              |
// |   private/system/custom/custom_photomail_ini.php                          |
// |   private/logs/photomail.log                                              |
// |        ログファイル出力する時は書込可能にしてください                     |
// |                                                                           |
// +---------------------------------------------------------------------------+
// | 設置：(1)設定ファイル(custom_photomail_ini.php)を編集する。               |
// |       (2)ファイルをアップロードする。                                     |
// |  ○呼び出し用プログラム(photomail.php)を使わずにindex.phpで実行する時は   |
// |    index.php の                                                           |
// |    require_once ($_CONF['path_system'] . 'lib-story.php');の後に          |
// |   下記のコーディングを追加します                                          |
// |    require ($_CONF['path'].'system/custom/custom_photomail.php');         |
// |  ○ブロックに登録して誰かがサイトにアクセスした時に実行する方法           |
// |    ノーマルブロックのコンテンツに下記を記述する                           |
// |    <img src="photomail/photomailimg.php" width="1" height="1" alt="" />   |
// |    静的ページ、テンプレートで実行する場合も同様                           |
// |                                                                           |
// | 使い方：(1) メールホスト宛に設定登録したメールアドレスでメールを送る。    |
// | 注:メーラーに依存しますが、ほとんどの場合タイトルは全角１６文字までです。 |
// | 注:設定ファイルでユーザー名に日本語を使用する場合は、                     |
// |    設定ファイルは、使用する文字コード(UTFまたはEUC)で書き込みしてください |
// | 注:記事を削除しても画像は削除されませんので、別途削除してください。       |
// | 注:画像ファイルのエンコードはBASE64のみ処理をします。                     |
// +---------------------------------------------------------------------------+
//log 出力モード設定　0:作成しない,1:ファイルに出力 2:画面にも出力
$logmode =0; 

// 設定ファイル読み込み
require_once ($_CONF['path'].'system/custom/custom_photomail_ini.php');

// テンプレートのパス テーマに関わらず共通
$TemplatePath = $_CONF['path_html'].'photomail/templates/';
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

// ヘッダと本文を分割する
function mime_split($data) {
    $part = split("\r\n\r\n", $data, 2);
    $part['1'] = ereg_replace("\r\n[\t ]+", " ", $part['1']);
    return $part;
}

// メールアドレスを抽出する
function addr_search($addr) {
    if (eregi("[-!#$%&\'*+\\./0-9A-Z^_`a-z{|}~]+@[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+", $addr, $fromreg)) {
        return $fromreg['0'];
    } else {
        return false;
    }
}

// 文字コードコンバートauto→utf-8 or EUC
function convert($str) {
    global $_CONF;
    if (function_exists('mb_convert_encoding')) {
        if (strpos($_CONF['language'],"utf-8")) {
             return mb_convert_encoding($str, "utf-8", "auto");
        } else {
             return mb_convert_encoding($str, "EUC-JP", "auto");
        }
    } elseif (function_exists('JcodeConvert')) {
        return JcodeConvert($str, 0, 1);
    }
    return true;
}

// parseToken
function parseToken($line,$keyword) {
    $words = explode($keyword,$line);
    $words = explode('=',$words['1']);
    $word = explode('&',$words['1']); 
    return $word['0'];
}

// サムネイル作成 
function thumb_create($src, $W, $H, $thumb_dir="./",$tmp_dir){
    // 画像の幅と高さとタイプを取得
    $size = GetImageSize($src);
    switch ($size['2']) {
        case 1 : //gif
             return false;
             break;
        case 2 : //jpg
             $im_in = @ImageCreateFromJPEG($src);
             break;
        case 3 : //png
             $im_in = ImageCreateFromPNG($src);
             break;
    }
    if (!$im_in) die("GDをサポートしていないか、ソースが見つかりません<br>phpinfo()でGDオプションを確認してください");
    // リサイズ
    if ($size['0'] > $W || $size['1'] > $H) {
        $key_w = $W / $size['0'];
        $key_h = $H / $size['1'];
        ($key_w < $key_h) ? $keys = $key_w : $keys = $key_h;
        $out_w = $size['0'] * $keys;
        $out_h = $size['1'] * $keys;
    } else {
        $out_w = $size['0'];
        $out_h = $size['1'];
    }

    // 出力画像（サムネイル）のイメージを作成し、元画像をコピーします。(GD2.0用)
    $im_out = ImageCreateTrueColor($out_w, $out_h);
    $resize = ImageCopyResampled($im_out, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size['0'], $size['1']);

    // サムネイル画像をブラウザに出力、保存
    $filename = substr($src, strrpos($src,"/")+1);
    $filename = substr($filename, 0, strrpos($filename,"."));
    $thum_filename = $filename . "-small.jpg";
    touch($thumb_dir.$thum_filename);
    ImageJPEG($im_out, $thumb_dir.$thum_filename);  //jpgサムネイル作成
    // 出力画像のイメージを作成し、元画像をコピーします。(GD2.0用)
    if (empty($this['W2'])) {
       $W2=640;
       $H2=640;
    } else {
       $W2=$this['W2'];
       $H2=$this['H2'];
    }
    // リンク先のサイズが設定値より大きい時リンク先も縮小する<-----
    if ($size['0'] > $W2 || $size['1'] > $H2) {
        $rt = rename($tmp_dir.$filename.".jpg",$tmp_dir.$filename."-bak.jpg");
        if (!$rt) {
            echo "rename err!";
        }

        $key_w = $W2 / $size['0'];
        $key_h = $H2 / $size['1'];
        ($key_w < $key_h) ? $keys = $key_w : $keys = $key_h;
        $out_w = $size['0'] * $keys;
        $out_h = $size['1'] * $keys;
        $im_out2 = ImageCreateTrueColor($out_w, $out_h);
        $resize = ImageCopyResampled($im_out2, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size['0'], $size['1']);

        touch($tmp_dir.$filename.".jpg");
        ImageJPEG($im_out2, $tmp_dir.$filename.".jpg"); 

        ImageDestroy($im_out2);
        $rt=unlink($tmp_dir.$filename."-bak.jpg");
        if (!$rt) {
            echo "delete err!";
        }

   }
    
    // 作成したイメージを破棄
    ImageDestroy($im_in);
    ImageDestroy($im_out);

    return $thumb_dir.$thum_filename;

}

// 画像本文編集
function edit_photo ($templateUrl,$template,$f)
{

    $logmsg= $templateUrl.$template." テンプレートA";
    echo OutLog( $logmsg ,$logmode);

    $rt="";
    if (file_exists($templateUrl.$template)) {

    $logmsg= $templateUrl.$template." テンプレートｂ";
    echo OutLog( $logmsg ,$logmode);

        $block = new Template( $templateUrl );
        $block->set_file( 'block', $template );
        $block->set_var( 'tmp_url', $f['tmp_url'] );
        $block->set_var( 'thumb_url', $f['thumb_url'] );
        $block->set_var( 'width',$f['width'] );
        $block->set_var( 'height', $f['height'] );
        $block->set_var( 'filename', $f['filename'] );
        $block->parse( 'blockHTML', 'block' );
        $rt .= $block->finish( $block->get_var( 'blockHTML' ));
    }
    return $rt;
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

// ********
// * MAIN *
// ********
clearstatcache();//キャッシュクリア
echo "<html>";
echo "<head>";
echo "<title>{$_CONF['site_name']} - An Error Occurred</title>";
echo "<meta http-equiv=Content-Type content=text/html; charset=";
echo $_CONF['default_charset'].">";
echo "</head>";
echo "<body>";
echo "<br/>";

echo OutLog( "----- custom_photomail start",$logmode);

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

//STAT -件数とサイズ取得 +OK 8 1234
$data = _sendcmd($sock, "STAT");
sscanf($data, '+OK %d %d', $num, $size);

//メールがない時
if ($num == "0") {
    $buf = _sendcmd($sock, "QUIT");
    fclose($sock);
    $logmsg= "メールは受信していません。";
    echo OutLog( $logmsg ,$logmode);

// メールがある時
}else{
   // ----- $num件のメールを読み込んだ後削除する
   for($i=1;$i<=$num;$i++) {
        $line = _sendcmd($sock, "RETR $i");//RETR n -n番目のメッセージ取得（ヘッダ含）
        while (!ereg("^\.\r\n",$line)) {//EOFの.まで読む
            $line = fgets($sock,512);
            $dat[$i].= $line;
        }

        $data = _sendcmd($sock, "DELE $i");//DELE n n番目のメッセージ削除


    }
    $buf = _sendcmd($sock, "QUIT");
    fclose($sock);
    $logmsg= $num."件メールを受信";
    echo OutLog( $logmsg ,$logmode);


    // ----- $num件の読み込んだメールの内容を取り出す
    for($j=1;$j<=$num;$j++) {
        $logmsg= $j."件目処理開始";
        echo OutLog( $logmsg ,$logmode);
        $write = true;
        $subject = $from = $text = $atta = $part = $attach = "";
        // -- ヘッダと本文を分割する
        list($head, $body) = mime_split($dat[$j]);
        //**************
        //送信者アドレス
        //**************
        if (eregi("From: [ \t]*([^\r\n]+)", $head, $freg)) {
            $from = addr_search($freg[1]);
        } elseif (eregi("Reply-To:[ \t]*([^\r\n]+)", $head, $freg)) {
            $from = addr_search($freg['1']);
        } elseif (eregi("Return-Path:[ \t]*([^\r\n]+)", $head, $freg)) {
            $from = addr_search($freg['1']);
        }

        //設定ファイルに記述しているアドレス以外は認めない時
        if ($this['acceptonly']==1 ) {
            // 未登録ならあとの処理をスキップする
            if (!in_array ($from, $this[accept])) {
                $logmsg= $from." 未登録なので処理をスキップしました";
                echo OutLog( $logmsg ,$logmode);
                continue;
            }
        }
        // 送信者アドレスが設定ファイルに記述しているアドレスでなければ
        //   登録ユーザーを検索、該当者があれば、ユーザ名を取得
        //   なければ、匿名
        if (!in_array ($from, $this['accept'])) {
           $email = $from;
           $result = DB_query ("SELECT username FROM {$_TABLES['users']} WHERE email = '$email'");
           $nrows = DB_numRows ($result);
           if ($nrows == 1) {
               $A = DB_fetchArray ($result);
               $this['aryUsername'][$email]=$A['username'];
               $logmsg= $from." ".$this['aryUsername'][$email]." 登録ユーザです。";
               echo OutLog( $logmsg ,$logmode);
           } else {
               $email = "Anonymous";
               if ($this['anonymous']<>1 ) {
                    $logmsg= $from." ゲストなので処理をスキップしました";
                    echo OutLog( $logmsg ,$logmode);
                    continue;
               }
               $logmsg= $from." ゲストユーザです。";
               echo OutLog( $logmsg ,$logmode);
           }
           $this['aryTid'][$email]=$tida;
           $this['aryDrf'][$email]=1;//下書き
        
        // 送信者アドレスが設定ファイルに記述しているアドレスの時
        } else {
            $email = $from;
            $logmsg= $from." ".$this['aryUsername'][$email]." 設定ファイル登録者です。";
            echo OutLog( $logmsg ,$logmode);
        }

       //**********
       //日付の編集
       //**********
       eregi("Date:[ \t]*([^\r\n]+)", $head, $datereg);
       $now = strtotime($datereg[1]);
       if ($now = -1) $now = time();//

       //**********
       //題名の編集
       //**********
       // -- サブジェクトの抽出
       if (eregi("\nSubject:[ \t]*([^\r\n]+)", $head, $subreg)) {
           $subject = $subreg['1'];

           //MIME Bﾃﾞｺｰﾄﾞ
           while (eregi("(.*)=\?iso-2022-jp\?B\?([^\?]+)\?=(.*)",$subject,$regs)) {
               $subject = $regs['1'].base64_decode($regs['2']).$regs['3'];
           }
           //MIME Bﾃﾞｺｰﾄﾞ
           while (eregi("(.*)=\?iso-2022-jp\?Q\?([^\?]+)\?=(.*)",$subject,$regs)) {
               $subject = $regs['1'].quoted_printable_decode($regs['2']).$regs['3'];
           }
           //題名
           $subject = htmlspecialchars(convert($subject));
       }
       //****************
       //カテゴリーの編集
       //****************
       $tid=$this['aryTid'][$email];
       //題名がない場合
       if (trim($subject)==""){
           $subject = $this['nosubject'];
       }

       //****************
       //本文＆画像の編集
       //****************
       // マルチパートならばバウンダリに分割
       if (eregi("\nContent-type:.*multipart/",$head)) {
           eregi('boundary="([^"]+)"', $head, $boureg);
           $body = str_replace($boureg['1'], urlencode($boureg['1']), $body);
           $part = split("\r\n--".urlencode($boureg['1'])."-?-?",$body);
           //multipart/altanative
           if (eregi('boundary="([^"]+)"', $body, $boureg2)) {
               $body = str_replace($boureg2['1'], urlencode($boureg2['1']), $body);
               $body = eregi_replace("\r\n--".urlencode($boureg['1'])."-?-?\r\n","",$body);
               $part = split("\r\n--".urlencode($boureg2['1'])."-?-?",$body);
           }
        // 普通のテキストメールならばそのまま
        } else {
            $part['0'] = $dat[$j];
        }
        //パーツ毎処理 はじめ----> 
        $cnt=0;//添付ファイルのカウント
        foreach ($part as $multi) {
            //ヘッダと本体の分割
            list($m_head, $m_body) = mime_split($multi);
            $m_body = ereg_replace("\r\n\.\r\n$", "", $m_body);
            if (!eregi("Content-type: *([^;\n]+)", $m_head, $type)) continue;
            list($main, $sub) = explode("/", $type['1']);
            // 本文をデコード
            if (strtolower($main) == "text") {
                //base64 
                if (eregi("Content-Transfer-Encoding:.*base64", $m_head))  {
                    $m_body = base64_decode($m_body);
                }
                //quoted_printable 
                if (eregi("Content-Transfer-Encoding:.*quoted-printable", $m_head)) {
                    $m_body = quoted_printable_decode($m_body);
                }
                //エンコード
                $text = convert($m_body);
                //指定TAG以外除去
                $text = strip_tags($text,$this['no_strip_tags']);

                //サニタイジング＆改行を<br>に置換
                $text = str_replace(">","&gt;",$text);
                $text = str_replace("<","&lt;",$text);
                $text = str_replace("\r\n", "\r",$text);
                $text = str_replace("\r", "\n",$text);
                $text = preg_replace("/\n{2,}/", "\n\n", $text);
                $text = str_replace("\n", "<br />", $text);
            }
            // ファイル名を抽出
            if (eregi("name=\"?([^\"\n]+)\"?",$m_head, $filereg)) {
                $filename = trim($filereg['1']);
                while (eregi("(.*)=\?iso-2022-jp\?B\?([^\?]+)\?=(.*)",$filename,$regs))  {
                     $filename = $regs['1'].base64_decode($regs['2']).$regs['3'];
                }

               $filename = convert($filename);
               // 問題文字を除く
               $filename = str_replace("&","",$filename);
               $filename = str_replace("'","",$filename);
               $filename = str_replace("/","",$filename);
               $filename = str_replace(".JPG",".jpg",$filename);

               // 本文表示用
               list($filename_ds,$Dummy) = explode(".", $filename);

               // ↓ファイル名の重複の可能性がある場合はtime()のほうを使用
               // $filename = time() . "-".$filename;
               $filename = date(Ymd) . "-".$filename;

               // ＥＵＣの場合の全角ファイル名チェック
               if ($_CONF['locale'] == 'ja_JP') {
                    $filename = mb_convert_encoding($filename,"UTF-7","EUC-JP");
                    // 問題文字を除く
                    $filename = str_replace("&","",$filename);
                    $filename = str_replace("'","",$filename);
                    $filename = str_replace("/","",$filename);
               }
 
            }
            // 添付データをデコードして保存
            if (eregi("Content-Transfer-Encoding:.*base64", $m_head) && eregi($this['subtype'], $sub)) {
                //echo "書き込み開始";
                $tmp = base64_decode($m_body);
                if (!$filename) $filename = time().".$sub";
                if (strlen($tmp) < $this['maxbyte'] && !eregi($this['viri'], $filename)) {
                    $fp = fopen($this['tmp_dir'].$filename, "w");
                    fputs($fp, $tmp);
                    fclose($fp);
                    $link = rawurlencode($filename);
                    $attach = $filename;
                    $size = getimagesize($this['tmp_dir'].$filename);
                    //サムネイル作成する場合
                    if($this['thumb_ok']&& function_exists('ImageCreate')) {
                        //サムネイル作成する拡張子の場合
                        if (preg_match("/$this[thumb_ext]/i",$filename)) {
                            if ($size['0'] > $this['W'] || $size['1'] > $this['H']) {
                                $thum_file=thumb_create($this['tmp_dir'].$filename,$this['W'],$this['H'],$this['thumb_dir'],$this['tmp_dir']);
                                $w_thumb_ok = 1;
                                if (!getimagesize($thum_file)){
                                    $w_thumb_ok = 0;
                                }
                             }else{
                                 $w_thumb_ok = 0;
                             }
                        }else{
                            $w_thumb_ok = 0;
                        }
                    }else{
                        $w_thumb_ok = 0;
                    }
                    //添付ファイルの情報を配列に記憶する
                    $cnt=$cnt+1;
                    $fname[$cnt]=$filename;

                    $thumb[$cnt]=$w_thumb_ok;
                    $fname_ds[$cnt]=$filename_ds;
                } else {
                    $write = false;
                }
            }
        }
        //パーツ毎処理 おわり<---- 

            // 添付ファイルが容量オーバーのときあとの処理をスキップ
            if ($write == false) continue;
            // 添付ファイルがない場合の本文のソース
            if ($attach==""){
                $body = $text;
            // 添付ファイルがある場合の本文のソース
            }else{
                //すべての添付ファイルについて処理する はじめ-----
                $body="";
                for($cnti=1;$cnti<=$cnt;$cnti++) {
                    $w_thumb_ok=$thumb[$cnti];
                    $attach=$fname[$cnti];
                    $filename = substr($attach, 0, strrpos($attach,"."));
                    $this['thum_filename'] = $filename . "-small.jpg";
                    
                    $f['filename']=$fname_ds[$cnti];
                    if($w_thumb_ok){
                        $thumb_size = getimagesize($thum_file);
                        $template='photo_thumb_yes.thtml';
                        $f['tmp_url']=$this['tmp_url'].$attach;
                        $f['thumb_url'] =$this['thumb_url'].$this[thum_filename];
                        $f['width'] =$thumb_size['0'];
                        $f['height'] =$thumb_size['1'];
                    //サムネイルがない場合
                    }else{
                        $template='photo_thumb_no.thtml';
                        $f['tmp_url']=$this['tmp_url'].$attach;
                        $f['thumb_url'] ='';
                        //縮小表示するとき
                        if( $size['0'] > $this['smallW']){
                            $smallH = round($this['smallW'] / $size['0'] * $size['1'] , 0);
                            $f['width'] =$this['smallW'];
                            $f['height'] =$smallH;
                        //縮小表示しないとき
                        }else{
                            $f['width'] =$size['0'];
                            $f['height'] =$size['1'];
                        }
                    }

                   $body.=edit_photo ($TemplatePath,$template,$f);
                }
                //すべての添付ファイルについて処理する おわり

                $body .=$text;
            }

           //****************
           //ユーザーナンバ
           //****************
           // ユーザー名よりユーザーナンバーを設定
            $uid=1;
            if ($email != "Anonymous") {
                $username=$this['aryUsername'][$email];
                $result = DB_query ("SELECT uid FROM {$_TABLES['users']} WHERE username = '$username'");
                $nrows = DB_numRows ($result);
                if ($nrows == 1) {
                    $A = DB_fetchArray ($result);
                    $uid=$A['uid'];
                }
            }
           //****************
           //その他の項目編集
           //****************
            $sid ='';
            $sid =COM_sanitizeID ($sid);    //タイムスタンプchar='200503151605478'
            $title = $subject;
            $introtext = $body;
            $bodytext = '';
            $hits=0;
            $unixdate=time();           //現在時刻設定
            $comments=0;
            $related='';                //関連URL
            $featured=0;
            $commentcode=0;
            $statuscode=0;
            $expire=0;                  //有効期限
            $postmode='html';
            $frontpage=0;               // show only topic page
            $draft_flag=$this['aryDrf'][$email];
            $numemails=0;
            $owner_id = $uid;
            $group_id = 2;
            $perm_owner=3;
            $perm_group=2;
            $perm_members=2;
            $perm_anon=2;
            $show_topic_icon=0;
            //****************
            //Story SAVE
            //****************
            $title = addslashes($title);
            $introtext = addslashes($introtext);
            $bodytext = addslashes($bodytext);

            //ゲストユーザの場合は承認待ちファイルへ
            //ゲストユーザ以外の場合は記事ファイルへ
            if ($uid==1){
                $fld='sid,uid,tid,title,introtext';
                $fld.=',date,postmode';
                $dta="'$sid',$uid,'$tid','$title','$introtext'";
                $dta.=",FROM_UNIXTIME($unixdate),'$postmode'";
                DB_save ($_TABLES['storysubmission'], $fld,$dta); 
                $logmsg= $from." 承認待ちファイルへ出力しました。";
                echo OutLog( $logmsg ,$logmode);
            } else {
                $fld='sid,uid,tid,title,introtext,bodytext';
                $fld.=',hits,date,comments,related';
                $fld.=',featured,commentcode,statuscode,expire';
                $fld.=',postmode,frontpage,draft_flag,numemails,owner_id';
                $fld.=',group_id,perm_owner,perm_group';
                $fld.=',perm_members,perm_anon,show_topic_icon';
                $dta= "'$sid',$uid,'$tid','$title','$introtext','$bodytext'";
                $dta.= ",$hits,FROM_UNIXTIME($unixdate),'$comments','$related'";
                $dta.= ",$featured,'$commentcode','$statuscode','$expire'";
                $dta.= ",'$postmode','$frontpage',$draft_flag,$numemails,$owner_id";
                $dta.= ",$group_id,$perm_owner,$perm_group";
                $dta.= ",$perm_members,$perm_anon,$show_topic_icon";
                DB_save ($_TABLES['stories'], $fld, $dta);
                $logmsg= $from." 記事ファイルへ出力しました。";
                echo OutLog( $logmsg ,$logmode);
            }

            COM_rdfUpToDateCheck ();
        //======================
    }//end 件数分内容を取り出す
}//end メールがある時の処理

echo OutLog( "----- custom_photomail end",$logmode);

?>