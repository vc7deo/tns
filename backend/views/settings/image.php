<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\fileinput\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\models\Article */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Image Setting';

?>

<div class="article-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>



<?= $form->field($model, 'file')->widget(\dosamigos\fileinput\FileInput::className(), [
    'options' => ['accept' => 'image/*'],
])->hint('Image resolution 742*657')->label(false);?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php if(!empty(Yii::$app->params['image.image'])): ?>
<img src="<?=Yii::getAlias('@site/uploads/images/').Yii::$app->params['image.image']?>" width="300px">
<?php endif; ?>

<div style="margin-top:20px">&nbsp;</div>
</div>
