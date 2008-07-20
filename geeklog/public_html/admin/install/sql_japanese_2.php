<?php
// +---------------------------------------------------------------------------+
// | テーブル構造とデータを日本語版化する                                      |
// |  SQL文データ2　日本語版初期登録データ                                     |
// +---------------------------------------------------------------------------+
// $Id: sql_japanese_2.php
// もし万一エンコードの種類が  eucでない場合は、eucに変換してください。
// 更新日　2007/02/19 tsuchi AT geeklog DOT jp
// 最終更新日　2008/01/29 tsuchi AT geeklog DOT jp

// 初期記事日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['stories']} Where sid='welcome'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['stories']} 
    (sid, uid, draft_flag, tid, date, title, introtext, bodytext, hits
    , numemails, comments, related, featured, commentcode, statuscode
    , postmode, frontpage, owner_id, group_id, perm_owner, perm_group
    , perm_members, perm_anon) VALUES (
    'welcome',2,0,'Geeklog',NOW(),'Geeklogへようこそ！'
    ,'<p>無事インストールが完了したようですね。おめでとうございます。できれば、<a href=\"docs/index.html\">docs ディレクトリ</a>のすべての文書に一通り目を通しておいてください。Geeklogは、ユーザーを中心としたセキュリティモデルを実装しています。Geeklogを管理・運用するためには、この仕組みを理解する必要があります。\r\r<p>Adminはすべてにアクセスできます。パスワードは<b>password</b>です。'
    ,'',100,1,0,'',1,0,0,'html',1,2,3,3,2,2,2)
    ";

// 日本公式サイトのリンク追加
$_SQL[] = "
    INSERT IGNORE INTO {$_TABLES['links']} 
    (lid, category, url
    , description, title, date, owner_id, group_id) VALUES (
    'geeklog.jp','Geeklog Sites','http://www.geeklog.jp/'
    ,'Geeklog 日本公式サイト','Geeklog Japanese',NOW(),1,5)
    ";

// 初期アンケートの日本語化
$_SQL[] = "
    DELETE FROM {$_TABLES['pollanswers']} Where qid='geeklogfeaturepoll'
    ";
$_SQL[] = "
    DELETE FROM {$_TABLES['pollquestions']} Where qid='geeklogfeaturepoll'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',1,'トラックバック',0)
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',2,'リンク集とアンケート',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',3,'管理者画面の改良',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',4,'WYSIWYGエディタ搭載',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',5,'リモートユーザー認証',0)
    ";

$_SQL[] = "
    INSERT INTO {$_TABLES['pollanswers']} 
    (qid, aid, answer, votes) VALUES (
    'geeklogfeaturepoll',6,'その他',0)
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['pollquestions']}
    (qid, question, voters, date
    , display, commentcode, statuscode
    , owner_id, group_id, perm_owner, perm_group) VALUES (
    'geeklogfeaturepoll','新機能でお気に入りは？',0,NOW()
    ,1,0,0
    ,2,8,3,3)
    ";

// メールで記事投稿用
$_SQL[] = "
    INSERT IGNORE INTO {$_TABLES['topics']} VALUES (
    'NewTopic', 'メール記事投稿用', '', 100, 0, 0, 0, 3, 4, 3, 2, 0, 0)
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
    NULL, 1, 'photomail', 'normal', 'メール投稿受信', 'homeonly', 70
    , '<img src=\"photomail/photomailimg.php\" width=\"1\" height=\"1\" alt=\"\" />'
    , '', '0000-00-00 00:00:00', 0, 1, '', '', 2, 3, 3, 3, 0, 0) 
    ";
// テーマのお試し
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='themetester'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'themetester', 'phpblock', 'テーマのお試し', 'all', 70
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_themetester', '', 2, 4, 3, 2, 2, 2) 
    ";
// サイトカレンダ
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='mycal'
    ";
$_SQL[] = "
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
$_SQL[] = "
    DELETE FROM {$_TABLES['blocks']} Where name='maltilang'
    ";
$_SQL[] = "
    INSERT INTO {$_TABLES['blocks']}
    (`bid`, `is_enabled`, `name`, `type`, `title`, `tid`, `blockorder`
    , `content`, `rdfurl`, `rdfupdated`, `rdflimit`, `onleft`, `phpblockfn`
    , `help`, `owner_id`, `group_id`, `perm_owner`, `perm_group`
    , `perm_members`, `perm_anon`) VALUES (
    NULL, 1, 'maltilang', 'phpblock', '多言語切り替え', 'all', 80
    , '', '', '0000-00-00 00:00:00', 0, 0
    , 'phpblock_switch_language', '', 2, 4, 3, 2, 2, 2) 
    ";

?>
