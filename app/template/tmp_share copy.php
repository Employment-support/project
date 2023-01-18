    <div class="a">
    
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
                    <!--<li class="detail"><a class="a" href="">○○学科</a></li>-->
                    <!--<li class="detail"><a class="a" href="">○○専攻</a></li>-->
                    <li class="detail"><a class="a" href=""><?= $data['department'] ?></a></li>
                    <li class="detail"><a class="a" href=""><?= $data['major'] ?></a></li>
                </ul>
                <h3><?= $data['title'] ?></h3>
                <div class="white-space-pre-wrap"><?= $data['contents'] ?></div>
                <table>
                    <!-- ファイルダウンロード -->
                    <tr>
                        <?php foreach($data['path'] as $d):?>
                            <th>
                                <?php
                                // ファイル名の取得
                                preg_match("/(?<=file.)(.*)/", $d, $match);
                                echo $match[0];
                                ?>
                            </th>
                            <td><a href="<?= $d ?>" download>ダウンロード</a></td>
                        <?php endforeach?>
                    </tr>
                </table>
                <!-- 作ったユーザだけで編集可能 -->
                <?php if ($type && $_COOKIE['user_id'] == $data['user_id']): ?>
                    <p><a href="/share/edit?id=<?= $data['id'] ?>" class="blue">編集</a></p>
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
                <a class="blue" href="/share/create">新規作成</a>
            </div>
        <?php endif ?>
    </div>