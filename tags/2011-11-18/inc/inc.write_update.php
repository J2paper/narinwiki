<?
/**
 * include skin ��ũ��Ʈ
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     byfun (http://byfun.com)
 */
 
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

extract($wikiEvent->trigger("WRITE_UPDATE", array("folder"=>$ns, 
																					"docname"=>$docname, 
																					"w"=>$w, 
																					"wr_doc"=>stripcslashes($wr_doc),
																					"wr_id"=>$wr_id, 
																					"wr_content"=>stripcslashes($wr_content),
																					"wr_name"=>stripcslashes($wr_name),
																					"wr_email"=>stripcslashes($wr_email),
																					"wr_history"=>stripcslashes($wr_history),
																					"write"=>&$write)));


?>