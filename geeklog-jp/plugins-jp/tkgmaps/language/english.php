<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------|
// | language/english.php                                                      |
// +---------------------------------------------------------------------------|
// | Copyright (C) 2002 by the following authors:                              |
// |                                                                           |
// | Author:                                                                   |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
// |                                                                           |
// | modified by mystral-kk      - geeklog AT mystral-k DOT net                |
// | modified by dengen          - dengen AT mail DOT trybase DOT com          |
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
// 2008.05.14 v0.9 customed by G-COE, CSEAS. Addition of GoogleMapsEditor API Auto Tags
// Authors: Kinoshita
// Director: IVY WE CO.,LTD. Komma
// $Id$

// +---------------------------------------------------------------------------+
// | Array Format:                                                             |
// | $LANGXX[YY]:   $LANG - variable name                                      |
// |        XX - file id number                                                |
// |        YY - phrase id number                                              |
// +---------------------------------------------------------------------------+

/**
* Generic Install language
* 
* Be sure and change the name of this array to match your plugin
* e.g. $LANG_ST00
*
*/

$LANG_TKGMAPS = array (
    'display_name'      => 'GoogleMaps',
    'menu_title'        => 'GoogleMaps',
    'plugin'            => 'tkgmaps Plugin',
    'access_denied'     => 'Access Denied',
    'access_denied_msg' => 'Only Root Users have Access to this Page.  Your user name and IP have been recorded.',
    'admin'             => 'tkgmaps Plugin Admin',
    'install_header'    => 'Install/Uninstall the tkgmaps Plugin',
    'installed'         => 'The Plugin is Installed',
    'uninstalled'       => 'The Plugin is Not Installed',
    'install_success'   => 'Installation Successful',
    'install_failed'    => 'Installation Failed -- See your error log to find out why.',
    'uninstall_msg'     => 'The tkgmaps Plugin Successfully Uninstalled',
    'install'           => 'Install',
    'uninstall'         => 'UnInstall',
    'warning'           => 'Warning!  the tkgmaps Plugin is still Enabled',
    'enabled'           => 'Disable the plugin before uninstalling.',
    'readme'            => 'STOP!  Before you press install please read the ',
    'installdoc'        => 'Install Document.',

    // for stats
    'stats_headline'    => 'GoogleMaps(Top10)',
    'stats_title'       => 'Title',
    'stats_value'       => 'Value',
    'stats_no_value'    => 'No Data.',
    
    // for admin
    'manager'           => 'GoogleMaps Manager',
    'instructions'      => 'To modify or delete a data, click on that data\'s edit icon below.  To create a new data, click on "Create New" above.',
    
);

?>