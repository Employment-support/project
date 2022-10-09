<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";

function create_cookie($name, $data){
    if (isset($_COOKIE[$name])) {
        // cookieリセット
        setcookie($name, '', time()-10); //     
        echo $name. 'cookie削除';
    } else {
        setcookie($name, $data);
    }
}

// ログイン
function signUp($student_number, $password)
{
    $sql = "SELECT users.id,
    users.name,
    users.password,
    users.name_hiragana,
    users.student_number,
    users.admin,
    users.gender,
    users.type_id,
    be.type,
    users.department_id,
    de.department,
    users.major_id,
    ma.major
    FROM users 
    INNER JOIN belongs as be ON users.type_id = be.id 
    INNER JOIN departments as de ON users.department_id = de.id 
    INNER JOIN majors as ma ON users.major_id = ma.id 
    WHERE users.student_number = ?";

    $obj = new DB();

    $data = $obj->select($student_number, $sql);
    print_r($data); // テスト用

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
        header('Location:/');
    } else {
        array_push($obj->error_message, 'ユーザー名またはパスワードが違います');
        // print_r($obj->error_message);
        return $obj->error_message;
    }
    
}

// post送信か確認
if($_SERVER["REQUEST_METHOD"] == "POST"){
      	$errors = signUp($_POST['num'], $_POST['pass']);
    }

require_once __DIR__ . "/../views/vie_login.php";
