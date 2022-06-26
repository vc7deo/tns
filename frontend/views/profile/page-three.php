<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

use yii\helpers\ArrayHelper;

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
<div class="page-wrapper">
<h4>Upload Photos</h4>



        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="wrap-image">
                <?= $form->field($avatar, 'image1')->fileInput([])->label(false) ?>
                <?= $form->field($avatar, 'image2')->fileInput([])->label(false) ?>
        </div>
        <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success savefinal']) ?>

                <?= Html::a('Skip', ['/profile/skipphoto'],['class' => 'skipbtns']) ?>         

        </div>

        <?php ActiveForm::end(); ?>


</div>
</div>