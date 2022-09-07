<?php

setcookie('user_id', '', time()-10); // 
setcookie('user_name', '', time()-10); // 
setcookie('user_name_hiragana', '', time()-10); // 
setcookie('user_number', '', time()-10); // 
setcookie('user_admin', '', time()-10); // 
setcookie('user_gender', '', time()-10); // 
setcookie('user_type_id', '', time()-10); // 
setcookie('user_type', '', time()-10); // 
setcookie('user_department_id', '', time()-10); // 
setcookie('user_department', '', time()-10); // 
setcookie('user_major_id', '', time()-10); // 
setcookie('user_major', '', time()-10); // 

echo 'cookie削除';

// header('Location:index');