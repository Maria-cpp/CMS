<?php
///** @var $model \app\models\post */
///** @var $this \zum\phpmvc\View */
//$this->title = 'post'
//
//?>
<!---->
<!--<h1>Posts</h1>-->


<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Post;
use zum\phpmvc\Application;

$this->title = 'post';

$post = new Post();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $posts = $post->findOne(['id'=>$id]);
    $posts =json_decode(json_encode($posts, true),true);
} else {
    Application::$app->controller->render('admin/_error');
    exit();
}
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Post </h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="post">
                    <div class = "title"><h2>Title:
                            <?php echo $posts['title']?>
                            <small>
                                posted <?php echo date('l jS' , $posts['created_at']) ?>
                            </small>
                        </h2>
                    </div>
                    <p style="color: #472778"><?php echo $posts['content']?></p>
                    <a href="posts">&larr; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>



