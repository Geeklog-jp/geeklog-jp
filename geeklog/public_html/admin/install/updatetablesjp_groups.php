<?php
// +---------------------------------------------------------------------------+
// | プラグインの管理グループ記述を日本語版化する                              |
// +---------------------------------------------------------------------------+
// $Id: updatetablesjp_groups.php
// 最終更新日　2007/03/21 tsuchi AT geeklog DOT jp

require_once ('../../lib-common.php');

if (file_exists('sql_'.$_CONF['language'].'_groups.php')) {
    require_once ('sql_'.$_CONF['language'].'_groups.php');
}
for ($i = 1; $i <= count($_SQL); $i++) {
    DB_query(current($_SQL));
    next($_SQL);
}
?>
