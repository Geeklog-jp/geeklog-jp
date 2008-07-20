<?php
// +---------------------------------------------------------------------------+
// | プラグインの管理グループ記述を日本語版化する                              |
// |  grpdescr_updatejp.php から require                                       |
// +---------------------------------------------------------------------------+
// $Id: grpdescr_japanese.php
// もし万一エンコードの種類が  eucでない場合は、eucに変換してください。
// 最終更新日　2007/08/22 tsuchi AT geeklog DOT jp

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
            // 日本公式サイトのリンク追加
            $retval[] = "
                INSERT IGNORE INTO {$_TABLES['links']} 
                (lid, category, url
                , description, title, date, owner_id, group_id) VALUES (
                'geeklog.jp','Geeklog Sites','http://www.geeklog.jp/'
                ,'Geeklog 日本公式サイト','Geeklog Japanese',NOW(),1,5)
                ";
            break;
        case  'Polls Admin':
            // 初期アンケートの日本語化
            $retval[] = "
                DELETE FROM {$_TABLES['pollanswers']} Where qid='geeklogfeaturepoll'
                ";
            $retval[] = "
                DELETE FROM {$_TABLES['pollquestions']} Where qid='geeklogfeaturepoll'
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',1,'トラックバック',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',2,'リンク集とアンケート',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',3,'管理者画面の改良',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',4,'WYSIWYGエディタ搭載',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',5,'リモートユーザー認証',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollanswers']} 
                (qid, aid, answer, votes) VALUES (
                'geeklogfeaturepoll',6,'その他',0)
                ";
            $retval[] = "
                INSERT INTO {$_TABLES['pollquestions']}
                (qid, question, voters, date
                , display, commentcode, statuscode
                , owner_id, group_id, perm_owner, perm_group) VALUES (
                'geeklogfeaturepoll','新機能でお気に入りは？',0,NOW()
                ,1,0,0
                ,2,8,3,3)
                ";
            $retval[] = "
                UPDATE   {$_TABLES['blocks']} SET 
                title = 'アンケート'
                WHERE name = 'polls_block'
                ";
            break;
        case  'forum Admin':
            // FORUM ブロックの日本語化
            $retval[] = "
                UPDATE   {$_TABLES['blocks']} SET 
                title = '掲示板投稿'
                WHERE name = 'Forum News'
                ";
            $retval[] = "
                UPDATE   {$_TABLES['blocks']} SET 
                title = '掲示板メニュー'
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
