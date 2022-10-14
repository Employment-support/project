<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";


$briefings = new Briefings(); // 企業説明会
$corporations = new Corporations(); // 企業ジャンル

// vies側で学生/担任で表示される内容の変更
$type = is_editor();
// echo $type; // test

// 分類コンボックス
$corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

// 企業データ
$sql = $briefings::sqlSelectAll. ' INNER JOIN corporations ON briefings.corporation_id = corporations.id';
$briefing_lists = $briefings->selectAll($sql);

// ページネーション
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $get_page = $_GET['page'];
} else {
    $get_page = 1;
}

list($page, $range, $max_page, $disp_data_briefing) = pagination($briefing_lists, 12, $get_page);

// 現在のURL取得
$now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = parse_url($now_url , PHP_URL_PATH);

// ここまでページネーション処理

// print_r($disp_data_briefing); // テスト用


require_once __DIR__ . "/../views/vie_briefing_list.php";
?>