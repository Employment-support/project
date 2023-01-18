<?php

require_once __DIR__ . '/./../../vendor/autoload.php';

use Aws\S3\S3Client;  
use Aws\Exception\AwsException;

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
    if ($admin == 1){
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
    if ($user == 1){
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
    if ($user == 0){
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


// ログイン状態で担任か管理者か判断
function is_editor()
{
    if (isset($_COOKIE['user_type_id'])) {
        if (is_teacher($_COOKIE['user_type_id']) || is_admin($_COOKIE['user_type_id'])){
            return true;
        }
    } else {
        return false;
    }
}

// ログインのチェック
function is_login() {
    $is_cookie = false;
    // $_COOKIE['user_id'] があるか
    if(isset($_COOKIE['user_id'])){
        // echo 'あり';
        $is_cookie = true;
    } else {
        // echo 'なし';
        $is_cookie = false;
    }
    return $is_cookie;
}

// ファイル保存処理
function uploaded_file($files)
{
    // $files $_FILESのname
    if (isset($files)) {
        // ファイルの名前にランダムの文字列の結合
        // s3 にアップできるように
        // https://tech.gootablog.com/article/s3-php/
        $save_db_name = "../app/media/imgs/". uniqid(mt_rand(), true). '-'. $files["name"];
        $savefile = __DIR__ . '/../' . $save_db_name;
        move_uploaded_file($files["tmp_name"], $savefile);
    } else {
        $save_db_name = '';
    }

    // return $savefile;
    return $save_db_name;
}


class AwsS3 
{
    protected $s3Client = '';
    
    // S3Clientインスタンスの作成
    function __construct() {
        $array_ini_file = parse_ini_file(__DIR__. '/./../credentials.ini', true);
    
        $this->s3Client = new S3Client([
            'credentials' => [
                    'key' => $array_ini_file['AWS_ACCESS_KEY_ID'],
                    'secret' => $array_ini_file['AWS_SECRET_ACCESS_KEY'],
                ],
            // 'profile' => 'default',
            'region' => 'ap-northeast-1',
            'version' => 'latest'
        ]); 
    }
    
    // 単発ファイルアップロード
    function s3_one_upload($dir, $file) {
        // print_r(isset($file));
        // print_r($file);
        // print_r(count($file['name']));
        // print_r($file['error']);
        if ($file['error'] == 0) {
            $save_name = uniqid(mt_rand(), false). '-'. $file["name"];
            // echo $save_name;
            
            try {
                $result = $this->s3Client->putObject([
                    // 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
                    'Bucket'        => 'support-medias',
                    'Key'           => $dir. '/'. $save_name,
                    'SourceFile'    => $file["tmp_name"],
                    // 'ContentType'   => mime_content_type($file["type"]),
                ]);
                // var_dump($result);
                // 登録URL
                return $result["ObjectURL"];
                
            } catch (AwsException $e) {
        		print_r($e->getMessage());
        	}
        } else {
            return '';
        }
    }
    
    // 複数ファイルアップロード
    function s3_multiple_upload($dir, $file) {
        // print_r(isset($file));
        // var_dump($file);
        // print_r(count($file['name']));
        var_dump($file['error'][0] == 0);
        if ($file['error'][0] == 0) {
            $urls = array();
            
            // echo 'aru';
            foreach ((array)$file['error'] as $key => $error) {
                // echo $key;
                $save_name = uniqid(mt_rand(), false). '-'. $file["name"][$key];
                // echo $save_name;
                
                try {
                    $result = $this->s3Client->putObject([
                        // 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
                        'Bucket'        => 'support-medias',
                        'Key'           => $dir. '/'. $save_name,
                        'SourceFile'    => $file["tmp_name"][$key],
                        // 'ContentType'   => mime_content_type($file["type"]),
                    ]);
                    // var_dump($result);
                    array_push($urls, $result["ObjectURL"]);
                    
                } catch (AwsException $e) {
            		print_r($e->getMessage());
            	}
            }
            // 登録URL
            // return $result["ObjectURL"];
            
            // var_dump($urls);
            // // var_dump(count($urls));
            if (count($urls) > 1) {
                // 複数の場合
                return $urls;
            } else {
                // 単品の場合
                // var_dump($urls);
                return $urls[0];
            }
            
        	
        } else {
            return '';
        }
    }
}