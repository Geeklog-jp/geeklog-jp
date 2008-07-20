<?php

###############################################################################
# japanese.php (EUC-JP)
# This is the on-installation english language page for GeekLog!
#
# Copyright (C) 2000-2006 by the following authors:
#
# Authors: Jason Whittenburg - jwhitten AT securitygeeks DOT com
#          Tony Bibbs        - tony AT tonybibbs DOT com
#          Mark Limburg      - mlimburg AT users DOT sourceforge DOT net
#          Jason Whittenburg - jwhitten AT securitygeeks DOT com
#          Dirk Haun         - dirk AT haun-online DOT de|
#          Randy Kolenko     - randy AT nextide DOT ca
#          mystral-kk        - geeklog AT mystral-kk DOT net
#
###############################################################################
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################

// IMPORTANT: DO NOT REMOVE '%s' from the messages below!

$LANG_CHARSET = 'euc-jp';

$LANG_INST = array(
	'and'      => ' �� ',
    'welcome_title' => 'Geeklog %s�Υ��󥹥ȡ���', // %s=VERSION
	'php_required' => '<h1>PHP 4.1.0��ɬ�פǤ�</h1>' . LB
	            . '<p>����������ޤ��󤬡�Geeklog��ư�����ˤϾ��ʤ��Ȥ�PHP 4.1.0��ɬ�פǤ���PHP�򥢥åץ��졼�ɤ��뤫���ۥ��ƥ��󥰥����ӥ���Ҥ˥��åץ��졼�ɤ���ꤷ�Ƥ���������</p>' . LB
				. '</body>' . LB . '</html>' . LB,
	'mysql_required' => '<h1>MySQL 3.23.2��ɬ�פǤ�</h1>' . LB
	            . '<p>����������ޤ��󤬡�Geeklog��ư�����ˤϾ��ʤ��Ȥ�MySQL 3.23.2��ɬ�פǤ���MySQL�򥢥åץ��졼�ɤ��뤫���ۥ��ƥ��󥰥����ӥ���Ҥ˥��åץ��졼�ɤ���ꤷ�Ƥ���������</p>' . LB
				. '</body>' . LB . '</html>' . LB,
	'wc_msg1' => 'Geeklog�Υ��󥹥ȡ���(��� 1 / 2)',
	'wc_msg2' => 'Geeklog������Ǥ������������꤬�Ȥ��������ޤ���',
	'wc_msg3' => '2���ƥåפ�Geeklog %s��ư�������Ȥ��Ǥ��ޤ���', // %s=VERSION
	'wc_msg4' => '<strong>���Υ�����ץȤ�¹Ԥ�������config.php���Խ����Ƥ���������</strong>���θ�Ǥ��Υ�����ץȤ�Ȥ����������󥹥ȡ���ξ��⥢�åץ��졼�ɤξ��⡤�ǡ����١���������ԤäƤ���������',
	'wc_msg5' => '���åץ��졼��',
	'wc_msg6' => '���󥹥ȡ����Ϥ�����ˡ���¸��Geeklog�򥢥åץ��졼�ɤ���ʤ顤�ǡ����١����ȥե����륷���ƥ�ξ���ΥХå����åפ��������Τ����פǤ���<strong>���Υ��󥹥ȡ����ѥ�����ץȤ�Geeklog�ǡ����١�����񤭴����ޤ���</strong>�������äơ��ȥ�֥뤬�����ƥ��åץ��졼�ɤ���ľ����硤���Υǡ����١����ΥХå����åץե����뤬ɬ�פˤʤ�ޤ���<strong>����դ�������</strong>��',
	'wc_msg7' => '���β��̤Ǹ��߻��Ѥ��Ƥ���Geeklog�ΥС����������������򤷤Ƥ������������Υ�����ץȤϸ��ߤΥС�����󤫤龯�����ĥ��åץ��졼�ɤ��Ƥ����ޤ��ʤĤޤꡤ�ɤε�С�����󤫤�Ǥ�ľ�ܥС������ %s �˥��åץ��졼�ɤǤ��ޤ��ˡ�', // %s=VERSION
	'wc_msg8' => '���Υ�����ץȤǤϡ�Geeklog�Υ١����Ǥ��꡼��������(RC)�����<strong>���åץ��졼�ɤϹԤ��ޤ���</strong>',
	'wc_msg9' => '������ջ���',
	'wc_msg10' => '<p><strong>���1:</strong>�������Ȥ�URL���"public_html"���ޤޤ�ʤ��褦�ˤ��Ƥ���������<a href="../../docs/install.html#public_html">���󥹥ȡ���������</a>�����public_html�ι���ɤߡ����󥹥ȡ����³�Ԥ������ˡ������Ȥ������Ŭ�ڤʤ�Τ��ѹ����Ƥ���������</p>',
	'wc_msg11' => '<p><strong>���2:</strong>��<tt>php.ini</tt>�� %s �����ꤵ��Ƥ��ޤ���Geeklog���ΤϤ�������Ǥ⤭�����ư��ޤ������ץ饰����䥢�ɥ������ˤ�ư��ʤ���Τ�����ޤ������Τ褦�ʥץ饰����򥤥󥹥ȡ��뤹����ˤϡ�%s �����ꤷ�ơ�Web�����С���Ƶ�ư���ơˤ���������</p>' . LB
	            . '<p><tt>php.ini</tt>���ɤ��ˤ��뤫�狼��ʤ����ϡ�<a href="info.php">�����򥯥�å����Ƥ�������</a>��</p>', // %s = warn_message, %s = help_message
	'wc_msg12' => '���󥹥ȡ���Υ��ץ����',
	'wc_msg13' => '���󥹥ȡ���μ���:',
	'wc_msg14' => 'Geeklog��config.php�Υѥ�:',
	'wc_msg15' => '�ҥ��:',
	'wc_msg16' => '���Υե�����δ����ʥѥ��ϡ�',
	'wc_msg17' => 'Geeklog�Υѥ��ϼ��Τ褦�Ǥ���',
	'inst_option1' => 'MySQL�ǿ������󥹥ȡ���',
	'inst_option2' => 'Microsoft SQL�����Фǿ������󥹥ȡ���',
	'inst_option3' => 'MySQL�ǥ��åץ��졼��',
	'next' => '���� >>',
	'back' => '<< ���',
	'error_title1' => 'Geeklog�Υ��󥹥ȡ��� - ���顼',
	'error_title2' => 'Geeklog�Υ��󥹥ȡ��� - ���顼',
	'error_not_path' => '<p><b>%s</b> �ϥѥ��ǤϤ���ޤ���<br>Web�����С��Υե����륷���ƥ����ǡ�config.php��¸�ߤ���ѥ������Ϥ��Ƥ���������</p>', // %s = $_POST['geeklog_path']
	'error_wrong_path' => '<p>���Ϥ����ѥ���config.php�Ϥ���ޤ���: <b>%s</b><br>' . LB
	              . '�ѥ����ǧ�������Ϥ�ľ���Ƥ����������ե����륷���ƥ�Υ롼�Ȥ���Ϥޤ����Хѥ�����ꤷ�Ƥ���������</p>' . LB, // %s = $_POST['geeklog_path']
	'error_table_exists' => '<p>Geeklog�Υơ��֥뤬�ǡ����١�����˴���¸�ߤ��Ƥ��ޤ����ͤ�������ͳ�Ȥ��Ƥϡ�</p>' . LB
	           . '<ol>' . LB
			   . '<li>���������󥹥ȡ��륹����ץȤ�¹Ԥ������Ȥ����롣<br>���󥤥󥹥ȡ��뤷�褦�Ȥ��ơ��ѥ���URL������������������ϡ����󥹥ȡ��륹����ץȤ���ټ¹Ԥ���ɬ�פϤ���ޤ��󡣤������ʤ��顤���󡤥��󥹥ȡ��륹����ץȤ�Ƽ¹Ԥ������ʤ顤�ޤ��ǽ��Geeklog�Υơ��֥������������Ƥ��������ʤ��뤤�ϥǡ����١����򤤤ä��������Ƥ��顤������ľ���Ƥ��������ˡ�</li>' . LB
			   . '<li>�����ϥǡ����١������Geeklog�ο��С�������Ѥˡ˥��åץ��졼�ɤ������Τˡ��ǽ�β��̤Υɥ�åץ������˥塼�ǡ֥ǡ����١����Υ��åץ��졼�ɡפ����򤷤Ƥ��ʤ���</li>' . LB
			   . '</ol>' . LB,
	'dbsettings_title1' => 'Geeklog�Υ��󥹥ȡ���: �ǡ����١���������',
	'dbsettings_title2' => 'Geeklog�Υǡ����١���������(��� 2 / 2)',
	'dbsettings_text' => '���ơ�ɬ�פʥǡ�����ǡ����١������ɲä�������������ޤ��������åץ��졼�ɤ���ʤ顤���ߤ�Geeklog�ΥС������򲼤����򤷤Ƥ����������������󥹥ȡ���ʤ顤�ּ��ءפȤ����ܥ���򥯥�å���������Ǥ����������ǥǡ����١����ΥХå����åפ��������Ƥ���Ȼפ��ޤ��ʥǡ����١���������¸�ߤ��Ƥ�����ˡ��ޤ��ʤ顤<strong>�ּ��ءפ򥯥�å��������ˡ��Хå����åפ�������Ƥ�������</strong>���ְ㤤�Τʤ��褦�ˤ��ꤤ���ޤ���',
	'version_dd1' => '<tr><td align="left"><b>�ǡ����١����ϴ��˺ǿ��Τ�ΤˤʤäƤ��ޤ���</b>' . LB
	           . '<p>�ǡ����١����ϴ��˺ǿ��ǤˤʤäƤ���褦�Ǥ������֤󡤥��åץ��졼���ѥ�����ץȤ�¹Ԥ������Ȥ�����ΤǤ��礦�����٥��åץ��졼�ɤ�¹Ԥ���ɬ�פ�����ʤ顤�ޤ��Хå����åץե������Ȥäƥǡ������������Ƥ���ˤ��Ƥ���������</td></tr>',
	'version_dd2' => '<tr><td align="right"><b>���ߤ�Geeklog�ΥС������:</b></td><td><select name="version">',
	'inno_db_supported' => '<tr><td align="left">'
	            . '<p>InnoDB�ơ��֥����Ѥ���ȡ��ʤȤƤ���絬�Ϥʥ����ȤǤϥѥե����ޥ󥹤�����������ǽ��������ޤ������Хå����åפ��������Τ��񤷤��ʤ�ޤ������򤷤Ƥ��ʤ��Τʤ顤���Υ��ץ����˥����å�������ʤ��Ǥ���������</p>'
	            . '<input type="checkbox" name="innodb"> InnoDB�ơ��֥����Ѥ���'
				. '</td></tr>',
	'sc_title' => '���󥹥ȡ��봰λ',
	'sc_msg1' => 'Geeklog %s ���󥹥ȡ��봰λ!', // %s=VERSION
	'sc_msg2' => '����ǤȤ��������ޤ���Geeklog�Υ��󥹥ȡ�����������ޤ���������ɽ������Ƥ������⤴������������',
	'sc_msg3' => '���θ�ǡ�<a href="%s">�����򥯥�å�</a>���ơ������ȤΥȥåץڡ����ذ�ư����<b>�ǥե���Ȥ�����ǥ����󤷤Ƥ�������</b>��',
	'sc_msg4' => '�ѡ��ߥå����Υ����å�',
	'sc_msg5' => 'Geeklog�Ǥϡ������ǽ�ˤ��ʤ���Фʤ�ʤ��ե������ǥ��쥯�ȥ꤬����ޤ���Ŭ�ڤ����ꤵ��Ƥ��뤫�ɤ������ǧ����ˤϡ�<a href="check.php">���Υ�����ץ�</a>����Ѥ��Ƥ���������',
	'sc_msg6' => '�������ƥ��ٹ�',
	'sc_msg7' => '���ä��󥵥��Ȥ���Ư���Ϥ᤿�顤ɬ��<strong>install�ǥ��쥯�ȥ��<tt>{path_html}admin/install</tt>�ˤ���</strong>�����ǥե���Ȥ�\'Admin\'��������Ȥ�<strong>�ѥ���ɤ��ѹ����Ƥ�������</strong>��',
	'sc_msg8' => '<p><strong>��:</strong> �������ƥ���ǥ뤬�ѹ����줿���ᡤ�������Ȥ�������븢�¤���ä���������Ȥ�������ޤ��������Υ�������ȤΥ桼��̾��<b>NewAdmin</b>�ǥѥ���ɤ�<b>password</b>�Ǥ���</p>',
);

?>
