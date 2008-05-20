<?php

###############################################################################
# japanese_utf-8.php
#
# This is the Japanese language file for the Geeklog Polls plugin
#
# Copyright (C) 2001 Tony Bibbs
# tony AT tonybibbs DOT com
# Copyright (C) 2005 Trinity Bays
# trinity93 AT gmail DOT com
# Tranlated by Geeklog Japanese group SaY and Ivy
#
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
#
###############################################################################
# Last Update 2007/10/03 by Ivy (Geeklog Japanese)

global $LANG32;

$LANG_POLLS = array(
    'polls'             => 'アンケート',
    'results'           => '結果',
    'pollresults'       => '投票結果',
    'votes'             => '投票',
    'vote'              => '投票する',
    'pastpolls'         => 'アンケートの一覧',
    'savedvotetitle'    => '投票が登録されました',
    'savedvotemsg'      => '今の投票が登録されました',
    'pollstitle'        => '募集中のアンケート',
    'polltopics'        => '他のアンケートを見る',
    'stats_top10'       => 'アンケート上位10位',
    'stats_topics'      => 'アンケートの質問',
    'stats_votes'       => '投票',
    'stats_none'        => 'このサイトにはアンケートがないか，まだ誰も投票していないようです。',
    'stats_summary'     => 'このシステムの質問(答え)',
    'open_poll'         => '投票可能',
    'answer_all'        => '残りのすべての質問にお答えください',
    'not_saved'         => '結果は保存されませんでした',
    'upgrade1'          => 'アンケートプラグインの新しいバージョンがインストールされました。',
    'upgrade2'          => 'アップグレードしてください。',
    'editinstructions'  => 'アンケートIDを入力してください。少なくとも1つの質問と2つの回答を用意してください。'
);

###############################################################################
# admin/plugins/polls/index.php

$LANG25 = array(
    1 => 'モード',
    2 => '主題と質問と少なくとも1つの回答を入力してください。',
    3 => '作成日時',
    4 => "アンケート（ %s ）が保存されました",
    5 => 'アンケートの編集',
    6 => 'アンケートID',
    7 => '(スペースを含まないこと)',
    8 => 'ホームページに表示する',
    9 => '主題',
    10 => '回答 / 投票数',
    11 => "アンケート( %s )の選択肢にエラーがありました",
    12 => "アンケート( %s )の質問項目にエラーがありました",
    13 => 'アンケートの作成',
    14 => '保存',
    15 => '中止',
    16 => '削除',
    17 => 'アンケートIDを入力してください',
    18 => 'アンケート一覧',
    19 => 'アンケートの削除・編集はタイトル左のアイコンをクリック，新規に作成する場合は「新規作成」をクリックしてください。タイトルをクリックするとアンケートを閲覧できます。',
    20 => '投票者',
    21 => 'アクセスが拒否されました',
    22 => "管理権限のないアンケートを編集しようとしました。この行為は記録されます。<a href=\"{$_CONF['site_admin_url']}/poll.php\">投票の管理画面</a>に戻ってください。",
    23 => '新規アンケート',
    24 => '管理画面',
    25 => 'はい',
    26 => 'いいえ',
    27 => '編集',
    28 => '検索',
    29 => '検索条件',
    30 => '表示件数',
    31 => '質問',
    32 => '質問のテキストを削除すると、アンケートから質問が削除されます。',
    33 => '投票可能',
    34 => '主題:',
    35 => 'このアンケートには',
    36 => 'さらに質問があります。',
    37 => '投票時は結果非公開',
    38 => 'アンケート実施中は，オーナーとルート管理者だけが結果を見ることができます。',
    39 => '主題は1つ以上の質問がある場合に表示されます。',
    40 => 'アンケートの結果を見る'
);

$PLG_polls_MESSAGE19 = 'アンケートが登録されました。';
$PLG_polls_MESSAGE20 = 'アンケートは削除されました。';

// Messages for the plugin upgrade
$PLG_polls_MESSAGE3001 = 'Plugin upgrade not supported.';
$PLG_polls_MESSAGE3002 = $LANG32[9];


// Localization of the Admin Configuration UI
$LANG_configsections['polls'] = array(
    'label' => 'アンケート',
    'title' => 'アンケートの設定'
);  

$LANG_confignames['polls'] = array(
    'pollsloginrequired' => '投票にはログインが必要？',
    'hidepollsmenu' => '投票メニューを隠す?',
    'maxquestions' => 'アンケート毎の質問数の上限',
    'maxanswers' => '質問ごとのオプション数の上限',
    'answerorder' => '状況の並び替え ...',
    'pollcookietime' => 'クッキーを使用して投票者を確認する',
    'polladdresstime' => 'IPアドレスを元に投票者を確認する',
    'delete_polls' => '所有者が削除されたらアンケートも削除する？',
    'aftersave' => '投票が保存された後の移動先',
    'default_permissions' => 'アンケートの標準パーミッション'
);

$LANG_configsubgroups['polls'] = array(
    'sg_main' => '設定'
);

$LANG_fs['polls'] = array(
    'fs_main' => 'アンケートの全体設定',
    'fs_permissions' => '標準のパーミッション'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['polls'] = array(
    0 => array('True' => 1, 'False' => 0),
    1 => array('True' => TRUE, 'False' => FALSE),
    2 => array('As Submitted' => 'submitorder', 'By Votes' => 'voteorder'),
    9 => array('Forward to Poll' => 'item', 'Admin Listを表示' => 'list', 'Public 一覧を表示' => 'plugin', 'ホームを表示' => 'home', '管理画面を表示' => 'admin'),
    12 => array('No access' => 0, 'Read-Only' => 2, 'Read-Write' => 3)
);

?>
