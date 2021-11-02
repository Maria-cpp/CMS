<?php
/** @var $model \app\models\user */
/** @var $this \zum\phpmvc\View */

use app\models\Post;
use app\models\user;
use zum\phpmvc\Application;

$this->title = 'user';
$post = new Post();

$user = new user();
if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $users = $user->findOne(['id'=>$id]);
    $users =json_decode(json_encode($users, true),true);
    $posts = $post->fetchAll(Application::$app->db);

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
                    <h3 class="panel-title">User Details </h3>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-secondary" type="button" id="adduser" aria-expanded="false">
                        <a href="edituser?uid=<?php echo $users['id']?>" class="btn">Edit</a></button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
               <div>
                   <div><h2 style="color: #472778"> Name:
                           <?php echo $users['username']?>
                       </h2>
                   </div>
                   <p style="color: #472778">ID : <?php echo $users['id']?></p>
                   <p style="color: #472778">Email : <?php echo $users['email']?></p>

                   <div class="row">
                       <div class="post">
                           <?php foreach ($posts as $post){
                               if($post['author'] == $users['username']) {?>
                           <div class = "title"><h2>Title:
                                   <?php echo $post['title']?>
                                   <small>
                                       posted <?php echo date('l jS' , $post['created_at']) ?>
                                   </small>
                               </h2>
                           </div>
                           <p style="color: #472778">Content <?php echo $post['content']?></p>
                           <p style="text-align: center; font-size: large">
                               <a href="post?id=<?php echo $post['id']; ?>" class="mr-3" title="view" data-toggle="tooltip">
                                  <span class="glyphicon glyphicon-eye-open"></span>
                               </a>
                           </p>
                           <?php } echo "<br>"; }?>
                       </div>
                   </div>


                   <a href="users">&larr; Back</a>
               </div>
            </div>
        </div>
    </div>
</div>


