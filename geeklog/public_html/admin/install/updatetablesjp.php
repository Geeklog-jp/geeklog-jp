<?php
// +---------------------------------------------------------------------------+
// | テーブル構造とデータを日本語版化する                                      |
// |  処理                                                                     |
// +---------------------------------------------------------------------------+
// $Id: updatetablesjp.php
// modified 20070108 tsuchi AT geeklog DOT jp

require_once ('../../lib-common.php');

//if (file_exists($_CONF['path_html']. 'admin/install/sql_'.$_CONF['language'].'_1.php')) {
//テーブル構造とシステム用データ
if (file_exists('sql_'.$_CONF['language'].'_1.php')) {
    require_once ('sql_'.$_CONF['language'].'_1.php');
}
//日本語版初期登録データ
if (file_exists('sql_'.$_CONF['language'].'_2.php')) {
    require_once ('sql_'.$_CONF['language'].'_2.php');
}

//日本語版更新実行
for ($i = 1; $i <= count($_SQL); $i++) {
    DB_query(current($_SQL));
    next($_SQL);
}

//次画面表示
if (file_exists('success.php')) {
    $nextpg=$_CONF['site_admin_url'] . '/install/success.php?lang=' .$_CONF['language'];
}else{
    $nextpg=$_CONF['site_url'] . '/index.php';
}
echo COM_refresh ($nextpg );


?>
