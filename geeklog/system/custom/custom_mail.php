<?php

/**
* This is an example of a custom email function. When this function is NOT
* commented out, Geeklog would send all emails through this function
* instead of sending them through COM_mail in lib-common.php.
*
* This is basically a re-implementation of the way emails were sent
* prior to Geeklog 1.3.9 (Geeklog uses PEAR::Mail as of version 1.3.9).
*
*/
/*
function CUSTOM_mail($to, $subject, $message, $from = '', $html = false, $priority = 0)
{
    global $_CONF, $LANG_CHARSET;

    if (empty ($LANG_CHARSET)) {
        $charset = $_CONF['default_charset'];
        if (empty ($charset)) {
            $charset = 'iso-8859-1';
        }
    } else {
        $charset = $LANG_CHARSET;
    }

    if (empty ($from)) {
        $from = $_CONF['site_name'] . ' <' . $_CONF['site_mail'] . '>';
    }

    $headers  = 'From: ' . $from . "\r\n"
              . 'X-Mailer: Geeklog ' . VERSION . "\r\n";

    if ($priority > 0) {
        $headers .= 'X-Priority: ' . $priority . "\r\n";
    }

    if ($html) {
        $headers .= "Content-Type: text/html; charset={$charset}\r\n"
                 .  'Content-Transfer-Encoding: 8bit';
    } else {
        $headers .= "Content-Type: text/plain; charset={$charset}";
    }

    return mail ($to, $subject, $message, $headers);
}
*/

?>
