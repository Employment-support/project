<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// 登録したらページ移動させる

// 二重送信対策
list($session_token, $new_token) = generate_token();


$briefings = new Briefings(); // 企業説明会
$corporations = new Corporations(); // 企業ジャンル


// post送信確認とDB保存処理
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // ローカルへの画像投稿ができない
    // $save_db_name = uploaded_file($_FILES['gazou']);
    $mod = new AwsS3();
    $url = $mod->s3_upload('imgs', $_FILES['file']);
    // echo 'test';
    
    $corporate = $_POST['Enterprise']; // 企業名
    $contents = $_POST['text']; // 説明会内容
    $corporate_url = $_POST['idurl']; // 企業URL
    $info = $_POST['information']; // 企業情報
    $img_path = $url;
    $corporation_id = (int) $_POST['genre']; // 企業ジャンル
    $user_id = (int) $_COOKIE['user_id']; // 投稿者ID
    
    // var_dump($corporate); // test
    // var_dump($contents); // test
    // var_dump($corporate_url); // test
    // var_dump($info); // test
    // var_dump($img_path); // test
    // var_dump($corporation_id); // test
    // var_dump($user_id); // test

    // 登録
    $return_type = $briefings->create($corporate, $contents, $corporate_url, $info, $img_path, $corporation_id, $user_id);

    if ($return_type) {
        header('Location:/briefing');
    } else {
        echo '投稿できていない';
    }
}

// 学生以外だけが入れる処理＆getがあるとき
if (is_admin($_COOKIE['user_admin']) || is_teacher($_COOKIE['user_type_id'])){
    $date = date('Y-m-d');
    $corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

    require_once __DIR__ . "/../views/vie_briefing_create.php";
} else {
    header('Location:/briefing');
}
?>
<!-- コンボックスサンプル -->
<!-- 実際はviewsの方におく -->
<!-- <select name="genre" id="genre">
    <?php foreach ($corporation_lists as $corporation_list):?>
    <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
    <?php endforeach;?>
</select> -->


<?php
// 二重送信対策確認
if ( is_token_valid($session_token) ){
    echo '登録できません';
}
?>