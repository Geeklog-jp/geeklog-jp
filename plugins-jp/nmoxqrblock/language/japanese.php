<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/language/japanese.php                         |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007-2012 by nmox                                           |
// |                            mystral-kk - geeklog AT mystral-kk DOT net     |
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

$LANG_NMOXQRBLOCK = array(
	'plugin'            => 'nmoxqrblock',
	'access_denied'     => 'アクセスは拒否されました。',
	'access_denied_msg' => 'Rootユーザーしかこのページにはアクセスできません。あなたのユーザー名とIPアドレスは記録されました。',
	'install_header'	=> 'プラグインのインストール/アンインストール',
	'installed'         => 'このプラグインはサイトの設定をブラウザから変更することができるようにするプラグインです。',
	'uninstalled'       => '現在、QRブロックプラグインはインストールされていません。インストールする場合は 下記のインストールボタンを押して下さい。',
	'install_success'	=> 'インストールに成功しました。',
	'install_failed'	=> 'インストールに失敗しました。詳細はエラーログ(error.log)をご覧ください。',
	'uninstall_msg'		=> 'QRブロックプラグインはアンインストールされました。',
	'install'           => 'インストール',
	'uninstall'			=> 'アンインストール',
	'title_block'		=> 'QRコード',
);

// Localization of the Admin Configuration UI
$LANG_configsections['nmoxqrblock'] = array(
	'label' => $LANG_NMOXQRBLOCK['plugin'],
	'title' => $LANG_NMOXQRBLOCK['plugin'] . 'の設定',
);

$LANG_confignames['nmoxqrblock'] = array(
	'image_type'	=> '画像タイプ',
	'ecc_level'		=> 'エラー訂正レベル',
	'module_size'	=> 'モジュールサイズ',
);

$LANG_configsubgroups['nmoxqrblock'] = array(
	'sg_main' => '主要設定'
);

$LANG_fs['nmoxqrblock'] = array(
	'fs_main'        => $LANG_NMOXQRBLOCK['plugin'] . 'の主要設定',
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['nmoxqrblock'] = array(
	 0 => array('はい' => 1, 'いいえ' => 0),
	 1 => array('はい' => TRUE, 'いいえ' => FALSE),
	12 => array('JPEG' => 'J', 'PNG' => 'P'),
	13 => array('L' => 'L', 'M' => 'M', 'Q' => 'Q', 'H' => 'H'),
);
