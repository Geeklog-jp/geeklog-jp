<?php

/**
* Disable userconfig plugin to prevent an error which will occur during
* the upgrade process
*/
function disableUserconfigPlugin() {
    global $_TABLES;
    
    $sql = "UPDATE {$_TABLES['plugins']} "
         . "SET pi_enabled = '0' "
         . "WHERE (pi_name = 'userconfig') ";
    DB_query($sql);
}
