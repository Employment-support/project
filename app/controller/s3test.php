<?php
include_once __DIR__ . "/function.php";
// require_once __DIR__ . '/./../../vendor/autoload.php';

// use Aws\S3\S3Client;  
// use Aws\Exception\AwsException;

// echo '表示確認';

// echo __DIR__. '/./../credentials.ini';


// class AwsS3 
// {
//     protected $s3Client = '';
    
//     // S3Clientインスタンスの作成
//     function __construct() {
//         $array_ini_file = parse_ini_file(__DIR__. '/./../credentials.ini', true);
    
//         $this->s3Client = new S3Client([
//             'credentials' => [
//                     'key' => $array_ini_file['AWS_ACCESS_KEY_ID'],
//                     'secret' => $array_ini_file['AWS_SECRET_ACCESS_KEY'],
//                 ],
//             // 'profile' => 'default',
//             'region' => 'ap-northeast-1',
//             'version' => 'latest'
//         ]); 
//     }
    
//     // ファイルアップロード
//     function s3_upload($dir, $file) {
//         // print_r(isset($file));
//         if (isset($file)) {
            
//             $urls = array();
            
//             foreach ($file['error'] as $key => $error) {
//                 $save_name = uniqid(mt_rand(), true). '-'. $file["name"][$key];
//                 echo $save_name;
                
//                 try {
//                     $result = $this->s3Client->putObject([
//                         // 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
//                         'Bucket'        => 'support-medias',
//                         'Key'           => $dir. '/'. $file["name"][$key],
//                         'SourceFile'    => $file["tmp_name"][$key],
//                         // 'ContentType'   => mime_content_type($file["type"]),
//                     ]);
                    
//                 array_push($urls, $result["ObjectURL"]);
                    
//                 } catch (AwsException $e) {
//             		print_r($e->getMessage());
//             	}
//             }
//             // 登録URL
//             // return $result["ObjectURL"];
            
//             if (count($urls) != 1) {
//                 // 複数の場合
//                 return $urls;
//             } else {
//                 // 単品の場合
//                 return $urls[0];
//             }
            
        	
//         } else {
//             return '';
//         }
//     }
// }


// function s3_packet(){
//     $array_ini_file = parse_ini_file(__DIR__. '/./../credentials.ini', true);
    
//     $s3Client = new S3Client([
//         'credentials' => [
//                 'key' => $array_ini_file['AWS_ACCESS_KEY_ID'],
//                 'secret' => $array_ini_file['AWS_SECRET_ACCESS_KEY'],
//             ],
//         // 'profile' => 'default',
//         'region' => 'ap-northeast-1',
//         'version' => 'latest'
//     ]); 
    
//     return $s3Client;
// }

// ファイルアップロード
// function s3_upload($dir, $file) {
    
//     if (isset($file)) {
//         $s3Client = s3_packet();
//         echo 'aru';
        
//         $save_name = uniqid(mt_rand(), true). '-'. $file["name"];
//         echo $save_name;
//         try {
//             $result = $s3Client->putObject([
//                 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
//                 'Bucket'        => 'support-medias',
//                 // 'Key'           => 'imgs/imgtest2.png',
//                 'Key'           => $dir. '/'. $save_name,
//                 'SourceFile'    => $file["tmp_name"],
//                 'ContentType'   => mime_content_type($file["type"]),
//             ]);
//             // 登録URL
//             return $result["ObjectURL"];
            
//         } catch (AwsException $e) {
//     		print_r($e->getMessage());
//     	}
    	
//     } else {
//         return '';
//     }
// }

function s3_download() {
    
}

// $array_ini_file = parse_ini_file(__DIR__. '/./../credentials.ini', true);

// print_r($array_ini_file['AWS_ACCESS_KEY_ID']);
// // パケット接続
// $s3Client = new S3Client([
//     'credentials' => [
//             'key' => $array_ini_file['AWS_ACCESS_KEY_ID'],
//             'secret' => $array_ini_file['AWS_SECRET_ACCESS_KEY'],
//         ],
//     // 'profile' => 'default',
//     'region' => 'ap-northeast-1',
//     'version' => 'latest'
// ]);

// // print_r($s3Client);

// // アップロード
// // $file    = date('YmdHis') . '.txt';
// // $content = <<< EOF
// // hoge
// // ふが
// // EOF;
// // file_put_contents($file, $content);

// // S3にアップロード(できた)
// $file = __DIR__.  "/./../media/imgs/104430473463555cd6be7157.82690952-sea-g951368a46_1280.jpg";
// $result = $s3Client->putObject([
//     // 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
//     'Bucket'        => 'support-medias',
//     'Key'           => 'imgs/imgtest2.png',
//     'SourceFile'    => $file,
//     'ContentType'   => mime_content_type($file),
// ]);

// // // 結果を表示
// echo('<pre>');
// var_dump($result);
// echo('</pre>');
// header('Content-type: image/jpg');
// echo '<img src="'. $result["ObjectURL"]. '">';

// $r = $s3Client->getObject(['Bucket'=>'support-medias', 'Key'=>'imgs/imgtest2.png']);
// var_dump($r);

// header('Content-type: image/png');

// var_dump($r['Body']);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $mod = new AwsS3();
    $url = $mod->s3_one_upload('imgs', $_FILES['file']); // 単発
    $url = $mod->s3_multiple_upload('imgs', $_FILES['file']); // 複数
    // echo 'test';
    var_dump($url);
    // $array_ini_file = parse_ini_file(__DIR__. '/./../credentials.ini', true);
    echo '<a href="'. $url. '" download>ダウンロード</a>';
    echo '<img src="'.$url . '">';
    // print_r($array_ini_file['AWS_ACCESS_KEY_ID']);
    // パケット接続
//     $s3Client = new S3Client([
//         'credentials' => [
//                 'key' => $array_ini_file['AWS_ACCESS_KEY_ID'],
//                 'secret' => $array_ini_file['AWS_SECRET_ACCESS_KEY'],
//             ],
//         // 'profile' => 'default',
//         'region' => 'ap-northeast-1',
//         'version' => 'latest'
//     ]);
    
//     if ($_FILE['file']['error'][0] == 0) {
//         // $s3Client = s3_packet();
//         var_dump($_FILES['file']);
//         $dir = 'imgs';
        
//         $save_name = uniqid(mt_rand(), true). '-'. $_FILES['file']["name"];
        
//         $dir = $dir. '/'. $save_name;
//         $result = $s3Client->putObject([
//             // 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
//             'Bucket'        => 'support-medias',
//             // 'Key'           => 'imgs/imgtest2.png',
//             // 'Key'           => $dir. '/'. $save_name,
//             'Key'           => $dir,
//             // 'Key'           => $dir. '/'. $_FILES['file']["name"],
//             'SourceFile'    => $_FILES['file']["tmp_name"],
//             // 'ContentType'   => mime_content_type($_FILES['file']["tmp_name"]),
//         ]);
//         // 登録URL
//         // echo $result["ObjectURL"];
//     	echo('<pre>');
// 	    print_r($result);
// 		echo('</pre>');

//     } else {
//         echo 'nasi';
//     }
    
    // echo '<img src="'. $url. '">';
//     $array_ini_file = parse_ini_file(__DIR__. '/./../credentials.ini', true);
    
//     // print_r($array_ini_file['AWS_ACCESS_KEY_ID']);
//     // パケット接続
//     $s3Client = new S3Client([
//         'credentials' => [
//                 'key' => $array_ini_file['AWS_ACCESS_KEY_ID'],
//                 'secret' => $array_ini_file['AWS_SECRET_ACCESS_KEY'],
//             ],
//         // 'profile' => 'default',
//         'region' => 'ap-northeast-1',
//         'version' => 'latest'
//     ]);
    
//     // print_r($s3Client);
    
//     // アップロード
//     // $file    = date('YmdHis') . '.txt';
//     $file    = uniqid(mt_rand(), true). '-'. '.txt';
//     $content = <<< EOF
// hoge
// ふが
// EOF;
//     file_put_contents($file, $content);
    
//     // S3にアップロード(できた)
//     // $file = __DIR__.  "/./../media/imgs/104430473463555cd6be7157.82690952-sea-g951368a46_1280.jpg";
//     $result = $s3Client->putObject([
//         // 'ACL'           => 'public-read',   // ACLを指定する場合、ブロックパブリックアクセスはすべてオフにする
//         'Bucket'        => 'support-medias',
//         'Key'           => 'imgs/'. $file,
//         'SourceFile'    => $file,
//         'ContentType'   => mime_content_type($file),
//     ]);
    
//     // // 結果を表示
//     echo('<pre>');
//     var_dump($result);
//     echo('</pre>');
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <!--<input type="file" id="file" name="file"><br>-->
    <input type="file" id="file" name="file[]" multiple><br>
    <input type="submit" value="投稿">
</form>
<!--<a href="https://support-medias.s3-ap-northeast-1.amazonaws.com/imgs/1767338754636b7bebcfee87.97707780-2022-10-29_230626-waifu.png" download>ダウンロード</a>-->
<!--<img src="https://support-medias.s3-ap-northeast-1.amazonaws.com/imgs/1767338754636b7bebcfee87.97707780-2022-10-29_230626-waifu.png"></img>-->