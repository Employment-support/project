<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業説明会詳細</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    
    <link rel="stylesheet" href="../app/static/css/briefing.css">
    <!--<link rel="stylesheet" href="../app/static/css/log.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/briefing.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/log.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/navi.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/footer.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/butto.css"> -->
    <!--<link rel="stylesheet" href="../app/static/css/back.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/base.css">-->
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <h3 class="text-align-center">企業説明会-詳細</h3>
    <div>
        <!-- 企業名 -->
        <div class="text-align-center">
            <h1><?= $briefing_data['corporate']?></h1>
        </div>
        <!-- 企業URL -->
        
        <div class="text-align-center">
            <p>
                <a href="<?php echo htmlspecialchars($briefing_data['corporate_url'], ENT_QUOTES, "UTF-8"); ?>" target="_blank" rel="noopener noreferrer"><?php echo htmlspecialchars($briefing_data['corporate_url'], ENT_QUOTES, "UTF-8"); ?></a>
            </p>
        </div>
        <div class="box">
        <div class="flex">
            <!-- 企業ジャンル -->
            <p><p class="flexgenre" value="">企業ジャンル</p></p>
            <p><p class="genre"><?= $briefing_data['genre']?></p></p>
        </div>
        </div>
        <!-- <p>企業情報</p> -->
        <p><p class="flexbluebox">企業情報</p></p>
        <p class="box"><?= $briefing_data['info']?></p>

        <!-- <p>説明会内容</p> -->
        <p><p class="flexbluebox">説明会内容</p></p>
        <p class="box"><?= $briefing_data['contents']?></p>
    </div>
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>
</html>