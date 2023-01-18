<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    <link rel="stylesheet" href="../app/static/css/style.create_editp.css">
    <link rel="stylesheet" href="../app/static/css/log.css">
    <!--<link rel="stylesheet" href="../app/static/css/navi.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/footer.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/butto.css"> -->
    <!--<link rel="stylesheet" href="../app/static/css/back.css">-->
    <title>学生就職サポート</title>
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <div class="form">
        <h3 clss="form-title">ログイン</h3>
        <?php if(!empty($errors)): ?>
            <?php foreach($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        <?php endif ?>
        <form action="" method="post">
            <div class="email">
                <input type="number" id="num" name="num" placeholder="ID" autofocus required><br>
            </div>
            <div>
                <input type="password" id="pass" name="pass" placeholder="パスワード" required><br>
            </div>
            <p class="check">
                <input type="checkbox" name="checkbox" />ログイン状態を保存する
            </p>
            <input class="but-color-yellow" type="submit" value="ログイン">


        </form>
        
    </div>
    <div class="url">
        <a href="リンク先のＵＲＬ" target="_blank">アカウントをお持ちではない方</a>
    </div>
    
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>
</html>