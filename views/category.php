<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */
$this->title = 'category';

use app\models\Category;
use app\models\Post;
use zum\phpmvc\Application;

$category = new Category();

$this->title = 'Posts';
$postClass = new Post();
$posts = $postClass->fetchAll(Application::$app->db);
$id = 0;
if (isset($_GET['cid'])) {
    $id = $_GET['cid'];
    //        Application::$app->response->redirect('posts');
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
                        <?php foreach ($posts as $post){
                            if($post['category_id'] == $_GET['cid']) {  ?>
                            <table class="table table-striped table-hover" id="poststable">
                                <tbody>
                                <tr><td colspan="3" style="font-size: large; text-align: center"><?php echo $post['title'];?></td></tr>
                                <tr><td colspan="3" style="font-size: larger; text-align:justify-all"><?php echo $post['content'];?></td></tr>
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

                            <?php  echo "<br>"; }
                            } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


