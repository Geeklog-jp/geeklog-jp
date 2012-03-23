<?php

// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog - The Ultimate Weblog                          |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/tkgmaps/language/english.php                              |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2009-2010 hiroron - hiroron AT hiroron DOT com              |
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

$LANG_TKGMAPS = array (
    'plugin'            => 'GoogleMaps',
    'admin'             => 'GoogleMaps Admin',
    'access_denied'     => 'Access Denied',
    'access_denied_msg' => 'Only Root Users have Access to this Page.  Your user name and IP have been recorded.',
);

$LANG_TKGMAPS_ADMIN = array (
    'instructions'      => 'Information from the point of creation MG "Points generated from MG" please click.',
    'mg2point'          => 'Points generated from MG',
    'notmediagallery'   => 'Valid or is not in MediaGallery. Invalid configuration or in cooperation with MediaGallery.',
    'mg2point_title'    => 'Points generated from the point of capture information MediaGallery',
    'mg2point_message'  => 'Please specify a date. MediaGallery images were registered on or after that date will reflect the input Gmap. To reflect all that is left blank and send.',
    'mg2point_date'     => 'Date',
    'mg2point_datehelp' => '*)YYYY-DD-MM ex)',
    'mg2point_submit'   => 'MG run by the uptake',
    'mg2point_error'    => 'Error!',
    'mg2point_err_date' => 'is not a valid date.',
    'mg2point_exec_message' => 'Gmap %s forthe complete capture of location information.',
    'mg2point_exec_msg_all' => 'All data was up to MediaGallery',
    'mg2point_exec_msg_date' => 'Data were registered on or after %s days',
    'mg2point_exec_mg'  => 'The number of MG was extracted from a location',
    'mg2point_exec_tag' => 'The number of location information that reflects',
    'mg2point_exec_ins' => 'Add to that the number of actual location',
    'mg2point_exec_insted' => 'The number of location has been added',
    'mg2point_exec_count' => '%d',
    'mgdisp_pointmap_desc' => 'Location of image',
);

// Localization of the Admin Configuration UI
$LANG_configsections['tkgmaps'] = array(
    'label'             => $LANG_TKGMAPS['plugin'],
    'title'             => $LANG_TKGMAPS['plugin'] . ' Configuration',
);

$LANG_configsubgroups['tkgmaps'] = array(
    'sg_main'           => 'Main Settings',
    'sg_mediagallery'   => 'MediaGallery'
);

$LANG_fs['tkgmaps'] = array(
    'fs_main'           => $LANG_TKGMAPS['plugin'] . ' Main Settings',
    'fs_controls'       => $LANG_TKGMAPS['plugin'] . ' Default controls',
    'fs_maptypes'       => $LANG_TKGMAPS['plugin'] . ' Default map type of switching',
    'fs_mediagallery'   => $LANG_TKGMAPS['plugin'] . ' Function with MediaGallery',
    'fs_mginfo'         => 'MG set a window for capturing information from',
    'fs_mgtagdisp'      => 'MG autotag in display settings'
);

$LANG_confignames['tkgmaps'] = array(
    'gmapapikey'        => 'GoogleMaps API Key',
    'setmaptype'        => 'The default type map',
    'infodispevent'     => 'Show info window operation',
    'infodispcenter'    => 'Show info window on map center',
    'largectrl'         => 'Large Control',
    'smallctrl'         => 'Small Control',
    'smallzoomctrl'     => 'Small Zoom Control',
    'maptypectrl'       => 'Map Type Control',
    'overviewctrl'      => 'Over View Control',
    'scalectrl'         => 'Scale Control',
    'maptypes'          => 'Select the type of map',
    'mg2gmaps'          => 'MG to enable collaboration with',
    'mginfoformat'      => 'Display format of the information window',
    'mginfoimgformat'   => 'Display format of the image (image)',
    'mginfoexifformat'  => 'Shooting information display format',
    'mgdispmgpoint'     => 'mgpoint tag to view the location map',
    'mgpointmapdesc'    => 'Map Description',
    'mgpointmapdesc_pos' => 'View Location Map Description',
    'mgpointmapwidth'   => 'Transverse size of the map(width)',
    'mgpointmapheight'  => 'Vertical size of the map(height)',
    'mgpointmapzoom'    => 'Map Zoom(zoom)',
    'mgpointmaptype'    => 'The default map type Map',
    'mgdispmgexif'      => 'Show mgexif tag shooting information',
);

$LANG_configselects['tkgmaps'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('Top of the map' => 1, 'Below the map' => 0),
    2 => array('Click' => 'click', 'Double-click' => 'dblclick', 'Mouse over' => 'mouseover'),
);

// Messages for the plugin upgrade
$PLG_tkgmaps_MESSAGE3001 = 'Failed to upgrade the plug-in.';
$PLG_tkgmaps_MESSAGE3002 = $LANG32[9];

?>