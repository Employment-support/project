    
    <div class="a">
    <!--<hr>-->
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
                <div class="share-box">
                <ul class="detail">
                    <li class="detail"><?= $data['created_at'] ?></li>
                </ul>
                <ul class="detail">
                    <!--<li class="detail"><a class="a" href=""><?= $data['department'] ?></a></li>-->
                    <!--<li class="detail"><a class="a" href=""><?= $data['major'] ?></a></li>-->
                    <li class="detail"><?= $data['department'] ?></li>
                    <li class="detail"><?= $data['major'] ?></li>
                </ul>
                <h3><?= $data['title'] ?></h3>
                <details>
                <summary>詳細確認</summary>
                <div class="white-space-pre-wrap"><?= $data['contents'] ?></div>
                <!-- ファイルダウンロード -->
                    <?php foreach($data['path'] as $d):?>
                    <div class="item-list share-box">
                    <div class="ellipsis item">
                        <?php
                        // ファイル名の取得
                        preg_match("/(?<=file.)(.*)/", $d, $match);
                        echo $match[0];
                        ?>
                    </div>
                    <a class="item" href="<?= $d ?>" download>ダウンロード</a>
                    </div>
                    <?php endforeach?>
                </details>
                <!-- 作ったユーザだけで編集可能 -->
                <?php if ($type && $_COOKIE['user_id'] == $data['user_id']): ?>
                    <p><a href="/share/edit?id=<?= $data['id'] ?>" class="blue">編集</a></p>
                    <!-- <button>編集</button> -->
                <?php endif ?>
                <!--<hr>-->
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <p>データがありません</p>
        <?php endif ?>
        <!-- 新規仮 -->
        <?php if ($type):?>
            <div>
                <a class="but-color-blue" href="/share/create">新規作成</a>
            </div>
        <?php endif ?>
    </div>