<?php
/** @var $model \app\models\post */
/** @var $this \zum\phpmvc\View */

use app\models\Category;
use app\models\tags;

use app\models\Post;
use zum\phpmvc\Application;

$category = new Category();
$categories = $category->fetchAll(Application::$app->db);

$this->title = 'addpost';

$post = new Post();

?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="my-post-form">
                <?php $form = \zum\phpmvc\form\Form::begin('', "post", "multipart/form-data")?>
                <?php echo $form->field($model, 'title')?>
                <label>Choose Category:   </label>
                <select name="category_id">
                    <?php foreach($categories as $category) {?>
                        <option value="<?php echo $category['id']?>">
                            <?php echo $category['category_name'];?>
                        </option>
                    <?php }?>
                </select><br/>
                <?php echo $form->textarea($model, 'content')?>
                <?php echo $form->field($model, 'tags')?>
                <label>(Separated by comma without space)</label>
                
                <?php echo $form->field($model, 'image_URL')->fileField()?>


                <button type="submit" class="btn btn-primary">Add Post</button>
                <?php \zum\phpmvc\form\Form::end() ?>

                </div>
            </div>
        </div>
    </div>
</div>


