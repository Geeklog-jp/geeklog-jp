<?php
//
// +---------------------------------------------------------------------------+
// | Data Proxy Plugin for Geeklog - The Ultimate Weblog                       |
// +---------------------------------------------------------------------------+
// | geeklog/plugins/dataproxy/drivers/article.class.php                       |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), 'article.class.php') !== FALSE) {
    die('This file can not be used on its own.');
}

class Dataproxy_article extends DataproxyDriver
{
	var $driver_name = 'article';
	
	public function getChildCategories($pid = FALSE, $all_langs = FALSE)
	{
		global $_CONF, $_TABLES;
		
		$retval = array();
		
		if ($pid !== FALSE) {
			return $retval;
		}
		
		$where = FALSE;
		$sql = "SELECT tid, topic, imageurl FROM {$_TABLES['topics']} ";
		
		if ($this->uid > 1) {
			$tids = DB_getItem(
				$_TABLES['userindex'], 'tids', "uid = '" . $this->uid . "'"
			);
			
			if (!empty($tids)) {
				$sql .= ($where === TRUE) ? ' AND' : ' WHERE';
				$sql .= "(tid NOT IN ('"
					 . str_replace(' ', "','", addslashes($tids)) . "'))";
				$where = TRUE;
			}
		}
		
		// Adds permission check.  When uid is 0, then it means access as Root
		if ($this->uid > 0) {
			if ($where === TRUE) {
				$sql .= COM_getPermSQL('AND', $this->uid);
			} else {
				$sql .= COM_getPermSQL('WHERE', $this->uid);
			}
		}

		// Adds lang id.  When uid is 0, then it means access as Root
		if (($this->uid > 0) AND function_exists('COM_getLangSQL')
		 AND $all_langs === FALSE) {
			$where = (strpos($sql, 'WHERE') !== FALSE) ? TRUE : FALSE;
			
			if ($where === TRUE) {
				$sql .= COM_getLangSQL('tid', 'AND');
			} else {
				$sql .= COM_getLangSQL('tid', 'WHERE');
			}
		}
		
		if ($_CONF['sortmethod'] == 'alpha') {
			$sql .= ' ORDER BY topic ASC';
		} else {
			$sql .= ' ORDER BY sortnum';
		}
		
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $retval;
		}
		
		while (($A = DB_fetchArray($result, FALSE)) !== FALSE) {
			$entry = array();
			$entry['id']        = stripslashes($A['tid']);
			$entry['title']     = stripslashes($A['topic']);
			$entry['uri']       = $_CONF['site_url'] . '/index.php?topic=' . $entry['id'];
			$entry['date']      = FALSE;
			$entry['image_uri'] = stripslashes($A['imageurl']);
			$retval[] = $entry;
		}
		
		return $retval;
	}
	
	/**
	* @param $all_langs boolean: TRUE = all languages, TRUE = current language
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
			 . "FROM {$_TABLES['stories']} "
			 . "WHERE (sid ='" . addslashes($id) . "') "
			 . "AND (draft_flag = 0) AND (date <= NOW()) ";
		
		if ($this->uid > 0) {
			$sql .= COM_getTopicSql('AND', $this->uid)
				 .  COM_getPermSql('AND', $this->uid);
			
			if (function_exists('COM_getLangSQL') AND ($all_langs === FALSE)) {
				$sql .= COM_getLangSQL('sid', 'AND');
			}
		}
		
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $retval;
		}
		
		if (DB_numRows($result) == 1) {
			$A = DB_fetchArray($result, FALSE);
			$A = array_map('stripslashes', $A);
			
			$retval['id']        = $id;
			$retval['title']     = $A['title'];
			$retval['uri']       = COM_buildUrl(
				$_CONF['site_url'] . '/article.php?story=' . $id
			);
			$retval['date']      = strtotime($A['date']);
			$retval['image_uri'] = FALSE;
			$retval['raw_data']  = $A;
		}
		
		return $retval;
	}
	
	/**
	* Returns an array of (
	*   'id'        => $id (string),
	*   'title'     => $title (string),
	*   'uri'       => $uri (string),
	*   'date'      => $date (int: Unix timestamp),
	*   'image_uri' => $image_uri (string)
	* )
	*/
	public function getItems($tid, $all_langs = FALSE)
	{
		global $_CONF, $_TABLES;
		
		$retval = array();
		$sql = "SELECT sid, title, UNIX_TIMESTAMP(date) AS day "
			 . "FROM {$_TABLES['stories']} WHERE (draft_flag = 0) AND (date <= NOW()) "
			 . "AND (tid = '" . addslashes($tid) . "') ";
		
		if ($this->uid > 0) {
			$sql .= COM_getTopicSql('AND', $this->uid)
			     .  COM_getPermSql('AND', $this->uid);
			
			if (function_exists('COM_getLangSQL') AND ($all_langs === FALSE)) {
				$sql .= COM_getLangSQL('sid', 'AND');
			}
		}
		$sql .= " ORDER BY date DESC";
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $retval;
		}
		
		$entries = array();
		
		while (($A = DB_fetchArray($result, FALSE)) !== FALSE) {
			$entry = array();
			$entry['id']       = stripslashes($A['sid']);
			$entry['title']    = stripslashes($A['title']);
			$entry['uri']      = COM_buildUrl(
				$_CONF['site_url'] . '/article.php?story='
				 . stripslashes($A['sid'])
			);
			$entry['date']     = $A['day'];
			$entry['imageurl'] = FALSE;
			$retval[] = $entry;
		}
		
		return $retval;
	}
	
	/**
	* Returns an array of (
	*   'id'        => $id (string),
	*   'title'     => $title (string),
	*   'uri'       => $uri (string),
	*   'date'      => $date (int: Unix timestamp),
	*   'image_uri' => $image_uri (string)
	* )
	*/
	public function getItemsByDate($tid = '', $all_langs = FALSE)
	{
		global $_CONF, $_TABLES;
		
		$entries = array();
		
		if (empty($this->startdate) OR empty($this->enddate)) {
			return $entries;
		}
		
		$sql = "SELECT sid, title, UNIX_TIMESTAMP(date) AS day "
			 . "FROM {$_TABLES['stories']} "
			 . "WHERE (draft_flag = 0) AND (date <= NOW()) "
			 . "AND (UNIX_TIMESTAMP(date) BETWEEN '$this->startdate' AND '$this->enddate') ";
		if (!empty($tid)) {
			$sql .= "AND (tid = '" . addslashes($tid) . "') ";
		}
		
		if ($this->uid > 0) {
			$sql .= COM_getTopicSql('AND', $this->uid)
				 .  COM_getPermSql('AND', $this->uid);
			
			if (function_exists('COM_getLangSQL') AND ($all_langs === FALSE)) {
				$sql .= COM_getLangSQL('sid', 'AND');
			}
		}
		
		$result = DB_query($sql);
		
		if (DB_error()) {
			return $entries;
		}
		
		while (($A = DB_fetchArray($result, FALSE)) !== FALSE) {
			$entry = array();
			$entry['id']       = stripslashes($A['sid']);
			$entry['title']    = stripslashes($A['title']);
			$entry['uri']      = COM_buildUrl(
				$_CONF['site_url'] . '/article.php?story='
				 . stripslashes($A['sid'])
			);
			$entry['date']     = $A['day'];
			$entry['imageurl'] = FALSE;
			$entries[] = $entry;
		}
		
		return $entries;
	}
}
