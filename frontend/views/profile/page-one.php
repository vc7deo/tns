<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use kartik\date\DatePicker;

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
if(!$model->isNewRecord){
  $model->languages_known = explode(',', $model->languages_known);
  $model->dob = date('d-m-Y',$model->dob);
}
?>
    <div class="container">
    	<?php $form = ActiveForm::begin(['id' => 'signup-form']); ?>
      <div class="flex-home-reg">
          <div class="row">
              <div class="col-lg-6 col-sm-12">
                   <div class="regPolicy">
            <div class="detailSeprate">
          <h3>Basic Details</h3>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'dob')->widget(DatePicker::classname(), [
    'readonly' => true,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'dd-mm-yyyy',
        'todayHighlight' => true,
        'endDate' => "-21y"
    ],
]);?>
      </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'height')->textInput() ?>
			</div>
			<div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'height_unit')->dropDownList(['Feet' => 'Feet','Centimeter' => 'Centimeter'])->label("&nbsp") ?>
            </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'weight')->textInput() ?>
			</div>
			<div class="col-xs-6 col-lg-6">
            <?= $form->field($model, 'weight_unit')->dropDownList(['Kilogram' => 'Kilogram'])->label("&nbsp") ?>
            </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'marital_status')->dropDownList(['Never Married' => 'Never Married', 'Married' => 'Married', 'Widow' => 'Widow' ],['prompt' => 'Select']) ?>
            </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'body_type')->dropDownList(['Slim' => 'Slim', 'Athletic' => 'Athletic', 'Average' => 'Average','Heavy' => 'Heavy'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'physical_status')->dropDownList(['Normal' => 'Normal', 'Physically Challenged' => 'Physically Challenged'],['prompt' => 'Select']) ?>
           </div>
        </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'languages_known')->checkboxList(['Malayalam' => 'Malayalam', 'English' => 'English','Hindi' => 'Hindi','Tamil' => 'Tamil']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'eating_habits')->dropDownList(['Vegetarian' => 'Vegetarian', 'Non Vegetarian' => 'Non Vegetarian', 'Eggetarian' => 'Eggetarian'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'drinking_habits')->dropDownList(['No' => 'No', 'Drink Socially' => 'Drink Socially', 'Yes' => 'Yes'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled Habitsspan">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'smoking_habits')->dropDownList(['No' => 'No', 'Occasionally' => 'Occasionally', 'Yes' => 'Yes'],['prompt' => 'Select']) ?>
           </div>
          </div>

        </div>
        </div>
              </div>
              <div class="col-lg-6 col-sm-12">
                    <div class="regPolicyRight">
            <div class="detailSeprate">
          <h3>Professional Details</h3>
          <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'education')->textInput() ?>
			</div>
          </div>
          <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'education_details')->textInput() ?>
			</div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'employed_in')->dropDownList(['Private Sector' => 'Private Sector', 'Public Sector' => 'Public Sector', 'Social' => 'Social'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'occupation')->dropDownList(['Business' => 'Business', 'Software' => 'Software', 'Hardware' => 'Hardware'],['prompt' => 'Select']) ?>
           </div>
          </div>
          <div class="row arrageFiled">
   <div class="col-xs-12 col-lg-12">
            <?= $form->field($model, 'occupation_details')->textInput() ?>
			</div>
          </div>

          <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'income')->dropDownList(['Less Than 100000' => 'Less Than 100000', '2000000 to 500000' => '2000000 to 500000'],['prompt' => 'Select']) ?>
           </div>
          </div>
         
            <h3>Religious Information</h3>
            <div class="row arrageFiled">
            	<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'sub_caste')->dropDownList(['Menon' => 'Menon', 'Nambiar' => 'Nambiar', 'Pillai' => 'Pillai','Unnithan' => 'Unnithan'],['prompt' => 'Select']) ?>
            </div>
        </div>
            <div class="row arrageFiled">
            	<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'star')->dropDownList(['Aswathi' => 'Aswathi', 'Bharani' => 'Bharani', 'Rohini' => 'Rohini','Makayiram' => 'Makayiram'],['prompt' => 'Select']) ?>
            </div>
        </div>
            <div class="row arrageFiled">
            <div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'rasi')->dropDownList(['Medam' => 'Medam', 'Edavam' => 'Edavam', 'Midhunam' => 'Midhunam','Karkidakam' => 'Karkidakam'],['prompt' => 'Select']) ?>
            </div>
            </div>
  
            <div class="row arrageFiled">
            	<div class="col-xs-12 col-lg-12">
<?= $form->field($model, 'sudha_jathakam')->radioList([0 => 'No', 1 => 'Yes']) ?>
            </div>
        </div>
            <div class="row arrageFiled">
              <div class="col-xs-12 col-lg-12">
		<?= $form->field($model, 'gothram')->textInput() ?>              
		</div>
            </div>

          </div>
        
        </div>
              </div>
          </div>


      </div>
      <div class="saveButtonsReg">
<?= Html::submitButton('Continue', ['class' => 'savebtns', 'name' => 'login-button']) ?>

      </div>
      <?php ActiveForm::end(); ?>
    </div>