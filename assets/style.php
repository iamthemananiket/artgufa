<?php 
if (empty($_GET['p'])) exit;
$request = $_GET['p'] . '.css';
$compressionLevel = isset($_GET['l']) ? (int)$_GET['l'] : 4;

header('Content-type: text/css; charset=utf-8');
header('Cache-Control:public, max-age=31536000');
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600 * 24 * 30));
header('Vary: Accept-Encoding');

$currentDir = dirname(__FILE__);
$filename = realpath($currentDir. DIRECTORY_SEPARATOR . '..') . DIRECTORY_SEPARATOR . trim(str_replace('/', DIRECTORY_SEPARATOR, $request), DIRECTORY_SEPARATOR);
$target = $currentDir . DIRECTORY_SEPARATOR . 'style' . DIRECTORY_SEPARATOR . basename($request).'.gz';
$cachefile = $currentDir . DIRECTORY_SEPARATOR . 'style'. DIRECTORY_SEPARATOR .'gzstyles.cache';

if (!file_exists($filename)) {
	echo '';
	exit;
}

if (!file_exists($currentDir . DIRECTORY_SEPARATOR . 'style')) {
	mkdir($currentDir . DIRECTORY_SEPARATOR . 'style');
}

if (!file_exists($cachefile)) {
	file_put_contents($cachefile, json_encode(array()));
}

$cache = json_decode(file_get_contents($cachefile), true);
$cache = !empty($cache) ? $cache : array();

if (array_key_exists($filename, $cache)) {
	if ($cache[$filename] != filemtime($filename)) {
		file_put_contents($target, gzencode(file_get_contents($filename), $compressionLevel));
		$cache[$filename] = filemtime($filename);
		file_put_contents($cachefile, json_encode($cache));
	}
} else {
	file_put_contents($target, gzencode(file_get_contents($filename), $compressionLevel));
	$cache[$filename] = filemtime($filename);
	file_put_contents($cachefile, json_encode($cache));
}
 
if( strpos($_SERVER["HTTP_ACCEPT_ENCODING"], 'x-gzip') !== false ) 
	$encoding = 'x-gzip'; 
else if( strpos($_SERVER["HTTP_ACCEPT_ENCODING"],'gzip') !== false ) 
	$encoding = 'gzip'; 
else 
	$encoding = false; 

$modified_file = $encoding ? $target : $filename;
$filemtime = filemtime($modified_file);
header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', $filemtime));
if (!empty($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $filemtime) {
	header('HTTP/1.1 304 Not Modified');
	exit;
}

if($encoding) { 
	header('Content-Encoding: '.$encoding); 
	readfile($target);
} else {
	readfile($filename); 
}