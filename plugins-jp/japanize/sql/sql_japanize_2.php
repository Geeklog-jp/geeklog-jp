<?php
// +---------------------------------------------------------------------------+
// | コンフィギュレーションを日本語版化する                                    |
// +---------------------------------------------------------------------------+
// もし万一エンコードの種類が  utf-8でない場合は、utf-8に変換してください。
//2008/09/11 サイト･･･無効のURL変更
//2010/11/09 言語とロケール変更追加

//【サイト】
//サイト･･･無効のメッセージまたはURL
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize($_CONF['site_url'] . '/japanize/disabledmsg.html') . "' "
		. "WHERE (name = 'site_disabled_msg') AND (group_name = 'Core') ";

//シンジケーション･･･フィードの言語
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize('ja') . "' "
		. "WHERE name = 'rdf_language' ";

//【ブロック】
//管理者ブロック･･･リンクをソートする いいえ　0:表示しない
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(FALSE) . "' "
		. "WHERE (name = 'sort_admin') AND (group_name = 'Core') ";

//話題ブロック･･･記事投稿数を表示する いいえ　0:表示しない
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(FALSE) . "' "
		. "WHERE (name = 'showsubmissioncount') AND (group_name = 'Core') ";

//話題ブロック･･･Homeへのリンクを隠す はい　1:隠す
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(TRUE) . "' "
		. "WHERE (name = 'hide_home_link') AND (group_name = 'Core') ";

//【ユーザと投稿】
//コメント･･･コメント形状 flat:一覧
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize('flat') . "' "
		. "WHERE (name = 'comment_mode') AND (group_name = 'Core') ";

//【画像】
//画像ライブラリ･･･画像ライブラリ:GDライブラリ
$wk= serialize('gdlib');
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize('gdlib') . "' "
		. "WHERE (name = 'image_lib') AND (group_name = 'Core') ";

//画像ライブラリ･･･記事の画像高さの最大値:120ピクセル
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(120) . "' "
		. "WHERE (name = 'max_image_height') AND (group_name = 'Core') ";

//【言語とロケール】
//----------------------------------------------------------
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $w_locale    = serialize('C');
    $w_date      = serialize('%Y年%m月%d日 %H:%M');
    $w_daytime   = serialize('%m月%d日 %H:%M');
    $w_shortdate = serialize('%d');
    $w_dateonly  = serialize('%m%d');
    $w_timeonly  = serialize('%H:%M');
} else {
    if (strtoupper(substr(PHP_OS, 0, 7)) === 'FREEBSD') {
        $w_locale = serialize('ja_JP');
    }else{
        $w_locale = serialize('ja_JP.UTF-8');
    }
	
    $w_date      = serialize('%Y年%B%e日(%a) %H:%M %Z');
    $w_daytime   = serialize('%m/%d %H:%M %Z');
    $w_shortdate = serialize('%Y年%B%e日');
    $w_dateonly  = serialize('%B%e日');
    $w_timeonly  = serialize('%H:%M %Z');
}

//ロケール･･･ロケール
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '{$w_locale}' "
		. "WHERE (name = 'locale') AND (group_name = 'Core') ";

//ロケール･･･日付
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '{$w_date}' "
		. "WHERE (name = 'date') AND (group_name = 'Core') ";

//ロケール･･･日時
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '{$w_daytime}' "
		. "WHERE (name = 'daytime') AND (group_name = 'Core') ";

//ロケール･･･日付短表記
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '{$w_shortdate}' "
		. "WHERE (name = 'shortdate') AND (group_name = 'Core') ";

//ロケール･･･日付けのみ
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '{$w_dateonly}' "
		. "WHERE name = 'dateonly' ";

//ロケール･･･時間のみ
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '{$w_timeonly}' "
		. "WHERE name = 'timeonly' ";

//----------------------------------------------------------

//hour_mode 時間制
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(24) . "' "
		. "WHERE (name ='hour_mode') AND (group_name = 'Core') ";

//timezone タイムゾーン
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize('Asia/Tokyo') . "' "
		. "WHERE (name ='timezone') AND (group_name = 'Core') ";

//【その他】
//HTMLフィルタ･･･ユーザHTML
$value = array(
	'a'				=> array('href' => 1, 'title' => 1, 'rel' => 1),
	'b'				=> array(),
	'blockquote'	=> array(),
	'br'			=> array('clear' => 1),
	'code'			=> array(),
	'div'			=> array('class' => 1),
	'em'			=> array(),
	'font'			=> array('color' => 1),
	'h'				=> array(),
	'hr'			=> array(),
	'i'				=> array(),
	'li'			=> array(),
	'ol'			=> array(),
	'p'				=> array('lang' => 1),
	'pre'			=> array(),
	'strong'		=> array(),
	'tt'			=> array(),
	'ul'			=> array(),
);
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize($value) . "' "
		. "WHERE (name = 'user_html') AND (group_name = 'Core') ";

//HTMLフィルタ･･･管理者HTML
$value = array(
	'a'				=> array(
							'href' => 1, 'title' => 1, 'id' => 1, 'lang' => 1,
							'name' => 1, 'type' => 1, 'rel' => 1,
						),
	'br'			=> array('clear' => 1, 'style' => 1,),
	'caption'		=> array('style' => 1,),
	'div'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'embed'			=> array(
							'src' => 1, 'loop' => 1, 'quality' => 1, 'width' => 1,
							'height' => 1, 'type' => 1, 'pluginspage' => 1,
							'align' => 1,
						),
	'h1'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'h2'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'h3'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'h4'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'h5'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'h6'			=> array('class' => 1, 'id' => 1, 'style' => 1,),
	'hr'			=> array('class' => 1, 'id' => 1, 'align' => 1,),
	'img'			=> array(
							'src' => 1, 'width' => 1, 'height' => 1, 'vspace' => 1,
							'hspace' => 1, 'dir' => 1, 'align' => 1, 'valign' => 1,
							'border' => 1, 'lang' => 1, 'longdesc' => 1,
							'title' => 1, 'id' => 1, 'alt' => 1, 'style' => 1,
						),
	'noscript'		=> array(),
	'object'		=> array(
							'type' => 1, 'data' => 1, 'classid' => 1, 
							'codebase' => 1, 'width' => 1, 'height' => 1,
							'align' => 1,
						),
	'ol'			=> array('class' => 1, 'style' => 1,),
	'p'				=> array('class' => 1, 'id' => 1, 'align' => 1, 'lang' => 1,),
	'param'			=> array('name' => 1, 'value' => 1,),
	'script'		=> array('src' => 1, 'language' => 1, 'type' => 1,),
	'span'			=> array('class' => 1, 'id' => 1, 'lang' => 1,),
	'table'			=> array(
							'class' => 1, 'id' => 1, 'width' => 1, 'border' => 1,
							'cellspacing' => 1, 'cellpadding' => 1,
						),
	'tbody'			=> array(),
	'td'			=> array(
							'class' => 1, 'id' => 1, 'align' => 1, 'valign' => 1,
							'colspan' => 1, 'rowspan' => 1,
						),
	'th'			=> array(
							'class' => 1, 'id' => 1, 'align' => 1, 'valign' => 1,
							'colspan' => 1, 'rowspan' => 1,
						),
	'tr'			=> array(
							'class' => 1, 'id' => 1, 'align' => 1, 'valign' => 1,
						),
	'ul'			=> array('class' => 1, 'style' => 1,),
);

$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize($value) . "' "
		. "WHERE (name = 'admin_html') AND (group_name = 'Core') ";

//HTMLフィルタ･･･RootユーザはHTMLフィルタを無効にする
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(1) . "' "
		. "WHERE (name = 'skip_html_filter_for_root') AND (group_name = 'Core') ";

//バッドワードチェック･･･チェックモード いいえ
$_SQL[] = "UPDATE {$_TABLES['conf_values']} "
		. "SET value = '" . serialize(0) . "' "
		. "WHERE (name = 'censormode') AND (group_name = 'Core') ";
