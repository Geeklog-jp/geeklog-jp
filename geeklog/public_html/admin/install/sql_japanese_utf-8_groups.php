<?php
// +---------------------------------------------------------------------------+
// | プラグインの管理グループ記述を日本語版化する                              |
// |  updatetablesjp_groups.php から require                                   |
// |  SQL文データ                                                              |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_utf-8_groups.php
// もし万一エンコードの種類が  utf-8でない場合は、utf-8に変換してください。
// 最終更新日　2007/03/21 tsuchi AT geeklog DOT jp

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'カレンダ管理へのアクセス'
    WHERE grp_name = 'Calendar Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'dbman管理へのアクセス'
    WHERE grp_name = 'dbman Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ファイル管理へのアクセス'
    WHERE grp_name = 'filemgmt Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '掲示板管理へのアクセス'
    WHERE grp_name = 'forum Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '掲示板管理へのアクセス'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'リンク管理へのアクセス'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '投票管理へのアクセス'
    WHERE grp_name = 'Polls Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'スパム管理へのアクセス'
    WHERE grp_name = 'spamx Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '静的ページ管理へのアクセス'
    WHERE grp_name = 'Static Page Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'テーマエディタ管理へのアクセス'
    WHERE grp_name = 'themedit Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'コンフィグエディタ管理へのアクセス'
    WHERE grp_name = 'userconfig Admin'
    ";

?>
