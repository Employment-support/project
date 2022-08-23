<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
session_start();

$user = new User();
$briefings = new Briefings();
$shares = new Shares();

// require_once "../views/.php";