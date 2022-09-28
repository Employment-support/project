<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/navi.css">
    <link rel="stylesheet" href="../static/css/footer.css"> 
    <link rel="stylesheet" href="../static/css/share.css">
    <link rel="stylesheet" href="../static/css/butto.css"> 

    <title>ポートフォリオ
    </title>
</head>
<body>
    <?php include (__DIR__ ."/../template/navi.php"); ?>

    <form action="" method="POST" enctype="multipart/form-data">

        <p><label for="image">画像投稿<br><input type="file" id="image" name="image" required></label></p>
        <p><label for="url">URL<br><input type="text" style="width: 500px; height: 20px;" id="url" name="url" required></label></p>
        <p><label for="title">タイトル<br><input type="text" style="width: 500px; height: 20px;" id="title" name="title" required></label></p>
        <p><label for="text">文章<br><input type="text" style="width: 500px; height: 600px;" id="text" name="text" required></label></p>
        <input class="blue" type="submit" value="投稿">
    </form>
    <?php include (__DIR__ ."/../template/footer.html"); ?>
</body>
</html>