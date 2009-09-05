<?php

// +---------------------------------------------------------------------------+
// | Geeklog 1.5                                                               |
// +---------------------------------------------------------------------------+
// | public_html/admin/install/fb.php                                          |
// |                                                                           |
// | Part of Geeklog pre-installation check scripts                            |
// +---------------------------------------------------------------------------+
// | Copyright (C) 2009 by the following authors:                              |
// |                                                                           |
// | Authors: mystral-kk - geeklog AT mystral-kk DOT net                       |
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

/**
* This script enables a Geeklog user to traverse the file tree and search for
* "db-config.php" visually.
*
* @author   mystral-kk <geeklog AT mystral-kk DOT net>
* @date     2009-01-12
* @version  1.3.0
* @license  GPLv2 or later
*/
define('DS', DIRECTORY_SEPARATOR);
define('LB', "\n");
define('OS_WIN', strcasecmp(substr(PHP_OS, 0, 3), 'WIN') === 0);
define('TARGET', 'db-config.php');

// Display an icon image

if (isset($_GET['mode']) AND ($_GET['mode'] == 'img1')) {
	header('Content-Type: image/gif');
	echo base64_decode(
		   'R0lGODlhJAAZAOYAAP/zWf/bQP/aPv/4Xv/eQ//eO//8Yv7bNf//X//7Yv/3X//e'
		 . 'RPnWPMa5cNra 2f/bPPPy9MCuWcy2S/3+/tTT0PXTO/T0+//bO+bl5uzs7PDwZ/b'
		 . '4/fv8aoiIi8+8S8fIy8S7j/zY P//hObGyuv/cPu/NNpmRauzNRfTUQuDh6tPQlt'
		 . 'O/Tvv7+9e/QtPThbqnS7qrafrVNMjJ0Pv8//n5 /tvASeroXM/OyNTOp+/x+dDNh'
		 . 'Onoa7Ore8XDe/n5+Z6hqd7e3da7Rs/MuOfGOpWPed3ZZrOtk6Wa ZY+QlpeSefvf'
		 . 'RfrZO/7sUsq0VcWwTcvGqP/0WdvPYKGjrby7udC3SM+1RtPKipmanuHFRNrLV+3S'
		 . 'NvziSfT1a+bJTP3ZPPvzXOTidf3XLv/ZP/PWN6ugcrSxp8WsQ7y+ydfVcNPDUfnY'
		 . 'Pf/zUf/tTOfp 9MDCyeTkm/f5at3bWuXm7/XYQI+LdMLAsf/4VvzlSP/rUf/iSP/'
		 . 'nTf/uVf/+Zf/ZPv//Zv///yH5 BAAAAAAALAAAAAAkABkAAAf/gH+Cg4SFhTQQEB'
		 . 'YWGUAUDhOGhBMbOTOEM4sQGBRCOCA8PSo6YDs2 aBSSGxgOOFYNdSkON0IgDbcNR'
		 . 'XE2Nhp8CMB8fggqhhsgXSclMQdBETVYQ8thLRp+19jZw2+GFBEH Fw8CfRcH5hUn'
		 . '6VEc2u18LoYNFeN9fQ8VWCtZUUU7Guzt2vUwBCIGPQEVsuzgAgdgwIB8Bha60aJA'
		 . 'PS8rrAnzw6ejx48gf8Er1AbGATF9GKThYKBlApcvX7qcmSABgpGEaBgpQSLlCgUD'
		 . 'gA4YGnSoUAVC jSLQIcmNkwICGHj4AgWA1atYr1bFaoepoRQmo3rYQ7as2bNo11i'
		 . 'RpJOnVCZM7/DInUu3Ll02xSR9 qFKAgQQ9gAMLHkz4Tl5DckyqkbAlj+PHkCNHVo'
		 . 'JD0p8ZZYZckKCEwALPnz8TGD1atOfRc55Y/uOt gIQQAWLLji1gdu3YJEiIGKPac'
		 . 'g4eWqqEoFevuPE+Ah6IELGkQpAXN1b/mdKCyvDjxh8UKLAEhYQX JohcOeNDugMn'
		 . '1okn337hAgoPEUzQ6SBFRooN0gX9NiNg/XYUNTRhgglJdHDFCDJgwEJ+hUzxgggF'
		 . 'ANjEEUR0gMQPI3wABASRCDJBhwymQEYERxR4YYYOZFAeg9L5IIMUGH7gAAYQLMgi'
		 . 'i4xkUOON+QUC ADs='
	);
	exit;
}

if (isset($_GET['mode']) AND ($_GET['mode'] == 'img2')) {
	header('Content-Type: image/gif');
	echo base64_decode(
		   'R0lGODlhEQAVAOZEAPr6+ubm5r6+vvLy8u7u7rOzs/f39/j39+np6aurq/Lx8v7/'
		 . '//r6+////vr7+u7u7+7v7u/v7vz8/Pf499HR0ff3+KampsHBwenp6PLy8fX19f/+'
		 . '//Hy8vf39vr5+u/u7/Lx8f38/fX19PDv7urr6vHw8by8vPf4+KCgoObm5evr6/r7'
		 . '++Dg4P38/OPj4+jp6e7v7/7+/u/v7+jp6OTk5Pj4+fj3+Nzc3MnJyf7+///+/uHh'
		 . '4fPz89/f3+Li4vv7+6Ojo6enp5ycnP///////wAAAAAAAAAAAAAAAAAAAAAAAAAA'
		 . 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'
		 . 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'
		 . 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'
		 . 'AAAAAAAAAAAAAAAAACH5BAEAAEQALAAAAAARABUAAAfTgBQJFkGFhoeFQDgJBhI/'
		 . 'j5CRj0NAQT9DmJmampWXm5+YnUNCpKWmQqGWoKCVDA0LQzk6rzELDZgbG5U1Eqe+'
		 . 'IS2VHQDEACsMxQweDsyVPBU2BycGBgcT1tUGFZUlGr6nGiKVBAMcChnnCgPr6wog'
		 . 'lSQEBBEEEDIREA8PHyMEMJUzVPhCAaRgwQuVUiBAgOHFQgxANgkQEMRFgIsYA0TM'
		 . 'JKAAkSA7aPjaOKQjkY89fKhc6WOjyZNBUrJUGfHlyQQ3WPTYydOEzZOCCCEKcuGk'
		 . 'USKBAAA7'
	);
	exit;
}

if (isset($_GET['mode']) AND ($_GET['mode'] == 'imglogo')) {
	header('Content-Type: image/jpeg');
	echo base64_decode(
		  '/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAACgAA/+4ADkFkb2Jl'
		. 'AGTAAAAAAf/bAIQAFBAQGRIZJxcXJzImHyYyLiYmJiYuPjU1NTU1PkRBQUFBQUFE'
		. 'RERERERERERERERERERERERERERERERERERERAEVGRkgHCAmGBgmNiYgJjZENisr'
		. 'NkREREI1QkRERERERERERERERERERERERERERERERERERERERERERERERERE/8AA'
		. 'EQgAOACXAwEiAAIRAQMRAf/EAI0AAQADAQEBAAAAAAAAAAAAAAADBAUBAgYBAQEB'
		. 'AQEBAAAAAAAAAAAAAAABAwIEBRAAAQMCAwQIBAQEBwAAAAAAAQACAxEEIRIFMUFR'
		. 'E2FxgZGhIlIU0TKSM7HBQmLwcoKiwiNDUyQ0BhEAAgICAgIBBAMAAAAAAAAAAAER'
		. 'AhIDITFBUWFxkSIyQoIU/9oADAMBAAIRAxEAPwD7NFDcXDbdnMfUioFBxJoPFQCO'
		. '4uPuHlM9DD5u127+n6kB7ub+K28rjV52Rs8zj2D8dipNfqE7hIGiMA/I84U6drif'
		. 'pp0q81lvZNwysB2neeveSuC7MgrCwvHqPlHj8F0qt8+PYPBtp5PuTEDhE0N8TmPc'
		. 'QuQN9tOYauLXtztzuLjVuDsT1tNOtRTvvyKsa0dWJ8VELh0kLJ34SQPGf+U+V39p'
		. 'r1hdPW1XKU/oSTYREWZQiIgCIsS2v5ZLvIT5CXDKtKUdlZr+PJJNtEWLfX00NzkY'
		. 'aNGXDilKO7xqG4NpERZlCIiAIiIDOkB1EOYCWwVLXOG15HDg0HftO7DE+X3E3tXU'
		. 'NJYjkf2b+0UcpZQbN5mb9px/zW+k+sf4vq415M1rJg//AE5hy39f6T24j6V1Vw02'
		. 'DM02393KZJauDdtd5Wpfag20o0CrjuUWkM5bZIzta+hWZrAcLhx4gZe74r2Qtm3G'
		. '361XCOekWm/+gazGZoA4g/FVHas10khLDklblo7y13b8Tv2ArNgkgYKnF+Gx1HbM'
		. 'c1AZK1rgMo4LZtoZIGumkiawDK5py0dWuO9zjh6j2LB2TeNK45cFIm65MIxHRuYU'
		. 'Y52NQekOA20OK9m8vYKSSVofU3BVb+B0d+7LQB5ZK08TTL1YHMe1X5be/laWyGrT'
		. 'txatdSSqssYfvsjL7dSYbfnndhl/dwWYL28uSXRVoNzQq8tu+GEEkFpd+k1xoprJ'
		. 't26P/jny16Nq0WulU7LF88ZdEkuafqbpH8mb5jsOzsKoWZAvATszO/NSx2M/uGuk'
		. 'LQ6od8wr3KnynTTFjdpLqLutafni1DrzHgGjdatI6QMttlaVpXMq2okm582Boyvc'
		. 'F3S5mQTUlFCfKCf0lNU/7Z/pUrVVvhWsLHv2PBe1HUzA7lRfNvdwVEahdxEOeTQ+'
		. 'puBXl1BenmbOZjXhVbGqlvtnZujL11XEVphTHLLtl7DdRYbczndhl/dwWSdQu5nE'
		. 'srQbmt2KqA7kH05m99Ct3RsvIw21OZLUrqVrY5c/YnZmu1i4JFCBTdTai5KWe+Bb'
		. '8udv5V8UW2FMcsF1MEln0iyp4TCw21aRP+y7/bfta3qqPL9PBaq8SxNmYY3irSKE'
		. 'L5RoZcV01krJz5WTtFf2vH8UVq/sBdgEGjxsKy5Ld7Ipbd5zOidzWO9THbfGteld'
		. 's5r1oDY2lzd2cYd+H4r1Vq3VbK2i1eHJz8E1tormvDpXAgY0bvUus3IbHyR8ztvU'
		. 'pwy8kHncyP8AkFT4qJ1ja2/nndUnfI7amayV9tpx6SEeijeQOuo7aVvzGsRr1fFt'
		. 'O1eRp147yGuXpdh+Kv3Eomi5drG5xBa5hDcratNRi7L4LUXK3usqqUTKnwWDOh0t'
		. 'rYHQyGpca1G49CznaXdQk8vEcWup8F9Eild9035n2IMWz0qRsglmNKGtK1JXq302'
		. 'SO65ppkBJB61sIj33c/KgQZWo6YZ3cyKmY/MOPSoJNKne9hJBwaHHqW4iLfdJL0I'
		. 'MvUdM9weZHg/eDvVBulXTyGvFAN5dVfRold96rEQUXWUMVsYXmjdpcePFZbdKuAa'
		. 'xuBaf1Nctm9tRdR5CaY1BWOdIuW4NIoeBWuq/Dm8NvlMjRSdABLyg4HENzbkWtBo'
		. '+Rri8gvLXBvAEhFt/orOE/2JBsIiL5p2UrwGJ8dw0E5TkeGipyO6BwdlPVVd9xPJ'
		. '9qKg9Upy+Aqe+iIgOe1mkxmmNPTEMg78XdzgpobOGE1YwB3q2u7ziiICdERAEREA'
		. 'REQBERAEREAREQBERAf/2Q=='
	);
	exit;
}

/**
* Convert charset of a string to SJIS
*/
function convertCharset($str) {
	if (OS_WIN) {
		return mb_convert_encoding($str, 'utf-8', 'sjis');
	} else {
		return $str;
	}
}

if (isset($_GET['path'])) {
	$path = $_GET['path'];
} else {
	$path = dirname(__FILE__);
}
if (isset($_GET['mode'])) {
	$mode = $_GET['mode'];
} else {
	$mode = 'install';
}

$result = FALSE;
$header = <<<EOD
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="Content-Style-Type" content="text/css">
	<title>Geeklog インストール前　ファイルブラウザ</title>
	<style type="text/css">
<!--
a {
	color: blue;
}

a:hover {
	color: blue;
	text-decoration: none;
	color: white;
	background-color: blue;
}

a:visted {
	color: blue;
}
-->
</style>
</head>
<body>
<h1>Geeklog インストール前　ファイルブラウザ</h1>
EOD;

$body = '<p style="color: white; background-color: black;"><strong>現在のパス</strong>：'
      . convertCharset($path) . '</p>' . LB;

$parent = @realpath($path . DS . '..');
if ($parent !== FALSE) {
	$body .= '<p><a href="fb.php?mode=' . $mode . '&amp;path='
		  .  rawurlencode($parent) . '">[一つ上のフォルダへ]</a></p>' . LB;
}

if (($dh = @opendir($path)) === FALSE) {
	$body .= '<p>エラー：ディレクトリを開けません。検索を終了します。</p>' . LB;
} else {
	while (($entry = readdir($dh)) !== FALSE) {
		$fullpath = $path . DS . $entry;
		if (is_dir($fullpath)) {
			if (($entry != '.') AND ($entry != '..')) {
				$body .= '<img alt="フォルダのアイコン" src="fb.php?mode=img1"><a href="fb.php?mode='
					  . $mode . '&amp;path=' . rawurlencode($fullpath) . '">'
					  .  htmlspecialchars(convertCharset($entry), ENT_QUOTES)
					  .  '</a><br>' . LB;
			}
		} else {
			if ($entry == TARGET) {
				$body .= '<img alt="ファイルのアイコン" src="fb.php?mode=img2">  '
					  .  '<span style="color: white; background-color: green;">'
					  . TARGET . '</span>  [<a href="precheck.php?mode='
					  . $mode . '&amp;step=2&amp;path='
					  .  rawurlencode(dirname($fullpath) . DS)
					  .  '">このファイルを使用する</a>]<br>' . LB;
				$result = TRUE;
			}
		}
	}
	
	closedir($dh);
}

if ($result === TRUE) {
	$msg = '<p style="padding: 5px; border: solid 2px #006633; background-color: #ccff99;"><strong>' . TARGET . '</strong>が見つかりました。このファイルでよければ、<strong>[このファイルを使用する]</strong>をクリックしてください。</p>' . LB;
} else {
	$msg = '<p style="padding: 5px; border: solid 2px #cc3333; background-color: #ffccff;">下に表示されているリンクをクリックして、<strong>' . TARGET . '</strong>を探してください。</p>' . LB;
}

header('Content-Type: text/html; charset=utf-8');
echo $header . $msg . $body;
