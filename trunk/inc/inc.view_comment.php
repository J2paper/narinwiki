<?
/**
 * include skin ��ũ��Ʈ
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     byfun (http://byfun.com)
 */
 
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

extract($wikiEvent->trigger("VIEW_COMMENT", array("folder"=>$ns, 
																				"docname"=>$docname, 
																				"doc"=>$doc,
																				"use_comment"=>$use_comment, 
																				"list"=>&$list)));

?>