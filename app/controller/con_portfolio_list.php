<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";


$portfolio = new Portfolio(); // ポートフォリオ

// vies側で学生/担任で表示される内容の変更
$type = is_editor();
// echo $type;

if (!isset($_COOKIE)) {
    echo 'ある';
} else {
    echo 'ない';
}

// ほかのユーザーが見れるようにGET処理で見れるようにする
$sql = '';
// 新規登録の表示
$see = FALSE;
// cookieが存在するか確認しそれが学生なら処理がされる
if ($_COOKIE){
    if (isset($_COOKIE['user_type']) && is_student($_COOKIE['user_type']) || is_admin($_COOKIE['user_type'])) {
        $sql = $portfolio::sqlSelectAll . ' WHERE user_id = ' . $_COOKIE['user_id'];
        $see = TRUE;
        echo '学生'; // test
    }
} else if (isset($_GET['u'])) {
    // 学生以外が見るときにURLパラメータを使って表示だけさせる
    $sql = $portfolio::sqlSelectAll . ' WHERE user_id = ' . $_GET['u'];
    $see = FALSE;
    echo '一般'; // test
} else {
    $sql = $portfolio::sqlSelectAll . ' WHERE user_id = ' . 0;
    $see = FALSE;
    echo 'ない'; // test
}

if ($sql){
    $portfolio_lists = $portfolio->selectAll($sql);
    print_r($portfolio_lists);
}

// // ポートフォリオがあれば処理
// if (!empty($portfolio_lists)) {
//     echo 'ある';
// }

// viewsでtmp_pagination.phpを呼び出す
require_once __DIR__ . "/../views/vie_portfolio_inf.php";

?>