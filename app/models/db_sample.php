<?php
// データベースに接続
$dbs = "mysql:host=127.0.0.1;dbname=support;charset=utf8";
$db_user = "root";
$db_pass = "";
$pdo = new PDO($dbs, $db_user, $db_pass);

// 変数の宣言
$x =  $_POST["x"];
$y =  $_POST["y"];
$z =  $_POST["z"];

// データベースにデータを挿入
$sql  = "INSERT INTO support (x, y) VALUES (:x, :y);";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(":x", $x, PDO::PARAM_STR);
$stmt -> bindValue(":y", $y, PDO::PARAM_STR);
$stmt -> execute();

// データベースのデータを削除
$sql = "DELETE FROM support WHERE id = :z;";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(":z", $z, PDO::PARAM_INT);
$stmt -> execute();

// データベースからデータを取得
$sql = "SELECT * FROM support ORDER BY x :order;";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(":x", $x, PDO::PARAM_STR);
$stmt -> execute();
?>
