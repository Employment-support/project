<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ホーム</title>
    <link rel="stylesheet" href="../app/static/css/navi.css">
    <link rel="stylesheet" href="../app/static/css/footer.css">
    <link rel="stylesheet" href="../app/static/css/butto.css">
    <!--<link rel="stylesheet" href="../app/static/css/share.css">-->
    <link rel="stylesheet" href="../app/static/css/tmp_briefing_list.css">
    <link rel="stylesheet" href="../app/static/css/back.css">
    <link rel="stylesheet" href="../app/static/css/sharing.css">

    <!-- <link rel="stylesheet" href="../static/css/sharing.css"> -->

</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
<!--<div class="center">-->
    <div class="box">
        <h1>学生就職サポート</h1>
        <img src="../app/static/imgs/chopper.png">
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        
    <div class="center">
        <h1>共有情報</h1>
    </div>
    
    <hr size="20" color="#0000ff" noshade>
    <?php include (__DIR__ . "/../template/tmp_share.php"); ?>
    <div class="center">
        <h1>企業説明会</h1>
    </div>
    <!--<h1>企業説明会</h1>-->
    <hr size="20" color="#0000ff" noshade>

<!--</div>-->
<?php include (__DIR__ . "/../template/tmp_briefing.php"); ?>


    <!-- 企業説明会 -->
 
<!--<div class="test">-->
<!--    <img class="list_logo" src="../static/imgs/log.png">-->
<!--    <p class="name">楽天</p>-->
<!--    <p class="genre">総合</p>-->
<!--    <p class="card_edit"><a class="card" href="#">編集</a></p>-->
<!--</div>-->


</body>
<?php include ( __DIR__ . "/../template/footer.html"); ?>

</html>