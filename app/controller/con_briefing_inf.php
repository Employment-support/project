<?php
include_once __DIR__ . "/../models/model.php";
include_once __DIR__ . "/../models/masters.php";



$briefings = new Briefings(); // 企業説明会

if (isset($_GET['id']) && is_numeric($_GET['id'])){
    // 編集するデータ
    $contents_id = $_GET['id'];
    $briefing_data = $briefings->select($contents_id, $briefings::sqlSelect);

    if (!$briefing_data) {
        header('Location:con_briefing_list.php');
    }
    print_r($briefing_data);
    
// require_once "../views/.php";
} else {
    header('Location:con_briefing_list.php');
}
