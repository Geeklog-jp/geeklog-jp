<?php
// +---------------------------------------------------------------------------+
// | �ץ饰����δ������롼�׵��Ҥ����ܸ��ǲ�����                              |
// |  grpdescr_updatejp.php ���� require                                       |
// +---------------------------------------------------------------------------+
// $Id: grpdescr_japanese.php
// �⤷���쥨�󥳡��ɤμ��ब  EUC�Ǥʤ����ϡ�EUC���Ѵ����Ƥ���������
// �ǽ���������2007/03/21 tsuchi AT geeklog DOT jp

function grpdescr( $grp_name )
{
    $retval="";
    switch($grp_name) {
        case 'Calendar Admin':
            $retval = '�����������ؤΥ�������';
            break;
        case  'dbman Admin':
            $retval = 'dbman�����ؤΥ�������';
            break;
        case  'filemgmt Admin':
            $retval = '�ե���������ؤΥ�������';
            break;
        case  'forum Admin':
            $retval = '�Ǽ��Ĵ����ؤΥ�������';
            break;
        case  'Links Admin':
            $retval = '��󥯴����ؤΥ�������';
            break;
        case  'Polls Admin':
            $retval = '��ɼ�����ؤΥ�������';
            break;
        case  'spamx Admin':
            $retval = '���ѥ�����ؤΥ�������';
            break;
        case  'Static Page Admin':
            $retval = '��Ū�ڡ��������ؤΥ�������';
            break;
        case  'themedit Admin':
            $retval = '�ơ��ޥ��ǥ��������ؤΥ�������';
            break;
        case  'userconfig Admin':
            $retval = '����ե������ǥ��������ؤΥ�������';
            break;
        case  'jpmail Admin':
            $retval = '���ܸ�᡼������ؤΥ�������';
            break;
        case  'nmoxmenu Admin':
            $retval = '2���إ�˥塼�����ؤΥ�������';
            break;
//
        case  'nmoxqrblock Admin':
            $retval = 'QR������ɽ�������ؤΥ�������';
            break;
        case  'nmoxguestbook Admin':
            $retval = '�����ȥ֥å������ؤΥ�������';
            break;
        case  'nmoxtopicown Admin':
            $retval = '������ϴ����ؤΥ�������';
            break;
        case  'nmoxmarng Admin':
            $retval = '�ץ饰�����˥塼�¤��ؤ������ؤΥ�������';
            break;
        case  'nmoxscheduler Admin':
            $retval = '���׵�ǽ�ե������塼������ؤΥ�������';
            break;
        case  'Autotags Admin':
            $retval = '��ư���������ؤΥ�������';
            break;
        case  'nmoxcomments Admin':
            $retval = '�����ȴ����ؤΥ�������';
            break;
//
        default:
            $retval="";
    }
    return $retval;
}

?>
