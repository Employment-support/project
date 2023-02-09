<!-- <nav>
	<ul>
		<li><a href="#" class="logo">OCA学生就職サポート</a></li>
		<li><a href="#">共有情報</a></li>
		<li><a href="#">企業説明</a></li>
		<li><a href="vie_create.rirekisyo.html">履歴書作成</a></li>
		<li><a href="vie_create_portfolio.html">ポートフォリオ作成</a></li>
		<li><a href="vie_login.html" class="contact">ログイン</a></li>
	</ul>
</nav> -->

<nav>
	<ul>
		<li class="left"><a href="/" class="logo">OCA学生就職サポート</a></li>
		<li><a class="link" href="/share">共有情報</a></li>
		<li><a class="link" href="/briefing">企業説明</a></li>
		<li><a class="link" href="/resume">履歴書作成</a></li>
		<li><a class="link" href="/portfolio">ポートフォリオ作成</a></li>
		<? #ログインしたらログアウトに ?>
		<?php if(!isset($_COOKIE['user_id'])): ?>
			<li class="right">
				<a href="/login" class="but-color-blue">ログイン</a>
			</li>
		<?php else: ?>
				
			<li class="right">
				<span><?= $_COOKIE['user_id'] ?></span>
				<a href="/logout" class="but-color-blue">ログアウト</a>
			</li>
		<?php endif ?>
	</ul>
	<hr>
</nav>