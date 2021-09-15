<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\Post;
use zum\phpmvc\Application;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);


$this->title = 'addpost';

$user = new Post();

if (isset($_POST['title']) or isset($_POST['category_id']) or isset($_POST['content'])) {
    $title = $_POST['title'];
    $author = $_SESSION['username'];
    $cid = $_POST['category_id'];
    $time = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $query = Application::$app->db->pdo->prepare("INSERT INTO posts (title, author, content, category_id) VALUES ('$title','$author','$content','$time','$cid');");
    $query->execute();
    header("location: posts");
}
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <form action="createpost" method="POST">

                    <table class="table table-striped table-hover" id="usertable">
                        <tbody>
                        <tr><td><label>Enter Title : </label></td><td><input type="text" name="title"/></td></tr>
                        <tr><td><label>Select category : </label></td>
                            <td> <select name="category_id">
                                    <?php foreach($categories as $category) {?>
                                        <option value="<?php echo $category['id']?>">
                                            <?php echo $category['category_name'];?>
                                        </option>
                                    <?php }?>
                                </select><br/><br/></td></tr>
                        <tr><td><label>Enter Content: </label></td><td><textarea rows="20", cols=100, name="content"></textarea></td></tr>
                        <tr><td colspan="2"><input type="submit" name="submit" value="Add Post"></td></tr>
                        <tr><td colspan="2"><a href="admin/posts">&larr; Back</a></td></tr>
                        </tbody>
                    </table>

                                                         <!--                       <div class="title">-->
<!--                            <label>Title : </label>-->
<!--                            <input type="text" name="title" />-->
<!--                        </div>-->
<!--                        <div class="col"><label>Category : </label>-->
<!--                            <select name="category_id">-->
<!--                                --><?php //foreach($categories as $category) {?>
<!--                                    <option value="--><?php //echo $category['id']?><!--">-->
<!--                                        --><?php //echo $category['category_name'];?>
<!--                                    </option>-->
<!--                                --><?php //}?>
<!--                            </select><br/><br/>-->
<!--                        </div>-->
<!--                        <div class="textarea">-->
<!--                            <label>Content</label> <br>-->
<!--                            <textarea rows="20", cols=100, name="content"></textarea><br /><br />-->
<!--                        </div>-->
<!--                    <input type="submit" name="submit" value="Add Post">-->
                </form>
            </div>
        </div>
    </div>
</div>


