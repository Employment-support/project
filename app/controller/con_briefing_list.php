<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
include_once "function.php";


$briefings = new Briefings(); // 企業説明会
$corporations = new Corporations(); // 企業ジャンル

// vies側で学生/担任で表示される内容の変更
if (isset($_COOKIE['user_type'])) {
    $type = is_teacher($_COOKIE['user_type']);
} else {
    $type = false;
}
// echo $type; // test

$corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

$briefing_lists = $briefings->selectAll($briefings::sqlSelectAll);

// ページネーション
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $get_page = $_GET['page'];
} else {
    $get_page = 1;
}

list($page, $range, $max_page, $disp_data) = pagination($briefing_lists, 3, $get_page);

// 自身のファイルのファイル名
$url = $_SERVER['REQUEST_URI'];

echo $_COOKIE['user_id'];
echo $_COOKIE['user_name_hiragana'];
echo $_COOKIE['user_number'];
echo $_COOKIE['user_admin'];
echo $_COOKIE['user_gender'];
echo $_COOKIE['user_type_id'];
echo $_COOKIE['user_type'];
echo $_COOKIE['user_department_id'];
echo $_COOKIE['user_department'];
echo $_COOKIE['user_major_id'];
echo $_COOKIE['user_major'];
// print_r($disp_data); // テスト用

// 試作
foreach ($disp_data as $data) {
    // print_r($data). '<br>';
    echo "<p><a href=con_briefing_create.php?create=" . $data['id']. ">". 'create_url' . "</a></p>"; // てすと
    echo "<p><a href=con_briefing_edit.php?edit=" . $data['id']. ">". 'edit_url' . "</a></p>"; // てすと
    echo "<p><a href=con_briefing_inf.php?inf=" . $data['id']. ">". 'inf_url' . "</a></p>"; // てすと
    foreach ($data as $key => $value) {
        echo $key. '=>' . $value. '<br>';
    }
    echo str_repeat('-', 10). '<br>';
}
// viewsでtmp_pagination.phpを呼び出す
// require_once "../template/tmp_pagination.php";
// require_once "../views/.php";
?>

<!-- コンボックスサンプル -->
<select name="genre" id="genre">
    <?php foreach ($corporation_lists as $corporation_list):?>
    <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
    <?php endforeach;?>
</select>