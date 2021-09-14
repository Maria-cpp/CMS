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

if (isset($_POST['firstname']) or isset($_POST['lastname']) or isset($_POST['email']) or isset($_POST['role'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $firstname . " " . $lastname;
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $query = Application::$app->db->pdo->prepare("INSERT INTO users (email, password, username, firstname, lastname, role) VALUES ('$email', '$password', '$username', '$firstname', '$lastname', '$role');");
    $query->execute();
    header("location : users");
}
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                    <form action="" method="POST">
                        <table class="table table-striped table-hover" id="usertable">
                            <tbody>
                            <tr><td><label>Enter Firstname : </label></td><td><input type="text" name="firstname"/></td></tr>
                            <tr><td><label>Enter Lastname : </label></td><td><input type="text" name="lastname"/></td></tr>
                            <tr><td><label>Enter Email : </label></td><td><input type="text" name="email"/></td></tr>
                            <tr><td><label>Enter password : </label></td><td><input type="text" name="password"/></td></tr>
                            <tr><td><label>Enter role : </label></td><td><input type="text" name="role"/></td></tr>
                            <tr><td colspan="2"><input type="submit" name="submit" value="Add User"></td></tr>
                            <tr><td colspan="2"><a href="admin/users">&larr; Back</a></td></tr>
                            </tbody>
                        </table>
                    </form>
            </div>
        </div>
    </div>
</div>


