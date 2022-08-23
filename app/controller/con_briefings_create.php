<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
session_start();

$user = new User();
$user = $user->select(1, $user::sqlSelect2);
// $user->select($_SESSION["user_id"], $user::sqlSelect2);
print_r($user);

// 学生ではない時は入れないただし、管理者権限があれば入れる
if ($user['type'] !== '学生' || $user['admin'] == 1){
    echo '入っている'; // テスト用
    $briefings = new Briefings();
    $corporations = new Corporations();
    $date = date('Y-m-d');

    // require_once "../views/.php";
} else {
    // 企業説明会一覧に戻る
    echo '入れない'; // テスト用
}