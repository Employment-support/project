<?php
// 一覧ページ
include "..\..\models\model.php";
include "..\..\models\masters.php";

function nowUrl(){
    $url = '';
    if(isset($_SERVER['HTTPS'])){
        $url .= 'https://';
    }else{
        $url .= 'http://';
    }
    $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    return $url;
}


if (strstr($_SERVER['REQUEST_URI'], 'cnt_belongs')){

    $x = new Belongs();
    $title = '';
    $datas = $x->selectAll($x::sqlSelectAll);
    
    foreach ($datas as $data) {
        // print_r($data);
        $keys = array_keys($data);
    }
    
    $url_edit = 'cnt_belongs_edit.php';
    $url_delete = '';
    $url_create = 'cnt_belongs_create.php';
    $url_portal = 'cnt_portal.php';
    
    require_once "../../views/admin/belongs.php";

}


?>
