<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$this->title = 'SMTP Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin();
 foreach ($settings as $index => $setting) {
            echo $form->field($setting, "[$index]value")->label($setting->title);
 }
 ?>
<div class="form-group">
    <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
</div>
<?php
ActiveForm::end();