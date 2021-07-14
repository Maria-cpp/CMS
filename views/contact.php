<?php

/** @var $this \zum\phpmvc\View */
/** @var $model \zum\phpmvc\ContactForm */

use zum\phpmvc\form\TextareaField;

$this->title = 'Contact'

?>

    <h1>Contact Us</h1>

<?php $form = \zum\phpmvc\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \zum\phpmvc\form\Form::end(); ?>