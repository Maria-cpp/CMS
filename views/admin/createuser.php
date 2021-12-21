<?php
/** @var $model \app\models\user */
/** @var $this \zum\phpmvc\View */

use app\models\user;
use zum\phpmvc\Application;


$this->title = 'user';

?>

<div class="col-md-9">
    <!--website OverView-->
    <div class="panel">
        <div class="panel-body">
            <div class="row">
            <div class="my-post-form">
                    <?php $form = \zum\phpmvc\form\Form::begin('', "post")?>
                        <div class="row">
                            <div class="col">
                                <?php echo $form->field($model, 'firstname')?>
                            </div>
                            <div class="col">
                            <?php echo $form->field($model, 'lastname')?>
                            </div>
                        </div>
                            <?php echo $form->field($model, 'email')?>
                            <?php echo $form->field($model, 'password')->passwordField()?>
                            <?php echo $form->field($model, 'confirmPassword')->passwordField()?>
                            <?php echo $form->field($model, 'role')?>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="users">&larr; Back</a>

                    <?php \zum\phpmvc\form\Form::end() ?>
            </div>
           </div>
        </div>
    </div>
</div>


