<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業説明会詳細</title>
    <link rel="stylesheet" href="../app/static/css/log.css">
    <link rel="stylesheet" href="../app/static/css/navi.css">
    <link rel="stylesheet" href="../app/static/css/footer.css">
    <link rel="stylesheet" href="../app/static/css/butto.css"> 
    <link rel="stylesheet" href="../app/static/css/back.css">
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <div>
        <!-- 企業名 -->
        <h4><?= $briefing_data['corporate']?></h4>
        <!-- 企業URL -->
        <p><?= $briefing_data['corporate_url']?></p>
        <div class="flex">
            <!-- 企業ジャンル -->
            <p class="flexblue" value="">企業ジャンル</p>
            <p><?= $briefing_data['genre']?></p>
        </div>
        <!-- <p>企業情報</p> -->
        <p class="flexblue">企業情報</p>
        <p><?= $briefing_data['info']?></p>

        <!-- <p>説明会内容</p> -->
        <p class="flexblue">説明会内容</p>
        <p><?= $briefing_data['contents']?></p>
    </div>
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>
</html>