<?php
/** @var $model \app\models\user*/

/** @var $this \zum\phpmvc\View */
$this->title = 'register'
?>

<h1>Create an Account</h1>
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

<button type="submit" class="btn btn-primary">Submit</button>

<?php \zum\phpmvc\form\Form::end() ?>
