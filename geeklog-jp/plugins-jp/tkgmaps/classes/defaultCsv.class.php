<?php

/* Reminder: always indent with 4 spaces (no tabs). */
// +---------------------------------------------------------------------------+
// | tkgmaps Plugin for Geeklog 1.5                                            |
// +---------------------------------------------------------------------------+
// | defaultcsv.class.php                                                      |
// |                                                                           |
// | tkgmaps default csv class library.                                        |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2009 by the following authors:                              |
// |                                                                           |
// | Authors: Hiroron          - hiroron AT hiroron DOT com                    |
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

if (strpos(strtolower($_SERVER['PHP_SELF']), 'defaultcsv.class.php') !== false) {
    die('This file can not be used on its own.');
}

require_once $_CONF['path'] . 'plugins/tkgmaps/classes/BaseCsv.class.php';

/**
* CSVファイル連携
* Copyright (C) 2009 京都大学
* Authors: hiroron     - hiroron AT hiroron DOT com
*/

class defaultCsv extends BaseCsv {

    function defaultCsv($filePath, $mode, $comma = ',', $quote = '"') {
        $this->filePath = $filePath;
        $this->mode = $mode;
        $this->iterator = 0;
        $this->comma = $comma;
        $this->quote = $quote;
    }
    
    // import
    function parse($row) {
        $tmp = $this->_parse_trim_nl2br ($row);
        if (count($tmp) != 9) { return; }
        if (empty($tmp[0])) { return; }
        if (mb_ereg('[^0-9\-\.,]', $tmp[0])) {
            tkgmaps_geocode($tmp[0], $lat, $lng);
            if( (empty($lat) && $lat != 0) || (empty($lng) && $lng != 0) || mb_ereg('[^0-9\-\.]', $lat) || mb_ereg('[^0-9\-\.]', $lng) ) {
                return;
            }
        }
        $point = $tmp[0];
        $title = $tmp[1];
        $is =   empty($tmp[3]) ? '' : ' iconsize:' . $this->_parse_size($tmp[3]);
        $iss =  empty($tmp[5]) ? '' : ' iconshadowsize:' . $this->_parse_size($tmp[5]);
        $ops =  empty($tmp[2]) ? '' : 'icon:' . $tmp[2] . $is;
        $ops .= empty($tmp[4]) ? '' : ' iconshadow:' . $tmp[4] . $iss;
        $ops .= empty($tmp[6]) ? '' : ' iconanchor:' . $this->_parse_size($tmp[6]);
        $ops .= empty($tmp[7]) ? '' : ' infowindowanchor:' . $this->_parse_size($tmp[7]);
        $info = empty($tmp[8]) ? '' : $tmp[8];
        $data = array ('point' => $point,
                       'title' => $title,
                       'options' => $ops,
                       'info' => $info,
        );
        return $data;
    }
    
    // データ内部のサイズ(9x9)を9,9形式に変換
    function _parse_size ($size) {
        return str_replace(array("×","X","x"), ",", $size);
    }
    
    // データを9x9形式に変換
    function _make_size ($size) {
        return str_replace(",", "x", $size);
    }
    
    // export
    function mkline($parm) {
        $cols = array();
        
        $cols[] = $parm['point'];           // 1
        $cols[] = $parm['title'];           // 2
        $cols[] = $parm['icon'];            // 3
        $cols[] = $this->_make_size($parm['iconsize']);         // 4
        $cols[] = $parm['iconshadow'];      // 5
        $cols[] = $this->_make_size($parm['iconshadowsize']);   // 6
        $cols[] = $this->_make_size($parm['iconanchor']);       // 7
        $cols[] = $this->_make_size($parm['infowindowanchor']); // 8
        $cols[] = stripslashes($parm['other']);                 // 9
        
        list($line, $i) = $this->makeline($cols,true);
        
        return $line;
    }

}

?>
