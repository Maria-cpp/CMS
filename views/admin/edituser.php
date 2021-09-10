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
$title = $content  = $cid = $id = "";

function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["id"])) {
    echo "In post method<br>";
    $title = test_input($_POST["title"]);
    $content = test_input(nl2br($_POST["content"]));
    $cid = test_input($_POST["cid"]);
    $id = test_input($_POST["id"]);
    if (empty($title) or empty($content)) {
        $error = 'All fields are required!';
    }
    else{
        echo "In query if<br>";

        global $pdo;
        $query = $pdo->prepare('UPDATE posts SET title= ?, content=?, updated_at=?, category_id = ?, WHERE id = ?');
        $query->bindValue(1, $title);
        $query->bindValue(2, $content);
        $query->bindValue(3, time());
        $query->bindValue(4, $cid);
        $query->bindValue(5, $id);

        $query->execute();
        echo "query executed<br>";

        Application::$app->controller->renderAdmin(('admin/post'));
    }
}
else if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $posts = $post->findOne(['id'=>$id], Application::$app->db);
    $posts =json_decode(json_encode($posts, true),true);
}
else{
    Application::$app->controller->renderAdmin('admin/_error');
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
                    <form action="" method="POST">
                    <div class="row">
                        <div >
                            <input type="button" hidden="hidden" name="id" value="<?php echo $id;?>"/>
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


