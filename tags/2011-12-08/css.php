<?
/**
 * 
 * CSS 병합 & minify 스크립트
 *
 * @package	narinwiki
 * @subpackage pages
 * @license http://narin.byfun.com/license GPL2
 * @author	byfun (http://byfun.com)
 * @filesource
 */
 
include_once "_common.php";

include_once $wiki['path']."/lib/Minifier/cssmin.php";

$print_version = ( $print == 1 ? true : false );

$offset = 60 * 60 * 24 * 7; // Cache for 1 weeks
$modified = 0;
$cur_path = "";
$is_ie6 = false;
if (preg_match('/\bmsie 6/i', $_SERVER["HTTP_USER_AGENT"]) && !preg_match('/\bopera/i', $_SERVER["HTTP_USER_AGENT"]))
{
	$is_ie6 = true;
}

// css 파일 내용 버퍼
$script = "";

// css 폴더 로딩
$script .= get_files_contents($wiki['path']."/css", "css");
$script .= get_files_contents($wiki[skin_path], "css");
if(file_exists($wiki['path']."/data/$bo_table/css")) $script .= get_files_contents($wiki['path']."/data/$bo_table/css", "css");	// for plugin

$css_modified = wiki_get_option("css_modified");
if($css_modified) {
	$modified = max($css_modified['timestamp'], $modified);
	wiki_set_option("css_modified", null, null);
}

header ('Expires: ' . gmdate ("D, d M Y H:i:s", time() + $offset) . ' GMT');

if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) >= $modified) {
	header("HTTP/1.0 304 Not Modified");
	header ('Cache-Control:');
} else {
	header ('Cache-Control: max-age=' . $offset);
	header ('Content-type: text/css; charset='.$g4[charset]);
	header ('Pragma:');
	header ("Last-Modified: ".gmdate("D, d M Y H:i:s", $modified )." GMT");
	echo CssMin::minify($script);    
}

/**
 * 
 * CSS 내용중 경로(background:url(....))를 wiki_path 상대 경로로 변경
 * 
 * @param array $matches 패턴 매칭 결과
 * @return string 경로가 변경된 url
 */
function replace_css_path($matches) {
	global $wiki, $cur_path;
	if(preg_match("/^(http[s]?:\/\/|ftp:\/\/|\/)/i", $matches[1])) return $matches[0]; 
	return "url(".$cur_path."/".$matches[1].")";
}

/**
 * 
 * CSS 파일 읽어오기
 * 
 * @param string $path 폴더 경로
 * @param string $extension 확장자
 * @return string 병합된 파일 내용
 */
function get_files_contents($path, $extension) {
	global $modified, $is_ie6, $cur_path, $print_version;
		
	$cur_path = $path;
	$str = "";
	$files = scandir($path);
	$extlen = -1 * (strlen($extension)+1);
	foreach($files as $k=>$file) {

		if(is_dir($path."/".$file)) continue;		
		if(substr($file, $extlen) != '.'.$extension) continue;
		if(!$is_ie6 && strpos($file, "ie6") > 0) continue;
		if($print_version && strpos($file, "print") <= 0) continue;
		if(!$print_version && strpos($file, "print") > 0) continue;

    $age = filemtime($path."/".$file);
    if($age > $modified) {
        $modified = $age;
    }		
		$str .= file_get_contents($path."/".$file);
	}
	$str = preg_replace_callback("/url\s?\([\'|\"]?(.*?)[\'|\"]?\)/is", "replace_css_path", $str);
	return $str;
}

?>