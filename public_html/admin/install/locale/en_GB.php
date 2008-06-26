<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.5                                                               |
// +---------------------------------------------------------------------------+
// | en_GB.php                                                                 |
// |                                                                           |
// | english locale file for the Geeklog installation script                   |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2008 by the following authors:                         |
// |                                                                           |
// | Authors:                                                                  |
// +---------------------------------------------------------------------------+
// |                                                                           |
// |                                                                           |
// +---------------------------------------------------------------------------+
//
// $Id: en_GB.php,$

// +---------------------------------------------------------------------------+

$LOCALE_CONF = array(

    /* Subgroup: Site */
    0 => 'en-gb',                                                   //rdf_language

    /* Subgroup: Languages and Locale */
    1 => array('en'=>'english_utf-8', 'de'=>'german_formal_utf-8'), //language_files
    2 => array('en'=>'English', 'de'=>'Deutsch'),                   //languages
    3 => '%A, %B %d %Y @ %I:%M %p %Z',                              //date
    4 => '%m/%d %I:%M%p',                                           //daytime
    5 => '%x',                                                      //shortdate
    6 => '%d-%b',                                                   //dateonly
    7 => '%I:%M%p',                                                 //timeonly
    8 => 'Sun',                                                     //week_start
    9 => 12,                                                        //hour_mode
    10 => ",",                                                      //thousand_separator
    11 => ".",                                                      //decimal_separator
    12 => "2",                                                      //decimal_count

);

?>