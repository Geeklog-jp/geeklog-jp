<?php
// +---------------------------------------------------------------------------+
// | テーブル構造とデータを日本語版化する                                      |
// |  SQL文データ1　テーブル構造とシステム用データ                             |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_1.php
// もし万一エンコードの種類が  eucでない場合は、eucに変換してください。
// 最終更新日　2007/05/21 tsuchi AT geeklog DOT jp

// (01) en-gb →ja data (syndication)
$_SQL[] = "
    ALTER TABLE {$_TABLES['syndication']} MODIFY 
    language varchar(20) NOT NULL default 'ja'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['syndication']} SET 
    language = 'ja'
    ";

// (02) frontpagecodes  name varchar(32) → varchar(42)
$_SQL[] = "
    ALTER TABLE {$_TABLES['frontpagecodes']} MODIFY 
    name varchar(42) DEFAULT null
    ";

// (03) frontpagecodes　name　日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['frontpagecodes']} Where code=0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['frontpagecodes']} Where code=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['frontpagecodes']} (code, name) 
    VALUES (0,'各Topicsにのみ表示する') 
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['frontpagecodes']} (code, name) 
    VALUES (1,'ホームにも表示する') 
    ";

// (04) commentcodes　name　日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = 0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['commentcodes']} Where code = -1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name) 
    VALUES (0,'コメントを許可する')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentcodes']} (code, name) 
    VALUES (-1,'コメントを許可しない')
    ";

// (06) username varchar(36) → carchar(108) gl_users
$_SQL[] = "
    ALTER TABLE {$_TABLES['users']} MODIFY username varchar(108) NOT NULL default ''
    ";

// (05) Anonymous → ゲストユーザ (users)
$_SQL[] = "
    DELETE FROM {$_TABLES['users']} Where uid=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['users']} (uid, username, fullname, passwd, email, homepage
    ,sig, regdate, cookietimeout, theme, status) 
    VALUES (1,'ゲストユーザ','ゲストユーザ','',NULL,NULL,'',NOW(),0,NULL,3)
    ";

// (07) (featurecodes) 日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['featurecodes']} Where code=0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['featurecodes']} Where code=1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['featurecodes']} (code, name) VALUES (0,'通常記事')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['featurecodes']} (code, name) VALUES (1,'注目記事')
    ";

// (08) (trackbackcodes) 日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['trackbackcodes']} Where code=0
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['trackbackcodes']} Where code=-1
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['trackbackcodes']} (code, name)
    VALUES (0,'トラックバック許可')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['trackbackcodes']} (code, name)
    VALUES (-1,'トラックバック不可')
    ";

// (09) 投稿モード(postmodes) 日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['postmodes']} Where code='plaintext'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['postmodes']} Where code='html'
    ";
$_SQL[] = "
    INSERT INTO  {$_TABLES['postmodes']} (code, name)
    VALUES ('plaintext','テキストモード')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['postmodes']} (code, name)
    VALUES ('html','ＨＴＭＬモード')
    ";

// (10)コメント順（sortcodes) 日本語化 
$_SQL[] = "
    DELETE FROM {$_TABLES['sortcodes']} Where code='ASC'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['sortcodes']} Where code='DESC'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['sortcodes']} (code, name)
    VALUES ('ASC','書き込み順')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['sortcodes']} (code, name)
    VALUES ('DESC','新着順')
    ";

// (11) コメント表示モード（commentmodes）日本語化 
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
    VALUES ('flat','フラット表示')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('nested','ネスト表示')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('threaded','スレッド表示')
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['commentmodes']} (mode, name)
    VALUES ('nocomment','コメントを隠す')
    ";

// (12) 日本語Pingサイト追加（pingservice） 
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
    VALUES (NULL, 'ｇoo　ブログ', 'http://blog.goo.ne.jp/'
    , 'http://blog.goo.ne.jp/XMLRPC', 'weblogUpdates.ping', 1)
    ";

$_SQL[] = "
    DELETE FROM {$_TABLES['pingservice']} Where
    site_url = 'http://exblog.jp/'
    ";

// (13)  utf-8 →euc-jp (syndication)
$_SQL[] = "
    ALTER TABLE {$_TABLES['syndication']} MODIFY 
    charset varchar(20) NOT NULL default 'euc-jp'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['syndication']} SET 
    charset = 'euc-jp'
    ";

// (14) events  zipcode varchar(5) → varchar(8)
$_SQL[] = "
    ALTER TABLE {$_TABLES['events']}  MODIFY
    zipcode varchar(8) DEFAULT null
    ";

// (15) eventsubmission  zipcode varchar(5) → varchar(8)
$_SQL[] = "
    ALTER TABLE {$_TABLES['eventsubmission']} MODIFY
    zipcode varchar(8) DEFAULT null
    ";
// (16) events  zipcode varchar(5) → varchar(8)
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

// (18) 初期ブロックタイトル等日本語化
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'ユーザ情報'
    WHERE name = 'user_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '管理者専用メニュー'
    WHERE name = 'admin_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '記事カテゴリ'
    WHERE name = 'section_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'アンケート'
    WHERE name = 'polls_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'イベント'
    WHERE name = 'events_block'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '新着情報'
    WHERE name = 'whats_new_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'オンラインユーザ'
    WHERE name = 'whosonline_block'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = '過去記事'
    WHERE name = 'older_stories'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'セキュアチェック'
    WHERE name = 'security_check'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['blocks']} SET 
    title = 'GeekLogについて'
    ,content = '<p><b>ようこそ、GeekLogへ！</b><p>Geeklogについてのサポートは、 <a href=\"http://www.geeklog.jp\">Geeklog Japanese</a>へ。ドキュメントは <a href=\"http://wiki.geeklog.jp\">Geeklog Wiki ドキュメント</a>をどうぞ。'
    WHERE name = 'first_block'
    ";

// (19) グループ説明日本語化
$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'すべての管理へのアクセス'
    WHERE grp_name = 'Root'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'すべてのユーザ'
    WHERE grp_name = 'All Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '記事管理へのアクセス'
    WHERE grp_name = 'Story Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ブロック管理へのアクセス'
    WHERE grp_name = 'Block Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'リンク管理へのアクセス'
    WHERE grp_name = 'Links Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '話題管理へのアクセス'
    WHERE grp_name = 'Topic Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'イベント管理へのアクセス'
    WHERE grp_name = 'Event Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'アンケート管理へのアクセス'
    WHERE grp_name = 'Polls Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ユーザ管理へのアクセス'
    WHERE grp_name = 'User Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'プラグイン管理へのアクセス'
    WHERE grp_name = 'Plugin Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'ユーザとグループ管理へのアクセス'
    WHERE grp_name = 'Group Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'メール管理へのアクセス'
    WHERE grp_name = 'Mail Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'すべての登録ユーザ'
    WHERE grp_name = 'Logged-in Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = '静的ページ管理へのアクセス'
    WHERE grp_name = 'Static Page Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'プラグイン管理へのアクセス'
    WHERE grp_name = 'spamx Admin'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'リモートユーザ'
    WHERE grp_name = 'Remote Users'
    ";

$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'カレンダ管理へのアクセス'
    WHERE grp_name = 'Calendar Admin'
    ";
$_SQL[] = "
    UPDATE   {$_TABLES['groups']} SET 
    grp_descr = 'RSS配信管理へのアクセス'
    WHERE grp_name = 'Syndication Admin'
    ";
?>
