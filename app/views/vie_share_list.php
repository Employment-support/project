<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>情報共有(学生)</title>
    <link rel="stylesheet" href="../static/css/sharing.css">
    <link rel="stylesheet" href="../static/css/navi.css">
    <link rel="stylesheet" href="../static/css/footer.css">
    <link rel="stylesheet" href="../static/css/back.css">
    <link rel="stylesheet" href="../static/css/butto.css">
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
    <!-- データがあるか判断 -->
    <?php if($is_data):?>
        <?php foreach ($disp_data_share as $data):?>
            <?php
            // ファイルがあればコンテンツに結合
            $path_data = [];
            foreach ($file_lists as $file_list) {
                if ($file_list['share_id'] == $data['id']) {
                    array_push($path_data, $file_list['file_path']);
                }
            } 
            $data = array_merge($data, array('path'=>$path_data));
            ?>
            <ul class="detail">
                <li class="detail"><?= $data['created_at'] ?></li>
                <li class="detail"><a class="a" href="">○○学科</a></li>
                <li class="detail"><a class="a" href="">○○専攻</a></li>
            </ul>
            <h3><?= $data['title'] ?></h3>
            <p><?= $data['contents'] ?></p>
            <table>
                <!-- ファイルダウンロード -->
                <tr>
                    <?php foreach($data['path'] as $d):?>
                        <th>
                            <?php
                            // ファイル名の取得
                            preg_match("/(?<=-)(.*)/", $d, $match);
                            echo $match[0];
                            ?>
                        </th>
                        <td><a href="<?= $d ?>" download>ダウンロード</a></td>
                    <?php endforeach?>
                </tr>
            </table>
            <!-- 作ったユーザだけで編集可能 -->
            <?php if ($type && $_COOKIE['user_id'] == $data['user_id']): ?>
                <p><a href=/share/edit?id=<?= $data['id'] ?> class="blue">編集</a></p>
                <!-- <button>編集</button> -->
            <?php endif ?>
            <hr>
        <?php endforeach ?>
    <?php else: ?>
        <p>データがありません</p>
    <?php endif ?>
    <!-- 新規仮 -->
    <?php if ($type):?>
        <div>
            <a href="/share/create">新規作成</a>
        </div>
    <?php endif ?>
    <!--  -->
    <?= require_once __DIR__ . "/../template/tmp_pagination.php"; ?>
    </div>
    
    <?php include (__DIR__ . "/../template/footer.html"); ?>
</body>
</html>
