<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生就職サポート</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    <link rel="stylesheet" href="../app/static/css/style.create_editp.css">
    <link rel="stylesheet" href="../app/static/css/share.css">
    <!--<link rel="stylesheet" href="../app/static/css/briefing_create.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/navi.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/footer.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/butto.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/share.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/back.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/base.css">-->


</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
<h1 class='text-align-center'>企業説明会-編集</h1>
<form action="" method="POST" enctype="multipart/form-data">
        <!--<p>日付自動</p>-->
        <p><label for="gazou">画像投稿<br><input type="file" id="gazou" name="gazou" required></label></p>
        <p><label for="idurl">企業URL<br><input type="text" style="width: 500px; height: 20px;" id="idurl" name="idurl" value="<?php echo htmlspecialchars($briefing_data["corporate_url"], ENT_QUOTES, "UTF-8"); ?>" required></label></p>
        <p><label for="Enterprise">企業名<br><input type="text"style="width: 500px; height: 20px;" id="Enterprise" name="Enterprise" value="<?php echo htmlspecialchars($briefing_data["corporate"], ENT_QUOTES, "UTF-8"); ?>" required></label></p>
        <p><label for="information">企業情報<br><textarea type="text" style="width: 500px; height: 300px;" id="information" name="information" required><?php echo htmlspecialchars($briefing_data["info"], ENT_QUOTES, "UTF-8"); ?></textarea></label></p>
        <p><label for="text">説明会内容<br><textarea type="text" style="width: 500px; height: 300px;" id="text" name="text"required><?php echo htmlspecialchars($briefing_data["contents"], ENT_QUOTES, "UTF-8"); ?></textarea></label></p>
        <p class="enterprise">
        <select name="genre" id="genre">
            <?php foreach ($corporation_lists as $corporation_list):?>
                <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
            <?php endforeach;?>
        </select>
        </p>
        <input class="but-color-blue" type="submit" value="変更">
    </form>
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>

</html>