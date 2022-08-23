<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        .but1{
            color: blue;
        }
        .but2{
            color: red;
        }
    </style>
</head>
<body>
    <h1>一覧</h1>
    <a href=<?=$url_portal?>>戻る</a>
    <a href="<?=$url_create?>" class="but1">追加</a>
    <?php if ($keys !=  false):?>
    <table border="1">
        <tr>
            <?php foreach ($keys as $key):?>
                <th>
                    <?= $key ?>
                </th>
            <?php endforeach;?>
        </tr>
        <?php foreach ($datas as $data):?>
        <tr>
            <?php foreach ($keys as $key):?>
                <td>
                    <?=$data[$key]?>
                </td>
            <?php endforeach; ?>
                <td>
                    <a href="<?=$url_edit?>?edit=<?=$data['id']?>" class="but1">編集</a>
                </td>
                <td>
                    <a href="<?=$url_delete?>?d=<?=$data['id']?>" class="but2">削除</a>
                    </td>
                </tr>
        <?php endforeach; ?>
    </table>
    <?php endif; ?>
</body>
</html>