<?php
// +---------------------------------------------------------------------------+
// | プラグインの管理グループ記述を日本語版化する                              |
// | プラグインのデータを日本語版化する                                        |
// |  public_html/admin/plugins.php から require                               |
// +---------------------------------------------------------------------------+
// $Id: grpdescr_updatejp.php
// modified 20070329 tsuchi AT geeklog DOT jp

//require_once ('../lib-common.php');

if (file_exists('grpdescr_'.$_CONF['language'].'.php')) {
    require_once ('grpdescr_'.$_CONF['language'].'.php');
}
if (file_exists('plgsql_'.$_CONF['language'].'.php')) {
    require_once ('plgsql_'.$_CONF['language'].'.php');
}

$sql = "SELECT grp_name FROM {$_TABLES['groups']} ORDER BY grp_id DESC";
$result = DB_query( $sql );
$c = DB_fetchArray( $result );
$grpname = $c['grp_name'];
$function="grpdescr";
if (function_exists($function)) {
    $grpdescr=$function($grpname);
}
if ($grpdescr !="") {
    $sql = "
        UPDATE   {$_TABLES['groups']} SET 
        grp_descr = '$grpdescr'
        WHERE grp_name = '$grpname'
        ";
    DB_query($sql);
}
//
$function="plgsql";
if (function_exists($function)) {
    $plgsql=$function($grpname);
}
if (!empty($plgsql)) {
    for ($i = 1; $i <= count($plgsql); $i++) {
        DB_query(current($plgsql));
        next($plgsql);
    }
}

?>
