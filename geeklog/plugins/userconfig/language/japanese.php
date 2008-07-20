<?php

// +---------------------------------------------------------------------------+
// | userconfig Geeklog Plugin 1.0                                          |
// +---------------------------------------------------------------------------+
// | japanese_utf-8.php                                                        |
// |                                                                           |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2006 by nmox                                                |
// |                                                                           |
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
// +---------------------------------------------------------------------------+
//

// +---------------------------------------------------------------------------+
// | Array Format:                                                             |
// | $LANGXX[YY]:	$LANG - variable name                                      |
// |	  	XX - file id number                                                |
// |		YY - phrase id number                                              |
// +---------------------------------------------------------------------------+

$LANG_USERCONFIG = array (
'plugin'            => 'プラグイン',
'access_denied'     => 'アクセスは拒否されました。',
'access_denied_msg' => 'Rootユーザーしかこのページにはアクセスできません。あなたのユーザー名とIPアドレスは記録されました。',
'install_header'	=> 'プラグインのインストール/アンインストール',
'installed'         => 'このプラグインはサイトの設定をブラウザから変更することができるようにするプラグインです。',
'uninstalled'       => '現在、 userconfig プラグインはインストールされていません。インストールする場合は 下記のインストールボタンを押して下さい。',
'install_success'	=> 'インストールに成功しました。',
'install_failed'	=> 'インストールに失敗しました。詳細はエラーログ(error.log)をご覧ください。',
'uninstall_msg'		=> 'userconfig プラグインはきちんとアンインストールされました。',
'install'           => 'インストール',
'uninstall'         => 'アンインストール',
'userconfig'		=> 'コンフィギュレーション',
'setting_all'		=> 'すべて',
'setting_general'	=> '基本設定',
'setting_site'		=> 'サイトの基本設定',
'site_name'			=> 'サイト名',
'site_slogan'		=> 'スローガン',
'theme'				=> 'デフォルトテーマ',
'language_flag'	=> '多言語切り替え機能',
'languagelist'		=> '表示言語',
'languagelist1'		=> '※多言語切り替え機能は、UTF-8モードでご利用ください。',
'menu_elements'		=> 'ヘッダメニューに表示されるメニュー（左側数値は並び順）',
'menu_home'			=> 'ホーム',
'menu_contribute'	=> '記事投稿',
'menu_calendar'		=> 'カレンダ',
'menu_search'		=> '検索オプション',
'menu_stats'		=> 'アクセス情報',
'menu_directory'	=> '記事の一覧',
'menu_prefs'		=> 'アカウント情報',
'menu_plugins'		=> 'プラグイン {plg_menu_elements} 変数と同じ',
'menu_custom'		=> 'CUSTOM_menuEntries 関数（ログインメニューなど）を表示',
'site_mail'			=> 'サイトからメール通知される場合の送信元アドレス',
'setting_userwork'	=> 'ユーザ設定',
'setting_newuser'	=> 'ユーザの新規登録',
'disable_new_user_registration'	=> 'ユーザの新規登録',
'loginrequired'					=> 'ログイン要求',
'loginrequired1'				=> '投稿や検索、プロファイル閲覧などにログインが必要',
'loginrequired2'				=> '指定された作業だけにが必要',
'setting_loginreq'				=> 'ログイン要求を必要とするにした場合',
'submitloginrequired'			=> '記事・イベント投稿にログインが　　　　',
'commentsloginrequired'			=> 'コメント投稿にログインが　　　　　　　',
'calendarloginrequired'			=> 'カレンダー表示にログインが　　　　　　',
'statsloginrequired'			=> 'サイトステータス表示にログインが　　　',
'searchloginrequired'			=> '検索の表示にログインが　　　　　　　　',
'profileloginrequired'			=> '他人のプロファイルの閲覧にログインが　',
'emailuserloginrequired'		=> '他のユーザーにメール送信にログインが　',
'emailstoryloginrequired'		=> '記事をメールで送る機能にログインが　　',
'directoryloginrequired'		=> '記事一覧表示にログインが　　　　　　　',
'storysubmission'				=> '記事投稿の管理者承認',
'option_submission1'			=> 'ユーザの投稿を承認待ちリストで管理者が承認',
'option_submission2'			=> 'ユーザが直接投稿',
'eventsubmission'				=> 'イベント投稿の管理者承認',
'usersubmission'				=> 'ユーザ登録の管理者承認',
'allow_user_themes'				=> 'ユーザテーマの設定',
'allow_user_themes1'			=> 'ユーザがテーマを選べる',
'allow_user_themes2'			=> '選べない',
'allow_username_change'			=> 'ユーザが自分でユーザー名を変更',
'allow_account_delete'			=> 'ユーザ自身でアカウント削除',
'hide_author_exclusion'			=> 'ユーザ設定画面で「読みたくない投稿者名をチェックする」オプション',
'hide_author_exclusion1'		=> '読みたくない投稿者名欄を隠す',
'hide_author_exclusion2'		=> '読みたくない投稿者名欄を表示',
'setting_admin_general'			=> '管理者設定',
'setting_admin'					=> '管理者運用設定',
'advanced_editor'				=> 'アドバンストエディタ使用設定',
'advanced_editor1'				=> 'アドバンストエディタ使用',
'advanced_editor2'				=> 'ノーマルエディタ使用',
'notification'					=> '新しく記事やコメント、イベント、トラックバック、ピングバック投稿管理者通知',
'notification_story'			=> '記事投稿を通知',
'notification_comment'			=> 'コメント投稿を通知',
'notification_link'				=> 'リンク申請を通知',
'notification_event'			=> 'イベント投稿を通知',
'notification_user'				=> 'ユーザ登録を通知',
'notification_trackback'		=> 'トラックバックを通知',
'notification_pingback'			=> 'ピングバックを通知',
'listdraftstories'				=> '承認待ちリストにドラフトモードの記事一覧を表示',
'setting_contents'				=> 'コンテンツ設定',
'setting_story'					=> '記事設定',
'maximagesperarticle'			=> '記事で設定できる最大画像ファイル数',
'limitnews'						=> '記事の1ページあたりの表示数',
'minnews'						=> '記事の最小数',
'contributedbyline'				=> 'ユーザー名を公開検索',
'hideviewscount'				=> '閲覧回数を隠す',
'hideemailicon'					=> '記事を友人に送るアイコンを隠す',
'hideprintericon'				=> '記事を印刷するアイコンを隠す',
'allow_page_breaks'				=> '記事に[page_break]の配置を許可する',
'article_image_align'			=> '話題アイコンの表示位置',
'article_image_align1'			=> '左隅に表示',
'article_image_align2'			=> '右隅に表示',
'show_topic_icon'				=> '記事新規作成時の話題アイコン表示デフォルト設定',
'max_image_width'				=> '画像最大幅。この幅を超えるとリサイズされる。',
'max_image_height'				=> '画像最大高。この高さを超えるとリサイズされる。',
'keep_unscaled_image'			=> '元画像',
'keep_unscaled_image1'			=> 'オリジナルスケールの画像を保存',
'keep_unscaled_image2'			=> 'オリジナルスケールの画像を保存しない',
'keep_unscaled_image_memo'		=> '「保存」にすると、小画像はサムネールとして使われ、サムネールからオリジナル画像へリンクされます。<br>注意:サーバーの大きなスペースを取られるので注意が必要 (画像のサイズによる)',
'max_topicicon_width'			=> 'トピックアイコン最大幅',
'max_topicicon_height'			=> 'トピックアイコン最大高',
'postmode'						=> 'デフォルトの投稿モード',
'postmode1'						=> 'HTMLモード',
'postmode2'						=> 'テキストモード',
'postmode_memo'					=> 'テキストモードを選択すると、アドバンストエディタの編集用ツールバーにおける編集機能はデフォルトでは利用できませんが、<br>
									「投稿モード」でアドバンストモードに変更することで利用できるようになります。',
'setting_topics'				=> '話題（記事カテゴリ）ブロック設定',
'showstorycount'				=> '話題表示ブロックに記事の数を表示',
'showsubmissioncount'			=> '話題表示ブロックにサブミッションの数を表示',
'hide_home_link'				=> '話題表示ブロックにHomeへのリンクを隠す',
'setting_block'					=> '新着情報ブロック表示設定',
'hidenewstories'				=> '新着情報ブロック内の記事新着表示',
'hidenewcomments'				=> '新着情報ブロック内のコメント新着表示',
'hidenewtrackbacks'				=> '新着情報ブロック内のトラックバック新着表示',
'hidenewplugins'				=> '新着情報ブロック内のプラグイン新着表示',
'setting_calendar'				=> 'カレンダー設定',
'personalcalendars'				=> '個人のカレンダー機能',
'showupcomingevents'			=> '行事予定を表示',
'upcomingeventsrange'			=> '行事予定を何日先まで表示するか',
'event_types'					=> '行事プルダウンリスト（単語をカンマ区切り）',
'setting_permissions'			=> 'パーミッションデフォルト設定',
'default_permissions_block'		=> 'ブロック新規作成',
'default_permissions_event'		=> 'イベント新規作成',
'default_permissions_story'		=> '記事新規作成',
'default_permissions_topic'		=> '話題新規作成',
'setting_censor'				=> 'バッドワード設定',
'censormode'					=> 'バッドワードチェック',
'censorreplace'					=> 'バッドワードをチェックするとき、バッドワードを置き換える文字列',
'censorlist'					=> 'バッドワードリスト（単語をカンマ区切り）',
'setting_system'				=> 'システム設定',
'setting_domains'				=> '投稿許可ドメイン設定',
'allow_domains'					=> 'ユーザ投稿が可能な場合、投稿の承認待ちをしない自動承認ドメインのリスト（カンマ区切り）',
'setting_url'					=> 'URL設定',
'url_rewrite'					=> 'URLリライト',
'url_rewrite_memo'				=> '※ URLリライトは、検索エンジンの巡回やキャッシュの登録率を高めるため<br>
									機能ONを推奨していますが、サーバ環境によってURLリライトが機能しない<br>
									場合があります。機能しない場合には、個々の記事へのリンクや静的ページ<br>
									へのリンクがエラーとなるので、機能OFFで利用してください。',
'locale_setting'				=> 'ロケール設定',
'locale'						=> 'ロケール',
'locale_memo'					=> 'en_GB<br>C&nbsp;&nbsp;&nbsp;Windows用<br>ja_JP&nbsp;&nbsp;&nbsp;japanese用<br>ja_JP.UTF-8&nbsp;&nbsp;&nbsp;japanese utf-8用',
'date'							=> '日付と時刻の完全な表記',
'daytime'						=> '日付と時刻の短い表記',
'shortdate'						=> '月日のみの表記',
'dateonly'						=> '日付のみの表記',
'timeonly'						=> '時刻のみの表記',
'datetime_char1'				=> '<tt>
									%A - 現在のロケールに基づく完全な曜日の名前     (例:日曜日)<br>
									%B - 現在のロケールに基づく完全な月の名前       (例:2月)<br>
									%a - 現在のロケールに基づく短縮された曜日の名前 (例:日)<br>
									%b - 現在のロケールに基づく短縮された月の名前   (例: 2月)<br>
									%d - 日付を10進数で。(01から31)<br>
									%e - 月単位の日付を10進数で表したもの。日付が1桁の場合は、前に空白を一つ付けます。<br>
									%Y - 世紀を含む年を 10進数で表現<br>
									%m - 月を10進数で表現 (01から12)<br>
									%H - 時間を24時間表示の10進数で(01から23までの範囲)<br>
									%I - 時間を12時間表示の10進数で(01から12までの範囲)<br>
									%M - 分を10進数で表現<br>
									%p - 指定した時間により am または pm または 現在のロケールに対応した文字列<br>
									%Z - タイムゾーンまたはその名前または短縮形<br>
									%x - 時間を除いた日付を現在のロケールに基づき表現します。(例:2001年02月18日)<br>
									%X - 日付を除いた時間を現在のロケールに基づき表現します。(19時32分01秒)<br>
									※ サーバ環境によっては機能しないので注意してください。</tt>',
'week_start'					=> '週の初め',
'sunday'						=> '日曜日',
'monday'						=> '月曜日',
'setting program'				=> 'プログラム環境設定',
'image_lib'						=> '記事投稿でサムネイル作成プログラムの指定',
'image_lib1'					=> 'なし',
'image_lib2'					=> 'gdlib',
'image_lib3'					=> 'imagemagick',
'image_lib4'					=> 'netpbm',
'image_lib_memo'				=> '<tt>
									※サムネイルの作成など画像処理用です。<br>
									※多くのサーバではgdlibがセットアップされているのでgdlibを選択してください。<br>
									gdlibがセットアップされていない場合には、imagemagick, netpbmのうちどれかをインストールして、<br>
									さらにconfig.phpでそれぞれのインストール先のパスを設定してください。<br>
									※正しく選択、設定されていなければサムネイルの作成が行われません。<br>
									</tt>',
'setting_trackback'				=> 'トラックバック設定',
'trackback_enabled'				=> 'トラックバック',
'pingback_enabled'				=> 'ピングバック',
'ping_enabled'					=> 'ピング',
'trackback_code'				=> '記事作成の際のトラックバックデフォルト設定',
'trackback_code1'				=> 'トラックバックを受け付ける',
'trackback_code2'				=> 'トラックバックを受け付けない',
'trackbackspeedlimit'			=> '連続してスパムを受け付けないよう間隔制限',
'setting_rss'					=> 'RSS設定',
'backend'						=> 'RSSファイルを作成',
'rdf_file'						=> 'RSSファイルの場所',
'rdf_file_memo'					=> 'RSSファイルは、あらかじめサーバにパーミッション666の空ファイルをUPしておく必要があります。',
'rdf_limit'						=> 'フィードに出力される記事の最大件数または対象となる時間',
'rdf_limit_memo'				=> '（数字のみなら最大件数、数字の後にhをつけたら時間）',
'rdf_storytext'					=> 'RSSファイルに書き出す内容',
'rdf_storytext_memo'			=> '（1:すべての記事の見出し、2以上:見出しの文字数制限、0:見出しを表示させない）',
'syndication_max_headlines'		=> 'ヘッドライン数制限',
'member_group'					=> '指定したグループ　　　　　　　　',
'member_login'					=> 'ログインしているメンバー　　　　',
'member_nologin'				=> 'ログインしていないゲストユーザ　',
'hour_mode'						=> '時刻の表記方法',
'hour_mode1'					=> '12時間制 am/pm',
'hour_mode2'					=> '24時間制',
'rootdebug'						=> 'rootdebug',
'disallow_domains'				=> '投稿拒否ドメイン設定（カンマ区切り）',
'title_trim_length'				=> '新着情報ブロックでのタイトルの長さ制限',
'draft_flag'					=> '記事新規作成時のドラフト（下書き）デフォルト設定',
'draft_flag1'					=> 'ドラフト（下書き）',
'draft_flag2'					=> 'ノーマル',
'frontpage'						=> '記事新規作成時の表示ページデフォルト設定',
'frontpage1'					=> 'トップページに表示',
'frontpage2'					=> '該当する話題にだけ表示',
'hide_no_news_msg'				=> '記事がない警告メッセージの表示の有無',
'hide_main_page_navigation'		=> 'ページナビゲーションを隠す',
'onlyrootfeatures'				=> 'ルートユーザのみ記事を注目記事にできる',
'option_need'					=> '必要',
'option_noneed'					=> '不要',
'option_show'					=> '表示する',
'option_noshow'					=> '表示しない',
'option_hide'					=> '隠す',
'option_nohide'					=> '隠さない',
'option_allow'					=> '許可する',
'option_noallow'				=> '許可しない',
'option_search'					=> '検索できる',
'option_nosearch'				=> '検索できない',
'option_editview'				=> '編集と閲覧ができる',
'option_view'					=> '閲覧できる',
'option_noview'					=> '閲覧できない',
'option_create'					=> '作成する',
'option_nocreate'				=> '作成しない',
'option_do'						=> 'する',
'option_nodo'					=> 'しない',
'option_edit'					=> '変更できる',
'option_noedit'					=> '変更できない',
'option_delete'					=> '削除できる',
'option_nodelete'				=> '削除できない',
'option_on'						=> 'ON',
'option_off'					=> 'OFF',
'option_functionon'				=> '機能ON',
'option_functionoff'			=> '機能OFF',
'pixel'							=> 'ピクセル',
'day'							=> '日',
'second'						=> '秒',
'submit'						=> '保存',
'default'						=> '初期化',
'backup_button'					=> 'バックアップ',
'restore_button'				=> 'リストア',
'return_default'				=> 'すべての設定が初期値に戻りました。',
'finished_backup'				=> '現在の設定をバックアップしました。',
'finished_restore'				=> 'バックアップに戻しました。',
'return_default_memo'			=> '<tt>
※初期値とはconfig.phpで設定されている値のことです。<br>
※保存：userconfig_now.phpに保存します。<br>
※バックアップ：userconfig_bak.phpに現在の値を保存します。<br>
※リストア：userconfig_bak.phpの値に戻します。<br>
※初期化：config.phpで設定されている値に戻します。
</tt>',
'mail_error'					=> '入力されたメールアドレスが正しくありません。',
'go_index'						=> '最初にもどる',
'japanese'						=> '日本語',
'updating'						=> '・・・更新中・・・',
'setting_comment'				=> 'コメント設定',
'commentspeedlimit'				=> 'コメントの投稿の最小間隔（秒数）',
'comment_limit'					=> '同時に可能なコメントの数',
'comment_mode'					=> 'コメント表示タイプ',
'comment_code'					=> '記事新規作成の場合のコメントに関するデフォルト設定',
'comment_allow'					=> 'コメント許可',
'comment_noallow'				=> 'コメント不可',
'check_trackback_link'			=> 'トラックバックの際に、こちらへのリンクがあるかどうかのチェック',
'check_trackback_link0'			=> 'チェックしない',
'check_trackback_link1'			=> '$_CONF[\'site_url\']のみチェック',
'check_trackback_link2'			=> 'フル URLをチェック',
'multiple_trackbacks'			=> '同じソースからのトラックバックとピングバックの扱いについて',
'multiple_trackbacks0'			=> '最初の投稿のみ有効',
'multiple_trackbacks1'			=> 'オーバーライト',
'multiple_trackbacks2'			=> 'すべて有効',
'pingback_self'					=> 'ピングバックは自動的に記事からリンクされたすべてのＵＲＬに行われる<br>このオプションでセルフピングバックが設定される',
'pingback_self0'				=> 'スキップ',
'pingback_self1'				=> '速度制限を設けて許可する',
'pingback_self2'				=> 'すべて許可',
'setting_blocks'				=> 'ブロック設定',
'show_right_blocks'				=> '常時右メニューを表示する',
'option_yes'					=> 'はい',
'option_no'						=> 'いいえ',
'lang_japanese'					=>'日本語',
'lang_english'					=>'English',
'lang_spanish'					=>'Spanish',
'lang_bulgarian'				=>'Bulgarian',
'lang_hebrew'					=>'Hebrew',
'lang_slovenian'				=>'Slovenian',
'lang_romanian'					=>'Romanian',
'lang_chinese_simplified'			=>'中国語（簡体字）',
'lang_croatian'					=>'Croatian',
'lang_french_canada'				=>'French Canada',
'lang_catalan'					=>'Catalan',
'lang_bosnian'					=>'Bosnian',
'lang_danish'					=>'Danish',
'lang_french_france'				=>'French',
'lang_german_formal'				=>'Deutsch(formal)',
'lang_slovak'					=>'Slovak',
'lang_czech'					=>'Czech',
'lang_turkish'					=>'Turkish',
'lang_portuguese_brazil'			=>'Portuguese(Brazil)',
'lang_dutch'					=>'Dutch',
'lang_italian'					=>'Italian',
'lang_indonesian'				=>'Indonesian',
'lang_portuguese'				=>'Portuguese',
'lang_polish'					=>'Polish',
'lang_finnish'					=>'Finnish',
'lang_korean'					=>'韓国語',
'lang_afrikaans'				=>'Afrikaans',
'lang_swedish'					=>'Swedish',
'lang_russian'					=>'Russian',
'lang_farsi'					=>'Farsi',
'lang_norwegian'				=>'Norwegian',
'lang_chinese_traditional'			=>'中国語（繁体字）',
'lang_spanish_argentina'			=>'Spanish(Argentina)',
'lang_hellenic'					=>'Hellenic',
'lang_german'					=>'Deutsch',
'lang_ukrainian'				=>'Ukrainian'
);

?>
