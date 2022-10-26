<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../static/css/navi.css">
    <link rel="stylesheet" href="../static/css/footer.css">
    <link rel="stylesheet" href="../static/css/portfolio_inf.css">
	<link rel="stylesheet" href="../static/css/butto.css">
	<link rel="stylesheet" href="../static/css/back.css">
    <title>学生画面　ポートフォリオ初期画面</title>
</head>
<body>
    <?php include (__DIR__ ."/../template/navi.php"); ?>

<!-- 作成初期画面書き込み後 -->
<!-- https://shu-sait.com/css-gazou-text-yokonarabi/ -->

<div class="wrapper-big">
	<? #データがあれば表示 ?>
	<?php if(!empty($portfolio_lists)): ?>
		<?php foreach ($portfolio_lists as $data): ?>
			<?php if($data['top'] == 1):?>
				<a href="#" class="card-big">
					<div class="card-image-big">
						<!-- <img class="card-image" src="https://cdn.pixabay.com/photo/2020/03/03/20/31/boat-4899802_640.jpg"> -->
						<?php if ($data['img_path']):?>
							<img class="card-image" src="<?= $data['img_path'] ?>">
						<?php else: ?>
							<img class="card-image" src="../static/imgs/NoImg.png">
						<?php endif ?>
						<div class="card-url-big">
							<object>
								<a href="https://qiita.com/fukamiiiiinmin/items/7412b21c6df5de31cab1">url</a>
							</object>
						</div>
					</div>
					<div class="card-box-big">
						<h2 class="card-title-big">
							カードタイトル
						</h2>
						<p class="card-description-big">
							ここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入るここに内容が入る
						</p>
					</div>
				</a>
			<?php
				$display = TRUE;
				break; 
			?>
			<?php endif ?>
		<?php endforeach ?>
		<? #トップが無ければ作成作成カードの表示 ?>
		<?php if(!$display && $see):?>
		<table>
			<tr>
				<td colspan="3">
				<a href="/portfolio/create" class="card-create">
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
			<!-- <tr>
				<td class="td33">
				<a href="/portfolio/create" class="card-create">
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
				<td class="td33"></td>
				<td class="td33"></td>
			</tr> -->
			</table>
		<?php endif ?>
	<?php endif ?>
  </div>
  
  <!-- https://pa-tu.work/t/7104 -->
  <div class="wrapper">
	<? #データがあれば表示 ?>
	<?php if(!empty($portfolio_lists)): ?>
		<?php foreach ($portfolio_lists as $data): ?>
		<a href="#" class="card">
			<!-- <img class="card-image" src="https://cdn.pixabay.com/photo/2020/03/03/20/31/boat-4899802_640.jpg"> -->
			<?php if ($data['img_path']):?>
				<img class="card-image" src="<?= $data['img_path'] ?>">
			<?php else: ?>
				<img class="card-image" src="../static/imgs/NoImg.png">
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
			</div>
		</a>
		<?php endforeach ?>
	<?php endif ?>
	
	<?php if($see):?>
	<a href="/portfolio/create" class="card-create">
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
	
	
</div>
    <?php include (__DIR__ ."/../template/footer.html"); ?>
</body>
</html>

