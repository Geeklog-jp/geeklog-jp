<?php
// +---------------------------------------------------------------------------+
// | グループ詳細を日本語版化する                                              |
// +---------------------------------------------------------------------------+
// $Id: sql_japanize5.php
// もし万一エンコードの種類が  utf-8でない場合は、utf-8に変換してください。
// 最終更新日　2007/07/29 tsuchi AT geeklog DOT jp


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'すべての管理へのアクセス'
    WHERE grp_name = 'Root'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'すべてのユーザ'
    WHERE grp_name = 'All Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '記事管理へのアクセス'
    WHERE grp_name = 'Story Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ブロック管理へのアクセス'
    WHERE grp_name = 'Block Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '話題管理へのアクセス'
    WHERE grp_name = 'Topic Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ユーザ管理へのアクセス'
    WHERE grp_name = 'User Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'プラグイン管理へのアクセス'
    WHERE grp_name = 'Plugin Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ユーザとグループ管理へのアクセス'
    WHERE grp_name = 'Group Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'メール管理へのアクセス'
    WHERE grp_name = 'Mail Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'すべての登録ユーザ'
    WHERE grp_name = 'Logged-in Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'プラグイン管理へのアクセス'
    WHERE grp_name = 'spamx Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'リモートユーザ'
    WHERE grp_name = 'Remote Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'RSS配信管理へのアクセス'
    WHERE grp_name = 'Syndication Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'カレンダ管理へのアクセス'
    WHERE grp_name = 'Calendar Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'リンク管理へのアクセス'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'アンケート管理へのアクセス'
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
    grp_descr = '日本語化管理へのアクセス'
    WHERE grp_name = 'japanize Admin'
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

?>
