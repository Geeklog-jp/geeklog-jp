<?php
// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | function_tkgmaps-admin.php                                                                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2002 by the following authors:                              |
// |                                                                           |
// |2008.05.14 v0.9 customed by G-COE, CSEAS. Addition of GoogleMapsEditor API Auto Tags
// |Authors: Kinoshita
// |Authors: Hiroron
// |Director: IVY WE CO.,LTD. Komma
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
// $Id$

function edit_tkgmaps($mode='edit')
{
	global $_CONF, $_TABLES;

	
	if ($mode=='edit') {
		$googlemapsapikey = DB_getItem ($_TABLES['tkgmaps'], 'googlemapsapikey', "1 LIMIT 1");
		$retval = '';
		$retval .= "<form action='{$_CONF['site_admin_url']}/plugins/tkgmaps/index.php' method='post'>" .LB;
		$retval .= "	<div>Google API Key</div>".LB;
		$retval .= "	<div><input name='googlemapsapikey' size='140' value='$googlemapsapikey' type='text'".XHTML.">".LB;
		$retval .= "	</div>".LB;
		$retval .= "	<div>".LB;
        if (version_compare(VERSION, '1.5.0') >= 0) {
            $retval .= "		<input name='".CSRF_TOKEN."' value='".SEC_createToken()."' type='hidden'".XHTML.">".LB;
        }
		$retval .= "		<input name='mode' value='edit_submit' type='hidden'".XHTML.">".LB;
		$retval .= "		<input name='submitbutton' value='保存' type='submit'".XHTML.">".LB;
		$retval .= "	</div>".LB;
		$retval .= "</form>".LB;
	} else if ($mode=='edit_submit') {
		$googlemapsapikey = COM_applyFilter($_REQUEST['googlemapsapikey']);;
		save_tkgmaps($googlemapsapikey);
		$retval ="保存が完了しました。";
		$retval .= listtkgmaps();
	}
	return $retval;
}

function save_tkgmaps($googlemapsapikey){
	global $_TABLES;

	DB_query ("DELETE FROM {$_TABLES['tkgmaps']}");
	DB_query ("INSERT INTO {$_TABLES['tkgmaps']} (googlemapsapikey) VALUES ('$googlemapsapikey')");
}

?>