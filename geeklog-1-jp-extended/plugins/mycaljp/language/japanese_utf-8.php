<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Site Calendar Plugin 'mycaljp' version 2.0.0                      |
// | Only Supported with Geeklog 1.4.1 and new Search Class                    |
// +---------------------------------------------------------------------------+
// | language/japanese_utf-8.php                                               |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2007 by the following authors:                         |
// | Geeklog Author:       Tony Bibbs   - tony@tonybibbs.com                   |
// | mycal Block Author:   Blaine Lang  - geeklog@langfamily.ca                |
// | mycaljp Plugin Author: Yoshinori Tahara - dengen                          |
// | Original PHP Calendar by Scott Richardson - srichardson@scanonline.com    |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is free software; you can redistribute it and/or             |
// | modify it under the terms of the GNU General Public License               |
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the             |
// | GNU General Public License for more details.                              |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+
//

$LANG_MYCALJP = array (
    'plugin'            => 'mycaljpプラグイン',
    'access_denied'     => 'アクセスは拒否されました。',
    'access_denied_msg' => 'このページにアクセスできるのは，Rootユーザだけです。あなたのユーザ名とIPアドレスは記録されました。',
    'admin'             => 'サイトカレンダ mycaljp の管理',
    'install_header'    => 'サイトカレンダ mycaljp プラグインのインストール/アンインストール',
    'installed'         => 'サイトカレンダ mycaljp プラグインはインストールされています。',
    'uninstalled'       => 'サイトカレンダ mycaljp プラグインはインストールされていません。',
    'install_success'   => 'サイトカレンダ mycaljp プラグインのインストールに成功しました。',
    'install_failed'    => 'サイトカレンダ mycaljp プラグインのインストールに失敗しました。詳細はエラーログ(error.log)をご覧ください。',
    'uninstall_msg'     => 'サイトカレンダ mycaljp プラグインはアンインストールされました。',
    'install'           => 'インストール',
    'uninstall'         => 'アンインストール',
    'warning'           => '警告！　サイトカレンダ mycaljp プラグインは有効なままです。',
    'enabled'           => 'アンインストールする前に，サイトカレンダ mycaljp プラグインを無効にしてください。',
    'readme'            => 'ちょっと待って！　「インストール」をクリックする前に，お読みください：',
    'installdoc'        => 'インストール手順書',
    
    'blocktitle'        => 'ブロックタイトル',
    'selecttemplates'   => 'テンプレートの選択',
    'checkcontents'     => 'チェック対象のコンテンツ',
    'showholiday'       => '土・日・休日を色分け表示する',
    'checkjpholiday'    => '日本の休日を調べる',
    'headertitleyear'   => 'ヘッダタイトル（年）',
    'headertitlemonth'  => 'ヘッダタイトル（月）',
    'wdays'             => '曜日タイトル',
    'enablesrblocks'    => '右サイドバーを表示する',
    'showstoriesintro'  => '記事のイントロを表示する',
    'prevmonth'         => '先月へ',
    'nextmonth'         => '翌月へ',
    'skipcalendar'      => 'サイトカレンダをスキップ',
    'headeroflink'      => '',
    'footeroflink'      => 'のコンテンツ',
    'yes'               => 'はい',
    'no'                => 'いいえ',
    'titleorder'        => 'ヘッダタイトルの順序',
    'year_month'        => '年 月',
    'month_year'        => '月 年',
    'sunday'            => '日',
    'monday'            => '月',
    'tuesday'           => '火',
    'wednesday'         => '水',
    'thursday'          => '木',
    'friday'            => '金',
    'saturday'          => '土',

    'infotitleyear'     => '"Y"  年．4 桁の数字．(例: 1999または2003)<br' . XHTML . '>' .
                           '"y"  年．2 桁の数字．(例: 99 または 03)',
    'infotitlemonth'    => '"m"  月．数字。先頭にゼロをつける．(01 から 12)<br' . XHTML . '>' .
                           '"n"  月．数字。先頭にゼロをつけない．(1 から 12)<br' . XHTML . '>' .
                           '"F"  月．フルスペルの文字．(January から December)<br' . XHTML . '>' .
                           '"M"  月．3 文字形式．(Jan から Dec)',
    'applythemetmplate' => 'テーマ提供テンプレートの適用',
    'infoapplythemetemp' => 'テーマで提供されるmycaljp用テンプレートを検索し<br' . XHTML . '>' .
                           '見つかった場合はそれを適用します。<br' . XHTML . '>' .
                           '見つからなかった場合は標準テンプレートを使用します。<br' . XHTML . '>' .
                           '(テーマ側のサポートが必要です。)',
    
    'headerofdate'      => '',
    'middleofdate'      => ' ～ ',
    'footerofdate'      => ' の検索結果',
);

?>