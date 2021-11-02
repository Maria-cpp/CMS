<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\Post;
use zum\phpmvc\Application;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);

$this->title = 'post';

$post = new Post();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $posts = $post->findOne(['id'=>$id]);
    $posts =json_decode(json_encode($posts, true),true);
}
else{
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
                    <h3 class="panel-title"><?php echo $posts['title']?></h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="post">
                    <form action="update" method="GET">
                    <div class="row">
                        <div>
                            <input type="text" hidden="hidden" name="id" value="<?php echo $posts['id'];?>"/>
                        </div>
                        <div class="title">
                            <input type="text" name="title" value="<?php echo $posts['title'];?>"/>
                        </div>
                        <div class="col">
                            <select name="cid">
                                <?php foreach($categories as $category) {?>
                                    <option value="<?php echo $category['id']?>">
                                        <?php echo $category['category_name'];?>
                                    </option>
                                <?php }?>
                            </select><br/><br/>
                        </div>
                        <div class="textarea">
                            <textarea rows="20", cols=100, name="content"> <?php echo $posts['content'];?></textarea><br /><br />
                        </div>
                    </div>
                        <input type="submit" name="submit" value="Update">
                    </form>
                    <a href="posts">&larr; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


