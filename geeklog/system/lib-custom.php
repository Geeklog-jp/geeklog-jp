<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.4                                                               |
// +---------------------------------------------------------------------------+
// | lib-custom.php                                                            |
// |                                                                           |
// | Your very own custom Geeklog library.                                     |
// |                                                                           |
// | This is the file where you should put all of your custom code.  When      |
// | possible you should not alter lib-common.php but, instead, put code here. |
// | This will make upgrading to future versions of Geeklog easier for you     |
// | because you will always be guaranteed that the Geeklog developers will    |
// | NOT add required code to this file.                                       |
// |                                                                           |
// | NOTE: we have already gone through the trouble of making sure that we     |
// | always include this file when lib-common.php is included some place so    |
// | you will have access to lib-common.php.  It follows then that you should  |
// | not include lib-common.php in this file.                                  |
// |                                                                           |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs       - tony AT tonybibbs DOT com                     |
// |          Blaine Lang      - blaine AT portalparts DOT com                 |
// |          Dirk Haun        - dirk AT haun-online DOT de                    |
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
// +---------------------------------------------------------------------------+
// | 詳細情報は、Geeklog Japanese Wikiドキュメント をご覧ください。            |
// | http://wiki.geeklog.jp/index.php/Lib_custom                               |
// +---------------------------------------------------------------------------+
// $Id: lib-custom.php,v 1.36 2006/12/14 05:19:58 blaine Exp $
// Geeklog 1.4.1用です。
//    追加された関数    custom_loginerrorhandler custom_handleerror
// modified 2007/04/19 geeklog.jp project http://www.geeklog.jp/

if (strpos ($_SERVER['PHP_SELF'], 'lib-custom.php') !== false) {
    die ('このファイルは単独では機能しません。');
}

// +---------------------------------------------------------------------------+
// $_CST_VERBOSE は、エラーログにメッセージを記録するかどうかを制御します。
// カスタム関数を作成時やGeeklogの導入当初は $_CST_VERBOSE を true にして
// メッセージを書き出す。
// 動作が安定してきたら $_CST_VERBOSE を false にして出力を抑え不要なメッセージ
// が記録されないようにする。
// この変数の使い方についてはlib-common.php で $_COM_VERBOSE がどのように使われ
// ているかを見て参考にして下さい。
$_CST_VERBOSE = false;
// +---------------------------------------------------------------------------+

// +---------------------------------------------------------------------------+
//                               カスタム関数
// 本体に組み込まれて機能する関数です。カスタム関数はユーザが独自に開発するため
// のしくみです。バージョンアップ・セキュリティメンテナンスに備えて、本体ソース
// を改変せず、できるだけカスタム関数でカスタマイズします。ここではサンプルを提
// 供。
// +---------------------------------------------------------------------------+

//custom email のサンプル
//デフォルトは、CUSTOM_mail関数がコメントアウトした状態になっています。
//標準で不具合がある場合は 下記のファイルの名前を変えて試すことができます。
// custom/custom_mail_jis.php
// custom/custom_mail_SAMPLE2.php
// require_once( 'custom/custom_mail.php' );

// ※従来の日本語メール(jpmail)プラグインは非推奨となりました。jpmailプラグインと
//   custom_mail_20071025.phpは同時に使用できません。先にjpmailプラグインをアンイ
//   ンストールしてください。
//@@@@@20080709 custom_mail_jp.php に変更
//require_once( 'custom/custom_mail_20071025.php' );
require_once( 'custom/custom_mail_jp.php' );

// customメニューを表示するサンプル
// config.php にて  $_CONF['menu_elements'] に'custom'を設定すると有効
require_once( 'custom/custom_menuentries.php' );

// データベース自動バックアップ等定期的に実行したい処理を記述します。
// 注：1.4.1からファイル名および関数名が変わりました。
//     CUSTOM_runSheduledTask →CUSTOM_runScheduledTask
// require_once( 'custom/custom_runscheduledtask.php' );

//ユーザー情報時に呼ばれる。
require_once( 'custom/custom_showblocks.php' );

//ヘッダーやフッターに独自のテンプレート変数を追加する
require_once( 'custom/custom_templatesetvars.php' );

// カスタム ユーザ設定
// ユーザー情報の作成・更新・削除にカスタマイズされた処理を追加する
// config.php にて $_CONF['custom_registration'] を true に設定すると有効
require_once( 'custom/custom_users.php' );
//require_once( 'custom/custom_users_for_wwwivywe.php.php' );

// ケータイ対応
// User Agentを見て、ケータイからのアクセスであればケータイ用のページを生成しま
// す。
require_once( 'custom/custom_cellular.php' );


/**
* Example of custom function that can be used to handle a login error.
* Only active with custom registration mode enabled
* Used if you have a custom front page and need to trap and reformat any error messages
* This example redirects to the front page with a extra passed variable plus the message
* Note: Message could be a string but in this case maps to $MESSAGE[81] as a default - edit in language file
*/
require_once( 'custom/custom_loginerrorhandler.php' );


/**
  * This is an example of an error handler override. This will be used in
  * place of COM_handleError if the user is not in the Root group. Really,
  * this should only be used to display some nice pretty "site error" html.
  * Though you could try and notify the sysadmin, and log the error, as this
  * example will show. The function is commented out for saftey.
  */
require_once( 'custom/custom_handleerror.php' );

// 静的ページ実行 20071025版より追加
//ヘッダテンプレートなどPHPを実行できるテンプレートから
//静的ページをidで指定して実行するためのカスタム関数。
require_once( 'custom/custom_getstaticpage.php' );


// +---------------------------------------------------------------------------+
//                               PHPブロック関数
// PHPブロックでは、接頭子phpblock_がついた関数しか指定できません。
// PHPブロックで以下の関数名を指定、あるいは静的ページPHPにecho 関数();を記述し
// て機能
// PHPブロックで関数は、ダウンロードサイトから多数提供されています。
// 必要なPHPブロックで関数をダウンロードあるいは開発して埋め込むことでカスタマイ
// ズが可能です。
// +---------------------------------------------------------------------------+


// サイトカレンダPHPブロック関数を組み込む
require_once( 'custom/phpblock_mycal.php' );
require_once( 'custom/phpblock_mycaljp.php' );

// ユーザ権限PHPブロック関数を組み込む
require_once( 'custom/phpblock_showrights.php' );

// テーマテスタPHPブロック関数を組み込む
require_once( 'custom/phpblock_themetester.php' );

// サイトマップメニューPHPブロック関数を組み込む
require_once( 'custom/phpblock_sitemapmenu.php' );

// アクセスカウンタ表示PHPブロック関数を組み込む
require_once( 'custom/phpblock_stats.php' );

// トピックリスト表示
// require_once( 'custom/phpblock_topiclist.php' );

// 新着記事表示
require_once( 'custom/phpblock_lastarticles.php' );



?>
