<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Site Calendar Plugin 'mycaljp' version 2.0.0                      |
// | Only Supported with Geeklog 1.4.1 and new Search Class                    |
// +---------------------------------------------------------------------------+
// | admin/index.php                                                           |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2007 by the following authors:                         |
// | Geeklog Author:       Tony Bibbs   - tony@tonybibbs.com                   |
// | mycal Block Author:   Blaine Lang  - geeklog@langfamily.ca                |
// | mycaljp Plugin Author: Yoshinori Tahara - dengen                          |
// | Original PHP Calendar by Scott Richardson - srichardson@scanonline.com    |
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
//

require_once '../../../lib-common.php';

// Only let admin users access this page
if ( !SEC_hasRights( 'mycaljp.admin' ) ) {
    // Someone is trying to illegally access this page
    COM_errorLog( "Someone has tried to illegally access the mycaljp Admin page.  "
      . "User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR", 1 );
    $display  = COM_siteHeader();
    $display .= COM_startBlock( $LANG_MYCALJP['access_denied'] );
    $display .= $LANG_MYCALJP['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter( true );
    echo $display;
    exit;
}

function MYCALJP_editConfig($conf)
{
    global $_CONF, $_PLUGINS, $LANG_ADMIN, $_TABLES, $_MYCALJP2_CONF, $LANG_MYCALJP;

    $result = DB_query( "SELECT title FROM " . $_TABLES['blocks'] 
                      . " WHERE phpblockfn = 'phpblock_mycaljp2'" );
    $o = DB_fetchArray($result);
    if ( isset( $o['title'] ) ) $conf['title'] = $o['title'];

    $A['contents'] = array();
    foreach ( $conf['support'] as $pi_name ) {
        $A['contents'][$pi_name] = 0;
        if ( $pi_name == "stories" || $pi_name == "comments" || in_array( $pi_name, $_PLUGINS ) )
            if ( isset( $conf['contents'] ) && in_array( $pi_name, $conf['contents'] ) )
                $A['contents'][$pi_name] = 1;
    }

    $A['themes']   = array();
    $themes = COM_getThemes();
    foreach ( $themes as $theme ) {
        $A['themes'][$theme] = 0;
        if ( isset( $conf['themes'] ) && in_array( $theme, $conf['themes'] ) )
            $A['themes'][$theme] = 1;
    }

    if ( is_dir( $_MYCALJP2_CONF['path_layout'] . '/admin' ) ) {
        $T = new Template( $_MYCALJP2_CONF['path_layout'] . '/admin' );
    } else {
        $T = new Template( $_CONF['path'] . 'plugins/mycaljp/templates/admin' );
    }
    
    $T->set_file( array( 'edit' => 'edit.thtml',
                         'content' => 'content.thtml',
                         'theme' => 'theme.thtml' ) );

    $T->set_var('site_url', $_CONF['site_url']);
    $T->set_var('site_admin_url', $_CONF['site_admin_url']);
    $T->set_var('icon_url', $_CONF['site_url'] . '/mycaljp/images/mycaljp.gif');
    $T->set_var('header', $LANG_MYCALJP['admin']);
    $T->set_var('plugin', 'mycaljp');
    $T->set_var('xhtml', XHTML);

    $T->set_var('start_block', COM_startBlock ($LANG_MYCALJP['admin'],
            '', COM_getBlockTemplate('_admin_block', 'header')));
    $T->set_var('end_block',
            COM_endBlock( COM_getBlockTemplate('_admin_block', 'footer')));
    $T->set_var('lang_save', $LANG_ADMIN['save']);
    $T->set_var('lang_cancel', $LANG_ADMIN['cancel']);

    $T->set_var('val_blocktitle',   ($conf['title']));
    $T->set_var('headertitleyear',  ($conf['headertitleyear']));
    $T->set_var('headertitlemonth', ($conf['headertitlemonth']));
    $T->set_var('sunday',    ($conf['sunday']));
    $T->set_var('monday',    ($conf['monday']));
    $T->set_var('tuesday',   ($conf['tuesday']));
    $T->set_var('wednesday', ($conf['wednesday']));
    $T->set_var('thursday',  ($conf['thursday']));
    $T->set_var('friday',    ($conf['friday']));
    $T->set_var('saturday',  ($conf['saturday']));

    $T->set_var('val_showholiday_yes', ( $conf['showholiday'] == 1 ) ? "checked=\"checked\"" : "" );
    $T->set_var('val_showholiday_no',  ( $conf['showholiday'] == 0 ) ? "checked=\"checked\"" : "" );

    $T->set_var('val_checkjpholiday_yes', ( $conf['checkjpholiday'] == 1 ) ? "checked=\"checked\"" : "" );
    $T->set_var('val_checkjpholiday_no',  ( $conf['checkjpholiday'] == 0 ) ? "checked=\"checked\"" : "" );

    $T->set_var('val_enablesrblocks_yes', ( $conf['enablesrblocks'] == 1 ) ? "checked=\"checked\"" : "" );
    $T->set_var('val_enablesrblocks_no',  ( $conf['enablesrblocks'] == 0 ) ? "checked=\"checked\"" : "" );

    $T->set_var('val_showstoriesintro_yes', ( $conf['showstoriesintro'] == 1 ) ? "checked=\"checked\"" : "" );
    $T->set_var('val_showstoriesintro_no',  ( $conf['showstoriesintro'] == 0 ) ? "checked=\"checked\"" : "" );

    $T->set_var('val_titleorder_ym',  ( $conf['titleorder'] == 1 ) ? "checked=\"checked\"" : "" );
    $T->set_var('val_titleorder_my',  ( $conf['titleorder'] == 0 ) ? "checked=\"checked\"" : "" );

    $T->set_var('lang_blocktitle',         $LANG_MYCALJP['blocktitle']);
    $T->set_var('lang_selecttemplates' ,   $LANG_MYCALJP['selecttemplates']);
    $T->set_var('lang_checkcontents',      $LANG_MYCALJP['checkcontents']);
    $T->set_var('lang_showholiday',        $LANG_MYCALJP['showholiday']);
    $T->set_var('lang_checkjpholiday',     $LANG_MYCALJP['checkjpholiday']);
    $T->set_var('lang_headertitleyear',    $LANG_MYCALJP['headertitleyear']);
    $T->set_var('lang_headertitlemonth',   $LANG_MYCALJP['headertitlemonth']);
    $T->set_var('lang_wdays',              $LANG_MYCALJP['wdays']);
    $T->set_var('lang_enablesrblocks',     $LANG_MYCALJP['enablesrblocks']);
    $T->set_var('lang_showstoriesintro',   $LANG_MYCALJP['showstoriesintro']);
    $T->set_var('lang_infotitleyear',      $LANG_MYCALJP['infotitleyear']);
    $T->set_var('lang_infotitlemonth',     $LANG_MYCALJP['infotitlemonth']);
    $T->set_var('lang_applythemetmplate',  $LANG_MYCALJP['applythemetmplate']);
    $T->set_var('lang_infoapplythemetemp', $LANG_MYCALJP['infoapplythemetemp']);
    $T->set_var('lang_yes',                $LANG_MYCALJP['yes']);
    $T->set_var('lang_no' ,                $LANG_MYCALJP['no']);
    $T->set_var('lang_titleorder'    ,     $LANG_MYCALJP['titleorder']);
    $T->set_var('lang_titleorder_ym' ,     $LANG_MYCALJP['year_month']);
    $T->set_var('lang_titleorder_my' ,     $LANG_MYCALJP['month_year']);
    
    
    foreach ( $conf['support'] as $pi_name )
    {
        if ( $pi_name == "stories" || $pi_name == "comments" || in_array( $pi_name, $_PLUGINS ) )
        {
            $T->set_var( 'contentitem', $pi_name );
            $T->set_var( 'val_contentitem', ( $A['contents'][$pi_name] == 1 ) ? "checked=\"checked\"" : "" );
            $T->parse( 'checkcontents', 'content', true );
        }
    }

    $templates = MYCALJP_getTemplates();
    $options = '';
    foreach ( $templates as $template )
    {
        $options .= '          <option value="' . MYCALJP_htmlspecialchars( $template ) . '"';
        if ( $template == $conf['template'] ) {
            $options .= ' selected="selected"';
        }
        $options .= '>' . MYCALJP_htmlspecialchars( $template ) . '</option>' . LB;
    }
    $T->set_var( 'selecttemplates', $options );

    foreach ( $themes as $theme )
    {
        $T->set_var( 'themeitem', $theme );
        $T->set_var( 'val_themeitem', ( $A['themes'][$theme] == 1 ) ? "checked=\"checked\"" : "" );
        $T->parse( 'checkthemes', 'theme', true );
    }
    $T->set_var('gltoken_name', CSRF_TOKEN);
    $T->set_var('gltoken', SEC_createToken());

    $T->parse( 'output', 'edit' );
    $retval = $T->finish( $T->get_var( 'output' ) );
    return $retval;
}

function MYCALJP_applyFilter($var) {
    if (is_array($var)) {
        return array_map('MYCALJP_applyFilter', $var);
    } else {
        return COM_applyFilter($var);
    }
}


/**
* Main 
*/

$_POST = MYCALJP_applyFilter( $_POST );

if ( isset( $_POST['mode'] ) && ($_POST['mode'] == $LANG_ADMIN['save']) && SEC_checkToken() ) {

    unset( $_MYCALJP2_CONF['contents'] );
    unset( $_MYCALJP2_CONF['themes'] );
    $_MYCALJP2_CONF = array_merge( $_MYCALJP2_CONF, $_POST );
    unset( $_MYCALJP2_CONF['mode'] );
    MYCALJP_writeConfig();

    $result = DB_query( "UPDATE " . $_TABLES['blocks'] .
        " SET title = '{$_POST['title']}' WHERE phpblockfn = 'phpblock_mycaljp2'" );

    header( "Location: " . $_CONF['site_admin_url'] . "/plugins/mycaljp/index.php" );
}

$_mycaljp_temp_conf = $_MYCALJP2_CONF;

if ( file_exists( $_CONF['path_data'] . 'mycaljp_conf.php' ) ) {
    require( $_CONF['path_data'] . 'mycaljp_conf.php' );
}
$_mycaljp_conf_src = $_MYCALJP2_CONF;

$_MYCALJP2_CONF = $_mycaljp_temp_conf;

$display = COM_siteHeader();
$display .= MYCALJP_editConfig($_mycaljp_conf_src);
$display .= COM_siteFooter( true );
echo $display;
?>
