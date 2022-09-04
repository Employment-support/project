<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
session_start();

// ログイン
function signUp($student_number, $password)
{
    $sql = "SELECT * FROM users 
                INNER JOIN belongs ON users.type_id = belongs.id 
                INNER JOIN departments ON users.department_id = departments.id 
                INNER JOIN majors ON users.major_id = majors.id 
                WHERE student_number = ?";

    $obj = new DB();

    $data = $obj->select($student_number, $sql);


    if (password_verify($password, $data["password"]) && $student_number == $data["student_number"]) {
        // $_SESSION["user_id"] = $data["id"];
        // $_SESSION["user_name"] = $data["name"];
        // $_SESSION["user_number"] = $data["student_number"];
        setcookie('user_id', $data["id"]);
        setcookie('user_name', $data["name"]);
        setcookie('user_name_hiragana', $data["name_hiragana"]);
        setcookie('user_number', $data["student_number"]);
        setcookie('user_gender', $data["gender"]);
        setcookie('user_type_id', $data["type_id"]);
        setcookie('user_type', $data["type"]);
        setcookie('user_department_id', $data["department_id"]);
        setcookie('user_department', $data["department"]);
        setcookie('user_major_id', $data["major_id"]);
        setcookie('user_major', $data["major"]);
        echo "成功"; // テスト用
        print_r($_COOKIE);
        // header('Location:my_page.php');
    } else {
        array_push($obj->error_message, 'ユーザー名またはパスワードが違います');
        return $obj->error_message;
    }
    
}

// post送信か確認
if($_SERVER["REQUEST_METHOD"] == "POST"){
      	signUp($_POST['num'], $_POST['pass']);
    }

require_once __DIR__ . "/../views/login.html";
