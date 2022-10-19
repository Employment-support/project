<?php
include_once __DIR__ . "\..\models\model.php";
include_once __DIR__ . "\..\models\masters.php";
include_once __DIR__ . "\..\models\user.php";
include_once __DIR__ . "/function.php";
print_r($_COOKIE); // テスト用
echo $_COOKIE['user_id']; // テスト用
echo $_COOKIE['user_name']; // テスト用
echo $_COOKIE['user_name_hiragana']; // テスト用
echo $_COOKIE['user_number']; // テスト用
echo $_COOKIE['user_admin']; // テスト用
echo $_COOKIE['user_gender']; // テスト用
echo $_COOKIE['user_type_id']; // テスト用
echo $_COOKIE['user_type']; // テスト用
echo $_COOKIE['user_department_id']; // テスト用
echo $_COOKIE['user_department']; // テスト用
echo $_COOKIE['user_major_id']; // テスト用
echo $_COOKIE['user_major']; // テスト用

// vies側で学生/担任で表示される内容の変更
$type = is_editor();

$user = new User();
$briefings = new Briefings(); // 企業説明会
$shares = new Shares();
$majors = new Majors(); // 専攻
$files = new DB();
$corporations = new Corporations(); // 企業ジャンル

// 共有情報処理
$major_lists = $majors->selectAll($majors::sqlSelectAll);
$file_lists = $files->selectAll('SELECT * FROM files');

// 
$sql = $shares::sqlSelectAll . ' ORDER by update_at desc LIMIT 1, 5';
$shares_lists = $shares->selectAll($sql);

// データがあるか判断
if (!empty($shares_lists)) {
    $is_data = true;
} else {
    $is_data = false;
}

// 企業説明会 
// 企業ジャンルごとに撮ってくるデータの数を絞る
// 分類コンボックス
$corporation_lists = $corporations->selectAll($corporations::sqlSelectAll);

// 企業データ
$sql = $briefings::sqlSelectAll. ' INNER JOIN corporations ON briefings.corporation_id = corporations.id ORDER by update_at desc';
$briefing_lists = $briefings->selectAll($sql);


// test
echo "<p><a href=/briefing>". '企業説明会' . "</a></p>";
echo "<p><a href=/share>". '共有情報' . "</a></p>";
echo "<p><a href=/resume>". '履歴書' . "</a></p>";
echo "<p><a href=/portfolio>". 'ポートフォリオ' . "</a></p>";

require_once __DIR__ . "/../views/home.php";
/* 共有情報
<!-- データがあるか判断 -->
<?php if($is_data):?>
    <?php foreach ($shares_lists as $data):?>
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
            <p><a href=/share/edit?id=<?= $data['id'] ?>>edit_url</a></p>
            <button>編集</button>
        <?php endif ?>
        <hr>
    <?php endforeach ?>
<?php else: ?>
    <p>データがありません</p>
<?php endif ?>
*/