<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
include_once "function.php";

session_start();

$user = new User();

$user = $user->select(1, $user::sqlSelect2);
// $user->select($_SESSION["user_id"], $user::sqlSelect2);
print_r($user);

$shares = new Shares(); // 共有情報
$majors = new Majors(); // 専攻

// vies側で学生/担任で表示される内容の変更
$type = is_admin_teacher($user['type'], $user['admin']);

$major_lists = $majors->selectAll($majors::sqlSelectAll);

// ページネーション
$shares_lists = $shares->selectAll($shares::sqlSelectAll);

if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $get_page = $_GET['page'];
} else {
    $get_page = 1;
}

list($page, $range, $max_page, $disp_data) = pagination($shares_lists, 3, $get_page);

// 自身のファイルのファイル名
$url = basename(__FILE__);

print_r($disp_data); // テスト用

// viewsでtmp_pagination.phpを呼び出す
// require_once "../views/.php";

?>
<!-- コンボックスサンプル -->
<select name="genre" id="genre">
    <?php foreach ($$major_lists as $major_list):?>
    <option value="<?=$major_list['id']?>"><?=$major_list['major']?></option>
    <?php endforeach;?>
</select>