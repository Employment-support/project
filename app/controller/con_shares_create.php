<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
include_once "function.php";

// 登録したらページ移動させる

// 二重送信対策
list($session_token, $new_token) = generate_token();

$user = new User(); // ユーザー
$shares = new Shares(); // 共有情報
$departments = new Departments(); // 学科
$majors = new Majors(); // 専攻

$user = $user->select(1, $user::sqlSelect2);
// $user = $user->select($_SESSION["user_id"], $sql);
// print_r($user);
// print_r($_POST);

// post送信か確認
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_FILES['upload_file'])) {
        // ファイルの名前にランダムの文字列の結合
        $savefile = "../media/imgs/". uniqid(mt_rand(), true). '-'. $_FILES["upload_file"]["name"];
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], $savefile);
    } else {
        $savefile = '';
    }
    $title = $_POST[''];
    $contents = $_POST[''];
    $file_path = $savefile;
    $user_id = $user['id'];
    // 登録
    // $shares->create($title, $contents, $user_id, $file_path);
    // header('Location:con_shares_list.php');
} else {
    echo "何もない";
}

// 学生以外だけが入れる処理
if (is_admin_teacher($user['type'], $user['admin'])){
    $date = date('Y-m-d');
    $major_lists = $majors->selectAll($majors::sqlSelectAll);
    $department_lists = $departments->selectAll($departments::sqlSelectAll);
    // require_once "../views/.php";
} else {
    header('Location:con_shares_list.php');
}

?>
<!-- コンボックスサンプル -->
<!-- 実際はviewsの方におく -->
<select name="department" id="department">
    <?php foreach ($department_lists as $department_list):?>
    <option value="<?=$department_list['id']?>"><?=$department_list['department']?></option>
    <?php endforeach;?>
</select>

<select name="major" id="major">
    <?php foreach ($major_lists as $major_list):?>
    <option value="<?=$major_list['id']?>"><?=$major_list['major']?></option>
    <?php endforeach;?>
</select>


<?php
// 二重送信対策確認
if ( is_token_valid($session_token) ){
    echo '登録できません';
}
?>