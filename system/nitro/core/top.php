<?php 
require_once(dirname(__FILE__).'/../config.php');
require_once(dirname(__FILE__).'/../core/core.php');

if (session_id()) {
	if (isset($_SESSION['nitro_ftp_persistence'])) unset($_SESSION['nitro_ftp_persistence']);
	if (isset($_SESSION['nitro_persistence'])) unset($_SESSION['nitro_persistence']);
}

$nitroPersistance = getNitroPersistence();

function getIgnoredRoutes() {
	global $nitroPersistance;
	$ignoredRoutes = array();
	if (!empty($nitroPersistance['Nitro']['PageCache']['IgnoredRoutes'])) {
		$ignoredRoutes = explode(PHP_EOL,$nitroPersistance['Nitro']['PageCache']['IgnoredRoutes']);
	}
	
	foreach ($ignoredRoutes as $k=>$v) {
		$ignoredRoutes[$k] = trim($v);	
	}
	
	$predefinedIgnoredRoutes = array(
	'checkout/cart', 
	'checkout/checkout',
	'checkout/success',
	'account/register',
	'account/login',
	'account/edit',
	'account/account',
	'account/password',
	'account/address',
	'account/address/update',
	'account/address/delete',
	'account/wishlist',
	'account/order',
	'account/download',
	'account/return',
	'account/return/insert',
	'account/reward',
	'account/voucher',
	'account/transaction',
	'account/newsletter',
	'account/logout',
	'affiliate/login',
	'affiliate/register',
	'affiliate/account',
	'affiliate/edit',
	'affiliate/password',
	'affiliate/payment',
	'affiliate/tracking',
	'affiliate/transaction',
	'affiliate/logout',
	'information/contact',
	'product/compare',
	'error/not_found',
	'feed/google_sitemap',
	'feed/google_base'
	);
	
	$ignoredRoutes = array_merge($predefinedIgnoredRoutes,$ignoredRoutes);
	return $ignoredRoutes;
}

function getIgnoredUrls() {
	global $nitroPersistance;
	$ignoredUrls = array();
	if (!empty($nitroPersistance['Nitro']['DisabledURLs'])) {
		$ignoredUrls = explode("\n", trim($nitroPersistance['Nitro']['DisabledURLs']));
	}
	foreach ($ignoredUrls as $k=>$v) {
		$ignoredUrls[$k] = trim($v);	
	}
	$predefinedIgnoredUrls = array('/admin/', 'isearch');
	$ignoredUrls = array_merge($predefinedIgnoredUrls,$ignoredUrls);
	return $ignoredUrls;
}

function areWeInIgnoredUrl() {
	$url = getFullURL();
	$ignoredUrls = getIgnoredUrls();
	
	foreach ($ignoredUrls as $ignoredUrl) {
		if ($ignoredUrl[0] != '!') {
			if (preg_match('~' . str_replace(array('~', '#asterisk#'), array('\~', '.*'), preg_quote(str_replace('*', '#asterisk#', $ignoredUrl))) . '~', $url)) {
				return true;
			}
		} else {
			if (!preg_match('~' . str_replace(array('~', '#asterisk#'), array('\~', '.*'), preg_quote(str_replace('*', '#asterisk#', substr($ignoredUrl, 1)))) . '~', $url)) {
				return true;
			}
		}
	}
	
	return false;
}

function isCustomerLogged() {
	return !empty($_SESSION['customer_id']);
}

function isItemsInCart() {
	return !empty($_SESSION['cart']);
}

function isWishlistAdded() {
	return !empty($_SESSION['wishlist']);
}


function isAJAXRequest() { 
	return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

function isPOSTRequest() { 
	return !empty($_POST);
}

function getCacheFilepath() {
	$cachefile = NITRO_PAGECACHE_FOLDER.generateNameOfCacheFile();
	return $cachefile;
}

function getFullURL() {
	$host = (!empty($_SERVER['HTTP_HOST'])) ? $_SERVER['HTTP_HOST'] : '';
	$request_uri = (!empty($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : '';
	return $host.$request_uri;
}


function generateNameOfCacheFile() {
	if (empty($_SESSION['language'])&& empty($_SESSION['currency'])) {
		// In, when the site is opened for first time
		if ($link = mysql_connect(DB_HOSTNAME, DB_USERNAME, DB_PASSWORD)) {
			if (mysql_select_db(DB_DATABASE, $link)) {
				mysql_query("SET NAMES 'utf8'", $link);
				mysql_query("SET CHARACTER SET utf8", $link);
				mysql_query("SET CHARACTER_SET_CONNECTION=utf8", $link);
				mysql_query("SET SQL_MODE = ''", $link);
				
				// Store
				if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
					$store_query = mysql_query("SELECT * FROM " . DB_PREFIX . "store WHERE REPLACE(`ssl`, 'www.', '') = '" . mysql_real_escape_string('https://' . str_replace('www.', '', $_SERVER['HTTP_HOST']) . rtrim(dirname($_SERVER['PHP_SELF']), '/.\\') . '/', $link) . "'", $link);
				} else {
					$store_query = mysql_query("SELECT * FROM " . DB_PREFIX . "store WHERE REPLACE(`url`, 'www.', '') = '" . mysql_real_escape_string('http://' . str_replace('www.', '', $_SERVER['HTTP_HOST']) . rtrim(dirname($_SERVER['PHP_SELF']), '/.\\') . '/', $link) . "'", $link);
				}
				$store_id = 0;
				if ($store_query && is_resource($store_query) && mysql_num_rows($store_query)) {
					$result = mysql_fetch_assoc($store_query);
					$store_id = $result['store_id'];
				}
				
				$resource = mysql_query("SELECT * FROM ".DB_PREFIX."setting WHERE (`key`='config_language' OR `key`='config_currency') AND `store_id` = '" . $store_id . "'",$link);
				
				if ($resource && is_resource($resource)) {
					$data = array();
					$config_language = 0;
					$config_currency = 0;
					while ($result = mysql_fetch_assoc($resource)) {

						if (!empty($result['key']) && $result['key'] == 'config_language') {
							$config_language = strtolower($result['value']);
						}
						if (!empty($result['key']) && $result['key'] == 'config_currency') {
							$config_currency = strtolower($result['value']);
						}
					}
					if (isset($_SESSION)) {
						$_SESSION['language'] = $config_language;
						$_SESSION['currency'] = $config_currency;
					}
				}
				mysql_close($link);
			}
		}
	}
	
	$filename = getFullURL();
	$filename = str_replace(array('/','?',':',';','=','&amp;','&','.','--','%','~','-amp-'),'-',$filename);
	$language = strtolower((!empty($_SESSION['language'])) ? $_SESSION['language'] : '0'); 
	$currency = strtolower((!empty($_SESSION['currency'])) ? $_SESSION['currency'] : '0'); 
	
	if (NITRO_MODE) {//if > 0 than we are in debug mode
		$cached_filename = $filename.'-'.$language.'-'.$currency.'.html';
	} else {
		$cached_filename = md5($filename.'-'.$language.'-'.$currency).'.html';
	}
	
	$categorizr = DIR_SYSTEM . 'library/categorizr.php';
	if (file_exists($categorizr)) {
		require_once($categorizr);
		if(isMobile() || isTablet()) { 
			$cached_filename = 'mobile-'.$cached_filename;
		}
	}
	
	return getSSLCachePrefix() . $cached_filename;
}

function pageRefresh() {
	echo '<script> document.location = document.location; </script>';	
}


function getLoadTime() {
	$metafile = NITRO_PAGECACHE_FOLDER.'meta.html';
	$cachefile = generateNameOfCacheFile();
	if (file_exists($metafile)) {
		$entries = file_get_contents($metafile);
		$entries = explode(' ; ',$entries);
		
		foreach ($entries as $raw_entry) {
			$entry = explode(' : ',$raw_entry);
			if ($entry[0] == $cachefile) {
				return $entry[1];	
			}
		}
		
	} else {
		return 1;	
	}
}

function passesPageCacheValidation() {
	if (NITRO_IGNORE_AJAX_REQUESTS == TRUE && isAJAXRequest()) {
		return false;	
	}

	if (NITRO_IGNORE_POST_REQUESTS == TRUE && isPOSTRequest()) {
		return false;	
	}
	
	if (isItemsInCart() || isCustomerLogged() || isWishlistAdded()) {
		return false;	
	}
	
	$ignoredRoutes = getIgnoredRoutes();
	global $registry;
	if (!empty($registry)) {
		$current_route = !empty($registry->get('request')->get['route']) ? $registry->get('request')->get['route'] : NULL;
	}
	if ((!empty($_GET['route']) && in_array($_GET['route'],$ignoredRoutes)) || (!empty($current_route) && in_array($current_route,$ignoredRoutes))) {
		return false;
	}
	if(areWeInIgnoredUrl()) {
		return false;
	}
	return true;
}

function decideToShowFrontWidget() {
	global $nitroPersistance;
	$adminDesire = (!empty($nitroPersistance['Nitro']['PageCache']['StoreFrontWidget'])) ? $nitroPersistance['Nitro']['PageCache']['StoreFrontWidget'] : 'showOnlyWhenAdminIsLogged';
	switch ($adminDesire) {
		case 'showOnlyWhenAdminIsLogged':
			return isset($_SESSION['user_id']);
		break;
		case 'showAlways':
			return true;
		break;
		case 'showNever':
			return false;
		break;	
	}
}


function serveCacheIfNecessary() {
	
	if (!session_id()) {
		session_start();
	}
	
	if (passesPageCacheValidation() == false) {
		return false;	
	}
	
	$cachefile = NITRO_PAGECACHE_FOLDER.generateNameOfCacheFile();
	if (file_exists($cachefile) && time() - NITROCACHE_TIME < filemtime($cachefile)) {
		$before = microtime(true);
		usleep(1);
		header('Content-type: text/html; charset=utf-8');
		
		serveBrowserCacheHeadersIfNecessary(filemtime($cachefile));
		
		if (loadGzipHeadersIfNecessary() == true) {
			readfile($cachefile.'.gz');	
		} else { 
			readfile($cachefile);
		}
		$after = microtime(true);
		if (decideToShowFrontWidget()) {
			$renderTime = $after-$before;
			$nameOfCacheFile = generateNameOfCacheFile();
			$originalRenderTime = (float)getLoadTime();
			$faster = (int)($originalRenderTime / $renderTime);
			include(NITRO_FOLDER.'core/frontwidget.php');
		}
		exit;
	}
}

function addImageWHAttributesIfNecessary($content) {
	global $nitroPersistance;
	if (isset($nitroPersistance['Nitro']['PageCache']['AddWHImageAttributes']) && $nitroPersistance['Nitro']['PageCache']['AddWHImageAttributes'] == 'yes') {
		$categorizr = DIR_SYSTEM . 'library/categorizr.php';
		if (file_exists($categorizr)) {
			require_once($categorizr);
			if(isMobile() || isTablet()) { 
				return $content;
			}
		}
		return preg_replace('/(?<=src\=)[\"\'][^\"\']*\-(\d+)x(\d+)\.((jpe?g)|(png))[\"|\']/', '$0 width="$1" height="$2"', $content);
	}
	return $content;
}

function serveBrowserCacheHeadersIfNecessary($filemtime) {
	if (headers_sent()) {
		return;
	}
	global $nitroPersistance;
	
	header('Nitro-Cache: Enabled');
	
	$userAgent = !empty($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : 'FOOBAR';
	$isIE = (stripos($userAgent, 'MSIE ') !== false);
	$code304 = false;
	
	if (!empty($nitroPersistance['Nitro']['BrowserCache']['Headers']['Pages']['CacheControl']) && !$isIE) {
		header('Cache-Control:public, max-age=31536000');
	}
	if (!empty($nitroPersistance['Nitro']['BrowserCache']['Headers']['Pages']['Expires'])) {
		header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 3600 * 24 * 30));
		$code304 = true;
	}
	if (!empty($nitroPersistance['Nitro']['BrowserCache']['Headers']['Pages']['LastModified'])) {
		header('Last-Modified: '.gmdate('D, d M Y H:i:s \G\M\T', $filemtime));
		$code304 = true;
	}
	
	if ($code304 && !empty($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $filemtime) {
		header('HTTP/1.1 304 Not Modified');
		exit;
	}
}

function minifyHtmlIfNecessary($html) {
	global $nitroPersistance;
	if (isset($nitroPersistance['Nitro']['Mini']['HTML']) && $nitroPersistance['Nitro']['Mini']['HTML'] == "yes") {	
		return minifyHTML($html);
	}
	return $html;
}

function compressGzipIfNecessary($content) {
	global $nitroPersistance;
	if (isset($nitroPersistance['Nitro']['Compress']['Enabled']) && $nitroPersistance['Nitro']['Compress']['Enabled'] == "yes") {	
		$level = (isset($nitroPersistance['Nitro']['Compress']['HTMLLevel'])) ? $nitroPersistance['Nitro']['Compress']['HTMLLevel'] : '4';
		return gzcompress($content,$level);
	}
	return $content;
}

function loadGzipHeadersIfNecessary() {
	global $nitroPersistance;
	if (isset($nitroPersistance['Nitro']['Compress']['Enabled']) && $nitroPersistance['Nitro']['Compress']['Enabled'] == "yes" && $nitroPersistance['Nitro']['Compress']['HTML'] == "yes") {	
		$headers = array();
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== false)) {
			$encoding = 'gzip';
		} 
	
		if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'x-gzip') !== false)) {
			$encoding = 'x-gzip';
		}
	
		if (!isset($encoding)) {
			return false;
		}
		/*
		if (!extension_loaded('zlib') || ini_get('zlib.output_compression')) {
			return false;
		}
		*/
	
		if (headers_sent()) {
			return false;
		}
	
		if (connection_status()) { 
			return false;
		}
		
		header('Content-Encoding: '.$encoding);
		return true;
	}
	return false;
}

if (isset($_POST['cacheFileToClear'])) {
	if (file_exists(NITRO_PAGECACHE_FOLDER.$_POST['cacheFileToClear'])) {
		unlink(NITRO_PAGECACHE_FOLDER.$_POST['cacheFileToClear']);
	}
	pageRefresh();
	exit;
} 



if ($nitroPersistance['Nitro']['Enabled'] == 'yes') {
	serveCacheIfNecessary();
}


$startTime = microtime(true);
ob_start(); // Start the output buffer

?>