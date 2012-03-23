<?php 
// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog - The Ultimate Weblog                          |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/tkgmaps/function_tkgmaps.php                              |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2009-2010 hiroron - hiroron AT hiroron DOT com              |
// |                                                                           |
// | Constructed with the Universal Plugin                                     |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), 'functions.inc') !== FALSE) {
    die('This file can not be used on its own.');
}

$tkgmaps_mapid = 0;
$tkgmaps_base = array();
$tkgmaps_point = array('');
$tkgmaps_overlay = array();

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
                $mapcode = tkgmaps_base($p1, $p2, $autotag['tagstr']);
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
            case 'mgexif':
                $mapcode = tkgmaps_mgexif($p1, $p2, $autotag);
                break;
            case 'mgpoint':
                $mapcode = tkgmaps_mgpoint($p1, $p2, $autotag);
                break;
            case 'overlay':
                $mapcode = tkgmaps_overlay($p1, $p2, $autotag);
                break;
            default: $mapcode ='';
        }
        if (empty($mapcode)) {
            if (strpos($content, $autotag['tagstr'].'<br />') === $startpos) {
                $content = str_replace($autotag['tagstr'].'<br />', '', $content);
            } elseif (strpos($content, $autotag['tagstr'].'<br>') === $startpos) {
                $content = str_replace($autotag['tagstr'].'<br>', '', $content);
            } else {
                $content = substr($content,0,$startpos) . $mapcode . substr($content,$startpos + $length);
            }
        } else {
            $content = substr($content,0,$startpos) . $mapcode . substr($content,$startpos + $length);
        }
        return $content;
    }
}

function tkgmaps_base($p1, $p2, $fulltag){
    global $tkgmaps_base,$tkgmaps_point;

    $tkgmaps_base = array();
    $tkgmaps_point = array();
    $tkgmaps_overlay = array();
    reset($tkgmaps_base);
    reset($tkgmaps_point);
    reset($tkgmaps_overlay);
    $tkgmaps_base['width']  = '400';
    $tkgmaps_base['height'] = '400';
    $tkgmaps_base['margin'] = '0';
    $tkgmaps_base['zoom']   = 16;

    if( !isset($p1) ) { return ''; }
    $flg = mb_ereg('[^0-9\-\.,]', $p1);
    if( $flg ) {
        $options = $p2;
        tkgmaps_geocode($p1, $lat, $lng);
        $p1 = $lat; $p2 = $lng;
    } else {
        $options = $p2;
        list($p1,$p2) = explode(',',$p1);
        if( !isset($p2) ) { return ''; }
    }

    $tkgmaps_base['lat'] = $p1;
    $tkgmaps_base['lng'] = $p2;
    $op = $options;
    $options = explode(' ', $op);
    foreach ($options as $option) {
        list($k, $v) = explode(':', $option);

        switch (strtolower($k)) {
            case "width":   $tkgmaps_base['width']     = $v; break;
            case "height":  $tkgmaps_base['height']    = $v; break;
            case "margin":  $tkgmaps_base['margin']    = $v; break;
            case "zoom":    $tkgmaps_base['zoom']      = $v; break;
            case "addctrl": $tkgmaps_base['addctrl'][] = $v; break;
            case "maptype": $tkgmaps_base['maptype'][] = $v; break;
            case "setmaptype": $tkgmaps_base['setmaptype'] = $v; break;
        }
    }

    $tkgmaps_base['addctrl'] = tkgmaps_make_controls($tkgmaps_base['addctrl']);
    $tkgmaps_base['maptype'] = tkgmaps_make_maptypes($tkgmaps_base['maptype']);

    return '';
}

function tkgmaps_point_optionname () {
    return array('title','icon','iconshadow','iconsize','iconshadowsize','iconanchor','info','infowindowanchor');
}

function tkgmaps_point($p1, $p2, $fulltag){
    global $tkgmaps_point;

    $icon = '';
    $iconshadow = '';
    $iconsize = '';
    $iconshadowsize = '';
    $iconanchor = '';
    $infowindowanchor = '';
    $info = '""';

    if( !isset($p1) ) { return ''; }
    $flg = mb_ereg('[^0-9\-\.,]', $p1);
    if( $flg ) {
        $options = $p2;
        tkgmaps_geocode($p1, $lat, $lng);
        $p1 = $lat; $p2 = $lng;
    } else {
        $options = $p2;
        list($p1,$p2) = explode(',',$p1);
        if( !isset($p2) ) { return ''; }
    }

    $options_array = explode(' ', $options);
    while(count($options_array)>0){
        $option = array_shift($options_array);
        $cpos = strpos($option, ':');
        $k = substr($option, 0, $cpos);
        $v = substr($option, $cpos+1);
        switch (strtolower($k)) {
            case "title":   $title  = $v;   break;
            case "icon":    $icon = $v;     break;
            case "iconshadow":  $iconshadow = $v;   break;
            case "iconsize":    $iconsize = $v;     break;
            case "iconshadowsize":  $iconshadowsize = $v;   break;
            case "iconanchor":  $iconanchor = $v;   break;
            case "info":    $info = $v;     break;
            case "infowindowanchor":    $infowindowanchor = $v; break;
            default:
                $html =$option . ' ' .  implode(' ', $options_array);
                $info = COM_stripslashes(ltrim($html));
                $options_array = array();
        }
    }
    
    $gicon = tkgmaps_make_gicon($icon, $iconsize, $iconshadow, $iconshadowsize, $iconanchor, $infowindowanchor, $info);
    
    $tkgmaps_point[] = array_merge( array('lat' => $p1, 'lng' => $p2, 'title' => $title), $gicon);
}

function tkgmaps_show(){
    global $_TABLES, $_TKGMAPS_CONF, $tkgmaps_mapid;
    global $tkgmaps_base,$tkgmaps_point;
    global $tkgmaps_overlay;

    $tkgmaps_mapid++;
    $id = $tkgmaps_mapid;
    $lat = $tkgmaps_base['lat'];
    $lng = $tkgmaps_base['lng'];
    $width = tkgmaps_size_unit($tkgmaps_base['width']);
    $height = tkgmaps_size_unit($tkgmaps_base['height']);
    $margin = $tkgmaps_base['margin'];
    $zoom = $tkgmaps_base['zoom'];
    $infoevent = empty($_TKGMAPS_CONF['infodispevent']) ? 'click' : $_TKGMAPS_CONF['infodispevent'] ;

    $ret = '';
    
    // 最初のタグのみAPI取得JSを出力
    if ($id == 1) {
        $ret = LB."<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key={$_TKGMAPS_CONF['gmapapikey']}' type='text/javascript' charset='utf-8'></script>".LB;
    }

    // 地図表示設定
    $ret .= "<div id='tkgmaps' style='clear:both;height:{$height};'>" .LB;
    $ret .= "<div id='map{$id}' style='padding:0px;float:left;'></div>" .LB;
    $ret .= "<script type='text/javascript'>" .LB;
    $ret .= "//<![CDATA[" .LB;
    $ret .= "var mapstyle{$id} = document.getElementById('map{$id}').style;" .LB;
    $ret .= "mapstyle{$id}.width = '{$width}'; //地図の幅" .LB;
    $ret .= "mapstyle{$id}.height = '{$height}'; //地図の高さ" .LB;
    $ret .= "mapstyle{$id}.margin = '{$margin}px'; //地図の余白" .LB;
    $o = 0;
    while ( list(, $value) = each($tkgmaps_overlay) ) {
        if (!empty($value['sw']) && !empty($value['ne']) && !empty($value['img'])) {
            $o++;
            $ret .= "var goverlay{$o};" .LB;
        }
    }
    $ret .= "function OnloadBody{$id}(){" .LB;
    $ret .= " if(document.getElementById('map{$id}')) {" .LB;
    if (!empty($tkgmaps_base['maptype']) && is_array($tkgmaps_base['maptype'])) {
        $maptypes = implode(',', $tkgmaps_base['maptype']);
        $ret .= "  var map{$id} = new GMap2(document.getElementById('map{$id}'), {mapTypes: [$maptypes]});" .LB;
    } else {
        $ret .= "  var map{$id} = new GMap2(document.getElementById('map{$id}'));" .LB;
    }
    $ret .= "  map{$id}.setCenter( new GLatLng($lat,$lng) , $zoom );" .LB;
    if (!empty($tkgmaps_base['setmaptype'])) {
        $ret .= "  map{$id}.setMapType({$tkgmaps_base['setmaptype']});" .LB;
    } elseif (!empty($_TKGMAPS_CONF['setmaptype'])) {
        $ret .= "  map{$id}.setMapType({$_TKGMAPS_CONF['setmaptype']});" .LB;
    }
    if (!empty($tkgmaps_base['addctrl']) && is_array($tkgmaps_base['addctrl'])) {
        foreach ($tkgmaps_base['addctrl'] as $addctrl) {
            switch ($addctrl) {
                case 'large':    $ret .= "  map{$id}.addControl(new GLargeMapControl());" .LB; break;
                case 'small':    $ret .= "  map{$id}.addControl(new GSmallMapControl());" .LB; break;
                case 'szoom':    $ret .= "  map{$id}.addControl(new GSmallZoomControl());" .LB; break;
                case 'maptype':  $ret .= "  map{$id}.addControl(new GMapTypeControl());" .LB; break;
                case 'overview': $ret .= "  map{$id}.addControl(new GOverviewMapControl());" .LB; break;
                case 'scale':    $ret .= "  map{$id}.addControl(new GScaleControl());" .LB; break;
            }
        }
    }
    //オーバーレイを追加する
    $tkgmaps_overlay_select = array();
    $tkgmaps_overlay_select_name = array();
    reset($tkgmaps_overlay);
    $o = 0;
    while ( list(, $value) = each($tkgmaps_overlay) ) {
        if (!empty($value['sw']) && !empty($value['ne']) && !empty($value['img'])) {
            $o++;
            $ret .= "  var bounds{$o} = new GLatLngBounds(new GLatLng({$value['sw']}), new GLatLng({$value['ne']}));" .LB;
            $ret .= "  goverlay{$o} = new GGroundOverlay(".'"'.$value['img'].'"'.", bounds{$o});" .LB;
            $ret .= "  map{$id}.addOverlay(goverlay{$o});" .LB;
            // オーバーレイ選択用の準備
            if (!empty($value['id'])) {
                if (empty($tkgmaps_overlay_select[$value['id']])) {
                    $tkgmaps_overlay_select[$value['id']] = "goverlay{$o}";
                } else {
                    $tkgmaps_overlay_select[$value['id']] .= ",goverlay{$o}";
                }
                if (!empty($value['name'])) {
                    $tkgmaps_overlay_select_name[$value['id']] = $value['name'];
                }
            }
        }
    }
    //地点のマーカーを追加する
    reset($tkgmaps_point);
    $m = 0;
    while ( list(, $value) = each($tkgmaps_point)) {
        $m++;
        $html_icon = "  var icon{$id}$m = new GIcon(G_DEFAULT_ICON);" . LB;
        if(!empty($value['icon'])) {
            $html_icon = "  var icon{$id}$m = new GIcon(G_DEFAULT_ICON);" . LB;
            $html_icon .= "  icon{$id}$m.image = '{$value['icon']}';" . LB;
            if(!empty($value['iconsize'])) { $html_icon .= "  icon{$id}$m.iconSize = new GSize({$value['iconsize']});" . LB; }
            if(!empty($value['iconshadow'])) {
                $html_icon .= "  icon{$id}$m.shadow = '{$value['iconshadow']}';" . LB;
                if(!empty($value['iconshadowsize'])) { $html_icon .= "  icon{$id}$m.shadowSize = new GSize({$value['iconshadowsize']});" . LB; }
            }
            if($value['iconanchor']) { $html_icon .= "  icon{$id}$m.iconAnchor = new GPoint({$value['iconanchor']});" . LB; }
            if($value['infowindowanchor']) { $html_icon .= "  icon{$id}$m.infoWindowAnchor = new GPoint({$value['infowindowanchor']});" . LB; }
        }
        $ret .= $html_icon;
        $ret .= "  var marker{$id}$m = new GMarker( new GLatLng({$value['lat']},{$value['lng']}) ,{ icon: icon{$id}$m, title: '{$value['title']}'});" .LB;
        if(!empty($value['info']) && $value['info'] != '""'){
            $infocenter = (empty($_TKGMAPS_CONF['infodispcenter']) || !$_TKGMAPS_CONF['infodispcenter']) ? '' : "; map{$id}.panTo(new GLatLng({$value['lat']},{$value['lng']}));";
            $ret .= "  var info{$id}$m = '" . addslashes($value['info']) . "';" .LB;
            $ret .= "  GEvent.addListener( marker{$id}$m , '{$infoevent}' , function(){ marker{$id}$m.openInfoWindowHtml(info{$id}$m){$infocenter} } );" .LB;
        }
        $ret .= "  map{$id}.addOverlay(marker{$id}$m);" .LB;
    }

    $ret .= " }" .LB;
    $ret .= "}" .LB;

    // オーバーレイ選択用JS関数作成
    foreach ($tkgmaps_overlay_select as $key => $val) {
        if (isset($key)) {
            $ret .= "function tkgmaps_map{$id}_ol_{$key} () {" .LB;
            if (isset($val)) {
                $val_array = explode(',', $val);
                $show = '';
                foreach ($val_array as $value) {
                    if (empty($show)) { $show .= "  if ({$value}.isHidden()) {" .LB; }
                    $show .= "    {$value}.show();" .LB;
                }
                $ret .= $show;
                $ret .= "  } else {" .LB;
                foreach ($val_array as $value) {
                    $ret .= "    {$value}.hide();" .LB;
                }
                $ret .= "  }" .LB;
            }
            $ret .= "}" .LB;
        }
    }

    $ret .= "//]]>" .LB;
    $ret .= "</script>" .LB;

    // オーバーレイの選択DIV
    $ret .= "<div id='map{$id}_select' style='margin:0px; padding:0px;'>" .LB;
    $ret .= "<form id='map{$id}_select_form' action='#'>" .LB;
    $ret .= "<ul>" .LB;
    foreach ($tkgmaps_overlay_select_name as $key => $val) {
        $ret .= "<li><label><input type='checkbox' onclick='tkgmaps_map{$id}_ol_{$key}()' checked='checked'" . XHTML . ">{$val}</label></li>" .LB;
    }
    $ret .= "</ul>" .LB;
    $ret .= "</form>" .LB;
    $ret .= "</div>" .LB;

    //$ret .= "<div style='clear:both;'></div>" .LB;
    $ret .= "</div>" .LB;

    return $ret;
}

function tkgmaps_display(){
    global $tkgmaps_mapid;

    $ret = '';
    $ret .= "<script type='text/javascript'>" .LB;
    $ret .= "<!--" .LB;
    $ret .= "function OnloadBody(){" .LB;

    $id = $tkgmaps_mapid;
    // onloadイベント時の地図の描画関係(1ページに複数個の地図に対応)
    for( $i=1; $i<=$id; $i++ ) {
        $ret .= " OnloadBody{$i}();" .LB;
    }

    // 終了タグ
    $ret .= "}" .LB;
    $ret .= "window.onload = OnloadBody;".LB;
    // 最初のタグにだけメモリリークを抑える GUnload を出力
    if ($id == 1) { $ret .= "window.onunload = GUnload;".LB; }
    $ret .= "// -->" .LB;
    $ret .= "</script>" .LB;

    return $ret;
}

function tkgmaps_mgpoint ($p1, $p2, $autotag)
{
    global $_TKGMAPS_CONF, $_MG_CONF, $_TABLES;
    
    $ret = '';
    if (isset($_TKGMAPS_CONF['mgdispmgpoint']) && $_TKGMAPS_CONF['mgdispmgpoint']) {
        if ( tkgmaps_is_page_mg_media() == false ) { return $ret; }
        if (empty($p1)) { return $ret; }
        if (MBYTE_strpos($p1, ',') !== false) {
            list($lat, $lng) = explode(',', $p1);
        } else {
            if (strtolower($p1) != 'gps') { return $ret; }
            if (!isset($_REQUEST['s'])) { return $ret; }
            $path_img = tkgmaps_mg_path_image( tkgmaps_mg_filename($_REQUEST['s']) );
            $exif_gps = tkgmaps_mg2map_getgps_point($path_img);
            if (!is_array($exif_gps)) { return $ret; }
            $lat = $exif_gps[0];
            $lng = $exif_gps[1];
        }
        if (empty($lat) || empty($lng)) { return $ret; }
        $width = empty($_TKGMAPS_CONF['mgpointmapwidth']) ? '230' : $_TKGMAPS_CONF['mgpointmapwidth'];
        $height = empty($_TKGMAPS_CONF['mgpointmapheight']) ? '170' : $_TKGMAPS_CONF['mgpointmapheight'];
        $zoom = empty($_TKGMAPS_CONF['mgpointmapzoom']) ? '12' : $_TKGMAPS_CONF['mgpointmapzoom'];
        $maptype = empty($_TKGMAPS_CONF['mgpointmaptype']) ? 'G_PHYSICAL_MAP' : $_TKGMAPS_CONF['mgpointmaptype'];
        $desc = empty($_TKGMAPS_CONF['mgpointmapdesc']) ? '' : $_TKGMAPS_CONF['mgpointmapdesc'];
        $desc_pos = empty($_TKGMAPS_CONF['mgpointmapdesc_pos']) ? 1 : $_TKGMAPS_CONF['mgpointmapdesc_pos'];
        $ret = LB."<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key={$_TKGMAPS_CONF['gmapapikey']}' type='text/javascript' charset='utf-8'></script>".LB;
        $ret .= (!empty($desc) && $desc_pos == 1) ? $desc : '';
        $ret .= "<div id='mgmap' style='padding:0px;'></div>".LB;
        $ret .= (!empty($desc) && $desc_pos == 0) ? $desc : '';
        $ret .= "<script type='text/javascript'>".LB;
        $ret .= "//<![CDATA[".LB;
        $ret .= "window.onload = function(){".LB;
        $ret .= "var mgmapstyle = document.getElementById('mgmap').style;".LB;
        $ret .= "mgmapstyle.width = '{$width}px';".LB;
        $ret .= "mgmapstyle.height = '{$height}px';".LB;
        $ret .= "mgmapstyle.margin = '0px';".LB;
        $ret .= " if(document.getElementById('mgmap')){".LB;
        $ret .= "  var mgmap = new GMap2(document.getElementById('mgmap'));".LB;
        $ret .= "  mgmap.setCenter(new GLatLng({$lat},{$lng}),{$zoom});".LB;
        $ret .= "  mgmap.setMapType({$maptype});".LB;
        $ret .= "  mgmap.addControl(new GSmallZoomControl());".LB;
        $ret .= "  var mgmarker = new GMarker(new GLatLng({$lat},{$lng}), { clickable: false});".LB;
        $ret .= "  mgmap.addOverlay(mgmarker);".LB;
        $ret .= " }".LB;
        $ret .= "}".LB;
        $ret .= "window.onunload = GUnload;".LB;
        $ret .= "//]]>".LB;
        $ret .= "</script>".LB;
    }
    return $ret;
}

function tkgmaps_mgexif ($p1, $p2, $autotag)
{
    global $_TKGMAPS_CONF, $_MG_CONF, $_TABLES;
    
    $ret = '';
    if (isset($_TKGMAPS_CONF['mgdispmgexif']) && $_TKGMAPS_CONF['mgdispmgexif']) {
        if ( tkgmaps_is_page_mg_media() == false ) { return $ret; }
        if (!isset($_REQUEST['s'])) { return $ret; }
        $path_img = tkgmaps_mg_path_image( tkgmaps_mg_filename($_REQUEST['s']) );
        $exiftags = tkgmaps_mg2map_makeexiftags(array($autotag), $path_img);
        $ret = implode('', array_values($exiftags));
    }
    return $ret;
}

function tkgmaps_overlay ($p1, $p2, $autotag)
{
    global $tkgmaps_overlay;
    
    $id = '';
    $img = '';
    $sw = '';
    $ne = '';
    $name = '';
    
    if ( !isset($p1) ) { return ''; }
    $id = $p1;
    $options_array = explode(' ', $p2);
    $option = array_shift($options_array);
    if ( !isset($option) ) { return ''; }
    $img = $option;
    $option = array_shift($options_array);
    if ( !isset($option) ) { return ''; }
    $sw = $option;
    $option = array_shift($options_array);
    if ( !isset($option) ) { return ''; }
    $ne = $option;
    $option = array_shift($options_array);
    if ( !isset($option) ) { return ''; }
    $name = $option;
    
    $tkgmaps_overlay[] = array('id' => $id, 'img' => $img, 'sw' => $sw, 'ne' => $ne, 'name' => $name);
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
    global $_TKGMAPS_CONF;

    $isgeocode = tkgmaps_ccgeocode($v1, $lat, $lng);
    if( $isgeocode == false ) {
        //        $apikey = _gmapsapikey();
        $url = 'http://maps.google.co.jp/maps/geo?q='.urlencode($v1).'&key='.urlencode($_TKGMAPS_CONF['gmapapikey']).'&output=xml';
        $xmldata = tkgmaps_get_http_contents($url);
        preg_match('@<coordinates>(.*)</coordinates>@',$xmldata, $mcoordinates);
        list($lng, $lat) = explode(',', $mcoordinates[1]);
        if( !empty($lat) && !empty($lng) && !mb_ereg('[^0-9\-\.]', $lat) && !mb_ereg('[^0-9\-\.]', $lng) ) {
            tkgmaps_setccgeocode($v1, $lat, $lng);
        }
    }
}
// アイコン名から画像のURLを作成
function tkgmaps_iconname2url($icon) {
    $url = "http://maps.google.co.jp/mapfiles/ms/icons/{$icon}.png";
    switch ($icon) {
        case 'blue-dot': case 'red-dot': case 'green-dot': case 'ltblue-dot':
        case 'yellow-dot': case 'purple-dot': case 'pink-dot': case 'orange-dot':
        case 'blue': case 'red': case 'green': case 'lightblue': case 'yellow':
        case 'purple': case 'pink': case 'orange':
            $surl = 'http://maps.google.co.jp/mapfiles/ms/icons/msmarker.shadow.png';
            break;
        case 'blue-pushpin': case 'red-pushpin': case 'grn-pushpin': case 'ltblu-pushpin':
        case 'ylw-pushpin': case 'purple-pushpin': case 'pink-pushpin':
            $surl = 'http://maps.google.co.jp/mapfiles/ms/icons/pushpin_shadow.png';
            break;
        default:
            $surl = "http://maps.google.co.jp/mapfiles/ms/icons/{$icon}.shadow.png";
            break;
    }
    return array($url,$surl);
}
// アイコンの生成に必要な値を作成
function tkgmaps_make_gicon($icon, $iconsize, $shadow, $shadowsize, $anchor, $wanchor, $info) {
    $input = array(
        'icon'         => $icon ,
        'iconshadow'   => $shadow ,
        'iconsize'     => $iconsize ,
        'iconshadowsize' => $shadowsize ,
        'iconanchor'   => $anchor ,
        'infowindowanchor' => $wanchor ,
        'info'         => $info
    );
    $gicon = array();
    if (!empty($icon) && substr($icon,0,1)!="/" && substr($icon,0,7)!="http://"){
        list($gicon['icon'], $gicon['iconshadow']) = tkgmaps_iconname2url($icon);
        if (empty($iconsize)) { $gicon['iconsize'] = '32,32'; }
        if (empty($shadowsize)) { $gicon['iconshadowsize'] = '59,32'; }
        if (empty($anchor)) { $gicon['iconanchor'] = '16,16'; }
        if (!empty($info) && empty($wanchor)) {
            $gicon['infowindowanchor'] = '16,0';
        }
    }
    $gicon = array_merge($input, $gicon);
    return $gicon;
}
// コントロールの値を作成
function tkgmaps_make_controls ($controls) {
    global $_TKGMAPS_CONF;
    
    $gcontrols = array();
    if (isset($controls) && is_array($controls)) {
        $gcontrols = $controls;
    } else {
        if (isset($_TKGMAPS_CONF['largectrl']) && $_TKGMAPS_CONF['largectrl'] == 1) { $gcontrols[] = 'large'; }
        if (isset($_TKGMAPS_CONF['smallctrl']) && $_TKGMAPS_CONF['smallctrl'] == 1) { $gcontrols[] = 'small'; }
        if (isset($_TKGMAPS_CONF['smallzoomctrl']) && $_TKGMAPS_CONF['smallzoomctrl'] == 1) { $gcontrols[] = 'szoom'; }
        if (isset($_TKGMAPS_CONF['maptypectrl']) && $_TKGMAPS_CONF['maptypectrl'] == 1) { $gcontrols[] = 'maptype'; }
        if (isset($_TKGMAPS_CONF['overviewctrl']) && $_TKGMAPS_CONF['overviewctrl'] == 1) { $gcontrols[] = 'overview'; }
        if (isset($_TKGMAPS_CONF['scalectrl']) && $_TKGMAPS_CONF['scalectrl'] == 1) { $gcontrols[] = 'scale'; }
    }
    return $gcontrols;
}
// マップタイプの値を作成
function tkgmaps_make_maptypes ($maptypes) {
    global $_TKGMAPS_CONF;
    
    $gmaptypes = array();
    if (isset($maptypes) && is_array($maptypes)) {
        $gmaptypes = $maptypes;
    } else {
        if (isset($_TKGMAPS_CONF['maptypes']) && is_array($_TKGMAPS_CONF['maptypes'])) {
            if (count($_TKGMAPS_CONF['maptypes']) != 3 || !in_array('G_NORMAL_MAP',$_TKGMAPS_CONF['maptypes']) || !in_array('G_SATELLITE_MAP',$_TKGMAPS_CONF['maptypes']) || !in_array('G_HYBRID_MAP',$_TKGMAPS_CONF['maptypes'])) {
                $gmaptypes = $_TKGMAPS_CONF['maptypes'];
            }
        }
    }
    return $gmaptypes;
}
// 幅や高さの単位を含む数値を返す。
//   数値のみ         -> px
//   数値のみじゃない -> いじらない (100%や400pxなど)
function tkgmaps_size_unit ($val) {
    if (is_numeric($val)) {
        return $val.'px';
    } else {
        return $val;
    }
}
// メディアギャラリのメディアページかチェック
function tkgmaps_is_page_mg_media () {
    global $_MG_CONF;
    $flg = false;
    if (empty($_SERVER['SCRIPT_NAME'])) { return $flg; }
    $scriptname = explode('/', $_SERVER['SCRIPT_NAME']);
    $scnt = count($scriptname);
    if ($scnt >= 2) {
        $sname = '';
        for ($i=$scnt-2; $i<$scnt;$i++) {
            $sname .= '/'.$scriptname[$i];
        }
        if ( $sname != '/'.$_MG_CONF['path_mg'].'/media.php' ) { return $flg; }
        $flg = true;
    }
//COM_errorLog("is_page_mg_media: flg: {$flg}");
    return $flg;
}

?>