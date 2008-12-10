<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | CustomMenu Editor Plugin for Geeklog                                      |
// +---------------------------------------------------------------------------+
// | public_html/admin/plugins/custommenu/index.php                            |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2008 dengen - taharaxp AT gmail DOT com                     |
// |                                                                           |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett               -    twillett AT users DOT sourceforge DOT net  |
// | Blaine Lang               -    langmail AT sympatico DOT ca               |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                -    tony AT tonybibbs DOT com                  |
// | Modified by:                                                              |
// | mystral-kk                -    geeklog AT mystral-kk DOT net              |
// | dengen                    -    taharaxp AT gmail DOT com                  |
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
require_once '../../auth.inc.php';

if (!defined ('UC_SELECTED')) define('UC_SELECTED', (XHTML == '') ? 'selected' : 'selected="selected"');
if (!defined ('UC_CHECKED'))  define('UC_CHECKED',  (XHTML == '') ? 'checked'  : 'checked="checked"'  );
if (!defined ('UC_READONLY')) define('UC_READONLY', (XHTML == '') ? 'readonly' : 'readonly="readonly"');
if (!defined ('UC_DISABLED')) define('UC_DISABLED', (XHTML == '') ? 'disabled' : 'disabled="disabled"');

// Only let admin users access this page
if (!SEC_hasRights('custommenu.admin')) {
    // Someone is trying to illegally access this page
    COM_errorLog("CustomMenu admin: Someone has tried to illegally access the CustomMenu admin page. "
               . "User id: {$_USER['uid']}, Username: {$_USER['username']}, IP: $REMOTE_ADDR", 1);
    $display  = COM_siteHeader();
    $display .= COM_startBlock($LANG_CMED['access_denied']);
    $display .= $LANG_CMED['access_denied_msg'];
    $display .= COM_endBlock();
    $display .= COM_siteFooter(true);
    echo $display;
    exit;
}

/**
* Sanitize a URL
*
* @param    string  $url                URL to sanitized
* @param    array   $allowed_protocols  array of allowed protocols
* @param    string  $default_protocol   replacement protocol (default: http)
* @return   string                      sanitized URL
*
*/
function CMED_sanitizeUrl($url, $allowed_protocols = '', $default_protocol = '')
{
    global $_CONF;

    if (empty($allowed_protocols)) {
        $allowed_protocols = $_CONF['allowed_protocols'];
    } else if (!is_array($allowed_protocols)) {
        $allowed_protocols = array($allowed_protocols);
    }

    if (empty($default_protocol)) {
        $default_protocol = 'http:';
    } else if (substr($default_protocol, -1) != ':') {
        $default_protocol .= ':';
    }

    $url = strip_tags($url);
    if (!empty($url)) {
        $pos = MBYTE_strpos($url, ':');
        if ($pos === false) {
            $url = $default_protocol . '//' . $url;
        } else {
            $protocol = MBYTE_substr($url, 0, $pos + 1);
            $found_it = false;
            foreach ($allowed_protocols as $allowed) {
                if (substr($allowed, -1 ) != ':') {
                    $allowed .= ':';
                }
                if ($protocol == $allowed) {
                    $found_it = true;
                    break;
                }
            }
            if (!$found_it) {
                $url = $default_protocol . MBYTE_substr( $url, $pos + 1 );
            }
        }
    }

    return $url;
}


$MI = array(); // Array of values of one menuitem

/**
* Set values of one menuitem in global array $MI
*/
function CMED_setMI()
{
    global $_CONF, $MI;

    $url      = $_POST['url'];
    $icon_url = $_POST['icon_url'];
    $MI = array(
        'mid'          => COM_applyFilter($_POST['mid']),
        'is_enabled'   => ($_POST['is_enabled'] == 'on') ? 1 : 0,
        'type'         => $_POST['type'],
        'mode'         => $_POST['mmode'],
        'label'        => $_POST['title_fixation'],
        'label_var'    => $_POST['title_variable'],
        'php_function' => $_POST['php_function'],
//        'url'          => isset ($url)      ? CMED_sanitizeUrl($url,      array('http', 'https')) : '',
//        'icon_url'     => isset ($icon_url) ? CMED_sanitizeUrl($icon_url, array('http', 'https')) : '',
        'url'          => isset ($url)      ? strip_tags($url)      : '',
        'icon_url'     => isset ($icon_url) ? strip_tags($icon_url) : '',
        'tid'          => COM_applyFilter ($_POST['tid']),
        'menuorder'    => $_POST['menuorder'],
        'owner_id'     => COM_applyFilter($_POST['owner_id'], true),
        'group_id'     => COM_applyFilter($_POST['group_id'], true),
        'perm_owner'   => $_POST['perm_owner'],
        'perm_group'   => $_POST['perm_group'],
        'perm_members' => $_POST['perm_members'],
        'perm_anon'    => $_POST['perm_anon'],
        'old_mid'      => COM_applyFilter($_POST['old_mid']),
    );

    // Convert array values to numeric permission values
    list($MI['perm_owner'], $MI['perm_group'], $MI['perm_members'], $MI['perm_anon'])
        = SEC_getPermissionValues($MI['perm_owner'], $MI['perm_group'], $MI['perm_members'], $MI['perm_anon']);
}

/**
* Validate global array $MI
*/
function CMED_validateMI($mode)
{
    global $_TABLES, $LANG_CMED_EDITOR, $LANG_CMED, $MI;

    $retval = '';

    if (empty($MI['label']) && ($MI['mode'] == 'fixation')) {
        $retval .= $LANG_CMED_EDITOR['validate_message_1'] . '<br' . XHTML . '>';
    }

    if (empty($MI['label_var']) && ($MI['mode'] == 'variable')) {
        $retval .= $LANG_CMED_EDITOR['validate_message_2'] . '<br' . XHTML . '>';
    }

    if (empty($MI['php_function']) && ($MI['mode'] == 'php')) {
        $retval .= $LANG_CMED_EDITOR['validate_message_3'] . '<br' . XHTML . '>';
    }

    if (empty($MI['mid'])) {
        $retval .= $LANG_CMED_EDITOR['validate_message_4'] . '<br' . XHTML . '>';
    } else {
        $n = DB_count($_TABLES['menuitems'], "mid", $MI['mid']);
        if (($n > 0) && ($mode != 'update')) {
            $retval .= $LANG_CMED_EDITOR['validate_message_5'] . '<br' . XHTML . '>';
        }
    }

    return $retval;
}


/**
* Check for menuitem topic access (need to handle 'all' and 'homeonly' as special cases)
*
* @param    string  $tid    ID for topic to check on
* @return   int             returns 3 for read/edit 2 for read only 0 for no access
*
*/
function CMED_hasMenuitemTopicAccess($tid)
{
    if (($tid == 'all') || ($tid == 'homeonly')) {
        $access = 3;
    } else {
        $access = SEC_hasTopicAccess($tid);
    }

    return $access;
}


/**
* Create menuitem id
*/
function CMED_createMenuitemID($str = 'menuitem_')
{
    global $_TABLES;
    
    $i = 0;
    $n = 1;
    while ($n != 0) {
        $n = DB_count($_TABLES['menuitems'], "mid", $str . (++$i));
    }
    $id = $str . $i;

    return $id;
}


/**
* Shows the Menuitem editor
*
* This will show a Menuitem edit form.
*
* @param    string  $mid    ID of menuitem to edit
* @return   string          HTML for menuitem editor
*
*/

/*
  mid          varchar(40)           NOT NULL default '',
  is_enabled   tinyint(1)   unsigned NOT NULL default '1',
  type         varchar(20)           NOT NULL default 'custom',
  mode         varchar(20)           NOT NULL default 'fixation',
  label        varchar(48)                    default NULL,
  label_var    varchar(48)                    default NULL,
  php_function varchar(48)                    default NULL,
  url          varchar(255)                   default NULL,
  icon_url     varchar(255)                   default NULL,
  tid          varchar(20)           NOT NULL default 'all',
  menuorder    smallint(5)  unsigned NOT NULL default '1',
  owner_id     mediumint(8) unsigned NOT NULL default '1',
  group_id     mediumint(8) unsigned NOT NULL default '1',
  perm_owner   tinyint(1)   unsigned NOT NULL default '3',
  perm_group   tinyint(1)   unsigned NOT NULL default '2',
  perm_members tinyint(1)   unsigned NOT NULL default '2',
  perm_anon    tinyint(1)   unsigned NOT NULL default '2',
*/

function CMED_editMenuitem($mid, $mode='edit', $A=array())
{
    global $_CONF, $_GROUPS, $_TABLES, $_USER, $_PLUGINS, $_CMED_CONF,
           $LANG_CMED_EDITOR, $LANG_ACCESS, $LANG_ADMIN, $MESSAGE;

    $retval = '';

    if (($mode == 'edit') || ($mode == 'clone')) {
        if (empty($A)) {
            $result = DB_query("SELECT * FROM {$_TABLES['menuitems']} WHERE mid ='$mid'");
            $A = DB_fetchArray($result);
        }

        $access = SEC_hasAccess($A['owner_id'],     $A['group_id'],
                                $A['perm_owner'],   $A['perm_group'],
                                $A['perm_members'], $A['perm_anon']);
        if (($access < 3) || (CMED_hasMenuitemTopicAccess($A['tid']) < 3)) {
            $retval .= COM_startBlock($LANG_ACCESS['accessdenied'], '', COM_getBlockTemplate('_msg_block', 'header'))
                     . $LANG_CMED_EDITOR['message_access1']
                     . COM_endBlock(COM_getBlockTemplate('_msg_block', 'footer'));
            COM_accessLog("User {$_USER['username']} tried to illegally create or edit menuitem $mid.");

            return $retval;
        }
    }
    
    if ($mode == 'clone') {

        preg_match('/(.*)_clone_(.+)/', $A['mid'], $match);
        $label = empty($match[1]) ? $A['mid'] : $match[1];
        $A['mid'] = CMED_createMenuitemID($label . '_clone_');
        $A['type'] = 'custom';
        $access = 3;
    }
    
    if ($mode == 'create') {

        $A['mid']          = CMED_createMenuitemID();
        $A['is_enabled']   = 1;
        $A['type']         = 'custom';
        $A['mode']         = 'fixation';
        $A['label']        = '';
        $A['label_var']    = '';
        $A['php_function'] = '';
        $A['tid']          = 'all';
        $A['url']          = '';
        $A['icon_url']     = '';
        $A['menuorder']    = 0;
        $A['owner_id']     = $_USER['uid'];
        if (isset($_GROUPS['CustomMenu Admin'])) {
            $A['group_id'] = $_GROUPS['CustomMenu Admin'];
        } else {
            $A['group_id'] = SEC_getFeatureGroup('custommenu.admin');
        }
        SEC_setDefaultPermissions($A, $_CMED_CONF['default_permissions']);
        $access = 3;
    }

    // テンプレートの生成
    if (is_dir($_CONF['path_layout'] . 'custommenu')) {
        $T = new Template($_CONF['path_layout'] . 'custommenu');
    } else {
        $T = new Template($_CONF['path'] . 'plugins/custommenu/templates');
    }
    $T->set_file('editor','menueditor.thtml');

    $T->set_var('xhtml', XHTML);
    $T->set_var('site_url',       $_CONF['site_url']);
    $T->set_var('site_admin_url', $_CONF['site_admin_url']);
    $T->set_var('icon_url', plugin_geticon_custommenu());
    $T->set_var('layout_url',     $_CONF['layout_url']);

    $retval .= COM_startBlock($LANG_CMED_EDITOR['custommenueditor'], '',
                              COM_getBlockTemplate ('_admin_block', 'header'));

    $v = (($mode == 'create') || ($mode == 'clone') || 
          ($A['type'] == 'gldefault') || (($A['type'] == 'plugin') && in_array($A['mid'], $_PLUGINS))) ? UC_DISABLED : '';
    $T->set_var('delete_disabled', $v);

    foreach ($LANG_CMED_EDITOR as $key => $val) {
        $T->set_var('lang_'.$key, $val);
    }

    $v = (($mode == 'create') or ($mode == 'clone')) ? 'save' : 'update';
    $T->set_var('lang_save', $LANG_CMED_EDITOR[$v]);

    $T->set_var('val_title_fixation', stripslashes($A['label']));
    $T->set_var('val_title_variable', stripslashes($A['label_var']));
    $T->set_var('val_php_function',   stripslashes($A['php_function']));
    $T->set_var('val_is_enabled', ($A['is_enabled'] == 1) ? UC_CHECKED : '');
    $T->set_var('val_menuitemurl', $A['url']);
    $T->set_var('val_icon_url',    $A['icon_url']);
    $T->set_var('val_mid',         $A['mid']);
    $T->set_var('val_old_mid',     $A['mid']);
    $T->set_var('val_menuorder',   $A['menuorder']);
    $T->set_var('val_type',        $A['type']);

    $v = (($A['type'] == 'gldefault') || ($A['type'] == 'plugin')) ? UC_READONLY : '';
    $T->set_var('mid_readonly', $v);

    $T->set_var($A['tid'].'_selected', UC_SELECTED);
    $T->set_var('topic_options', COM_topicList('tid,topic', $A['tid'], 1, true));

    $T->set_var('lang_type', $LANG_CMED_EDITOR[ 'type_' . $A['type'] ]);

    $T->set_var($A['type'].'_selected', UC_SELECTED);

    $T->set_var('val_mode_'.$A['mode'], UC_SELECTED);

    // user access info
    $T->set_var('lang_accessrights', $LANG_ACCESS['accessrights']);
    $T->set_var('lang_owner', $LANG_ACCESS['owner']);
    $ownername = COM_getDisplayName($A['owner_id']);
    $T->set_var('owner_username', DB_getItem($_TABLES['users'], 'username', "uid = {$A['owner_id']}"));
    $T->set_var('owner_name', $ownername);
    $T->set_var('owner', $ownername);
    $T->set_var('owner_id', $A['owner_id']);
    $T->set_var('lang_group', $LANG_ACCESS['group']);
    $T->set_var('group_dropdown', SEC_getGroupDropdown($A['group_id'], $access));
    $T->set_var('lang_permissions', $LANG_ACCESS['permissions']);
    $T->set_var('lang_permissionskey', $LANG_ACCESS['permissionskey']);
    $T->set_var('permissions_editor', 
        SEC_getPermissionsHTML($A['perm_owner'], $A['perm_group'], $A['perm_members'], $A['perm_anon']));
    $T->set_var('lang_lockmsg', $LANG_ACCESS['permmsg']);
    if (!defined(CSRF_TOKEN)) define('CSRF_TOKEN', 'token');
    $T->set_var('gltoken_name', CSRF_TOKEN);
    $T->set_var('gltoken', SEC_createToken());

    $T->parse('output', 'editor');
    $retval .= $T->finish($T->get_var('output'));

    $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));

    return $retval;
}


/**
* Display the list of the menuitems
*
* @return   string                  HTML error message
*
*/
function CMED_listMenuitems()
{
    global $_CONF, $_TABLES, $LANG_ADMIN, $LANG_CMED_EDITOR, $LANG_CMED, $_IMAGE_TYPE;

    require_once $_CONF['path_system'] . 'lib-admin.php';

    $retval = '';
    
    CMED_reorderMenuitems();

    $header_arr   = array(
                    array('text' => $LANG_ADMIN['edit'],       'field' => 'edit',      'sort' => false),
                    array('text' => $LANG_ADMIN['copy'],       'field' => 'copy',      'sort' => false),
    );
//    if (DB_count($_TABLES['menuitems'], "type", 'custom') > 0) {
        $header_arr = array_merge($header_arr, array(
                    array('text' => $LANG_ADMIN['delete'],     'field' => 'delete',    'sort' => false)
        ) );
//    }
    $header_arr = array_merge($header_arr, array(
                    array('text' => $LANG_CMED['order'],       'field' => 'menuorder', 'sort' => true),
                    array('text' => $LANG_ADMIN['title'],      'field' => 'label',     'sort' => true),
                    array('text' => $LANG_CMED_EDITOR['mode'], 'field' => 'mode',      'sort' => true),
                    array('text' => $LANG_ADMIN['type'],       'field' => 'type',      'sort' => true),
                    array('text' => $LANG_ADMIN['topic'],      'field' => 'tid',       'sort' => true),
    ) );

    $defsort_arr = array('field' => 'menuorder', 'direction' => 'asc');

    $menu_arr = array(
                    array('url'  => $_CONF['site_admin_url'] . '/plugins/custommenu/index.php?mode=create',
                          'text' => $LANG_ADMIN['create_new']),
                    array('url'  => $_CONF['site_admin_url'],
                          'text' => $LANG_ADMIN['admin_home'])
    );


    if (version_compare(VERSION, '1.4.1') <= 0) {

        $text_arr = array('has_menu'   => true,
                          'has_extras' => true,
                          'title'      => $LANG_CMED['manager'], 'instructions' => $LANG_CMED_EDITOR['instructions'],
                          'icon'       => $_CONF['site_url'] . '/custommenu/images/custommenu.gif',
                          'form_url'   => $_CONF['site_admin_url'] . "/plugins/custommenu/index.php");

        $query_arr = array('table'          => 'menuitems',
                           'sql'            => "SELECT * FROM {$_TABLES['menuitems']} WHERE menuorder > 0",
                           'query_fields'   => array('label'),
                           'default_filter' => COM_getPermSql('AND'));

        $retval .= ADMIN_list("menuitems", "CMED_getListField_Menuitems", $header_arr, $text_arr,
                               $query_arr, $menu_arr, $defsort_arr);

    } else {

        $retval .= COM_startBlock($LANG_CMED['manager'], '', COM_getBlockTemplate('_admin_block', 'header'));

        $retval .= ADMIN_createMenu($menu_arr, $LANG_CMED['instructions'], plugin_geticon_custommenu());

        $text_arr = array('has_extras' => true,
                          'form_url'   => $_CONF['site_admin_url'] . "/plugins/custommenu/index.php");

        $query_arr = array('table'          => 'menuitems',
                           'sql'            => "SELECT * FROM {$_TABLES['menuitems']} WHERE menuorder > 0",
                           'query_fields'   => array('label'),
                           'default_filter' => COM_getPermSql('AND'));

        $retval .= ADMIN_list("menuitems", "CMED_getListField_Menuitems", $header_arr, $text_arr,
                               $query_arr, $defsort_arr);

        $retval .= COM_endBlock(COM_getBlockTemplate('_admin_block', 'footer'));

    }

    return $retval;
}


/**
* Saves a menuitem
*
* @return   string                  HTML error message
*
*/
function CMED_saveMenuitems($mode)
{
    global $_TABLES, $LANG_CMED_EDITOR, $MI;

    $retval = '';

    if (( ! empty($MI['mid'])) && (DB_count($_TABLES['menuitems'], 'mid', $MI['mid']) > 0)) {
        $result = DB_query("SELECT owner_id,group_id,perm_owner,perm_group,perm_members,perm_anon "
                         . "FROM {$_TABLES['menuitems']} WHERE mid = '{$MI['mid']}'");
        $A = DB_fetchArray($result);
        $access = SEC_hasAccess($A['owner_id'],     $A['group_id'],
                                $A['perm_owner'],   $A['perm_group'], 
                                $A['perm_members'], $A['perm_anon']);
    } else {
        $access = SEC_hasAccess($MI['owner_id'],     $MI['group_id'],
                                $MI['perm_owner'],   $MI['perm_group'],
                                $MI['perm_members'], $MI['perm_anon']);
    }

    if (($access < 3) || (!CMED_hasMenuitemTopicAccess($MI['tid']))) {

        $retval .= COM_startBlock($LANG_CMED_EDITOR['access_denied'], '', COM_getBlockTemplate('_msg_block', 'header'))
                 . $LANG_CMED_EDITOR['message_access2']
                 . COM_endBlock(COM_getBlockTemplate('_msg_block', 'footer'));
        COM_accessLog("User {$_USER['username']} tried to illegally submit or edit menuitem {$MI['mid']}.");

        return $retval;

    } else {

        $MI['mid']          = addslashes(COM_stripslashes(strip_tags($MI['mid'])));
        $MI['label']        = addslashes(COM_stripslashes(strip_tags($MI['label'])));
        $MI['label_var']    = addslashes(COM_stripslashes(strip_tags($MI['label_var'])));
        $MI['php_function'] = addslashes(COM_stripslashes(strip_tags($MI['php_function'])));
        $MI['url']          = addslashes($MI['url']);
        $MI['icon_url']     = addslashes($MI['icon_url']);

        if ($mode == 'update') {
            if ($MI['old_mid'] != $MI['mid']) {
                DB_delete($_TABLES['menuitems'], 'mid', $MI['old_mid']);
                $sql = "INSERT INTO {$_TABLES['menuitems']} "
                 .  '(mid, is_enabled, type, mode, label, label_var, php_function, url, '
                 .  'icon_url, tid, menuorder, '
                 .  'owner_id, group_id, perm_owner, perm_group, perm_members, perm_anon) '
                 .  "VALUES ('" . $MI['mid']          . "',"  . $MI['is_enabled'] . ",'"  . $MI['type']       . "','" 
                                . $MI['mode']         . "','" . $MI['label']      . "','" . $MI['label_var']  . "','" 
                                . $MI['php_function'] . "','" . $MI['url']        . "','" . $MI['icon_url']   . "','" 
                                . $MI['tid']          . "',"  . $MI['menuorder']  . ","   . $MI['owner_id']   . "," 
                                . $MI['group_id']     . ","   . $MI['perm_owner'] . ","   . $MI['perm_group'] . "," 
                                . $MI['perm_members'] . ","   . $MI['perm_anon']  . ")";
                DB_query($sql);

            } else {
                DB_save($_TABLES['menuitems'],
                    'mid, is_enabled, type, mode, label, label_var, php_function, url, '
                  . 'icon_url, tid, menuorder, '
                  . 'owner_id, group_id, perm_owner, perm_group, perm_members, perm_anon',
                    "'" . $MI['mid']          . "',"  . $MI['is_enabled'] . ",'"  . $MI['type']       . "','" 
                        . $MI['mode']         . "','" . $MI['label']      . "','" . $MI['label_var']  . "','" 
                        . $MI['php_function'] . "','" . $MI['url']        . "','" . $MI['icon_url']   . "','" 
                        . $MI['tid']          . "',"  . $MI['menuorder']  . ","   . $MI['owner_id']   . "," 
                        . $MI['group_id']     . ","   . $MI['perm_owner'] . ","   . $MI['perm_group'] . "," 
                        . $MI['perm_members'] . ","   . $MI['perm_anon'] );
            }

        } else {
            $sql = "INSERT INTO {$_TABLES['menuitems']} "
             .  '(mid, is_enabled, type, mode, label, label_var, php_function, url, '
             .  'icon_url, tid, menuorder, '
             .  'owner_id, group_id, perm_owner, perm_group, perm_members, perm_anon) '
             .  "VALUES ('" . $MI['mid']          . "',"  . $MI['is_enabled'] . ",'"  . $MI['type']       . "','" 
                            . $MI['mode']         . "','" . $MI['label']      . "','" . $MI['label_var']  . "','" 
                            . $MI['php_function'] . "','" . $MI['url']        . "','" . $MI['icon_url']   . "','" 
                            . $MI['tid']          . "',"  . $MI['menuorder']  . ","   . $MI['owner_id']   . "," 
                            . $MI['group_id']     . ","   . $MI['perm_owner'] . ","   . $MI['perm_group'] . "," 
                            . $MI['perm_members'] . ","   . $MI['perm_anon']  . ")";
            DB_query($sql);
        }
    }

    return $retval;
}


/**
* Re-orders all menuitems in steps of 10
*/
function CMED_reorderMenuitems()
{
    global $_TABLES;

    $result = DB_query("SELECT * FROM {$_TABLES['menuitems']} ORDER BY menuorder asc");
    while ($A = DB_fetchArray($result)) {
        $order += 10;
        if ($A['menuorder'] != $order) {
            DB_query("UPDATE {$_TABLES['menuitems']} SET menuorder = '$order' WHERE mid = '{$A['mid']}'");
        }
    }
}


/**
* Move menuitem UP and Down
*/
function CMED_moveMenuitem()
{
    global $_TABLES;

    $mid   = COM_applyFilter($_GET['mid']);
    $where = COM_applyFilter($_GET['where']);
    $num = ($where == 'up') ? -11 : 11;
    DB_query("UPDATE {$_TABLES['menuitems']} SET menuorder = menuorder + $num WHERE mid = '$mid'");
}


/**
* Enable and Disable menuitem
*/
function CMED_changeMenuitemStatus($mid)
{
    global $_CONF, $_TABLES;
    
    $is_enabled = ! DB_getItem($_TABLES['menuitems'], "is_enabled", "mid='$mid'");
    DB_query("UPDATE {$_TABLES['menuitems']} SET is_enabled = '$is_enabled' WHERE mid = '$mid'");
}


/**
* Delete a menuitem
*
* @param    string  $mid    id of menuitem to delete
* @return   string          HTML error message
*
*/
function CMED_deleteMenuitem($mid)
{
    global $_TABLES, $_USER;

    $retval = '';

    $result = DB_query("SELECT tid,owner_id,group_id,perm_owner,perm_group,perm_members,perm_anon "
                     . "FROM {$_TABLES['menuitems']} WHERE mid ='$mid'");
    $A = DB_fetchArray($result);
    $access = SEC_hasAccess($A['owner_id'],     $A['group_id'],
                            $A['perm_owner'],   $A['perm_group'],
                            $A['perm_members'], $A['perm_anon']);
    if (($access < 3) || (CMED_hasMenuitemTopicAccess ($A['tid']) < 3)) {

        $retval .= COM_startBlock($LANG_CMED_EDITOR['access_denied'], '', COM_getBlockTemplate ('_msg_block', 'header'))
                 . $LANG_CMED_EDITOR['message_access3']
                 . COM_endBlock(COM_getBlockTemplate('_msg_block', 'footer'));
        COM_accessLog("User {$_USER['username']} tried to illegally delete menuitem $mid.");

        return $retval;
    }

    DB_delete($_TABLES['menuitems'], 'mid', $mid);

    return $retval;
}


/**
* Get ListFields of Menuitems
*/
function CMED_getListField_Menuitems($fieldname, $fieldvalue, $A, $icon_arr)
{
    global $_CONF, $LANG_ADMIN, $_PLUGINS, $LANG_CMED_EDITOR, $MESSAGE, $CMED_CSRF_TOKEN;
    
    $retval = false;

    $access = SEC_hasAccess($A['owner_id'],     $A['group_id'],
                            $A['perm_owner'],   $A['perm_group'],
                            $A['perm_members'], $A['perm_anon']);

    if (($access > 0) && (CMED_hasMenuitemTopicAccess ($A['tid']) > 0)) {
        switch($fieldname) {
            case "edit":
                if ($access == 3) {
                    $retval = "<a href=\"{$_CONF['site_admin_url']}/plugins/custommenu/index.php"
                            . "?mode=edit&amp;mid={$A['mid']}\">{$icon_arr['edit']}</a>";
                }
                break;

            case "copy":
                if ($access == 3) {
                    $retval = "<a href=\"{$_CONF['site_admin_url']}/plugins/custommenu/index.php"
                            . "?mode=clone&amp;mid={$A['mid']}\">{$icon_arr['copy']}</a>";
                }
                break;

            case "delete":
                if ( ($access == 3 && ($A['type'] == 'custom')) || 
                     ($access == 3 && ($A['type'] == 'plugin') && !in_array($A['mid'], $_PLUGINS)) ) {
                    $icon   = "<img src=\"{$_CONF['site_url']}/custommenu/images/delete.png\" "
                            . "border=\"0\" alt=\"{$LANG_ADMIN['delete']}\" title=\"{$LANG_ADMIN['delete']}\">";

                    $token  = "";
                    if (version_compare(VERSION, '1.5') >= 0) {
                        $token  = "&amp;" . CSRF_TOKEN . "=" . $CMED_CSRF_TOKEN;
                    }

                    $retval = "<a href=\"{$_CONF['site_admin_url']}/plugins/custommenu/index.php"
                            . "?mode=delete&amp;mid={$A['mid']}"
                            . $token . "\" onclick=\"return confirm('{$MESSAGE[76]}');\">$icon</a>";
                }
                break;

            case 'menuorder':
                if ($access == 3) {
                    $iconup  = "<img src=\"{$_CONF['site_url']}/custommenu/images/arrow-up.png\" "
                             . "border=\"0\" alt=\"{$LANG_CMED_EDITOR['move_up']}\" title=\"{$LANG_CMED_EDITOR['move_up']}\">";

                    $retval .= "<a href=\"{$_CONF['site_admin_url']}/plugins/custommenu/index.php"
                             . "?mode=move&amp;mid={$A['mid']}&amp;where=up\" alt=\"{$LANG_CMED_EDITOR['move_up']}\">$iconup</a>";

                    $icondn  = "<img src=\"{$_CONF['site_url']}/custommenu/images/arrow-dn.png\" "
                             . "border=\"0\" alt=\"{$LANG_CMED_EDITOR['move_down']}\" title=\"{$LANG_CMED_EDITOR['move_down']}\">";

                    $retval .= "<a href=\"{$_CONF['site_admin_url']}/plugins/custommenu/index.php?"
                             . "mode=move&amp;mid={$A['mid']}&amp;where=dn\" alt=\"{$LANG_CMED_EDITOR['move_down']}\">$icondn</a>";

                    $retval .= "&nbsp;";
                    $retval .= $A['menuorder'];
                }
                break;

            case 'label':
                switch ($A['mode']) {
                    case "fixation":
                        $retval = stripslashes ($A['label']);
                        break;
                        
                    case "variable":
                        $retval = stripslashes ($A['label_var']);
                        $retval = CMED_replaceLabel($retval);
                        break;
                        
                    case "php":
                        $function = stripslashes ($A['php_function']);
                        if (function_exists($function)) {
                            $menuitems = $function();
                            if ((is_array($menuitems)) && (sizeof($menuitems) > 0)) {
                                $retval = $menuitems['label'];
                            }
                        }
                        break;
                }
                if (empty($retval)) {
                    $retval = '(' . $A['mid'] . ')';
                }
                if ($access == 3) {
                    $switch = ($A['is_enabled'] == 1) ? UC_CHECKED : '';
                    $retval = "<form action=\"{$_CONF['site_admin_url']}/plugins/custommenu/index.php\" method=\"post\">"
                            . "<input type=\"checkbox\" name=\"itemenable\" onclick=\"submit()\" value=\"{$A['mid']}\" $switch>"
                            . "<input type=\"hidden\" name=\"itemchange\" value=\"{$A['mid']}\">" . $retval . "</form>";
                }
                break;

            case "mode":
                $retval = $LANG_CMED_EDITOR['mode_' . $fieldvalue];
                break;

            default:
                $retval = $fieldvalue;
                break;
        }
    }
    return $retval;
}


// MAIN

$mode = ( !empty($_REQUEST['mode']) ) ? $_REQUEST['mode'] : '';
$mode = (($mode == $LANG_ADMIN['save'])         && !empty($LANG_ADMIN['save']))         ? 'save'   : $mode;
$mode = (($mode == $LANG_ADMIN['delete'])       && !empty($LANG_ADMIN['delete']))       ? 'delete' : $mode;
$mode = (($mode == $LANG_ADMIN['cancel'])       && !empty($LANG_ADMIN['cancel']))       ? 'cancel' : $mode;
$mode = (($mode == $LANG_CMED_EDITOR['update']) && !empty($LANG_CMED_EDITOR['update'])) ? 'update' : $mode;

$mid = (!empty($_REQUEST['mid'])) ? COM_applyFilter($_REQUEST['mid']) : '';

$itemchange = COM_applyFilter($_REQUEST['itemchange']);

if (isset($itemchange)) {
    CMED_changeMenuitemStatus($itemchange);
}

if ($mode == 'move') {
    CMED_moveMenuitem();
}

if ($mode == 'delete' && SEC_checkToken()) {

    if (!isset ($mid) || empty ($mid)) {
        COM_errorLog('CustomMenu admin: Attempted to delete menuitem, mid empty or null, value =' . $mid);
        $display .= COM_refresh($_CONF['site_admin_url'] . '/plugins/custommenu/index.php');
    } else {
        $msg = CMED_deleteMenuitem($mid);
        $CMED_CSRF_TOKEN = SEC_createToken();
        $display .= COM_siteHeader('menu', $LANG_CMED['manager']);
        $display .= $msg;
        $display .= CMED_listMenuitems();
        $display .= COM_siteFooter();
    }

} else if ((($mode == 'save') || ($mode == 'update')) && SEC_checkToken()) {

    CMED_setMI();
    $msg = CMED_validateMI($mode);
    if (empty($msg)) {
        $msg = CMED_saveMenuitems($mode);
        $CMED_CSRF_TOKEN = SEC_createToken();
        $display .= COM_siteHeader('menu', $LANG_CMED['manager']);
        $display .= $msg;
        $display .= CMED_listMenuitems();
        $display .= COM_siteFooter();
    } else {
        $display .= COM_siteHeader('menu', $LANG_CMED_EDITOR['custommenueditor']);
        $display .= COM_startBlock($LANG_CMED_EDITOR['error_field'], '', COM_getBlockTemplate('_msg_block', 'header'));
        $display .= $msg;
        $display .= COM_endBlock(COM_getBlockTemplate('_msg_block', 'footer'));
        $display .= CMED_editMenuitem($mid, 'edit', $MI);
        $display .= COM_siteFooter();
    }

} else if (($mode == 'create') || ($mode == 'edit') || ($mode == 'clone')) {

    $display .= COM_siteHeader('menu', $LANG_CMED_EDITOR['custommenueditor']);
    $display .= CMED_editMenuitem($mid, $mode);
    $display .= COM_siteFooter();

} else {

    if  (($mode != 'cancel') && ($mode != 'move')) {
        CMED_addPluginsMenuitems();
    }
    $CMED_CSRF_TOKEN = SEC_createToken();
    $display .= COM_siteHeader('menu', $LANG_CMED['manager']);
    $display .= CMED_listMenuitems();
    $display .= COM_siteFooter();
}

echo $display;

?>
