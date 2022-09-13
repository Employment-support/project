<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$router = new AltoRouter();

// $router->setBasePath('/システムエンジニアリング');

// スクリプトを直で呼び出す
// ホーム
$router->map('GET|POST', '/', function () {
    require_once __DIR__ . '/controller/con_home.php';
});

// ログイン
$router->map('GET|POST', '/login', function () {
    require_once __DIR__ . '/controller/con_login.php';
});

// ログアウト
$router->map('GET|POST', '/logout', function () {
    require_once __DIR__ . '/controller/con_out.php';
});

// ポートフォリオ
$router->map('GET|POST', '/portfolio', function () {
    require_once __DIR__ . '/controller/';
});

// 企業説明会まとめ　一覧
$router->map('GET|POST', '/briefing', function () {
    require_once __DIR__ . '/controller/con_briefing_list.php';
});

// 企業説明会まとめ　新規作成
$router->map('GET|POST', '/briefing/create', function () {
    require_once __DIR__ . '/controller/con_briefing_create.php';
});

// 企業説明会まとめ　編集
$router->map('GET|POST', '/briefing/edit', function () {
    require_once __DIR__ . '/controller/con_briefing_edit.php';
});

// 企業説明会まとめ　削除
$router->map('GET|POST', '/briefing/inf', function () {
    require_once __DIR__ . '/controller/con_briefing_inf.php';
});

// 共有情報
$router->map('GET|POST', '/briefing', function () {
    require_once __DIR__ . '/controller/';
});

// 履歴書
$router->map('GET','../static/css/','resume.css','bootstrapcss');

$router->map('GET|POST', '/resume', function () {
    // global $router;
    // echo $router->generate('bootstrapcss');
    require_once __DIR__ . '/controller/con_resume.php';
});


// $router->map('GET','..\static\css\log.css','..\static\css\log.css','bootstrapcss');


$match = $router->match();

// print_r($router);


if( is_array($match) && is_callable( $match['target'] ) ) {
    // var_dump(is_callable($match['target']));
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}