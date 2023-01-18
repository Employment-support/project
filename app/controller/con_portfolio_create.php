<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// 二重送信対策
list($session_token, $new_token) = generate_token();

$portfolio = new Portfolio(); // ポートフォリオ


// post送信確認とDB保存処理
$mod = new AwsS3();
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // var_dump($_FILES['image']);
    
    $url = $mod->s3_one_upload('imgs', $_FILES['image']);
    
    var_dump($url);
    

    $title = $_POST['title'];
    $contents = $_POST['text'];
    $item_url = $_POST['url'];
    $img_path = $url;
    $user_id = $_COOKIE['user_id'];

    if ($_GET['top'] == 1) {
        $top = true;
    } else {
        $top = false;
    }
    // 登録
    $return_type = $portfolio->create($title, $contents, $item_url, $img_path, $top, $user_id);

    if ($return_type) {
        header('Location:/portfolio');
    } else {
        echo '投稿できていない';
    }
}

// 担任以外だけが入れる処理
// if (is_admin($_COOKIE['user_admin']) || is_student($_COOKIE['user_type_id'])){
if (is_login()){
    $date = date('Y-m-d');

    require_once __DIR__ . "/../views/vie_portfolio_create.php";
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