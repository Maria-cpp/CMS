<?php
use app\models\Post;
use app\models\user;
use zum\phpmvc\Application;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = new Post();
    if($post->deleteOne(['id'=>$id], Application::$app->db)){
        Application::$app->controller->render('posts');
    }
}
else if(isset($_GET['uid'])){
    $id = $_GET['uid'];
    $user = new user();
    if($user->deleteOne(['id'=>$id], Application::$app->db)){
        Application::$app->controller->render('users');
    }
}// get id through query string
else
{
    Application::$app->controller->render('_error');; // display error message if not delete
}
?>