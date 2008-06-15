<?php
// +---------------------------------------------------------------------------+
// | テーブル構造とデータを日本語版化する                                      |
// |  SQL文データ　テーブル構造とシステム用データ                              |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_utf-8.php
// last update : 2007/06/14 maruyo AT geeklog DOT jp

// frontpagecodes  name varchar(32) → varchar(42)
$_SQL[] = "
    ALTER TABLE {$_TABLES['frontpagecodes']} MODIFY
    name varchar(42) DEFAULT null
    ";

// events  zipcode varchar(5) → varchar(8)
$_SQL[] = "
    ALTER TABLE {$_TABLES['events']} MODIFY
    zipcode varchar(8) DEFAULT null
    ";

// eventsubmission  zipcode varchar(5) → varchar(8)
$_SQL[] = "
    ALTER TABLE {$_TABLES['eventsubmission']} MODIFY
    zipcode varchar(8) DEFAULT null
    ";

// username varchar(16) → carchar(108) gl_users
$_SQL[] = "
    ALTER TABLE {$_TABLES['users']} MODIFY username varchar(108) NOT NULL default ''
    ";

// Anonymous → ゲストユーザ (users)
$_SQL[] = "
    DELETE FROM {$_TABLES['users']} Where uid=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['users']} (uid, passwd, username, fullname, email, homepage
    ,sig, regdate, cookietimeout, theme, status) 
    VALUES (1,'','ゲストユーザ','ゲストユーザ',NULL,NULL,'',NOW(),0,NULL,3)
    ";

// 初期記事日本語化
$_DATA[] = "
    DELETE FROM {$_TABLES['stories']} Where sid='welcome'
    ";

// 初期ブロックタイトル等日本語化
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = 'ユーザ情報'
    WHERE name = 'user_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = '管理メニュー'
    WHERE name = 'admin_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = '記事カテゴリ'
    WHERE name = 'section_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = 'アンケート'
    WHERE name = 'polls_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = 'イベント'
    WHERE name = 'events_block'
    ";

$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = '新着情報'
    WHERE name = 'whats_new_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = 'GeekLogについて'
    ,content = '<p><b>ようこそ、GeekLogへ！</b><p>Geeklogについてのサポートは、 <a href=\"http://www.geeklog.jp\">Geeklog Japanese</a>へ。ドキュメントは <a href=\"http://wiki.geeklog.jp\">Geeklog Wiki ドキュメント</a>をどうぞ。'
    WHERE name = 'first_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = 'オンラインユーザ'
    WHERE name = 'whosonline_block'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['blocks']} SET
    title = '過去記事'
    WHERE name = 'older_stories'
    ";

// commentcodes　name　日本語化
$_DATA[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = 0
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = -1
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = 1
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name)
    VALUES (0,'コメントを許可する')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name)
    VALUES (-1,'コメントを許可しない')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name)
    VALUES (1,'コメントの受付を終了')
    ";

// コメント表示モード（commentmodes）日本語化
$_DATA[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'flat'
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'nested'
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'threaded'
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['commentmodes']} Where mode = 'nocomment'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('flat','フラット表示')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('nested','ネスト表示')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('threaded','スレッド表示')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('nocomment','コメントを隠す')
    ";

//イベントの日本語化
$_DATA[] = "DELETE FROM {$_TABLES['eventsubmission']} Where eid='2006051410130162'";

$_DATA[] = "INSERT INTO {$_TABLES['eventsubmission']} (eid, title, description, location, datestart, dateend, url, allday, zipcode, state, city, address2, address1, event_type, timestart, timeend) VALUES ('2006051410130162','Geeklogがインストールされました','今日Geeklogのインストールに成功しました','Your webserver(未訳)',CURDATE(),CURDATE(),'http://www.geeklog.jp/',1,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL) ";

// (featurecodes) 日本語化
$_DATA[] = "DELETE FROM {$_TABLES['featurecodes']} Where code=0";
$_DATA[] = "DELETE FROM {$_TABLES['featurecodes']} Where code=1";
$_DATA[] = "INSERT INTO {$_TABLES['featurecodes']} (code, name) VALUES (0,'通常記事')";
$_DATA[] = "INSERT INTO {$_TABLES['featurecodes']} (code, name) VALUES (1,'注目記事')";

// 権限Tooltips日本語化
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='ストーリーエディタへの権限' WHERE ft_id=1";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to moderate pending stories(未訳)' WHERE ft_id=2";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to moderate pending links(未訳)' WHERE ft_id=3";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to links editor(未訳)' WHERE ft_id=4";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to user editor(未訳)' WHERE ft_id=5";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to delete a user(未訳)' WHERE ft_id=6";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to send email to members(未訳)' WHERE ft_id=7";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to moderate pending events(未訳)' WHERE ft_id=8";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to event editor(未訳)' WHERE ft_id=9";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to block editor(未訳)' WHERE ft_id=10";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to topic editor(未訳)' WHERE ft_id=11";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to polls editor(未訳)' WHERE ft_id=12";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to plugin editor(未訳)' WHERE ft_id=13";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to edit groups(未訳)' WHERE ft_id=14";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to delete groups(未訳)' WHERE ft_id=15";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to delete a block(未訳)' WHERE ft_id=16";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to edit a static page(未訳)' WHERE ft_id=17";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to delete static pages(未訳)' WHERE ft_id=18";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='May skip the story submission queue(未訳)' WHERE ft_id=19";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='May skip the links submission queue(未訳)' WHERE ft_id=20";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='May skip the event submission queue(未訳)' WHERE ft_id=21";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability use PHP in static pages(未訳)' WHERE ft_id=22";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Full access to Spam-X plugin(未訳)' WHERE ft_id=23";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Ability to send pings, pingbacks, or trackbacks for stories(未訳)' WHERE ft_id=24";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='Access to Content Syndication(未訳)' WHERE ft_id=25";
$_DATA[] = "UPDATE {$_TABLES['features']} SET ft_descr='May use Atompub Webservices (if restricted)(未訳)' WHERE ft_id=26";

// frontpagecodes　name　日本語化
$_DATA[] = "UPDATE {$_TABLES['frontpagecodes']} SET name='各Topicsにのみ表示する' WHERE code=0";
$_DATA[] = "UPDATE {$_TABLES['frontpagecodes']} SET name='ホームにも表示する' WHERE code=1";

// グループ説明日本語化
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'すべての管理へのアクセス'
    WHERE grp_name = 'Root'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'すべてのユーザ'
    WHERE grp_name = 'All Users'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = '記事管理へのアクセス'
    WHERE grp_name = 'Story Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'ブロック管理へのアクセス'
    WHERE grp_name = 'Block Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'リンク管理へのアクセス'
    WHERE grp_name = 'Links Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = '話題管理へのアクセス'
    WHERE grp_name = 'Topic Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'カレンダ管理へのアクセス'
    WHERE grp_name = 'Calendar Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'アンケート管理へのアクセス'
    WHERE grp_name = 'Polls Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'ユーザ管理へのアクセス'
    WHERE grp_name = 'User Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'プラグイン管理へのアクセス'
    WHERE grp_name = 'Plugin Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'ユーザとグループ管理へのアクセス'
    WHERE grp_name = 'Group Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'メール管理へのアクセス'
    WHERE grp_name = 'Mail Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'すべての登録ユーザ'
    WHERE grp_name = 'Logged-in Users'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = '静的ページ管理へのアクセス'
    WHERE grp_name = 'Static Page Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'プラグイン管理へのアクセス'
    WHERE grp_name = 'spamx Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'リモートユーザ'
    WHERE grp_name = 'Remote Users'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'RSS配信管理へのアクセス'
    WHERE grp_name = 'Syndication Admin'
    ";
$_DATA[] = "
    UPDATE   {$_TABLES['groups']} SET
    grp_descr = 'WebAPI管理へのアクセス'
    WHERE grp_name = 'Webservices Users'
    ";

//    'geeklog-sites', 'site', 'Geeklog Sites', 'Sites using or related to the Geeklog CMS'
$_DATA[] = "
    DELETE FROM {$_TABLES['linkcategories']} Where cid='geeklog-sites'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['linkcategories']}
    (cid, pid, category, description, tid, created, modified, owner_id, group_id
    , perm_owner, perm_group, perm_members, perm_anon) VALUES (
    'geeklog-sites', 'site', 'Geeklog サイト', 'Sites using or related to the Geeklog CMS(未訳)'
    , NULL, NOW(), NOW(), 2, 5, 3, 3, 2, 2);
";

//    'geeklog.net', 'geeklog-sites', 'http://www.geeklog.net/'
//    , 'Visit the Geeklog homepage for support, FAQs, updates, add-ons, and a great community.'
//    , 'Geeklog Project Homepage'
$_DATA[] = "
    INSERT INTO {$_TABLES['links']}
    (lid, cid, url, description, title, hits, date, owner_id, group_id, perm_owner, perm_group, perm_members, perm_anon) VALUES (
    'geeklog.jp', 'geeklog-sites', 'http://www.geeklog.jp/'
    , 'Visit the Geeklog homepage for support, FAQs, updates, add-ons, and a great community.(未訳)'
    ,'Geeklog 日本公式サイト'
    , 123, NOW(), 1, 5, 3, 3, 2, 2);
    ";

$_DATA[] = "UPDATE {$_TABLES['maillist']} SET name='Don\'t Email(未訳)' WHERE code=0";
$_DATA[] = "UPDATE {$_TABLES['maillist']} SET name='Email Headlines Each Night(未訳)' WHERE code=1";

// 日本語Pingサイト追加（pingservice）
$_DATA[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://pingomatic.com/'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'BlogPeople',  'http://www.blogpeople.net/'
    ,'http://www.blogpeople.net/servlet/weblogUpdates', 'weblogUpdates.ping', 1)
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'ping.bloggers.jp', 'http://ping.bloggers.jp/'
    , 'http://ping.bloggers.jp/rpc/', 'weblogUpdates.ping', 1)
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'Myblog Japan', 'http://www.myblog.jp/'
    , 'http://ping.myblog.jp/', 'weblogUpdates.ping', 1)
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['pingservice']} 
    (pid, name, site_url, ping_url, method, is_enabled)
    VALUES (NULL, 'ｇｏｏブログ', 'http://blog.goo.ne.jp/'
    , 'http://blog.goo.ne.jp/XMLRPC', 'weblogUpdates.ping', 1)
    ";


// 初期アンケートの日本語化
$_DATA[] = "
    DELETE FROM {$_TABLES['pollanswers']} Where pid='geeklogfeaturepoll'
    ";
//    'geeklogfeaturepoll', 0, 1, 'MS SQL support', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 0, 1, 'MS SQLのサポート', 0, '');
    ";

//    'geeklogfeaturepoll', 0, 2, 'Multi-language support', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 0, 2, '多言語のサポート', 0, '');
    ";

//    'geeklogfeaturepoll', 0, 3, 'Calendar as a plugin', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 0, 3, 'プラグインのカレンダー', 0, '');
    ";

//    'geeklogfeaturepoll', 0, 4, 'SLV spam protection', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 0, 4, 'SLVスパムプロテクション', 0, '');
    ";

//    'geeklogfeaturepoll', 0, 5, 'Mass-delete users', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 0, 5, 'Mass-delete users(未訳)', 0, '');
    ";

//    'geeklogfeaturepoll', 0, 6, 'Other', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 0, 6, 'それ以外', 0, '');
    ";

//    'geeklogfeaturepoll', 1, 1, 'Story-Images', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 1, 1, 'Story-Images(未訳)', 0, '');
    ";

//    'geeklogfeaturepoll', 1, 2, 'User-Rights handling', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 1, 2, 'User-Rights handling(未訳)', 0, '');
    ";

//    'geeklogfeaturepoll', 1, 3, 'The Support', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 1, 3, 'The Support(未訳)', 0, '');
    ";

//    'geeklogfeaturepoll', 1, 4, 'Plugin Availability', 0, '');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollanswers']}`
    (`pid`, `qid`, `aid`, `answer`, `votes`, `remark`) VALUES (
    'geeklogfeaturepoll', 1, 4, 'Plugin Availability(未訳)', 0, '');
    ";

$_DATA[] = "
    DELETE FROM {$_TABLES['pollquestions']} Where pid='geeklogfeaturepoll'
    ";
//    'What is the best new feature of Geeklog?');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollquestions']}`
    (`pid`, `qid`, `question`) VALUES ('geeklogfeaturepoll', 0,
    '新機能でお気に入りは？');
    ";

//    'What is the all-time best feature of Geeklog?');
$_DATA[] = "
    INSERT INTO `{$_TABLES['pollquestions']}`
    (`pid`, `qid`, `question`) VALUES ('geeklogfeaturepoll', 1,
    'What is the all-time best feature of Geeklog?(未訳)');
    ";

$_DATA[] = "
    DELETE FROM {$_TABLES['polltopics']} Where pid='geeklogfeaturepoll'
    ";

//    , 'Tell us your opinion about Geeklog'
$_DATA[] = "
    INSERT INTO {$_TABLES['polltopics']}
    (pid, topic, voters, questions, date, display, is_open
    , hideresults, commentcode, statuscode, owner_id
    , group_id, perm_owner, perm_group, perm_members, perm_anon) VALUES ('geeklogfeaturepoll'
    , 'あなたのGeeklogに対するご意見をお聞かせください'
    , 0, 2, '2007-01-16 12:24:22', 1, 1, 1, 0, 0, 2, 8, 3, 2, 2, 2);
    ";

// 投稿モード(postmodes) 日本語化
$_DATA[] = "
    DELETE FROM {$_TABLES['postmodes']} Where code='plaintext'
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['postmodes']} Where code='html'
    ";
$_DATA[] = "
    INSERT INTO  {$_TABLES['postmodes']} (code, name)
    VALUES ('plaintext','テキストモード')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['postmodes']} (code, name)
    VALUES ('html','ＨＴＭＬモード')
    ";

// コメント順（sortcodes) 日本語化
$_DATA[] = "
    DELETE FROM {$_TABLES['sortcodes']} Where code='ASC'
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['sortcodes']} Where code='DESC'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['sortcodes']} (code, name)
    VALUES ('ASC','書き込み順')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['sortcodes']} (code, name)
    VALUES ('DESC','新着順')
    ";

//
$_DATA[] = "UPDATE {$_TABLES['statuscodes']} SET name='Refreshing(未訳)' WHERE code=1";
$_DATA[] = "UPDATE {$_TABLES['statuscodes']} SET name='Normal(未訳)' WHERE code=0";
$_DATA[] = "UPDATE {$_TABLES['statuscodes']} SET name='Archive(未訳)' WHERE code=10";

//    'welcome',2,0,'Geeklog',NOW(),'Welcome to Geeklog!'
//    ,'<p>Welcome and let me be the first to congratulate you on installing Geeklog. Please take the time to read everything in the <a href=\"docs/index.html\">docs directory</a>. Geeklog now has enhanced, user-based security.  You should thoroughly understand how these work before you run a production Geeklog Site.</p>\r<p>To log into your new Geeklog site, please use this account:</p>\r<p>Username: <b>Admin</b><br />\rPassword: <b>password</b></p><p><b>And don\'t forget to <a href=\"{$_CONF['site_url']}/usersettings.php?mode=edit\">change your password</a> after logging in!</b></p>'
$_DATA[] = "
    INSERT INTO {$_TABLES['stories']}
    (sid, uid, draft_flag, tid, date, title, introtext, bodytext, hits
    , numemails, comments, related, featured, commentcode, statuscode
    , postmode, frontpage, owner_id, group_id, perm_owner, perm_group
    , perm_members, perm_anon) VALUES (
    'welcome',2,0,'Geeklog',NOW(),'Geeklogへようこそ！'
    ,'<p>無事インストールが完了したようですね。おめでとうございます。できれば、<a href=\"docs/index.html\">docs ディレクトリ</a>のすべての文書に一通り目を通しておいてください。Geeklogは、ユーザーを中心としたセキュリティモデルを実装しています。Geeklogを管理・運用するためには、この仕組みを理解する必要があります。\r\r<p>Adminはすべてにアクセスできます。パスワードは<b>password</b>です。'
    ,'',100,1,0,'',1,0,0,'html',1,2,3,3,2,2,2)
    ";

//$_DATA[] = "INSERT INTO {$_TABLES['storysubmission']} (sid, uid, tid, title, introtext, date, postmode) VALUES ('security-reminder',2,'Geeklog','Are you secure?','<p>This is a reminder to secure your site once you have Geeklog up and running. What you should do:</p>\r\r<ol>\r<li>Change the default password for the Admin account.</li>\r<li>Remove the install directory (you won\'t need it any more).</li>\r</ol>',NOW(),'html') ";

//$_DATA[] = "INSERT INTO {$_TABLES['syndication']} (type, topic, header_tid, format, limits, content_length, title, description, filename, charset, language, is_enabled, updated, update_info) VALUES ('geeklog', '::all', 'all', 'RSS-2.0', 10, 1, 'Geeklog Site', 'Another Nifty Geeklog Site', 'geeklog.rss', 'iso-8859-1', 'en-gb', 1, '0000-00-00 00:00:00', NULL)";
$_DATA[] = "
    UPDATE {$_TABLES['syndication']} SET
    language = 'ja'
    ";
// utf-8 →euc-jp (syndication)
//$_DATA[] = "
//    ALTER TABLE {$_TABLES['syndication']} MODIFY
//    charset varchar(20) NOT NULL default 'euc-jp'
//    ";
$_DATA[] = "
    UPDATE {$_TABLES['syndication']} SET
    charset = 'UTF-8'
    ";

//
$_DATA[] = "UPDATE {$_TABLES['topics']} SET topic='ニュース' WHERE tid='General'";
$_DATA[] = "UPDATE {$_TABLES['topics']} SET topic='Geeklog' WHERE tid='Geeklog'";

#
# Dumping data for table 'users'
#

// vars last_scheduled_run value = 0
$_DATA[] = "UPDATE {$_TABLES['vars']} SET value = '0' WHERE name = 'last_scheduled_run' AND value = ''";

// trackbackcodes 日本語化
$_DATA[] = "DELETE FROM {$_TABLES['trackbackcodes']} Where code=0";
$_DATA[] = "DELETE FROM {$_TABLES['trackbackcodes']} Where code=-1";
$_DATA[] = "
    INSERT INTO {$_TABLES['trackbackcodes']} (code, name)
    VALUES (0,'トラックバック許可')
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['trackbackcodes']} (code, name)
    VALUES (-1,'トラックバック不可')
    ";

// メールで記事投稿用
/*$_DATA[] = "
    INSERT IGNORE INTO {$_TABLES['topics']} VALUES (
    'NewTopic', 'メール記事投稿用', '', 100, 0, 0, 0, 3, 4, 3, 2, 0, 0)
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='toukou'
    ";
$_DATA[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='photomail'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['blocks']}
    (bid, is_enabled, name, type, title, tid, blockorder
    , content, rdfurl, rdfupdated, rdflimit, onleft, phpblockfn
    , help, owner_id, group_id, perm_owner, perm_group
    , perm_members, perm_anon) VALUES (
    NULL, 1, 'photomail', 'normal', 'メール投稿受信', 'homeonly', 70
    , '<img src=\"photomail/photomailimg.php\" width=\"1\" height=\"1\" alt=\"\" />'
    , '', '0000-00-00 00:00:00', 0, 1, '', '', 2, 3, 3, 3, 0, 0)
    ";
// テーマのお試し
$_DATA[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='themetester'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['blocks']}
    (bid, is_enabled, name, type, title, tid, blockorder
    , content, rdfurl, rdfupdated, rdflimit, onleft, phpblockfn
    , help, owner_id, group_id, perm_owner, perm_group
    , perm_members, perm_anon) VALUES (
    NULL, 1, 'themetester', 'phpblock', 'テーマのお試し', 'all', 70
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_themetester', '', 2, 4, 3, 2, 2, 2) 
    ";
// サイトカレンダ
$_DATA[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='mycal'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'mycal', 'phpblock', 'サイトカレンダ', 'all', 70
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_mycaljp', '', 2, 4, 3, 2, 2, 2) 
    ";
// 多言語切り替え
$_DATA[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='maltilang'
    ";
$_DATA[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'maltilang', 'phpblock', '多言語切り替え', 'all', 80
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_switch_language', '', 2, 4, 3, 2, 2, 2) 
    ";
*/

// プラグイン
/*
$_PLUGIN[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'dbman管理へのアクセス'
    WHERE grp_name = 'dbman Admin'
    ";

$_PLUGIN[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'テーマエディタ管理へのアクセス'
    WHERE grp_name = 'themedit Admin'
    ";

$_PLUGIN[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'コンフィグエディタ管理へのアクセス'
    WHERE grp_name = 'userconfig Admin'
    ";
*/

?>
