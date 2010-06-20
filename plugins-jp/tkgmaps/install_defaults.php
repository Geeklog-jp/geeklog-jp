<?php

// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog - The Ultimate Weblog                          |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/tkgmaps/install_defaults.php                              |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), strtolower(basename(__FILE__))) !== FALSE) {
    die('This file can not be used on its own!');
}

/**
* tkgmaps default settings
*
* Initial Installation Defaults used when loading the online configuration
* records.  These settings are only used during the initial installation
* and not referenced any more once the plugin is installed
*
*/
global $_TKGMAPS_DEFAULT, $LANG_TKGMAPS_ADMIN;

$_TKGMAPS_DEFAULT = array();

$_TKGMAPS_DEFAULT['gmapapikey'] = '';
$_TKGMAPS_DEFAULT['setmaptype'] = 'G_NORMAL_MAP';
$_TKGMAPS_DEFAULT['infodispevent'] = 'click';
$_TKGMAPS_DEFAULT['infodispcenter'] = 1;

$_TKGMAPS_DEFAULT['largectrl'] = 1;
$_TKGMAPS_DEFAULT['smallctrl'] = 0;
$_TKGMAPS_DEFAULT['smallzoomctrl'] = 0;
$_TKGMAPS_DEFAULT['maptypectrl'] = 1;
$_TKGMAPS_DEFAULT['overviewctrl'] = 1;
$_TKGMAPS_DEFAULT['scalectrl'] = 1;

$_TKGMAPS_DEFAULT['maptypes'] = array('G_NORMAL_MAP', 'G_SATELLITE_MAP', 'G_HYBRID_MAP');

// Mediagallery
$_TKGMAPS_DEFAULT['mg2gmaps'] = 1;
$_TKGMAPS_DEFAULT['mg2duplication'] = 1;
$_TKGMAPS_DEFAULT['mginfoformat'] = '[image][br]Title: [title][br]Information: [description][keywords][DateTimeOriginal][Place][Artist]';
$_TKGMAPS_DEFAULT['mginfoimgformat'] = '<img src="[img_url]" width="120" height="90" alt="[title]"[xhtml]>';
$_TKGMAPS_DEFAULT['mginfokeywordsformat'] = '[br]Keywords: [keywords]';
$_TKGMAPS_DEFAULT['mginfoexifformat'] = array('DateTimeOriginal'=>'[br]Date Taken: [DateTimeOriginal]','Place'=>'[br]Place: [Place]','Artist'=>'[br]Taken by: [Artist]');

$_TKGMAPS_DEFAULT['mgdispmgpoint'] = 1;
$_TKGMAPS_DEFAULT['mgpointmapdesc'] = $LANG_TKGMAPS_ADMIN['mgdisp_pointmap_desc']; // 'Location of image';
$_TKGMAPS_DEFAULT['mgpointmapdesc_pos'] = 1;
$_TKGMAPS_DEFAULT['mgpointmapwidth'] = 230;
$_TKGMAPS_DEFAULT['mgpointmapheight'] = 170;
$_TKGMAPS_DEFAULT['mgpointmapzoom'] = 12;
$_TKGMAPS_DEFAULT['mgpointmaptype'] = 'G_PHYSICAL_MAP';
$_TKGMAPS_DEFAULT['mgdispmgexif'] = 1;

/**
* Initialize tkgmaps plugin configuration
*
* Creates the database entries for the configuation if they don't already
* exist.  Initial values will be taken from $_TKGMAPS_DEFAULT
* if available (e.g. from an old config.php), uses $_TKGMAPS_DEFAULT
* otherwise.
*
* @return   boolean     TRUE: success; FALSE: an error occurred
*
*/
function plugin_initconfig_tkgmaps() {
    global $_TKGMAPS_CONF, $_TKGMAPS_DEFAULT;

    if (is_array($_TKGMAPS_CONF) AND (count($_TKGMAPS_CONF) > 1)) {
        $_TKGMAPS_DEFAULT = array_merge($_TKGMAPS_DEFAULT, $_TKGMAPS_CONF);
    }

    $me = 'tkgmaps';
    $c = config::get_instance();
    if (!$c->group_exists($me)) {

        // Subgroup: main
        $c->add('sg_main', NULL, 'subgroup', 0, 0, NULL, 0, TRUE, $me);
        $c->add('fs_main', NULL, 'fieldset', 0, 0, NULL, 0, TRUE, $me);
        $c->add('gmapapikey', $_TKGMAPS_DEFAULT['gmapapikey'], 'text', 0, 0, NULL, 10, TRUE, $me);
        $c->add('setmaptype', $_TKGMAPS_DEFAULT['setmaptype'], 'text', 0, 0, NULL, 20, FALSE, $me);
        $c->add('infodispevent', $_TKGMAPS_DEFAULT['infodispevent'], 'select', 0, 0, 2, 30, TRUE, $me);
        $c->add('infodispcenter', $_TKGMAPS_DEFAULT['infodispcenter'], 'select', 0, 0, 0, 40, TRUE, $me);
        $c->add('fs_controls', NULL, 'fieldset', 0, 1, NULL, 0, TRUE, $me);
        $c->add('largectrl', $_TKGMAPS_DEFAULT['largectrl'], 'select', 0, 1, 0, 50, TRUE, $me);
        $c->add('smallctrl', $_TKGMAPS_DEFAULT['smallctrl'], 'select', 0, 1, 0, 60, TRUE, $me);
        $c->add('smallzoomctrl', $_TKGMAPS_DEFAULT['smallzoomctrl'], 'select', 0, 1, 0, 70, TRUE, $me);
        $c->add('maptypectrl', $_TKGMAPS_DEFAULT['maptypectrl'], 'select', 0, 1, 0, 80, TRUE, $me);
        $c->add('overviewctrl', $_TKGMAPS_DEFAULT['overviewctrl'], 'select', 0, 1, 0, 90, TRUE, $me);
        $c->add('scalectrl', $_TKGMAPS_DEFAULT['scalectrl'], 'select', 0, 1, 0, 100, TRUE, $me);
        $c->add('fs_maptypes', NULL, 'fieldset', 0, 2, NULL, 0, TRUE, $me);
        $c->add('maptypes', $_TKGMAPS_DEFAULT['maptypes'], '%text', 0, 2, NULL, 150, TRUE, $me); 
        // Subgroup: mediagallery
        $c->add('sg_mediagallery', NULL, 'subgroup', 1, 0, NULL, 0, TRUE, $me);
        $c->add('fs_mediagallery', NULL, 'fieldset', 1, 3, NULL, 0, TRUE, $me);
        $c->add('mg2gmaps', $_TKGMAPS_DEFAULT['mg2gmaps'], 'select', 1, 3, 0, 310, TRUE, $me);
        $c->add('mg2duplication', $_TKGMAPS_DEFAULT['mg2duplication'], 'select', 1, 3, 0, 320, TRUE, $me);
        $c->add('fs_mginfo', NULL, 'fieldset', 1, 4, NULL, 0, TRUE, $me);
        $c->add('mginfoformat', $_TKGMAPS_DEFAULT['mginfoformat'], 'text', 1, 4, 0, 350, TRUE, $me);
        $c->add('mginfoimgformat', $_TKGMAPS_DEFAULT['mginfoimgformat'], 'text', 1, 4, 0, 360, TRUE, $me);
        $c->add('mginfokeywordsformat', $_TKGMAPS_DEFAULT['mginfokeywordsformat'], 'text', 1, 4, 0, 370, TRUE, $me);
        $c->add('mginfoexifformat', $_TKGMAPS_DEFAULT['mginfoexifformat'], '*text', 1, 4, 0, 380, TRUE, $me);
        $c->add('fs_mgtagdisp', NULL, 'fieldset', 1, 5, NULL, 0, TRUE, $me);
        $c->add('mgdispmgpoint', $_TKGMAPS_DEFAULT['mgdispmgpoint'], 'select', 1, 5, 0, 410, TRUE, $me);
        $c->add('mgpointmapdesc', $_TKGMAPS_DEFAULT['mgpointmapdesc'], 'text', 1, 5, NULL, 420, TRUE, $me);
        $c->add('mgpointmapdesc_pos', $_TKGMAPS_DEFAULT['mgpointmapdesc_pos'], 'select', 1, 5, 1, 430, TRUE, $me);
        $c->add('mgpointmapwidth', $_TKGMAPS_DEFAULT['mgpointmapwidth'], 'text', 1, 5, NULL, 440, TRUE, $me);
        $c->add('mgpointmapheight', $_TKGMAPS_DEFAULT['mgpointmapheight'], 'text', 1, 5, NULL, 450, TRUE, $me);
        $c->add('mgpointmapzoom', $_TKGMAPS_DEFAULT['mgpointmapzoom'], 'text', 1, 5, NULL, 460, TRUE, $me);
        $c->add('mgpointmaptype', $_TKGMAPS_DEFAULT['mgpointmaptype'], 'text', 1, 5, NULL, 470, TRUE, $me);
        $c->add('mgdispmgexif', $_TKGMAPS_DEFAULT['mgdispmgexif'], 'select', 1, 5, 0, 510, TRUE, $me);
    }

    return TRUE;
}
