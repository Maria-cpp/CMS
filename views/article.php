<?php


use app\models\Post;

$article = new Post();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = $article->fetch_data($id);
} else {
    header('Location: index.php');
    exit();
}
?>
<div class="container">
    <h4>
        <?php echo $data['article_title']?>
        <small>
            posted <?php echo date('l jS' , $data['created_at']) ?>
        </small>
    </h4>
    <p><?php echo $data['article_content']?></p>
    <a href="posts">&larr; Back</a>
</div>
