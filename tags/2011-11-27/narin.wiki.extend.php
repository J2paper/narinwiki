<?
/**
 * �״������ Ȯ�� ��ũ��Ʈ
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     byfun (http://byfun.com)
 */
 
/* ���� ���� ��ũ��Ʈ ���� �� */
$scriptFile = basename($_SERVER["SCRIPT_NAME"]);

/* ��Ű ������� �Խ����� ��� */
if($board[bo_1_subj] == "narinwiki" && $board[bo_1] != "") {
	
	if($url) {
		header("location:$url");
	}
	
	$wiki_path = $g4[path] . "/" . $board[bo_1];
	$wiki_config = $wiki_path."/narin.config.php";

	// ��Ű ���� & ���̺귯�� �ε�
	if(file_exists($wiki_config)) {
		
		define("__NARINWIKI__", TRUE);
		
		include_once $wiki_config;	
		include_once $wiki_path . "/lib/narin.wiki.lib.php";	
		include_once $wiki_path ."/lib/narin.Class.class.php";
		
		$wikiControl = wiki_class_load("Control");
		
		// ��Ų ��� ����
		$board_skin_path = $wiki[inc_skin_path];
		
		// �Խ��� ��Ų & ���-���� ����
		$board[bo_include_head] = $wiki[path] . "/head.php";
		$board[bo_include_tail] = $wiki[path] . "/tail.php";				
		
		// ��Ű�� ��ü �˻��� ���� �ȵǵ��� ��
		// ��Ű ��ü ����, �Ľ� ���� ��...
		$board[bo_use_search] = 0;
				
		$wikiControl->board($scriptFile);		
						
	} // if wiki_config
}	

?>
