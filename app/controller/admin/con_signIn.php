<?php
include_once __DIR__ . "/../../models/model.php";
include_once __DIR__ . "/../../models/masters.php";
include_once __DIR__ . "/../../models/user.php";

// print_r($_POST);

// post送信か確認
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user = new User();
        $name = $_POST["last_name"]. " ". $_POST["first_name"];
        $name_hiragan = $_POST["last_name_hiragana"]. " ". $_POST["first_name_hiragana"];

        // print_r($_POST);
        // メールアドレスがかぶっているときの処理
        $user->create($_POST["email"], $name, $name_hiragan, $_POST["password"], $_POST["gender"], $_POST["student_number"], $_POST["department"], $_POST["major"], $_POST["type"]);
    }

// 所属
$belongs = new Belongs();
$belong_lists = $belongs->selectAll($belongs::sqlSelectAll);
// print_r($belong_lists);

// // 学科一覧
$departments = new Departments();
$department_lists = $departments->selectAll($departments::sqlSelectAll);
// print_r($department_lists);

// 専攻一覧
$majors = new Majors();
$major_lists = $majors->selectAll($majors::sqlSelectAll);
// print_r($major_lists);

$password_rand = mt_rand();

require_once __DIR__ . "/../../views/admin/singIn.php";
?>