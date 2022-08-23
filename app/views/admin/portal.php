<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ページ</title>
</head>
<body>
    <ul>
        <?php foreach ($datas as $data): ?>
            <li><a href=<?=$data['url']?>><?=$data['item']?></a></li>
        <?php endforeach;?>
    </ul>
    
</body>
</html>