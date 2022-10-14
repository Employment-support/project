<div class="pagination">
    <!-- 戻る -->
    <?php if ($page >= 2): ?>
        <a href="<?=$url?>?page=<?= ($page - 1); ?>" class="page_feed">&laquo;</a>
    <?php else : ;?>
        <span class="first_last_page">&laquo;</span>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $max_page; $i++) : ?>
        <?php if($i >= $page - $range && $i <= $page + $range) : ?>
            <?php if($i == $page) : ?>
                <span class="now_page_number"><?= $i; ?></span>
            <?php else: ?>
                <a href="?page=<?= $i; ?>" class="page_number"><?= $i; ?></a>
            <?php endif; ?>
        <?php endif; ?>
    <?php endfor; ?>

    <!-- 進む -->
    <?php if($page < $max_page) : ?>
        <a href="<?=$url?>?page=<?= ($page + 1); ?>" class="page_feed">&raquo;</a>
    <?php else : ?>
        <span class="first_last_page">&raquo;</span>
    <?php endif; ?>
</div>