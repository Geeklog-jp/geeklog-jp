<?php

// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog - The Ultimate Weblog                          |
// +---------------------------------------------------------------------------+
// | public_html/admin/plugins/tkgmaps/index.php                               |
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

require_once '../../../lib-common.php';

// Only let admin users access this page
if ( !SEC_hasRights( 'tkgmaps.admin' ) ) {
    // Someone is trying to illegally access this page
    COM_errorLog( "Someone has tried to illegally access the tkgmaps Admin page.  User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: {$_SERVER['REMOTE_ADDR']}", 1 );
    $display  = COM_siteHeader()
              . COM_startBlock( $LANG_TKGMAPS['access_denied'] )
              . $LANG_TKGMAPS['access_denied_msg']
              . COM_endBlock()
              . COM_siteFooter( true );
    COM_output($display);
    exit;
}

function listtkgmaps()
{
    global $_CONF, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
    
    require_once $_CONF['path_system'] . 'lib-admin.php';
    $retval = '';
    
    $menu_arr = array (
        array('url'  => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php?mode=file2point',
              'text' => $LANG_TKGMAPS_ADMIN['file2point']),
        array('url'  => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php?mode=point2file',
              'text' => $LANG_TKGMAPS_ADMIN['point2file']),
    );
    $menu_msg = $LANG_TKGMAPS_ADMIN['instructions'];
    
    if (tkgmaps_mg2map_is_enable()) {
        $menu_mg_arr = array(
            array('url' => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php?mode=mg2point',
                  'text' => $LANG_TKGMAPS_ADMIN['mg2point']),
        );
        $menu_arr = array_merge($menu_arr, $menu_mg_arr);
        $menu_msg .= $LANG_TKGMAPS_ADMIN['mg2instructions'];
    }
    
    $retval .= COM_startBlock($LANG_TKGMAPS['admin'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    
    $retval .= ADMIN_createMenu($menu_arr, $menu_msg, plugin_geticon_tkgmaps());
    
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    
    return $retval;
}

function form_mg2point ()
{
    global $_CONF, $_PLUGINS, $_TKGMAPS_CONF, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
    
    require_once $_CONF['path_system'] . 'lib-admin.php';
    $retval = '';
    $today = date ('Y-m-d');
    
    // check MG
    if (!tkgmaps_mg2map_is_enable()) {
        $retval .= COM_showMessage($LANG_TKGMAPS_ADMIN['notmediagallery']);
        return $retval;
    }
    $retval .= COM_startBlock($LANG_TKGMAPS_ADMIN['mg2point_title'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    
    $template = new Template ($_CONF['path'] . 'plugins/tkgmaps/templates/admin/');
    $template->set_file('form', 'mg2point.thtml');
    $template->set_var('xhtml', XHTML);
    $template->set_var('site_url', $_CONF['site_url']);
    $template->set_var('site_admin_url', $_CONF['site_admin_url']);
    $template->set_var('layout_url',$_CONF['layout_url']);
    
    $template->set_var('lang_message', $LANG_TKGMAPS_ADMIN['mg2point_message']);
    $template->set_var('lang_date', $LANG_TKGMAPS_ADMIN['mg2point_date']);
    $template->set_var('lang_helpdate', $LANG_TKGMAPS_ADMIN['mg2point_datehelp'] . $today);
    
    $template->set_var('lang_submit', $LANG_TKGMAPS_ADMIN['mg2point_submit']);
    
    $template->set_var('gltoken_name', CSRF_TOKEN);
    $template->set_var('gltoken', SEC_createToken());
    $template->parse('output', 'form');
    $desc = $template->finish($template->get_var('output'));
    
    $menu_arr = array(
        array('url' => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
              'text' => $LANG_TKGMAPS['admin']),
    );
    $retval .= ADMIN_createMenu($menu_arr, $desc, plugin_geticon_tkgmaps());
    
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    
    return $retval;
}

function mg2pointexec ($date='')
{
    global $_CONF, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
    
    require_once $_CONF['path_system'] . 'lib-admin.php';
    $retval = '';
    $lasttime = 0;
    $msgdata = $LANG_TKGMAPS_ADMIN['mg2point_exec_msg_all'];
    
    if (!empty($date)) {
        list($y, $m, $d) = explode ('-', $date);
        if (!checkdate($m, $d, $y)) {
            $errmsg = $LANG_TKGMAPS_ADMIN['mg2point_error'] . $date . $LANG_TKGMAPS_ADMIN['mg2point_err_date'] . $LANG_TKGMAPS_ADMIN['mg2point_datehelp'] . $today;
            $retval .= COM_showMessageText($errmsg);
            return $retval;
        } else {
            $lasttime = mktime(0, 0, 0, $m, $d, $y);
            $msgdata = sprintf($LANG_TKGMAPS_ADMIN['mg2point_exec_msg_date'], $date);
        }
    }
    
    list($mg, $tag, $ins) = tkgmaps_mg2map($lasttime);
    $insted = $tag - $ins;
    
    $template = new Template ($_CONF['path'] . 'plugins/tkgmaps/templates/admin/');
    $template->set_file('exec', 'mg2pointexec.thtml');
    $template->set_var('xhtml', XHTML);
    $template->set_var('site_url', $_CONF['site_url']);
    $template->set_var('site_admin_url', $_CONF['site_admin_url']);
    $template->set_var('layout_url',$_CONF['layout_url']);
    
    $template->set_var('lang_message', sprintf($LANG_TKGMAPS_ADMIN['mg2point_exec_message'], $msgdata));
    $template->set_var('lang_mg', $LANG_TKGMAPS_ADMIN['mg2point_exec_mg']);
    $template->set_var('lang_tag', $LANG_TKGMAPS_ADMIN['mg2point_exec_tag']);
    $template->set_var('lang_ins', $LANG_TKGMAPS_ADMIN['mg2point_exec_ins']);
    $template->set_var('lang_insted', $LANG_TKGMAPS_ADMIN['mg2point_exec_insted']);
    
    $template->set_var('mgcount', sprintf($LANG_TKGMAPS_ADMIN['mg2point_exec_count'], $mg));
    $template->set_var('tagcount', sprintf($LANG_TKGMAPS_ADMIN['mg2point_exec_count'], $tag));
    $template->set_var('inscount', sprintf($LANG_TKGMAPS_ADMIN['mg2point_exec_count'], $ins));
    $template->set_var('instedcount', sprintf($LANG_TKGMAPS_ADMIN['mg2point_exec_count'], $insted));
    
    $template->parse('output', 'exec');
    $desc = $template->finish($template->get_var('output'));

    $retval .= COM_startBlock($LANG_TKGMAPS_ADMIN['mg2point_title'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    
    $menu_arr = array(
        array('url' => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
              'text' => $LANG_TKGMAPS['admin']),
    );
    $retval .= ADMIN_createMenu($menu_arr, $desc, plugin_geticon_tkgmaps());
    
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    
    return $retval;
}

function form_file2point ()
{
    global $_CONF, $_TKGMAPS_CONF, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
    
    require_once $_CONF['path_system'] . 'lib-admin.php';
    $retval = '';
    
    $retval .= COM_startBlock($LANG_TKGMAPS_ADMIN['file2point_title'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    
    $template = new Template ($_CONF['path'] . 'plugins/tkgmaps/templates/admin/');
    $template->set_file('form', 'file2point.thtml');
    $template->set_var('xhtml', XHTML);
    $template->set_var('site_url', $_CONF['site_url']);
    $template->set_var('site_admin_url', $_CONF['site_admin_url']);
    $template->set_var('layout_url',$_CONF['layout_url']);
    
    $template->set_var('lang_message', $LANG_TKGMAPS_ADMIN['file2point_message']);
    $template->set_var('lang_file', $LANG_TKGMAPS_ADMIN['file2point_file']);
    $template->set_var('lang_filestyle', $LANG_TKGMAPS_ADMIN['file2point_filestyle']);
    $template->set_var('lang_target', $LANG_TKGMAPS_ADMIN['file2point_target']);
    
    $template->set_var('lang_submit', $LANG_TKGMAPS_ADMIN['file2point_submit']);
    
    $template->set_var('filestyle', f2p_filestyle());
    $template->set_var('target', f2p_target());
    
    $template->set_var('gltoken_name', CSRF_TOKEN);
    $template->set_var('gltoken', SEC_createToken());
    $template->parse('output', 'form');
    $desc = $template->finish($template->get_var('output'));
    
    $menu_arr = array(
        array('url' => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
              'text' => $LANG_TKGMAPS['admin']),
    );
    $retval .= ADMIN_createMenu($menu_arr, $desc, plugin_geticon_tkgmaps());
    
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    
    return $retval;
}

function f2p_filestyle()
{
    return tkgmaps_makehtml_options('filestyle', f2p_getFileStyleName() );
}

function f2p_target()
{
    return tkgmaps_makehtml_options('target', array('stories', 'staticpage') );
}

function f2p_getFileStyleName()
{
    global $_CONF;
    
    $retval = '';
    $path = $_CONF['path'] . 'plugins/tkgmaps/classes/';
    $files = array();
    if ($dir = @opendir($path)) {
        while(($file = readdir($dir)) !== false) {
            if (is_file($path . $file)) {
                $classname = current(explode('.',$file));
                if (strtolower($classname) != 'basecsv') { array_push($files, $classname); }
            }
        }
        closedir($dir);
        $retval = $files;
    }
    return $retval;
}

function exec_file2point ($file, $style, $target, $targetid)
{
    global $_CONF, $_TABLES, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
    
    $retval = '';
    $errmsg = '';
    $errmsg .= (!empty($file)) ? '' : $LANG_TKGMAPS_ADMIN['file2point_error_file'];
    $errmsg .= (!empty($style)) ? '' : $LANG_TKGMAPS_ADMIN['file2point_error_filestyle'];
    $errmsg .= (!empty($target)) ? '' : $LANG_TKGMAPS_ADMIN['file2point_error_target'];
    $errmsg .= (!empty($targetid)) ? '' : $LANG_TKGMAPS_ADMIN['file2point_error_targetid'];
    if (!empty($errmsg)) {
            return COM_showMessageText($errmsg);
    } else {
        $dbcount = 0;
        switch ($target) {
            case 'stories':
                $dbcount = DB_count($_TABLES['stories'], 'sid', $targetid);
                break;
            case 'staticpage':
                $dbcount = DB_count($_TABLES['staticpage'], 'sp_id', $targetid);
                break;
        }
        if ($dbcount < 1) { return COM_showMessageText($LANG_TKGMAPS_ADMIN['file2point_target_not_found']); }
        
        if (isset($file['tmp_name']) && !empty($file['tmp_name'])) {
            $file_tmp_name = $file['tmp_name'];
            $filename = $file['name'];
            $file_extension = strtolower(substr(strrchr($filename,"."),1));
            $savefilename = $_CONF['path_data'] . 'tkgmaps_f2m_' . substr($filename,0,3) . '.' . $file_extension;
            if (is_uploaded_file($file_tmp_name)) {
                $rc = move_uploaded_file($file_tmp_name, $savefilename);
                if ( $rc != 1 ) {
                    COM_errorLog("tkgmaps Upload - Error moving uploaded file....rc = " . $rc);
                    $errmsg .= sprintf($LANG_TKGMAPS_ADMIN['file2point_move_error'],$filename);
                }
            } else {
                COM_errorLOG('tkgmaps upload error: Temporary file does not exist: "' . $file_tmp_name .'"' );
                return COM_showMessageText($LANG_TKGMAPS_ADMIN['file2point_upload_error']);;
            }
        } else {
            $errmsg .= $LANG_TKGMAPS_ADMIN['file2point_upload_not_found'];
        }
    }
    if (!empty($errmsg)) {
            return COM_showMessageText($errmsg);
    }
    
    list($line, $fileerr, $total, $ins) = tkgmaps_file2map ($savefilename, $style, $target, $targetid);
    
    require_once $_CONF['path_system'] . 'lib-admin.php';
    $template = new Template ($_CONF['path'] . 'plugins/tkgmaps/templates/admin/');
    $template->set_file('exec', 'file2pointexec.thtml');
    $template->set_var('xhtml', XHTML);
    $template->set_var('site_url', $_CONF['site_url']);
    $template->set_var('site_admin_url', $_CONF['site_admin_url']);
    $template->set_var('layout_url',$_CONF['layout_url']);
    
    $template->set_var('lang_message', sprintf($LANG_TKGMAPS_ADMIN['file2point_exec_message'], $file['name']));
    $template->set_var('lang_line', $LANG_TKGMAPS_ADMIN['file2point_exec_line']);
    $template->set_var('lang_fileerr', $LANG_TKGMAPS_ADMIN['file2point_exec_fileerr']);
    $template->set_var('lang_total', $LANG_TKGMAPS_ADMIN['file2point_exec_total']);
    $template->set_var('lang_insted', $LANG_TKGMAPS_ADMIN['file2point_exec_insted']);
    
    
    $template->set_var('linecount', sprintf($LANG_TKGMAPS_ADMIN['file2point_exec_count'], $line));
    $template->set_var('fileerrcount', sprintf($LANG_TKGMAPS_ADMIN['file2point_exec_count'], $fileerr));
    $template->set_var('totalcount', sprintf($LANG_TKGMAPS_ADMIN['file2point_exec_count'], $total));
    $template->set_var('instedcount', sprintf($LANG_TKGMAPS_ADMIN['file2point_exec_count'], $ins));
    
    $template->parse('output', 'exec');
    $desc = $template->finish($template->get_var('output'));

    $retval .= COM_startBlock($LANG_TKGMAPS_ADMIN['file2point_title'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    
    $menu_arr = array(
        array('url' => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
              'text' => $LANG_TKGMAPS['admin']),
    );
    $retval .= ADMIN_createMenu($menu_arr, $desc, plugin_geticon_tkgmaps());
    
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    
    return $retval;
}

// file export
function form_point2file ()
{
    global $_CONF, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
    
    require_once $_CONF['path_system'] . 'lib-admin.php';
    $retval = '';
    
    $retval .= COM_startBlock($LANG_TKGMAPS_ADMIN['point2file_title'], '',
                              COM_getBlockTemplate('_admin_block', 'header'));
    
    $template = new Template ($_CONF['path'] . 'plugins/tkgmaps/templates/admin/');
    $template->set_file('form', 'point2file.thtml');
    $template->set_var('xhtml', XHTML);
    $template->set_var('site_url', $_CONF['site_url']);
    $template->set_var('site_admin_url', $_CONF['site_admin_url']);
    $template->set_var('layout_url',$_CONF['layout_url']);
    
    $template->set_var('lang_message', $LANG_TKGMAPS_ADMIN['point2file_message']);
    $template->set_var('lang_target', $LANG_TKGMAPS_ADMIN['point2file_target']);
    $template->set_var('lang_filestyle', $LANG_TKGMAPS_ADMIN['point2file_filestyle']);
    $template->set_var('lang_filename', $LANG_TKGMAPS_ADMIN['point2file_filename']);
    
    $template->set_var('lang_submit', $LANG_TKGMAPS_ADMIN['point2file_submit']);
    
    $template->set_var('filestyle', p2f_filestyle());
    $template->set_var('target', p2f_target());
    
    $template->set_var('filename', '__ID__-'.date('Ymd_H').'.csv');
    
    $template->set_var('gltoken_name', CSRF_TOKEN);
    $template->set_var('gltoken', SEC_createToken());
    $template->parse('output', 'form');
    $desc = $template->finish($template->get_var('output'));
    
    $menu_arr = array(
        array('url' => $_CONF['site_admin_url'] . '/plugins/tkgmaps/index.php',
              'text' => $LANG_TKGMAPS['admin']),
    );
    $retval .= ADMIN_createMenu($menu_arr, $desc, plugin_geticon_tkgmaps());
    
    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));
    
    return $retval;
}

function p2f_filestyle()
{
    return tkgmaps_makehtml_options('filestyle', f2p_getFileStyleName() );
}

function p2f_target()
{
    return tkgmaps_makehtml_options('target', array('stories', 'staticpage') );
}

function exec_point2file($target, $targetid, $style, $filename)
{
    global $_CONF, $_TABLES, $LANG_TKGMAPS, $LANG_TKGMAPS_ADMIN;
        
    $errmsg = '';
    $errmsg .= (!empty($target)) ? '' : $LANG_TKGMAPS_ADMIN['point2file_error_target'];
    $errmsg .= (!empty($targetid)) ? '' : $LANG_TKGMAPS_ADMIN['point2file_error_targetid'];
    $errmsg .= (!empty($style)) ? '' : $LANG_TKGMAPS_ADMIN['point2file_error_filestyle'];
    $errmsg .= (!empty($filename)) ? '' : $LANG_TKGMAPS_ADMIN['point2file_error_filename'];
    if (!empty($errmsg)) {
            return COM_showMessageText($errmsg);
    } else {
        $dbcount = 0;
        switch ($target) {
            case 'stories':
                $dbcount = DB_count($_TABLES['stories'], 'sid', $targetid);
                break;
            case 'staticpage':
                $dbcount = DB_count($_TABLES['staticpage'], 'sp_id', $targetid);
                break;
        }
        if ($dbcount < 1) { return COM_showMessageText($LANG_TKGMAPS_ADMIN['point2file_target_not_found']); }
    }
    if (!empty($errmsg)) {
            return COM_showMessageText($errmsg);
    }

    $filename = str_replace('__ID__', $targetid, strftime($filename));
    
    $download_data = tkgmaps_map2file ($target, $targetid, $style, $filename);
    
    if (!empty($download_data)) {
        //COM_errorLog("[DEBUG] exec_poiint2file :: ".print_r($download_data, true));
        header('Content-Type: ' . $mime_type);
        header('Expires: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        
        $agent = $_SERVER["HTTP_USER_AGENT"];
        if(preg_match('/MSIE/', $agent)) {
            // IE
            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
            header('Pragma: public');
        } else {
            // Other
            header('Pragma: no-cache');
            header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
        }
        
        echo $download_data;
        exit();
    } else {
        return COM_showMessageText($LANG_TKGMAPS_ADMIN['point2file_point_not_found']);
    }
}

// MAIN
$mode = '';
if (isset($_REQUEST['mode'])) {
    $mode = COM_applyFilter ($_REQUEST['mode']);
}

$display .= COM_siteHeader ('menu', $LANG_TKGMAPS['admin']);
if ($mode == 'mg2point') {
    $display .= form_mg2point();
} elseif ($mode == $LANG_TKGMAPS_ADMIN['mg2point_submit'] && !empty($LANG_TKGMAPS_ADMIN['mg2point_submit']) && SEC_checkToken()) {
    $display .= mg2pointexec(COM_applyFilter($_POST['date']));
} elseif ($mode == 'file2point') {
    $display .= form_file2point();
} elseif ($mode == $LANG_TKGMAPS_ADMIN['file2point_submit'] && !empty($LANG_TKGMAPS_ADMIN['file2point_submit']) && SEC_checkToken()) {
    $display .= exec_file2point($_FILES['file'],
                                COM_applyFilter($_POST['filestyle']),
                                COM_applyFilter($_POST['target']),
                                COM_applyFilter($_POST['targetid']));
} elseif ($mode == 'point2file') {
    $display .= form_point2file();
} elseif ($mode == $LANG_TKGMAPS_ADMIN['point2file_submit'] && !empty($LANG_TKGMAPS_ADMIN['point2file_submit']) && SEC_checkToken()) {
    $display .= exec_point2file(COM_applyFilter($_POST['target']),
                                COM_applyFilter($_POST['targetid']),
                                COM_applyFilter($_POST['filestyle']),
                                COM_applyFilter($_POST['filename']));
} else {
    $display .= listtkgmaps();
}

$display .= COM_siteFooter ();

COM_output($display);

?>