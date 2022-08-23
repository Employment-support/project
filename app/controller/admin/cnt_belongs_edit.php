<?php
include_once "..\..\models\model.php";
include_once "..\..\models\masters.php";

// print_r($_GET);
$title = '';
$x = new Belongs();
$datas = $x->select($_GET['edit'], $x::sqlSelect);
// print_r($datas);

// 一番以外をとる
$datas = array_slice($datas, 1);
?>

<?php include "../../template/admin/edit.php" ?>