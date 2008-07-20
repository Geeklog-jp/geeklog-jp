<?php
// +---------------------------------------------------------------------------+
// | �ơ��֥빽¤�ȥǡ��������ܸ��ǲ�����                                      |
// |  SQLʸ�ǡ���1���ơ��֥빽¤�ȥ����ƥ��ѥǡ���                             |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_1.php
// �⤷���쥨�󥳡��ɤμ��ब  euc�Ǥʤ����ϡ�euc���Ѵ����Ƥ���������
// �ǽ���������2007/05/21 tsuchi AT geeklog DOT jp

// (01) en-gb ��ja data (syndication)
$_SQL[] = "
    ALTER TABLE {$_TABLES['syndication']} MODIFY 
    language varchar(20) NOT NULL default 'ja'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['syndication']} SET 
    language = 'ja'
    ";

// (02) frontpagecodes  name varchar(32) �� varchar(42)
$_SQL[] = "
    ALTER TABLE {$_TABLES['frontpagecodes']} MODIFY 
    name varchar(42) DEFAULT null
    ";

// (03) frontpagecodes��name�����ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['frontpagecodes']} Where code=0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['frontpagecodes']} Where code=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['frontpagecodes']} (code, name) 
    VALUES (0,'��Topics�ˤΤ�ɽ������') 
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['frontpagecodes']} (code, name) 
    VALUES (1,'�ۡ���ˤ�ɽ������') 
    ";

// (04) commentcodes��name�����ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = 0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = -1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name) 
    VALUES (0,'�����Ȥ���Ĥ���')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name) 
    VALUES (-1,'�����Ȥ���Ĥ��ʤ�')
    ";

// (06) username varchar(36) �� carchar(108) gl_users
$_SQL[] = "
    ALTER TABLE {$_TABLES['users']} MODIFY username varchar(108) NOT NULL default ''
    ";

// (05) Anonymous �� �����ȥ桼�� (users)
$_SQL[] = "
    DELETE FROM {$_TABLES['users']} Where uid=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['users']} (uid, username, fullname, passwd, email, homepage
    ,sig, regdate, cookietimeout, theme, status) 
    VALUES (1,'�����ȥ桼��','�����ȥ桼��','',NULL,NULL,'',NOW(),0,NULL,3)
    ";

// (07) (featurecodes) ���ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['featurecodes']} Where code=0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['featurecodes']} Where code=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['featurecodes']} (code, name) VALUES (0,'�̾ﵭ��')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['featurecodes']} (code, name) VALUES (1,'���ܵ���')
    ";

// (08) (trackbackcodes) ���ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['trackbackcodes']} Where code=0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['trackbackcodes']} Where code=-1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['trackbackcodes']} (code, name)
    VALUES (0,'�ȥ�å��Хå�����')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['trackbackcodes']} (code, name)
    VALUES (-1,'�ȥ�å��Хå��Բ�')
    ";

// (09) ��ƥ⡼��(postmodes) ���ܸ첽
$_SQL[] = "
    DELETE FROM {$_TABLES['postmodes']} Where code='plaintext'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['postmodes']} Where code='html'
    ";
$_SQL[] = "
    INSERT INTO  {$_TABLES['postmodes']} (code, name)
    VALUES ('plaintext','�ƥ����ȥ⡼��')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['postmodes']} (code, name)
    VALUES ('html','�ȣԣ̥ͣ⡼��')
    ";

// (10)�����Ƚ��sortcodes) ���ܸ첽 
$_SQL[] = "
    DELETE FROM {$_TABLES['sortcodes']} Where code='ASC'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['sortcodes']} Where code='DESC'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['sortcodes']} (code, name)
    VALUES ('ASC','�񤭹��߽�')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['sortcodes']} (code, name)
    VALUES ('DESC','�����')
    ";

// (11) ������ɽ���⡼�ɡ�commentmodes�����ܸ첽 
$_SQL[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'flat'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'nested'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'threaded'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'nocomment'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('flat','�ե�å�ɽ��')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('nested','�ͥ���ɽ��')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('threaded','����å�ɽ��')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('nocomment','�����Ȥ򱣤�')
    ";

// (12) ���ܸ�Ping�������ɲá�pingservice�� 
$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where 
    site_url = 'http://www.blogpeople.net/'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'BlogPeople',  'http://www.blogpeople.net/'
    ,'http://www.blogpeople.net/servlet/weblogUpdates', 'weblogUpdates.ping', 1)
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://ping.bloggers.jp/'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'ping.bloggers.jp', 'http://ping.bloggers.jp/'
    , 'http://ping.bloggers.jp/rpc/', 'weblogUpdates.ping', 1)
    ";

$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://www.myblog.jp/'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'Myblog Japan', 'http://www.myblog.jp/'
    , 'http://ping.myblog.jp/', 'weblogUpdates.ping', 1)
    ";

$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://ping.cocolog-nifty.com/'
    ";

$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://blog.goo.ne.jp/'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, '��oo���֥�', 'http://blog.goo.ne.jp/'
    , 'http://blog.goo.ne.jp/XMLRPC', 'weblogUpdates.ping', 1)
    ";

$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://exblog.jp/'
    ";

// (13)  utf-8 ��euc-jp (syndication)
$_SQL[] = "
    ALTER TABLE {$_TABLES['syndication']} MODIFY 
    charset varchar(20) NOT NULL default 'euc-jp'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['syndication']} SET 
    charset = 'euc-jp'
    ";

// (14) events  zipcode varchar(5) �� varchar(8)
$_SQL[] = "
    ALTER TABLE {$_TABLES['events']}  MODIFY
    zipcode varchar(8) DEFAULT null
    ";

// (15) eventsubmission  zipcode varchar(5) �� varchar(8)
$_SQL[] = "
    ALTER TABLE {$_TABLES['eventsubmission']} MODIFY
    zipcode varchar(8) DEFAULT null
    ";
// (16) events  zipcode varchar(5) �� varchar(8)
$_SQL[] = "
    ALTER TABLE  {$_TABLES['events']} MODIFY 
    zipcode varchar(8) DEFAULT null
    ";

// (17) vars last_scheduled_run value = 0
$_SQL[] = "
    UPDATE   {$_TABLES['vars']} SET 
    value = '0'
    WHERE name = 'last_scheduled_run' AND  value = ''
    ";

// (18) ����֥�å������ȥ������ܸ첽
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '�桼������'
    WHERE name = 'user_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '���������ѥ�˥塼'
    WHERE name = 'admin_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '�������ƥ���'
    WHERE name = 'section_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '���󥱡���'
    WHERE name = 'polls_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '���٥��'
    WHERE name = 'events_block'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '�������'
    WHERE name = 'whats_new_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '����饤��桼��'
    WHERE name = 'whosonline_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '����'
    WHERE name = 'older_stories'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '�����奢�����å�'
    WHERE name = 'security_check'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'GeekLog�ˤĤ���'
    ,content = '<p><b>�褦������GeekLog�ء�</b><p>Geeklog�ˤĤ��ƤΥ��ݡ��Ȥϡ� <a href=\"http://www.geeklog.jp\">Geeklog Japanese</a>�ء��ɥ�����Ȥ� <a href=\"http://wiki.geeklog.jp\">Geeklog Wiki �ɥ������</a>��ɤ�����'
    WHERE name = 'first_block'
    ";

// (19) ���롼���������ܸ첽
$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���٤Ƥδ����ؤΥ�������'
    WHERE grp_name = 'Root'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���٤ƤΥ桼��'
    WHERE grp_name = 'All Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���������ؤΥ�������'
    WHERE grp_name = 'Story Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�֥�å������ؤΥ�������'
    WHERE grp_name = 'Block Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��󥯴����ؤΥ�������'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��������ؤΥ�������'
    WHERE grp_name = 'Topic Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���٥�ȴ����ؤΥ�������'
    WHERE grp_name = 'Event Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���󥱡��ȴ����ؤΥ�������'
    WHERE grp_name = 'Polls Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�桼�������ؤΥ�������'
    WHERE grp_name = 'User Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�ץ饰��������ؤΥ�������'
    WHERE grp_name = 'Plugin Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�桼���ȥ��롼�״����ؤΥ�������'
    WHERE grp_name = 'Group Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�᡼������ؤΥ�������'
    WHERE grp_name = 'Mail Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '���٤Ƥ���Ͽ�桼��'
    WHERE grp_name = 'Logged-in Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��Ū�ڡ��������ؤΥ�������'
    WHERE grp_name = 'Static Page Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�ץ饰��������ؤΥ�������'
    WHERE grp_name = 'spamx Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '��⡼�ȥ桼��'
    WHERE grp_name = 'Remote Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '�����������ؤΥ�������'
    WHERE grp_name = 'Calendar Admin'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'RSS�ۿ������ؤΥ�������'
    WHERE grp_name = 'Syndication Admin'
    ";
?>
