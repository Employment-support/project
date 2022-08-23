<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1>新規作成</h1>
    <form action="" method="post">
        <?php foreach ($datas as $key => $value):?>
            <label for=""><?=$value?>
                <input type="text" name="<?=$value?>" id="<?=$value?>" value="">
            </label>
        <?php endforeach;?>
        <input type="submit" value="登録">
    </form>
    <a href=<?= $_SERVER['HTTP_REFERER'] ?>>戻る</a>
</body>
</html>