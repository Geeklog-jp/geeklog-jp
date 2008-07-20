<?php
//
// +---------------------------------------------------------------------------+
// | Theme Editor Plugin for Geeklog - The Ultimate Weblog                     |
// +---------------------------------------------------------------------------+
// | config.php                                                                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 - geeklog AT mystral-kk DOT net                        |
// |                                                                           |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
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
//
// $Id: config.php,v 1.1 2006/10/02 06:49:57 kenji Exp $

global $_DB_table_prefix, $_TABLES;

// set Plugin Table Prefix the Same as Geeklogs

$_THM_table_prefix = $_DB_table_prefix;

// Add to $_TABLES array the tables your plugin uses

$_TABLES['thm_contents'] = $_THM_table_prefix . 'thm_contents';

$_THM_CONF = array();

// Plugin info

$_THM_CONF['pi_version'] = '1.0.4';						// Plugin Version
$_THM_CONF['gl_version'] = '1.4.0';						// GL Version plugin for
$_THM_CONF['pi_url']     = 'http://mystral-kk.net/';	// Plugin Homepage

// 編集可能なテーマリスト
// NOTE: 大文字・小文字に注意してください。

$_THM_CONF['allowed_themes'] = array(
	'chameleon',
	'ProfessionalCSS',
	'mobile',
	'mobile_3g',
	'professional'
);

// 編集可能なテンプレートファイルリスト
// NOTE: 大文字・小文字に注意してください。

$_THM_CONF['allowed_files'] = array(
	'htmlheader.thtml','header.thtml', 'footer.thtml', 'leftblocks.thtml', 'rightblocks.thtml',
	'blockheader-left.thtml', 'blockfooter-left.thtml',
	'blockheader-right.thtml', 'blockfooter-right.thtml',
	'featuredstorytext.thtml', 'storytext.thtml','archivestorytext.thtml',
	'menuitem.thtml', 'menuitem_last.thtml', 'menuitem_none.thtml',
	'list.thtml','listitem.thtml',
	'loginform.thtml',
	'style.css','custom.css',
	'article/article.thtml', 'article/printable.thtml',
	'profiles/contactuserform.thtml', 'profiles/contactauthorform.thtml',
	'preferences/profile.thtml',
	'search/searchform.thtml', 'search/searchresults.thtml',
	'submit/submitevent.thtml', 'submit/submitloginrequired.thtml',
	'users/newpassword.thtml', 'users/commentrow.thtml',
	'users/getpasswordform.thtml', 'users/loginform.thtml', 'users/profile.thtml',
	'users/registrationform.thtml', 'users/storyrow.thtml'
);


// sort($_THM_CONF['allowed_themes']);
// sort($_THM_CONF['allowed_files']);

// When you add/remove a theme to/from $_THM_CONF['allowed_themes'], or a template
// file to/from $_THM_CONF['allowed_files'], Theme Editor plugin will detect it
// automatically.  When this option is set to 'auto', the plugin will update the data
// stored in databse automatically.  When set to 'manual', the plugin will display
// the information and 'UPDATE database' button.  When set to 'igonore', the plugin
// will do nothing about the change.

$_THM_CONF['resync_database'] = 'manual';

// If set true, you can upload images to theme/images/* directories

$_THM_CONF['allow_upload'] = true;

// 画像アップローダ　サムネールサイズ

$_THM_CONF['image_width']  = 120;	// In pixels

$_THM_CONF['image_height'] = 100;	// In pixels

// 画像アップローダ　サムネール列数

$_THM_CONF['image_max_col'] = 4;

// Max size of a file for uploading to the web server

$_THM_CONF['upload_max_size'] = 1048576;	// In bytes

?>