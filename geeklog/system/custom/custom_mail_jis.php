<?php
/**
* Send an email.
* この関数は、文字コード 'ISO-2022-JP' 専用です。
* 作成日 2004/12/02
* 更新日 2005/08/16　toの文字化け修正
* 更新日 2005/09/05　FS対策 EUC-JPを前に
*   mb_detect_encoding($message,"EUC-JP,UTF-8,JIS,SJIS")
* 更新日 2005/11/11　mb_encode_mimeheader が動作不良のため
*   subjectが長いと文字化して途中できれる問題の対応
* 更新日 2006/05/12　$fromにエリアスが含まれていない場合に対応
* 更新日 2006/09/05 (2005/11/11)
*        mb_encode_mimeheader が動作不良解消したようなので
*        元に戻す。
* 更新日 2006/10/11 本文改行しすぎる問題の対応
* 更新日 2006/10/11 メーラの記述に当プログラムの最終変更日を付加
* 更新日 2006/10/17 2006/09/05 (2005/11/11)
*        mb_encode_mimeheader が動作不良解消したようなので
*        元に戻す。FROMの分は元に戻す
* 更新日 2006/12/19 ヘッダを70バイト毎で改行するように変換

* @param    to         string   recipients name and email address
* @param    subject    string   subject of the email
* @param    message    string   the text of the email
* @param    from       string   (optional) sender of the the email
* @param    html       bool     true if to be sent as an HTML email
* @param    priority   int      add X-Priority header, if > 0
* @return   boolean             true if successful,  otherwise false
*
*/


//(PHP 4 >= 4.0.6, PHP 5)
//文字コード JIS変換とMIME変換 70バイトづつで改行
function FncSep($text){
    $ret = "";      //結果
    $wkByte = 0;    //バイト数カウント
    $wkmoji = "";   //切り出した一文字
    $wkText = "";   //1行分編集
    $wkLcnt = 1;    //行カウント
    $encode=mb_detect_encoding($text,"EUC-JP,UTF-8,JIS,SJIS");
    $text=mb_convert_encoding($text, "JIS",$encode);
    $encode="JIS";mb_detect_encoding($text,"EUC-JP,UTF-8,JIS,SJIS");
    $imax=mb_strlen($text,mb_detect_encoding($text,$encode));

    for($i=0;$i<$imax;$i++){
        $wkMoji = mb_substr($text,$i,1,$encode); //一文字切り出し
        $wkByte += strlen($wkMoji);     //切り出した文字のバイト数を集計
        $wkText .= $wkMoji;            //一文字切り出したのを1行分に加える

        if($wkByte > 70){ //70バイト分たまったら改行
            if($wkLcnt == 1){ //一行目
                $ret .= "=?iso-2022-jp?B?" . base64_encode($wkText) . "?=";
            } else {
                $ret .= "\n =?iso-2022-jp?B?" . base64_encode($wkText) . "?=";
            }
            $wkLcnt++;        //行カウント加算
            $wkText = "";   //1行分編集
            $wkByte = 0;    //バイト数カウントクリア
        }
    }
    //端数分の処理
    if($wkText != ""){
        $ret .= "\n =?iso-2022-jp?B?" . base64_encode($wkText) . "?=\n";
    } else {
        $ret .= "\n";
    }
	
    return $ret;
}
//
function CUSTOM_mail(
    $to, $subject, $message, $from = '', $html = false, $priority = 0
    ){
    $udate = "20061219";//@@@@@20061011add当プログラムの最終変更日
    //変数定義
    global $_CONF, $LANG_CHARSET;
    static $mailobj;

    // メール用クラス読み込み
    include_once( 'Mail.php' );
    include_once( 'Mail/RFC822.php' );

    //LANG_CHARSET編集
    $charset = 'ISO-2022-JP';

    //mailobj編集
    if( !isset( $mailobj )){
        $method = 'mail';
        $mailobj =& Mail::factory( $method );
    }

    //from編集
    if( empty( $from )){
        $name=$_CONF["site_name"];
        $address="<".$_CONF["site_mail"].">";
    }else{
        list($name,$address)= split ("<", $from);
        $address="<".$address;
    }
    //@@@@ 2006/05/12 mystral_kk added -->
    if (strpos($address, '>') !== false) {
    //@@@@ 2006/05/12 mystral_kk added <--
        $name = mb_convert_encoding($name, "JIS",
            mb_detect_encoding($name,"EUC-JP,UTF-8,JIS,SJIS"));
        //@@@@@20061017 元に戻す, 20051111 update ----->
        $name = "=?iso-2022-jp?B?" . base64_encode($name) . "?=";
        //$name = mb_encode_mimeheader($name);
        //@@@@@20061017, 20051111 update <-----
        $from=$name." ".$address;
    //@@@@ 2006/05/12 mystral_kk added -->
    } else {
        $from = $name;
    }
    //@@@@ 2006/05/12 mystral_kk added <--

    //@@@@@20050816 add ----->
    //to編集
    if (strpos($to,"<")){
        list($name,$address)= split ("<", $to);
        $address="<".$address;
        $name = mb_convert_encoding($name, "JIS",
                mb_detect_encoding($name,"EUC-JP,UTF-8,JIS,SJIS"));
        //@@@@@20060905 元に戻す　20051111 update ----->
        //$name = "=?iso-2022-jp?B?" . base64_encode($name) . "?=";
        $name = mb_encode_mimeheader($name);
        //@@@@@20060905 元に戻す　20051111 update <-----
        $to=$name." ".$address;
    }
    //@@@@@20050816 add <-----
    //***** 文字コード JIS変換とMIME変換
    //@@@@@2001218----->
        //$subject = mb_convert_encoding($subject, "JIS",
        //           mb_detect_encoding($subject,"EUC-JP,UTF-8,JIS,SJIS"));
        //@@@@@20060905 元に戻す　20051111 update ----->
        //$subject = "=?iso-2022-jp?B?" . base64_encode($subject) . "?="."\r\n";
        //$subject = mb_encode_mimeheader($subject); 
        //@@@@@20060905 元に戻す　20051111 update <-----
    $subject=FncSep($subject);
    //@@@@@2001218<-----

    $message = mb_convert_encoding($message, "JIS",
               mb_detect_encoding($message,"EUC-JP,UTF-8,JIS,SJIS"));
    //@@@@@20061011 add 改行しすぎる問題対応----->
    $cr = "\x0D";
    $lf = "\x0A";
    $crlf = "\x0D\x0A";
    $message = str_replace($cr, $lf, str_replace($crlf, $lf, $message));
    //@@@@@20061011 add 改行しすぎる問題対応<-----
    //---------------ヘッダ編集----------
    $headers = array();
    //*MIME-Version
    $headers['MIME-Version'] = '1.0';

    //*from
    $headers['From'] = $from;

    //*date
    $headers['Date'] = date( 'r' ); // RFC822 formatted date

    //*Content-Type
    if( $html ){
        $headers['Content-Type'] = 'text/html; charset=' . $charset;
        $headers['Content-Transfer-Encoding'] = '8bit';
    }else{
        $headers['Content-Type'] = 'text/plain; charset=' . $charset;
        $headers['Content-Transfer-Encoding'] = '7bit';
    }

    //*Subject
    $headers['Subject'] = $subject;

    //*X-Priority
    if( $priority > 0 )    
    {
        $headers['X-Priority'] = $priority;
    }

    //*X-Mailer //@@@@@20061011add $udate 追加
    $headers['X-Mailer'] = 'GeekLog ' . VERSION . " for Japanese(".$udate.")";


    //*送信
    $retval = $mailobj->send( $to, $headers, $message );
    if( $retval !== true )
    {
        COM_errorLog( $retval->toString(), 1 );
    }

    //出口
    return( $retval === true ? true : false );
}

?>