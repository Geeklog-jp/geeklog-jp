<?php
// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog - The Ultimate Weblog                          |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/tkgmaps/functions.inc                                     |
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

/**
* Language file Include
*/
$plugin_path = $_CONF['path'] . 'plugins/tkgmaps/';
$langfile = $plugin_path . 'language/' . $_CONF['language'] . '.php';
clearstatcache();
if ( file_exists( $langfile ) ) {
    include_once $langfile;
} else {
    include_once $plugin_path . 'language/japanese_utf-8.php';
}

/**
* Load the plugin configuration
*/
if (!isset($_TKGMAPS_CONF['maptypes'])) {
    require_once $_CONF['path_system'] . 'classes/config.class.php';

    $tkgmaps_config = config::get_instance();
    $_TKGMAPS_CONF = $tkgmaps_config->get_config('tkgmaps');
}

$_TKGMAPS_CONF['version'] = '2.0.4';

require_once $_CONF['path'] . 'plugins/tkgmaps/function_tkgmaps.php';


// +---------------------------------------------------------------------------+
// | Geeklog Plugin API Implementations                                        |
// +---------------------------------------------------------------------------+

/**
* Called by the plugin Editor to display the current plugin code version
* This may be different than the version installed and registered currently.
* If newer then you may want to run the update
*
* @return   string  version number
*
*/

function plugin_chkVersion_tkgmaps () 
{
    global $_TKGMAPS_CONF;
    return $_TKGMAPS_CONF['version'];
}

/**
* Upgrade the plugin
*
* Universal Plugin:  modify/uncomment use it
*
* @return   boolean TRUE (= success)
*/
function plugin_upgrade_tkgmaps () {
    global $_CONF, $_TABLES, $_TKGMAPS_CONF, $_DB_table_prefix;

    $pi_name = 'tkgmaps';
    $currentVersion = DB_getItem($_TABLES['plugins'],'pi_version',"pi_name='$pi_name'");
    $table_name = $_DB_table_prefix . $pi_name;

    // the plugin needs these function so complain when they don't exist
    if (!function_exists ('SEC_createToken')) { return 3002; }

    // Do upgrading
    switch ( $currentVersion ) {
        case '0.9.1':
        case '0.9.2':
        case '0.9.3':
        case '0.9.4':
        case '0.9.5':
            $tkgmaps_apikey = DB_getItem ($table_name, 'googlemapsapikey', "1 LIMIT 1");

            if (!isset($_TKGMAPS_CONF['maptypes'])) {
                if (!function_exists('plugin_initconfig_tkgmaps')) {
                    require_once $_CONF['path_system'] . 'classes/config.class.php';
                    require_once $_CONF['path'] . 'plugins/tkgmaps/' . 'install_defaults.php';
                    $_TKGMAPS_CONF['gmapapikey'] = $tkgmaps_apikey;
                    if (!function_exists('plugin_initconfig_tkgmaps')) {
                        COM_errorLog($pi_name . " function not found! plugin_initconfig_tkgmaps() .");
                        return 3001;
                    }
                    if (!plugin_initconfig_tkgmaps()) {
                        return 3001;
                    }
                } else {
                    return 3001;
                }
            } else {
                return 3001;
            }

            DB_query ( "DROP TABLE {$table_name}", 1 );
        default :
            break;
    }

    // Update plugin info
    $pi_version = $_TKGMAPS_CONF['version'];
    $gl_version = '1.5.0';
    $pi_url     = 'http://hiroron.com/';
    
    $result = DB_query("UPDATE {$_TABLES['plugins']} SET pi_version = \"{$pi_version}\", pi_gl_version = \"{$gl_version}\", pi_homepage = \"{$pi_url}\" WHERE (pi_name = '{$pi_name}')");
    COM_errorLog($pi_name . " plugin was successfully updated to version {$pi_version}.");

    return TRUE;
}

/**
* Automatic uninstall function for plugins
*
* @return   array
*
* This code is automatically uninstalling the plugin.
* It passes an array to the core code function that removes
* tables, groups, features and php blocks from the tables.
* Additionally, this code can perform special actions that cannot be
* foreseen by the core code (interactions with other plugins for example)
*/
function plugin_autouninstall_tkgmaps () {
    $out = array (
        /* give the name of the tables, without $_TABLES[] */
        'tables' => array(),
        /* give the full name of the group, as in the db */
        'groups' => array('GoogleMaps Admin'),
        /* give the full name of the feature, as in the db */
        'features' => array('tkgmaps.admin'),
        /* give the full name of the block, including 'phpblock_', etc */
        'php_blocks' => array(),
        /* give all vars with their name */
        'vars'=> array()
    );
    return $out;
}



/**
* This will put an option for tkgmaps in the command and control block on
* moderation.php
*
*/
function plugin_cclabel_tkgmaps()
{
    global $LANG_TKGMAPS, $_CONF;

    if (SEC_hasRights ('tkgmaps.admin')) {
        return array ($LANG_TKGMAPS['plugin'],
                $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
                plugin_geticon_tkgmaps ());
    }

    return false;
}

/**
* returns the administrative option for this plugin
*
*/
function plugin_getadminoption_tkgmaps()
{
    global $_CONF, $_TABLES, $LANG_TKGMAPS;

    if (SEC_hasRights ('tkgmaps.admin')) {
        return array ($LANG_TKGMAPS['plugin'],
                $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php'
                );
    }
}

/**
* Returns the URL of the plugin's icon
*
* @return   string      URL of the icon
*
*/
function plugin_geticon_tkgmaps ()
{
    global $_CONF;

    return $_CONF['site_url'] . '/tkgmaps/images/tkgmaps.gif';
}



/**
* ScheduledTask function for plugins
*/
function plugin_runScheduledTask_tkgmaps () {
    if (tkgmaps_mg2map_is_enable()) {
        $lasttime = tkgmaps_mg2map_gettime();
        tkgmaps_mg2map($lasttime);
    }
}

function tkgmaps_mg2map_is_enable () {
    global $_PLUGINS, $_TKGMAPS_CONF;
    if (in_array('mediagallery', $_PLUGINS)) {
        if (isset($_TKGMAPS_CONF['mg2gmaps']) && $_TKGMAPS_CONF['mg2gmaps'] == 1) {
            return true;
        }
    }
    return false;
}

function tkgmaps_mg2map_gettime () {
    global $_CONF;
    $file = $_CONF['path_data'] . 'tkgmaps_scheduled.txt';
    $atime = 0;
    if (file_exists($file)) {
        clearstatcache();
        $atime = fileatime($file);
    }
    return $atime;
}

function tkgmaps_mg2map_settime () {
    global $_CONF;
    $lasttime = time();
    $file = $_CONF['path_data'] . 'tkgmaps_scheduled.txt';
    touch($file, $lasttime);
    return $lasttime;
}

function tkgmaps_mg2map_count ($atime = 0) {
    global $_TABLES;
    $result = DB_query("SELECT count(*) as count FROM {$_TABLES['mg_media']} WHERE media_upload_time >= {$atime} AND media_desc LIKE '%[maps:%'");
    $A = DB_fetchArray($result);
    $count = $A['count'];
    return $count;
}

function tkgmaps_mg2map ($atime = 0) {
    $tags_count = 0;
    $ins_count = 0;
    $mg_count = tkgmaps_mg2map_count($atime);
    if ($mg_count > 0) {
        $settime = 0;
        list($tags_count, $ins_count) = tkgmaps_mg2map_exec($atime);
        if ($ins_count > 0) {
            $settime = tkgmaps_mg2map_settime();
        }
        COM_errorLog('tkgmaps:mg2map: MG('.$mg_count.') ExtractedPointTag('.$tags_count.') PointTagInsert('.$ins_count.') ATime('.$atime.') SetTime('.$settime.')');
    }
    return array($mg_count, $tags_count, $ins_count);
}

function tkgmaps_mg2map_exec ($atime = 0) {
    global $_TABLES;
    
    $tags_count = 0;
    $ins_count = 0;
    
    $sql = "SELECT media_id,media_title,media_desc,media_filename,media_keywords FROM {$_TABLES['mg_media']} WHERE media_upload_time >= {$atime} AND media_desc LIKE '%[maps:%'";
    $result = DB_query($sql);
    $nrows = DB_numRows($result);
    
    if ($nrows > 0) {
        for ($i = 0; $i < $nrows; $i++) {
            $A = DB_fetchArray($result);
            $tags = tkgmaps_mg2map_maketags($A);
            $tagcount = count ($tags);
            if ($tagcount > 0) {
                $tags_count += $tagcount;
                $ins_count += tkgmaps_mg2map_inserttag($tags);
            }
        }
    }
    return array($tags_count, $ins_count);
}

function tkgmaps_mg_filename ($media_id) {
    global $_TABLES;
    return DB_getItem($_TABLES['mg_media'], 'media_filename', "media_id = '{$media_id}'");
}

function tkgmaps_mg_image_url ($filename) {
    global $_MG_CONF;
    $mediaobjects_url = isset($_MG_CONF['mediaobjects_url']) ? $_MG_CONF['mediaobjects_url'] : $_MG_CONF['site_url'] . '/mediaobjects';
    return $mediaobjects_url . '/disp/' . $filename[0] . '/' . $filename . '.jpg';
}

function tkgmaps_mg_path_image ($filename) {
    global $_MG_CONF;
    $path_mediaobjects = isset($_MG_CONF['path_mediaobjects']) ? $_MG_CONF['path_mediaobjects'] : $_MG_CONF['path_html'] . 'mediaobjects/';
    $path_img = $path_mediaobjects . 'orig/' . $filename[0] .'/' . $filename . '.jpg';
    if (!is_file($path_img)) {
        $path_img = $path_mediaobjects . 'disp/' . $filename[0] .'/' . $filename . '.jpg';
    }
    return $path_img;
}

function tkgmaps_getautotags ($content, $tagname, $ret_p1='') {
    $tags = array();
    $contentlen = MBYTE_strlen($content);
    $content_lower = MBYTE_strtolower($content);
    $autotag_prefix = '[' . $tagname . ':';
    $offset = 0;
    $prev_offset = 0;
    while ($offset < $contentlen) {
        $start_pos = MBYTE_strpos($content_lower, $autotag_prefix, $offset);
        if ($start_pos === false) { break; }
        else {
            $end_pos  = MBYTE_strpos($content_lower, ']', $start_pos);
            $next_tag = MBYTE_strpos($content_lower, '[', $start_pos + 1);
            if (($end_pos > $start_pos) AND (($next_tag === false) OR ($end_pos < $next_tag))) {
                $taglength = $end_pos - $start_pos + 1;
                $tag = MBYTE_substr($content, $start_pos, $taglength);
                $parms = explode(' ', $tag);
                if (MBYTE_substr ($parms[0], -1) == ':') {
                    $startpos = MBYTE_strlen ($parms[0]) + MBYTE_strlen ($parms[1]) + 2;
                    $label = str_replace (']', '', MBYTE_substr ($tag, $startpos));
                    $tagid = $parms[1];
                } else {
                    $label = str_replace (']', '',
                             MBYTE_substr ($tag, MBYTE_strlen ($parms[0]) + 1));
                    $parms = explode (':', $parms[0]);
                    if (count ($parms) > 2) {
                        array_shift ($parms);
                        $tagid = implode (':', $parms);
                    } else {
                        $tagid = $parms[1];
                    }
                }
                $newtag = array (
                    'tag'      => $tagname,
                    'tagstr'   => $tag,
                    'startpos' => $start_pos,
                    'length'   => $taglength,
                    'parm1'    => str_replace (']', '', $tagid),
                    'parm2'    => $label
                );
                if ( MBYTE_strlen($ret_p1) > 0 ) {
                    if ( $newtag['parm1'] == $ret_p1 ) {
                        $tags[] = $newtag;
                    }
                } else {
                    $tags[] = $newtag;
                }
            } else {
                // Error: tags do not match - return with no changes
                COM_errorLog('tkgmaps:getautotags:tags do not match!');
                break;
            }
            $prev_offset = $offset;
            $offset = $end_pos;
        }
    }
    return $tags;
}

function tkgmaps_mg2map_gps_value ($data) {
    $val = explode('/', $data);
    return $val[0] / $val[1];
}

function tkgmaps_mg2map_getexif_path () {
    global $_CONF, $_MG_CONF;
    $mg_exif_path = '';
    if (file_exists($_CONF['path'] . 'plugins/mediagallery/include/exif.php')) {
        // MG_wkz 1.6.8
        $mg_exif_path = $_CONF['path'] . 'plugins/mediagallery/include/exif.php';
    } elseif (file_exists($_MG_CONF['path_html'] . 'exif.php')) {
        // MG 1.6.1
        $mg_exif_path = $_MG_CONF['path_html'] . 'exif.php';
    }
    return $mg_exif_path;
}

function tkgmaps_mg2map_getgps_point ($path_img) {
    global $_CONF, $_MG_CONF;

    // php lib
    if (function_exists('exif_read_data')) {     // PHP >= 4.2.0, PHP5 Lib
        $exif = exif_read_data($path_img, 'GPS', true);
        if (isset($exif['GPS']) && is_array($exif['GPS'])) {
            $gps = $exif['GPS'];
            if (isset($gps['GPSLatitude']) && count($gps['GPSLatitude']) >= 3 && isset($gps['GPSLongitude']) && count($gps['GPSLongitude']) >= 3 && isset($gps['GPSLatitudeRef']) && isset($gps['GPSLongitudeRef'])) {
                $lat1 = tkgmaps_mg2map_gps_value($gps['GPSLatitude'][0]);
                $lat2 = tkgmaps_mg2map_gps_value($gps['GPSLatitude'][1]);
                $lat3 = tkgmaps_mg2map_gps_value($gps['GPSLatitude'][2]);
                $lon1 = tkgmaps_mg2map_gps_value($gps['GPSLongitude'][0]);
                $lon2 = tkgmaps_mg2map_gps_value($gps['GPSLongitude'][1]);
                $lon3 = tkgmaps_mg2map_gps_value($gps['GPSLongitude'][2]);
                $lat = $lat1 + ($lat2 / 60.0) + ($lat3 / 3600);
                $lon = $lon1 + ($lon2 / 60.0) + ($lon3 / 3600);
                if (isset($gps['GPSMapDatum']) && strtolower($gps['GPSMapDatum']) == 'tokyo') {
                    // TOKYO to WGS84
                    $lat = $lat - $lat * 0.00010695 + $lon * 0.000017464 + 0.0046017;
                    $lon = $lon - $lat * 0.000046038 - $lon * 0.000083043 + 0.010040;
                }
                $lat = ($gps['GPSLatitudeRef'] == 'S') ? -1 * $lat : $lat;
                $lon = ($gps['GPSLongitudeRef'] == 'W') ? -1 * $lon : $lon;
                return array($lat,$lon);
            }
        }
    } else {    // MG Lib
        $mg_exif_path = tkgmaps_mg2map_getexif_path();
        if (!empty($mg_exif_path)) {
            require_once($mg_exif_path);
            $rawexif = read_exif_data_raw( $path_img, false);
            if (!isset($rawexif['GPS'])) { break; }
            return array($rawexif['GPS']['Latitude'], $rawexif['GPS']['Longitude']);
        }
    }
    return FALSE;
}

function tkgmaps_mg2map_maketags ($A) {
    global $_MG_CONF, $_TABLES, $_TKGMAPS_CONF;

    $title = $A['media_title'];
    $description = $A['media_desc'];
    $filename = $A['media_filename'];
    $keywords = $A['media_keywords'];
    $img_url = tkgmaps_mg_image_url($filename);
    $path_img = tkgmaps_mg_path_image($filename);
    $img_mg_url = $_MG_CONF['site_url'] . '/media.php?f=0&amp;s='. $A['media_id'];
    
    $tags = array ();
    $tags_exif = array ();
    $autotags = tkgmaps_getautotags($description, 'maps');
    foreach ($autotags as $autotag) {
        if ($autotag['parm1'] == 'mgexif') {
            $tags_exif[] = $autotag;
        } else {
            $tags[] = $autotag;
        }
    }
    $maptags = array ();
    if (count ($tags) > 0) {
        $exiftags = tkgmaps_mg2map_makeexiftags($tags_exif, $path_img);
        foreach ($tags as $autotag) {
            $length = strlen($autotag['tagstr']);
            $parms = explode(' ', $autotag['parm2']);
            $p1 = $parms[0];
            array_shift($parms);
            $p2 = implode(' ', $parms);
            switch ($autotag['parm1']) {
                case 'mgpoint':
                    if (empty($p1)) { break; }
                    $options = $p2;
                    if (MBYTE_strpos($p1, ',') !== false) {
                        list($p1, $p2) = explode(',', $p1);
                    } else {
                        if (strtolower($p1) != 'gps') { break; }
                        // exif gps => p1, p2
                        $exif_gps = tkgmaps_mg2map_getgps_point($path_img);
                        if (!is_array($exif_gps)) { break; }
                        $p1 = $exif_gps[0];
                        $p2 = $exif_gps[1];
                    }
                    if (empty($p1) || empty($p2)) { break; }
                    $point = $p1 . ',' . $p2;
                    $op = $options;
                    $options = explode(' ', $op);
                    if (count ($options) > 0) {
                        $target_tags = array ();
                        $op_tag = '';
                        foreach ($options as $option) {
                            $targetcount = 0;
                            $cpos = strpos ($option, ':');
                            $k = substr ($option, 0, $cpos);
                            $v = substr ($option, $cpos + 1);
                            switch (strtolower($k)) {
                                case 'story':
                                    $target = 'stories';
                                    $targetid = $v;
                                    $targetcount = DB_count($_TABLES[$target], 'sid', $targetid);
                                    break;
                                case 'sp':
                                    $target = 'staticpage';
                                    $targetid = $v;
                                    $targetcount = DB_count($_TABLES[$target], 'sp_id', $targetid);
                                    break;
                                default:
                                    $op_tag .= (trim($op_tag)) != '' ? ' ' : '';
                                    $op_tag .= $k . ':' . $v;
                                    break;
                            }
                            if ($targetcount > 0) {
                                $target_tags[] = array(
                                                    'target'     => $target,
                                                    'targetid'   => $targetid,
                                                 );
                            }
                        }
                        if (count ($target_tags) > 0) {
                            $title = str_replace(' ', '_', $title);
                            $desc = trim(PLG_replaceTags($description));
                            $desc = str_replace(array("\r\n","\r","\n"), '<br'.XHTML.'>', $desc);
                            $def_img = "<img src=\"$img_url\" width=\"70\" height=\"70\" alt=\"$title\"".XHTML.">";
                            $def_info = '[image][description]';
                            if (isset($_TKGMAPS_CONF['mginfoimgformat'])) {
                                $img = $_TKGMAPS_CONF['mginfoimgformat'];
                                $img = str_replace('[img_url]', $img_url, $img);
                                $img = str_replace('[title]', $title, $img);
                                $img = str_replace('[xhtml]', XHTML, $img);
                                $img = str_replace('[br]', '<br'.XHTML.'>', $img);
                            } else {
                                $img = $def_img;
                            }
                            if (!empty($keywords)) {
                                $kwds = tkgmaps_mg2map_makekeywordslink($keywords);
                                if (isset($_TKGMAPS_CONF['mginfokeywordsformat'])) {
                                    $keywords = $_TKGMAPS_CONF['mginfokeywordsformat'];
                                    $keywords = str_replace('[keywords]', $kwds, $keywords);
                                    $keywords = str_replace('[xhtml]', XHTML, $keywords);
                                    $keywords = str_replace('[br]', '<br'.XHTML.'>', $keywords);
                                }
                            }
                            $image = COM_createLink($img, $img_mg_url);
                            $inforeplaces = array_merge($exiftags, array('image' => $image, 'description' => $desc, 'title' => $title, 'keywords' => $keywords, 'br' => '<br'.XHTML.'>' , 'xhtml' => XHTML ));
                            $info = isset($_TKGMAPS_CONF['mginfoformat']) ? $_TKGMAPS_CONF['mginfoformat'] : $def_info ;
                            foreach ($inforeplaces as $k => $v) {
                                $info = str_replace('['.$k.']', $v, $info);
                            }
                            foreach ($target_tags as $ttag) {
                                $maptags[] = array(
                                                'target'     => $ttag['target'],
                                                'targetid'   => $ttag['targetid'],
                                                'point'      => $point,
                                                'title'      => $title,
                                                'img_url'    => $img_url,
                                                'img_mg_url' => $img_mg_url,
                                                'desc'       => $desc,
                                                'info'       => $info,
                                                'options'    => $op_tag
                                             );
                            }
                        }
                    } else {
                        COM_errorLog('tkgmaps:mg2map:maketags:options(target&id) nothing!');
                    }
                    break;
            }
        }
    }
    
    return $maptags;
}

function tkgmaps_mg2map_makeexiftags ($tags, $path_img) {
    global $_TKGMAPS_CONF, $_MG_CONF;
    $exiftags = array ();
    if (count ($tags) > 0) {
        foreach ($tags as $tag) {
            $length = strlen($tag['tagstr']);
            $parms = explode(' ', $tag['parm2']);
            switch ($tag['parm1']) {
                case 'mgexif':
                    if (count ($parms) > 0) {
                        foreach ($parms as $option) {
                            $cpos = strpos ($option, ':');
                            if ($cpos !== false) {
                                $k = substr ($option, 0, $cpos);
                                $v = substr ($option, $cpos + 1);
                            } else { $k = $option; $v = ''; }
                            switch (strtolower($k)) {
                                default:
                                    if (empty($v)) {
                                        // exif data
                                        $mg_exif_path = tkgmaps_mg2map_getexif_path();
                                        if (!empty($mg_exif_path)) {
                                            require_once($mg_exif_path);
                                            $rawexif = read_exif_data_raw( $path_img, false);
                                            if (is_array($rawexif)) {
                                                foreach ($rawexif as $exifkey => $exifval) {
                                                    if (isset($rawexif[$exifkey]) && is_array($rawexif[$exifkey])) {
                                                        if (isset($rawexif[$exifkey][$k])) {
                                                            $v = trim($rawexif[$exifkey][$k]);
                                                            switch (substr($k,0,8)) {
                                                                case 'DateTime':
                                                                    /* Convert to localized string. */
                                                                    if (preg_match('#(\d+):(\d+):(\d+)\s+(\d+):(\d+):(\d+)#', $v, $m)) {
                                                                        $time = mktime((int)$m[4], (int)$m[5], (int)$m[6],
                                                                                       (int)$m[2], (int)$m[3], (int)$m[1]);
                                                                    }
                                                                    /* This ISO 8601 pattern seems to be used by newer Adobe products */
                                                                    else if (preg_match('#(\d+)-(\d+)-(\d+)T(\d+):(\d+):(\d+)(([-+])(\d+)(:(\d+))?)?#', $v, $m)) {
                                                                        $time = mktime((int)$m[4], (int)$m[5], (int)$m[6],
                                                                                       (int)$m[2], (int)$m[3], (int)$m[1]);
                                                                    }
                                                                    if (!empty($time)) {
                                                                        if (isset($m[8])) {
                                                                            $offset = ((int)$m[9] * 60 + (isset($m[11]) ? (int)$m[11] : 0)) * 60;
                                                                            if ($m[8] == '+') {
                                                                                $time += $offset;
                                                                            }
                                                                            else {
                                                                                $time -= $offset;
                                                                            }
                                                                        }
                                                                        $v = strftime('%x %X', $time);
                                                                    }
                                                                    break;
                                                            }
                                                            COM_errorLog('tkgmaps_mg2map_makeexiftags: exif '."{$exifkey}.{$k}".' value='.print_r($v,true));
                                                            break;
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    if (isset($_TKGMAPS_CONF['mginfoexifformat']) && is_array($_TKGMAPS_CONF['mginfoexifformat']) && isset($_TKGMAPS_CONF['mginfoexifformat'][$k]) && !empty($v) ) {
                                        $format = $_TKGMAPS_CONF['mginfoexifformat'][$k];
                                        $format = str_replace('[xhtml]', XHTML, $format);
                                        $format = str_replace('[br]', '<br'.XHTML.'>', $format);
                                        $exiftags[$k] = str_replace('['.$k.']', $v, $format);
                                    } else {
                                        $exiftags[$k] = $v;
                                    }
                                    break;
                            }
                        }
                    }
                    break;
            }
        }
    }
    if (isset($_TKGMAPS_CONF['mginfoexifformat']) && is_array($_TKGMAPS_CONF['mginfoexifformat']) ) {
        foreach ($_TKGMAPS_CONF['mginfoexifformat'] as $k => $v) {
            if (!isset($exiftags[$k])) {
                $exiftags[$k] = '';
            }
        }
    }
    return $exiftags;
}

function tkgmaps_mg2map_makekeywordslink($keywords) {
    global $_MG_CONF;
    $kwText = '';
    if (version_compare($_MG_CONF['version'], '1.6.1') < 0) { return $keywords; }
    $keyWords = array();
    $keyWords = explode(' ',$keywords);
    $numKeyWords = count($keyWords);
    for ( $i=0;$i<$numKeyWords;$i++ ) {
        $keyWords[$i] = str_replace('"',' ',$keyWords[$i]);
        $searchKeyword = $keyWords[$i];
        $keyWords[$i] = str_replace('_',' ',$keyWords[$i]);
        $kwText .= '<a href="' . $_MG_CONF['site_url'] . '/search.php?mode=search&amp;swhere=1&amp;keywords=' . $searchKeyword . '&amp;keyType=any">' . $keyWords[$i] . '</a>&nbsp;';
    }
    return $kwText;
}

function tkgmaps_mg2map_inserttag ($tags) {
    global $_TABLES, $_TKGMAPS_CONF;
    
    $inscount = 0;
    
    foreach ($tags as $tag) {
        $sql = '';
        switch ($tag['target']) {
            case 'stories':
                $sql .= "SELECT * FROM {$_TABLES['stories']} WHERE sid='{$tag['targetid']}'";
                if (!empty($_TKGMAPS_CONF['mg2duplication']) && $_TKGMAPS_CONF['mg2duplication']) {
                    $sql .= " AND (introtext NOT LIKE '%{$tag['img_mg_url']}%' OR bodytext NOT LIKE '%{$tag['img_mg_url']}%')";
                }
                break;
            case 'staticpage':
                $sql .= "SELECT * FROM {$_TABLES['staticpage']} WHERE sp_id='{$tag['targetid']}'";
                if (!empty($_TKGMAPS_CONF['mg2duplication']) && $_TKGMAPS_CONF['mg2duplication']) {
                    $sql .= " AND sp_content NOT LIKE '%{$tag['img_mg_url']}%'";
                }
                break;
        }
        $result = DB_query($sql);
        $nrows = DB_numRows($result);
        if ($nrows > 0) {
            $A = DB_fetchArray($result);
            $tag_info = $tag['info'];
            $ops = (!empty($tag['options'])) ? ' ' . $tag['options'] : '' ;
            $pointtag = "[maps:point {$tag['point']} title:{$tag['title']}{$ops} {$tag_info}]";
            $checkpattern = '#\[maps:point '.$tag['point'].'[^\]]+'.$tag['img_mg_url'].'[^\]]\]#';
            switch ($tag['target']) {
                case 'stories':
                    $intro = $A['introtext'];
                    $body = $A['bodytext'];
                    $introlength = strlen($intro);
                    $content = $intro;
                    $content .= $body;
                    if (!empty($_TKGMAPS_CONF['mg2duplication']) && $_TKGMAPS_CONF['mg2duplication']) {
                        if (preg_match($checkpattern, $content) > 0) { break; }
                    }
                    $lastshow_pos = tkgmaps_rstrpos($content, '[maps:show', 0);
                    if ($lastshow_pos < $introlength) {
                        $content = $intro;
                        $sql_set = 'introtext = ';
                    } else {
                        $content = $body;
                        $sql_set = 'bodytext = ';
                    }
                    $new_content = substr($content, 0, $lastshow_pos);
                    $new_content .= $pointtag . LB;
                    $new_content .= substr($content, $lastshow_pos);
                    $sql_set .= "'".addslashes($new_content) . "'";
                    DB_query ("UPDATE {$_TABLES['stories']} SET {$sql_set} WHERE sid = '{$tag['targetid']}'");
                    $inscount += 1;
                    break;
                case 'staticpage':
                    $content = $A['sp_content'];
                    if (!empty($_TKGMAPS_CONF['mg2duplication']) && $_TKGMAPS_CONF['mg2duplication']) {
                        if (preg_match($checkpattern, $content) > 0) { break; }
                    }
                    $lastshow_pos = tkgmaps_rstrpos($content, '[maps:show', 0);
                    $new_content = substr($content, 0, $lastshow_pos);
                    $new_content .= $pointtag . LB;
                    $new_content .= substr($content, $lastshow_pos);
                    $sql_set = "sp_content = '" . addslashes($new_content) . "'";
                    DB_query ("UPDATE {$_TABLES['staticpage']} SET {$sql_set} WHERE sp_id = '{$tag['targetid']}'");
                    $inscount += 1;
                    break;
            }
        } else {
            // COM_errorLog('tkgmaps:mg2map:inserttag: target('.$tag['target'].'='.$tag['targetid'].') has already inserted!');
        }
    }
    return $inscount;
}

function tkgmaps_makehtml_options ($name, $arr_val)
{
    $retval = '';
    if (!empty($arr_val) && is_array($arr_val)) {
        if (count($arr_val) == 1) {
            $retval .= '<input type="hidden" name="' . $name . '" value="' . $arr_val[0] . '"' . XHTML . '>' . $arr_val[0];
        } else {
            $retval .= '<select name="' . $name . '" id="' . $name . '">';
            foreach ($arr_val as $val) {
                $retval .= '<option value="' . $val . '">' . $val . '</option>';
            }
            $retval .= '</select>';
        }
    }
    return $retval;
}

function tkgmaps_file2map ($file, $style, $target, $targetid)
{
    $total = 0; $insert = 0;
    list($data, $csvline, $csverr) = tkgmaps_file2map_getcsv($file, $style);
    if (!is_array($data) && $data == false) { return array(-1,-1); }
    list($total, $insert) = tkgmaps_file2map_inserttag($data, $target, $targetid);
    
    return array($csvline, $csverr, $total, $insert);
}

function tkgmaps_file2map_getcsv ($file, $style)
{
    global $_CONF;

    $linecount = 0; $errcount = 0;
    $data = array ();
    
    $class = $_CONF['path'] . 'plugins/tkgmaps/classes/' . $style . '.class.php';
    if (!file_exists($class)) { return false; }
    require($class);
    
    $csv = new $style ($file, 'r');
    $csv->open();
    while( $col = $csv->getline() ) {
        $parsedata = $csv->parse($col);
        if (is_array($parsedata)) {
            $data[] = $parsedata;
        } else {
            $errcount += 1;
        }
        $linecount += 1;
    }
    $csv->close();
    
    return array($data, $linecount, $errcount);
}

function tkgmaps_file2map_inserttag ($data, $target, $targetid)
{
    global $_TABLES;
    
    $total = 0; $insert = 0;
    if (count($data) > 0) {
        $total = count($data);
        switch ($target) {
            case 'stories':
                $sql .= "SELECT * FROM {$_TABLES['stories']} WHERE sid='{$targetid}'";
                break;
            case 'staticpage':
                $sql .= "SELECT * FROM {$_TABLES['staticpage']} WHERE sp_id='{$targetid}'";
                break;
        }
        $result = DB_query($sql);
        $nrows = DB_numRows($result);
        if ($nrows > 0) {
            $A = DB_fetchArray($result);
            $pointtag = '';
            $inspoint = 0;
            foreach($data as $row) {
                $point = $row['point'];
                $title = (empty($row['title'])) ? '' : ' title:' . $row['title'];
                $ops = (empty($row['options'])) ? '' : ' ' . $row['options'];
                $info = $row['info'];
                $pointtag .= "[maps:point {$point}{$title}{$ops} {$info}]" . LB;
                $inspoint += 1;
            }
            switch ($target) {
                case 'stories':
                    $intro = $A['introtext'];
                    $body = $A['bodytext'];
                    $introlength = strlen($intro);
                    $content = $intro . $body;
                    $lastshow_pos = tkgmaps_rstrpos($content, '[maps:show', 0);
                    if ($lastshow_pos < $introlength) {
                        $content = $intro;
                        $sql_set = 'introtext = ';
                    } else {
                        $content = $body;
                        $sql_set = 'bodytext = ';
                    }
                    $new_content = substr($content, 0, $lastshow_pos);
                    $new_content .= addslashes ($pointtag);
                    $new_content .= substr($content, $lastshow_pos);
                    $sql_set .= "'".$new_content . "'";
                    DB_query ("UPDATE {$_TABLES['stories']} SET {$sql_set} WHERE sid = '{$targetid}'");
                    $insert += $inspoint;
                    break;
                case 'staticpage':
                    $content = $A['sp_content'];
                    $lastshow_pos = tkgmaps_rstrpos($content, '[maps:show', 0);
                    $new_content = substr($content, 0, $lastshow_pos);
                    $new_content .= addslashes ($pointtag);
                    $new_content .= substr($content, $lastshow_pos);
                    DB_query ("UPDATE {$_TABLES['staticpage']} SET sp_content = '{$new_content}' WHERE sp_id = '{$targetid}'");
                    $insert += $inspoint;
                    break;
            }
        }
    }
    return array($total, $insert);
}

//
// If in the needle there is more than one character then in php 4 we can use the above
// statement for finding the position of last occurrence of a substring in a string instead of
// strrpos. Because in php 4 strrpos uses the first character of the substring.
//
function tkgmaps_rstrpos($haystack, $needle, $offset=0)
{
    $size = strlen ($haystack);
    $pos = strpos (strrev($haystack), strrev($needle), $offset);

    if ($pos === false) return false;

    return $size - $pos - strlen($needle);
}

//
// Geeklog 1.6.0 COM_output
//
if ((!function_exists('COM_output'))) {
    function COM_output($display) {
        echo $display;
    }
}


function tkgmaps_map2file ($target, $targetid, $style, $filename)
{
    $data = tkgmaps_map2file_getid($target, $targetid);
    if (!is_array($data) && $data === false) { return false; }
    $download_data = tkgmaps_map2file_make_download($data, $style, $filename);
    
    return $download_data;
}

function tkgmaps_map2file_getid($target, $targetid)
{
    global $_TABLES;
    
    $data = array ();
    $table = ''; $key = '';
    
    switch ($target) {
    case 'stories':
        $table = $_TABLES['stories'];
        $key = 'sid';
        $data_cols = array('introtext','bodytext');
        break;
    case 'staticpage':
        $table = $_TABLES['staticpage'];
        $key = 'sp_id';
        $data_cols = array('sp_content');
        break;
    }
    
    if (DB_count($table, $key, $tergetid) < 1) { return false; }
    
    $result = DB_query("SELECT * FROM {$table} WHERE {$key}='{$targetid}'");
    $nrows = DB_numRows($result);
    if ($nrows > 0) {
        $A = DB_fetchArray($result);
        $mapdata = '';
        foreach ($data_cols as $col) {
            $mapdata .= $A[$col];
        }
        $data = tkgmaps_map2file_db2point($mapdata);
    }
    return $data;
}

function tkgmaps_map2file_db2point($mapdata)
{
    $data = array ();
    
    $autotags = tkgmaps_getautotags($mapdata, 'maps', 'point');
    foreach ($autotags as $autotag) {
        $newtag = $autotag;
        $newtag['parms'] = tkgmaps_parse_autotags_point($autotag['parm2']);
        $data[] = $newtag;
    }
    
    return $data;
}

function tkgmaps_parse_autotags_point ($parm) {
    $data = array();
    $opt_array = explode(' ', $parm);
    if (count($opt_array)>0) {
        $data['point'] = array_shift($opt_array);
        $opt_names = tkgmaps_point_optionname();
        while(count($opt_array)>0) {
            $opt = array_shift($opt_array);
            $colonpos = MBYTE_strpos($opt, ':');
            $opt_len = MBYTE_strlen($opt);
            $key = MBYTE_substr($opt, 0, $colonpos);
            $val = ($opt_len > $colonpos+1) ? MBYTE_substr($opt, $colonpos+1) : '';
            if (in_array($key, $opt_names)) {
                $val = str_replace(array('<br>','<br />'), "\n", $val);
                $data[$key] = $val;
            } else {
                $other = $opt . ' ' . implode(' ', $opt_array);
                $data['other'] = ltrim($other);
                unset($opt_array);
            }
        }
    }
    return $data;
}

function tkgmaps_map2file_make_download($data, $style, $filename)
{
    global $_CONF;
    
    $class = $_CONF['path'] . 'plugins/tkgmaps/classes/' . $style . '.class.php';
    if (!file_exists($class)) { return false; }
    require($class);
    
    $download_data = '';
    
    $tmpfile = tempnam($_CONF['path_data'], 'tkgmaps-map2file-down.tmp');
    $csv = new $style ($tmpfile, 'w');
    $csv->open();
    foreach ($data as $point) {
        $download_data .= $csv->mkline($point['parms']);
    }
    $csv->close();
    unlink($tmpfile);
    
    return $download_data;
}

?>