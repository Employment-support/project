<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業説明会</title><!-- 変える -->
    <link rel="stylesheet" href="../app/static/css/tmp_briefing_list.css">
    <link rel="stylesheet" href="../app/static/css/navi.css">
    <link rel="stylesheet" href="../app/static/css/footer.css">
    <link rel="stylesheet" href="../app/static/css/butto.css">
    <link rel="stylesheet" href="../app/static/css/back.css">
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <div class="view_space">
        <select name="genre" id="genre" class="industry_narrowing">
            <?php foreach ($corporation_lists as $corporation_list):?>
            <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
            <?php endforeach;?>
        </select>
        <div class="enterprise">
            <!-- 企業カード表示 -->
    
            <!-- ↓↓ testdata ↓↓ -->
            <!-- 楽天のロゴ画像　不要になったら消してください -->
<!-- 
            <div class="test">
                    <img class="list_logo" src="../static/imge/log.png">
                    <p class="name">楽天</p>
                    <p class="genre">総合</p>
                    <p class="card_edit"><a class="card" href="#">編集</a></p>
            </div>            -->
            <? #企業説明会表示 ?>
            <?= require_once __DIR__ . "/../template/tmp_briefing.php"; ?>

            <!-- ↑↑ testdata ↑↑ -->
    
        </div>

        <div class="page_button">
            <!-- <a class="before_1" href="#"></a> -->
            <!-- <a class="page_num" href="#">1</a>  --><!-- ページ数 -->            
            <!-- <a class="after_1" href="#"></a> -->
            <?php require_once __DIR__ . "/../template/tmp_pagination.php";?>
        </div>
        
        <?php if ($type): ?>
            <div class="post_button_space">
                <a class="post_button" href="/briefing/create">投稿</a>
            </div>
        <?php endif; ?>
    </div>
<!--<?php include ( __DIR__ . "/../template/footer.html"); ?>-->
</body>
</html>