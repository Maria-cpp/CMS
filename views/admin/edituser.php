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

if (isset($_POST["uid"])) {
    $id = $_POST["uid"];
    $firstname = $_POST["firstname"];
    $lastname =nl2br($_POST["lastename"]);
    $email = $_POST["email"];
    $role = $_POST["role"];
    if (empty($firstname) or empty($lastname) or empty($email) or empty($role)) {
        $error = 'All fields are required!';
    }
    else{
        global $pdo;
        $query = $pdo->prepare('UPDATE users SET username= ?, firstname=?, lastname=?, email=?, role=?, WHERE id = ?');
        $username = $firstname." ".$lastname;
        $query->bindValue(1, $username);
        $query->bindValue(2, $firstname);
        $query->bindValue(3, $lastname);
        $query->bindValue(4, $email);
        $query->bindValue(6, $role);
        $query->bindValue(7, $id);

        $query->execute();
    header("location: users");
    }
}
else if (isset($_GET['uid'])) {
    $id = $_GET['uid'];
    $users = $user->findOne(['id'=>$id], Application::$app->db);
    $posts =json_decode(json_encode($users, true),true);
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
                <div class="post">

                    <form action="" method="POST">
                    <div class="row">
                        <div >
                            <input type="button" hidden="hidden" name="id" value="<?php echo $id;?>"/>
                        </div>
                        <div>
                            <input type="text" name="id" value="<?php echo $users['id'];?>"/>
                        </div>
                        <div>
                            <input type="text" name="email" value="<?php echo $users['email'];?>"/>
                        </div>
                        <div>
                            <input type="text" name="username" value="<?php echo $users['username'];?>"/>
                        </div>
                        <div>
                            <input type="text" name="role" value="<?php echo $users['role'];?>"/>
                        </div>
                    </div>
                        <input type="submit" name="submit" value="Update">
                    </form>
                    <a href="users">&larr; Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


