<?php
/** @var $model \app\models\Category */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use zum\phpmvc\Application;


$this->title = 'category';

$user = new Category();

if (isset($_POST['category_name'])) {
    $name = $_POST['category_name'];
    $query = Application::$app->db->pdo->prepare("INSERT INTO category (category_name) VALUES ('$name');");

    $query->execute();
    header("location: category");
}
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                    <form action="addcategory" method="POST">
                        <table class="table table-striped table-hover" id="categorytable">
                            <tbody>
                            <tr><td><label>Enter Category Name : </label></td><td><input type="text" name="category_name"/></td></tr>
                            <tr><td colspan="2"><input type="submit" name="submit" value="Add Category"></td></tr>
                            <tr><td colspan="2"><a href="category">&larr; Back</a></td></tr>
                            </tbody>
                        </table>
                    </form>
            </div>
        </div>
    </div>
</div>


