<?php
use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use budyaga\cropper\Widget;
use yii\helpers\Url;
// $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@webroot/static');
if(!empty(Yii::$app->user->identity->profile->photo1)){
    $model->photo = Yii::getAlias('@site/uploads/profile/').Yii::$app->user->identity->profile->photo1;
}
?>

<div class="branches-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <?php echo $form->field($model, 'photo1')->widget(Widget::className(), [
        'uploadUrl' => Url::toRoute('/profile/uploadPhoto'),
        'width' => 225,
        'height' => 225,
        'cropAreaWidth' => 300,
        'cropAreaHeight' => 300,
    ])->label(false); ?>

<?php ActiveForm::end(); ?>
</div>
