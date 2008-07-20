<?php
// +---------------------------------------------------------------------------+
// | プラグインの管理グループ記述を日本語版化する                              |
// |  grpdescr_updatejp.php から require                                       |
// +---------------------------------------------------------------------------+
// $Id: grpdescr_japanese.php
// もし万一エンコードの種類が  EUCでない場合は、EUCに変換してください。
// 最終更新日　2007/03/21 tsuchi AT geeklog DOT jp

function grpdescr( $grp_name )
{
    $retval="";
    switch($grp_name) {
        case 'Calendar Admin':
            $retval = 'カレンダ管理へのアクセス';
            break;
        case  'dbman Admin':
            $retval = 'dbman管理へのアクセス';
            break;
        case  'filemgmt Admin':
            $retval = 'ファイル管理へのアクセス';
            break;
        case  'forum Admin':
            $retval = '掲示板管理へのアクセス';
            break;
        case  'Links Admin':
            $retval = 'リンク管理へのアクセス';
            break;
        case  'Polls Admin':
            $retval = '投票管理へのアクセス';
            break;
        case  'spamx Admin':
            $retval = 'スパム管理へのアクセス';
            break;
        case  'Static Page Admin':
            $retval = '静的ページ管理へのアクセス';
            break;
        case  'themedit Admin':
            $retval = 'テーマエディタ管理へのアクセス';
            break;
        case  'userconfig Admin':
            $retval = 'コンフィグエディタ管理へのアクセス';
            break;
        case  'jpmail Admin':
            $retval = '日本語メール管理へのアクセス';
            break;
        case  'nmoxmenu Admin':
            $retval = '2階層メニュー管理へのアクセス';
            break;
//
        case  'nmoxqrblock Admin':
            $retval = 'QRコード表示管理へのアクセス';
            break;
        case  'nmoxguestbook Admin':
            $retval = 'ゲストブック管理へのアクセス';
            break;
        case  'nmoxtopicown Admin':
            $retval = '話題譲渡管理へのアクセス';
            break;
        case  'nmoxmarng Admin':
            $retval = 'プラグインメニュー並び替え管理へのアクセス';
            break;
        case  'nmoxscheduler Admin':
            $retval = '集計機能付スケジューラ管理へのアクセス';
            break;
        case  'Autotags Admin':
            $retval = '自動タグ管理へのアクセス';
            break;
        case  'nmoxcomments Admin':
            $retval = 'コメント管理へのアクセス';
            break;
//
        default:
            $retval="";
    }
    return $retval;
}

?>
