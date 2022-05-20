<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
$this->title = 'Time Settings';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
$form = ActiveForm::begin();
 foreach ($settings as $index => $setting) {
    echo $form->field($setting, "[$index]module")->hiddenInput()->label(false);
            echo $form->field($setting, "[$index]value")->widget(\yii\widgets\MaskedInput::className(), [
                'mask' => '99:99',
            ])->label($setting->title);
 }
 ?>
<div class="form-group">
    <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
</div>
<?php
ActiveForm::end();
