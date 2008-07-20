<?php

// +---------------------------------------------------------------------------+
// | userconfig Geeklog Plugin 1.0                                          |
// +---------------------------------------------------------------------------+
// | admin/index.php                                                           |
// | Administration page.                                                      |
// |                                                                           |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 by nmox                                                |
// |                                                                           |
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
// +---------------------------------------------------------------------------+
//

require_once('../../../lib-common.php');


// Only let admin users access this page
if (!SEC_hasRights('userconfig.edit')) {
    // Someone is trying to illegally access this page
    COM_errorLog("Someone has tried to illegally access the shop Admin page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR",1);
    $display = COM_siteHeader();
    $display .= COM_startBlock($LANG_USERCONFIG['access_denied']);
    $display .= $LANG_USERCONFIG['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter();
    echo $display;
    exit;
}
 
/**
* Main 
*/


$display = COM_siteHeader(1);
//$T = new Template($_CONF['path'] . 'plugins/userconfig/templates');
//$T->set_file('admin', 'admin.thtml');
//$T->set_var('site_url',$_CONF['site_url']);
//$T->set_var('site_admin_url', $_CONF['site_admin_url']);
//$T->set_var('header', $LANG_USERCONFIG['admin']);
//$T->set_var('plugin','userconfig');
// put your code here
$display .= phpblock_userconfig();

//$T->parse('output','admin');
//$display .= $T->finish($T->get_var('output'));
$display .= COM_siteFooter(1);

echo $display;
?>
