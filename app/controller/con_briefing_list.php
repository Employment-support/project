<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";


$briefings = new Briefings(); // 企業説明会
$corporations = new Corporations(); // 企業ジャンル

// vies側で学生/担任で表示される内容の変更
$type = false;
// ログイン状態で担任か管理者か判断
if (isset($_COOKIE['user_type'])) {
    if (is_teacher($_COOKIE['user_type']) || is_admin($_COOKIE['user_type'])){
        $type = true;
    }
} else {
    $type = false;
}
echo $type; // test

$corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

$briefing_lists = $briefings->selectAll($briefings::sqlSelectAll);

// ページネーション
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $get_page = $_GET['page'];
} else {
    $get_page = 1;
}

list($page, $range, $max_page, $disp_data) = pagination($briefing_lists, 1, $get_page);

// 自身のスクリプト名
$url = $_SERVER['SCRIPT_NAME'];
// ここまでページネーション処理


// print_r($disp_data); // テスト用

// 試作
foreach ($disp_data as $data) {
    // print_r($data). '<br>';
    echo "<p><a href=/briefing/create?id=" . $data['id']. ">". 'create_url' . "</a></p>"; // てすと
    echo "<p><a href=/briefing/edit?id=" . $data['id']. ">". 'edit_url' . "</a></p>"; // てすと
    echo "<p><a href=/briefing/inf?id=" . $data['id']. ">". 'inf_url' . "</a></p>"; // てすと
    foreach ($data as $key => $value) {
        echo $key. '=>' . $value. '<br>';
    }
    // 作ったユーザだけで編集可能
    if ($type && $_COOKIE['user_id'] == $data['user_id']) {
        echo '<button>編集</button>';
    }
    echo str_repeat('-', 10). '<br>';
}
// viewsでtmp_pagination.phpを呼び出す
require_once __DIR__ . "/../template/tmp_pagination.php";
// require_once "../views/.php";
?>

<!-- コンボックスサンプル -->
<select name="genre" id="genre">
    <?php foreach ($corporation_lists as $corporation_list):?>
    <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
    <?php endforeach;?>
</select>