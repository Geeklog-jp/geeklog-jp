<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.4                                                               |
// +---------------------------------------------------------------------------+
// | check_files.php                                                           |
// |                                                                           |
// | Geeklog check installation script                                         |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007 Author: mystral-kk - geeklog AT mystral-kk DOT net     |
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
// $Id: check.php,v 1.8 2006/01/28 17:48:49 dhaun Exp $

/**
* This script checks if all the files in the archive have been uploaded properly.
*
* @author   mystral-kk - geeklog AT mystral-kk DOT net
* @summary  このスクリプトは，インストール用のファイルのリスト(file_list.php)を
*			作成・チェックします。
* @version  2007_11_03
* @usage	リストを作成するには，Webブラウザから public_html/admin/install/
*			check_files.php?action=build&path_config=config.phpのパス を入力し
*			ます。
*			リストをチェックするには，他のファイルから
*			CHKF_checkFiles( config.phpのパス )を呼び出します。 返り値が''でなけ
*			れば，エラーが発生している可能性があります。
*/

require_once dirname( __FILE__ ) . '/file_list.php';
if ( !defined( 'LB' ) ) {
	define( 'LB', "\n" );
}

//=================
// Functions
//=================

// public_htmlのパスを得る

function CHKF_getPathToPublicHTML() {
	$path_public = realpath( dirname( __FILE__ ) . '/../../' );
	$path_public = str_replace( "\\", '/', $path_public ) . '/';
	return $path_public;
}

// config.phpのパスをチェック

function CHKF_checkPathToConfig( $path ) {
	if ( empty( $path ) ) {
		echo 'Error: "path_config" parameter is missing.<br>';
		return false;
	}
	
	$path = str_replace( "\\", '/', $path );
	if ( substr( $path, -1 ) != '/' ) {
		$path .= '/';
	}
	
	if ( !file_exists( $path . 'config.php' ) ) {
		echo 'Error: "path_config" parameter is wrong.  Cannot find "config.php".<br>';
		return false;
	}
	
	return $path;
}

// インストール用ファイルの存在とサイズをチェック
// @param  $path_config - string: config.phpのパス（'config.php'を含まない）
// @return              - string: '' （成功時）
//                                 エラーメッセージ

function CHKF_checkFiles( $path_config ) {
	global $files_to_install;
	
	$retval = '';
	$path_public = CHKF_getPathToPublicHTML();
	$path_config = CHKF_checkPathToConfig( $path_config );
	if ( $path_config === false ) {
		die( 'Cannot check the files to install.<br>' );
	}
	clearstatcache();
	
	// public_html
	foreach ( $files_to_install["public_html"] as $filename => $size ) {
		if ( file_exists( $path_public . $filename ) ) {
			if ( $filename == 'lib-common.php' || $filename == 'admin/install/file_list.php' ) {
				continue;
			} else {
				if ( filesize( $path_public . $filename ) != $size ) {
					$retval .= '[B] public_html/' . $filename . ' could be broken.<br>' . LB;
				}
			}
		} else {
			$retval .= '[M] public_html/' . $filename . ' is missing.<br>' . LB;
		}
	}
	
	// private
	foreach ( $files_to_install["private"] as $filename => $size ) {
		if ( file_exists( $path_config . $filename ) ) {
			if ( $filename == 'config.php' ) {
				continue;
			} else {
				if ( filesize( $path_config . $filename ) != $size ) {
					$retval .= '[B] private/' . $filename . ' could be broken.<br>' . LB;
				}
			}
		} else {
			$retval .= '[M] private/' . $filename . ' is missing.<br>' . LB;
		}
	}
	
	return $retval;
}

function CHKF_buildList( $path, $len_base_path_len ) {
	global $fh;
	
	$retval = 0;
	
	$dh = @opendir( $path );
	while ( ( $entry = readdir( $dh ) ) !== false ) {
		if ( strcasecmp( $entry, 'thumb.db' ) == 0 ) {
			continue;
		}
		
		$next_path = $path . '/' . $entry;
		if ( is_dir( $next_path ) ) {
			if ( $entry != '.' && $entry != '..' ) {
				$retval += CHKF_buildList( $next_path, $len_base_path_len );
			}
		} else {
			$info = pathinfo( $next_path );
			if ( isset( $info['extension'] ) AND $info['extension'] == 'bak' ) {
				continue;
			}
			
			$size = filesize( $next_path );
			fwrite( $fh, "    '" . str_replace( "'", "\'", substr( $next_path, $len_base_path_len + 1 ) ) . "' => {$size}," . LB );
			$retval ++;
		}
	}
	
	closedir( $dh );
	return $retval;
}

//=================
// MAIN
//=================

$action = '';
$path_config = '';

if ( isset( $_GET['action'] ) ) {
	$action = $_GET['action'];
	$path_config = isset( $_GET['path_config'] ) ? $_GET['path_config'] : '';
	$path_config = CHKF_checkPathToConfig( $path_config );
}

switch ( $action ) {
	case 'check':
		$retval = CHKF_checkFiles( $path_config );
		echo $retval;
		break;
	
	case 'build':
		$fh = @fopen( dirname( __FILES__ ) . '/file_list.php', "wb" );
		if ( $fh === false ) {
			echo 'Cannot write into \'public_html/admin/install/file_list.php<br>' . LB;
			exit;
		}
		
		// header
		$header = <<<EOD
<?php
// Files to install

// public_html section

EOD;
		fwrite( $fh, $header );
		
		// public_html
		clearstatcache();
		list ( $b_msec, $b_sec ) = explode( ' ', microtime() );
		fwrite( $fh, '$files_to_install["public_html"] = array (' . LB );
		$num_public = CHKF_buildList( CHKF_getPathToPublicHTML(),
			strlen( CHKF_getPathToPublicHTML() )
		);
		fwrite( $fh, ');' . LB );
		list ( $e_msec, $e_sec ) = explode( ' ', microtime() );
		fwrite( $fh, '// processed ' . $num_public . ' files in ' . ( $e_sec + $e_msec - $b_sec - $b_msec ) . 'seconds' . LB );

		// private
		fwrite( $fh, '' . LB );
		fwrite( $fh, '// private section' . LB );
		list ( $b_msec, $b_sec ) = explode( ' ', microtime() );
		fwrite( $fh, '$files_to_install["private"] = array (' . LB );
		$num_private = CHKF_buildList( $path_config, strlen( $path_config ) );
		fwrite( $fh, ');' . LB );
		list ( $e_msec, $e_sec ) = explode( ' ', microtime() );
		fwrite( $fh, '// processed ' . $num_private . ' files in ' . ( $e_sec + $e_msec - $b_sec - $b_msec ) . 'seconds' . LB );
		
		// footer
		fwrite( $fh, '// End Of File' . LB );
		fwrite( $fh, '?>' . LB );
		fclose( $fh );
		break;
	
	default:
		break;
}

?>
