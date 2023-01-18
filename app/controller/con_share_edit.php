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

// 学生以外だけが入れる処理＆getがあるとき
if (is_admin($_COOKIE['user_admin']) || is_teacher($_COOKIE['user_type']) || isset($_GET['id']) && is_numeric($_GET['id'])){
    $date = date('Y-m-d');
    $major_lists = $majors->selectAll($majors::sqlSelectAll);
    $department_lists = $departments->selectAll($departments::sqlSelectAll);
    
    // 編集データの取得
    $sql = 'SELECT t1.id, t1.title, t1.contents, t1.user_id, t1.created_at, t1.update_at, t1.delete_at, t1.department_id, t1.major_id, files.id, files.file_path
                FROM shares as t1
                LEFT OUTER JOIN files ON files.share_id = t1.id
            WHERE t1.id = ?';
    
    // $sql = 'SELECT * FROM  files
    // INNER JOIN shares ON shares.id = files.share_id
    // WHERE shares.id = ?';
    $share_data = $shares->select($_GET['id'], $sql);
    
    // これがデータになる▼
    // var_dump($share_data);

    require_once __DIR__ . "/../views/vie_share_edit.php";
    
    // 二重送信対策確認
    if ( is_token_valid($session_token) ){
        echo '登録できません';
    }
    
    
    // post送信確認とDB保存処理
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $save_name_list = [];
        // print_r($_FILES['file']['error']);
        // var_dump($_FILES['file']['error'] == [0]);
        // https://kinsta.com/jp/blog/php-8/#string-to-number-comparison
        if ($_FILES['file']['error'][0] == 0) {
            $mod = new AwsS3();
            $url = $mod->s3_multiple_upload('file', $_FILES['file']);
        } elseif (isset($share_data['file_path'])) {
            $url = '';
        } else {
            $url = $share_data['file_path'];
        }
        
        // var_dump($_POST);
        $id = $_GET['id'];
        $title = $_POST['title'];
        $contents = $_POST['text'];
        $user_id = $_COOKIE['user_id'];
        $department_id = $_POST['department'];
        $major_id = $_POST['major'];
        $file_path = $url;
        // ファイルが複数再登録されたときの処理を考える
        /**
         * 新たにファイル登録があれば元あったファイルを物理削除またはbooleanを追加して理論削除
         * してからインサートする
         */
        // print_r($file_path);
        
        // print_r($file_path);
    
        // 登録
            // アップロードがない時の処理を書く
        $return_type = $shares->update($title, $contents, $id, $department_id, $major_id, $user_id, $file_path);
        // var_dump($return_type);
        if ($return_type == true && $file_path) {
            // print_r($save_name_list);
            foreach ((array)$file_path as $save_name) {
                // echo $save_name;
                $shares->fileCreate($_GET['id'], $save_name);
            }
        }
    
        // リダイレクトができない
        if ($return_type || $shares) {
            // echo '投稿成功';
            header('Location:/share');
        } else {
            echo '投稿できていない';
        }
    }
} else {
    header('Location:/shares');
}

