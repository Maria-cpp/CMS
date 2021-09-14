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

$app->router->get('/post' ,[SiteController::class, 'post']);
$app->router->post('/post', [SiteController::class, 'post']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

$app->router->get('/profile', [AuthController::class, 'profile']);
$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/admin/dashboard' , [AdminController::class, 'dashboard']);
$app->router->post('/admin/dashboard' , [AdminController::class, 'dashboard']);

$app->router->get('/admin/posts' , [AdminController::class, 'posts']);
$app->router->post('/admin/posts' , [AdminController::class, 'posts']);

$app->router->get('/admin/post' , [AdminController::class, 'post']);
$app->router->post('/admin/post' , [AdminController::class, 'post']);

$app->router->get('/admin/editpost' , [AdminController::class, 'edit']);
$app->router->post('/admin/editpost' , [AdminController::class, 'edit']);

$app->router->get('/admin/delete' , [AdminController::class, 'delete']);
$app->router->get('/admin/update' , [AdminController::class, 'update']);

$app->router->get('/admin/createuser' , [AdminController::class, 'createuser']);
$app->router->post('/admin/createuser' , [AdminController::class, 'createuser']);

$app->router->get('/admin/edituser' , [AdminController::class, 'edituser']);
$app->router->post('/admin/edituser' , [AdminController::class, 'edituser']);

$app->router->get('/category' , [SiteController::class, 'category']);
$app->router->post('/category' , [SiteController::class, 'category']);

$app->router->get('/tags' , [AdminController::class, 'tags']);
$app->router->post('/tags' , [AdminController::class, 'tags']);

$app->router->get('/admin/users' , [AdminController::class, 'users']);
$app->router->post('/admin/users' , [AdminController::class, 'users']);

$app->router->get('/admin/user' , [AdminController::class, 'user']);
$app->router->post('/admin/user' , [AdminController::class, 'user']);

$app->router->get('/admin/category' , [AdminController::class, 'category']);
$app->router->post('/admin/category' , [AdminController::class, 'category']);

$app->router->get('/tags' , [SiteController::class, 'tags']);
$app->router->post('/tags' , [SiteController::class, 'tags']);

/*$app->router->get('/user' , [SiteController::class, 'user']);
$app->router->post('/user' , [SiteController::class, 'user']);*/

$app->run();
