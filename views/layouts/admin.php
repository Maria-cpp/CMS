<!doctype html>

<?php

use app\models\Post;
use app\models\Category;
use app\models\user;

$post = new Post();
$category = new Category();
$user = new user();


?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Dashboard </title>
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
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="dashboard">Dashboard <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="adusers">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="posts">posts</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="dropdown">
               <a class="nav-link dropdown-toggle" href="" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Tags</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>

            </li>
        </ul>
        <ul class="navbar-nav navbar-right">
            <li class="nav-item active"><a class="nav-link" href="#">Welcome <?php echo $_SESSION['username']?> <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a class="nav-link" href="/">Go to Website </a></li>
            <li class="nav-item"><a class="nav-link" href="login">Logout  </a></li>
        </ul>
    </div>
</nav>

<header id="header">
    <div class="container">
        <div class ="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard <small>Manage Your Site</small></h1>
            </div>
            <div class="col-md-2">
                <div class="dropdown create">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Create Content
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" type="button" id="#addUser">Add User</a></li>
                        <li><a class="dropdown-item" href="#">Add Post</a></li>
                        <li><a class="dropdown-item" href="#">Add Category</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="dashboard" class="list-group-item list-group-item-action active" aria-current="true">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
                    </a>
                    <a href="adusers" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <span class="badge"><?php echo $user->count() ?></span></a>
                    <a href="posts" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Posts <span class="badge"> <?php echo $post->count() ?> </span></a>
                    <a href="category" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> category<span class="badge"> <?php echo $category->count() ?> </span></a>
                    <a href="#" class="list-group-item list-group-item-action"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Tags<span class="badge"> 100 </span></a>
                </div>
                <div class="well">
                    <h4>Disk Space used </h4>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="70"
                             aria-valuemin="0" aria-valuemax="100" style="width:70%">
                            70%
                        </div>
                    </div>
                </div>
            </div>
            {{content}}
        </div>
    </div>
</section>


<footer id="footer" class="container-fluid">
    <p> Copyright Admin, &copy; 2021 </p>
</footer>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="../../includes/js/cms.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="../../includes/js/bootstrap.min.js"></script>
<script src="../../includes/js/bootstrap.bundle.js"></script>
<script src="../../includes/js/bootstrap.bundle.js.map"></script>
</body>
</html>
