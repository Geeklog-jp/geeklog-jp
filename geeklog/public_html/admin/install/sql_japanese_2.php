<?php
// +---------------------------------------------------------------------------+
// | �ơ��֥빽¤�ȥǡ��������ܸ��ǲ�����                                      |
// |  SQLʸ�ǡ���2�����ܸ��ǽ����Ͽ�ǡ���                                     |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_2.php
// �⤷���쥨�󥳡��ɤμ��ब  euc�Ǥʤ����ϡ�euc���Ѵ����Ƥ���������
// ��������2007/02/19 tsuchi AT geeklog DOT jp
// �ǽ���������2008/01/29 tsuchi AT geeklog DOT jp

// ����������ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['stories']} Where sid='welcome'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['stories']} 
    (sid, uid, draft_flag, tid, date, title, introtext, bodytext, hits
    , numemails, comments, related, featured, commentcode, statuscode
    , postmode, frontpage, owner_id, group_id, perm_owner, perm_group
    , perm_members, perm_anon) VALUES (
    'welcome',2,0,'Geeklog',NOW(),'Geeklog�ؤ褦������'
    ,'<p>̵�����󥹥ȡ��뤬��λ�����褦�Ǥ��͡�����ǤȤ��������ޤ����Ǥ���С�<a href=\"docs/index.html\">docs �ǥ��쥯�ȥ�</a>�Τ��٤Ƥ�ʸ��˰��̤��ܤ��̤��Ƥ����Ƥ���������Geeklog�ϡ��桼�������濴�Ȥ����������ƥ���ǥ��������Ƥ��ޤ���Geeklog����������Ѥ��뤿��ˤϡ����λ��Ȥߤ����򤹤�ɬ�פ�����ޤ���\r\r<p>Admin�Ϥ��٤Ƥ˥��������Ǥ��ޤ����ѥ���ɤ�<b>password</b>�Ǥ���'
    ,'',100,1,0,'',1,0,0,'html',1,2,3,3,2,2,2)
    ";

// ���ܸ��������ȤΥ���ɲ�
$_SQL[] = "
    INSERT IGNORE INTO {$_TABLES['links']} 
    (lid, category, url
    , description, title, date, owner_id, group_id) VALUES (
    'geeklog.jp','Geeklog Sites','http://www.geeklog.jp/'
    ,'Geeklog ���ܸ���������','Geeklog Japanese',NOW(),1,5)
    ";

// ������󥱡��Ȥ����ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['pollanswers']} Where qid='geeklogfeaturepoll'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['pollquestions']} Where qid='geeklogfeaturepoll'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',1,'�ȥ�å��Хå�',0)
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',2,'��󥯽��ȥ��󥱡���',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',3,'�����Բ��̤β���',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',4,'WYSIWYG���ǥ������',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',5,'��⡼�ȥ桼����ǧ��',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',6,'����¾',0)
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pollquestions']}
    (qid, question, voters, date
    , display, commentcode, statuscode
    , owner_id, group_id, perm_owner, perm_group) VALUES (
    'geeklogfeaturepoll','����ǽ�Ǥ���������ϡ�',0,NOW()
    ,1,0,0
    ,2,8,3,3)
    ";

// �᡼��ǵ��������
$_SQL[] = "
    INSERT IGNORE INTO {$_TABLES['topics']} VALUES (
    'NewTopic', '�᡼�뵭�������', '', 100, 0, 0, 0, 3, 4, 3, 2, 0, 0)
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='toukou'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='photomail'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'photomail', 'normal', '�᡼����Ƽ���', 'homeonly', 70
    , '<img src=\"photomail/photomailimg.php\" width=\"1\" height=\"1\" alt=\"\" />'
    , '', '0000-00-00 00:00:00', 0, 1, '', '', 2, 3, 3, 3, 0, 0) 
    ";
// �ơ��ޤΤ��
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='themetester'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'themetester', 'phpblock', '�ơ��ޤΤ��', 'all', 70
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_themetester', '', 2, 4, 3, 2, 2, 2) 
    ";
// �����ȥ�����
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='mycal'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'mycal', 'phpblock', '�����ȥ�����', 'all', 70
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_mycaljp', '', 2, 4, 3, 2, 2, 2) 
    ";
// ¿�����ڤ��ؤ�
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='maltilang'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'maltilang', 'phpblock', '¿�����ڤ��ؤ�', 'all', 80
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_switch_language', '', 2, 4, 3, 2, 2, 2) 
    ";

?>
