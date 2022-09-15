<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// 登録したらページ移動させる

// 二重送信対策
list($session_token, $new_token) = generate_token();

$shares = new Shares(); // 共有情報
$departments = new Departments(); // 学科
$majors = new Majors(); // 専攻


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
    $user_id = $_COOKIE['user_id'];
    // 登録
    // $shares->create($title, $contents, $user_id, $file_path);
    // header('Location:/shares');
} else {
    echo "何もない";
}

// 学生以外だけが入れる処理
if (is_admin($_COOKIE['user_admin']) || is_teacher($_COOKIE['user_type'])){
    $date = date('Y-m-d');
    $major_lists = $majors->selectAll($majors::sqlSelectAll);
    $department_lists = $departments->selectAll($departments::sqlSelectAll);
    // require_once "../views/.php";
} else {
    header('Location:/shares');
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