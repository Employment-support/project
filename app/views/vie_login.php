<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/log.css">
    <link rel="stylesheet" href="../static/css/navi.css">
    <link rel="stylesheet" href="../static/css/footer.css">
    <link rel="stylesheet" href="../static/css/butto.css"> 



    <title>ログイン</title>
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <div class="form">
        <h3 clss="form-title">ログイン</h3>
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
            <input class="yellow" type="submit" value="ログイン">


        </form>
        
    </div>
    <div class="url">
        <a href="リンク先のＵＲＬ" target="_blank">アカウントをお持ちではない方</a>
    </div>
    
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>
</html>