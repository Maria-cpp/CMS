<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */
$this->title = 'tags';

use app\models\tags;
use app\models\Post;
use zum\phpmvc\Application;

$tag = new tags();

$this->title = 'Posts';
$postClass = new Post();
$pidArr = 0;
if (isset($_GET['pid'])) {
    $id = $_GET['pid'];
    $pidArr = explode(',', $id);
    
}
?>
<div class="col-md-10">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-heading main-color-bg">
            <div class="row">
                <h3 class="panel-title">Posts </h3>
            </div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <?php foreach($pidArr as $post_id){
                             
                            $posts = $postClass->findone(['id'=>$post_id]);
                            
                                if($posts != NULL){
                                    $data = json_decode(json_encode($posts, true),true);
                               ?>

                                    <table class="table table-striped table-hover" id="poststable">
                                     <tbody>
                                     <tr><td colspan="3" style="font-size: large; text-align: center"><?php echo $data['title'];?></td></tr>
                                     <tr><td colspan="3" style="font-size: larger; text-align:justify-all"><?php echo $data['content'];?></td></tr>
                                     <tr>
                                         <td style="width: 200px; text-align: center">Author : <?php echo $data['author']; ?></td>
                                         <td style="width: 200px; text-align: center">Published On :  <?php echo date('l, jS' , $data['created_at']) ?></td>
                                         <td style="width: 200px; text-align: center; font-size: larger">
                                             <a href="post?id=<?php echo $data['id']; ?>" class="mr-3" title="view" data-toggle="tooltip">
                                                 <span class="glyphicon glyphicon-eye-open"></span>
                                             </a>
                                         </td>
                                     </tr> 
                                     </tbody>
                                    </table> 
                               <?php }
                              echo "<br>"; 
                        }?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


