<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +-------------------------------------------------------------------------+
// | Site Calendar Block  for Geeklog- The Ultimate OSS Portal               |
// | Date: August 10, 2004                                                   |
// +-------------------------------------------------------------------------+
// | Program calsearch.php                                                   |
// +-------------------------------------------------------------------------+
// | Copyright (C) 2003 by the following authors:                            |
// |                                                                         |
// | Author:                                                                 |
// | Blaine Lang                 -    blaine@portalparts.com                 |
// +-------------------------------------------------------------------------+
// |                                                                         |
// | This program is free software; you can redistribute it and/or           |
// | modify it under the terms of the GNU General Public License             |
// | as published by the Free Software Foundation; either version 2          |
// | of the License, or (at your option) any later version.                  |
// |                                                                         |
// | This program is distributed in the hope that it will be useful,         |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.                    |
// | See the GNU General Public License for more details.                    |
// |                                                                         |
// | You should have received a copy of the GNU General Public License       |
// | along with this program; if not, write to the Free Software Foundation, |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.         |
// |                                                                         |
// +-------------------------------------------------------------------------+
//

require_once('../lib-common.php');
require_once($_CONF['path_system'] . 'classes/search.class.php');

Class sitesearch extends Search {

    function sitecalSearch() {

        // Do searches
        $this->story_results = $this->_searchStories();
        $this->comment_results = $this->_searchComments();
//        $this->event_results = $this->_searchEvents();

        // Have plugins do their searches
        list($nrows_plugins, $total_plugins, $result_plugins) = PLG_doSearch($this->_query, $this->_dateStart, $this->_dateEnd, $this->_topic, $this->_type, $this->_author);
        
        // Add the core GL object search results to plugin results
        $nrows_plugins = $nrows_plugins + $this->story_results->num_searchresults;
        $nrows_plugins = $nrows_plugins + $this->comment_results->num_searchresults;
        $nrows_plugins = $nrows_plugins + $this->link_results->num_searchresults;
//        $nrows_plugins = $nrows_plugins + $this->event_results->num_searchresults;
        
        $total_plugins = $total_plugins + $this->story_results->num_itemssearched;
        $total_plugins = $total_plugins + $this->comment_results->num_itemssearched;
        $total_plugins = $total_plugins + $this->link_results->num_itemssearched;
//        $total_plugins = $total_plugins + $this->event_results->num_itemssearched;
        
        // Move GL core objects to front of array
//        array_unshift($result_plugins, $this->story_results, $this->comment_results, $this->link_results, $this->event_results);
        array_unshift($result_plugins, $this->story_results, $this->comment_results, $this->link_results);
        
        // Format results
        if ($nrows_plugins == 0) {
             redirect_header("../index.php","この日の記事・コメント・リンクがありません。");
             exit;
        } else {
            $retval = $this->_formatResults($nrows_plugins, $total_plugins, $result_plugins, $searchtime);
        }
        
        return $retval;
    }
}


function redirect_header($url, $message=""){
    define("_IFNOTRELOAD","もし自動的にリロードされなければ <a href=%s>クリック</a>してください。");
    $time=4;
    $display = COM_siteHeader();
    $display  .= "<html><head>\n";
    $display .= "<meta http-equiv='Content-Type' content='text/html;' />\n";
    $display .= "<meta http-equiv='Refresh' content='$time; url=$url' />\n";
    $display .= "</head><body><div id='content'>\n";
    $display .= COM_startBlock();
    $display .= "<center>";
    if ( $message!="" ) {
        $display .= "<br><p><h4>".$message."</h4>\n";
    }
    $display .= "<br /><b>\n";
    $display .= sprintf(_IFNOTRELOAD,$url);
    $display .= "\n";
    $display .= "<p></center></div>\n";
    $display .= COM_endBlock();
    $display .= COM_siteFooter(false);
    echo $display;
}

$display = COM_siteHeader();
$calSearchObj = new sitesearch;
$calSearchObj->Search();
$display .= $calSearchObj->sitecalSearch();
$display .= COM_siteFooter();
echo $display;



?>