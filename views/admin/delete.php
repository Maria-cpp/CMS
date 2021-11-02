<?php

use app\models\Category;
use app\models\Post;
use app\models\user;
use zum\phpmvc\Application;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = new Post();
    if($post->deleteOne(['id'=>$id])){
        header("location: posts");
    }
}
else if(isset($_GET['uid'])){
    $id = $_GET['uid'];
    $user = new user();
    if($user->deleteOne(['id'=>$id])){
        header("location: users");
    }
}// get id through query string
else if(isset($_GET['cid'])){
    $id = $_GET['cid'];
    $category = new Category();
    if($category->deleteOne(['id'=>$id])){
        header("location: category");
    }
}
else
{
    Application::$app->controller->render('_error');; // display error message if not delete
}
?>