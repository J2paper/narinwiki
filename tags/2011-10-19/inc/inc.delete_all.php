<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

extract($wikiEvent->trigger("DELETE_ALL", array("wr_id"=>$wr_id, "folder"=>$folder, "chk_wr_id"=>$_POST[chk_wr_id])));
?>