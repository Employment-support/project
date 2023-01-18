<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>学生就職サポート</title>
    <?php include ( __DIR__ . "/../template/tmp_static.main.html"); ?>
    <link rel="stylesheet" href="../app/static/css/portfolio_inf.css">
 <!--   <link rel="stylesheet" href="../app/static/css/navi.css">-->
 <!--   <link rel="stylesheet" href="../app/static/css/footer.css">-->
 <!--   <link rel="stylesheet" href="../app/static/css/portfolio_inf.css">-->
	<!--<link rel="stylesheet" href="../app/static/css/butto.css">-->
	<!--<link rel="stylesheet" href="../app/static/css/back.css">-->
	<!--<link rel="stylesheet" href="../app/static/css/base.css">-->
</head>
<body>
    <?php include (__DIR__ ."/../template/navi.php"); ?>

<!-- 作成初期画面書き込み後 -->
<!-- https://shu-sait.com/css-gazou-text-yokonarabi/ -->
<h1 class="text-align-center">ポートフォリオ</h1>
<div class="wrapper-big">
	<? #データがあれば表示 ?>
	<?php if(!empty($portfolio_lists)): ?>
		<?php if($result): ?>
	
			<?php foreach ($portfolio_lists as $data): ?>
				<?php if($data['top'] == 1):?>
					<a href="<?= $data['item_url'] ?>" class="card-big">
						<div class="card-image-big">
							<!-- <img class="card-image" src="https://cdn.pixabay.com/photo/2020/03/03/20/31/boat-4899802_640.jpg"> -->
							<?php if ($data['img_path']):?>
								<img class="card-image" src="<?= $data['img_path'] ?>">
							<?php else: ?>
								<img class="card-image" src="../app/static/imgs/NoImg.png">
							<?php endif ?>
							<div class="card-url-big">
								<object>
									<a href="<?= $data['item_url'] ?>"><?= $data['item_url'] ?></a>
								</object>
							</div>
						</div>
						<div class="card-box-big">
							<h2 class="card-title-big">
								<?= $data['title'] ?>
							</h2>
							<p class="card-description-big">
								<?= $data['contents'] ?>
							</p>
							<?php if ($see):?>
								<object>
					                <a class="blue" href="/portfolio/edit?id=<?= $data['id'] ?>">編集</a>
								</object>
							<?php endif ?>
						</div>
					</a>
				<?php
					break; 
				?>
				<?php endif ?>
			<?php endforeach ?>
		<?php else: ?>
			<? #トップが無ければ作成作成カードの表示 ?>
			<?php if($see):?>
				<table>
					<tr>
						<td colspan="3">
						<a href="/portfolio/create?top=1" class="card-create">
							<div class="plus">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<line x1="12" y1="5" x2="12" y2="19"></line>
									<line x1="5" y1="12" x2="19" y2="12"></line>
								</svg>
								<p>新たに追加</p>
							</div>
						</a>
						</td>
					</tr>
				</table>
			<?php endif; ?>
		<?php endif ?>
	<?php else: ?>
	<? #トップが無ければ作成作成カードの表示 ?>
		<?php if($see):?>
			<table>
				<tr>
					<td colspan="3">
					<a href="/portfolio/create?top=1" class="card-create">
						<div class="plus">
							<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
								<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
								<line x1="12" y1="5" x2="12" y2="19"></line>
								<line x1="5" y1="12" x2="19" y2="12"></line>
							</svg>
							<p>新たに追加</p>
						</div>
					</a>
					</td>
				</tr>
			</table>
		<?php else: ?>
		<table border="1">
			<tr>
				<th>URL</th>
				<th>名前</th>
			</tr>
		<?php foreach ($user_list as $data): ?>
			<tr>
				<td>
					<a href="http://35.72.238.183:8080/portfolio?u=<?= $data['student_number'] ?>"><?= $data['student_number'] ?></a>
				</td>
				<td>
					<p><?= $data['name']?></p>
				</td>
			</tr>
		<?php endforeach; ?>
		</table>
			<!--<p>URLパラメータが正しくありません</p>-->
		<?php endif; ?>
	<?php endif; ?>
  </div>
  
  
  <!-- https://pa-tu.work/t/7104 -->
  <div class="wrapper">
	<? #データがあれば表示 ?>
	<?php if(!empty($portfolio_lists)): ?>
		<?php foreach ($portfolio_lists as $data): ?>
			<?php if($data['top'] != 1):?>
			<a href="<?= $data['item_url'] ?>" class="card">
				<!-- <img class="card-image" src="https://cdn.pixabay.com/photo/2020/03/03/20/31/boat-4899802_640.jpg"> -->
				<?php if ($data['img_path']):?>
					<img class="card-image" src="<?= $data['img_path'] ?>">
				<?php else: ?>
					<img class="card-image" src="../app/static/imgs/NoImg.png">
				<?php endif ?>
				<p class="card-url">
					<object>
						<!-- <a href="https://qiita.com/fukamiiiiinmin/items/7412b21c6df5de31cab1">url</a> -->
						<a href="<?= $data['item_url'] ?>"><?= $data['item_url'] ?></a>
					</object>
				</p>
				<div class="card-box">
					<h2 class="card-title">
						<?= $data['title'] ?>
					</h2>
					<p class="card-description">
						<?= $data['contents'] ?>
					</p>
					<?php if ($see):?>
					<object>
		                <a class="blue" href="/portfolio/edit?id=<?= $data['id'] ?>">編集</a>
					</object>
					<?php endif ?>
					<!--<p class="card-description">-->
					<!--</p>-->
				</div>
			</a>
			<?php endif ?>
		<?php endforeach ?>
	<?php endif ?>
	
	<!-- 新たに追加 -->
	<?php if($see):?>
	<a href="/portfolio/create?top=0" class="card-create">
		<div class="plus">
			<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
				<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
				<line x1="12" y1="5" x2="12" y2="19"></line>
				<line x1="5" y1="12" x2="19" y2="12"></line>
			</svg>
			<p>新たに追加</p>
		</div>
	</a>
	<?php endif ?>
	<!---->
	
</div>
    <?php include (__DIR__ ."/../template/footer.html"); ?>
</body>
</html>

