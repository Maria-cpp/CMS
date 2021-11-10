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
    $cid = test_input($_GET["id"]);
    $tags = test_input($_GET["articleTags"]);
    $id = test_input($_GET["id"]);
    if (empty($title) or empty($content)) {
        $error = 'All fields are required!';
    }
    else{
        $query = Application::$app->db->pdo->prepare("UPDATE posts SET title=?, content=?, updated_at=?, tags=?, category_id =? WHERE id=?;");
        $query->bindValue(1, $title);
        $query->bindValue(2, $content);
        $query->bindValue(3, date('Y-m-d H:i:s'));
        $query->bindValue(4, $tags);
        $query->bindValue(5, $cid);
        $query->bindValue(6, $id);

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
    Application::$app->controller->render('admin/_error');
    exit();
}
?>


