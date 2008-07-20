<?php
//COM_MAIL の　COM_emailEscape　の一部をコメントアウトした版


//COM_MAIL の　COM_emailEscape　の一部をコメントアウトした関数です。
function emailEscape( $string )
{

    global $_CONF, $LANG_CHARSET;

    if( empty( $LANG_CHARSET ))
    {
        $charset = $_CONF['default_charset'];
        if( empty( $charset ))
        {
            $charset = 'iso-8859-1';
        }
    }
    else
    {
        $charset = $LANG_CHARSET;
    }

    if(( $charset == 'utf-8' ) && ( $string != utf8_decode( $string )))
    {
//        if( function_exists( 'iconv_mime_encode' ))
//        {
//            $mime_parameters = array( 'input-charset'  => 'utf-8',
//                                      'output-charset' => 'utf-8',
//                                      // 'Q' encoding is more readable than 'B'
//                                      'scheme'         => 'Q'
//                                    );
//            $string = substr( iconv_mime_encode( '', $string,
//                                                 $mime_parameters ), 2 );
//        }
 //       else
//        {
            $string = '=?' . $charset . '?B?' . base64_encode( $string ) . '?=';
//        }
    }
    else if( preg_match( '/[^0-9a-z\-\.,:;\?! ]/i', $string ))
    {
        $string = '=?' . $charset . '?B?' . base64_encode( $string ) . '?=';
    }

    return $string;
}



function CUSTOM_mail($to, $subject, $message, $from = '', $html = false, $priority = 0)
{
    global $_CONF, $LANG_CHARSET;

    static $mailobj;

    $subject = emailEscape( $subject );

    include_once( 'Mail.php' );
    include_once( 'Mail/RFC822.php' );

    $method = $_CONF['mail_settings']['backend'];

    if( !isset( $mailobj ))
    {
        if(( $method == 'sendmail' ) || ( $method == 'smtp' ))
        {
            $mailobj =& Mail::factory( $method, $_CONF['mail_settings'] );
        }
        else
        {
            $method = 'mail';
            $mailobj =& Mail::factory( $method );
        }
    }

    if( empty( $LANG_CHARSET ))
    {
        $charset = $_CONF['default_charset'];
        if( empty( $charset ))
        {
            $charset = 'iso-8859-1';
        }
    }
    else
    {
        $charset = $LANG_CHARSET;
    }

    $headers = array();

    $headers['From'] = $from;
    if( $method != 'mail' )
    {
        $headers['To'] = $to;
    }
    if( !empty( $cc ))
    {
        $headers['Cc'] = $cc;
    }
    $headers['Date'] = date( 'r' ); // RFC822 formatted date
    if( $method == 'smtp' )
    {
        list( $usec, $sec ) = explode( ' ', microtime());
        $m = substr( $usec, 2, 5 );
        $headers['Message-Id'] = '<' .  date( 'YmdHis' ) . '.' . $m
                               . '@' . $_CONF['mail_settings']['host'] . '>';
    }
    if( $html )
    {
        $headers['Content-Type'] = 'text/html; charset=' . $charset;
        $headers['Content-Transfer-Encoding'] = '8bit';
    }
    else
    {
        $headers['Content-Type'] = 'text/plain; charset=' . $charset;
    }
    $headers['Subject'] = $subject;
    if( $priority > 0 )
    {
        $headers['X-Priority'] = $priority;
    }
    $headers['X-Mailer'] = 'GeekLog ' . VERSION ."for japanese-utf8";

    $retval = $mailobj->send( $to, $headers, $message );
    if( $retval !== true )
    {
        COM_errorLog( $retval->toString(), 1 );
    }

    return( $retval === true ? true : false );
}


?>
