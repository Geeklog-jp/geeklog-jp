<?php
// +---------------------------------------------------------------------------+
// | CAPTCHA v4 Plugin                                                         |
// +---------------------------------------------------------------------------+
// | This is the Japanese language page for the CAPTCHA Plugin                 |
// +---------------------------------------------------------------------------|
// | Copyright (C) 2002,2005,2006,2007 by the following authors:               |
// |                                                                           |
// | Author: mystral-kk    - geeklog AT mystral-kk DOT net                     |
// |         Hiroron       - hiroron AT hiroron DOT com                        |
// +---------------------------------------------------------------------------|
// |                                                                           |
// | If you translate this file, please consider uploading a copy at           |
// |    http://www.mediagallery.org so others can benefit from your            |
// |    translation.  Thank you!                                               |
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
// | along with this program; if not, write to the Free Software               |
// | Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA|
// |                                                                           |
// +---------------------------------------------------------------------------|

$LANG_CP00 = array (
    'menulabel'         => 'CAPTCHA',
    'plugin'            => 'CAPTCHA',
    'access_denied'     => 'アクセス拒否',
    'access_denied_msg' => 'このページにアクセスする適切なセキュリティ権限がありません。あなたのユーザー名とIPアドレスを記録しました。',
    'admin'             => 'CAPTCHA 管理画面',
    'install_header'    => 'CAPTCHAプラグイン インストール',
    'installed'         => 'CAPTCHAプラグインはインストール済みです。',
    'uninstalled'       => 'CAPTCHAプラグインはインストールしていません。',
    'install_success'   => 'CAPTCHAプラグインのインストールに成功しました。<br /><br /><a href="%s">管理画面</a>をご覧ください。',
    'install_failed'    => 'インストールに失敗しました。 -- エラーログをご覧ください。',
    'uninstall_msg'     => 'プラグインをアンインストールに成功しました。',
    'install'           => 'インストール',
    'uninstall'         => 'アンインストール',
    'warning'           => '警告! まだプラグインが有効です。',
    'enabled'           => 'プラグイン無効',
    'readme'            => 'CAPTCHAプラグインをインストール・アンインストールします。',
    'installdoc'        => "<a href=\"{$_CONF['site_admin_url']}/plugins/captcha/install_doc.html\">インストールドキュメント</a>",
    'overview'          => 'CAPTCHAはGeeklog固有のプラグインで、spambotsに対するセキュリティに追加のレイヤーを提供します。<br' . XHTML . '><br' . XHTML '>' .
							'CAPTCHAは("Completely Automated Public Turing test to tell Computers and Humans Apart"の省略で、カーネギーメロン大学の商標で)、ユーザーが人かどうかを決めるためにコンピューターで使用するチャレンジ・レスポンス方式のテストです。読みにくい文字や数字の図を示すと、人だけが読めて適切な文字を入力できると仮定しています。CAPTCHAのテストの実装は、サイトへのspambotによる投稿を減らすことに役立つでしょう。',
    'details'           => 'CAPTCHAプラグインでCAPTCHA画像はTrue Type fonts(TTF)に対応したGDまたはImageMagick画像ライブラリで作成します。ホスティングプロバイダーにTTFをサポートしているかどうか確認してください。',
    'preinstall_check'  => 'CAPTCHAプレインストールチェック:',
    'geeklog_check'     => 'Geeklog 1.4.1以上、現バージョン: <b>%s</b>.',
    'php_check'         => 'PHP v4.3.0以上、現バージョン: <b>%s</b>.',
    'preinstall_confirm' => "CAPTCHAインストールの詳細は<a href=\"{$_CONF['site_admin_url']}/plugins/captcha/install_doc.html\">インストールマニュアル</a>を。",
    'refresh'			=> '<a href="' . $_CONF['site_url'] . '/users.php?mode=new">新イメージ</a>',
    'captcha_help'		=> 'テキストを入力してください。大文字と小文字に注意してください。',
    'bypass_error'		=> "CAPTCHA処理を行います。",
    'bypass_error_blank' => "テキストを入力してください。",
    'entry_error'		=> 'CAPTCHAテキストが合致しませんでした。再度入力してください。<b>大文字と小文字に注意してください。</b>',
    'captcha_info'      => 'CAPTCHAプラグインはあなたのGeeklogサイトをSpamBotsから守ります。',
    'enabled_header'    => '現在のCAPTCHA設定',
    'view_logfile'      => 'CAPTCHA ログ閲覧',
    'log_viewer'        => 'Geeklog ログビューワー',
    'setting_all'       => 'すべて',
    'setting_general'   => '基本',
    'setting_auth_sister' => '妹認証',
    'on'                => 'オン',
    'off'               => 'オフ',
    'anonymous_only'    => 'ゲストユーザーのみ対象とする',
    'enable_comment'    => 'コメント',
    'enable_story'      => '記事投稿',
    'enable_registration' => 'アカウント登録',
    'enable_contact'    => 'コンタクト',
    'enable_emailstory' => '記事メール送信',
    'enable_forum'      => '掲示板',
    'enable_mediagallery' => 'メディアギャラリー(Postcards)',
    'captcha_alt'       => '画像認証',
    'save'              => '保存',
    'cancel'            => 'キャンセル',
    'success'           => 'コンフィギュレーションオプションを保存しました。',
    'gfx_driver'        => 'グラフィックドライバー',
    'gfx_format'        => 'グラフィックフォーマット',
    'convert_path'      => 'ImageMagick変換ユーティリティへのフルパス',
    'gd_libs'           => 'GDライブラリ',
    'gd_sister_libs'    => 'GDライブラリ(妹認証)',
    'imagemagick'       => 'ImageMagick',
    'static_images'     => '固定画像利用',
    'image_set'			=> '固定画像セット',
    'debug'             => 'デバッグ',
    'configuration'     => 'CAPTCHAの設定',
    'integration'       => 'CAPTCHAの統合',
    'reload'            => '新しい画像',
    'reload_failed'     => 'CAPTCHAの自動ロードできませんでした。<br>フォームを提出すると新しい認証用画像を読み込みます。',
    'reload_too_many'   => '画像の再表示は5回までです。',
    'session_expired'   => 'CAPTCHAセッションの期限が切れています、やり直してください。',
    'remoteusers'       => 'リモートユーザーにCAPTHAを使用',
);

$PLG_captcha_MESSAGE1 = 'CAPTCHAプラグインをインストールしました。';
$PLG_captcha_MESSAGE2 = 'CAPTCHAプラグインのインストールに失敗しました。エラーログをチェックしてください。';

$LANG_CP10 = array (
    'auth_sister'       => '妹認証の設定',
    'auth_sister_package' => '妹(パッケージ)の設定',
    'sister_mes_a'      => 'メッセージ先頭に付加する文字列',
    'sister_mes_b'      => 'メッセージ最後に付加する文字列',
    'sister_len_min'    => '回答文の最小文字数',
    'sister_len_max'    => '回答文の最大文字数',
    'sister_outlen'     => '文字数範囲外のエラー文',
    'sister_image'      => '妹画像ファイル',
    'new_sister_image'  => 'あたらしく妹画像をアップロードする',
    'sister_font'       => 'TTFフォント',
    'new_sister_font'   => 'あたらしくTTFフォントをアップロードする',
    'sister_fsize'      => '文字サイズ',
    'sister_fx'         => '文字のX座標',
    'sister_fy'         => '文字のY座標',
    'sister_words'      => '妹の辞書',
    'sister_css'        => '妹のスタイルシート',
);

?>