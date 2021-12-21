<?php

/** @var $this \zum\phpmvc\View */

use app\models\tags;
use zum\phpmvc\Application;

$tag = new tags();

$tags = $tag->fetchAll(Application::$app->db);

if($_SESSION['role']==='admin') {
?>
<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <div class="row">
                <div class="col-md-10">
                    <h3 class="panel-title">Tags </h3>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-secondary" type="button" id="category" aria-expanded="false">
                        <a href="#" class="btn">Add New</a></button>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="poststable">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Delete </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($tags as $tag){ ?>
                                <tr id ='<?php $tag['id']; ?>'>
                                    <td><?php echo $tag['id'];?></td>
                                    <td><?php echo $tag['tag_name']; ?></td>
                                    <td><a href="delete?tid=<?php echo $tag['id'] ?>" class="mr-3" title="Delete Record" data-toggle="tooltip"><span class="glyphicon glyphicon-trash"></span></a></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>