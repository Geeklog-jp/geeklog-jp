<?php
/* Reminder: always indent with 4 spaces (no tabs). */
// +-------------------------------------------------------------------------+
// | Geeklog Site Calendar Plugin 'mycaljp' version 2.0.1                    |
// | Only Supported with Geeklog 1.4.1 and new Search Class                  |
// +-------------------------------------------------------------------------+
// | calsearch.php                                                           |
// +-------------------------------------------------------------------------+
// | Copyright (C) 2003-2007 by the following authors:                       |
// | Author:   Blaine Lang      - blaine@portalparts.com                     |
// | Modified: Yoshinori Tahara - dengen                                     |
// +-------------------------------------------------------------------------+
// |                                                                         |
// | This program is free software; you can redistribute it and/or           |
// | modify it under the terms of the GNU General Public License             |
// | as published by the Free Software Foundation; either version 2          |
// | of the License, or (at your option) any later version.                  |
// |                                                                         |
// | This program is distributed in the hope that it will be useful,         |
// | but WITHOUT ANY WARRANTY; without even the implied warranty of          |
// | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           |
// | GNU General Public License for more details.                            |
// |                                                                         |
// | You should have received a copy of the GNU General Public License       |
// | along with this program; if not, write to the Free Software Foundation, |
// | Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.         |
// |                                                                         |
// +-------------------------------------------------------------------------+
//

require_once('../lib-common.php');
require_once($_CONF['path_system'] . 'classes/search.class.php');
require_once($_CONF['path_system'] . 'lib-story.php');

if ( isset($_GET['month']) )
    $GLOBALS['WorkDate'] = $_GET['month'];
elseif ( isset($_GET['datestart']) )
    $GLOBALS['WorkDate'] = $_GET['datestart'];


Class calSearch extends Search {

    var $_num_pages = 0;
    var $_num_stories = 0;

    // Constructor
    function calSearch() {
        parent::Search();
    }

    function doSearch() {

        global $_PLUGINS, $_MYCALJP2_CONF;

        // Start search timer
        $searchtimer = new timerobject();
        $searchtimer->setPercision(4);
        $searchtimer->startTimer();

        $retval = '';

        // Do searches
        $result_plugins = array();
        $nrows_plugins = 0;
        $total_plugins = 0;
        foreach ($_MYCALJP2_CONF['contents'] as $pi_name) {
            if ( $pi_name == 'stories' ) {
                if ( ! $_MYCALJP2_CONF['showstoriesintro'] )
                    $this->story_results = $this->_searchStories();
                else
                    $retval .= $this->show_stories_intro();
            } else if ( $pi_name == 'comments' ) {
                $this->comment_results = $this->_searchComments();
            } else if ( empty($this->_topic) ) {
                // Have plugins do their searches ( PLG_doSearch() base )
//                if ( in_array( $pi_name, $_PLUGINS ) ) {
                if ( in_array( $pi_name, $_PLUGINS ) && $this->pi_enabled($pi_name) ) {
                    $function = 'plugin_dopluginsearch_' . $pi_name;

                    if ( $pi_name == "calendar" ) $function .= '_mod';

                    if ( function_exists($function) ) {
                        $this->_keyType = 'phrase';
                        $plugin_result = $function($this->_query, $this->_dateStart, $this->_dateEnd, $this->_topic, $this->_type, $this->_author, $this->_keyType, $this->_page, $this->_per_page);
                        $nrows_plugins = $nrows_plugins + $plugin_result->num_searchresults;
                        $total_plugins = $total_plugins + $plugin_result->num_itemssearched;
                        $result_plugins[] = $plugin_result;
                    }
                }
            }
        }

        // Add the core GL object search results to plugin results
        $nrows_plugins = $nrows_plugins + $this->story_results->num_searchresults;
        $nrows_plugins = $nrows_plugins + $this->comment_results->num_searchresults;

        $total_plugins = $total_plugins + $this->story_results->num_itemssearched;
        $total_plugins = $total_plugins + $this->comment_results->num_itemssearched;

        // Move GL core objects to front of array
        array_unshift($result_plugins, $this->story_results, $this->comment_results);

        // Searches are done, stop timer
        $searchtime = $searchtimer->stopTimer();

        // Format results
        $retval = $this->_formatResults($nrows_plugins, $total_plugins, $result_plugins, $searchtime, $retval);

        // Print Google-like paging navigation
        $retval .= $this->printPageNavigation();

        return $retval;
    }

    function pi_enabled($pi_name)
    {
        global $_TABLES;

        return ( DB_getItem($_TABLES['plugins'], 'pi_enabled', "pi_name = '$pi_name'") == 1 );
    }


    /**
    * Gets formatted output of all searches
    *
    * @author Tony Bibbs <tony AT geeklog DOT net>
    * @access private
    * @param integer $nrows_plugins Total number of search results
    * @param integer $total_plugins Total number of plugins
    * @param array $result_plugins Array of plugin results
    * @param string $searchtime Elapsed search time
    * @return string HTML output
    *
    */
    function _formatResults($nrows_plugins, $total_plugins, $result_plugins, $searchtime, $stories_intro)
    {
        global $_CONF, $_USER, $LANG09, $_MYCALJP2_CONF, $LANG_MYCALJP;

        $searchmain = new Template ( $_MYCALJP2_CONF['path_layout'] );
        $searchmain->set_file(array ('searchresults' => 'searchresults.thtml'));
        $searchmain->set_var ('num_matches', '');//

        if ($this->_keyType == 'any') {
            $searchQuery = str_replace(' ', "</b>' " . $LANG09[57] . " '<b>",$this->_query);
            $searchQuery = "<b>'$searchQuery'</b>";
        } else {
            if ($this->_keyType == 'all') {
                $searchQuery = str_replace(' ', "</b>' " . $LANG09[56] . " '<b>",$this->_query);
                $searchQuery = "<b>'$searchQuery'</b>";
            } else {
                $searchQuery = $LANG09[55] . " '<b>$this->_query</b>'";
            }
        }
        $searchmain->set_var('lang_matchesfor', $LANG09[25] . " $searchQuery.");
        $searchmain->set_var('num_items_searched', 0);
        $searchmain->set_var('lang_itemsin', $LANG09[26]);
        $searchmain->set_var('search_time', $searchtime);
        $searchmain->set_var('lang_seconds', $LANG09[27]);
        $searchmain->set_var('lang_refine_search', $LANG09[61]);

        $searchmain->set_var('search_blocks_intro', $stories_intro);
        $searchmain->set_var('date_start', $this->_dateStart);
        $searchmain->set_var('date_end', $this->_dateEnd);
        $searchmain->set_var('lang_headerofdate', $LANG_MYCALJP['headerofdate']);
        $searchmain->set_var('lang_middleofdate', $LANG_MYCALJP['middleofdate']);
        $searchmain->set_var('lang_footerofdate', $LANG_MYCALJP['footerofdate']);

        // Print plugins search results
        reset($result_plugins);
        $cur_plugin = new Plugin();
        $searchresults = new Template($_CONF['path_layout'] . 'search');

        $maxdisplayed = 0;
        $totalfound = 0;
        $searchblocks = '';
        for ($i = 1; $i <= count ($result_plugins); $i++) {
            $displayed = 0;
            $searchresults->set_file (array (
                'searchheading' => 'searchresults_heading.thtml',
                'searchrows'    => 'searchresults_rows.thtml',
                'searchblock'   => 'searchblock.thtml',
                'headingcolumn' => 'headingcolumn.thtml',
                'resultrow'     => 'resultrow.thtml',
                'resulttitle'   => 'resultcolumn.thtml',
                'resultcolumn'  => 'resultcolumn.thtml'
            ));
            if ($i == 1) {
                $searchresults->set_var ('data_cols', '');
                $searchresults->set_var ('headings', '');
            }
            $cur_plugin = current ($result_plugins);
            $start_results = (($this->_per_page * $this->_page) - $this->_per_page) + 1;
            if ($cur_plugin->supports_paging) {
                $start_results = 1;
                $end_results = $cur_plugin->num_searchresults;
                $totalfound += $cur_plugin->num_searchresults;
            } else {
                // this plugin doesn't know about paging - fake it
                if ($cur_plugin->num_searchresults < $start_results) {
                    $cur_plugin->num_searchresults = 0;
                } else if ($cur_plugin->num_searchresults >= $start_results) {
                    $end_results = ($start_results + $this->_per_page) - 1;
                    if ($end_results > $cur_plugin->num_searchresults) {
                        $end_results = $cur_plugin->num_searchresults;
                    }
                    $totalfound += ($end_results - $start_results) + 1;
                } else {
                    $start_results = 1;
                    $end_results = $cur_plugin->num_searchresults;
                    $totalfound += $cur_plugin->num_searchresults;
                }
            }
            if ($cur_plugin->num_searchresults > 0) {
                // Clear out data columns from previous result block
                $searchresults->set_var('data_cols','');
                $searchresults->set_var('start_block_results',COM_startBlock($cur_plugin->searchlabel));
                $searchresults->set_var('headings','');
                $searchresults->set_var('label', '#');
                $searchresults->parse('headings','headingcolumn',true);
                for ($j = 1; $j <= $cur_plugin->num_searchheadings; $j++) {
                    $searchresults->set_var('label', $cur_plugin->searchheading[$j]);
                    $searchresults->parse('headings','headingcolumn',true);
                }
                $searchresults->set_var('results','');
                $resultNumber = 0;
                for ($j = $start_results; $j <= $end_results; $j++) {
                    $columns = $cur_plugin->searchresults[$j - 1];
                    if ($cur_plugin->supports_paging) {
                        $searchresults->set_var('data', (($this->_per_page * $this->_page) - $this->_per_page) + $j . '.');
                    } else {
                        $searchresults->set_var('data', $j . '.');
                    }
                    $searchresults->parse('data_cols','resultcolumn',true);
                    for ($x = 1; $x <= count($columns); $x++) {
                        $searchresults->set_var('data', current($columns));
                        $searchresults->parse('data_cols','resultcolumn',true);
                        next($columns);
                    }
                    $resultNumber++;
                    $searchresults->set_var ('cssid', ($resultNumber % 2) + 1);
                    $searchresults->parse ('results', 'resultrow', true);
                    $searchresults->set_var ('data_cols', '');
                    $displayed++;
                }
                if ($cur_plugin->num_searchresults == 0) {
                    $searchresults->set_var('results',
                            '<tr><td colspan="4" align="center"><br>'
                            . $LANG09[31] . '</td></tr>');
                }
                $searchresults->set_var('end_block', COM_endBlock());
                $searchblocks .= $searchresults->parse('tmpoutput','searchblock');
            }
            next($result_plugins);
            if ($displayed > $maxdisplayed) {
                $maxdisplayed = $displayed;
            }
        }

        //if ($maxdisplayed == 0) {
        //    $searchblocks .= '<p>' . $LANG09[13] . '</p>' . LB;
        //}

        $searchmain->set_var ('search_blocks', $searchblocks);

        $searchUrl = $_CONF['site_url'] . '/mycaljp/calsearch.php?mode=search'; // changed by dengen
        $queryUrl = '';
        if (!empty ($this->_query)) {
            $urlQuery = urlencode ($this->_query);
            $queryUrl .= '&amp;query=' . $urlQuery;
        }
        $queryUrl .= '&amp;keyType=' . $this->_keyType
                  . '&amp;type=' . $this->_type;
        if (!empty ($this->_dateStart)) {
            $queryUrl .= '&amp;datestart=' . $this->_dateStart;
        }
        if (!empty ($this->_dateEnd)) {
            $queryUrl .= '&amp;dateend=' . $this->_dateEnd;
        }
        if (!empty ($this->_topic)) {
            $queryUrl .= '&amp;topic=' . $this->_topic;
        }
        if (!empty ($this->_author) && ($this->_author > 0)) {
            $queryUrl .= '&amp;author=' . $this->_author;
        }
        $queryUrl .= '&amp;results=' . $this->_per_page;

        //if ($this->_page > 1) {
        //    if ($maxdisplayed >= $this->_per_page) {
        //        //$numpages = $this->_page + 1;
        //    } else {
        //        //$numpages = $this->_page;
        //    }
        //} else {
        //    if ($maxdisplayed >= $this->_per_page) {
        //        //$numpages = 2;
        //    } else {
        //        //$numpages = 1;
        //    }
        //}

        if ( $this->_num_stories > $maxdisplayed ) $maxdisplayed = $this->_num_stories; // added by dengen
        if ($maxdisplayed >= $this->_per_page) {
            $this->_num_pages = $this->_page + 1; // changed by dengen
        } else {
            $this->_num_pages = $this->_page; // changed by dengen
        }

        //if ($numpages > $this->_page) {
        //    $next = '<a href="' . $searchUrl . $queryUrl . '&amp;page='
        //          . ($this->_page + 1) . '">' . $LANG09[58] . '</a>';
        //} else {
        //    $next = $LANG09[58];
        //}
        //$searchUrl .= $queryUrl;
        //$paging = COM_printPageNavigation ($searchUrl, $this->_page, $numpages,
        //                                   'page=', false, '', $next);

        $searchmain->set_var ('search_pager', $paging);
        $searchmain->set_var ('google_paging', $paging);

        $tmpTxt = sprintf( $LANG09[24], $totalfound + $this->_num_stories ); // changed by dengen
        $searchmain->set_var ('lang_found', $tmpTxt);//

        //if (($totalfound == 0) && ($this->_page == 1)) {
        //    $searchmain->set_var ('refine_url', '');
        //    $searchmain->set_var ('start_refine_anchortag', '');
        //    $searchmain->set_var ('end_refine_anchortag', '');
        //    $searchmain->set_var ('refine_search', '');
        //} else {

            // 必ず表示させる
            $refineUrl = $_CONF['site_url'] . '/mycaljp/calsearch.php?mode=refine' // changed by dengen
                       . $queryUrl;
            $refineLink = '<a href="' . $refineUrl . '">';
            $searchmain->set_var ('refine_url', $refineUrl);
            $searchmain->set_var ('start_refine_anchortag', $refineLink);
            $searchmain->set_var ('end_refine_anchortag', '</a>');
            $searchmain->set_var ('refine_search', $refineLink . $LANG09[61] . '</a>');
        //}

        $retval .= $searchmain->parse ('output', 'searchresults');

        //if (($totalfound == 0) && ($this->_page == 1)) {
        //    $searchObj = new Search();
        //    $retval .=  $searchObj->showForm ();
        //}

        return $retval;
    }

    function show_stories_intro() {

        global $_CONF, $_TABLES, $LANG09, $_MYCALJP2_CONF;

        if ( !$_MYCALJP2_CONF['showstoriesintro'] ) return '';
        if ( $this->_type <> 'all' AND $this->_type <> 'stories' ) return '';

        $display = '';

        if (!empty($this->_dateStart) AND !empty($this->_dateEnd)) {
            $ds = explode("-", $this->_dateStart );
            $de = explode("-", $this->_dateEnd );
            $startdate = mktime( 0, 0, 0,$ds[1],$ds[2],$ds[0]);
            $enddate   = mktime(23,59,59,$de[1],$de[2],$de[0]);
            $sql = "(UNIX_TIMESTAMP(date) BETWEEN '$startdate' AND '$enddate') AND (draft_flag = 0) ";
        }

        if (!empty ($this->_query)) {
            if($this->_keyType == 'phrase') {
                // do an exact phrase search (default)
                $mywords[] = $this->_query;
                $mysearchterm = addslashes ($this->_query);
                $sql .= "AND (introtext LIKE '%$mysearchterm%' ";
                $sql .= "OR bodytext LIKE '%$mysearchterm%' ";
                $sql .= "OR title LIKE '%$mysearchterm%') ";
            } elseif($this->_keyType == 'all') {
                // must contain ALL of the keywords
                $mywords = explode(' ', $this->_query);
                $sql .= 'AND ';
                $tmp = '';
                foreach ($mywords as $mysearchterm) {
                    $mysearchterm = addslashes (trim ($mysearchterm));
                    $tmp .= "(introtext LIKE '%$mysearchterm%' OR ";
                    $tmp .= "bodytext LIKE '%$mysearchterm%' OR ";
                    $tmp .= "title LIKE '%$mysearchterm%') AND ";
                }
                $tmp = substr($tmp, 0, strlen($tmp) - 4);
                $sql .= $tmp;
            }
            elseif($this->_keyType == 'any') {
                // must contain ANY of the keywords
                $mywords = explode(' ', $this->_query);
                $sql .= 'AND ';
                $tmp = '';
                foreach ($mywords as $mysearchterm) {
                    $mysearchterm = addslashes (trim ($mysearchterm));
                    $tmp .= "(introtext LIKE '%$mysearchterm%' OR ";
                    $tmp .= "bodytext LIKE '%$mysearchterm%' OR ";
                    $tmp .= "title LIKE '%$mysearchterm%') OR ";
                }
                $tmp = substr($tmp, 0, strlen($tmp) - 3);
                $sql .= "($tmp)";
            } else {
                $mywords[] = $this->_query;
                $mysearchterm = addslashes ($this->_query);
                $sql .= "AND (introtext LIKE '%$mysearchterm%' ";
                $sql .= "OR bodytext LIKE '%$mysearchterm%' ";
                $sql .= "OR title LIKE '%$mysearchterm%') ";
            }
        }

        if (!empty($this->_topic)) {
            $sql .= "AND (s.tid = '$this->_topic') ";
        }
        if ( !empty($this->_author) && ($this->_author > 0) ) {
            $sql .= "AND (s.uid = '$this->_author') ";
        }
        $sql .= COM_getPermSQL ('AND', 0, 2, 's') . ' ';
        $sql .= COM_getTopicSQL ('AND', 0, 's') . ' ';
        $sql .= COM_getLangSQL ('sid', 'AND', 's') . ' ';

        $limit = $this->_per_page;
        $offset = ($this->_page - 1) * $limit;

        $userfields = 'u.username, u.fullname';
        if ($_CONF['allow_user_photo'] == 1) {
            $userfields .= ', u.photo';
            if ($_CONF['use_gravatar']) {
                $userfields .= ', u.email';
            }
        }

        $msql = array();
        $msql['mysql']="SELECT STRAIGHT_JOIN s.*, UNIX_TIMESTAMP(s.date) AS day, "
                 . $userfields . ", t.topic, t.imageurl "
                 . "FROM {$_TABLES['stories']} AS s, {$_TABLES['users']} AS u, "
                 . "{$_TABLES['topics']} AS t WHERE (s.uid = u.uid) AND (s.tid = t.tid) AND "
                 . $sql . "ORDER BY date DESC LIMIT $offset, $limit";

        $msql['mssql']="SELECT STRAIGHT_JOIN s.sid, s.uid, s.draft_flag, s.tid, s.date, s.title, cast(s.introtext as text) as introtext, cast(s.bodytext as text) as bodytext, s.hits, s.numemails, s.comments, s.trackbacks, s.related, s.featured, s.show_topic_icon, s.commentcode, s.trackbackcode, s.statuscode, s.expire, s.postmode, s.frontpage, s.in_transit, s.owner_id, s.group_id, s.perm_owner, s.perm_group, s.perm_members, s.perm_anon, s.advanced_editor_mode, "
                 . " UNIX_TIMESTAMP(s.date) AS day, "
                 . $userfields . ", t.topic, t.imageurl "
                 . "FROM {$_TABLES['stories']} AS s, {$_TABLES['users']} AS u, "
                 . "{$_TABLES['topics']} AS t WHERE (s.uid = u.uid) AND (s.tid = t.tid) AND "
                 . $sql . "ORDER BY date DESC LIMIT $offset, $limit";

        $result = DB_query ($msql);

        while ( $A = DB_fetchArray ( $result ) ) {

            if (floatval (VERSION) >= 1.5) { // 2008.07.26 - Supports v1.5 and upper version.
                $story = new Story();
                $story->loadFromArray($A);
                $display .= STORY_renderArticle ($story, 'y');
            } else {
                $display .= STORY_renderArticle ($A, 'y');
            }

            $this->_num_stories ++ ;
        }
        $this->_num_pages = ceil ($this->_num_stories / $limit);

        if ( $this->_num_stories > 0 ) {
            $searchintro = new Template ( $_MYCALJP2_CONF['path_layout'] );
            $searchintro->set_file(array ('searchblockintro' => 'searchblockintro.thtml'));
            $searchintro->set_var('start_block_results',COM_startBlock( $LANG09[53] ));
            $searchintro->set_var('stories_intro', $display);
            $searchintro->set_var('end_block', COM_endBlock());
            $display = $searchintro->parse('search_blocks_intro','searchblockintro');
        }
        return $display;
    }

    function printPageNavigation()
    {
        global $_CONF, $LANG09;

        $searchUrl = $_CONF['site_url'] . '/mycaljp/calsearch.php?mode=search';
        $searchUrl .= '&amp;datestart=' . $this->_dateStart . '&amp;dateend=' . $this->_dateEnd;
        $searchUrl .= '&amp;type=' . $this->_type . '&amp;topic=' . $this->_topic . '&amp;author=' . $this->_author;
        $searchUrl .= '&amp;results=' . $this->_per_page;
        if ( isset($_GET['month']) ) $searchUrl .= '&amp;month=' . COM_applyFilter($_GET['month']);
        if ($this->_num_pages > $this->_page) {
            $next = '<a href="' . $searchUrl . '&amp;page=' . ($this->_page + 1) . '">' . $LANG09[58] . '</a>';
        } else {
            $next = $LANG09[58];
        }
        $retval = COM_printPageNavigation ($searchUrl, $this->_page, $this->_num_pages, 'page=', false, '', $next);
        return $retval;
    }


    /**
    * Shows search form
    *
    * Shows advanced search page
    *
    * @author Tony Bibbs <tony AT geeklog DOT net>
    * @access public
    * @return string HTML output for form
    *
    */
    function showForm_mod ()
    {
        global $_CONF, $_TABLES, $LANG09, $_MYCALJP2_CONF;

        $retval = '';

        // Verify current user my use the search form
        if (!$this->_isFormAllowed()) {
            return $this->_getAccessDeniedMessage();
        }

        $retval .= COM_startBlock($LANG09[1],'advancedsearch.html');
        $searchform = new Template($_CONF['path_layout'].'search');
        $searchform->set_file (array ('searchform' => 'searchform.thtml',
                                      'authors'    => 'searchauthors.thtml'));
        $searchform->set_var('search_intro', $LANG09[19]);
        $searchform->set_var('site_url', $_CONF['site_url']);
        $searchform->set_var('lang_keywords', $LANG09[2]);
        $searchform->set_var('lang_date', $LANG09[20]);
        $searchform->set_var('lang_to', $LANG09[21]);
        $searchform->set_var('date_format', $LANG09[22]);
        $searchform->set_var('lang_topic', $LANG09[3]);
        $searchform->set_var('lang_all', $LANG09[4]);
        $searchform->set_var('topic_option_list',
                             COM_topicList ('tid,topic', $this->_topic));
        $searchform->set_var('lang_type', $LANG09[5]);
        $searchform->set_var('lang_stories', $LANG09[6]);
        $searchform->set_var('lang_comments', $LANG09[7]);
        $searchform->set_var('lang_links', $LANG09[39]);
        $searchform->set_var('lang_results', $LANG09[59]);
        $searchform->set_var('lang_per_page', $LANG09[60]);

        $searchform->set_var('lang_exact_phrase', $LANG09[43]);
        $searchform->set_var('lang_all_words', $LANG09[44]);
        $searchform->set_var('lang_any_word', $LANG09[45]);

        $searchform->set_var ('query', htmlspecialchars ($this->_query));
        $searchform->set_var ('datestart', $this->_dateStart);
        $searchform->set_var ('dateend', $this->_dateEnd);
        $searchform->set_var ($this->_per_page . '_selected',
                              'selected="selected"');

        $phrase_selected = '';
        $all_selected = '';
        $any_selected = '';
        if ($this->_keyType == 'phrase') {
            $phrase_selected = 'selected="selected"';
        } else if ($this->_keyType == 'all') {
            $all_selected = 'selected="selected"';
        } else if ($this->_keyType == 'any') {
            $any_selected = 'selected="selected"';
        }
        $searchform->set_var ('key_phrase_selected', $phrase_selected);
        $searchform->set_var ('key_all_selected', $all_selected);
        $searchform->set_var ('key_any_selected', $any_selected);

        $plugintypes = PLG_getSearchTypes();
        $pluginoptions = '';
        $plugin_selected = false;
        // Generally I don't like to hardcode HTML but this seems easiest
        for ($i = 0; $i < count ($plugintypes); $i++) {
// @@@@ 2007.06.06 added by dengen -->>
            if ( in_array( key($plugintypes), $_MYCALJP2_CONF['contents'] ) ) {
// @@@@ 2007.06.06 added by dengen --<<

                $pluginoptions .= '<option value="' . key ($plugintypes) . '"';
                if ($this->_type == key ($plugintypes)) {
                    $pluginoptions .= ' selected="selected"';
                    $plugin_selected = true;
                }
                $pluginoptions .= '>' . current ($plugintypes) . '</option>' . LB;

// @@@@ 2007.06.06 added by dengen -->>
            }
// @@@@ 2007.06.06 added by dengen --<<

            next($plugintypes);

        }
        $searchform->set_var('plugin_types', $pluginoptions);

        $all_selected = '';
        $stories_selected = '';
        $comments_selected = '';
        if (!$plugin_selected) {
            if ($this->_type == 'stories') {
                $stories_selected = 'selected="selected"';
            } else if ($this->_type == 'comments') {
                $comments_selected = 'selected="selected"';
            } else {
                $all_selected = 'selected="selected"';
            }
        }
        $searchform->set_var ('type_all_selected', $all_selected);
        $searchform->set_var ('stories_selected', $stories_selected);
        $searchform->set_var ('comments_selected', $comments_selected);

        if ($_CONF['contributedbyline'] == 1) {
            $searchform->set_var('lang_authors', $LANG09[8]);
            $searchusers = array();
            $result = DB_query("SELECT DISTINCT uid FROM {$_TABLES['comments']}");
            while ($A = DB_fetchArray($result)) {
                $searchusers[$A['uid']] = $A['uid'];
            }
            $result = DB_query("SELECT DISTINCT uid FROM {$_TABLES['stories']} WHERE (date <= NOW()) AND (draft_flag = 0)");
            while ($A = DB_fetchArray($result)) {
                $searchusers[$A['uid']] = $A['uid'];
            }

            $inlist = implode(',', $searchusers);

            if (!empty ($inlist)) {
                $sql = "SELECT uid,username,fullname FROM {$_TABLES['users']} WHERE uid IN ($inlist)";
                if (isset ($_CONF['show_fullname']) &&
                        ($_CONF['show_fullname'] == 1)) {
                    /* Caveat: This will group all users with an emtpy fullname
                     *         together, so it's not exactly sorted by their
                     *         full name ...
                     */
                    $sql .= ' ORDER BY fullname,username';
                } else {
                    $sql .= ' ORDER BY username';
                }
                $result = DB_query ($sql);
                $useroptions = '';
                while ($A = DB_fetchArray($result)) {
                    $useroptions .= '<option value="' . $A['uid'] . '"';
                    if ($A['uid'] == $this->_author) {
                        $useroptions .= ' selected="selected"';
                    }
                    $useroptions .= '>' . $this->_displayName ($A['username'],
                                            $A['fullname']) . '</option>';
                }
                $searchform->set_var('author_option_list', $useroptions);
                $searchform->parse('author_form_element', 'authors', true);
            } else {
                $searchform->set_var('author_form_element', '<input type="hidden" name="author" value="0">');
            }
        } else {
            $searchform->set_var ('author_form_element',
                    '<input type="hidden" name="author" value="0">');
        }
        $searchform->set_var('lang_search', $LANG09[10]);
        $searchform->parse('output', 'searchform');

        $retval .= $searchform->finish($searchform->get_var('output'));
        $retval .= COM_endBlock();

        return $retval;
    }


    function showForm ()
    {
        $retval = $this->showForm_mod();
        $retval = str_replace("/search.php", "/mycaljp/calsearch.php", $retval);
        if ( isset($_GET['month']) )
            $retval = str_replace("mode=search",
                "mode=search&amp;month=" . COM_applyFilter($_GET['month']), $retval);
        return $retval;
    }


}// End of Class calSearch


/**
* This searches for events matching the user query and returns an array for the
* header and table rows back to search.php where it will be formated and printed
*
* @param    string  $query      Keywords user is looking for
* @param    date    $datestart  Start date to get results for
* @param    date    $dateend    End date to get results for
* @param    string  $topic      The topic they were searching in
* @param    string  $type       Type of items they are searching, or 'all'
* @param    int     $author     Get all results by this author
* @param    string  $keyType    search key type: 'all', 'phrase', 'any'
* @param    int     $page       page number of current search
* @param    int     $perpage    number of results per page
* @return   object              search result object
*
*/
function plugin_dopluginsearch_calendar_mod($query, $datestart, $dateend, $topic, $type, $author, $keyType, $page, $perpage)
{
    global $_CONF, $_TABLES, $LANG09, $LANG_CAL_1, $_LANG_CAL_SEARCH;

    if (empty ($type)) {
        $type = 'all';
    }

    // Bail if we aren't supppose to do our search
    if ($type <> 'all' AND $type <> 'calendar') {
        $event_results = new Plugin();
        $event_results->plugin_name = 'calendar';
        $event_results->num_itemssearched = 0;
        $event_results->searchlabel = $_LANG_CAL_SEARCH['results'];

        return $event_results;
    }

    $select = "SELECT eid,title,location,event_type,datestart,dateend,timestart,timeend,allday,UNIX_TIMESTAMP(datestart) AS day";
    $sql = " FROM {$_TABLES['events']} WHERE ";

    if($keyType == 'phrase') {
        // do an exact phrase search (default)
        $mywords[] = $query;
        $mysearchterm = addslashes ($query);
        $sql .= "(location LIKE '%$mysearchterm%'  ";
        $sql .= "OR description LIKE '%$mysearchterm%' ";
        $sql .= "OR title LIKE '%$mysearchterm%') ";
    } elseif ($keyType == 'all') {
        //must contain ALL of the keywords
        $mywords = explode(' ', $query);
        $tmp = '';
        foreach ($mywords AS $mysearchterm) {
            $mysearchterm = addslashes (trim ($mysearchterm));
            $tmp .= "(location LIKE '%$mysearchterm%' OR ";
            $tmp .= "description LIKE '%$mysearchterm%' OR ";
            $tmp .= "title LIKE '%$mysearchterm%') AND ";
        }
        $tmp = substr($tmp, 0, strlen($tmp) - 4);
        $sql .= $tmp;
    } elseif ($keyType == 'any') {
        //must contain ANY of the keywords
        $mywords = explode(' ', $query);
        $tmp = '';
        foreach ($mywords AS $mysearchterm) {
            $mysearchterm = addslashes (trim ($mysearchterm));
            $tmp .= "(location LIKE '%$mysearchterm%' OR ";
            $tmp .= "description LIKE '%$mysearchterm%' OR ";
            $tmp .= "title LIKE '%$mysearchterm%') OR ";
        }
        $tmp = substr($tmp, 0, strlen($tmp) - 3);
        $sql .= "($tmp)";
    } else {
        $mywords[] = $query;
        $mysearchterm = addslashes ($query);
        $sql .= "(location LIKE '%$mysearchterm%' ";
        $sql .= "OR description LIKE '%$mysearchterm%' ";
        $sql .= "OR title LIKE '%$mysearchterm%') ";
    }
    if (!empty($datestart) AND !empty($dateend)) {
        $delim = substr($datestart, 4, 1);
        if (!empty($delim)) {
            $DS = explode($delim, $datestart);
            $DE = explode($delim, $dateend);
            $startdate = mktime(0, 0, 0, $DS[1], $DS[2], $DS[0]);
            $enddate = mktime(23, 59, 59, $DE[1], $DE[2], $DE[0]);
// 2007-05-19 changed by dengen -->>
//            $sql .= "AND (UNIX_TIMESTAMP(datestart) BETWEEN '$startdate' AND '$enddate') ";
// 2007-05-19 changed by dengen --||
            $sql .= "AND ( (UNIX_TIMESTAMP(datestart) BETWEEN '$startdate' AND '$enddate') "
                         . "OR (UNIX_TIMESTAMP(dateend) BETWEEN '$startdate' AND '$enddate') "
                         . "OR ( (UNIX_TIMESTAMP(datestart) <= '$startdate') AND (UNIX_TIMESTAMP(dateend) >= '$enddate') ) )";
// 2007-05-19 changed by dengen --<<
        }
    }
    $sql .= COM_getPermSQL ('AND');
    $sql .= ' GROUP BY datestart, eid, title, description, location, dateend, timestart, timeend, allday, event_type ORDER BY datestart DESC ';
    $l = ($perpage * $page) - $perpage;
    $sql .= 'LIMIT ' . $l . ',' . $perpage;
    $result_events = DB_query ($select . $sql);
    $result_count = DB_query ('SELECT COUNT(*)' . $sql);
    $B = DB_fetchArray ($result_count, true);

    $event_results = new Plugin();
    $event_results->searchresults = array();
    $event_results->searchlabel = $_LANG_CAL_SEARCH['results'];
    $event_results->addSearchHeading ($_LANG_CAL_SEARCH['title']);
    $event_results->addSearchHeading ($_LANG_CAL_SEARCH['date_time']);
    if (empty ($_LANG_CAL_SEARCH['event_type'])) {
        $event_results->addSearchHeading ($LANG_CAL_1[37]);
    } else {
        $event_results->addSearchHeading ($_LANG_CAL_SEARCH['event_type']);
    }
    $event_results->num_searchresults = 0;
    $event_results->num_itemssearched = $B[0];
    $event_results->supports_paging = true;

    // NOTE if any of your data items need to be events then add them
    // here! Make sure data elements are in an array and in the same
    // order as your headings above!
    while ($A = DB_fetchArray ($result_events)) {
        if ($A['allday'] == 0) {
            if ($A['datestart'] == $A['dateend']) {
                $fulldate = $A['datestart'] . ' ' . $A['timestart'];
                if ($A['timestart'] != $A['timeend']) {
                    $fulldate .= ' - ' . $A['timeend'];
                }
            } else {
                $fulldate = $A['datestart'] . ' ' . $A['timestart'] . ' - '
                            . $A['dateend'] . ' ' . $A['timeend'];
            }
        } else {
            if ($A['datestart'] <> $A['dateend']) {
                $fulldate = $A['datestart'] . ' - ' . $A['dateend']
                                  . ' ' . $LANG09[35];
            } else {
                $fulldate = $A['datestart'] . ' ' . $LANG09[35];
            }
        }
        $thetime = COM_getUserDateTimeFormat ($A['day']);
        $A['title'] = stripslashes ($A['title']);
        $A['title'] = str_replace ('$', '&#36;', $A['title']);
        $row = array ('<a href="' . $_CONF['site_url']
                            . '/calendar/event.php?eid=' . $A['eid'] . '">'
                            . $A['title'] . '</a>', $fulldate,
                            stripslashes ($A['event_type']));
        $event_results->addSearchResult($row);
        $event_results->num_searchresults++;
    }
    return $event_results;
}


//-----------------------------------------------------------------------------------------

$display = COM_siteHeader();
$calSearchObj = new calSearch;
if ( isset($_GET['mode']) && ($_GET['mode'] == 'search') ) {
    $display .= $calSearchObj->doSearch();
} else {
    $display .= $calSearchObj->showForm();
}
$display .= COM_siteFooter( $_MYCALJP2_CONF['enablesrblocks'] );
echo $display;

?>