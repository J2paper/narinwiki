<?
/**
 * 
 * include skin 스크립트
 *
 * @package	narinwiki
 * @subpackage event
 * @license GPL2 (http://narinwiki.org/license)
 * @author	byfun (http://byfun.com)
 * @filesource
 */
 
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

extract($wikiEvent->trigger("WRITE_UPDATE", 
							array("folder"=>$ns, 
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
