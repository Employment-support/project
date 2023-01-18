<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// 日本語のデータがDBに登録されたいない
// print_r($_COOKIE); // テスト用
// echo $_COOKIE['user_id']; // テスト用
// echo $_COOKIE['user_name']; // テスト用
// echo $_COOKIE['user_name_hiragana']; // テスト用
// echo $_COOKIE['user_number']; // テスト用
// echo $_COOKIE['user_admin']; // テスト用
// echo $_COOKIE['user_gender']; // テスト用
// echo $_COOKIE['user_type_id']; // テスト用
// echo $_COOKIE['user_type']; // テスト用
// echo $_COOKIE['user_department_id']; // テスト用
// echo $_COOKIE['user_department']; // テスト用
// echo $_COOKIE['user_major_id']; // テスト用
// echo $_COOKIE['user_major']; // テスト用

$user = new User();
$briefings = new Briefings();
$shares = new Shares(); // 共有情報
$majors = new Majors(); // 専攻
$files = new DB();
$corporations = new Corporations(); // 企業ジャンル

// vies側で学生/担任で表示される内容の変更
$type = is_editor();
// echo $type;


$major_lists = $majors->selectAll($majors::sqlSelectAll);

$file_lists = $files->selectAll('SELECT * FROM files');

// ページネーション
// $sql = $shares::sqlSelectAll . ' ORDER by update_at desc LIMIT 4';
$sql = 'SELECT t1.id, t1.title, t1.contents, t1.user_id, t1.created_at, t1.update_at, t1.delete_at, t1.department_id, t1.major_id, t2.major, t3.department
FROM shares as t1
INNER JOIN majors as t2
ON t2.id = t1.major_id
INNER JOIN departments as t3
ON t3.id = t1.department_id 
ORDER by update_at desc LIMIT 4';
$disp_data_share = $shares->selectAll($sql);

// データがあるか判断
if (!empty($disp_data_share)) {
    $is_data = true;
} else {
    $is_data = false;
}


// 分類コンボックス
$corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

// $sql = 'SELECT bri.id,
// bri.corporate,
// bri.contents,
// bri.corporate_url,
// bri.info,
// bri.img_path,
// bri.user_id,
// bri.created_at,
// bri.update_at,
// bri.delete_at,
// cor.genre
// FROM briefings AS bri 
// INNER JOIN corporations AS cor
// ON bri.corporation_id = cor.id 
// ORDER by bri.update_at desc';
$sql = 'SELECT 
t1.id,
t1.corporate,
-- t1.contents,
t1.corporate_url,
-- t1.info,
t1.img_path,
t1.user_id,
t1.created_at,
t1.update_at,
-- t1.delete_at,
cor.genre
FROM briefings AS t1 
INNER JOIN corporations AS cor
ON t1.corporation_id = cor.id
WHERE 4 > (
  SELECT COUNT(*)
  FROM briefings as t2
  WHERE cor.id = t2.corporation_id
  AND t2.id > t1.id
)
ORDER BY t1.update_at DESC';




$disp_data_briefing = $briefings->selectAll($sql);

// foreach ($disp_data_briefing as $data) {
//     print_r($data);
//     echo '<br>';
    
// }

require_once __DIR__ . "/../views/home.php";