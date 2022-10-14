<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業説明会詳細</title>
    <link rel="stylesheet" href="../static/css/log.css">
    <link rel="stylesheet" href="../static/css/navi.css">
    <link rel="stylesheet" href="../static/css/footer.css">
    <link rel="stylesheet" href="../static/css/butto.css"> 
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <form action="" method="post">

        <h4>企業名</h4>
        <p>企業名URL</p>
        <div class="flex">
        <p class="flexblue" value="">企業ジャンル</p>
        <p>ジャンル名</p>
        </div>
        <!-- <p>企業情報</p> -->
        <p class="flexblue">企業情報</p>
        <p>ここに文章が入る</p>

        <!-- <p>説明会内容</p> -->
        <p class="flexblue">説明会内容</p>
        <p>ここに文章が入る</p>
    </form>
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>
</html>