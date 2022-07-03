<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

if(!empty($model->dob)){
  $model->dob = date('d-m-Y',$model->dob);
}

$this->title = 'Update User: ' . $user->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $user->fullname, 'url' => ['view', 'id' => $user->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'readonly' => true,
    'pluginOptions' => [
        'format' => 'dd-mm-yyyy',
        'defaultDate'=>$model->dob,
        'todayHighlight' => false,
    ],
]);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
