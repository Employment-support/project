<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>情報共有(学生)</title>
    <link rel="stylesheet" href="../app/static/css/sharing.css">
    <link rel="stylesheet" href="../app/static/css/navi.css">
    <link rel="stylesheet" href="../app/static/css/footer.css">
    <link rel="stylesheet" href="../app/static/css/back.css">
    <link rel="stylesheet" href="../app/static/css/butto.css">

</head>
<body>
    <?php include (__DIR__ . "/../template/navi.php"); ?>
    <!-- 専攻コンボックス -->
    <div class="tte">
    <select name="genre" id="genre">
        <?php foreach ($major_lists as $major_list):?>
        <option value="<?=$major_list['id']?>"><?=$major_list['major']?></option>
        <?php endforeach;?>
    </select>
    <hr>
    <?php include (__DIR__ . "/../template/tmp_share.php"); ?>
    <?= require_once __DIR__ . "/../template/tmp_pagination.php"; ?>
    </div>
    
    <?php include (__DIR__ . "/../template/footer.html"); ?>
</body>
</html>
