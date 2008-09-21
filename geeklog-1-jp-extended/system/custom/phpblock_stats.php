<?php

/**
* 訪問者数を表示するブロック。
* 2006-10-21 Yohichi Yagi.
*/
function phpblock_stats() {
    global $_TABLES;
	
    $disp = '<div id="phpblock_stats">'
		  . COM_NumberFormat(DB_getItem($_TABLES['vars'], 'value', "name = 'totalhits'"))
		  . '</div>';
    return $disp;
}
