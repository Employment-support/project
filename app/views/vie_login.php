<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/log.css">
    <link rel="stylesheet" href="../static/css/navi.css">


    <title>ログイン</title>
</head>
<body>
<?php include ("../template/navi.html"); ?>
    <div class="form">
        <p clss="form-title">ログイン</p>
        <form action="post">
            <div class="email">
                <input type="email" placeholder="メールアドレス" required><br>
            </div>
            <div>
                <input type="password" placeholder="パスワード" required><br>
            </div>
            <p class="check">
                <input type="checkbox" name="checkbox" />ログイン状態を保存する
            </p>
            <div class="sub">
                <input type="submit" value="ログイン">
            </div>

        </form>
        
    </div>
    <div class="url">
        <a href="リンク先のＵＲＬ" target="_blank">アカウントをお持ちではない方</a>
    </div>
</body>
</html>

