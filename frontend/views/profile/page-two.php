<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use common\models\Country;
use yii\helpers\ArrayHelper;

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
    <div class="container">
    	<?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
      <div class="flex-home-reg">
           <div class="row">
              <div class="col-lg-6 col-sm-12">
        <div class="regPolicy">
            <div class="detailSeprate">
                <h3>Family Details</h3>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'family_type')->dropDownList(['Nuclear Family' => 'Nuclear Family', 'Joint Family' => 'Joint Family'],['prompt' => 'Select']) ?>
            </div>
          </div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'family_status')->dropDownList(['Affluent' => 'Affluent', 'Upper Middle Class' => 'Upper Middle Class','Middle Class' => 'Middle Class'],['prompt' => 'Select']) ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'fathers_occupation')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'mothers_occupation')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'origin')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'brothers')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'sisters')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'city')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'state')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'country')->dropDownList(ArrayHelper::map(Country::find()->all(), 'id', 'name'),['prompt' => 'Select']) ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'citizenship')->textInput() ?>
</div>
</div>            
</div>
</div>
</div>
 <div class="col-lg-6 col-sm-12">
<div class="regPolicyRight">
<div class="detailSeprate">
<h3>Hobbies & Interests</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'hobbies')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'interests')->textInput() ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'about_me')->textArea() ?>
</div>
</div>
            </div>
        </div>
</div>
</div>
      </div>

      <div class="saveButtonsReg">
<?= Html::submitButton('Save', ['class' => 'savebtns', 'name' => 'login-button']) ?>

      </div>
      <?php ActiveForm::end(); ?>
    </div>