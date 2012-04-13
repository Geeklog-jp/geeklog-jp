<?php

// +---------------------------------------------------------------------------+
// | nmoxqrblock Geeklog Plugin                                                |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/nmoxqrblock/language/japanese.php                         |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007-2012 by nmox                                           |
// |                            mystral-kk - geeklog AT mystral-kk DOT net     |
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
// +---------------------------------------------------------------------------+

$LANG_NMOXQRBLOCK = array(
	'plugin'            => 'nmoxqrblock',
	'access_denied'     => '���������ϵ��ݤ���ޤ�����',
	'access_denied_msg' => 'Root�桼�����������Υڡ����ˤϥ��������Ǥ��ޤ��󡣤��ʤ��Υ桼����̾��IP���ɥ쥹�ϵ�Ͽ����ޤ�����',
	'install_header'	=> '�ץ饰����Υ��󥹥ȡ���/���󥤥󥹥ȡ���',
	'installed'         => '���Υץ饰����ϥ����Ȥ������֥饦�������ѹ����뤳�Ȥ��Ǥ���褦�ˤ���ץ饰����Ǥ���',
	'uninstalled'       => '���ߡ�QR�֥�å��ץ饰����ϥ��󥹥ȡ��뤵��Ƥ��ޤ��󡣥��󥹥ȡ��뤹����� �����Υ��󥹥ȡ���ܥ���򲡤��Ʋ�������',
	'install_success'	=> '���󥹥ȡ�����������ޤ�����',
	'install_failed'	=> '���󥹥ȡ���˼��Ԥ��ޤ������ܺ٤ϥ��顼��(error.log)��������������',
	'uninstall_msg'		=> 'QR�֥�å��ץ饰����ϥ��󥤥󥹥ȡ��뤵��ޤ�����',
	'install'           => '���󥹥ȡ���',
	'uninstall'			=> '���󥤥󥹥ȡ���',
	'title_block'		=> 'QR������',
);

// Localization of the Admin Configuration UI
$LANG_configsections['nmoxqrblock'] = array(
	'label' => $LANG_NMOXQRBLOCK['plugin'],
	'title' => $LANG_NMOXQRBLOCK['plugin'] . '������',
);

$LANG_confignames['nmoxqrblock'] = array(
	'image_type'	=> '����������',
	'ecc_level'		=> '���顼������٥�',
	'module_size'	=> '�⥸�塼�륵����',
);

$LANG_configsubgroups['nmoxqrblock'] = array(
	'sg_main' => '��������'
);

$LANG_fs['nmoxqrblock'] = array(
	'fs_main'        => $LANG_NMOXQRBLOCK['plugin'] . '�μ�������',
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['nmoxqrblock'] = array(
	 0 => array('�Ϥ�' => 1, '������' => 0),
	 1 => array('�Ϥ�' => TRUE, '������' => FALSE),
	12 => array('JPEG' => 'J', 'PNG' => 'P'),
	13 => array('L' => 'L', 'M' => 'M', 'Q' => 'Q', 'H' => 'H'),
);
