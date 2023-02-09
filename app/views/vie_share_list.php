<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生就職サポート</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    <link rel="stylesheet" href="../app/static/css/share.css">
    <link rel="stylesheet" href="../app/static/css/pagination.css">
    <!--<link rel="stylesheet" href="../app/static/css/sharing.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/navi.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/footer.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/back.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/butto.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/pagination.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/base.css">-->
    <!-- <style type="text/css">
        body {
            font-family:"MS Pゴシック",sans-serif;
            }
    </style> -->
</head>
<body>
    <?php include (__DIR__ . "/../template/navi.php"); ?>
    <h1 class="text-align-center">共有情報</h1>
    <div class="tte" style="margin: 0 auto; width: 100%; max-width: 50%;">
        <!-- 専攻コンボックス -->
        <select name="genre" id="genre" style="border-radius: 10px; padding: 1%">
            <option value="0">選択してください</option>
            <?php foreach ($major_lists as $major_list):?>
            <option value="<?=$major_list['id']?>"><?=$major_list['major']?></option>
            <?php endforeach;?>
        </select>
    </div>
    <?php include (__DIR__ . "/../template/tmp_share.php"); ?>

    <?php require_once __DIR__ . "/../template/tmp_pagination.php"; ?>
    
    <?php include (__DIR__ . "/../template/footer.html"); ?>
</body>
</html>
