﻿<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once $wiki[path] . "/inc/inc.view_comment.php";

$board_skin_path = $wiki[skin_path];
@include_once $wiki[skin_path]."/view_comment.skin.php";
$board_skin_path = $wiki[inc_skin_path];
?>