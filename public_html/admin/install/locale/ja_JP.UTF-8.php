<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | Geeklog 1.5                                                               |
// +---------------------------------------------------------------------------+
// | ja_JP.UTF-8.php                                                           |
// |                                                                           |
// | ja_JP.UTF-8 locale file for the Geeklog installation script               |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2000-2008 by the following authors:                         |
// |                                                                           |
// | Authors:                                                                  |
// +---------------------------------------------------------------------------+
// |                                                                           |
// |                                                                           |
// +---------------------------------------------------------------------------+
//
// $Id: ja_JP.UTF-8.php,$

// +---------------------------------------------------------------------------+

$LOCALE_CONF = array(

    /* Subgroup: Site */
    0 => 'ja',                                                  //rdf_language

    /* Subgroup: Languages and Locale */
    1 => array('ja'=>'japanese_utf-8', 'en'=>'english_utf-8'),  //language_files
    2 => array('ja'=>'Japanese', 'en'=>'English'),              //languages
    3 => '%Y年%B%e日(%a) %p%I:%M',                              //date
    4 => '%m/%d %p%I:%M',                                       //daytime
    5 => '%x',                                                  //shortdate
    6 => '%Y年%B%e日',                                          //dateonly
    7 => '%p%I:%M',                                             //timeonly
    8 => 'Sun',                                                 //week_start
    9 => 12,                                                    //hour_mode
    10 => ",",                                                  //thousand_separator
    11 => ".",                                                  //decimal_separator
    12 => "2",                                                  //decimal_count

);

?>