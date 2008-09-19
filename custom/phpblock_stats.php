<?php

/**
 * スタッツを表示するブロック。
 * 2006-10-21 Yohichi Yagi.
**/
function phpblock_stats() {
    // グローバル変数
    global $_CONF, $_TABLES, $LANG10;

    // インクルード
    require_once($_CONF['path_system'] . 'lib-admin.php');

    // 生成するHTML
    $disp .= '<div style="text-align:center">';
    $disp .= COM_NumberFormat(DB_getItem($_TABLES['vars'], 'value', "name = 'totalhits'"));
    $disp .= '</div>';
    // HTMLを戻す
    return $disp;
}

?>