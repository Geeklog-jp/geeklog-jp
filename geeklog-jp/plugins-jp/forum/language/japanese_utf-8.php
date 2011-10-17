<?php
/* vim: set expandtab sw=4 ts=4 sts=4: */
/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog Forums Plugin 2.8.0                                               |
// +---------------------------------------------------------------------------+
// | japanese_utf-8.php                                                        |
// | Language defines for all text                                             |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2011 by the following authors:                              |
// |    Geeklog Japanese Group                                                 |
// |                                                                           |
// | Copyright (C) 2000,2001 by the following authors:                         |
// |    Tony Bibbs       tony AT tonybibbs DOT com                             |
// |                                                                           |
// | Forum Plugin Authors                                                      |
// |    Mr.GxBlock                                        www.gxblock.com      |
// |    Matthew DeWyer   matt AT mycws DOT com            www.cweb.ws          |
// |    Blaine Lang      geeklog AT langfamily DOT ca     www.langfamily.ca    |
// +---------------------------------------------------------------------------+
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
// +---------------------------------------------------------------------------+

global $LANG32;

$PLG_forum_MESSAGE1 = '掲示板プラグインアップグレード: 成功しました。';
$PLG_forum_MESSAGE2 = '掲示板プラグインアップグレード: 自動インストール失敗。プラグインドキュメントをご覧ください。';
$PLG_forum_MESSAGE5 = '掲示板プラグインのアップグレードに失敗しました。エラーログ(error.log)をご覧ください。';
$PLG_forum_MESSAGE3002 = $LANG32[9];

$LANG_GF00 = array (
    'pluginlabel'       => '掲示板',
    'searchlabel'       => '掲示板',
    'statslabel'        => '全掲示板投稿',
    'statsheading1'     => '掲示板上位10位閲覧数',
    'statsheading2'     => '掲示板上位10位書き込み数',
    'statsheading3'     => '投稿はありません。',
    'useradminmenu'     => '掲示板の機能',
    'access_denied'     => 'アクセスが拒否されました',
    'autotag_desc_forum' => '[forum: id alternate title] - 掲示板トピックのタイトルで掲示板トピックへのリンクを表示。アンカーテキストの指定は任意。'
);


$LANG_GF01['FORUM']          = '掲示板';
$LANG_GF01['ALL']            = 'すべて';
$LANG_GF01['YES']            = 'はい';
$LANG_GF01['NO']             = 'いいえ';
$LANG_GF01['NEW']            = '新着';
$LANG_GF01['NEXT']           = '次へ';
$LANG_GF01['ERROR']          = 'エラー!';
$LANG_GF01['CONFIRM']        = '確認';
$LANG_GF01['UPDATE']         = '更新';
$LANG_GF01['SAVE']           = '保存';
$LANG_GF01['CANCEL']         = '取り消し';
$LANG_GF01['ON']             = '投稿日: ';
$LANG_GF01['ON2']            = '&nbsp;&nbsp;<b>オン: </b>';
$LANG_GF01['BY']             = '投稿者: ';
$LANG_GF01['RE']             = '書込: ';
$LANG_GF01['DATE']           = '日付';
$LANG_GF01['VIEWS']          = '閲覧数';
$LANG_GF01['REPLIES']        = '書込数';
$LANG_GF01['NAME']           = '名前:';
$LANG_GF01['DESCRIPTION']    = '説明: ';
$LANG_GF01['TOPIC']          = '件名';
$LANG_GF01['TOPICS']         = '投稿';
$LANG_GF01['TOPICSUBJECT']   = '件名';
$LANG_GF01['HOMEPAGE']       = 'ホーム';
$LANG_GF01['SUBJECT']        = '件名';
$LANG_GF01['HELLO']          = 'こんにちは！ ';
$LANG_GF01['MOVED']          = '移動';
$LANG_GF01['REMOVE']         = '解除';
$LANG_GF01['POSTS']          = '投稿数';
$LANG_GF01['LASTPOST']       = '最新投稿';
$LANG_GF01['POSTEDON']       = '投稿日';
$LANG_GF01['POSTEDBY']       = '投稿者';
$LANG_GF01['PAGES']          = 'ページ';
$LANG_GF01['TODAY']          = '今日の';
$LANG_GF01['REGISTERED']     = '登録日';
$LANG_GF01['ORDERBY']        = '並び換え:';
$LANG_GF01['ORDER']          = '順番:';
$LANG_GF01['USER']           = 'ユーザ';
$LANG_GF01['GROUP']          = 'グループ';
$LANG_GF01['ANON']           = 'ゲストユーザ: ';
$LANG_GF01['ADMIN']          = '管理者';
$LANG_GF01['AUTHOR']         = '投稿者';
$LANG_GF01['NOMOOD']         = '-気分アイコン-';
$LANG_GF01['REQUIRED']       = '[要求]';
$LANG_GF01['OPTIONAL']       = '[オプション]';
$LANG_GF01['SUBMIT']         = '投稿する';
$LANG_GF01['PREVIEW']        = 'プレビュー';
$LANG_GF01['EDIT']           = '編集';
$LANG_GF01['DELETE']         = '削除';
$LANG_GF01['OPTIONS']        = 'オプション:';
$LANG_GF01['MISSINGSUBJECT'] = '件名なし';
$LANG_GF01['MIGRATE_NOW']    = 'インポート実行';
$LANG_GF01['FILTERLIST']     = 'フィルタリスト';
$LANG_GF01['SELECTFORUM']    = '掲示板を選択';
$LANG_GF01['DELETEAFTER']    = '実行後に削除';
$LANG_GF01['TITLE']          = 'タイトル';
$LANG_GF01['COMMENTS']       = 'コメント';
$LANG_GF01['SUBMISSIONS']    = '投稿したもの';
$LANG_GF01['HTML_FILTER_MSG']  = '一部のHTMLを許可';
$LANG_GF01['HTML_FULL_MSG']  = 'すべてのHTMLを許可';
$LANG_GF01['HTML_MSG']       = 'HTML許可';
$LANG_GF01['CENSOR_PERM_MSG']= 'バッドワードをチェック';
$LANG_GF01['ANON_PERM_MSG']  = 'ゲストユーザの投稿を見る';
$LANG_GF01['POST_PERM_MSG1'] = '投稿可能';
$LANG_GF01['POST_PERM_MSG2'] = 'ゲストユーザ投稿可能';
$LANG_GF01['GO']             = '実行';
$LANG_GF01['STATUS']         = '状態:';
$LANG_GF01['ONLINE']         = 'オンライン';
$LANG_GF01['OFFLINE']        = 'オフライン';
$LANG_GF01['back2parent']    = '親の投稿';
$LANG_GF01['forumname']      = '';
$LANG_GF01['category']       = 'カテゴリ: ';
$LANG_GF01['loginreqview']   = '<b>掲示板に参加するためには、 %s 登録</a> または %s ログイン </a> してください。</b>';
$LANG_GF01['loginreqpost']   = '<b>投稿するためには、登録またはログインしてください。</b>';
$LANG_GF01['nolastpostmsg']  = 'N/A';
$LANG_GF01['no_one']         = '1つではない。';
$LANG_GF01['back2top']       = 'トップへ戻る';
$LANG_GF01['TEXTMODE']       = 'テキストモード';
$LANG_GF01['HTMLMODE']       = 'HTMLモード';
$LANG_GF01['TopicPreview']   = '投稿プレビュー';
$LANG_GF01['moderator']      = 'モデレータ';
$LANG_GF01['admin']          = '管理者';
$LANG_GF01['DATEADDED']      = '登録日';
$LANG_GF01['PREVTOPIC']      = '前のトピックへ';
$LANG_GF01['NEXTTOPIC']      = '次のトピックへ';
$LANG_GF01['RESYNC']         = "更新";
$LANG_GF01['RESYNCCAT']      = "カテゴリを更新";
$LANG_GF01['EDITICON']       = '編集';
$LANG_GF01['QUOTEICON']      = '引用して書き込む';
$LANG_GF01['ProfileLink']    = 'プロフィール';
$LANG_GF01['WebsiteLink']    = 'ホームページ';
$LANG_GF01['PMLink']         = 'PM';
$LANG_GF01['EmailLink']      = 'メール';
$LANG_GF01['FORUMSUBSCRIBE'] = 'メール通知を開始';
$LANG_GF01['FORUMUNSUBSCRIBE'] = 'メール通知を解除';
$LANG_GF01['FORUMSUBSCRIBE_TRUE'] = 'この掲示板のメール通知:有効';
$LANG_GF01['FORUMSUBSCRIBE_FALSE'] = 'この掲示板のメール通知:無効';
$LANG_GF01['NEWTOPIC']       = '新規投稿';
$LANG_GF01['POSTREPLY']      = '返信投稿';
$LANG_GF01['SubscribeLink']  = 'メール通知を開始';
$LANG_GF01['unSubscribeLink'] = 'メール通知を解除';
$LANG_GF01['SubscribeLink_TRUE']  = 'このトピックのメール通知:有効';
$LANG_GF01['SubscribeLink_FALSE'] = 'このトピックのメール通知:無効';
$LANG_GF01['SUBSCRIPTIONS']  = '投稿オプション';
$LANG_GF01['TOP']            = 'トップ';
$LANG_GF01['PRINTABLE']      = '印刷用ページ';
$LANG_GF01['USERPREFS']      = 'ユーザ設定';
$LANG_GF01['SPEEDLIMIT']     = '"あなたの最新の投稿は %s 秒前でした。<br' . XHTML . '>次の投稿まで、最低 %s 秒お待ちください。"';
$LANG_GF01['ACCESSERROR']    = 'アクセスエラー';
$LANG_GF01['ACTIONS']        = 'アクション';
$LANG_GF01['DELETEALL']      = 'すべての選択したデータを削除';
$LANG_GF01['DELCONFIRM']     = '選択したデータを削除してよろしいですか？';
$LANG_GF01['DELALLCONFIRM']  = 'すべてのデータを削除してよろしいですか？';
$LANG_GF01['STARTEDBY']      = '初期投稿';
$LANG_GF01['WARNING']        = 'ご注意';
$LANG_GF01['MODERATED']      = 'モデレータ: %s';
$LANG_GF01['LASTREPLYBY']    = '最新の書き込み者:&nbsp;%s';
$LANG_GF01['UID']            = 'UID';
$LANG_GF01['INDEXPAGE']      = '掲示板目次';
$LANG_GF01['FEATURE']        = '機能';
$LANG_GF01['SETTING']        = '設定';
$LANG_GF01['MARKALLREAD']    = 'すべて既読にする';
$LANG_GF01['MSG_NO_CAT']     = 'カテゴリーまたは掲示板が定義されていません。';

// Language for bbcode toolbar
$LANG_GF01['CODE']           = 'コード';
$LANG_GF01['FONTCOLOR']      = '文字色';
$LANG_GF01['FONTSIZE']       = '文字サイズ';
$LANG_GF01['CLOSETAGS']      = 'タグを閉じる';
$LANG_GF01['CODETIP']        = 'ヒント: 選択した文字列にすぐにスタイルを適用できます';
$LANG_GF01['TINY']           = '小さい';
$LANG_GF01['SMALL']          = '小さめ';
$LANG_GF01['NORMAL']         = '標準';
$LANG_GF01['LARGE']          = '大きめ';
$LANG_GF01['HUGE']           = '大きい';
$LANG_GF01['DEFAULT']        = '既定';
$LANG_GF01['DKRED']          = '濃赤';
$LANG_GF01['RED']            = '赤';
$LANG_GF01['ORANGE']         = 'オレンジ';
$LANG_GF01['BROWN']          = '茶';
$LANG_GF01['YELLOW']         = '黄';
$LANG_GF01['GREEN']          = '緑';
$LANG_GF01['OLIVE']          = 'オリーブ';
$LANG_GF01['CYAN']           = '水色';
$LANG_GF01['BLUE']           = '青';
$LANG_GF01['DKBLUE']         = '濃青';
$LANG_GF01['INDIGO']         = '藍色';
$LANG_GF01['VIOLET']         = '紫';
$LANG_GF01['WHITE']          = '白';
$LANG_GF01['BLACK']          = '黒';

$LANG_GF01['b_help']         = "太字にする: [b]text[/b]";
$LANG_GF01['i_help']         = "イタリック体にする: [i]text[/i]";
$LANG_GF01['u_help']         = "下線を引く: [u]text[/u]";
$LANG_GF01['q_help']         = "引用する: [quote]text[/quote]";
$LANG_GF01['c_help']         = "コードを表示する: [code]code[/code]";
$LANG_GF01['l_help']         = "数字なしリストにする: [list]text[/list]";
$LANG_GF01['o_help']         = "数字付きリストにする: [olist]text[/olist]";
$LANG_GF01['p_help']         = "[img]http://画像のurl[/img]  または  [img w=100 h=200][/img]";
$LANG_GF01['w_help']         = "URLを挿入する: [url]http://url[/url] または [url=http://url]URLテキスト[/url]";
$LANG_GF01['a_help']         = "閉じていないbbCodeのタグをすべて閉じる";
$LANG_GF01['s_help']         = "文字色: [color=red]text[/color]  ヒント: color=#FF0000 という形式でも指定できます";
$LANG_GF01['f_help']         = "文字サイズ: [size=7]小さめの文字[/size]";
$LANG_GF01['h_help']         = "詳細を見るにはクリックしてください";


$LANG_GF02['msg01']    = '申し訳ありませんが、掲示への参加には登録が必要です。 ';
$LANG_GF02['msg02']    = '申し訳ありませんが、この掲示板への参加には登録が必要です。';
$LANG_GF02['msg03']    = 'Please wait while you are redirected';
$LANG_GF02['msg05']    = '<center><em>まだ登録されていません。</em></center>';
$LANG_GF02['msg07']    = 'オンラインユーザ:';
$LANG_GF02['msg14']    = '登録が必要です。<br' . XHTML . '>';
$LANG_GF02['msg15']    = 'エラーだと思われたら、 <a href="mailto:%s?subject=Guestbook IP Ban">掲示板管理者</a>まで。';
$LANG_GF02['msg18']    = 'エラー! 必須項目が入力されていないかまたは短すぎます。';
$LANG_GF02['msg19']    = 'メッセージが登録されました';
$LANG_GF02['msg22']    = '- 掲示板投稿通知';
$LANG_GF02['msg23a']   = "掲示板[%s]に%sさんから新しく書き込みがありました。\n（トピック作成者：%sさん　掲示板：%s）";
$LANG_GF02['msg23b']   = "新しいトピック '%s' が\n%s さんによって %s 掲示板に投稿されました。\n（サイト：%s）\n\n%s/forum/viewtopic.php?showtopic=%s\n";
$LANG_GF02['msg23c']   = "%s/forum/viewtopic.php?showtopic=%s&lastpost=true\n";
$LANG_GF02['msg25']    = "\n";
$LANG_GF02['msg26']    = "\n※このトピックはメール通知が設定されています。";
$LANG_GF02['msg27']    = "\nメール通知解除: \n%s\n";
$LANG_GF02['msg33']    = '投稿者: ';
$LANG_GF02['msg36']    = '気分アイコン:';
$LANG_GF02['msg38']    = 'メール通知';
$LANG_GF02['msg40']    = '<br' . XHTML . '>既にメール通知に設定されています。<br' . XHTML . '><br' . XHTML . '>';
$LANG_GF02['msg44']    = '<p style="margin:0px; padding:5px;">メール通知が解除されています</p>';
$LANG_GF02['msg49']    = '(参照数 %s回) ';
$LANG_GF02['msg55']    = '削除されました。';
$LANG_GF02['msg56']    = 'IPアドレスは禁止されました。';
$LANG_GF02['msg59']    = '通常';
$LANG_GF02['msg60']    = '新着';
$LANG_GF02['msg61']    = '注目トピック';
$LANG_GF02['msg62']    = '書き込みがあればメール通知する';
$LANG_GF02['msg64']    = 'トピック %s 件名: %s 　を本当に削除してもよろしいですか?';
$LANG_GF02['msg65']    = '<br' . XHTML . '>これは親投稿です。そのためこのトピックの中のすべての書き込みもあわせて削除されます。';
$LANG_GF02['msg68']    = '注意: 禁止は注意深く行ってください。管理者だけが禁止者を解除できます。';
$LANG_GF02['msg69']    = '<br' . XHTML . '>本当にこのIPアドレスを禁止しますか: %s?';
$LANG_GF02['msg71']    = '機能が選択されていません。投稿を選択しモデレータの機能を実行してください。<br' . XHTML . '>注意:あなたはモデレータとなってこれらの機能を使ってください。';
$LANG_GF02['msg72']    = 'このメッセージがオンラインなら管理者機能は成功しません。';
$LANG_GF02['msg74']    = '最近の投稿 %s 件';
$LANG_GF02['msg75']    = '閲覧数トップ %s 件';
$LANG_GF02['msg76']    = '投稿数トップ %s 件';
$LANG_GF02['msg77']    = '<br' . XHTML . '><p style="padding-left: 10px;">申し訳ありません。先にログインしてください。アカウントがなければ新規登録してください。</p>';
$LANG_GF02['msg83']    = '<br' . XHTML . '><br' . XHTML . '><p>掲示板のタイトルを入力してください。</p>';
$LANG_GF02['msg84']    = '全て既読にする';
$LANG_GF02['msg85']    = 'ページ:';
$LANG_GF02['msg86']    = '最新 %s 投稿　投稿者: ';
$LANG_GF02['msg87']    = '<br' . XHTML . '>警告:このトピックはロックされています。<br' . XHTML . '>追加の投稿はできません。';
$LANG_GF02['msg88']    = '掲示板投稿者リスト';
$LANG_GF02['msg88b']   = '掲示板発言者のみ';
$LANG_GF02['msg89']    = 'メール通知設定リスト';
$LANG_GF02['msg101']   = 'ルール:';
$LANG_GF02['msg103']   = '掲示板ジャンプ:';
$LANG_GF02['msg106']   = '掲示板を選択';
$LANG_GF02['msg108']   = '新規投稿のある掲示板';
$LANG_GF02['msg109']   = 'ロックされたトピック';
$LANG_GF02['msg110']   = '編集ページに移動中...';
$LANG_GF02['msg111']   = '未読リスト:';
$LANG_GF02['msg112']   = '未読を表示する';
$LANG_GF02['msg113']   = '未読を表示する';
$LANG_GF02['msg114']   = 'ロック済';
$LANG_GF02['msg115']   = '注目トピック 新着';
$LANG_GF02['msg116']   = 'ロック済トピック 新着';
$LANG_GF02['msg117']   = 'サイト検索';
$LANG_GF02['msg118']   = '掲示板検索';
$LANG_GF02['msg119']   = '検索結果:';
$LANG_GF02['msg120']   = '人気順 by';
$LANG_GF02['msg121']   = '時刻はすべて %s , 現在の時刻は %s';
$LANG_GF02['msg122']   = '人気順リスト件数';
$LANG_GF02['msg123']   = '人気順リストに表示する件数';
$LANG_GF02['msg126']   = '検索ライン';
$LANG_GF02['msg127']   = '探索結果に表示するラインの数';
$LANG_GF02['msg128']   = '投稿者数/1ページ';
$LANG_GF02['msg129']   = '投稿者リストの1ページに表示する人数';
$LANG_GF02['msg130']   = 'ゲストユーザ投稿表示';
$LANG_GF02['msg131']   = 'ゲストユーザ投稿を表示する';
$LANG_GF02['msg132']   = 'メール通知モード';
$LANG_GF02['msg133']   = '書き込みがあればメール通知を既定値にする';
$LANG_GF02['msg134']   = 'メール通知を開始しました。';
$LANG_GF02['msg135']   = 'この掲示板への全ての投稿があなたに通知されます。';
$LANG_GF02['msg136']   = '投稿先の掲示板を選んでください。';
$LANG_GF02['msg137']   = '書き込みがあればメールで通知されます。';
$LANG_GF02['msg138']   = '<b>掲示板全体</b>';
$LANG_GF02['msg142']   = 'メール通知を開始しました。';
$LANG_GF02['msg144']   = 'トピックへ';
$LANG_GF02['msg146']   = 'メール通知を解除しました。';
$LANG_GF02['msg147']   = '掲示板の印刷';
$LANG_GF02['msg148']   = '<a href="javascript:history.back()">戻る</a>';
$LANG_GF02['msg155']   = '投稿なし';
$LANG_GF02['msg156']   = '投稿数';
$LANG_GF02['msg157']   = '最新10投稿';
$LANG_GF02['msg158']   = '最新10投稿者 ';
$LANG_GF02['msg159']   = 'モデレータのデータを本当に削除してもよいですか？';
$LANG_GF02['msg160']   = '投稿の最後のページを見る';
$LANG_GF02['msg163']   = '投稿を移動しました。';
$LANG_GF02['msg164']   = '全て既読にする';
$LANG_GF02['msg166']   = 'エラー: 記事が壊れたか、見つかりません。';
$LANG_GF02['msg167']   = '通知オプション';
$LANG_GF02['msg168']   = 'メール通知を無効にする';
$LANG_GF02['msg169']   = 'メンバーリストへ戻る';
$LANG_GF02['msg170']   = '最新の投稿';
$LANG_GF02['msg171']   = '掲示板アクセスエラー';
$LANG_GF02['msg172']   = '投稿がないか、削除されています。';
$LANG_GF02['msg173']   = 'メッセージ投稿ページへ移ります...';
$LANG_GF02['msg174']   = 'BAN Memberが見れません。 - IPアドレスが不正';
$LANG_GF02['msg175']   = '掲示板一覧へ戻る';
$LANG_GF02['msg176']   = 'メンバー選択';
$LANG_GF02['msg177']   = 'すべてのメンバー';
$LANG_GF02['msg178']   = '親の投稿のみ';
$LANG_GF02['msg179']   = '内容生成: %s 秒';
$LANG_GF02['msg180']   = '掲示板投稿警告';
$LANG_GF02['msg181']   = 'あなたは掲示板管理者としてアクセスできません。';
$LANG_GF02['msg182']   = 'モデレータ確認';
$LANG_GF02['msg183']   = '新規投稿: %s';
$LANG_GF02['msg184']   = '1回のみ通知';
$LANG_GF02['msg185']   = '次に訪問するまでに、複数の投稿があっても通知は1回のみする';
$LANG_GF02['msg186']   = '新投稿件名';
$LANG_GF02['msg187']   = '<a href="%s">投稿へ戻る</a>';
$LANG_GF02['msg188']   = 'クリックすると最新投稿へジャンプします。';
$LANG_GF02['msg189']   = 'エラー: もうこの投稿は編集できません。';
$LANG_GF02['msg190']   = 'こっそり編集';
$LANG_GF02['msg191']   = '編集できません。編集可能期間が終了したか、モデレータ権限がありません。';
$LANG_GF02['msg192']   = '完了しました。%s個のトピックと %s個のコメントをインポートしました。';
$LANG_GF02['msg193']   = '記事を掲示板にインポートするユーティリティ';
$LANG_GF02['msg194']   = '新規投稿のない掲示板';
$LANG_GF02['msg195']   = 'クリックすると掲示板へジャンプします';
$LANG_GF02['msg196']   = '掲示板の目次を見る';
$LANG_GF02['msg197']   = '全カテゴリを既読にする';
$LANG_GF02['msg198']   = '掲示板の設定を更新する';
$LANG_GF02['msg199']   = '掲示板通知を見る/削除する';
$LANG_GF02['msg200']   = '投稿者リスト';
$LANG_GF02['msg201']   = '人気トピック';
$LANG_GF02['msg202']   = '新規書込なし';
$LANG_GF02['msg300']   = 'ゲストユーザの書き込みは非表示の設定になっています。';
$LANG_GF02['msg301']   = '全カテゴリを既読にしてもいいですか?';
$LANG_GF02['msg302']   = 'このカテゴリの全ての投稿を既読にしてもいいですか?';
$LANG_GF02['PostReply']   = '新しく書き込む';
$LANG_GF02['PostTopic']   = '新規投稿';
$LANG_GF02['EditTopic']   = '投稿編集';
$LANG_GF02['quietforum']  = '掲示板に新規投稿がありません。';

$LANG_GF03 = array (
    'delete'            => '削除',
    'edit'              => '編集',
    'move'              => '移動',
    'split'             => '投稿分割',
    'ban'               => 'IPアドレス禁止',
    'movetopic'         => '移動&amp;削除',
    'movetopicmsg'      => '<br' . XHTML . '> 次の掲示板へ <b>%s</b> を移動します',
    'splittopicmsg'     => '<br' . XHTML . '>新規投稿: "<b>%s</b>"<br' . XHTML . '><em>投稿者:</em>&nbsp;%s&nbsp; <em>元の投稿:</em>&nbsp;%s',
    'selectforum'       => '新規掲示板選択:',
    'lockedpost'        => '書き込みを追加',
    'splitheading'      => 'スレッドオプション分割:',
    'splitopt1'         => 'ここからすべての投稿を移動',
    'splitopt2'         => '1投稿のみ移動'
);

$LANG_GF04 = array (
    'label_forum'             => '掲示板の概要',
    'label_location'          => '場所',
    'label_aim'               => 'AIMハンドル名',
    'label_yim'               => 'YIMハンドル名',
    'label_icq'               => 'ICQハンドル名',
    'label_msnm'              => 'MSNメッセンジャー名',
    'label_interests'         => '趣味',
    'label_occupation'        => '仕事',
);

/* Settings for Additional User profile - Instant Messenging links */
$LANG_GF05 = array ( // No used
    'aim_link'               => '&nbsp;<a href="aim:goim?screenname=',
    'aim_linkend'            => '>',
    'aim_hello'              => '&amp;message=Hi.+Are+you+there?',
    'aim_alttext'            => 'AIM:&nbsp;',
    'icq_link'               => '&nbsp;',
    'icq_alttext'            => 'ICQ #:&nbsp;',
    'msn_link'               => '&nbsp;<a href="javascript:MsgrApp.LaunchIMUI(',
    'msn_linkend'            => ')">',
    'msn_alttext'            => 'Messenger:&nbsp;',
    'yim_link'               => '&nbsp;<a href="ymsgr:sendIM?',
    'yim_linkend'            => '">',
    'yim_alttext'            => 'YIM:&nbsp;',
);


/* Admin Navbar */
$LANG_GF06 = array (
    1   => '統計',
    2   => '設定',
    3   => '掲示板管理',
    4   => 'モデレータ',
    5   => '記事を掲示板へ',
    6   => 'メッセージ',
    7   => '禁止IPアドレス'
);


/* User Functions Navbar */
$LANG_GF07 = array (
    1   => '掲示板の表示', // No used
    2   => 'ユーザ設定', // No used
    3   => '書き込み数人気順',
    4   => 'メール通知設定リスト', // No used
    5   => '投稿者リスト' // No used
);


/* Forum User Features */
$LANG_GF08 = array (
    1   => 'トピックのメール通知',
    2   => '掲示板のメール通知',
    3   => 'トピック通知の例外'
);

/* Text for the buttons */
$LANG_GF09 = array (
    'edit'     => '編集',
    'email'    => 'メール',
    'home'     => 'ホーム',
    'lastpost' => '最近の投稿',
    'pm'       => 'PM', // private message
    'profile'  => 'プロファイル',
    'quote'    => '引用',
    'website'  => 'Webサイト',
    'newtopic' => '新規トピック',
    'replytopic' => '返信'
);

$LANG_GF91 = array (
    'gfstats'            => '掲示板の統計',
    'statsmsg'           => '現在:',
    'totalcats'          => '合計 カテゴリー数:',
    'totalforums'        => '合計 掲示板数:',
    'totaltopics'        => '合計 トピック数:',
    'totalposts'         => '合計 投稿数:',
    'totalviews'         => '合計 閲覧数:',
    'avgpmsg'            => '平均投稿数:',
    'category'           => 'カテゴリー:',
    'forum'              => '掲示板:',
    'topic'              => 'トピック:',
    'avgvmsg'            => '平均閲覧数:'
);

$LANG_GF92 = array (
    'gfsettings'         => '設定',
    'showiframe'         => 'トピックレビュー表示',
    'showiframedscp'     => 'トピックに新しく書き込む場合、下にトピックの内容を表示する',
    'topicspp'           => '1ページごとのトピック数',
    'topicsppdscp'       => '各掲示板でトピックの一覧を表示する場合の1ページに表示するトピックの数',
    'postspp'            => '1ページごとの投稿数',
    'postsppdscp'        => '各トピックで投稿メッセージを表示する場合の1ページ当に表示する投稿数',
    'setsavemsg'         => '設定は保存されました。',
);

// Board Admin
$LANG_GF93 = array (
    'gfboard'            => '掲示板管理',
    'addcat'             => 'カテゴリーを追加',
    'addforum'           => '掲示板を追加',
    'catorder'           => 'カテゴリーの順番',
    'catadded'           => 'カテゴリーが追加されました。',
    'catdeleted'         => 'カテゴリーが削除されました。',
    'catedited'          => 'カテゴリーが更新されました。',
    'forumadded'         => '掲示板が追加されました。',
    'forumaddError'      => '掲示板追加エラー',
    'forumdeleted'       => '掲示板が削除されました。',
    'forumedited'        => '掲示板が更新されました。',
    'forumordered'       => '掲示板の順番を更新しました。',
    'back'               => '戻る',
    'addnote'            => '注意: これらの変数を編集できます。',
    'editforumnote'      => '編集: <b>"%s"</b>',
    'deleteforumnote1'   => '掲示板&nbsp;<b>"%s"</b>&nbsp;を削除してもよろしいですか ?',
    'editcatnote'        => '編集: <b>"%s"</b>',
    'deletecatnote1'     => 'カテゴリー&nbsp;<b>"%s"</b>&nbsp;を削除してもよろしいですか ?',
    'deletecatnote2'     => 'このカテゴリーのすべての掲示板とトピックも削除されます。',
    'undercat'           => 'カテゴリー:',
    'deleteforumnote2'   => 'この掲示板に属する全てのトピックも削除されます。',
    'groupaccess'        => 'グループ: ',
    'action'             => 'アクション',
    'forumdescription'   => '掲示板の説明',
    'posts'              => '投稿数',
    'ordertitle'         => '順番',
    'ModEdit'            => '編集',
    'ModMove'            => '移動',
    'ModStick'           => '注目',
    'ModBan'             => '禁止',
    'addmoderator'       => 'モデレータを追加',
    'delmoderator'       => "選択したモデレータを削除\n",
    'moderatorwarning'   => '<b>注意: 掲示板がみつかりません。</b><br' . XHTML . '><br' . XHTML . '>モデレータ追加の前に、掲示板カテゴリを作成して少なくとも掲示板を1つ作成してください。',
    'private'            => 'プライベート掲示板',
    'filtertitle'        => 'モデレータ情報表示',
    'addmessage'         => '新しいモデレータを追加',
    'allowedfunctions'   => '許可されている権限',
    'userrecords'        => 'ユーザレコード',
    'grouprecords'       => 'グループレコード',
    'filterview'         => 'フィルタービュー',
    'readonly'           => '閲覧掲示板',
    'readonlydscp'       => 'モデレータだけが投稿できる掲示板',
    'hidden'             => '隠された掲示板',
    'hiddendscp'         => '掲示板の目次を隠す',
    'hideposts'          => '新規投稿を隠す',
    'hidepostsdscp'      => '新規投稿ブロックとRSSフィードから投稿を隠す',
    'mod_title'          => 'モデレータ',
    'allforums'          => 'すべての掲示板'
);

$LANG_GF95 = array (
    'header1'           => '投稿されたトピックを議論しましょう。',
    'header2'           => '投稿されたトピックの議論&nbsp;&raquo;&nbsp;%s',
    'notyet'            => 'この機能はまだ実装されていません。', // No used
    'delall'            => 'すべて削除', // No used
    'delallmsg'         => 'すべてのメッセージを削除しますか？: %s?', // No used
    'underforum'        => '<b> %s (ID #%s)', // No used
    'moderate'          => 'モデレートする',
    'nomess'            => 'まだメッセージは投稿されていません。'
);

$LANG_GF96 = array (
    'ip'                 => 'IP',
    'enterip'            => '禁止IPアドレス入力',
    'gfipman'            => '禁止IPアドレス',
    'ban'                => '禁止',
    'noips'              => '<p style="margin: 0px; padding: 5px;">禁止されているIPアドレスはありません!</p>',
    'unban'              => '禁止取消',
    'ipbanned'           => '禁止IPアドレス',
    'banip'              => '禁止IPアドレス確定',
    'banipmsg'           => '禁止したいですか？IP %s?',
    'specip'             => '禁止IP アドレスを指定してください!',
    'ipunbanned'         => '禁止は解除されました。',
    'noip'               => 'IPアドレスが入力されていません!'
);

// Localization of the Admin Configuration UI
$LANG_configsections['forum'] = array(
    'label' => '掲示板',
    'title' => '掲示板の設定'
);

$LANG_confignames['forum'] = array(
    'registration_required' => '閲覧にはログインが必要',
    'registered_to_post'    => '投稿にはログインが必要',
    'allow_notification'    => 'メールで通知する',
    'show_topicreview'      => '返信作成時に投稿履歴を表示',
    'allow_user_dateformat' => 'ユーザーの日付書式を使用',
    'use_pm_plugin'         => 'PMプラグインを使用',
    'show_topics_perpage'   => 'トピックの1ページあたり表示数',
    'show_posts_perpage'    => '投稿の1ページあたり表示数',
    'show_messages_perpage' => 'メッセージの1ページあたり表示数',
    'show_searches_perpage' => '検索結果の1ページあたり表示数',
    'showblocks'            => '掲示板で表示するブロックカラム',
    'usermenu'              => 'ユーザーメニューの種類',
    'use_themes_template'   => 'テーマ内の掲示板用テンプレートを使用',
    // ----------------------------------
    'show_subject_length'   => '件名の最大文字数',
    'min_username_length'   => 'ユーザ名の最小文字数',
    'min_subject_length'    => '件名の最小文字数',
    'min_comment_length'    => '投稿本文の最小文字数',
    'views_tobe_popular'    => '人気度を判断する投稿数',
    'post_speedlimit'       => '投稿間隔の最小時間(秒)',
    'allowed_editwindow'    => '投稿の編集を許可する制限時間(秒)',
    'allow_html'            => 'HTMLによる投稿を許可',
    'post_htmlmode'         => '既定の投稿モードをHTMLにする',
    'convert_break'         => '改行をHTML(&lt;br&gt;)に変換',
    'use_censor'            => 'Geeklogの検閲機能を使用',
    'use_glfilter'          => 'GeeklogのHTMLフィルタを使用',
    'use_geshi'             => 'GeSHiを使用',
    'use_spamx_filter'      => 'Spam-Xプラグインを使用',
    'show_moods'            => '気分アイコンを使用',
    'allow_smilies'         => 'スマイリーアイコンを使用',
    'use_smilies_plugin'    => 'スマイリープラグインを使用',
    'avatar_width'          => 'アバター画像の幅',
    // ----------------------------------
    'show_centerblock'      => 'センターブロックを表示',
    'centerblock_homepage'  => 'トップページのみ表示',
    'centerblock_numposts'  => 'センターブロックの表示投稿数',
    'cb_subject_size'       => 'トピック件名の表示文字数',
    'centerblock_where'     => 'センターブロックの表示位置',
    // ----------------------------------
    'sideblock_numposts'    => 'サイドブロックの表示投稿数',
    'sb_subject_size'       => 'トピック件名の表示文字数',
    'sb_latestpostonly'     => '最新投稿のみ表示',
    // ----------------------------------
    'level1'                => 'レベル1の最小投稿数',
    'level2'                => 'レベル2の最小投稿数',
    'level3'                => 'レベル3の最小投稿数',
    'level4'                => 'レベル4の最小投稿数',
    'level5'                => 'レベル5の最小投稿数',
    'level1name'            => 'レベル1の名前',
    'level2name'            => 'レベル2の名前',
    'level3name'            => 'レベル3の名前',
    'level4name'            => 'レベル4の名前',
    'level5name'            => 'レベル5の名前'
);

$LANG_configsubgroups['forum'] = array(
    'sg_main' => 'メイン'
);

$LANG_tab['forum'] = array(
    'tab_main'         => '一般設定',
    'tab_topicposting' => '投稿設定',
    'tab_centerblock'  => 'センターブロック',
    'tab_sideblock'    => 'サイドブロック',
    'tab_rank'         => 'ランク'
);

$LANG_fs['forum'] = array(
    'fs_main'         => '一般設定',
    'fs_topicposting' => '投稿設定',
    'fs_centerblock'  => 'センターブロック',
    'fs_sideblock'    => 'サイドブロック',
    'fs_rank'         => 'ランク'
);

// Note: entries 0, 1, and 12 are the same as in $LANG_configselects['Core']
$LANG_configselects['forum'] = array(
    0 => array('はい' => 1, 'いいえ' => 0),
    1 => array('はい' => TRUE, 'いいえ' => FALSE),
    5 => array('ページのトップ' => 1, '注目記事のあと' => 2, 'ページのボトム' => 3),
    6 => array('左ブロック' => 'leftblocks', '右ブロック' => 'rightblocks', '全ブロック' => 'allblocks', 'ブロック無し' => 'noblocks'),
    7 => array('ブロックメニュー' => 'blockmenu', 'ナビゲーションバー' => 'navbar', '無し' => 'none'),
    12 => array('アクセス不可' => 0, '表示' => 2, '表示・編集' => 3)
);
?>
