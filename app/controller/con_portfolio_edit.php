<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// 登録したらページ移動させる

// 二重送信対策
list($session_token, $new_token) = generate_token();

$portfolio = new Portfolio(); // ポートフォリオ

// post送信か確認
if($_SERVER["REQUEST_METHOD"] == "POST"){
    var_dump($_FILES['image']);
    // $mod = new AwsS3();
    // $url = $mod->s3_upload('imgs', $_FILES['image']);
    $mod = new AwsS3();
    $url = $mod->s3_one_upload('imgs', $_FILES['image']);
    
    var_dump($url);
    $id = $_GET['id'];
    $title = $_POST['title'];
    $contents = $_POST['text'];
    $item_url = $_POST['url'];
    $user_id = $_COOKIE['user_id'];

    if (isset($url)) {
        $img_path = $url;
        $is_up_img = true;
    } else {
        $is_up_img = false;
    }
    // if ($_GET['top'] == 1) {
    //     $top = true;
    // } else {
    //     $top = false;
    // }
    
    // 登録
    // アップロードがない時の処理を書く
    // $return_type = $portfolio->create($title, $contents, $item_url, $img_path, $top, $user_id);
    $return_type = $portfolio->update($id, $title, $contents, $item_url, $img_path, $user_id, $is_up_img);
    

    if ($return_type) {
        header('Location:/portfolio');
    } else {
        echo '投稿できていない';
    }
}

// 学生以外だけが入れる処理＆getがあるとき
if (is_login() || isset($_GET['id']) && is_numeric($_GET['id'])){
    $date = date('Y-m-d');
    
    // 編集するデータ
    $contents_id = $_GET['id'];
    $portfolio_data = $portfolio->select($contents_id, $portfolio::sqlSelect);

    // falseなら一覧ページに戻る
    if (!$portfolio_data) {
        header('Location:\portfolio');    
    }

    // 作成ユーザではない時の処理
    if ($portfolio_data['user_id'] != $_COOKIE['user_id']) {
        header('Location:\portfolio');
    }
    
    // print_r($portfolio_data);

    require_once __DIR__ . "/../views/vie_portfolio_edit.php";
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