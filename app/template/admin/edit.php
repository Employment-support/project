<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1>編集</h1>
    <form action="" method="post">
        <?php foreach ($datas as $key => $value):?>
            <label for="<?=$key?>"><?=$key?>
                <input type="text" name="<?=$key?>" id="<?=$key?>" value="<?=$value?>">
            </label>
        <?php endforeach;?>
        <input type="submit" value="保存">
    </form>
    <a href=<?= $_SERVER['HTTP_REFERER'] ?>>戻る</a>
</body>
</html>