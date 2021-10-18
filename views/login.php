<?php
/** @var $model \app\models\user */
/** @var $this \zum\phpmvc\View */
$this->title = 'login';
?>

<h1>Login</h1>
<?php $form = \zum\phpmvc\form\Form::begin('', "post")?>

<?php echo $form->field($model, 'email')?>
<?php echo $form->field($model, 'password')->passwordField()?>

<button type="submit" class="btn btn-primary">Submit</button>

<?php \zum\phpmvc\form\Form::end() ?>
