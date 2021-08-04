<?php

require_once 'vendor/autoload.php';

use zum\phpmvc\Application;
use \app\controllers\SiteController;
use \app\controllers\AuthController;


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'userClass' => \app\models\user::class,
    'db'=>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];



$app = new Application(__DIR__, $config);

$app->router->get('/' , [SiteController::class, 'home']);
$app->router->get('/home' , [SiteController::class, 'home']);
$app->router->post('/home' , [SiteController::class, 'home']);

$app->router->get('/contact' ,[SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/posts' ,[SiteController::class, 'posts']);
$app->router->post('/posts', [SiteController::class, 'posts']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/dashboard' , [SiteController::class, 'dashboard']);
$app->router->post('/dashboard' , [SiteController::class, 'dashboard']);

/*$app->router->get('/posts' , [SiteController::class, 'posts']);
$app->router->post('/posts' , [SiteController::class, 'posts']);*/

$app->router->get('/post' , [SiteController::class, 'post']);
$app->router->post('/post' , [SiteController::class, 'post']);

$app->router->get('/category' , [SiteController::class, 'category']);
$app->router->post('/category' , [SiteController::class, 'category']);

$app->router->get('/tags' , [SiteController::class, 'tags']);
$app->router->post('/tags' , [SiteController::class, 'tags']);

$app->router->get('/users' , [SiteController::class, 'users']);
$app->router->post('/users' , [SiteController::class, 'users']);

$app->router->get('/user' , [SiteController::class, 'user']);
$app->router->post('/user' , [SiteController::class, 'user']);

$app->run();
