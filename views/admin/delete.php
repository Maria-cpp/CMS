<?php
use app\models\Post;
use app\models\user;
use zum\phpmvc\Application;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = new Post();
    if($post->deleteOne(['id'=>$id], Application::$app->db)){
        header("location: posts");
    }
}
else if(isset($_GET['uid'])){
    $id = $_GET['uid'];
    $user = new user();
    if($user->deleteOne(['id'=>$id], Application::$app->db)){
        header("location: users");
    }
}// get id through query string
else
{
    Application::$app->controller->render('_error');; // display error message if not delete
}
?>