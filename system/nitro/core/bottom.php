<?php
function writeToCacheFile() {
	global $nitroPersistance;
	
	if (passesPageCacheValidation() == false) {
		return false;	
	}
	$cachefile = NITRO_PAGECACHE_FOLDER.generateNameOfCacheFile();
	
	if (!is_dir(NITRO_PAGECACHE_FOLDER)) {
		mkdir(NITRO_PAGECACHE_FOLDER);
	}
	
	
	$ob_content = ob_get_contents();
	
	if (!empty($nitroPersistance['Nitro']['Mini']['Enabled']) && $nitroPersistance['Nitro']['Mini']['Enabled'] == 'yes' && ((!empty($nitroPersistance['Nitro']['Mini']['CSS']) && $nitroPersistance['Nitro']['Mini']['CSS'] == 'yes') || (!empty($nitroPersistance['Nitro']['Mini']['JS']) && $nitroPersistance['Nitro']['Mini']['JS'] == 'yes'))) {
		
		include NITRO_FOLDER . 'core' . DS . 'resources_fix_tool.php';
		$ob_content = extractHardcodedResources($nitroPersistance, $ob_content);
	}
	
	$ob_content = minifyHtmlIfNecessary($ob_content);
	$ob_content = addImageWHAttributesIfNecessary($ob_content);
	$cached = fopen($cachefile, 'w');
	fwrite($cached, $ob_content);
	fclose($cached);
	
	if (isset($nitroPersistance['Nitro']['Compress']['Enabled']) && $nitroPersistance['Nitro']['Compress']['Enabled'] == "yes" && $nitroPersistance['Nitro']['Compress']['HTML'] == "yes") {	
		
		$ob_content = compressGzipIfNecessary($ob_content);
		$cached = fopen($cachefile.'.gz', 'w');
		fwrite($cached, "\x1f\x8b\x08\x00\x00\x00\x00\x00".$ob_content);
		fclose($cached);
	}

}



function writeLoadTime($time) {
	if (passesPageCacheValidation() == false) {
		return false;	
	}
	file_put_contents(NITRO_PAGECACHE_FOLDER.'meta.html', generateNameOfCacheFile().' : '.$time.' ; ', FILE_APPEND | LOCK_EX);
}

writeToCacheFile();
ob_end_flush();

global $startTime;
writeLoadTime(microtime(true) - $startTime);
?>