<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// 二重送信対策
list($session_token, $new_token) = generate_token();

$portfolio = new Portfolio(); // ポートフォリオ


// post送信確認とDB保存処理
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_FILES['image'])) {
        // ファイルの名前にランダムの文字列の結合
        // s3 にアップできるように
        // https://tech.gootablog.com/article/s3-php/
        $save_db_name = "../media/imgs/". uniqid(mt_rand(), true). '-'. $_FILES["image"]["name"];
        $savefile = __DIR__ . '/' . $save_db_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $savefile);
    } else {
        $save_db_name = '';
    }

    $title = $_POST['title'];
    $contents = $_POST['text'];
    $item_url = $_POST['url'];
    $img_path = $save_db_name;
    $user_id = $_COOKIE['user_id'];


    // 登録
    $return_type = $portfolio->create($title, $contents, $item_url, $img_path, $user_id);

    if ($return_type) {
        header('Location:/portfolio');
    } else {
        echo '投稿できていない';
    }
}

// 学生以外だけが入れる処理＆getがあるとき
if (is_admin($_COOKIE['user_admin']) || is_teacher($_COOKIE['user_type'])){
    $date = date('Y-m-d');

    require_once __DIR__ . "/../views/vie_create_portfolio.php";
} else {
    header('Location:/portfolio');
}
?>


<?php
// 二重送信対策確認
if ( is_token_valid($session_token) ){
    echo '登録できません';
}
?>