<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>企業説明会　担任書き込み</title>
    <link rel="stylesheet" href="../app/static/css/briefing_create.css">
    <link rel="stylesheet" href="../app/static/css/navi.css">
    <link rel="stylesheet" href="../app/static/css/footer.css">
    <link rel="stylesheet" href="../app/static/css/butto.css">
    <link rel="stylesheet" href="../app/static/css/share.css">
    <link rel="stylesheet" href="../app/static/css/back.css">



</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>

<form action="" method="POST" enctype="multipart/form-data">
        <p>日付自動</p>
        <p><label for="gazou">画像投稿<br><input type="file" id="gazou" name="gazou" required></label></p>
        <p><label for="idurl">企業URL<br><input type="text" style="width: 500px; height: 20px;" id="idurl" name="idurl" required></label></p>
        <p><label for="Enterprise">企業名<br><input type="text"style="width: 500px; height: 20px;" id="Enterprise" name="Enterprise" required></label></p>
        <p><label for="text">説明会内容<br><textarea type="text" style="width: 500px; height: 300px;" id="text" name="text" required></textarea></label></p>
        <p><label for="information">企業情報<br><textarea type="text" style="width: 500px; height: 300px;" id="information" name="information" required></textarea></label></p>
        <p class="enterprise">
        <select name="genre" id="genre">
            <?php foreach ($corporation_lists as $corporation_list):?>
                <option value="<?=$corporation_list['id']?>"><?=$corporation_list['genre']?></option>
            <?php endforeach;?>
        </select>
        </p>
        <input class="blue" type="submit" value="投稿">
    </form>
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>

</html>