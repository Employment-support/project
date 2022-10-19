<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";



$briefings = new Briefings(); // 企業説明会
// $corporations = new Corporations(); // 企業ジャンル

if (isset($_GET['id']) && is_numeric($_GET['id'])){
    // 編集するデータ
    $contents_id = $_GET['id'];

    
    $sql = 'SELECT * FROM briefings INNER JOIN corporations ON briefings.corporation_id = corporations.id WHERE briefings.id = ?';
    $briefing_data = $briefings->select($contents_id, $sql);

    if (!$briefing_data) {
        header('Location:/briefing');
    }
    // print_r($briefing_data);
    
require_once __DIR__ . "/../views/vie_briefings_inf.php";
} else {
    header('Location:/briefing');
}
