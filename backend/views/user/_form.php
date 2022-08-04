<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
if(!empty($model->expired_at)){
  $model->expired_at = date('d-m-Y',$model->expired_at);
}
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'gender')->dropDownList([ 'Male' => 'Male','Female' => 'Female']) ?>
<?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'package_id')->dropDownList([ 1 => 'Normal',2 => '3 Months', 3 => '6 Months'], ['onchange'=>'if($(this).val() > 1){
                 $(".field-profileform-expired_at").show(); 
                 }
                 else{
                $(".field-profileform-expired_at").hide();
                }
                 ']) ?>
<?= $form->field($model, 'expired_at')->widget(DatePicker::classname(), [
    'readonly' => true,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy',
        'todayHighlight' => true,
    ],
]);?>
    <?= $form->field($model, 'status')->dropDownList([ 9 => 'Inactive',10 => 'Active']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

    if($model->package_id == 1):
        $this->registerCss(".field-profileform-expired_at{display:none}");
    // else:
    //     $this->registerCss(".field-profileform-expired_at{display:none}");
    endif;    
?>