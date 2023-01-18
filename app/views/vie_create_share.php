<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生就職サポート</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    <link rel="stylesheet" href="../app/static/css/style.create_editp.css">
    <!--<link rel="stylesheet" href="../app/static/css/log.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/log.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/navi.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/footer.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/butto.css">-->
    <!--<link rel="stylesheet" href="../app/static/css/base.css">-->
</head>
<body>
<?php include (__DIR__ . "/../template/navi.php"); ?>
    <h1 class="text-align-center">共有情報-作成</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <!--<p><label for="title">タイトル<br><input type="text" style="width: 500px; height: 20px;" id="title" name="title" required></label></p>-->
        <p><label for="title">タイトル<br><input type="text" id="title" name="title" required></label></p>
        <!--<p><label for="text">内容<br><input type="text" style="width: 500px; height: 100px;" id="text" name="text" required></label></p>-->
        <p><label for="text">内容<br><textarea rows="10" id="text" name="text" required></textarea></label></p>
        <input type="file" id="file" name="file[]" multiple><br>
        <!-- 学科 -->
        <select name="department" id="department">
            <?php foreach ($department_lists as $department_list):?>
                <option value="<?=$department_list['id']?>"><?=$department_list['department']?></option>
            <?php endforeach;?>
            </select>
            <!-- 専攻 -->
        <select name="major" id="major">
            <?php foreach ($major_lists as $major_list):?>
                <option value="<?=$major_list['id']?>"><?=$major_list['major']?></option>
            <?php endforeach;?>
        </select>
        <br>
        <input class='but-color-blue' type="submit" value="投稿">
    </form>
    <?php include ( __DIR__ . "/../template/footer.html"); ?>
</body>
</html>