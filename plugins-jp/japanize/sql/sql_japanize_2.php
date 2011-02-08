<?php
// +---------------------------------------------------------------------------+
// | コンフィギュレーションを日本語版化する                                    |
// +---------------------------------------------------------------------------+
// $Id: sql_japanize2.php
// もし万一エンコードの種類が  utf-8でない場合は、utf-8に変換してください。
//2008/09/11 サイト･･･無効のURL変更
//2010/11/09 言語とロケール変更追加

//【サイト】
//サイト･･･無効のメッセージまたはURL
$wk= serialize("{$_CONF['site_url']}/japanize/disabledmsg.html");

$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$wk}'
    WHERE name = 'site_disabled_msg' AND group_name='Core'
    ";
//シンジケーション･･･フィードの言語
$wk= serialize('ja');
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$wk}'
    WHERE name = 'rdf_language'
    ";
//【ブロック】
//管理者ブロック･･･リンクをソートする いいえ　0:表示しない
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'b:0;'
    WHERE name = 'sort_admin' AND group_name='Core'
    ";
//話題ブロック･･･記事投稿数を表示する いいえ　0:表示しない
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'b:0;'
    WHERE name = 'showsubmissioncount' AND group_name='Core'
    ";
//話題ブロック･･･Homeへのリンクを隠す はい　1:隠す
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'b:1;'
    WHERE name = 'hide_home_link' AND group_name='Core'
    ";
//【ユーザと投稿】
//コメント･･･コメント形状 flat:一覧
$wk= serialize('flat');
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$wk}'
    WHERE name = 'comment_mode' AND group_name='Core'
    ";
//【画像】
//画像ライブラリ･･･画像ライブラリ:GDライブラリ
$wk= serialize('gdlib');
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$wk}'
    WHERE name = 'image_lib' AND group_name='Core'
    ";
//画像ライブラリ･･･記事の画像高さの最大値:120ピクセル
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'i:120;'
    WHERE name = 'max_image_height' AND group_name='Core'
    ";
//【言語とロケール】
//----------------------------------------------------------
if (strtoupper(substr(PHP_OS, 0, 3)) == 'WIN') {
    $w_locale=serialize('C');
    $w_date = serialize('%Y年%m月%d日 %H:%M');
    $w_daytime=serialize('%m月%d日 %H:%M');
    $w_shortdate=serialize('%d');
    $w_dateonly=serialize('%m%d');
    $w_timeonly=serialize('%H:%M');
} else {
    if (strtoupper(substr(PHP_OS, 0, 7)) == 'FREEBSD') {
        $w_locale=serialize('ja_JP');
    }else{
        $w_locale=serialize('ja_JP.UTF-8');
    }
    $w_date=serialize('%Y年%B%e日(%a) %H:%M %Z');
    $w_daytime=serialize('%m/%d %H:%M %Z');
    $w_shortdate=serialize('%Y年%B%e日');
    $w_dateonly=serialize('%B%e日');
    $w_timeonly=serialize('%H:%M %Z');
}
//ロケール･･･ロケール
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$w_locale}'
    WHERE name = 'locale' AND group_name='Core'
    ";
//ロケール･･･日付
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$w_date}'
    WHERE name = 'date' AND group_name='Core'
    ";
//ロケール･･･日時
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$w_daytime}'
    WHERE name = 'daytime' AND group_name='Core'
    ";

//ロケール･･･日付短表記
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$w_shortdate};'
    WHERE name = 'shortdate' AND group_name='Core'
    ";
//ロケール･･･日付けのみ
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$w_dateonly}'
    WHERE name = 'dateonly'
    ";
//ロケール･･･時間のみ
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$w_timeonly}'
    WHERE name = 'timeonly'
    ";

//----------------------------------------------------------

//hour_mode 時間制
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'i:24;'
    where name ='hour_mode'  AND group_name='Core'
    ";

//timezone タイムゾーン
$wk= serialize('Asia/Tokyo');
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = '{$wk}'
    where name ='timezone'  AND group_name='Core'
    ";

//【その他】
//HTMLフィルタ･･･ユーザHTML
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'a:18:{s:1:\"a\";a:3:{s:4:\"href\";i:1;s:5:\"title\";i:1;s:3:\"rel\";i:1;}s:1:\"b\";a:0:{}s:10:\"blockquote\";a:0:{}s:2:\"br\";a:1:{s:5:\"clear\";i:1;}s:4:\"code\";a:0:{}s:3:\"div\";a:1:{s:5:\"class\";i:1;}s:4:\"font\";a:1:{s:5:\"color\";i:1;}s:2:\"em\";a:0:{}s:1:\"h\";a:0:{}s:2:\"hr\";a:0:{}s:1:\"i\";a:0:{}s:2:\"li\";a:0:{}s:2:\"ol\";a:0:{}s:1:\"p\";a:1:{s:4:\"lang\";i:1;}s:3:\"pre\";a:0:{}s:6:\"strong\";a:0:{}s:2:\"tt\";a:0:{}s:2:\"ul\";a:0:{}}'
    WHERE name = 'user_html' AND group_name='Core'
    ";
//HTMLフィルタ･･･管理者HTML
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'a:26:{s:1:\"a\";a:7:{s:4:\"href\";i:1;s:5:\"title\";i:1;s:2:\"id\";i:1;s:4:\"lang\";i:1;s:4:\"name\";i:1;s:4:\"type\";i:1;s:3:\"rel\";i:1;}s:2:\"br\";a:2:{s:5:\"clear\";i:1;s:5:\"style\";i:1;}s:7:\"caption\";a:1:{s:5:\"style\";i:1;}s:3:\"div\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:5:\"embed\";a:8:{s:3:\"src\";i:1;s:4:\"loop\";i:1;s:7:\"quality\";i:1;s:5:\"width\";i:1;s:6:\"height\";i:1;s:4:\"type\";i:1;s:11:\"pluginspage\";i:1;s:5:\"align\";i:1;}s:2:\"h1\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:2:\"h2\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:2:\"h3\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:2:\"h4\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:2:\"h5\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:2:\"h6\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"style\";i:1;}s:2:\"hr\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"align\";i:1;}s:3:\"img\";a:15:{s:3:\"src\";i:1;s:5:\"width\";i:1;s:6:\"height\";i:1;s:6:\"vspace\";i:1;s:6:\"hspace\";i:1;s:3:\"dir\";i:1;s:5:\"align\";i:1;s:6:\"valign\";i:1;s:6:\"border\";i:1;s:4:\"lang\";i:1;s:8:\"longdesc\";i:1;s:5:\"title\";i:1;s:2:\"id\";i:1;s:3:\"alt\";i:1;s:5:\"style\";i:1;}s:8:\"noscript\";a:0:{}s:6:\"object\";a:7:{s:4:\"type\";i:1;s:4:\"data\";i:1;s:7:\"classid\";i:1;s:8:\"codebase\";i:1;s:5:\"width\";i:1;s:6:\"height\";i:1;s:5:\"align\";i:1;}s:2:\"ol\";a:2:{s:5:\"class\";i:1;s:5:\"style\";i:1;}s:1:\"p\";a:4:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"align\";i:1;s:4:\"lang\";i:1;}s:5:\"param\";a:2:{s:4:\"name\";i:1;s:5:\"value\";i:1;}s:6:\"script\";a:3:{s:3:\"src\";i:1;s:8:\"language\";i:1;s:4:\"type\";i:1;}s:4:\"span\";a:3:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:4:\"lang\";i:1;}s:5:\"table\";a:6:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"width\";i:1;s:6:\"border\";i:1;s:11:\"cellspacing\";i:1;s:11:\"cellpadding\";i:1;}s:5:\"tbody\";a:0:{}s:2:\"td\";a:6:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"align\";i:1;s:6:\"valign\";i:1;s:7:\"colspan\";i:1;s:7:\"rowspan\";i:1;}s:2:\"th\";a:6:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"align\";i:1;s:6:\"valign\";i:1;s:7:\"colspan\";i:1;s:7:\"rowspan\";i:1;}s:2:\"tr\";a:4:{s:5:\"class\";i:1;s:2:\"id\";i:1;s:5:\"align\";i:1;s:6:\"valign\";i:1;}s:2:\"ul\";a:2:{s:5:\"class\";i:1;s:5:\"style\";i:1;}}'
    WHERE name = 'admin_html' AND group_name='Core'
    ";

//HTMLフィルタ･･･RootユーザはHTMLフィルタを無効にする
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'i:1;'
    WHERE name = 'skip_html_filter_for_root' AND group_name='Core'
    ";



//バッドワードチェック･･･チェックモード いいえ
$_SQL[] = "
    UPDATE   {$_TABLES['conf_values']} SET
    value = 'i:0;'
    WHERE name = 'censormode' AND group_name='Core'
    ";


?>
