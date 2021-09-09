<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\Post;
use zum\phpmvc\Application;
use zum\phpmvc\form\Form;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);

$this->title = 'post';

$post = new Post();
if(isset($_POST['title'], $_POST['content'])) {
    $title = $_POST['title'];
    $id = $_POST['id'];
    $cid = $_POST['cid'];
    $author = $_SESSION['username'];
    $content = nl2br($_POST['content']); //nl2br is use for line breaks
    if (empty($title) or empty($content)) {
        $error = 'All fields are required!';
    }
    else{
        global $pdo;
        $query = $pdo->prepare('UPDATE posts SET title= ?, content=?, updated_at=?, category_id = ?, author = ? WHERE id = ?');
        $query->bindValue(1, $title);
        $query->bindValue(2, $content);
        $query->bindValue(3, time());
        $query->bindValue(4, $cid);
        $query->bindValue(5, $author);
        $query->bindValue(6, $id);

        $query->execute();
        header('Location: posts');
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
<!--                    <form action="editpost?title=--><?php //echo $posts['title'] ?><!--?content=--><?php //echo $posts['content'] ?><!--" method="post" autocomplete="off">-->
                    <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF']); ?>" method="post" autocomplete="off">
                    <div class="row">
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
                            </select><br/><br />
                        </div>
                        <div class="textarea">
                            <textarea rows="20", cols=100, name="content"> <?php echo $posts['content'];?></textarea><br /><br />
                        </div>
                    </div>

                    <input type="submit" value="update">

                    </form>
                    <a href="posts">&larr; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


