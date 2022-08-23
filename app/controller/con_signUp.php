<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
session_start();

// ログイン
function signUp($password, $student_number)
{
    $sql = "SELECT * FROM users WHERE student_number = ?";
    $obj = new DB();

    $stmt = $obj->pdo->prepare($sql);
    $stmt -> bindValue(":student_number", $student_number);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if (password_verify($password, $data["password"]) && $student_number == $data["student_number"]) {
        $_SESSION["user_id"] = $data["id"];
        $_SESSION["user_name"] = $data["name"];
        $_SESSION["user_number"] = $data["student_number"];
        // header('Location:my_page.php');
    } else {
        array_push($obj->error_message, 'ユーザー名またはパスワードが違います');
        return $obj->error_message;
    }
    
}

// post送信か確認
if($_SERVER["REQUEST_METHOD"] !== "POST"){
        echo "postじゃない";
    } else if(count($_POST) == 0) {
        echo "postだけど値がない";
    } else {
      	signUp($_POST[''], $_POST['']);
       
    }

// require_once "../views/.php";



