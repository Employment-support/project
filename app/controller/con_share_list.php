<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";


$shares = new Shares(); // 共有情報
$majors = new Majors(); // 専攻
$files = new DB();


// vies側で学生/担任で表示される内容の変更
$type = is_editor();
// echo $type;


$major_lists = $majors->selectAll($majors::sqlSelectAll);

$file_lists = $files->selectAll('SELECT * FROM files');

// ページネーション
$sql = $shares::sqlSelectAll . ' ORDER by update_at desc';
$shares_lists = $shares->selectAll($sql);


if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $get_page = $_GET['page'];
} else {
    $get_page = 1;
}

list($page, $range, $max_page, $disp_data_share) = pagination($shares_lists, 5, $get_page);

// 現在のURL取得
$now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = parse_url($now_url , PHP_URL_PATH);
// ここまでページネーション処理

// データがあるか判断
if (!empty($disp_data_share)) {
    $is_data = true;
} else {
    $is_data = false;
}

// viewsでtmp_pagination.phpを呼び出す
require_once __DIR__ . "/../views/vie_share_list.php";

?>