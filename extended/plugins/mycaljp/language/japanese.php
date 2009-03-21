<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Site Calendar Plugin 'mycaljp' version 2.0.0                      |
// | Only Supported with Geeklog 1.4.1 and new Search Class                    |
// +---------------------------------------------------------------------------+
// | language/japanese_utf-8.php                                               |
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

$LANG_MYCALJP = array (
    'plugin'            => 'mycaljp�ץ饰����',
    'access_denied'     => '���������ϵ��ݤ���ޤ�����',
    'access_denied_msg' => '���Υڡ����˥��������Ǥ���Τϡ�Root�桼�������Ǥ������ʤ��Υ桼��̾��IP���ɥ쥹�ϵ�Ͽ����ޤ�����',
    'admin'             => '�����ȥ����� mycaljp �δ���',
    'install_header'    => '�����ȥ����� mycaljp �ץ饰����Υ��󥹥ȡ���/���󥤥󥹥ȡ���',
    'installed'         => '�����ȥ����� mycaljp �ץ饰����ϥ��󥹥ȡ��뤵��Ƥ��ޤ���',
    'uninstalled'       => '�����ȥ����� mycaljp �ץ饰����ϥ��󥹥ȡ��뤵��Ƥ��ޤ���',
    'install_success'   => '�����ȥ����� mycaljp �ץ饰����Υ��󥹥ȡ�����������ޤ�����',
    'install_failed'    => '�����ȥ����� mycaljp �ץ饰����Υ��󥹥ȡ���˼��Ԥ��ޤ������ܺ٤ϥ��顼��(error.log)��������������',
    'uninstall_msg'     => '�����ȥ����� mycaljp �ץ饰����ϥ��󥤥󥹥ȡ��뤵��ޤ�����',
    'install'           => '���󥹥ȡ���',
    'uninstall'         => '���󥤥󥹥ȡ���',
    'warning'           => '�ٹ𡪡������ȥ����� mycaljp �ץ饰�����ͭ���ʤޤޤǤ���',
    'enabled'           => '���󥤥󥹥ȡ��뤹�����ˡ������ȥ����� mycaljp �ץ饰�����̵���ˤ��Ƥ���������',
    'readme'            => '����ä��Ԥäơ����֥��󥹥ȡ���פ򥯥�å��������ˡ����ɤߤ���������',
    'installdoc'        => '���󥹥ȡ������',
    
    'blocktitle'        => '�֥�å������ȥ�',
    'selecttemplates'   => '�ƥ�ץ졼�Ȥ�����',
    'checkcontents'     => '�����å��оݤΥ���ƥ��',
    'showholiday'       => '�ڡ�����������ʬ��ɽ������',
    'checkjpholiday'    => '���ܤε�����Ĵ�٤�',
    'headertitleyear'   => '�إå������ȥ��ǯ��',
    'headertitlemonth'  => '�إå������ȥ�ʷ��',
    'wdays'             => '���������ȥ�',
    'enablesrblocks'    => '�������ɥС���ɽ������',
    'showstoriesintro'  => '�����Υ���ȥ��ɽ������',
    'prevmonth'         => '����',
    'nextmonth'         => '����',
    'skipcalendar'      => '�����ȥ������򥹥��å�',
    'headeroflink'      => '',
    'footeroflink'      => '�Υ���ƥ��',
    'yes'               => '�Ϥ�',
    'no'                => '������',
    'titleorder'        => '�إå������ȥ�ν��',
    'year_month'        => 'ǯ ��',
    'month_year'        => '�� ǯ',
    'sunday'            => '��',
    'monday'            => '��',
    'tuesday'           => '��',
    'wednesday'         => '��',
    'thursday'          => '��',
    'friday'            => '��',
    'saturday'          => '��',

    'infotitleyear'     => '"Y"  ǯ��4 ��ο�����(��: 1999�ޤ���2003)<br' . XHTML . '>' .
                           '"y"  ǯ��2 ��ο�����(��: 99 �ޤ��� 03)',
    'infotitlemonth'    => '"m"  ���������Ƭ�˥����Ĥ��롥(01 ���� 12)<br' . XHTML . '>' .
                           '"n"  ���������Ƭ�˥����Ĥ��ʤ���(1 ���� 12)<br' . XHTML . '>' .
                           '"F"  ��ե륹�ڥ��ʸ����(January ���� December)<br' . XHTML . '>' .
                           '"M"  �3 ʸ��������(Jan ���� Dec)',
    'applythemetmplate' => '�ơ����󶡥ƥ�ץ졼�Ȥ�Ŭ��',
    'infoapplythemetemp' => '�ơ��ޤ��󶡤����mycaljp�ѥƥ�ץ졼�Ȥ򸡺���<br' . XHTML . '>' .
                           '���Ĥ��ä����Ϥ����Ŭ�Ѥ��ޤ���<br' . XHTML . '>' .
                           '���Ĥ���ʤ��ä�����ɸ��ƥ�ץ졼�Ȥ���Ѥ��ޤ���<br' . XHTML . '>' .
                           '(�ơ���¦�Υ��ݡ��Ȥ�ɬ�פǤ���)',
    
    'headerofdate'      => '',
    'middleofdate'      => ' �� ',
    'footerofdate'      => ' �θ������',
);

?>