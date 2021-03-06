<?php

use app\models\Category;
use app\models\tags;

use zum\phpmvc\Application;

$category = new Category();

$categories = $category->fetchAll(Application::$app->db);

$tag = new tags();

$tags = $tag->fetchAll(Application::$app->db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS </title>
    <!-- Bootstrap core CSS -->
    <!--    <link rel="stylesheet" href="./assets/css/bootstrap.min.css" >-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <link rel="stylesheet" href="../../includes/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../includes/css/style.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
</head>
<body>
<nav class="navbar navbar-expand-md">
    <a class="navbar-brand" href="/">CMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/"> Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/posts">Posts</a>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="" id="dropdown01" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown01">
                    <?php foreach ($categories as $category){ ?>
                        <li><a class="dropdown-item" href="category?cid=<?php echo $category['id']?>"> <?php echo $category['category_name'] ?> </a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="" id="dropdown02" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown02">
                    <?php foreach ($tags as $tag){ ?>
                        <li><a class="dropdown-item" href="tags?pid=<?php echo $tag['post_id']?>"> <?php echo $tag['tag_name'] ?> </a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact">Contact</a>
            </li>
        </ul>
        <?php  if(Application::isGuest()):?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">

                    <a class="nav-link active" aria-current="page" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
            </ul>
        <?php else: ?>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <?php if($_SESSION['role']==='admin') { ?>
                    <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                    <?php }else {?>
                    <a class="nav-link" href="/profile">Profile</a>
                    <?php } ?>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Welcome <?php echo $_SESSION['username']?>
                        (Logout)
                    </a>
                </li>
            </ul>
        <?php endif; ?>
    </div>
</nav>
<div class="main-container">
    <?php if(Application::$app->session->getFlash('success')): ?>
        <div class="alert alert-success" role="alert">
             <?php echo Application::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    {{content}}
</div>

<footer id="footer" class="container-fluid">
    <p> Copyright Admin, &copy; 2021 </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
