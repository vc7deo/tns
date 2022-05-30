<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
use common\models\Country;
use yii\helpers\ArrayHelper;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
use yii\bootstrap4\ActiveForm;
if(!$model->isNewRecord){
  $model->languages_known = explode(',', $model->languages_known);
  $model->dob = date('d-m-Y',$model->dob);
}
?>

<div class="container">
<div class="page-wrapper">
<main class="main model">
<div class="page-content mt-4 mb-10 pb-6">
<div class="container">
<div class="row">
<div class="col-md-3">
<ul class="nav nav-tabs nav-fill flex-column left-navs" id="myTab" role="tablist">
<?= $this->render(
    '@frontend/views/common/menu',
    ['user' => $user]
) ?>
</ul>
<?= $this->render(
    '@frontend/views/common/match'
) ?>
</div>
<div class="tab-content col-md-9" id="myTabContent">
<div class="tab-pane fade show active" id="edit" role="tabpanel" aria-labelledby="edit-tab">
<?php 
$form =  ActiveForm::begin();
 ?>
<div class="detailSeprate">
<h3>Family Details</h3>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('family_type')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'family_type')->dropDownList(['Nuclear Family' => 'Nuclear Family', 'Joint Family' => 'Joint Family'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('family_status')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'family_status')->dropDownList(['Affluent' => 'Affluent', 'Upper Middle Class' => 'Upper Middle Class','Middle Class' => 'Middle Class'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('fathers_occupation')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'fathers_occupation')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('mothers_occupation')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'mothers_occupation')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('origin')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'origin')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('brothers')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'brothers')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('sisters')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'sisters')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('city')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'city')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('state')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'state')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('country')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name'),['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('citizenship')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'citizenship')->textInput()->label(false);  ?>
</div>
</div>
</div>
<!-- Hobbies & Interests -->
<div class="detailSeprate">
<h3>Hobbies & Interests</h3>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('hobbies')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'hobbies')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('interests')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'interests')->textInput()->label(false);  ?>
</div>
</div>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('about_me')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'about_me')->textArea()->label(false);  ?>
</div>
</div>


</div>
<div class="saveButtons">
<?= Html::submitButton('Save', ['class' => 'savebtns']) ?>
</div>
<?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</main>
</div>
</div>