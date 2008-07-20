<?php

// ========================================================
//   日本語メール関数
//
//  @summary Geeklog-1.4.1のメールを従来のISO-2022-JP(JIS)
//           メールに戻します
//  @author  mystral-kk - geeklog AT mystral-kk DOT net
//  @version 2007-10-25
// ========================================================

// *** ご注意 ***
//
// ・jpmailプラグインと同時に使用できません。先にjpmailプラグインをアンインス
//   トールしてください。
// ・$_CONF['mail_settings']['backend']に'mail'を指定すると，見出し（件名）が
//   長い場合，Gmail等では正常に受け取れない場合があります。できるだけ，
//   $_CONF['mail_settings']['backend']に'smtp'を指定してください（同時に，
//   'host', 'username', 'password'も指定します）。
// ・'smtp'にできない場合は，CUSTOM_MAIL_HEADER_LENGTHに400を指定してください。

global $_CONF, $LANG_CHARSET;

// メールヘッダ・本文で使用するエンコーディング。英語版の動作に戻すには
// define( 'CUSTOM_MAIL_ENCODING', 'UTF-8' );
// としてください。

define( 'CUSTOM_MAIL_ENCODING', 'ISO-2022-JP' );
//define( 'CUSTOM_MAIL_ENCODING', 'UTF-8' );

// Geeklogの内部エンコーディング。場合によっては，
// define( 'CUSTOM_MAIL_INTERNAL_ENCODING', $LANG_CHARSET );
// とする方がよいかもしれません。

define( 'CUSTOM_MAIL_INTERNAL_ENCODING', $_CONF['default_charset'] );

// メールヘッダの1行の長さの最大値。必ず4の倍数にします。
// デフォルト値を変更する必要はまずないでしょう（上記の「ご注意」参照）。

define( 'CUSTOM_MAIL_HEADER_LENGTH', 68 );
//define( 'CUSTOM_MAIL_HEADER_LENGTH', 400 );

// メールヘッダの改行文字

define( 'CUSTOM_MAIL_HEADER_LINEBREAK', "\r\n" );

// アドレスのコメント部分の引用符

define( 'CUSTOM_MAIL_COMMENT_ENCLOSER', '"' );

// 本文の改行文字

define( 'CUSTOM_MAIL_BODY_LINEBREAK',
		( substr( PHP_OS, 0, 3 ) == 'WIN' ? "\r\n" : "\n" )
);

/**
* Converts encoding
*/
function CUSTOM_convertEncoding( $string, $to_encoding ) {
	global $_CONF;
	
	$from_encoding = @mb_detect_encoding(
		$string,
		array ( 'utf-8', 'euc-jp', 'SJIS', 'iso-8859-1', 'ASCII' ),
		true
	);
	
	if ( empty( $from_encoding ) ) {
		$from_encoding = $_CONF['default_charset'];
	}
	
	return mb_convert_encoding( $string, $to_encoding, $from_encoding );
}

/**
* Encodes a string such that it can be used in an email header
*
* @param    string  $string     the text to be encoded
* @return   string              encoded text
*
*/
function CUSTOM_emailEscape( $string ) {
	global $_CONF, $LANG_CHARSET;
	
	$retval = '';
	$string = CUSTOM_convertEncoding( $string, CUSTOM_MAIL_INTERNAL_ENCODING );
	COM_errorLog( 'CUSTOM_emailEscape: input=' . $string );
	// ASCIIだけの場合は"(\x22)だけエスケープする
	if ( !preg_match( "/[^\\x00-\\x7f]/", $string ) ) {
		return str_replace( '"', '\\"', $string );
	}

	// mb_convert_encodingが使える場合
	if ( function_exists( 'mb_convert_encoding' ) ) {
		$string = mb_convert_encoding(
			$string, CUSTOM_MAIL_ENCODING, CUSTOM_MAIL_INTERNAL_ENCODING
		);
		
		$len_mime = strlen( '=?' . CUSTOM_MAIL_ENCODING . '?B?' . '?=' );
		$cnt      = strlen( 'Subject: ' );
		$parts    = array ();
		$old_mb_internal_encoding = mb_internal_encoding();
		mb_internal_encoding( CUSTOM_MAIL_ENCODING );
		
		while ( $string != '' ) {
			$maxlen = mb_strlen( $string );
			$cut    = $maxlen;
			
			for ( $i = 1; $i <= $maxlen; $i ++ ) {
				$temp = base64_encode( mb_substr( $string, 0, $i ) );
				if ( strlen( $temp ) + $len_mime + $cnt > CUSTOM_MAIL_HEADER_LENGTH ) {
					$cut = $i - 1;
					break;
				}
			}

			$temp    = base64_encode( mb_substr( $string, 0, $cut ) );
			$parts[] = '=?' . CUSTOM_MAIL_ENCODING . '?B?' . $temp . '?=';
			$string  = mb_substr( $string, $cut );
			$cnt     = 1;
		}
		
		mb_internal_encoding( $old_mb_internal_encoding );
		$string = implode( CUSTOM_MAIL_HEADER_LINEBREAK . ' ', $parts );
		COM_errorLog( 'CUSTOM_emailEscape: output=' . $string );
		return $string;
	}
	
	// iconv()が使える場合
	if ( function_exists( 'iconv_mime_encode' ) ) {
		$pref = array (
			'scheme'         => 'B',
			'input-charset'  => CUSTOM_MAIL_INTERNAL_ENCODING,
			'output-charset' => CUSTOM_MAIL_ENCODING,
			'line-length'    => CUSTOM_MAIL_HEADER_LENGTH
		);
		$retval = iconv_mime_encode( 'Subject', $string, $pref );
		if ( $retval !== false ) {
			return substr( $retval, strlen( 'Subject: ' ) );
		}
	}

	// iconvもmb_convert_encodingもなかった...
	COM_errorLog( 'CUSTOM_emailEscape: no function found to convert encodings.' );
	return $string;
}

/**
* Takes a name and an email address and returns a string that vaguely
* resembles an email address specification conforming to RFC(2)822 ...
*
* @param    string  $name       name, e.g. John Doe
* @param    string  $address    email address only, e.g. john.doe@example.com
* @return   string              formatted email address
*
*/
function CUSTOM_formatEmailAddress( $name, $address ) {
	if ( empty( $name ) ) {
		return $address;
	}
	
	$formatted_name = CUSTOM_emailEscape( $name );
	if ( $formatted_name == $name ) {
		$formatted_name = str_replace( '"', '\\"', $formatted_name );
	}
	if ( strlen( 'From: ' . $formatted_name . $address ) > CUSTOM_MAIL_HEADER_LENGTH ) {
		$address = CUSTOM_MAIL_HEADER_LINEBREAK . ' ' . $address;
	}
	
	$retval = CUSTOM_MAIL_COMMENT_ENCLOSER . $formatted_name
			. CUSTOM_MAIL_COMMENT_ENCLOSER . ' <' . $address . '>';
	COM_errorLog( 'CUSTOM_formatEmailAddress: output=' . $retval );
	return $retval;
}

/**
* Splits "comment <address>" into comment and address
*/
function CUSTOM_splitAddress( $string ) {
	$comment = '';
	$string  = rtrim( $string );

	if ( substr( $string, -1 ) != '>' ) {
		$address = $string;
	} else {
		$address = strrchr( $string, '<' );
		if ( $address === false ) {
			COM_errorLog( 'CUSTOM_splitAddress: "<" not found.' );
			$address = $string;
		} else {
			$comment = rtrim( substr( $string, 0, strlen( $string ) - strlen( $address ) ) );
			$address = substr( $address, 1, strlen( $address ) - 2 );
		}
	}
	
	COM_errorLog( 'CUSTOM_splitAddress: comment=' . $comment . ' address=' . $address );
	return array ( $comment, $address );
}

/**
* This is an example of a custom email function. When this function is NOT
* commented out, Geeklog would send all emails through this function
* instead of sending them through COM_mail in lib-common.php.
*
* This is basically a re-implementation of the way emails were sent
* prior to Geeklog 1.3.9 (Geeklog uses PEAR::Mail as of version 1.3.9).
*
*/
function CUSTOM_mail( $to, $subject, $message, $from = '', $html = false,
		$priority = 0, $cc = '' ) {
	global $_CONF, $LANG_CHARSET;
	
	static $mailobj;
	
	include_once 'Mail.php';
	include_once 'Mail/RFC822.php';
	
	COM_errorLog( 'CUSTOM_mail: to=' . $to . ' subject=' . $subject );
	// 余分なヘッダを追加されないように改行コードを削除
    $to      = substr( $to, 0, strcspn( $to, "\r\n" ));
    $cc      = substr( $cc, 0, strcspn( $cc, "\r\n" ));
    $from    = substr( $from, 0, strcspn( $from, "\r\n" ));
    $subject = substr( $subject, 0, strcspn( $subject, "\r\n" ));
	
	// ヘッダをエスケープ
	list ( $temp_to_comment, $temp_to_address ) = CUSTOM_splitAddress( $to );
	$to      = CUSTOM_formatEmailAddress( $temp_to_comment, $temp_to_address );
	list ( $temp_cc_comment, $temp_cc_address ) = CUSTOM_splitAddress( $cc );
	$cc      = CUSTOM_formatEmailAddress( $temp_cc_comment, $temp_cc_address );
	list ( $temp_from_comment, $temp_from_address ) = CUSTOM_splitAddress( $from );
	$from    = CUSTOM_formatEmailAddress( $temp_from_comment, $temp_from_address );
	$subject = CUSTOM_emailEscape( $subject );
	
	// 本文をエスケープ
	$message = CUSTOM_convertEncoding( $message, CUSTOM_MAIL_ENCODING );
	$message = str_replace(
		array ( "\r\n", "\n", "\r" ), CUSTOM_MAIL_BODY_LINEBREAK, $message
	);
	
	// メールオブジェクトを作成
	$method  = $_CONF['mail_settings']['backend'];
	if ( !isset( $mailobj ) ) {
		if ( $method == 'sendmail' OR $method == 'smtp' ) {
			$mailobj =& Mail::factory( $method, $_CONF['mail_settings'] );
		} else {
			$mailobj =& Mail::factory( $method );
		}
	}
	
	// ヘッダ組み立て
	$headers = array ();

	$headers['From'] = $from;
	if ( $method != 'mail' ) {
		$headers['To'] = $to;
	}
	if ( !empty( $cc ) ) {
		$headers['Cc'] = $cc;
	}
	$headers['Date'] = date( 'r' ); // RFC822 formatted date
	if( $method == 'smtp' ) {
		list( $usec, $sec ) = explode( ' ', microtime() );
		$m = substr( $usec, 2, 5 );
		$headers['Message-Id'] = '<' .  date( 'YmdHis' ) . '.' . $m
							   . '@' . $_CONF['mail_settings']['host'] . '>';
	}
	if( $html ) {
		$headers['Content-Type'] = 'text/html; charset=' . CUSTOM_MAIL_ENCODING;
		$headers['Content-Transfer-Encoding'] = '8bit';
	} else {
		$headers['Content-Type'] = 'text/plain; charset=' . CUSTOM_MAIL_ENCODING;
	}
	$headers['Subject'] = $subject;
	if ( $priority > 0 ) {
		$headers['X-Priority'] = $priority;
	}
	$headers['X-Mailer'] = 'Geeklog-' . VERSION . ' (' . CUSTOM_MAIL_ENCODING . ')';

	$retval = $mailobj->send( $to, $headers, $message );
	if( $retval !== true ) {
		COM_errorLog( $retval->toString(), 1 );
	}
	
	return ( $retval === true ? true : false );
}

?>
