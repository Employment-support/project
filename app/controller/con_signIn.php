<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";

// print_r($_POST);

// post送信か確認
if($_SERVER["REQUEST_METHOD"] !== "POST"){
        echo "postじゃない";
    } else if(count($_POST) == 0) {
        echo "postだけど値がない";
    } else {
        $user = new User();
        $name = $_POST["last_name"]. " ". $_POST["first_name"];
        $name_hiragan = $_POST["last_name_hiragana"]. " ". $_POST["first_name_hiragana"];
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

require_once "../views/admin/signIn.php";
?>