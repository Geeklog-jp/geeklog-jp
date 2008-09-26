<?php
// +---------------------------------------------------------------------------+
// | グループ詳細を英語に戻す                                                  |
// +---------------------------------------------------------------------------+
// $Id: sql_japanize105.php
// もし万一エンコードの種類が  utf-8でない場合は、utf-8に変換してください。
// 最終更新日　2007/07/29 tsuchi AT geeklog DOT jp

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to the site'
    WHERE grp_name = 'Root'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Group that a typical user is added to'
    WHERE grp_name = 'All Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to story features'
    WHERE grp_name = 'Story Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to block features'
    WHERE grp_name = 'Block Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to topic features'
    WHERE grp_name = 'Topic Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to topic features'
    WHERE grp_name = 'User Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to plugin features'
    WHERE grp_name = 'Plugin Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to plugin features'
    WHERE grp_name = 'Group Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Can use Mail Utility'
    WHERE grp_name = 'Mail Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'All registered members'
    WHERE grp_name = 'Logged-in Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to plugin features'
    WHERE grp_name = 'spamx Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Users in this group can have authenticated against a remote server.'
    WHERE grp_name = 'Remote Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Can create and modify web feeds for the site'
    WHERE grp_name = 'Syndication Admin'
    ";



$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to calendar features'
    WHERE grp_name = 'Calendar Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to links features'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to polls features'
    WHERE grp_name = 'Polls Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Users in this group can administer the Spam-X plugin'
    WHERE grp_name = 'spamx Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Can administer static pages'
    WHERE grp_name = 'Static Page Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Has full access to japanize features'
    WHERE grp_name = 'japanize Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Users in this group can administer the filemgmt plugin'
    WHERE grp_name = 'filemgmt Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'Users in this group can administer the forum plugin'
    WHERE grp_name = 'forum Admin'
    ";

?>
