<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\Post;
use app\models\user;
use zum\phpmvc\Application;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);

$this->title = 'post';
$user = new user();

$post = new Post();
$title = $content  = $cid = $id = "";

function test_input($data): string
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET["id"])) {
    $title = test_input($_GET["title"]);
    $content = test_input(nl2br($_GET["content"]));
    $cid = test_input($_GET["cid"]);
    $id = test_input($_GET["id"]);
    if (empty($title) or empty($content)) {
        $error = 'All fields are required!';
    }
    else{
        //        $query = Application::$app->db->pdo->prepare("UPDATE posts SET title='$title', content='$content', updated_at='$time', category_id ='$cid' WHERE id=$id;");
        $query = Application::$app->db->pdo->prepare("UPDATE posts SET title=?, content=?, updated_at=?, category_id =? WHERE id=?;");
        $query->bindValue(1, $title);
        $query->bindValue(2, $content);
        $query->bindValue(3, date('Y-m-d H:i:s'));
        $query->bindValue(4, $cid);
        $query->bindValue(5, $id);

        $query->execute();
        header("location: post?id=". "$id");

    }
}
else if (isset($_GET["uid"])) {
    echo "in uid if <br>";
    $id = $_GET["uid"];
    $firstname = $_GET["firstname"];
    $lastname =$_GET["lastname"];
    $email = $_GET["email"];
    $role = $_GET["role"];
    if (empty($firstname) or empty($lastname) or empty($email) or empty($role)) {
        echo "in empty if <br>";
        $error = 'All fields are required!';
    }
    else{
        $username = $firstname." ".$lastname;
        $query = Application::$app->db->pdo->prepare("UPDATE users SET username='$username', firstname='$firstname', lastname='$lastname', email='$email', role='$role' WHERE id=$id;");
        $query->execute();
        header("location: users");
    }
}
else{
    Application::$app->controller->renderAdmin('admin/_error');
    exit();
}
?>


