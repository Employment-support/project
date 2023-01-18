<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";


$portfolio = new Portfolio(); // ポートフォリオ
$user = new User(); // ポートフォリオ

// vies側で学生/担任で表示される内容の変更
// $type = is_editor();
// echo $type;

// if (!isset($_COOKIE)) {
//     echo 'ある';
// } else {
//     echo 'ない';
// }

// ほかのユーザーが見れるようにGET処理で見れるようにする
$sql = '';
// 新規登録の表示
$see = FALSE;

// if (isset($_COOKIE['user_type_id']) && is_student($_COOKIE['user_type_id']) || is_admin($_COOKIE['user_type_id'])) {
 if (isset($_GET['u'])) {
    // 学生以外が見るときにURLパラメータを使って表示だけさせる
    $sql = 'SELECT 
                por.title,
                por.contents,
                por.item_url,
                por.img_path,
                por.top,
                por.user_id
            FROM portfolio AS por
            INNER JOIN users
                ON por.user_id = users.id
            WHERE users.student_number = ' . $_GET['u'];
    
    $see = FALSE;
    // echo '一般'; // test
} elseif (is_login()) {
    $sql = $portfolio::sqlSelectAll . ' WHERE user_id = ' . $_COOKIE['user_id'];
    $see = TRUE;
    // echo '学生'; // test
} else {
    $sql = $portfolio::sqlSelectAll . ' WHERE user_id = ' . 0;
    $see = FALSE;
    // echo 'ない'; // test
}
// echo $sql1;

if ($sql){
    // echo 'ポートフォリオdeta';
    $portfolio_lists = $portfolio->selectAll($sql);

    $sql2 = 'SELECT DISTINCT
              users.name,
              users.name_hiragana,
              users.student_number
            FROM portfolio AS por
            INNER JOIN users
                ON por.user_id = users.id';
            
    $user_list = $user->selectAll($sql2);
    
    // topがあるインデクス
	$nameArray = array_column($portfolio_lists, 'top');
	$result = array_search(1, $nameArray);
	
    // print_r($portfolio_lists[$result]);
    // var_dump($result);
}

// // ポートフォリオがあれば処理
// if (!empty($portfolio_lists)) {
//     // echo 'ある';
    
// 	$nameArray = array_column($portfolio_lists, 'top');
// 	$result = array_search(1, $nameArray);
//     // var_dump($result);
// 	foreach ($portfolio_lists as $data) {
// 	   // var_dump($data);
// 	    echo "<br>";
//     	if($data['top'] == 1) {
    	    
//     	}
// 	}
// } else {
//     echo 'ない';
// }

// トップのものが作成されていなければ表示するもの
$display = FALSE;
// viewsでtmp_pagination.phpを呼び出す
require_once __DIR__ . "/../views/vie_portfolio_inf.php";

?>