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

if (isset($_POST['title']) or isset($_POST['cid']) or isset($_POST['content'])) {
    $title = $_POST['title'];
    $author = $_SESSION['username'];
    $cid = $_POST['cid'];
    $content = $_POST['content'];
    $time= date('Y-m-d H:i:s');
    $query = Application::$app->db->pdo->prepare("INSERT INTO posts (title, author, content, created_at, category_id) VALUES ('$title','$author','$content','$time', '$cid');");
    $query->execute();
    header("location: posts");
}
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="post">
                    <form action="createpost" method="POST">
                    <div class="row">
                        <div class="title">
                            <input type="text" name="title" />
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
                            <textarea rows="20", cols=100, name="content"></textarea><br /><br />
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


