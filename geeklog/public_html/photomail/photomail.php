<?php
require_once ('../lib-common.php');
require_once ($_CONF['path_system'] . 'lib-story.php');
require ($_CONF['path'].'system/custom/custom_photomail.php');

//↓ログを表示している場合
//↓これをコメントアウトしたら、ホームに戻らないので
//↓ログ表示が確認できます。
echo COM_refresh ($_CONF['site_url'] . '/index.php');

?>
