<?php

###############################################################################
# japanese.php
#
# This is the Japanese language file for the Geeklog Polls plugin
#
# Copyright (C) 2001 Tony Bibbs
# tony AT tonybibbs DOT com
# Copyright (C) 2005 Trinity Bays
# trinity93 AT gmail DOT com
# Tranlated by Geeklog Japanese group SaY and Ivy
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
# Last Update 2007/10/03 by Ivy (Geeklog Japanese)

global $LANG32;

$LANG_POLLS = array(
    'polls'             => '���󥱡���',
    'results'           => '���',
    'pollresults'       => '��ɼ���',
    'votes'             => '��ɼ',
    'vote'              => '��ɼ����',
    'pastpolls'         => '���󥱡��Ȥΰ���',
    'savedvotetitle'    => '��ɼ����Ͽ����ޤ���',
    'savedvotemsg'      => '������ɼ����Ͽ����ޤ���',
    'pollstitle'        => '�罸��Υ��󥱡���',
    'polltopics'        => '¾�Υ��󥱡��Ȥ򸫤�',
    'stats_top10'       => '���󥱡��Ⱦ��10��',
    'stats_topics'      => '���󥱡��Ȥμ���',
    'stats_votes'       => '��ɼ',
    'stats_none'        => '���Υ����Ȥˤϥ��󥱡��Ȥ��ʤ������ޤ�ï����ɼ���Ƥ��ʤ��褦�Ǥ���',
    'stats_summary'     => '���Υ����ƥ�μ���(����)',
    'open_poll'         => '��ɼ��ǽ',
    'answer_all'        => '�Ĥ�Τ��٤Ƥμ���ˤ�������������',
    'not_saved'         => '��̤���¸����ޤ���Ǥ���',
    'upgrade1'          => '���󥱡��ȥץ饰����ο������С�����󤬥��󥹥ȡ��뤵��ޤ�����',
    'upgrade2'          => '���åץ��졼�ɤ��Ƥ���������',
    'editinstructions'  => '���󥱡���ID�����Ϥ��Ƥ������������ʤ��Ȥ�1�Ĥμ����2�Ĥβ������Ѱդ��Ƥ���������'
);

###############################################################################
# admin/plugins/polls/index.php

$LANG25 = array(
    1 => '�⡼��',
    2 => '����ȼ���Ⱦ��ʤ��Ȥ�1�Ĥβ��������Ϥ��Ƥ���������',
    3 => '��������',
    4 => "���󥱡��ȡ� %s �ˤ���¸����ޤ���",
    5 => '���󥱡��Ȥ��Խ�',
    6 => '���󥱡���ID',
    7 => '(���ڡ�����ޤޤʤ�����)',
    8 => '�ۡ���ڡ�����ɽ������',
    9 => '����',
    10 => '���� / ��ɼ��',
    11 => "���󥱡���( %s )�������˥��顼������ޤ���",
    12 => "���󥱡���( %s )�μ�����ܤ˥��顼������ޤ���",
    13 => '���󥱡��Ȥκ���',
    14 => '��¸',
    15 => '���',
    16 => '���',
    17 => '���󥱡���ID�����Ϥ��Ƥ�������',
    18 => '���󥱡��Ȱ���',
    19 => '���󥱡��Ȥκ�����Խ��ϥ����ȥ뺸�Υ�������򥯥�å��������˺���������ϡֿ��������פ򥯥�å����Ƥ��������������ȥ�򥯥�å�����ȥ��󥱡��Ȥ�����Ǥ��ޤ���',
    20 => '��ɼ��',
    21 => '�������������ݤ���ޤ���',
    22 => "�������¤Τʤ����󥱡��Ȥ��Խ����褦�Ȥ��ޤ��������ι԰٤ϵ�Ͽ����ޤ���<a href=\"{$_CONF['site_admin_url']}/poll.php\">��ɼ�δ�������</a>����äƤ���������",
    23 => '�������󥱡���',
    24 => '��������',
    25 => '�Ϥ�',
    26 => '������',
    27 => '�Խ�',
    28 => '����',
    29 => '�������',
    30 => 'ɽ�����',
    31 => '����',
    32 => '����Υƥ����Ȥ�������ȡ����󥱡��Ȥ�����䤬�������ޤ���',
    33 => '��ɼ��ǽ',
    34 => '����:',
    35 => '���Υ��󥱡��Ȥˤ�',
    36 => '����˼��䤬����ޤ���',
    37 => '��ɼ���Ϸ�������',
    38 => '���󥱡��ȼ»���ϡ������ʡ��ȥ롼�ȴ����Ԥ�������̤򸫤뤳�Ȥ��Ǥ��ޤ���',
    39 => '�����1�İʾ�μ��䤬�������ɽ������ޤ���',
    40 => '���󥱡��Ȥη�̤򸫤�'
);

$PLG_polls_MESSAGE19 = '���󥱡��Ȥ���Ͽ����ޤ�����';
$PLG_polls_MESSAGE20 = '���󥱡��ȤϺ������ޤ�����';

// Messages for the plugin upgrade
$PLG_polls_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_polls_MESSAGE3002 = $LANG32[9];


// Localization of the Admin Configuration UI
$LANG_configsections['polls'] = array(
    'label' => 'Polls',
    'title' => 'Polls Configuration'
);  

$LANG_confignames['polls'] = array(
    'pollsloginrequired' => 'Polls Login Required?',
    'hidepollsmenu' => 'Hide Polls Menu Entry?',
    'maxquestions' => 'Max. Questions per Poll',
    'maxanswers' => 'Max. Options per Question',
    'answerorder' => 'Sort Results ...',
    'pollcookietime' => 'Voter Cookie valid for',
    'polladdresstime' => 'Voter IP Address valid for',
    'delete_polls' => 'Delete Polls with Owner?',
    'aftersave' => 'After Saving Poll',
    'default_permissions' => 'Poll Default Permissions'
);

$LANG_configsubgroups['polls'] = array(
    'sg_main' => 'Main Settings'
);

$LANG_fs['polls'] = array(
    'fs_main' => 'General Polls Settings',
    'fs_permissions' => 'Default Permissions'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['polls'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    2 => array('As Submitted' => 'submitorder', 'By Votes' => 'voteorder'),
    9 => array('Forward to Poll' => 'item', 'Display Admin List' => 'list', 'Display Public List' => 'plugin', 'Display Home' => 'home', 'Display Admin' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3)
);

?>
