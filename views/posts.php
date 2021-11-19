
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

        $postClass->deleteOne(['id' => $id]);
        Application::$app->response->redirect('posts');
    }
    $posts = $postClass->fetchAll(Application::$app->db);
}
?>
<div class="col-md-10">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <div class="row">
                    <h3 class="panel-title">Posts </h3>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <?php foreach ($posts as $post){ echo "<br>"; ?>
                        <table class="table table-striped table-hover" id="poststable">
                            <tbody>
                                <tr><td colspan="3" style="font-size: large; font-weight: bold; text-align: center"><?php echo $post['title'];?></td></tr>
                                <tr><td colspan="1" style="font-size: larger; text-align:center"> 
                                <img width=300px height=auto src="<?php echo$post['image_URL']; ?>" alt="myPic" /> </td>
                                <td colspan="2" style="font-size: larger; text-align:justify-all"><?php echo $post['content'];?></td></tr>
                                <tr>
                                    <td style="width: 200px; text-align: center">Author : <?php echo $post['author']; ?></td>
                                    <td style="width: 200px; text-align: center">Published On :  <?php echo date('l, jS' , $post['created_at']) ?></td>
                                    <td style="width: 200px; text-align: center; font-size: larger">
                                        <a href="post?id=<?php echo $post['id']; ?>" class="mr-3" title="view" data-toggle="tooltip">
                                         <span class="glyphicon glyphicon-eye-open"></span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
