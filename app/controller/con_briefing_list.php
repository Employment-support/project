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
// $sql = $briefings::sqlSelectAll. ' INNER JOIN corporations ON briefings.corporation_id = corporations.id ORDER by update_at desc';


// ソート案
// javascriptでコンボボックスの選択したときにURLパラメータの変更をしサーバに記憶させ
// ページネーションでページ移動したときも回避できる
// PHP側でパラメータを結合する
// https://gray-code.com/javascript/add-get-parameter-to-url/

$sql = 'SELECT bri.id,
bri.corporate,
bri.contents,
bri.corporate_url,
bri.info,
bri.img_path,
bri.user_id,
bri.created_at,
bri.update_at,
bri.delete_at,
cor.genre
FROM briefings AS bri 
INNER JOIN corporations AS cor
ON bri.corporation_id = cor.id 
ORDER by bri.update_at desc';

$briefing_lists = $briefings->selectAll($sql);
// print_r($briefing_lists);

// ページネーション
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $get_page = $_GET['page'];
} else {
    $get_page = 1;
}

list($page, $range, $max_page, $disp_data_briefing) = pagination($briefing_lists, 12, $get_page);
// list($page, $range, $max_page, $disp_data_briefing) = pagination($briefing_lists, 4, $get_page);

// 現在のURL取得
$now_url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
// var_dump($now_url);
// echo '<br>';
$parameter = parse_url($now_url , PHP_URL_QUERY);
// echo $parameter;
$url = parse_url($now_url , PHP_URL_PATH);
// echo $url;

// ここまでページネーション処理

// print_r($disp_data_briefing[1]); // テスト用


require_once __DIR__ . "/../views/vie_briefing_list.php";
?>