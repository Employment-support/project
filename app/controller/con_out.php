<?php

function reset_cookie($name){
    if (isset($_COOKIE[$name])) {
        setcookie($name, '', time()-10); //     
        echo $name. 'cookie削除';
    }
}

$cookie_names = [
    'user_id',
    'user_name',
    'user_name_hiragana',
    'user_number',
    'user_admin',
    'user_gender',
    'user_type_id',
    'user_type',
    'user_department_id',
    'user_department',
    'user_major_id',
    'user_major'];

foreach($cookie_names as $name) {
    reset_cookie($name);
}

// header('Location:index');