<?php

declare(strict_types=1);

// require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/./vendor/autoload.php';

$router = new AltoRouter();

// $router->setBasePath('/system');

// スクリプトを直で呼び出す
// test
$router->map('GET|POST', '/phpinfo', function () {
    echo phpinfo();
});
// test
$router->map('GET|POST', '/db', function () {
    require_once __DIR__ . '/app/controller/dbtest.php';
});

// ホーム
$router->map('GET|POST', '/', function () {
    // require_once __DIR__ . '/controller/con_home.php';
    require_once __DIR__ . '/app/controller/con_home.php';
});

// ログイン
$router->map('GET|POST', '/login', function () {
    // require_once __DIR__ . '/controller/con_login.php';
    require_once __DIR__ . '/app/controller/con_login.php';
});

// ログアウト
$router->map('GET|POST', '/logout', function () {
    // require_once __DIR__ . '/controller/con_out.php';
    require_once __DIR__ . '/app/controller/con_out.php';
});

// ポートフォリオ　一覧
$router->map('GET|POST', '/portfolio', function () {
    // require_once __DIR__ . '/controller/con_portfolio_list.php';
    require_once __DIR__ . '/app/controller/con_portfolio_list.php';
});

// ポートフォリオ　作成
$router->map('GET|POST', '/portfolio/create', function () {
    // require_once __DIR__ . '/controller/con_portfolio_create.php';
    require_once __DIR__ . '/app/controller/con_portfolio_create.php';
});

// ポートフォリオ　編集
$router->map('GET|POST', '/portfolio/edit', function () {
    // require_once __DIR__ . '/controller/con_portfolio_edit.php';
    require_once __DIR__ . '/app/controller/con_portfolio_edit.php';
});


// 企業説明会まとめ　一覧
$router->map('GET|POST', '/briefing', function () {
    // require_once __DIR__ . '/controller/con_briefing_list.php';
    require_once __DIR__ . '/app/controller/con_briefing_list.php';
});

// 企業説明会まとめ　詳細
$router->map('GET|POST', '/briefing/inf', function () {
    // require_once __DIR__ . '/controller/con_briefing_inf.php';
    require_once __DIR__ . '/app/controller/con_briefing_inf.php';
});

// 企業説明会まとめ　新規作成
$router->map('GET|POST', '/briefing/create', function () {
    // require_once __DIR__ . '/controller/con_briefing_create.php';
    require_once __DIR__ . '/app/controller/con_briefing_create.php';
});

// 企業説明会まとめ　編集
$router->map('GET|POST', '/briefing/edit', function () {
    // require_once __DIR__ . '/controller/con_briefing_edit.php';
    require_once __DIR__ . '/app/controller/con_briefing_edit.php';
});

// 企業説明会まとめ　削除
$router->map('GET|POST', '/briefing/delete', function () {
    // require_once __DIR__ . '/controller/';
    // require_once __DIR__ . '/app/controller/';
});


// 共有情報
$router->map('GET|POST', '/share', function () {
    // require_once __DIR__ . '/controller/con_share_list.php';
    require_once __DIR__ . '/app/controller/con_share_list.php';
});

// 共有情報　新規作成
$router->map('GET|POST', '/share/create', function () {
    // require_once __DIR__ . '/controller/con_share_create.php';
    require_once __DIR__ . '/app/controller/con_share_create.php';
});

// 共有情報　編集
$router->map('GET|POST', '/share/edit', function () {
    // require_once __DIR__ . '/controller/con_share_edit.php';
    require_once __DIR__ . '/app/controller/con_share_edit.php';
});

// 共有情報　削除
$router->map('GET|POST', '/share/delete', function () {
    // require_once __DIR__ . '/controller/';
    // require_once __DIR__ . '/app/controller/';
});


// 履歴書
$router->map('GET|POST', '/resume', function () {
    // global $router;
    // echo $router->generate('bootstrapcss');
    // require_once __DIR__ . '/controller/con_resume.php';
    require_once __DIR__ . '/app/controller/con_resume.php';
});

// ユーザ作成
$router->map('GET|POST', '/admin/sigin', function () {
    // global $router;
    // echo $router->generate('bootstrapcss');
    // require_once __DIR__ . '/controller/admin/con_signIn.php';
    require_once __DIR__ . '/app/controller/admin/con_signIn.php';
});

$router->map('GET|POST', '/s3test', function () {
    // global $router;
    // echo $router->generate('bootstrapcss');
    // require_once __DIR__ . '/controller/admin/con_signIn.php';
    require_once __DIR__ . '/app/controller/s3test.php';
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