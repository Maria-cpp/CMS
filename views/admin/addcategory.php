<?php
/** @var $model \app\models\Category */
/** @var $this \zum\phpmvc\View */

$this->title = 'category';

?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="my-post-form">
                        <?php $form = \zum\phpmvc\form\Form::begin('', "post")?>
                            <?php echo $form->field($model, 'category_name')?>
                            <button type="submit" class="btn btn-primary">Submit</button>  
                            <a href="category">&larr; Back</a>
                        <?php \zum\phpmvc\form\Form::end() ?>
                </div>
            </div>
        </div>
    </div>
</div>


