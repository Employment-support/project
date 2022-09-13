<?php
include_once __DIR__ . "\..\models\model.php";
include_once __DIR__ . "\..\models\masters.php";
include_once __DIR__ . "\..\models\user.php";

print_r($_COOKIE); // テスト用
echo $_COOKIE['user_id']; // テスト用
echo $_COOKIE['user_name']; // テスト用
echo $_COOKIE['user_name_hiragana']; // テスト用
echo $_COOKIE['user_number']; // テスト用
echo $_COOKIE['user_admin']; // テスト用
echo $_COOKIE['user_gender']; // テスト用
echo $_COOKIE['user_type_id']; // テスト用
echo $_COOKIE['user_type']; // テスト用
echo $_COOKIE['user_department_id']; // テスト用
echo $_COOKIE['user_department']; // テスト用
echo $_COOKIE['user_major_id']; // テスト用
echo $_COOKIE['user_major']; // テスト用

$user = new User();
$briefings = new Briefings();
$shares = new Shares();

// require_once "../views/.php";