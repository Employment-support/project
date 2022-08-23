<?php
include_once "..\models\model.php";
include_once "..\models\masters.php";


$briefings = new Briefings(); // 企業説明会

if (isset($_GET['edit']) && is_numeric($_GET['edit'])){
    // 編集するデータ
    $contents_id = $_GET['edit'];
    $briefing_data = $briefings->select($_GET[''], $briefings::sqlSelect);

    if (!$briefing_data) {
        header('Location:con_briefings_list.php');    
    }
    print_r($briefing_data);
// require_once "../views/.php";
}
