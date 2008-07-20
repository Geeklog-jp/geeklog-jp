<?php
// +---------------------------------------------------------------------------+
// | �ץ饰����δ������롼�׵��Ҥ����ܸ��ǲ�����                              |
// |  grpdescr_updatejp.php ���� require                                       |
// +---------------------------------------------------------------------------+
// $Id: grpdescr_japanese.php
// �⤷���쥨�󥳡��ɤμ��ब  euc�Ǥʤ����ϡ�euc���Ѵ����Ƥ���������
// �ǽ���������2007/08/22 tsuchi AT geeklog DOT jp

function plgsql( $grp_name )
{
    global $_TABLES;

    $retval="";
    switch($grp_name) {
        case 'Calendar Admin':
            $retval[] = "
                ALTER TABLE {$_TABLES['events']}  MODIFY
                zipcode varchar(8) DEFAULT null
                ";
            break;
        case  'Links Admin':
            // ���ܸ��������ȤΥ���ɲ�
            $retval[] = "
                INSERT IGNORE INTO {$_TABLES['links']} 
                (lid, category, url
                , description, title, date, owner_id, group_id) VALUES (
                'geeklog.jp','Geeklog Sites','http://www.geeklog.jp/'
                ,'Geeklog ���ܸ���������','Geeklog Japanese',NOW(),1,5)
                ";
            break;
        case  'Polls Admin':
            // ������󥱡��Ȥ����ܸ첽
            $retval[] = "
                DELETE FROM {$_TABLES['pollanswers']} Where qid='geeklogfeaturepoll'
                ";
            $retval[] = "
                DELETE FROM {$_TABLES['pollquestions']} Where qid='geeklogfeaturepoll'
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',1,'�ȥ�å��Хå�',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',2,'��󥯽��ȥ��󥱡���',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',3,'�����Բ��̤β���',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',4,'WYSIWYG���ǥ������',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',5,'��⡼�ȥ桼����ǧ��',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',6,'����¾',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollquestions']}
                (qid, question, voters, date
                , display, commentcode, statuscode
                , owner_id, group_id, perm_owner, perm_group) VALUES (
                'geeklogfeaturepoll','����ǽ�Ǥ���������ϡ�',0,NOW()
                ,1,0,0
                ,2,8,3,3)
                ";
            $retval[] = "
                UPDATE   {$_TABLES['blocks']} SET 
                title = '���󥱡���'
                WHERE name = 'polls_block'
                ";
            break;
        case  'forum Admin':
            // FORUM �֥�å������ܸ첽
            $retval[] = "
                UPDATE   {$_TABLES['blocks']} SET 
                title = '�Ǽ������'
                WHERE name = 'Forum News'
                ";
            $retval[] = "
                UPDATE   {$_TABLES['blocks']} SET 
                title = '�Ǽ��ĥ�˥塼'
                WHERE name = 'forum_menu'
                ";
            break;
//
        default:
            $retval="";
    }

    return $retval;
}

?>
