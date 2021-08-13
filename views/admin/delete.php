<?php
use app\models\Post;
use zum\phpmvc\Application;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $post = new Post();
    if($post->deleteOne(['id'=>$id], Application::$app->db)){
        Application::$app->controller->render('adposts');
    }
}// get id through query string
else
{
    Application::$app->controller->render('_error');; // display error message if not delete
}
?>