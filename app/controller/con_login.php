<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";

function create_cookie($name, $data){
    if (isset($_COOKIE[$name])) {
        // cookieリセット
        create_cookie($name, '', time()-10); //     
        echo $name. 'cookie削除';
    } else {
        // cookie生成
        setcookie($name, $data);
    }
}

// ログイン
function signUp($student_number, $password)
{
    $sql = "SELECT * FROM users 
                INNER JOIN belongs ON users.type_id = belongs.id 
                INNER JOIN departments ON users.department_id = departments.id 
                INNER JOIN majors ON users.major_id = majors.id 
                WHERE users.student_number = ?";

    $obj = new DB();

    $data = $obj->select($student_number, $sql);
    // print_r($data);
    // echo $student_number. '<br>';
    // echo $data["id"]. '<br>';
    // echo $data["student_number"]. '<br>';
    if (password_verify($password, $data["password"]) && $student_number == $data["student_number"]) {
        // cookieリセット

        // cookie生成
        create_cookie('user_id', $data["id"]); // 
        create_cookie('user_name', $data["name"]); // 
        create_cookie('user_name_hiragana', $data["name_hiragana"]); // 
        create_cookie('user_number', $data["student_number"]); // 
        create_cookie('user_admin', $data["admin"]); // 
        create_cookie('user_gender', $data["gender"]); // 
        create_cookie('user_type_id', $data["type_id"]); // 
        create_cookie('user_type', $data["type"]); // 
        create_cookie('user_department_id', $data["department_id"]); // 
        create_cookie('user_department', $data["department"]); // 
        create_cookie('user_major_id', $data["major_id"]); // 
        create_cookie('user_major', $data["major"]); // 
        echo "成功"; // テスト用
        print_r($_COOKIE);
        header('Location:con_briefing_list.php');
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
