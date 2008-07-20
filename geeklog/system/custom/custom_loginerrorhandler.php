<?php

/**
* Example of custom function that can be used to handle a login error.
* Only active with custom registration mode enabled
* Used if you have a custom front page and need to trap and reformat any error messages
* This example redirects to the front page with a extra passed variable plus the message
* Note: Message could be a string but in this case maps to $MESSAGE[81] as a default - edit in language file
*/
function CUSTOM_loginErrorHandler($msg='') {
    global $_CONF,$MESSAGE;

    if ($msg > 0) {
        $msg = $msg;
    } elseif ($msg == '') {
        $msg = 81;
    }
    $retval = COM_refresh($_CONF['site_url'] .'/index.php?mode=loginfail&msg='.$msg);
    echo $retval;
    exit;
}

?>