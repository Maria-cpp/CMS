<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\tags;

use app\models\Post;
use zum\phpmvc\Application;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);

$tag = new tags();

$this->title = 'addpost';

$post = new Post();

if (isset($_POST['title']) or isset($_POST['category_id']) or isset($_POST['content'])) {

    $title = $_POST['title'];
    $author = $_SESSION['username'];
    $cid = $_POST['category_id'];
    $time = date('Y-m-d H:i:s');
    $content = $_POST['content'];
    $tagsdata = $_POST['articleTags'];
    
    $tag->findtag($tagsdata);

    if(isset($_FILES['fileToUpload'])){
        echo "in file if";
        $errors= array();
        $file_name = $_FILES['fileToUpload']['name'];
        $file_size =$_FILES['fileToUpload']['size'];
        $file_tmp =$_FILES['fileToUpload']['tmp_name'];
        $file_type=$_FILES['fileToUpload']['type'];

        $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
        
        $expensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$expensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be excately 2 MB';
        }
        $image_URL;
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"./src/images/".$file_name);
           $image_URL = "./src/images/".$file_name;
           echo "Success";
        }else{
           print_r($errors);
        }
     }

    $query = Application::$app->db->pdo->prepare("INSERT INTO posts (title, author, content, image_URL, created_at, tags, category_id) VALUES ('$title','$author','$content', '$image_URL', '$time','$tagsdata','$cid');");
    $query->execute();
    
    $data = $post->GetRecedntPostID();

    $tag->updatePostIds($data->id, $tagsdata);

    header("location: posts");
}
?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <form action="createpost" method="POST" enctype="multipart/form-data">

                    <table class="table table-striped table-hover" id="usertable">
                        <tbody>
                        <tr><td><label>Enter Title : </label></td><td><input type="text" name="title"/></td></tr>
                        <tr><td><label>Select category : </label></td>
                            <td> <select name="category_id">
                                    <?php foreach($categories as $category) {?>
                                        <option value="<?php echo $category['id']?>">
                                            <?php echo $category['category_name'];?>
                                        </option>
                                    <?php }?>
                                </select><br/><br/></td></tr>
                        <tr><td><label>Enter Content: </label></td><td><textarea rows="15", cols=100, name="content"></textarea></td></tr>
                        <tr>
                            <td><label>Articles Tags</label></td>
                            <td><input type='text' name="articleTags" style="width:100%;height:40px">
                            <br><label>(Separated by comma without space)</label>          
                            </td>
                        </tr>
                        <tr><td colspan="2"><input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
                        <tr><td colspan="2"><input type="submit" name="submit" value="Add Post"></td></tr>
                        <tr><td colspan="2"><a href="posts">&larr; Back</a></td></tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>


