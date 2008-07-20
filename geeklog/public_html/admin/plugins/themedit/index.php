<?php

// +---------------------------------------------------------------------------+
// | Theme Editor Plugin for Geeklog - The Ultimate Weblog                     |
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
// $Id$

require_once '../../../lib-common.php';

// Only let admin users access this page
if ( !SEC_hasRights( 'themedit.admin' ) ) {
    // Someone is trying to illegally access this page
    COM_errorLog( "Someone has tried to illegally access the themedit Admin page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR",1 );
    $display  = COM_siteHeader();
    $display .= COM_startBlock( $LANG_THM['access_denied'] );
    $display .= $LANG_THM['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter( true );
    echo $display;
    exit;
}
 
/**
* Main
*/

$sys_message = '';
$file = '';
$vars = array();
$op = '';
$contents = '';

// Checks if themes and/or files are added and/or deleted

switch ( strtolower( $_THM_CONF['resync_database'] ) ) {
	case 'auto':
		$diff = THM_isAddedOrRemoved();
		if ( count( $diff['added'] ) > 0 || count( $diff['removed'] ) > 0 ) {
			THM_updateAll();
		}
		break;
	case 'manual':
		$diff = THM_isAddedOrRemoved();
		if ( count( $diff['added'] ) > 0 || count( $diff['removed'] ) > 0 ) {
			$link = $_CONF['site_admin_url'] . '/plugins/themedit/index.php?op=updateall';
			$sys_message .= str_replace( '%s', $link, $LANG_THM['file_changed'] );
		}
		break;
	case 'ignore':
		break;
}

// Retrieve $_GET/$_POST vars

$theme_names = THM_getAllowedThemes();
$theme = $theme_names[0];

// Undo magic_quotes if necessary

if ( get_magic_quotes_gpc() == 1 ) {
	$_GET  = array_map( 'stripslashes', $_GET );
	$_POST = array_map( 'stripslashes', $_POST );
}
if ( isset( $_POST['thm_theme'] ) ) {
	$req_theme = COM_applyFilter( $_POST['thm_theme'] );
} else if ( isset( $_GET['thm_theme'] ) ) {
	$req_theme = COM_applyFilter( $_GET['thm_theme'] );
}
if ( in_array( $req_theme, $theme_names ) ) {
	$theme = $req_theme;
}

if ( isset( $_POST['thm_file'] ) ) {
	$req_file = COM_applyFilter( $_POST['thm_file'] );
} else if ( isset( $_GET['thm_file'] ) ) {
	$req_file = COM_applyFilter( $_GET['thm_file'] );
}
if ( in_array( $req_file, $_THM_CONF['allowed_files'] ) ) {
	$file = $req_file;
}

if ( isset( $_POST['thm_op'] ) ) {
	$op = COM_applyFilter( $_POST['thm_op'] );
} else if ( isset( $_GET['op'] ) ) {
	$op = COM_applyFilter( $_GET['op'] );
}
if ( $op == '' && $file != '' ) {
	$op = 'load';
}

if ( isset( $_POST['theme_contents'] ) ) {
	$contents = $_POST['theme_contents'];
}

// Checks if $file is writable

if ( ! empty( $file ) ) {
	if ( ! THM_isWritable( $theme, $file ) ) {
		$sys_message .= $LANG_THM['not_writable'];
	}
}

// Operation

if ( $op == $LANG_THM['save'] ) {
	$result = THM_saveFile( $theme, $file, $contents );
	if ( $result ) {
		$sys_message = $LANG_THM['save_success'];
	} else {
		$sys_message = $LANG_THM['save_fail'];
	}
} else if ( $op == $LANG_THM['init'] ) {
	$result = THM_initFile( $theme, $file );
	if ( $result ) {
		$contents = THM_getContents( $theme, $file );
		$sys_message = $LANG_THM['init_success'];
	} else {
		$sys_message = $LANG_THM['init_fail'];
	}
} else if ( $op == 'updateall' ) {
	THM_updateAll();
} else if ( $op == $LANG_THM['image'] ) {
	header( 'Location: ' . $_CONF['site_admin_url'] . '/plugins/themedit/upload.php' );
	exit;
}

// Display

$display = COM_siteHeader();
$T = new Template( $_CONF['path'] . 'plugins/themedit/templates' );
$T->set_file( 'admin', 'admin.thtml' );
// To prevent template engine from removing template vars loaded in <textarea>
$T->set_unknowns( 'keep' );
$T->set_var( 'temp_site_url', $_CONF['site_url'] );
$T->set_var( 'temp_site_admin_url', $_CONF['site_admin_url'] );
$T->set_var( 'temp_header', $LANG_THM['admin'] );
$code4preview = <<<EOD1
<script type="text/javascript">
<!--
	window.open( "{$_CONF['site_admin_url']}/plugins/themedit/preview.html", "PREVIEW" );
//-->
</script>
EOD1;

if ( $op == $LANG_THM['preview'] ) {
	// If a file is being edited, first swap its contents with that of the
	// corresponding file saved on the Web, then create a preview, and finally
	// restore the file contents
	if ( ! empty( $file ) ) {
		$path_parts = pathinfo( $file );
		$is_css = ( strtolower( $path_parts['extension'] ) == 'css' );
		if ( $is_css ) {
			$fh = fopen( $_CONF['path_html'] . 'admin/plugins/themedit/preview.css', 'wb' );
			if ( $fh !== false ) {
				fwrite( $fh, $contents );
				fclose( $fh );
			}
		} else {
			$org_contents = THM_getContents( $theme, $file );
			THM_saveFile( $theme, $file, $contents );
		}
	}
	
	$preview = THM_getPreview();
	
	if ( ! empty( $file ) && ! $is_css ) {
		THM_saveFile( $theme, $file, $org_contents );
	}
	
	$preview = preg_replace( '/( ^.*?<title> ).*?( <\/title>.*$ )/mi', '$1' . $LANG_THM['preview'] . '$2', $preview );
	list( , $dummy ) = explode( ' ', microtime() );
	
	// To make sure your browser reads a CSS file afresh, not from cache
	if ( $is_css ) {
		$css_path = $_CONF['site_url'] . '/layout/' . $theme . '/' . $file;
		$alt_css_path = $_CONF['site_admin_url'] . '/plugins/themedit/preview.css?dummy=' . $dummy;
		$pos = strpos( strtolower( $preview ), strtolower( $css_path ) );
		COM_errorLog( '$preview: ' . $preview . "\r\n" . '$css_path: ' . $css_path );
		if ( $pos !== false ) {
			$preview = substr( $preview, 0, $pos ) . $alt_css_path . substr( $preview, $pos + strlen( $css_path ) );
		}
//		$preview = str_replace( $css_path, $alt_css_path, $preview );
	} else {
		$preview = preg_replace( 
			'/( ^.*? )( href=".*\.css )( ".*$ )/im',
			'$1$2?dummy=' . $dummy . '$3',
			$preview
		 );
	}
	$fh = fopen( $_CONF['path_html'] . 'admin/plugins/themedit/preview.html', 'wb' );
	if ( $fh !== false ) {
		fwrite( $fh, $preview );
		fclose( $fh );
	}
	$T->set_var( 'temp_preview_code', $code4preview );
} else {
	$T->set_var( 'temp_preview_code', '' );
}

if ( empty( $sys_message ) ) {
	$T->set_var( 'temp_sys_message', '' );
} else {
	$T->set_var( 
		'temp_sys_message',
		'<p style="border: solid 2px red; padding: 5px;">' . $sys_message . '</p>'
	 );
}
$T->set_var( 'temp_lang_script_disabled', '<p style="color: red; font-weight: bold;">' . $LANG_THM['script_disabled'] . '</p>' );
$T->set_var( 'temp_lang_select', $LANG_THM['select'] );
$T->set_var( 'temp_lang_theme_edited', $LANG_THM['theme_edited'] );
$T->set_var( 'temp_lang_file_edited', $LANG_THM['file_edited'] );

// Set theme name drop down list

$themes4html = '';
foreach ( $theme_names as $theme_name ) {
	if ( $theme_name == $theme ) {
		$themes4html .= "<option value='{$theme_name}' selected='selected'>";
	} else {
		$themes4html .= "<option value='{$theme_name}'>";
	}
	$themes4html .= htmlspecialchars(  $theme_name, ENT_QUOTES  ) . '</option>' . LB;
}
$T->set_var( 'temp_themes', $themes4html );

// Set template/css name drop down list

if ( $file == '' ) {
	$files4html = '<option selected="selected">';
} else {
	$files4html = '<option>';
}
$files4html .= '-</option>' . LB;
foreach ( $_THM_CONF['allowed_files'] as $allowed_file ) {
	if ( $allowed_file == $file ) {
		$files4html .= "<option value='{$allowed_file}' selected='selected'>";
	} else {
		$files4html .= "<option value='{$allowed_file}'>";
	}
	$files4html .= htmlspecialchars(  $LANG_THM[$allowed_file], ENT_QUOTES  )
			    . '</option>' . LB;
}
$T->set_var( 'temp_files', $files4html );

// Load template vars & file contents

if ( ! empty( $file ) ) {
	$vars = THM_getTemplateVars( $theme, $file );
}
if ( $op == 'load' ) {
	$contents = THM_getContents( $theme, $file );
}
$contents4html = htmlspecialchars( $contents, ENT_QUOTES, $_CONF['default_charset'] );

// In case of a template file, show a list of vars available

$vars4html = '';
if ( count( $vars ) > 0 ) {
	$vars4html .= '<table style="border: solid 1px #7F9DB9; padding: 5px; width: 100%">';
	$vars4html .= '<caption style="text-align: center; color: white; background-color: #7F9DB9;">';
	$vars4html .= $LANG_THM['vars_available'] . '</caption>';
	$vars4html .= '<tr>';
	for ( $i = 0, $j = 0; $i < count( $vars ); $i ++ ) {
		$vars4html .= '<td width="150"><button type="button" title="';
		$vars4html .= $LANG_THM["help_{$vars[$i]}"] . '" onClick="insert_var( \'' . $vars[$i]. '\' )"';
		$vars4html .= ' style="color: white; background-color: #333366;">';
		$vars4html .= $vars[$i] . '</button></td>';
		$j ++;
		if ( $j % 4 == 0 ) {
			$vars4html .= '</tr>' . LB . '<tr>';
		}
	}

	$vars4html .= '</tr>' . LB;
	$vars4html .= '</table>' . LB;
}

$T->set_var( 'temp_vars', $vars4html );
$T->set_var( 'temp_contents', $contents4html );
$T->set_var( 'temp_lang_preview', $LANG_THM['preview'] );
$T->set_var( 'temp_lang_save', $LANG_THM['save'] );
$T->set_var( 'temp_lang_image', $LANG_THM['image'] );
$T->set_var( 'temp_lang_init', $LANG_THM['init'] );

$T->parse( 'output','admin' );
$display .= $T->finish( $T->get_var( 'output' ) );
$display .= COM_siteFooter();

echo $display;

?>
