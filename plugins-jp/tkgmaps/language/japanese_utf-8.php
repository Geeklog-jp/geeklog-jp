<?php

// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog - The Ultimate Weblog                          |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/tkgmaps/language/japanese_utf-8.php                       |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2009-2010 hiroron - hiroron AT hiroron DOT com              |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), strtolower(basename(__FILE__))) !== FALSE) {
    die('This file can not be used on its own!');
}

global $LANG32;

$LANG_TKGMAPS = array (
    'plugin'            => 'GoogleMaps',
    'admin'             => 'GoogleMaps管理',
    'access_denied'     => 'アクセスは拒否されました。',
    'access_denied_msg' => 'このページにアクセスできるのは，Rootユーザだけです。あなたのユーザ名とIPアドレスは記録されました。',
);

$LANG_TKGMAPS_ADMIN = array (
    'instructions'      => 'ファイルからの地点情報作成は「一括登録」を、反対に地点情報からファイルへの出力は「一括書出」をクリックしてください。',
    'mg2instructions'  => 'MGからの地点情報作成は「MGからポイント生成」をクリックしてください。',
    'mg2point'          => 'MGからポイント生成',
    'notmediagallery'   => 'メディアギャラリが入っていないか有効ではありません。もしくはコンフィギュレーションにてメディアギャラリとの連携が無効です。',
    'mg2point_title'    => 'メディアギャラリから地点情報を取り込みポイント生成',
    'mg2point_message'  => '日時を指定してください。入力された日時以降に登録されたメディアギャラリの画像をGmapへ反映いたします。空白のまま送信するとすべてを対象にして反映します。',
    'mg2point_date'     => '日時',
    'mg2point_datehelp' => '※）YYYY-DD-MM（例）',
    'mg2point_submit'   => 'MGからの取り込みを実行',
    'mg2point_error'    => 'エラー。',
    'mg2point_err_date' => 'は有効な日時ではありません。',
    'mg2point_exec_message' => '%sを対象にGmapへ位置情報の取り込みが完了しました。',
    'mg2point_exec_msg_all' => 'メディアギャラリにアップされた全てのデータ',
    'mg2point_exec_msg_date' => '%s日以降に登録されたデータ',
    'mg2point_exec_mg'  => 'MGから位置情報が抽出された件数',
    'mg2point_exec_tag' => '反映対象となる位置情報の件数',
    'mg2point_exec_ins' => '実際に追加した位置情報の件数',
    'mg2point_exec_insted' => 'すでに追加済みな位置情報の件数',
    'mg2point_exec_count' => '%d件',
    'mgdisp_pointmap_desc' => '画像の場所',
    'file2point'        => '一括登録',
    'file2point_title'  => 'ファイルから一括でポイント生成',
    'file2point_message' => '取り込むファイルを指定して、そのファイルの形式を選択してください。そしてポイント情報を反映するターゲットとIDを入力してください。',
    'file2point_file'   => 'ファイル',
    'file2point_filestyle' => 'ファイルの形式',
    'file2point_target' => '反映先とID',
    'file2point_submit' => 'ファイルから一括登録を実行',
    'file2point_error_file' => 'ファイルを指定してください。',
    'file2point_error_filestyle' => 'ファイル形式を指定してください。',
    'file2point_error_target' => '反映先を指定してください。',
    'file2point_error_targetid' => '反映先のIDを指定してください。',
    'file2point_move_error' => 'アップロードされたファイル %s を移動/コピー中にエラーが発生しました。',
    'file2point_upload_error' => 'ファイルがアップロードできませんでした。ファイルを保存するディレクトリのパーミッションを確認してください。',
    'file2point_upload_not_found' => 'アップロードされたファイルが見つかりません。Webサーバーのエラーログをチェックしてください。',
    'file2point_target_not_found' => '反映先に指定されたIDが存在しません。',
    'file2point_exec_message' => '%sを対象にGmapへ位置情報の取り込みが完了しました。',
    'file2point_exec_line'  => 'ファイルの行数',
    'file2point_exec_fileerr' => 'ファイルから抽出エラー件数',
    'file2point_exec_total' => '反映対象となる位置情報の件数',
    'file2point_exec_insted' => '実際に追加した位置情報の件数',
    'file2point_exec_count' => '%d件',
    'point2file'        => '一括書出',
    'point2file_title'  => 'ポイント情報を一括でファイルへ出力',
    'point2file_message' => '出力したいポイント情報のターゲットとIDを入力してください。そしてファイルの形式を選択してください。',
    'point2file_target' => 'ターゲットとID',
    'point2file_filestyle' => 'ファイルの形式',
    'point2file_filename'  => 'ファイル名',
    'point2file_submit' => 'ポイント情報からファイルを作成',
    'point2file_error_target' => 'ターゲットを指定してください。',
    'point2file_error_targetid' => 'ターゲットのIDを指定してください。',
    'point2file_error_filestyle' => 'ファイル形式を指定してください。',
    'point2file_error_filename' => 'ファイル名を指定してください。',
    'point2file_target_not_found' => 'ターゲットに指定されたIDが存在しません。',
    'point2file_point_not_found' => 'ターゲットIDにはダウンロードできるデータが存在しません。',
);

// Localization of the Admin Configuration UI
$LANG_configsections['tkgmaps'] = array(
    'label'             => $LANG_TKGMAPS['plugin'],
    'title'             => $LANG_TKGMAPS['plugin'] . 'の設定',
);

$LANG_configsubgroups['tkgmaps'] = array(
    'sg_main'           => '主要設定',
    'sg_mediagallery'   => 'メディアギャラリ'
);

$LANG_fs['tkgmaps'] = array(
    'fs_main'           => $LANG_TKGMAPS['plugin'] . 'の主要設定',
    'fs_controls'       => $LANG_TKGMAPS['plugin'] . 'のデフォルトコントロール',
    'fs_maptypes'       => $LANG_TKGMAPS['plugin'] . 'のデフォルトマップ切替の種類',
    'fs_mediagallery'   => $LANG_TKGMAPS['plugin'] . 'とメディアギャラリの連携機能の設定',
    'fs_mginfo'         => 'MGから取り込む際の情報ウィンドウの設定',
    'fs_mgtagdisp'      => 'MGでの自動タグ表示の設定'
);

$LANG_confignames['tkgmaps'] = array(
    'gmapapikey'        => 'GoogleMaps API Key',
    'setmaptype'        => 'デフォルトのマップ種類',
    'infodispevent'     => '情報ウィンドウを表示する操作',
    'infodispcenter'    => '情報ウィンドウを地図中央で表示する',
    'largectrl'         => '大きいコントロール',
    'smallctrl'         => '小さいコントロール',
    'smallzoomctrl'     => '小さいズームコントロール',
    'maptypectrl'       => 'マップ種類切替コントロール',
    'overviewctrl'      => 'オーバービューコントロール',
    'scalectrl'         => 'スケールコントロール',
    'maptypes'          => 'マップ切替の種類',
    'mg2gmaps'          => 'MGとの連携機能を有効にする',
    'mg2duplication'    => '重複チェックする',
    'mginfoformat'      => '情報ウィンドウの表示フォーマット',
    'mginfoimgformat'   => '画像の表示フォーマット(image)',
    'mginfokeywordsformat' => 'キーワードの表示フォーマット(keywords)',
    'mginfoexifformat'  => '撮影情報の表示フォーマット',
    'mgdispmgpoint'     => 'mgpointタグの位置情報を地図で表示する',
    'mgpointmapdesc'    => '地図の説明',
    'mgpointmapdesc_pos' => '地図の説明の表示場所',
    'mgpointmapwidth'   => '地図の横サイズ(width)',
    'mgpointmapheight'  => '地図の縦サイズ(height)',
    'mgpointmapzoom'    => '地図のズーム(zoom)',
    'mgpointmaptype'    => '地図のデフォルトのマップ種類',
    'mgdispmgexif'      => 'mgexifタグの撮影情報を表示する',
);

$LANG_configselects['tkgmaps'] = array(
    0 => array('はい' => 1, 'いいえ' => 0),
    1 => array('地図の上' => 1, '地図の下' => 0),
    2 => array('クリック' => 'click', 'ダブルクリック' => 'dblclick', 'マウスオーバー' => 'mouseover'),
);

// Messages for the plugin upgrade
$PLG_tkgmaps_MESSAGE3001 = 'プラグインのアップグレードに失敗しました。';
$PLG_tkgmaps_MESSAGE3002 = $LANG32[9];

?>