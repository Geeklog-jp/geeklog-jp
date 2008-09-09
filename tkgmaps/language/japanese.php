<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | Universal Plugin 1.0.3 for Geeklog - The Ultimate Weblog                  |
// +---------------------------------------------------------------------------|
// | language/japanese.php                                                     |
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
//
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

$LANG_{lang_var_postfix} = array (
    'display_name'      => '{display_name}',
    'menu_title'        => '{display_name}',
    'plugin'            => '{display_name}�ץ饰����',
    'access_denied'     => '���������ϵ��ݤ���ޤ�����',
    'access_denied_msg' => '���Υڡ����˥��������Ǥ���Τϡ�Root�桼�������Ǥ������ʤ��Υ桼��̾��IP���ɥ쥹�ϵ�Ͽ����ޤ�����',
    'admin'             => '{display_name}�ץ饰�������',
    'install_header'    => '{display_name}�ץ饰����Υ��󥹥ȡ���/���󥤥󥹥ȡ���',
    'installed'         => '{display_name}�ץ饰����ϥ��󥹥ȡ��뤵��Ƥ��ޤ���',
    'uninstalled'       => '{display_name}�ץ饰����ϥ��󥹥ȡ��뤵��Ƥ��ޤ���',
    'install_success'   => '{display_name}�ץ饰����Υ��󥹥ȡ�����������ޤ�����',
    'install_failed'    => '{display_name}�ץ饰����Υ��󥹥ȡ���˼��Ԥ��ޤ������ܺ٤ϥ��顼��(error.log)��������������',
    'uninstall_msg'     => '{display_name}�ץ饰����ϥ��󥤥󥹥ȡ��뤵��ޤ�����',
    'install'           => '���󥹥ȡ���',
    'uninstall'         => '���󥤥󥹥ȡ���',
    'warning'           => '�ٹ𡪡�{display_name}�ץ饰�����ͭ���ʤޤޤǤ���',
    'enabled'           => '���󥤥󥹥ȡ��뤹�����ˡ�{display_name}�ץ饰�����̵���ˤ��Ƥ���������',
    'readme'            => '����ä��Ԥäơ����֥��󥹥ȡ���פ򥯥�å��������ˡ����ɤߤ���������',
    'installdoc'        => '���󥹥ȡ������',

    // for stats
    'stats_headline'    => '{display_name}(���10��)',
    'stats_title'       => '��̾',
    'stats_value'       => '��',
    'stats_no_value'    => '�ǡ���������ޤ���',
    
    // for admin
    'manager'           => '{display_name}����',
    'instructions'      => '�ǡ������������������ϳƥǡ����Ρ��Խ��ץ�������򥯥�å����Ƥ������������������ϡֿ��������פ򥯥�å����Ƥ���������',

);

?>