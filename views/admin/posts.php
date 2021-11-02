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
        Application::$app->response->redirect('posts');
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
                        <a href="createpost" class="btn">Add New</a></button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
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
                                <th>View</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($posts as $post){ ?>
                                <tr id ='<?php echo $post['id']; ?>'>
                                    <td style="width: 40px"><?php echo $post['id'];?></td>
                                    <td><?php echo $post['author']; ?></td>
                                    <td style="width: 160px"><?php echo $post['title'];?></td>
                                    <td style="width: 100px; text-align: center">:)</td>
                                    <td><?php echo $category->getCategoryName($post['category_id']);?></td>
                                    <td style="width: 160px"><?php echo $post['tags'];?></td>
                                    <td><?php echo date('l, jS' , $post['created_at']) ?></td>
                                    <td style="width: 60px; text-align: center"><a href="post?id=<?php echo $post['id']; ?>" class="mr-3" title="view" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-eye-open"></span></a>
                                    </td>
                                    <td style="width: 60px; text-align: center"><a href="editpost?id=<?php echo $post['id']; ?>" class="mr-3" title="Update " data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-pencil"></span></a>
                                    </td>
                                    <td style="width: 60px; text-align: center"><a href="delete?id=<?php echo $post['id']; ?>" class="mr-3" title="Delete" data-toggle="tooltip">
                                            <span class="glyphicon glyphicon-trash"></span></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
