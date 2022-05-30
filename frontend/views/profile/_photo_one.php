<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;
// $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@webroot/static');
if(!empty(Yii::$app->user->identity->profile->photo1)){
    $model->photo1 = Yii::getAlias('@site/uploads/profile/').Yii::$app->user->identity->profile->photo1;
}
?>

<div class="branches-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>


    <?= $form->field($model, 'photo1')->widget(\dosamigos\fileinput\FileInput::className(), [
    'options' => ['accept' => 'image/*'],
    'thumbnail' => $model->photo1,
    'style' => \dosamigos\fileinput\FileInput::STYLE_IMAGE,
])->hint('')->label(false)?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
