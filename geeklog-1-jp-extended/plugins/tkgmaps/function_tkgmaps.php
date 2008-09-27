<?php 
// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | function_tkgmaps.php                                                                |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2002 by the following authors:                              |
// |                                                                           |
// |2008.05.14 v0.9 customed by G-COE, CSEAS. Addition of GoogleMapsEditor API Auto Tags
// |Authors: Kinoshita
// |Authors: Hiroron
// |Director: IVY WE CO.,LTD. Komma
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+
// $Id$

$tkgmaps_apikey = '';
$tkgmaps_lat = 0;
$tkgmaps_lng = 0;
$tkgmaps_mapid = 0;
$tkgmaps_width = '400';
$tkgmaps_height = '400';
$tkgmaps_margin = '0';
$tkgmaps_zoom = 16;
$tkgmaps_base = array();
$tkgmaps_point = array('');

function plugin_autotags_tkgmaps ($op, $content = '', $autotag = '')
{
	global $_CONF, $_TABLES;

	$function_history =debug_backtrace();
	if($function_history[count($function_history)-1]['function']=='com_siteheader'){
		return;
	}

	if ($op == 'tagname' ) {
		return 'maps';
	} else if ($op == 'parse') {
		$startpos = strpos($content,$autotag['tagstr']);
		$length = strlen($autotag['tagstr']);
		$parms = explode(' ', $autotag['parm2']);
		$p1 = $parms[0];
		array_shift($parms);
		$p2 = implode(' ', $parms);
		switch ($autotag['parm1']){
			case 'base':
				$mapcode=tkgmaps_base($p1, $p2, $autotag['tagstr']);
				break;
			case 'point':
				$mapcode = tkgmaps_point($p1, $p2, $autotag['tagstr']);
				break;
			case 'show':
				$mapcode = tkgmaps_show();
				break;
			case 'display':
				$mapcode = tkgmaps_display();
				break;
		}
		$content = substr($content,0,$startpos) . $mapcode . substr($content,$startpos + $length);

		return $content;
	}
}

function tkgmaps_base($p1, $p2, $fulltag){
	global $tkgmaps_mapid;
	global $tkgmaps_lat,$tkgmaps_lng,$tkgmaps_width,$tkgmaps_height,$tkgmaps_margin,$tkgmaps_zoom;
	global $tkgmaps_base,$tkgmaps_point;

	//	$tkgmaps_mapid++;
	$tkgmaps_width = '400';
	$tkgmaps_height = '400';
	$tkgmaps_margin = '0';
	$tkgmaps_zoom = 16;

	$tkgmaps_point = array();
	reset($tkgmaps_point);

	if( empty($p1) ) { return ''; }
	$flg = mb_ereg('[^0-9\-\.]', $p1);
	if( $flg ) {
		$options = $p2;
		tkgmaps_geocode($p1, $lat, $lng);
		$p1 = $lat; $p2 = $lng;
	} else {
		if( empty($p2) ) { return ''; }
		$pos = strpos($p2,' ');
		if (!$pos === false) {
			$options = substr($p2,$pos);
			$p2 = substr($p2,0,$pos-1);
		}
	}

	$tkgmaps_lat = $p1;
	$tkgmaps_lng = $p2;
	$op = $options;
	$options = explode(' ', $op);
	foreach ($options as $option) {
		list($k, $v) = explode(':', $option);

		switch (strtolower($k)) {
			case "width": 	$tkgmaps_width  = $v; 	break;
			case "height": 	$tkgmaps_height = $v; 	break;
			case "margin": 	$tkgmaps_margin = $v; 	break;
			case "zoom": 	$tkgmaps_zoom   = $v; 	break;
		}
	}

	return '';
}

function tkgmaps_point($p1, $p2, $fulltag){
	global $_TKGMAPS_CONF,$tkgmaps_base,$tkgmaps_point;

    $icon = '';
    $iconsize = isset($_TKGMAPS_CONF['iconsize']) ? $_TKGMAPS_CONF['iconsize'] : '';
    $iconanchor = isset($_TKGMAPS_CONF['iconanchor']) ? $_TKGMAPS_CONF['iconanchor'] : '';
    $infowindowanchor = isset($_TKGMAPS_CONF['infowindowanchor']) ? $_TKGMAPS_CONF['infowindowanchor'] : '';
    $info = '""';

	if( empty($p1) ) { return ''; }
	$flg = mb_ereg('[^0-9\-\.]', $p1);
	if( $flg ) {
		$options = $p2;
		tkgmaps_geocode($p1, $lat, $lng);
		$p1 = $lat; $p2 = $lng;
	} else {
		if( empty($p2) ) { return ''; }
		$pos = strpos($p2,' ');
		if (!$pos === false) {
			$options = substr($p2,$pos);
			$p2 = substr($p2,0,$pos-1);
		}
	}

	$options_array = explode(' ', $options);	
	while(count($options_array)>0){
		$option = array_shift($options_array);
		$cpos = strpos($option, ':');
		$k = substr($option, 0, $cpos);
		$v = substr($option, $cpos+1);
		switch (strtolower($k)) {
			case "title": 	$title  = $v; 	break;
			case "icon": 	$icon = $v; 	break;
			case "iconsize": 	$iconsize = $v; 	break;
			case "iconanchor": 	$iconanchor = $v; 	break;
			case "info":	$info = $v; 	break;
			case "infowindowanchor":    $infowindowanchor = $v; break;
			default:
				$html =$option . ' ' .  implode(' ', $options_array);
			//	$info =html_entity_decode($html) ;
				$info = COM_stripslashes(ltrim($html));
				$options_array = array();
		}
	}
	
	if (substr($icon,0,1)!="/" && substr($icon,0,7)!="http://"){
		$icon = "http://maps.google.co.jp/mapfiles/ms/icons/{$icon}.png";
	}
	
	$tkgmaps_point[] = array(
	'lat'          => $p1,
	'lng'          => $p2,
	'title'        => $title ,
	'icon'         => $icon ,
	'iconsize'     => $iconsize ,
	'iconanchor'   => $iconanchor ,
	'infowindowanchor' => $infowindowanchor ,
	'info'         => $info
	);
}

function tkgmaps_show(){
	global $_TABLES, $tkgmaps_mapid, $tkgmaps_apikey;
	global $tkgmaps_lat,$tkgmaps_lng,$tkgmaps_width,$tkgmaps_height,$tkgmaps_margin,$tkgmaps_zoom;
	global $tkgmaps_base,$tkgmaps_point;

    $tkgmaps_apikey = DB_getItem ($_TABLES['tkgmaps'], 'googlemapsapikey', "1 LIMIT 1");

	$tkgmaps_mapid++;
	$id = $tkgmaps_mapid ;

	$ret = '';
	
	// 最初のタグのみAPI取得JSを出力
    $ret = "<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key={$tkgmaps_apikey}' type='text/javascript' charset='utf-8'></script>" .LB.LB;

	// 地図表示設定
	$ret .= "<div id='map{$id}' style='padding:0px;'></div>" .LB;
	$ret .= "<script type='text/javascript'>" .LB;
	$ret .= "//<![CDATA[" .LB;
	$ret .= "  var zoom = $tkgmaps_zoom;" .LB;
	$ret .= "  var mapstyle = document.getElementById('map{$id}').style;" .LB;
	$ret .= "  mapstyle.width = '{$tkgmaps_width}px'; //地図の幅" .LB;
	$ret .= "  mapstyle.height = '{$tkgmaps_height}px'; //地図の高さ" .LB;
	$ret .= "  mapstyle.margin = '{$tkgmaps_margin}px'; //地図の余白" .LB;
	$ret .= "function OnloadBody{$id}(){" .LB;
	$ret .= "  if(document.getElementById('map{$id}')) {" .LB;

	$ret .= "    var map = new GMap2(document.getElementById('map{$id}'));" .LB;
	$ret .= "    var point = new GLatLng($tkgmaps_lat,$tkgmaps_lng);" .LB;
	$ret .= "    map.setCenter( point , zoom );" .LB;
	$ret .= "    map.addControl(new GLargeMapControl());" .LB;
	$ret .= "    map.addControl(new GMapTypeControl());" .LB;
	$ret .= "    map.addControl(new GOverviewMapControl());" .LB;

	//地点のマーカーを追加する
	reset($tkgmaps_point);
	$m = 0;
	while ( list(, $value) = each($tkgmaps_point)) {
		$m++;
		$ret .= "  var point = new GLatLng({$value['lat']},{$value['lng']});" .LB;
		$ret .= "  var icon$m = new GIcon(G_DEFAULT_ICON);" . LB;
		if($value['icon']) {
    		$ret .= "  icon$m.image = '{$value['icon']}';" . LB;
    		if($value['iconsize']) { $ret .= "  icon$m.iconSize = new GSize({$value['iconsize']});" . LB; }
    		if($value['iconanchor']) { $ret .= "  icon$m.iconAnchor = new GPoint({$value['iconanchor']});" . LB; }
    		if($value['infowindowanchor']) { $ret .= "  icon$m.infoWindowAnchor = new GPoint({$value['infowindowanchor']});" . LB; }
		}
		$ret .= "  var marker$m = new GMarker(point ,{ icon: icon$m, title: '{$value['title']}'});" .LB;
		if(isset($value['info']) && !empty($value['info'])){
			$ret .= "  var info$m = '{$value['info']}';" .LB;
			$ret .= "  GEvent.addListener( marker$m , 'click' , function(){ marker$m.openInfoWindowHtml(info$m) } );" .LB;
		}
		$ret .= "  map.addOverlay(marker$m);" .LB;
	}

	$ret .= "  }" .LB;
	$ret .= "}" .LB;
	$ret .= "//]]>" .LB;
	$ret .= "</script>" .LB;

	return $ret;
}

function tkgmaps_display(){
	global $tkgmaps_mapid;
	global $tkgmaps_lat,$tkgmaps_lng,$tkgmaps_width,$tkgmaps_height,$tkgmaps_margin,$tkgmaps_zoom;
	global $tkgmaps_base,$tkgmaps_point;

	$ret = '';
	$ret .= "<script type='text/javascript'>" .LB;
	$ret .= "<!--" .LB;
	$ret .= "function OnloadBody(){" .LB;

	$id = $tkgmaps_mapid;
	// onloadイベント時の地図の描画関係(1ページに複数個の地図に対応)
	for( $i=1; $i<=$id; $i++ ) {
		$ret .= "  OnloadBody{$i}();" .LB;
	}

	// 終了タグ
	$ret .= "}" .LB;
	$ret .= "window.onload = OnloadBody;".LB;
	$ret .= "// -->" .LB;
	$ret .= "</script>" .LB;

	return $ret;
}

// ジオコードcacheファイル
function tkgmaps_ccgeocodefile() {
	global $_CONF;
	return $_CONF['path_data'].'ccgeocode.ini';
}
// cacheにジオコードがあれば返す
function tkgmaps_ccgeocode($v1, &$lat, &$lng) {
	$file = tkgmaps_ccgeocodefile();
	if( !file_exists($file) ) {
		return false;
	}
	$ini = parse_ini_file($file);
	if( !array_key_exists($v1, $ini) ) {
		return false;
	}
	$ccdata = $ini[$v1];
	list($lat, $lng) = explode(' ', $ccdata);
	return true;
}
// cacheにジオコードをセット
function tkgmaps_setccgeocode($v1, $lat, $lng) {
	$file = tkgmaps_ccgeocodefile();
	$line = $v1.' = '.$lat.' '.$lng.LB;
	$fh = fopen($file, 'a');
	fwrite($fh, $line);
	fclose($fh);
}
// HTTPでURLの情報を取得
function tkgmaps_get_http_contents ($url) {
	$ret = '';
	require_once 'HTTP/Request.php';
	$req = &new HTTP_Request();
	$req->setURL($url);
	$res = $req->sendRequest();
	if( !PEAR::isError($res) ) $ret = $req->getResponseBody();
	return $ret;
}
// 住所から経度、緯度を返す
function tkgmaps_geocode($v1, &$lat, &$lng) {
	global $tkgmaps_apikey;

	$isgeocode = tkgmaps_ccgeocode($v1, $lat, $lng);
	if( $isgeocode == false ) {
		//        $apikey = _gmapsapikey();
		$url = 'http://maps.google.co.jp/maps/geo?q='.urlencode($v1).'&key='.urlencode($tkgmaps_apikey).'&output=xml';
		$xmldata = tkgmaps_get_http_contents($url);
		preg_match('@<coordinates>(.*)</coordinates>@',$xmldata, $mcoordinates);
		list($lng, $lat) = explode(',', $mcoordinates[1]);
		if( !empty($lat) && !empty($lng) && !mb_ereg('[^0-9\-\.]', $lat) && !mb_ereg('[^0-9\-\.]', $lng) ) {
			tkgmaps_setccgeocode($v1, $lat, $lng);
		}
	}
}

?>