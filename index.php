<?php

require_once 'vendor/autoload.php';

use app\controllers\AdminController;
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

$app->router->get('/dashboard' , [AdminController::class, 'dashboard']);
$app->router->post('/dashboard' , [AdminController::class, 'dashboard']);

$app->router->get('/adposts' , [AdminController::class, 'posts']);
$app->router->post('/adposts' , [AdminController::class, 'posts']);

$app->router->get('/category' , [AdminController::class, 'category']);
$app->router->post('/category' , [AdminController::class, 'category']);

$app->router->get('/tags' , [AdminController::class, 'tags']);
$app->router->post('/tags' , [AdminController::class, 'tags']);

$app->router->get('/adusers' , [AdminController::class, 'users']);
$app->router->post('/adusers' , [AdminController::class, 'users']);

$app->router->get('/category' , [SiteController::class, 'category']);
$app->router->post('/category' , [SiteController::class, 'category']);

$app->router->get('/tags' , [SiteController::class, 'tags']);
$app->router->post('/tags' , [SiteController::class, 'tags']);

/*$app->router->get('/user' , [SiteController::class, 'user']);
$app->router->post('/user' , [SiteController::class, 'user']);*/

$app->run();
