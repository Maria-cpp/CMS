<?php

/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\Post;
use zum\phpmvc\Application;

$category = new Category();

$this->title = 'Posts';
$postClass = new Post();
$posts = $postClass->fetchAll(Application::$app->db);

if($_SESSION['role']==='admin') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $postClass->deleteOne(['id' => $id], Application::$app->db);
        Application::$app->controller->render(adposts);
    }
    $posts = $postClass->fetchAll(Application::$app->db);
}
?>
<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Posts </h3>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-secondary" type="button" id="addpost" aria-expanded="false">
                    <a href="posts" class="btn">Add New</a></button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-10">
                    <div class="table-responsive">
                            <table class="table table-striped table-hover" id="poststable">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form action="adposts" method="get">
                                <?php foreach ($posts as $post){ ?>
                                   <tr id ='<?php $post['id']; ?>'>
                                       <td><?php echo $post['id'];?></td>
                                       <td><?php echo $post['author']; ?></td>
                                       <td><?php echo $post['title'];?></td>
                                       <td>:)</td>
                                       <td><?php echo $category->getCategoryName($post['category_id']);?></td>
                                       <td><?php echo $post['tag'];?></td>
                                       <td><?php echo date('l jS' , $post['created_at']) ?></td>
                                       <td><a href="posts" class="mr-3" title="View Record" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                       <td><a href="posts" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                       <td><a><span class="glyphicon glyphicon-trash"></span></a></td>
                                   </tr>
                                    <?php } ?>
                                </form>
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>
