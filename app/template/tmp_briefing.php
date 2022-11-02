<? #企業説明会表示 ?>
<?php foreach ($disp_data_briefing as $data):?>
    <div class="test">
        <a href="/briefing/inf?id=<?= $data['id'] ?>" class="text-color">
            <? #仮画像 ?>
            <!--<img class="list_logo" src="../app/static/imgs/log.png">-->
            <!-- <img class="list_logo" src="<?= $data['img_path']?>"> -->
			 <?php if ($data['img_path']):?>
				<img class="card-image" src="<?= $data['img_path'] ?>">
            <?php else: ?>
				<img class="card-image" src="../app/static/imgs/log_noimg.png">
			<?php endif ?> -->
            <p class="name"><?= $data['corporate'] ?></p>
            <p class="genre"><?= $data['genre'] ?></p>
            <? #担任または管理者かつidがbriefingsに登録されているユーザidと等しいか ?>
            <?php if ($type && $_COOKIE['user_id'] == $data['user_id']): ?>
                <p class="card_edit">
                    <a class="card" href="/briefing/edit?id=<?= $data['id'] ?>">編集</a>
                </p>
            <?php endif; ?>
        </a>
    </div>           
<?php endforeach; ?>