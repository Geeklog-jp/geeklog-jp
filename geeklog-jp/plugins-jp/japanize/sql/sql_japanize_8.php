<?php
// +---------------------------------------------------------------------------+
// | 日本語メールをgeeklogjp仕様にする                                         |
// +---------------------------------------------------------------------------+
// $Id: sql_japanize_8.php
// もし万一エンコードの種類が  utf-8でない場合は、utf-8に変換してください。
// 最終更新日　2009/08/12 tsuchi AT geeklog DOT jp

$_SQL[] = "UPDATE {$_TABLES['vars']} "
		. "SET value = '1' "
		. "WHERE (name = 'japanize_custommail') ";
