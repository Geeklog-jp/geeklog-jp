<?php
// +---------------------------------------------------------------------------+
// | �ץ饰����δ������롼�׵��Ҥ����ܸ��ǲ�����                              |
// |  updatetablesjp_groups.php ���� require                                   |
// |  SQLʸ�ǡ���                                                              |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_groups.php
// �⤷���쥨�󥳡��ɤμ��ब  euc�Ǥʤ����ϡ�euc���Ѵ����Ƥ���������
// �ǽ���������2007/03/21 tsuchi AT geeklog DOT jp

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�����������ؤΥ�������'
    WHERE grp_name = 'Calendar Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'dbman�����ؤΥ�������'
    WHERE grp_name = 'dbman Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�ե���������ؤΥ�������'
    WHERE grp_name = 'filemgmt Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�Ǽ��Ĵ����ؤΥ�������'
    WHERE grp_name = 'forum Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�Ǽ��Ĵ����ؤΥ�������'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��󥯴����ؤΥ�������'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��ɼ�����ؤΥ�������'
    WHERE grp_name = 'Polls Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���ѥ�����ؤΥ�������'
    WHERE grp_name = 'spamx Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��Ū�ڡ��������ؤΥ�������'
    WHERE grp_name = 'Static Page Admin'
    ";


$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�ơ��ޥ��ǥ��������ؤΥ�������'
    WHERE grp_name = 'themedit Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '����ե������ǥ��������ؤΥ�������'
    WHERE grp_name = 'userconfig Admin'
    ";

?>
