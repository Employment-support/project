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


// post送信確認とDB保存処理
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $save_name_list = [];
    // if (isset($_FILES['file'])) {
    if ($_FILES['file']['error'][0] == 0) {
        // print_r($_FILES['file']);
        // ファイルの名前にランダムの文字列の結合
        // s3 にアップできるように
        // https://tech.gootablog.com/article/s3-php/
        foreach ($_FILES['file']['error'] as $key => $error) {
            $save_db_name = "../media/imgs/". uniqid(mt_rand(), true). '-'. $_FILES["file"]["name"][$key];
            $savefile = __DIR__ . '/' . $save_db_name;
            move_uploaded_file($_FILES["file"]["tmp_name"][$key], $savefile);

            array_push($save_name_list, $save_db_name);
        }

    } else {
        $save_name_list = [];
    }
    $title = $_POST['title'];
    $contents = $_POST['text'];
    $user_id = $_COOKIE['user_id'];
    $file_path = $save_name_list;
    
    print_r($file_path);

    // 登録
    $return_type = $shares->create($title, $contents, $user_id, $file_path);
    // 画像名が登録できない
    
    // print_r($return_type);

    if ($return_type !== true) {
        // print_r($save_name_list);
        foreach ($save_name_list as $save_name) {
            // echo $save_name;
            $shares->fileCreate($return_type, $save_name);
        }
    }

    if ($return_type || $shares) {
        echo '投稿成功';
        // header('Location:/share');
    } else {
        echo '投稿できていない';
    }
}

// 学生以外だけが入れる処理
if (is_admin($_COOKIE['user_admin']) || is_teacher($_COOKIE['user_type'])){
    $date = date('Y-m-d');
    $major_lists = $majors->selectAll($majors::sqlSelectAll);
    $department_lists = $departments->selectAll($departments::sqlSelectAll);
    require_once __DIR__ . "/../views/vie_create_share.php";
} else {
    header('Location:/share');
}

?>
<!-- コンボックスサンプル -->
<!-- 実際はviewsの方におく -->
<!-- <select name="department" id="department">
    <?php foreach ($department_lists as $department_list):?>
    <option value="<?=$department_list['id']?>"><?=$department_list['department']?></option>
    <?php endforeach;?>
</select>

<select name="major" id="major">
    <?php foreach ($major_lists as $major_list):?>
    <option value="<?=$major_list['id']?>"><?=$major_list['major']?></option>
    <?php endforeach;?>
</select> -->


<?php
// 二重送信対策確認
if ( is_token_valid($session_token) ){
    echo '登録できません';
}
?>