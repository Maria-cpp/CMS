<?php

/** @var $this \zum\phpmvc\View */

use app\models\user;
use zum\phpmvc\Application;

$user = new user();
$users = $user->fetchAll(Application::$app->db);
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <h3 class="panel-title">Users</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <form action="" method="post">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user){ ?>
                        <tr>
                            <td><?php echo $user['id'];?></td>
                            <td><?php echo $user['username'];?></td>
                            <td><?php echo $user['email'];?></td>
                            <td><?php echo $user['role'];?></td>
                            <td><a href="user?uid=<?php echo $user['id'] ?>" class="mr-3" title="View Record" data-toggle="tooltip"><span class="glyphicon glyphicon-eye-open"></span></a></td>
                            <td><a href="edituser?uid=<?php echo $user['id'] ?>" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="glyphicon glyphicon-pencil"></span></a></td>
                            <td><a href="delete?uid=<?php echo $user['id'] ?>" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a></td>
                        </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>