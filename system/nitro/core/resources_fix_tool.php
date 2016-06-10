<?php
function extractHardcodedResources($settings, $content) {
    $cssExclude = array();
    $jsExclude = array();
    
    $cssExtractCheckPassed = false;
    $jsExtractCheckPassed = false;
    
    if (!empty($settings['Nitro']['Enabled']) && $settings['Nitro']['Enabled'] == 'yes' && !empty($settings['Nitro']['Mini']['Enabled']) && $settings['Nitro']['Mini']['Enabled'] == 'yes' && !empty($settings['Nitro']['Mini']['CSS']) && $settings['Nitro']['Mini']['CSS'] == 'yes' && !empty($settings['Nitro']['Mini']['CSSExtract']) && $settings['Nitro']['Mini']['CSSExtract'] == 'yes') {
        $cssExtractCheckPassed = true;
        
        if (!empty($settings['Nitro']['Mini']['CSSExclude'])) {
            $cssExclude = explode("\n", $settings['Nitro']['Mini']['CSSExclude']);
            foreach ($cssExclude as $k=>$stylename) {
                $cssExclude[$k] = trim($stylename, "\n\r ");
            }
        }
		  
		$extractedCSSFiles = array();
		
		$current_pos = 0;
		$html_end = strlen($content)-1;
		
		while ($html_end !== false && $current_pos < $html_end) {
			$next_css = strpos($content, 'text/css', $current_pos);
			
			$tag_start = $next_css;
			if ($next_css !== false) {
				//go left to check if we are in a link tag
				$i = $next_css;
				$isTagStartFound = false;
				while ($i > 0 && !$isTagStartFound) {
					if ($content[$i-1] == '<') {
						if (substr($content, $i, 4) != '?php') {
							$isTagStartFound = true;
						} else {
							$i--;
						}
					} else {
						$i--;
					}
				}
				
				$tag_start = $i-1;
				$tag = '';
				while ($i < $next_css && $content[$i] != ' ') {
					$tag .= $content[$i];
					$i++;
				}
				
				if (strtolower($tag) == 'link') {
					//see if we are not in a comment block
					$c = $i;
					$commentStartFound = false;
					$commentEndFound = false;
					
					while ($c > 0 && !$commentStartFound) {
						if ($content[$c] == '>') {
							if (substr($content, $c-2, 3) == '-->') {
								$commentEndFound = true;
								break;
							}
						}
						if ($content[$c] == '<') {
							if (substr($content, $c, 4) == '<!--') {
								$commentStartFound = true;
							}
						}
						$c--;
					}
					
					$weAreInComment = ($commentStartFound && !$commentEndFound);
					
					//find the href
					while($i < $html_end) {
						if ($content[$i] == 'h' && (substr($content, $i, 5) == 'href=')) {
							$i+=6;
							break;
						}
						$i++;
					}
					
					$css_src = '';
					while ($i < $html_end && $content[$i] != '\'' && $content[$i] != '"') {
						$css_src .= $content[$i];
						$i++;
					}
					if (strpos($css_src, '<?php') !== false || nitroIsIgnoredUrl($css_src, $cssExclude) || $weAreInComment) {//skip this css if its location is dynamically generated
						$current_pos = $next_css+1;
						continue;
					}
					
					$extractedCSSFiles[] = $css_src;
					//cut the css link
					$i = $tag_start;
					$tag_end = $tag_start;
					$isTagEndFound = false;
					while($i < $html_end && !$isTagEndFound) {
						if ($content[$i] == '>' && $content[$i-1] != '?') {//if we are not in php closing tag
							$isTagEndFound = true;
						}
						$tag_end = $i;
						$i++;
					}
					$content = substr($content, 0, $tag_start) . substr($content, $tag_end+1);
					$html_end = strlen($content)-1;
				} else {
					$current_pos = $next_css+1;
					continue;
				}
			} else {
				break;
			}
			$current_pos = $tag_start+1;
		}
		
		//minify and combine the newly extracted css resources
		//and then put them in the header
		$minCSS = minifyCSS(generateCSSMinificatorStyles($extractedCSSFiles));
		$new_css_include = '';
		foreach($minCSS as $css_file) {
			$new_css_include .= '<link rel="'.$css_file['rel'].'" type="text/css" href="'.$css_file['href'].'" media="'.$css_file['media'].'" />';
		}
		if (!empty($new_css_include)) {
			$base_start = strpos($content, '<base');
			$i = $base_start;
			$base_end = 0;
			while($i < $html_end && !$base_end) {
				if ($content[$i] == '>' && $content[$i-1] != '?') {
					$base_end = $i;
					break;
				}
				$i++;
			}
			
			$content = substr($content, 0, $base_end+1) . $new_css_include . substr($content, $base_end+1);
		}
    }
    
    if (!empty($settings['Nitro']['Enabled']) && $settings['Nitro']['Enabled'] == 'yes' && !empty($settings['Nitro']['Mini']['Enabled']) && $settings['Nitro']['Mini']['Enabled'] == 'yes' && !empty($settings['Nitro']['Mini']['JS']) && $settings['Nitro']['Mini']['JS'] == 'yes' && !empty($settings['Nitro']['Mini']['JSExtract']) && $settings['Nitro']['Mini']['JSExtract'] == 'yes') {
        $jsExtractCheckPassed = true;
        
        if (!empty($settings['Nitro']['Mini']['JSExclude'])) {
            $jsExclude = explode("\n", $settings['Nitro']['Mini']['JSExclude']);
            foreach ($jsExclude as $k=>$script) {
                $jsExclude[$k] = trim($script, "\n\r ");
            }
        }
        
		$extractedJSFiles = array();
		
		$current_pos = 0;
		$html_end = strlen($content)-1;
		while ($html_end !== false && $current_pos < $html_end) {
			
			$next_js = strpos($content, '<script', ($current_pos));
			$tag_start = $next_js;
			if ($next_js !== false) {
				//go left to check if we are in a script tag
				$i = $next_js;
				$tag_start = $i;
				$tag = 'script';
				while ($i < $next_js && $content[$i] != ' ') {
					$tag .= $content[$i];
					$i++;
				}
				
				if (strtolower($tag) == 'script') {
					//see if we are not in a comment block
					$c = $i;
					$commentStartFound = false;
					$commentEndFound = false;
					while ($c > 0 && !$commentStartFound) {
						if ($content[$c] == '>') {
							if (substr($content, $c-2, 3) == '-->') {
								$commentEndFound = true;
								break;
							}
						}
						if ($content[$c] == '<') {
							if (substr($content, $c, 4) == '<!--') {
								$commentStartFound = true;
							}
						}
						$c--;
					}
					
					$weAreInComment = ($commentStartFound && !$commentEndFound);
					//find the src
					$src_start = $i;
					$isSrcStartFound = false;
					while($i < $html_end && !$isSrcStartFound) {
						if ($content[$i] == 's' && (substr($content, $i, 4) == 'src=')) {
							$isSrcStartFound = true;
							$src_start = $i;
							break;
						} else if ($content[$i] == '>' && $content[$i-1] != '?') {//we have reached the closing char of the script tag
							break;
						}
						$i++;
					}
					
					$i = $src_start+5;
					$js_src = '';
					if ($isSrcStartFound) {
						while ($i < $html_end && $content[$i] != '\'' && $content[$i] != '"') {
							$js_src .= $content[$i];
							$i++;
						}
					}
					
					if (!$isSrcStartFound && !$weAreInComment) {//inline javascript
						$type_start = false;
						$end_of_tag = false;
						$i = $tag_start;
						while ($i < $html_end && !$type_start && !$end_of_tag) {
							if ($content[$i] == 't') {
								if (substr($content, $i, 5) == 'type=') {
									$type_start = $i+6;
									break;
								}
							} else if ($content[$i] == '>' && $content[$i-1] != '?') {
								$end_of_tag = $i;
								break;
							}
							$i++;
						}
						if ($type_start) {
							$i = $type_start;
							$script_type = '';
							while ($i < $html_end && $content[$i] != '\'' && $content[$i] != '"') {
								$script_type .= $content[$i];
								$i++;
							}
							if ($script_type == 'text/javascript') {
								while ($i < $html_end && !$end_of_tag) {
									if ($content[$i] == '>' && $content[$i-1] != '?') {
										$end_of_tag = $i;
										break;
									}
									$i++;
								}
							}
						}
						
						if ($end_of_tag) {
							$script_end = strpos($content, '</script', $end_of_tag);
							$code = substr($content, $end_of_tag+1, $script_end - ($end_of_tag+1));
							$new_js_file = createTempScript($code);
							$tag_end = $tag_start;
							
							$i = $tag_start;
							$isTagEndFound = false;
							$passedThroughClosingScriptTag = false;
							while($i < $html_end && !$isTagEndFound) {
								if ($content[$i] == '>' && $content[$i-1] != '?') {//if we are not in php closing tag
									if ($passedThroughClosingScriptTag) {
										$isTagEndFound = true;
									}
								} else if ($content[$i] == '<') {
									if (substr($content, $i, 8) == '</script') {
										$passedThroughClosingScriptTag = true;
									}
								}
								$tag_end = $i;
								$i++;
							}
							$content = substr($content, 0, $tag_start) . substr($content, $tag_end+1);
							
							$extractedJSFiles[] = $new_js_file;
							$html_end = strlen($content)-1;
						}
						
					}
					
					if (strpos($js_src, '<?php') !== false || nitroIsIgnoredUrl($js_src, $jsExclude) || $weAreInComment || !$isSrcStartFound) {//skip this css if its location is dynamically generated, is excluded, is in comment or is inline
						$current_pos = $next_js+1;
						continue;
					}
					
					$extractedJSFiles[] = $js_src;
					//cut the js link from html
					$i = $tag_start;
					$tag_end = $tag_start;
					$isTagEndFound = false;
					$passedThroughClosingScriptTag = false;
					while($i < $html_end && !$isTagEndFound) {
						if ($content[$i] == '>' && $content[$i-1] != '?') {//if we are not in php closing tag
							if ($passedThroughClosingScriptTag) {
								$isTagEndFound = true;
							}
						} else if ($content[$i] == '<') {
							if (substr($content, $i, 8) == '</script') {
								$passedThroughClosingScriptTag = true;
							}
						}
						$tag_end = $i;
						$i++;
					}
					$content = substr($content, 0, $tag_start) . substr($content, $tag_end+1);
					$html_end = strlen($content)-1;
				} else {
					$current_pos = $next_js+1;
					continue;
				}
			} else {
				break;
			}
			$current_pos = $tag_start;
		}
		//minify and combine the extracted js
		//and put it at the end
		$minJS = minifyJS(generateJSMinificatorScripts($extractedJSFiles));
		$new_js_include = '';
		foreach($minJS as $js_file) {
			$new_js_include .= '<script type="text/javascript" src="'.$js_file.'" defer></script>';
		}
		if (!empty($new_js_include)) {
			$body_end = strpos($content, '</body');
			if ($body_end === false) {
				$body_end = strpos($content, '</html');
			}
			
			if ($body_end !== false) {
				$content = substr($content, 0, $body_end) . $new_js_include . substr($content, $body_end);
			} else {
				$content .= $new_js_include;
			}
		}
    }
	
	return $content;
}

function createTempScript($code) {
	if (!file_exists(NITRO_FOLDER.'temp') || !is_dir(NITRO_FOLDER.'temp')) {
		mkdir(NITRO_FOLDER.'temp');
	}
	
	if (!file_exists(NITRO_FOLDER.'temp'.DS.'js') || !is_dir(NITRO_FOLDER.'temp'.DS.'js')) {
		mkdir(NITRO_FOLDER.'temp'.DS.'js');
	}
	
	$scriptname = md5($code) . '.js';
	$script_path = NITRO_FOLDER.'temp'.DS.'js'.DS.$scriptname;
	$code = str_replace(array('<!--', '-->'), '', $code);
	file_put_contents($script_path, $code);
	return str_replace(dirname(DIR_APPLICATION).DS, '', $script_path);
}

function nitroIsIgnoredUrl($url, $ignored_urls) {
	if (!empty($ignored_urls)) {
		foreach($ignored_urls as $ignoredUrl) {
			if (strpos($url, $ignoredUrl) !== false) {
				return true;
			}
		}
	}
	
	return false;
}

function generateCSSMinificatorStyles($styles) {
	$formatted_styles = array();
	foreach ($styles as $style) {
		$formatted_styles[md5($style)] = array(
				'href'  => $style,
				'rel'   => 'stylesheet',
				'media' => 'screen'
			);
	}
	return $formatted_styles;
}

function generateJSMinificatorScripts($scripts) {
	$formatted_scripts = array();
	foreach ($scripts as $script) {
		$formatted_scripts[md5($script)] = $script;
	}
	return $formatted_scripts;
}

function minifyCSS($styles) {
	global $registry;
	$combinedStyles = array();
	$result = array();
	$oc_root = dirname(DIR_APPLICATION);
	$cache = NULL;
	$cachefile = NULL;
	$recache = false;
	$filename = NULL;
	$megaHashes = array();
	
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}
	
	//load NitroCache
	require_once $oc_root.DS.'system'.DS.'nitro'.DS.'config.php';
	require_once $oc_root.DS.'system'.DS.'nitro'.DS.'core'.DS.'core.php';
	
	$nitroSettings = getNitroPersistence();

	if (empty($nitroSettings['Nitro']['Enabled']) || $nitroSettings['Nitro']['Enabled'] != 'yes' || empty($nitroSettings['Nitro']['Mini']['Enabled']) || empty($nitroSettings['Nitro']['Mini']['CSS']) || $nitroSettings['Nitro']['Mini']['Enabled'] != 'yes' || $nitroSettings['Nitro']['Mini']['CSS'] != 'yes' || (function_exists('areWeInIgnoredUrl') && areWeInIgnoredUrl())) {
		return $styles;
	}
	
	if (!file_exists($oc_root.DS.'assets')) {
		mkdir($oc_root.DS.'assets');
	}
	
	if (!file_exists($oc_root.DS.'assets'.DS.'style')) {
		mkdir($oc_root.DS.'assets'.DS.'style');
	}
	
	$cssExclude = array();
	$excludedCSS = array();
	$includedCSS = 0;
	
	if (!empty($nitroSettings['Nitro']['Mini']['CSSExclude'])) {
		$cssExclude = explode("\n", $nitroSettings['Nitro']['Mini']['CSSExclude']);
		foreach ($cssExclude as $k=>$stylename) {
			$cssExclude[$k] = trim($stylename, "\n\r ");
		}
	}
	
	//extract local fylesystem path
	foreach($styles as $hash=>$style) {
		$url_info = parse_url($style['href']);
		if (!empty($url_info['path'])) {
			$f = trim($url_info['path'], '/');
			if (file_exists($oc_root.DS.$f)) {
				$styles[$hash]['href'] = $f;
			} else {
				if (empty($nitroSettings['Nitro']['Mini']['CSSExclude'])) {
					$nitroSettings['Nitro']['Mini']['CSSExclude'] = '';
				}
				
				$cssExclude[] = basename($style['href']);
			}
		} else {
			if (empty($nitroSettings['Nitro']['Mini']['CSSExclude'])) {
				$nitroSettings['Nitro']['Mini']['CSSExclude'] = '';
			}
			
			$cssExclude[] = basename($style['href']);
		}
	}
	
	
	if (!empty($nitroSettings['Nitro']['Mini']['CSSCombine']) && $nitroSettings['Nitro']['Mini']['CSSCombine'] == 'yes') {
		
		$cachefile = $oc_root.DS.'assets'.DS.'style'.DS.getSSLCachePrefix().'styles-combined.cache';
		
		if (!file_exists($cachefile)) {
			touch($cachefile);
			file_put_contents($cachefile, json_encode(array()));
		}
		
		$cache = json_decode(file_get_contents($cachefile), true);
		
		//build combination hash
		foreach ($styles as $hash=>$style) {
			if (!in_array(basename($style['href']), $cssExclude)) {
				if (empty($megaHashes[$style['rel'].$style['media']])) {
					$megaHashes[$style['rel'].$style['media']] = '';
				}
				
				$megaHashes[$style['rel'].$style['media']] .= $hash;
				$includedCSS++;
			} else {
				$excludedCSS[$hash] = $style;
			}
		}
		
		foreach ($megaHashes as $k=>$megaHash) {
			$megaHashes[$k] = md5($megaHash);
		}
		
		// Check the cache if we should recache
		foreach ($styles as $hash=>$style) {
			if (empty($style)) continue;
		
			if (!in_array(basename($style['href']), $cssExclude)) {
				$filename = $oc_root.DS.trim(str_replace('/', DS, $style['href']), DS); //convert relative url to absolute filesystem specific path (all of this, because of Windows)
				
				$comboKey = $megaHashes[$style['rel'].$style['media']];
				
				if (empty($cache[$comboKey]) || !is_array($cache[$comboKey])) {
					$cache[$comboKey] = array();
				}
				
				if (array_key_exists($filename, $cache[$comboKey])) {
					if ($cache[$comboKey][$filename] != filemtime($filename)) {
						$recache = true;
						break;
					}
				} else {
					$recache = true;
					break;
				}
			}
		}
		//end of check
		
		if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
			$webshopUrl = $registry->get('config')->get('config_ssl');
		} else {
			$webshopUrl = $registry->get('config')->get('config_url');
		}
		$webshopUrl = rtrim(preg_replace('~^https?\:~i', '', $webshopUrl), '/');
		
		include_once $oc_root.DS.'system'.DS.'nitro'.DS.'lib'.DS.'minifier'.DS.'CSSMin.php';
		
		foreach ($styles as $hash=>$style) {
			if (empty($style)) continue;
			
			if (!in_array(basename($style['href']), $cssExclude)) {
				
				$target = '/assets/style/'.getSSLCachePrefix().'nitro-combined-' . $megaHashes[$style['rel'].$style['media']] . '.css';
				$targetAbsolutePath = $oc_root.DS.trim(str_replace('/', DS, $target), DS);
				
				$filename = $oc_root.DS.trim(str_replace('/', DS, $style['href']), DS);
				$comboHash = $megaHashes[$style['rel'].$style['media']];
				
				if (empty($combinedStyles[$style['rel'].$style['media']])) {
					$combinedStyles[$style['rel'].$style['media']] = array('rel' => $style['rel'], 'media' => $style['media'], 'content' => '', 'megaHash' => $comboHash);
				}
					
				if ($recache || !file_exists($targetAbsolutePath)) {
					
					if (empty($counters[$style['rel'].$style['media']])) {
						$counters[$style['rel'].$style['media']] = 0;
					}
					
					$urlToCurrentDir = $webshopUrl.dirname('/'.trim($style['href'], '/'));
					
					/* replace relative urls with absolute ones */
					$tmpContent = preg_replace('/(url\()(?![\'\"]?(?:(?:https?\:\/\/)|(?:data\:)|(?:\/)))([\'\"]?)\/?(?!\/)/', '$1$2'.$urlToCurrentDir.'/', file_get_contents($filename));
					
					//minify
					$tmpContent = Minify_CSS_Compressor::process($tmpContent);
					
					
					$combinedStyles[$style['rel'].$style['media']]['content'] .= $tmpContent;
					unset($tmpContent);
					
					$cache[$comboHash][$filename] = filemtime($filename);
				}
			}
		}
		
		file_put_contents($cachefile, json_encode($cache));
		
		foreach ($combinedStyles as $key=>$value) {
			$target = '/assets/style/'.getSSLCachePrefix().'nitro-combined-' . $megaHashes[$key] . '.css';
			$targetAbsolutePath = $oc_root.DS.trim(str_replace('/', DS, $target), DS);
			
			if ($recache || !file_exists($targetAbsolutePath)) {
				
				/* pull imports to the top */
				$tmpContent = $value['content'];
				$imports = array();
				preg_match_all('/\@import[^\;]*\;/', $tmpContent, $imports);
				if (!empty($imports)) {
					$imports = array_reverse($imports[0]);
					foreach ($imports as $import) {
						$tmpContent = $import.str_replace($import, '', $tmpContent);
					}
				}
				
				file_put_contents($targetAbsolutePath, $tmpContent);
			}
			
			$result[$megaHashes[$key]] = array('rel' => $value['rel'], 'media' => $value['media'], 'href' => trim($target, '/'));
		}
		
		if ($includedCSS > 0) {
			return array_merge($excludedCSS, $result);
		} else {
			return $excludedCSS;
		}
	} else {
		
		$cachefile = $oc_root.DS.'assets'.DS.'style'.DS.getSSLCachePrefix().'styles.cache';
		
		if (!file_exists($cachefile)) {
			touch($cachefile);
			file_put_contents($cachefile, json_encode(array()));
		}
		
		$cache = json_decode(file_get_contents($cachefile), true);
		
		if (isset($_SERVER['HTTPS']) && (($_SERVER['HTTPS'] == 'on') || ($_SERVER['HTTPS'] == '1'))) {
			$webshopUrl = $registry->get('config')->get('config_ssl');
		} else {
			$webshopUrl = $registry->get('config')->get('config_url');
		}
		$webshopUrl = rtrim(preg_replace('~^https?\:~i', '', $webshopUrl), '/');
		
		include_once $oc_root.DS.'system'.DS.'nitro'.DS.'lib'.DS.'minifier'.DS.'CSSMin.php';
		
		foreach ($styles as $hash=>$style) {
			if (empty($style)) continue;
			$recache = false;
		
			if (!in_array(trim(basename($style['href']), "\r\n"), $cssExclude)) {
				$filename = $oc_root.DS.trim(str_replace('/', DS, $style['href']), DS);
				
				$basefilename = basename($style['href'], '.css');
				$target = '/assets/style/'.getSSLCachePrefix().'nitro-mini-' . $basefilename . '.css';
				$targetAbsolutePath = $oc_root.DS.trim(str_replace('/', DS, $target), DS);
				
				if (array_key_exists($filename, $cache)) {
					if ($cache[$filename] != filemtime($filename)) {
						$recache = true;
					}
				} else {
					$recache = true;
				}
				
				if ($recache || !file_exists($targetAbsolutePath)) {
					$urlToCurrentDir = $webshopUrl.dirname('/'.trim($style['href'], '/'));
					
					/* replace relative urls with absolute ones */
					$tmpContent = preg_replace('/(url\()(?![\'\"]?(?:(?:https?\:\/\/)|(?:data\:)|(?:\/)))([\'\"]?)\/?(?!\/)/', '$1$2'.$urlToCurrentDir.'/', file_get_contents($filename));
					
					//minify
					$tmpContent = Minify_CSS_Compressor::process($tmpContent);
					
					file_put_contents($targetAbsolutePath, $tmpContent);
					
					unset($tmpContent);
					
					$cache[$filename] = filemtime($filename);
				}
				
				$styles[$hash]['href'] = trim($target, '/');
			}
		}
		
		file_put_contents($cachefile, json_encode($cache));
	
		return $styles;
	}
}

function minifyJS($scripts) {
	$oc_root = dirname(DIR_APPLICATION);
	$cache = NULL;
	$cachefile = NULL;
	$filename = NULL;
	
	if (!defined('DS')) {
		define('DS', DIRECTORY_SEPARATOR);
	}
	
	//load NitroCache
	require_once $oc_root.DS.'system'.DS.'nitro'.DS.'config.php';
	require_once $oc_root.DS.'system'.DS.'nitro'.DS.'core'.DS.'core.php';
	
	$nitroSettings = getNitroPersistence();
	
	if (empty($nitroSettings['Nitro']['Enabled']) || $nitroSettings['Nitro']['Enabled'] != 'yes' || empty($nitroSettings['Nitro']['Mini']['Enabled']) || empty($nitroSettings['Nitro']['Mini']['JS']) || $nitroSettings['Nitro']['Mini']['Enabled'] != 'yes' || $nitroSettings['Nitro']['Mini']['JS'] != 'yes' || (function_exists('areWeInIgnoredUrl') && areWeInIgnoredUrl())) {
		return $scripts;
	}
	
	if (!file_exists($oc_root.DS.'assets')) {
		mkdir($oc_root.DS.'assets');
	}
	
	if (!file_exists($oc_root.DS.'assets'.DS.'script')) {
		mkdir($oc_root.DS.'assets'.DS.'script');
	}
	
	$jsExclude = array();
	
	if (!empty($nitroSettings['Nitro']['Mini']['JSExclude'])) {
		$jsExclude = explode("\n", $nitroSettings['Nitro']['Mini']['JSExclude']);
		foreach ($jsExclude as $k=>$scriptname) {
			$jsExclude[$k] = trim($scriptname, "\n\r ");
		}
	}
	
	//extract local fylesystem path
	foreach($scripts as $hash=>$script) {
		$url_info = parse_url($script);
		if (!empty($url_info['path'])) {
			$f = trim($url_info['path'], '/');
			if (file_exists($oc_root.DS.$f)) {
				$scripts[$hash] = $f;
			} else {
				if (empty($nitroSettings['Nitro']['Mini']['JSExclude'])) {
					$nitroSettings['Nitro']['Mini']['JSExclude'] = '';
				}
				
				$jsExclude[] = basename($script);
			}
		} else {
			if (empty($nitroSettings['Nitro']['Mini']['JSExclude'])) {
				$nitroSettings['Nitro']['Mini']['JSExclude'] = '';
			}
			
			$jsExclude[] = basename($script);
		}
	}

	if (!empty($nitroSettings['Nitro']['Mini']['JSCombine']) && $nitroSettings['Nitro']['Mini']['JSCombine'] == 'yes') {
		$cachefile = $oc_root.DS.'assets'.DS.'script'.DS.getSSLCachePrefix().'scripts-combined.cache';
		
		if (!file_exists($cachefile)) {
			touch($cachefile);
			file_put_contents($cachefile, json_encode(array()));
		}
		
		$cache = json_decode(file_get_contents($cachefile), true);
		
		$comboHash = '';
		$excludedScripts = array();
		$includedScripts = 0;
		
		foreach ($scripts as $hash=>$script) {
			if (!in_array(trim(basename($script), "\r\n"), $jsExclude)) {
				$comboHash .= $hash;
				$includedScripts++;
			} else {
				$excludedScripts[$hash] = $script;
			}
		}
		
		$comboHash = md5($comboHash);
		$target = '/assets/script/'.getSSLCachePrefix().'nitro-combined-' . $comboHash . '.js';
		$targetAbsolutePath = $oc_root.DS.trim(str_replace('/', DS, $target), DS);
		
		$recache = false;
		
		foreach ($scripts as $hash=>$script) {
			if (!in_array(trim(basename($script), "\r\n"), $jsExclude)) {
				$filename = $oc_root.DS.trim(str_replace('/', DS, $script), DS);
				
				if (!empty($cache[$comboHash][$filename])) {
					if ($cache[$comboHash][$filename] != filemtime($filename)) {
						$recache = true;
						break;
					}
				} else {
					$recache = true;
					break;
				}
			}
		}
		
		$minifiedCombined = '';
		
		if ($recache || !file_exists($targetAbsolutePath)) {
			include_once $oc_root.DS.'system'.DS.'nitro'.DS.'lib'.DS.'minifier'.DS.'JSMin.php';

			$counter = 0;
			
			foreach ($scripts as $hash=>$script) {
				if (!in_array(trim(basename($script), "\r\n"), $jsExclude)) {
					$filename = $oc_root.DS.trim(str_replace('/', DS, $script), DS);
					
					$scriptSrc = file_get_contents($filename);
					
					//minify
					$scriptSrc = JSMin::minify($scriptSrc);
					
					if (substr($scriptSrc, -1) == ')') {
						$scriptSrc .= ';';
					}
					
					$minifiedCombined .= (($counter > 0) ? PHP_EOL : '') . $scriptSrc;
					
					unset($scriptSrc);
					
					$cache[$comboHash][$filename] = filemtime($filename);
					$counter++;
				}
			}
			
			file_put_contents($targetAbsolutePath, $minifiedCombined);
		}
		
		file_put_contents($cachefile, json_encode($cache));
		
		if ($includedScripts > 0) {
			return array_merge($excludedScripts, array(md5($target) => trim($target, '/')));
		} else {
			return $excludedScripts;
		}
	} else {
		$cachefile = $oc_root.DS.'assets'.DS.'script'.DS.getSSLCachePrefix().'scripts.cache';
		
		if (!file_exists($cachefile)) {
			touch($cachefile);
			file_put_contents($cachefile, json_encode(array()));
		}
		
		$cache = json_decode(file_get_contents($cachefile), true);
		
		include_once $oc_root.DS.'system'.DS.'nitro'.DS.'lib'.DS.'minifier'.DS.'JSMin.php';
		
		foreach ($scripts as $hash=>$script) {
			$recache = false;
			
			if (!in_array(trim(basename($script), "\r\n"), $jsExclude)) {
				$filename = $oc_root.DS.trim(str_replace('/', DS, $script), DS);
				$basefilename = basename($script, '.js');
				$target = '/assets/script/'.getSSLCachePrefix().'nitro-mini-' . $basefilename . '.js';
				$targetAbsolutePath = $oc_root.DS.trim(str_replace('/', DS, $target), DS);
				
				if (!empty($cache[$filename])) {
					if ($cache[$filename] != filemtime($filename)) {
						$recache = true;
					}
				} else {
					$recache = true;
				}
				
				if ($recache || !file_exists($targetAbsolutePath)) {
					touch($targetAbsolutePath);
					$scriptSrc = file_get_contents($filename);
					
					//minify
					$scriptSrc = JSMin::minify($scriptSrc);
					
					file_put_contents($targetAbsolutePath, $scriptSrc);
					
					$cache[$filename] = filemtime($filename);
				}
				
				$scripts[$hash] = trim($target, '/');
			}
		}
		
		file_put_contents($cachefile, json_encode($cache));
		
		return $scripts;
	}
}