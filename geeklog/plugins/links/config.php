<?php

// Reminder: always indent with 4 spaces (no tabs).
// +---------------------------------------------------------------------------+
// | config.php   Links plugin configuration file                              |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2006 by the following authors:                         |
// |                                                                           |
// | Authors: Tony Bibbs        - tony AT tonybibbs DOT com                    |
// |          Mark Limburg      - mlimburg AT users.sourceforge DOT net        |
// |          Jason Whittenburg - jwhitten AT securitygeeks DOT com            |
// |          Dirk Haun         - dirk AT haun-online DOT de                   |
// +---------------------------------------------------------------------------+
// |                                                                           |
// | This program is licensed under the terms of the GNU General Public License|
// | as published by the Free Software Foundation; either version 2            |
// | of the License, or (at your option) any later version.                    |
// |                                                                           |
// | This program is distributed in the hope that it will be useful,           |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of            |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                      |
// | See the GNU General Public License for more details.                      |
// |                                                                           |
// | You should have received a copy of the GNU General Public License         |
// | along with this program; if not, write to the Free Software Foundation,   |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.           |
// |                                                                           |
// +---------------------------------------------------------------------------+
//
// $Id: config.php,v 1.11 2006/10/10 11:41:16 ospiess Exp $
/**
 * Links plugin configuration file
 *
 * @package Links
 * @filesource
 * @version 1.0.1
 * @since GL 1.4.0
 * @copyright Copyright &copy; 2005-2006
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * @author Trinity Bays <trinity93@steubentech.com>
 * @author Tony Bibbs <tony@tonybibbs.com>
 * @author Tom Willett <twillett@users.sourceforge.net>
 * @author Blaine Lang <langmail@sympatico.ca>
 * @author Dirk Haun <dirk@haun-online.de>
 *
 */

/**
* the link plugin's config aray
*
* @global array $_LI_CONF
*/
$_LI_CONF = array();

/**
* the link plugin's version setting
*
* @global array $_LI_CONF['version']
*/
$_LI_CONF['version'] = '1.0.1';          // Plugin Version

/**
 * リンクにおけるログイン要求 1:必要 0:不要
 *
 * @global array $_LI_CONF['linksloginrequired']
 */
$_LI_CONF['linksloginrequired'] = 0;

/**
 * 管理者の承認なしに公開されるか否かの設定
 * 1:承認必要　0:承認不要
 *
 * @global array $_LI_CONF['linksubmission']
 */
$_LI_CONF['linksubmission']  = 1;

/**
 * 新着ブロックに表示する投稿の期間
 *
 * @global array $_LI_CONF['newlinksinterval']
 */
$_LI_CONF['newlinksinterval']    = 1209600; // = 14日

/**
 * 新着情報ブロック表示　1:隠す 0:表示
 *
 * @global array $_LI_CONF['hidenewlinks']
 */
$_LI_CONF['hidenewlinks']    = 0;

/**
 * ヘッダメニューリンク　1:隠す 0:表示
 *
 * @global array $_LI_CONF['hidelinksmenu']
 */
$_LI_CONF['hidelinksmenu']    = 0;

/**
 * カテゴリの階層
 * 0:階層なし．（リンク一覧のみ）3:1階層　6:カテゴリ2階層
 *
 * @global array $_LI_CONF['linkcols']
 */
$_LI_CONF['linkcols']     =  3;

/**
 * １ページあたりの表示件数
 *
 * @global array $_LI_CONF['linksperpage']
 */
$_LI_CONF['linksperpage'] = 10;

/**
 * トップ10リンクリスト　true:表示 false:表示しない
 *
 * @global array $_LI_CONF['show_top10']
 */
$_LI_CONF['show_top10']   = true;

/**
 * リンクが新規投稿されたときに管理者へ通知　1:通知する 0:通知しない
 *
 * @global array $_LI_CONF['notification']
 */
$_LI_CONF['notification'] = 0;

/**
 * 所有者が退会したとき　1:削除　0:Rootユーザへ所有が移る
 *
 * @global array $_LI_CONF['delete_links']
 */
$_LI_CONF['delete_links'] = 0;

/**
 * 管理者の静的ページ管理画面で新規作成の際のパーミッションのデフォルトを設定。
 * 所有者、グループ、メンバ、ゲストユーザごとに、次の値を設定できます。
 * 3 = R:閲覧 + E:編集(所有者、グループのみ)
 * 2 = R:閲覧のみ
 * 0 = どちらも許可しない
 *
 * @global array $_LI_CONF['default_permissions']
 */
$_LI_CONF['default_permissions'] = array (3, 2, 2, 2);

// データベーステーブル名 - 変更禁止
$_TABLES['links']               = $_DB_table_prefix . 'links';
$_TABLES['linksubmission']      = $_DB_table_prefix . 'linksubmission';

?>
