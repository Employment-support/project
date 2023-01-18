<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生就職サポート</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    
    <link rel="stylesheet" href="../app/static/css/briefing_list.css">
    <link rel="stylesheet" href="../app/static/css/share.css">
    <link rel="stylesheet" href="../app/static/css/home.css">

</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
<!--<div class="center">-->

    <div class="box">
        <div class="moji">
            <span class="sapo">学生就職<br>サポート</span>
            <p>就活を丁寧且つ効率的に支援</p>
        </div>
        <div class="gazo">
            <img src="../app/static/imgs/syukatsu_shigoto_sagashi.png">

        </div>
    </div>

    <form action="" method="POST" enctype="multipart/form-data">

    <hr size="20" color="#0000ff" noshade>
    <div class="center">
        <h1>共有情報</h1>
    </div>
    <?php include (__DIR__ . "/../template/tmp_share.php"); ?>

    <!--<h1>企業説明会</h1>-->

    <hr size="20" color="#0000ff" noshade>
    <div class="center">
        <h1>企業説明会</h1>
    </div>
<!--</div>-->
<?php //include (__DIR__ . "/../template/tmp_briefing.php"); ?>
<?php foreach ($corporation_lists as $corporation_list):?>
<div id="flex-container">
  <div class="flex-item" id="flex"><h2><?php echo htmlspecialchars($corporation_list['genre'], ENT_QUOTES, "UTF-8"); ?></h2></div>
  <div class="raw-item" id="raw"><a href="/briefing">さらに表示</a></div>
</div>
<div class="enterprise">
    <?php foreach ($disp_data_briefing as $data):?>
    <?php if ($corporation_list['genre'] == $data['genre']):?>
    <div class="test">
        <a href="/briefing/inf?id=<?= $data['id'] ?>" class="text-color">
            <? #仮画像 ?>
			 <?php if ($data['img_path']):?>
				<img class="card-image" src="<?= $data['img_path'] ?>">
            <?php else: ?>
				<!--<img class="card-image" src="../app/static/imgs/log_noimg.png">-->
				<img class="card-image" src="../app/static/imgs/log_noimg.png">
				<!--<img class="card-image" src="../app/static/imgs/logo/1.png">-->
			<?php endif ?>
            <p class="name"><?= $data['corporate'] ?></p>
            <p class="genre"><?= $data['genre'] ?></p>
            <? #担任または管理者かつidがbriefingsに登録されているユーザidと等しいか ?>
            <?php if ($type && $_COOKIE['user_id'] == $data['user_id']): ?>
                <p class="card_edit">
                    <!--<a class="card" href="/briefing/edit?id=<?= $data['id'] ?>">編集</a>-->
                    <a class="but-color-blue" href="/briefing/edit?id=<?= $data['id'] ?>">編集</a>
                </p>
            <?php endif; ?>
        </a>
    </div>
    <?php endif; ?>
    <?php endforeach; ?>
    <!--<div class="test">-->
    <!--    <img class="list_logo" src="../app/static/imgs/log.png">-->
    <!--    <p class="name">楽天</p>-->
    <!--    <p class="genre">総合</p>-->
    <!--    <p class="card_edit"><a class="card" href="#">編集</a></p>  -->
    <!--</div>-->
    <!--<div class="test">-->
    <!--    <img class="list_logo" src="../app/static/imgs/log.png">-->
    <!--    <p class="name">楽天</p>-->
    <!--    <p class="genre">総合</p>-->
    <!--    <p class="card_edit"><a class="card" href="#">編集</a></p>-->
    <!--</div>-->
    <!--<div class="test">-->
    <!--    <img class="list_logo" src="../app/static/imgs/log.png">-->
    <!--    <p class="name">楽天</p>-->
    <!--    <p class="genre">総合</p>-->
    <!--    <p class="card_edit"><a class="card" href="#">編集</a></p>-->
    <!--</div>-->
    <!--<div class="test">-->
    <!--    <img class="list_logo" src="../app/static/imgs/log.png">-->
    <!--    <p class="name">楽天</p>-->
    <!--    <p class="genre">総合</p>-->
    <!--    <p class="card_edit"><a class="card" href="#">編集</a></p>-->
    <!--</div>-->
</div>
<?php endforeach;?>
</body>
<?php include ( __DIR__ . "/../template/footer.html"); ?>

</html>