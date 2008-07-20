<?php

/**
* Blaine Lang July 19/03  www.portalparts.com
* This Geeklog PHP function displays a formated monthly calendar in a block
* It is integrated into the site search feature to allow users to click on a date and 
* retrieve all postings and updates for that date. 
* Also hightlights dates with calendar events. 
* Creates tool-tip title when user has cursor over date with a highlighted calendar event - displays event description
* Jun 16/2006: Komma Tetsuko www.ivysoho.co.jp (for japanese)
**/
function phpblock_mycal() {
    global $_CONF;
    define ("_mycal_ClickonDate", "日付をクリック");
    include_once($_CONF['path_html'] . "mycal/main.php"); 
    return display_calendar();
}


?>