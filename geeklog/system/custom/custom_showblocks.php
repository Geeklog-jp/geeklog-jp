<?php


/**
* Custom function to retrieve and return a formatted list of blocks
* Can be used when calling COM_siteHeader or COM_SiteFooter

* Example:
* 1: Setup an array of blocks to display
* 2: Call COM_siteHeader or COM_siteFooter
*
*  $myblocks = array ('site_menu','site_news','poll_block');

* COM_siteHeader( array('COM_showCustomBlocks',$myblocks) ) ;
* COM_siteFooter( true, array('COM_showCustomBlocks',$myblocks));

* @param   array   $showblocks    An array of block names to retrieve and format
* @return  string                 Formated HTML containing site footer and optionally right blocks
*/
function custom_showBlocks($showblocks)
{
    global $_CONF, $_TABLES;

    $retval = '';
    foreach($showblocks as $block) {
        $sql = "SELECT bid, name,type,title,content,rdfurl,phpblockfn,help FROM {$_TABLES['blocks']} WHERE name='$block'";
        $result = DB_query($sql);
        if (DB_numRows($result) == 1) {
            $A = DB_fetchArray($result);
            $retval .= COM_formatBlock($A);
        }
    }

    return $retval;
}

?>