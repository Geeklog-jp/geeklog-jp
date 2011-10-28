<?php
//
// +---------------------------------------------------------------------------+
// | Data Proxy Plugin for Geeklog - The Ultimate Weblog                       |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/dataproxy/drivers/staticpages.class.php                   |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2007-2011 mystral-kk - geeklog AT mystral-kk DOT net        |
// |                                                                           |
// | Constructed with the Universal Plugin                                     |
// | Copyright (C) 2002 by the following authors:                              |
// | Tom Willett                 -    twillett@users.sourceforge.net           |
// | Blaine Lang                 -    langmail@sympatico.ca                    |
// | The Universal Plugin is based on prior work by:                           |
// | Tony Bibbs                  -    tony@tonybibbs.com                       |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), 'staticpages.class.php') !== FALSE) {
    die('This file can not be used on its own.');
}

class Dataproxy_staticpages extends DataproxyDriver
{
	public $driver_name = 'staticpages';
	public $_isSP162 = FALSE;	// Whether Staticpages-1.6.2 or later
	
	/**
	* Constructor
	*
	* @param $parent    ref. to an object
	* @param $uid       int                0 (= Root), 1(= anon), user id
	* @param $encoding  string             encoding of the content
	* @param $options   array
	*/
	public function __construct(&$parent, $uid = 1, $encoding = 'utf-8',
			$options = array())
	{
		global $_TABLES;
		
		parent::__construct($parent, $uid, $encoding, $options);
		
		$pi_version = DB_getItem(
			$_TABLES['plugins'], 'pi_version', "pi_name = 'staticpages'"
		);
		$this->_isSP162 = (version_compare($pi_version, '1.6.2') >= 0);
	}
	
	/**
	* Returns array of (
	*   'id'        => $id (string),
	*   'title'     => $title (string),
	*   'uri'       => $uri (string),
	*   'date'      => $date (int: Unix timestamp),
	*   'image_uri' => $image_uri (string),
	*   'raw_data'  => raw data of the item (stripslashed)
	* )
	*/
	public function getItemById($id, $all_langs = FALSE)
	{
	    global $_CONF, $_TABLES;
		
		$retval = array();
		
		$sql = "SELECT * "
			 . "FROM {$_TABLES['staticpage']} "
			 . "WHERE (sp_id = '" . addslashes($id) . "') ";
		
		if ($this->_isSP162) {
			$sql .= "AND (draft_flag = 0) ";
		}
		
		if ($this->uid > 0) {
			$sql .= COM_getPermSql('AND', $this->uid);
		}
		
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $retval;
		}
		
		if (DB_numRows($result) == 1) {
			$A = DB_fetchArray($result, FALSE);
			$A = array_map('stripslashes', $A);
			
			$retval['id']        = $id;
			$retval['title']     = $A['sp_title'];
			$retval['uri']       = COM_buildURL(
				$_CONF['site_url'] . '/staticpages/index.php?page='
				. rawurlencode($id)
			);
			
			if ($this->_isGL170) {
				$retval['date'] = strtotime($A['modified']);
			} else {
				$retval['date'] = strtotime($A['sp_date']);
			}
			
			$retval['image_uri'] = FALSE;
			$retval['raw_data']  = $A;
		}
		
		return $retval;
	}
	
	/**
	* @note This function ignores static pages which are displayed in the
	*       center blok.
	* @refer $_SP_CONF['sort_by']
	*
	* Returns an array of (
	*   'id'        => $id (string),
	*   'title'     => $title (string),
	*   'uri'       => $uri (string),
	*   'date'      => $date (int: Unix timestamp),
	*   'image_uri' => $image_uri (string)
	* )
	*/
	public function getItems($category, $all_langs = FALSE)
	{
		global $_CONF, $_TABLES, $_SP_CONF;
		
		$entries = array();
		
		if ($this->_isGL170) {
			$sql = "SELECT sp_id, sp_title, UNIX_TIMESTAMP(modified) AS day "
				 . "FROM {$_TABLES['staticpage']} ";
		} else {
			$sql = "SELECT sp_id, sp_title, UNIX_TIMESTAMP(sp_date) AS day "
				 . "FROM {$_TABLES['staticpage']} ";
		}
		
		if ($this->_isSP162) {
			$sql .= "WHERE (draft_flag = 0) ";
		} else {
			$sql .= "WHERE (1 = 1) ";
		}
		
		if ($this->uid > 0) {
			$sql .= COM_getPermSql('AND', $this->uid);
		}
		
		if (in_array($_SP_CONF['sort_by'], array('id', 'title', 'date'))) {
			$crit = $_SP_CONF['sort_by'];
		} else {
			$crit = 'id';
		}
		
		$crit = 'sp_' . $crit;
		
		if ($this->_isGL170 AND ($crit === 'sp_date')) {
			$crit = 'modified';
		}
		
		$sql .= " ORDER BY " . $crit;
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $entries;
		}
		
		while (($A = DB_fetchArray($result, FALSE)) !== FALSE) {
			$entry = array();
			$entry['id']        = stripslashes($A['sp_id']);
			$entry['title']     = stripslashes($A['sp_title']);
			$entry['uri']       = COM_buildURL(
				$_CONF['site_url'] . '/staticpages/index.php?page='
				. rawurlencode($entry['id'])
			);
			$entry['date']      = $A['day'];
			$entry['image_uri'] = FALSE;
			$entries[] = $entry;
		}
		
		return $entries;
	}
	
	/**
	* @note This function ignores static pages which are displayed in the
	*       center blok.
	* @refer $_SP_CONF['sort_by']
	*
	* Returns an array of (
	*   'id'        => $id (string),
	*   'title'     => $title (string),
	*   'uri'       => $uri (string),
	*   'date'      => $date (int: Unix timestamp),
	*   'image_uri' => $image_uri (string)
	* )
	*/
	public function getItemsByDate($category = '', $all_langs = FALSE)
	{
		global $_CONF, $_TABLES, $_SP_CONF;
		
		$entries = array();
		
		if (empty($this->startdate) OR empty($this->enddate)) {
			return $entries;
		}
		
		if ($this->_isGL170) {
			$sql = "SELECT sp_id, sp_title, UNIX_TIMESTAMP(modified) AS day "
				 . "FROM {$_TABLES['staticpage']} "
				 . "WHERE (UNIX_TIMESTAMP(modified) BETWEEN '$this->startdate' AND '$this->enddate') ";
		} else {
			$sql = "SELECT sp_id, sp_title, UNIX_TIMESTAMP(sp_date) AS day "
				 . "FROM {$_TABLES['staticpage']} "
				 . "WHERE (UNIX_TIMESTAMP(sp_date) BETWEEN '$this->startdate' AND '$this->enddate') ";
		}
		
		if ($this->_isSP162) {
			$sql .= "AND (draft_flag = 0) ";
		}
		
		if ($this->uid > 0) {
			$sql .= COM_getPermSql('AND', $this->uid);
		}
		
		if (in_array($_SP_CONF['sort_by'], array('id', 'title', 'date'))) {
			$crit = $_SP_CONF['sort_by'];
		} else {
			$crit = 'id';
		}
		
		$crit = 'sp_' . $crit;
		
		if ($this->_isGL170 AND ($crit === 'sp_date')) {
			$crit = 'modified';
		}
		
		$sql .= " ORDER BY " . $crit;
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $entries;
		}
		
		while (($A = DB_fetchArray($result, FALSE)) !== FALSE) {
			$entry = array();
			$entry['id']        = stripslashes($A['sp_id']);
			$entry['title']     = stripslashes($A['sp_title']);
			$entry['uri']       = COM_buildURL(
				$_CONF['site_url'] . '/staticpages/index.php?page='
				. rawurlencode($entry['id'])
			);
			$entry['date']      = $A['day'];
			$entry['image_uri'] = FALSE;
			$entries[] = $entry;
		}
		
		return $entries;
	}
}
