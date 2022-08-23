<?php
include_once "..\..\models\model.php";
include_once "..\..\models\masters.php";

// if ($_SERVER["REQUEST_METHOD"] !== "POST"){
//     print_r($_POST);
// }
// 二重昇進をなくす
$x = new SkillItems();
if(count($_POST) != 0) {
    print_r($_POST);
    foreach ($_POST as $post){
        $x->create($post);
    }

}


// $c=filter_input(INPUT_POST,"c",FILTER_VALIDATE_INT,FILTER_REQUIRE_ARRAY);
//     print "c=";
// var_dump($c);
//     print "<br>";

$title = '';

$datas = ['type'];
$url = basename(__FILE__);

require_once "../../views/admin/belongs_create.php"

?>
