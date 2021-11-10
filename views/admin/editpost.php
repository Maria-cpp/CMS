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

        <div class="panel">
        <div class="panel-body">
            <div class="row">
                <form action="update" method="GET">
                    <table class="table table-striped table-hover" id="usertable">
                        <tbody>
                        <div>
                            <input type="text" hidden="hidden" name="id" value="<?php echo $posts['id'];?>">
                        </div>
                        <tr><td><label>Enter Title : </label></td><td><input type="text" name="title" value = <?php echo $posts['title'];?>></td></tr>
                        <tr><td><label>Select category : </label></td>
                            <td> <select name="category_id">
                                    <?php foreach($categories as $category) {?>
                                        <option value="<?php echo $category['id']?>">
                                            <?php echo $category['category_name'];?>
                                        </option>
                                    <?php }?>
                                </select><br/><br/></td></tr>
                        <tr><td><label>Enter Content: </label></td><td><textarea rows="15", cols=100, name="content"><?php echo $posts['content'];?></textarea></td></tr>
                        <tr>
                            <td><label>Articles Tags</label></td>
                            <td><input type='text' name="articleTags" value="<?php echo $posts['tags'];?>" style="width:100%;height:40px">
                            <br><label>(Separated by comma without space)</label>          
                            </td>
                        </tr>
                        <tr><td colspan="2"><input type="submit" name="submit" value="Update"></td></tr>
                        <tr><td colspan="2"><a href="posts">&larr; Back</a></td></tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


