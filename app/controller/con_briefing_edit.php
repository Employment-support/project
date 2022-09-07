<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";
include_once "..\models\user.php";
include_once "function.php";

// 登録したらページ移動させる

// 二重送信対策
list($session_token, $new_token) = generate_token();

// $user = new User();
$briefings = new Briefings(); // 企業説明会
$corporations = new Corporations(); // 企業ジャンル


// post送信か確認
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if (isset($_FILES['upload_file'])) {
        // ファイルの名前にランダムの文字列の結合
        $savefile = "../media/imgs/". uniqid(mt_rand(), true). '-'. $_FILES["upload_file"]["name"];
        move_uploaded_file($_FILES["upload_file"]["tmp_name"], $savefile);
    } elseif (isset($_POST[''])) {
        $savefile = $_POST[''];
    }

    $contents_id = $_GET['edit'];
    $corporate = $_POST[''];
    $contents = $_POST[''];
    $corporate_url = $_POST[''];
    $info = $_POST[''];
    $img_path = $savefile;
    $corporation_id = $_POST[''];
    // $user_id = $_COOKIE['id'];
    // 登録
    // $briefings->update($contents_id, $corporate, $contents, $corporate_url, $info, $img_path, $corporation_id, $_COOKIE['user_id']);
    // header('Location:con_briefings_list.php');
}

// 学生以外だけが入れる処理＆getがあるとき
if (is_admin($_COOKIE['user_admin']) || is_teacher($_COOKIE['user_type']) && isset($_GET['edit']) && is_numeric($_GET['edit'])){
    $date = date('Y-m-d');
    $corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

    // 編集するデータ
    $contents_id = $_GET['edit'];
    $briefing_data = $briefings->select($contents_id, $briefings::sqlSelect);

    // falseなら一覧ページに戻る
    if (!$briefing_data) {
        header('Location:con_briefing_list.php');    
    }

    // 作成ユーザではない時の処理
    if ($briefing_data['user_id'] != $_COOKIE['user_id']) {
        header('Location:con_briefing_list.php');
    }
    
    print_r($briefing_data);

    // require_once "../views/.php";
} else {
    header('Location:con_briefing_list.php');
}


?>
<!-- コンボックスサンプル -->
<!-- 実際はviewsの方におく -->
<select name="genre" id="genre">
    <?php foreach ($corporation_lists as $corporation_list):?>
        <?php if ($briefing_data['corporation_id'] == $corporation_list['id']): ?>
        <option value="<?=$corporation_list['id']?>" selected><?=$corporation_list['genre']?></option>
        <?php endif?>
    <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
    <?php endforeach;?>
</select>


<?php
// 二重送信対策確認
if ( is_token_valid($session_token) ){
    echo '登録できません';
}
?>