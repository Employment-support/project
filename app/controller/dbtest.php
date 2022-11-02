<?php
define('HOSTNAME', 'localhost');
define('DATABASE', 'mydatabase');
define('USERNAME', 'root');
define('PASSWORD', '');

$dns = "mysql:host=employment-support.cluster-cn3srovxz5ja.ap-northeast-1.rds.amazonaws.com; port=3306; dbname=support; charset=utf8";
$USER = "admin";
$PASS = "T5p3zcjw";
try {
  /// DB接続を試みる
  $db  = new PDO($dns, $USER, $PASS);
  $msg = "MySQL への接続確認が取れました。";
} catch (PDOException $e) {
  $isConnect = false;
  $msg       = "MySQL への接続に失敗しました。<br>(" . $e->getMessage() . ")";
}

echo $msg;