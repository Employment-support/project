<?php

// 二重送信対遺作
// sessionトークンの生成
function generate_token()
{
    session_start();
    
    $token = isset($_SESSION['token']) ? $_SESSION['token'] : "";

    $new_token = uniqid('', true);

    $_SESSION['token'] = $new_token;
    return array($token, $new_token);
}

// トークンが一致するか判定
function is_token_valid($session_token){

    // POSTされたトークンを取得
    $post_token = isset($_POST["token"]) ? $_POST["token"] : "";

    // POSTされたトークンとセッション変数のトークンの比較
    if($post_token != "" && $post_token == $session_token) {
        return true;
    } else {
        return false;
    }
}

// 管理者か
function is_admin($admin)
{
    // 管理者権限があれば入れる
    if ($admin != 0){
        return true;
    } else {
        // echo '管理者ではない';
        return false;
    }

}

// 担任か
function is_teacher($user)
{
    // 担任なら入れる
    if ($user == '担任'){
        // echo '担任だ';
        return true;
    } else {
        return false;
    }

}

// 学生か
function is_student($user)
{
    // 学生なら入れる
    if ($user == '学生'){
        return true;
    } else {
        return false;
    }

}

// ページネーション
function pagination($db_data, $max_display_num, $get_page)
{
    /*
    $db_data : データベースのリスト
    $max_display_num : 表示させる最大数
    $get_page : ページの番号
    */

    $num_count = count($db_data);
    
    // 最大ページの取得
    $max_page = ceil($num_count / $max_display_num);

    // ページ数の取得
    if (isset($get_page) && is_numeric($get_page)) {
        $page = $get_page;
    } else {
        $page = 1;
    }

    // ページ番号
    if($page == 1 || $page == $max_page) {
        $range = 4;
    } elseif ($page == 2 || $page == $max_page - 1) {
        $range = 3;
    } else {
        $range = 2;
    }

    $start_no = ($page - 1) * $max_display_num;

    // 表示アイテム
    $disp_data = array_slice($db_data, $start_no, $max_display_num, true);

    // 取得ページ番号, ページ番号,　最大ページ, 表示データ
    return array($page, $range, $max_page, $disp_data);
    
}

// ログインのチェック
// ログイン状態で担任か管理者か判断
function is_editor()
{
    if (isset($_COOKIE['user_type'])) {
        if (is_teacher($_COOKIE['user_type']) || is_admin($_COOKIE['user_type'])){
            return true;
        }
    } else {
        return false;
    }
}

// ファイル保存処理
function uploaded_file($files)
{
    // $files $_FILESのname
    if (isset($files)) {
        // ファイルの名前にランダムの文字列の結合
        // s3 にアップできるように
        // https://tech.gootablog.com/article/s3-php/
        $save_db_name = "../media/imgs/". uniqid(mt_rand(), true). '-'. $files["name"];
        $savefile = __DIR__ . '/' . $save_db_name;
        move_uploaded_file($files["tmp_name"], $savefile);
    } else {
        $save_db_name = '';
    }

    return $save_db_name;
}