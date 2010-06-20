<?php

if (strpos(strtolower($_SERVER['PHP_SELF']), 'basecsv.class.php') !== false) {
    die('This file can not be used on its own.');
}

/**
 * Original: http://red-treasure.com/report/?p=7
 * 
 * $csv_in  = new Csv("file_in.csv", "r");
 * $csv_out = new Csv("file_out.csv", "w");
 * $csv_in->open();
 * $csv_out->open();
 *
 * while($columns = $csv_in->getline()) {
 *    print_r($columns);
 *    $csv_out->putline($columns);
 * }
 * $csv_in->close();
 * $csv_out->close();
 */
class BaseCsv {
    var $filePath;
    var $mode;
    var $contents_utf8;
    var $contents_size;
    var $wfh;
    var $iterator;
    var $comma;
    var $quote;

    function BaseCsv($filePath, $mode, $comma = ',', $quote = '"') {
        $this->filePath = $filePath;
        $this->mode = $mode;
        $this->iterator = 0;
        $this->comma = $comma;
        $this->quote = $quote;
    }

    function open() {
        if ("r" === $this->mode) {
            $contents = file_get_contents($this->filePath);
            if (!$contents) {
                return false;
            }
            $this->contents_utf8 = mb_convert_encoding($contents, "UTF-8", "SJIS,EUC-JP,JIS,UTF-8,ASCII");
            $this->contents_size = strlen($this->contents_utf8);
        } else {
            $this->wfh = fopen($this->filePath, $this->mode);
        }
        return true;
    }

    function close() {
        if ("r" === $this->mode) {
        } else {
            fclose($this->wfh);
        }
    }

    /**
     * state
     *      -1:1行読み込み終了
     *       0:セル入力終了状態
     *       1:ダブルクオートセル開始状態
     *       2:ダブルクオートセル内のダブルクオート出現状態
     *       3:非ダブルクオートセルの入力中状態
     *       4:ダブルクオートセルの入力中状態
     *       5:CR出現状態
     * @return array フィールド

     *         false EOF
     */
    function getline() {
        $fields = array();
        $cell = "";
        $successRead;
        $eof = true;
        $state = 0;

        while( true ) {

            if ($this->iterator >= $this->contents_size) {
                $state = -1;
                $successRead = false;
            } else {
                $successRead = true;
                $eof = false;
                $c = $this->contents_utf8[$this->iterator];
                $this->iterator++;
            }

            if ($state == -1) {     // オートマトン
                $state = -1;
            } elseif ($state == 0) {
                if ($c === $this->comma) {
                    $state = 0;
                } elseif ($c === "\n") {
                    $state = -1;
                } elseif ($c === "\r") {
                    $state = 5;
                } elseif ($c === $this->quote) {
                    $state = 1;
                } else {
                    $state = 3;
                }
            } else if ($state == 1) {
                if ($c === $this->quote) {
                    $state = 2;
                } else {
                    $state = 4;
                }
            } elseif ($state == 2) {
                if ($c === $this->quote) {
                    $state = 4;
                } elseif ($c === $this->comma) {
                    $state = 0;
                } elseif ($c === "\n") {
                    $state = -1;
                } elseif ($c === "\r") {
                    $state = 5;
                } else {
                    $state = 4; // エラー
                }
            } elseif ($state == 3) {
                if ($c === $this->comma) {
                    $state = 0;
                } elseif ($c === "\n") {
                    $state = -1;
                } elseif ($c === "\r") {
                    $state = 5;
                } else {
                    $state = 3;
                }
            } elseif ($state == 4) {
                if ($c === $this->quote) {
                    $state = 2;
                } else {
                    $state = 4;
                }
            } elseif ($state == 5) {
                if ($c !== "\n") {
                    $this->iterator–;   // 読み戻る
                }
                $state = -1;
            } else {
                $state = -1;    // こない
            }   // オートマトン

            if ($successRead && ($state == 0 || $state == -1)) {
                // セル入力終了
                $fields[] = $cell;
                $cell = "";
            } elseif ($state == 3 || $state == 4) {
                // セル入力中
                $cell .= $c;
            }

            if ($state == -1) {
                // 1行読み込み終了
                break;
            }
        }   // while

        return $eof ? false : $fields;
    }   // getline

    function makeline($fields, $forceQuote = false, $line_feed = true) {
        $size = count($fields);
        //mb_regex_encoding("UTF-8");
        $replace_quote = $this->quote . $this->quote;
        $line = "";

        for ($i = 0; $i < $size; $i++) {
            $outQuote = $forceQuote;

            //mb_ereg_replace($this->quote, $replace_quote, $fields[$i], "m");
            $fields[$i] = str_replace($this->quote, $replace_quote, $fields[$i]);
            if (!$forceQuote && (mb_strpos($fields[$i], "\n", 0, "UTF-8") || mb_strpos($fields[$i], "\r", 0, "UTF-8") || mb_strpos($fields[$i], $this->comma, 0, "UTF-8")) ) {
                $outQuote = true;
            }

            if ($outQuote) $line .= $this->quote;
            $line .= $fields[$i];
            if ($outQuote) $line .= $this->quote;
            if ($i < $size - 1) $line .= $this->comma;
        }

        // 行末処理
        if ($line_feed) {
            // 改行出力
            $line .= "\n";
        } else {
            // 改行せずにコンマを出力する場合
            $line .= $this->comma;
        }
        return array(mb_convert_encoding($line, "sjis", "UTF-8"), $i);
    }

    function putline($fields, $forceQuote = false, $line_feed = true) {
        list($line, $i) = $this->makeline($fields, $forceQuote, $line_feed);

        fwrite($this->wfh, $line);

        return $i;
    }
    
    
    /**
    **  CSV内のデータ処理用共通関数
    */
    
    // データ内部の空白除去と改行をBRに変換
    function _parse_trim_nl2br($data) {
        $trimdata = array();
        for($i = 0; $i < count($data); $i++) {
            $trimdata[$i] = trim($data[$i]);
            $trimdata[$i] = str_replace(array("\r\n","\r","\n"), '<br'.XHTML.'>', $trimdata[$i]);
        }
        return $trimdata;
    }

    // URLとテキストからIMGタグで画像を作成
    function _make_image ($url, $text) {
        return empty($url) ? '' : '<img width="200" padding="5" src="' . $url . '" alt="' . $text . '" style="margin:4px;"' . XHTML . '>';
    }

    // URLとテキストからAタグでのリンクを作成
    function _make_link ($url, $text) {
        return empty($url) ? $text : '<a href="' . $url . '">' . $text . '</a>';
    }

    // データから画像への直URLを返す
    //   データはMGのURL or MGのID のどちらか
    function _parse_img_url ($data) {
        global $_TABLES;
        if (empty($data)) { return $data; }
        if (mb_ereg('\/media\.php\?.+s=([0-9]+)', $data, $match)) {
            // MGのURL
            $mediaid = $match;
            return tkgmaps_mg_image_url( tkgmaps_mg_filename($mediaid) );
        } elseif (mb_ereg('[^0-9]', $data)) {
            // MGのIDでもURLでもない
            return $data;
        } else {
            // MGのID
            $mediaid = $data;
            return tkgmaps_mg_image_url( tkgmaps_mg_filename($mediaid) );
        }
    }
    
    // 文字列の末尾のBRタグを除去
    function _rcutbr ($sub) {
        $sub = preg_replace('/<br>$/', '', $sub);
        $sub = preg_replace('/<br \/>$/', '', $sub);
        return $sub;
    }
    
    // preg_match を行う。
    //   末尾のBRを削除した値を返す。
    //   文字列も参照渡しにより、一致部分を削除する。
    function _preg ($pat, &$sub) {
        $pat_quote = str_replace('/', '\/', $pat);
        $pattern = '/' . $pat_quote . '/';
        preg_match($pattern, $sub, $matches);
        $retval = $matches[1];
        $retval = $this->_rcutbr($retval);
        $sub = preg_replace($pattern, '', $sub, 1);
        return $retval;
    }
    
    // explode を行う。
    //   末尾のBRを削除した、分割した値を返す。
    function _explode ($pat, $sub, $limit=2) {
        list($coltmp, $retval) = explode($pat, $sub, $limit);
        $retval = $this->_rcutbr($retval);
        $coltmp = $this->_rcutbr($coltmp);
        return array($coltmp, $retval);
    }
}

?>
