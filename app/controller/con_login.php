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
        setcookie($name, $data, time()+180000, '/');
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
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name = trim($parts[0]);
                setcookie($name, '', time()-1000);
                setcookie($name, '', time()-1000, '/');
            }
        }
        
        // cookie生成
        setcookie('user_id', $data["id"], time()+180000, '/'); // 
        setcookie('user_name', $data["name"], time()+180000, '/'); // 
        setcookie('user_name_hiragana', $data["name_hiragana"], time()+180000, '/'); // 
        setcookie('user_number', $data["student_number"], time()+180000, '/'); // 
        setcookie('user_admin', $data["admin"], time()+180000, '/'); // 
        setcookie('user_gender', $data["gender"], time()+180000, '/'); // 
        setcookie('user_type_id', $data["type_id"], time()+180000, '/'); // 
        setcookie('user_type', $data["type"], time()+180000, '/'); // 
        setcookie('user_department_id', $data["department_id"], time()+180000, '/'); // 
        setcookie('user_department', $data["department"], time()+180000, '/'); // 
        setcookie('user_major_id', $data["major_id"], time()+180000, '/'); // 
        setcookie('user_major', $data["major"], time()+180000, '/'); // 
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
