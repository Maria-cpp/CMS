<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\user;
use zum\phpmvc\Application;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);

$this->title = 'user';

$user = new user();

if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $users = $user->findOne(['id'=>$id]);
    $users =json_decode(json_encode($users, true),true);
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
                    <h3 class="panel-title"><?php echo $users['username']?></h3>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                    <form action="update" method="GET">
                        <div>
                            <label type="text" name="uid">User ID : <?php echo $users['id'];?></label>
                        </div>
                        <table class="table table-striped table-hover" id="usertable">
                            <tbody>
                            <tr><td><input type="text"  hidden="hidden" name="uid" value="<?php echo " " .$users['id'];?>"/></td></tr>
                            <tr><td><input type="text"  name="email" value="<?php echo " " .$users['email'];?>"/></td></tr>
                            <tr><td><input type="text" name="firstname"  value="<?php echo " " .$users['firstname'];?>"/></td></tr>
                            <tr><td><input type="text" name="lastname"  value="<?php echo " " .$users['lastname'];?>"/></td></tr>
                            <tr><td><input type="text" name="role"  value="<?php echo " " .$users['role'];?>"/></td></tr>
                            <tr><td><input type="submit" name="submit" value="Update"></td></tr>
                            <tr><td><a href="users">&larr; Back</a></td></tr>
                            </tbody>
                        </table>
                    </form>
            </div>
        </div>
    </div>
</div>


