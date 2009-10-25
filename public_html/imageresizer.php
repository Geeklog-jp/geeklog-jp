<?php
/**
 * 画像縮小プロキシスクリプト
 * 
 * imageresizer.php?image=imagename&size=size&quality=quality
 * imagename: イメージのurl
 * size: リサイズ後のサイズ
 * quality: jpegのクオリティ
 * site_url: サイトのurl（このバージョンでは不要）
 *
 * sizeで指定された大きさより縦横いずれかが大きければsizeにあわせて縮小する。
 * アスペクト比は保存される。
 * 縦横どちらもsizeより小さければJpegへの変換だけを行う。
 * イメージが相対urlの場合、site_urlを追加する。
 *
 * 他サイトかつallow_url_fopen = FALSEの場合は、取得したファイルをローカルに
 * 保存する。
 */

require_once dirname(__FILE__) . '/lib-common.php';

// エラーログ出力
function RESIZER_errorLog($str) {
	$str = 'imageresizer.php: ' . $str;
	
	if (function_exists('COM_errorLog')) {
		COM_errorLog($str);
	} else {
		echo $str;
	}
}

// ========================================================
// メイン
// ========================================================

// 画像ストリームをブラウザに直接送り込むために、携帯ハックの
// custom_cellular.php中で行われている出力バッファリングを無効にする
while (@ob_end_clean()) {
}

// キャッシュファイルを残したくない場合は、TRUE を FALSE に変える
define('RESIZER_KEEP_CACHE', TRUE);

// パス設定（Geeklog以外で使用する場合は、個別にセットすること）
$site_url   = $_CONF['site_url'];	// 自サイトのURL（末尾の '/' なし）
$path_html  = $_CONF['path_html'];	// $site_urlのパス（末尾の '/' あり）
$path_cache = $_CONF['path_data'];	// キャッシュファイルを作成するディレクトリ

// dataディレクトリがキャッシュファイルでいっぱいになるのが嫌な場合は、サブディ
// レクトリを指定する。末尾の '/' を忘れずに。ディレクトリのパーミッションを
// 777にすること。
# $path_cache = $_CONF['path_data'] . 'image_cache/';

// 指定がない場合の画像の縮小用パラメータ
$size = 160;
$quality = 50;

if (isset ($_GET['image'])) {
	$image = $_GET['image'];
} else {
	RESIZER_errorLog('No image file specified.');
	exit(1);
}

if (isset ($_GET['size'])) {
	$size = COM_applyFilter($_GET['size'], TRUE);
}

if (isset ($_GET['quality'])) {
	$quality = COM_applyFilter($_GET['quality'], TRUE);
}

$is_remote = FALSE;
$org_image = $image;

// 相対URLの場合、サイトのURIを追加する
if (!preg_match("!^https*?:\/\/!", $image)) {
	$image = $site_url . $image;
} 

// 自サイトの場合は、URI --> パス変換
if (strcasecmp($site_url, substr($image, 0, strlen($site_url))) === 0) {
	$image = realpath($path_html . str_replace($site_url . '/' ,'', $image));
} else {
	// 他サイトかつ、allow_url_fopen = FALSEの場合は、PEARのHTTP_Requestクラス
	// でローカルにファイルを取得してキャッシュする。
	if (!@ini_get('allow_url_fopen')) {
		$cache_file = $path_cache . md5($image);
		clearstatcache();
		if (file_exists($cache_file)) {
			$last_modified = filemtime($cache_file);
		} else {
			$last_modified = FALSE;
		}
		
		require_once 'HTTP/Request.php';
		
		$req =& new HTTP_Request($image);
		$req->setMethod(HTTP_REQUEST_METHOD_GET);
		
		// If-Modified-Sinceヘッダを付加
		if (defined('RESIZER_KEEP_CACHE') AND (RESIZER_KEEP_CACHE === TRUE)
		 AND ($last_modified !== FALSE)) {
			$req->addHeader(
				'If-Modified-Since',
				gmdate('D, d M Y H:i:s', $last_modified) . ' GMT'
			);
		}
		
		if (!PEAR::isError($req->sendRequest())) {
			$code = (int) $req->getResponseCode();
			// リソースへ初アクセス --> ローカルへ取得、キャッシュに保存
			if (($code === 200) OR
			 (($code === 304) AND (!defined('RESIZER_KEEP_CACHE') OR (RESIZER_KEEP_CACHE !== TRUE)))) {
				$result = $req->getResponseBody();
				$fp = @fopen($cache_file, 'wb');
				if ($fp !== FALSE) {
					fwrite($fp, $result);
					fclose($fp);
					$is_remote = TRUE;
					$image = $cache_file;
				} else {
					RESIZER_errorLog('Cannot open a cache file.');
					exit(1);
				}
			} else if ($code === 304) {
				// リソース更新なし --> キャッシュから取得
				$fp = @fopen($cache_file, 'rb');
				if ($fp !== FALSE) {
					$result = '';
					
					while (!feof($fp)) {
						$result .= fread($fp, 4096);
					}
					
					fclose($fp);
					$is_remote = TRUE;
					$image = $cache_file;
				} else {
					RESIZER_errorLog('Cannot open a cache file.');
					exit(1);
				}
				
			} else {
				RESIZER_errorLog('Cannot get a remote image.  Error ' . $code);
				exit(1);
			}
		} else {
			RESIZER_errorLog('Cannot get a remote image.  Error ' . $req->getResponseCode());
			exit(1);
		}
	}
}

// 画像ファイル名の後にクエリストリングがついている場合を考慮して、パターンに
// (\?.*)? を追加。
if (preg_match('/\.jpe?g(\?.*)?$/i', $org_image)) {
	$src_img = imagecreatefromjpeg($image);
} else if (preg_match('/\.gif(\?.*)?$/i', $org_image)) {
	$src_img = imagecreatefromgif($image);
} else if (preg_match('/\.png(\?.*)?$/i', $org_image)) {
	$src_img = imagecreatefrompng($image);
} else {
	RESIZER_errorLog(': Image format is not supported.');
	exit(1);
}

// 元イメージのサイズを取得
list($s_width, $s_height) = getimagesize($image);

// キャッシュファイルを残したくない場合は、ここで削除する
if ($is_remote
 AND (!defined('RESIZER_KEEP_CACHE') OR (RESIZER_KEEP_CACHE !== TRUE))) {
	@unlink($image);
}

if (!$src_img) {
	RESIZER_errorLog('Cannot read image.');
	exit(1);
} else if (!is_resource($src_img)) {
	RESIZER_errorLog('This is not image resource.');
	exit(1);
}

// 画像の縮小(GDを使用)
if (($s_width > $size) OR ($s_height > $size)) {
	if ($s_width > $s_height) {
		$height = intval(($s_height / $s_width) * $size);
		$width = $size;
	} else {
		$width = intval(($s_width / $s_height) * $size);
		$height = $size;
	}
	$dst_img = imagecreatetruecolor($width, $height);

	if (is_resource($dst_img)) {
		imagefill($dst_img, 0, 0, imagecolorallocate($dst_img, 255, 255, 255));
		if (!@imagecopyresampled($dst_img, $src_img, 0, 0, 0, 0, $width, $height, 
								$s_width, $s_height)) {
			RESIZER_errorLog('Cannot copy image.');
			exit(1);
		}
	} else {
		RESIZER_errorLog('Cannot create image.');
		exit(1);
	}
	
    mb_http_output('pass');
	header('Content-Type: image/jpeg');
	imagejpeg($dst_img, NULL, $quality);
	imagedestroy($dst_img);
} else {
    mb_http_output('pass');
	header('Content-Type: image/jpeg');
	imagejpeg($src_img, NULL, $quality);
	imagedestroy($src_img);
}
