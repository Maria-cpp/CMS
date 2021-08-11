<?php

/** @var $this \zum\phpmvc\View */

use app\models\Post;
use zum\phpmvc\Application;
$category = new Category();

$this->title = 'Posts';
$post = new Post();
$posts = $post->fetchAll(Application::$app->db);
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

                        <form action="" method="post">
                            <table class="table table-striped table-hover">
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
                                <?php foreach ($posts as $post){ ?>
                                   <tr>
                                       <td><?php echo $post['id'];?></td>
                                       <td><?php echo $post['author']; ?></td>
                                       <td><?php echo $post['title'];?></td>
                                       <td>:)</td>
                                       <td><?php echo $post['category_id'];?></td>
                                       <td><?php echo $post['tag'];?></td>
                                       <td><?php echo date('l jS' , $post['created_at']) ?></td>
                                       <td><a href="post" class="mr-3" title="View Record" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                                       <td><a href="post.php?id=<?php echo $post['id'];?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                       <td><a onClick=\"javascript: return confirm('Are you sure you want to delete this post?')\" href='?del=<?php $post['id'];?>'><i class='fa fa-times' style='color: red;'></i><span class="glyphicon glyphicon-trash"></span></a></td>
                                   </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>