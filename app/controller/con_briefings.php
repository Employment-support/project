<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
session_start();

$user = new User();
$user = $user->select(1, $user::sqlSelect2);
// $user->select($_SESSION["user_id"], $user::sqlSelect2);
print_r($user);

$briefings = new Briefings();
$corporations = new Corporations();
$date = date('Y-m-d');

// require_once "../views/.php";
