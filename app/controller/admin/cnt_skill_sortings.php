<?php
// 一覧ページ
include_once "..\..\models\model.php";
include_once "..\..\models\masters.php";
include_once "checks.php";

$x = new SkillSortings();
$title = '';
$datas = $x->selectAll($x::sqlSelectAll);

$keys = datas_check($datas);

$url_edit = 'cnt_skill_sortings_edit.php';
$url_delete = '';
$url_create = 'cnt_skill_sortings_create.php';
$url_portal = 'cnt_portal.php';

require_once "../../views/admin/belongs.php";


?>
