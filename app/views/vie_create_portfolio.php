<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/share.css">
    <link rel="stylesheet" href="../static/css/navi.css">
    <link rel="stylesheet" href="../static/css/footer.css"> 
    <title>ポートフォリオ
    </title>
</head>
<body>
    <?php include ("../template/navi.html"); ?>

    <p><label for="gazou">画像投稿<br><input type="file" id="url" required></label></p>
    <p><label for="url">URL<br><input type="text" style="width: 500px; height: 20px;" id="url" required></label></p>
    <p><label for="title">タイトル<br><input type="text" style="width: 500px; height: 20px;" id="title" required></label></p>
    <p><label for="text">文章<br><input type="text" style="width: 500px; height: 600px;" id="text" required></label></p>
    <input type="submit" value="投稿">
    <?php include ("../template/footer.html"); ?>

</body>
</html>