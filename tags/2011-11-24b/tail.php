<?
/**
 * ���� ���� include ��ũ��Ʈ
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     byfun (http://byfun.com)
 */
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
if($wiki['tail_file'] && !$no_layout) include_once $wiki['path'] . "/" . $wiki['tail_file'];
else include_once $g4['path']."/tail.sub.php";
?>