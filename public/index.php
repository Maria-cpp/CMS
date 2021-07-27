<?php

require_once '../vendor/autoload.php';

use app\controllers\AdminController;
use zum\phpmvc\Application;
use \app\controllers\SiteController;
use \app\controllers\AuthController;

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'userClass' => \app\models\User::class,
    'adminClass' => \app\models\Admin::class,
    'db'=>[
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];



$app = new Application(dirname(__DIR__), $config);
$app->router->get('/' , [SiteController::class, 'home']);

$app->router->get('/post' ,[SiteController::class, 'post']);
$app->router->post('/post', [SiteController::class, 'post']);

$app->router->get('/contact' ,[SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/admin_dashboard' , [AdminController::class, 'dashboard']);


$app->router->get('/admin_login', [AdminController::class, 'login']);
$app->router->post('/admin_login', [AdminController::class, 'login']);

$app->router->get('/admin_dashboard' ,[AdminController::class, 'admin']);
$app->router->post('/admin_dashboard', [AdminController::class, 'admin']);


$app->router->get('/profile', [AdminController::class, 'profile']);
$app->router->get('/logout', [AdminController::class, 'logout']);

$app->run();
