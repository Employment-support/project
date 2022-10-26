<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";
include_once __DIR__ . "/../models/user.php";
include_once __DIR__ . "/function.php";

// $user = new User(); // ユーザー
// $departments = new Departments(); // 学科
// $majors = new Majors(); // 専攻


// [creation] => 作成日
// [birthday] => 生年月日
// [postalcode] => 郵便番号
// [address_furigana] => 住所ふりがな
// [address] => 住所
// [nearest_line] => 線
// [nearest_station] => 駅
// [tel_home] => 自宅電話
// [tel_mobile] => 携帯電話
// [email] => メール
// [emergency_address_furigana] => 緊急住所ふりがな
// [emergency_address] => 緊急住所
// [emergency_tel] => 緊急電話
// [academic_month] => 時期学歴
// Array ( 
//     [0] => 
//     [1] => 
//     [2] => 
//     [3] => 
//     [4] => 
// ) 
// [academic] => 学歴
// Array ( 
//     [0] => 
//     [1] => 
//     [2] => 
//     [3] => 
//     [4] => 
// )
// [career_month] => 時期職歴
// Array ( 
//     [0] => 
//     [1] => 
//     [2] => 
//     [3] => 
//     [4] => 
// )
// [career] => 職歴
// Array ( 
//     [0] => 
//     [1] => 
//     [2] => 
//     [3] => 
//     [4] => 
// )
// [qualification_month] => 時期資格免許
// Array ( 
//     [0] => 
//     [1] => 
//     [2] => 
//     [3] => 
//     [4] => 
// )
// [qualification] => 資格免許
// Array ( 
//     [0] => 
//     [1] => 
//     [2] => 
//     [3] => 
//     [4] => 
// ) 
// [desired] => 希望職種
// [motivation] => 志望動機
// [publicity] => 自己PR
// [character] => 性格
// [hobby] => 趣味
// [os] => スキルセット - os
// [language] => スキルセット - 言語
// [db] => スキルセット - データベース
// [office] => スキルセット - office
// [network] => スキルセット - ネットワーク
// [other] => スキルセット - その他
// [pdf] => PDF保存
// [save] => 保存 (保存)
$resumes = new Resumes();

// 保存処理
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // db登録
    // $resumes->create();
}

// PDF出力処理

require_once __DIR__ . "/../views/vie_resume_create.php";

?>
