<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;

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
<h3>Basic Details</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('height')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<div class="row">
<div class="col-xs-6 col-lg-6">
<?= $form->field($model, 'height')->textInput()->label(false); ?>
</div>
<div class="col-xs-6 col-lg-6">
<?= $form->field($model, 'height_unit')->dropDownList(['Feet' => 'Feet','Centimeter' => 'Centimeter'])->label(false) ?>
</div>
</div>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('weight')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<div class="row">
<div class="col-xs-6 col-lg-6">
<?= $form->field($model, 'weight')->textInput()->label(false); ?>
</div>
<div class="col-xs-6 col-lg-6">
 <?= $form->field($model, 'weight_unit')->dropDownList(['Kilogram' => 'Kilogram'])->label(false) ?>
</div>
</div>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('marital_status')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'marital_status')->dropDownList(['Never Married' => 'Never Married', 'Married' => 'Married', 'Widow' => 'Widow' ],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('body_type')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'body_type')->dropDownList(['Slim' => 'Slim', 'Athletic' => 'Athletic', 'Average' => 'Average','Heavy' => 'Heavy'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('physical_status')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'physical_status')->dropDownList(['Normal' => 'Normal', 'Physically Challenged' => 'Physically Challenged'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('languages_known')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'languages_known')->checkboxList(['Malayalam' => 'Malayalam', 'English' => 'English','Hindi' => 'Hindi','Tamil' => 'Tamil'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('eating_habits')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'eating_habits')->dropDownList(['Vegetarian' => 'Vegetarian', 'Non Vegetarian' => 'Non Vegetarian', 'Eggetarian' => 'Eggetarian'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('drinking_habits')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'drinking_habits')->dropDownList(['No' => 'No', 'Drink Socially' => 'Drink Socially', 'Yes' => 'Yes'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('smoking_habits')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'smoking_habits')->dropDownList(['No' => 'No', 'Occasionally' => 'Occasionally', 'Yes' => 'Yes'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
</div>
<!-- Professional -->
<div class="detailSeprate">
<h3>Professional Details</h3>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('education')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'education')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('education_details')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'education_details')->textInput()->label(false);  ?>
</div>
</div>

<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('employed_in')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'employed_in')->dropDownList(['Private Sector' => 'Private Sector', 'Public Sector' => 'Public Sector', 'Social' => 'Social'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('occupation')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'occupation')->dropDownList(['Business' => 'Business', 'Software' => 'Software', 'Hardware' => 'Hardware'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('occupation_details')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'occupation_details')->textInput()->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('income')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'income')->dropDownList(['Less Than 100000' => 'Less Than 100000', '2000000 to 500000' => '2000000 to 500000'],['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('religion')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'religion')->dropDownList(['Hindu' => 'Hindu'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('caste')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'caste')->dropDownList(['Nair' => 'Nair'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('sub_caste')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'sub_caste')->dropDownList(['Adiyodi'      => 'Adiyodi', 
                                                     'Anthur Nair'  => 'Anthur Nair', 
                                                     'Illam'        => 'Illam',
                                                     'Kaimal'       => 'Kaimal',
                                                     'Kartha'       => 'Kartha', 
                                                     'Kiryathil'    => 'Kiryathil', 
                                                     'Kurup'        => 'Kurup',
                                                     'Maniyani'     => 'Maniyani', 
                                                     'Tharakan'     => 'Tharakan', 
                                                     'Mannadiar'    => 'Mannadiar',
                                                     'Marar'        => 'Marar', 
                                                     'Menon'        => 'Menon', 
                                                     'Nair'         => 'Nair',
                                                     'Nambiar Nair' => 'Nambiar Nair', 
                                                     'Panicker'     => 'Panicker', 
                                                     'Pillai'       => 'Pillai',
                                                     'Poduval'      => 'Poduval', 
                                                     'Thampi'       => 'Thampi', 
                                                     'Unnithan'     => 'Unnithan',
                                                     'Vaniya Nair'  => 'Vaniya Nair',
                                                     'Veluthedath Nair'     => 'Veluthedath Nair',
                                                     'Vilakithala Nair'     => 'Vilakithala Nair',
                                                     'Vellala Pillai'       => 'Vellala Pillai',
                                                     'Chakkala Nair'        => 'Chakkala Nair'],
                                                     ['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('other')?></label>
</div>
<div class="col-xs-12 col-lg-7">
 <?= $form->field($model, 'other')->textInput() ->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('star')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'star')->dropDownList(['Aswathi' => 'Aswathi', 
                                                'Bharani' => 'Bharani', 
                                                'Karthika' => 'Karthika', 
                                                'Rohini' => 'Rohini',
                                                'Makayiram' => 'Makayiram',
                                                'Thiruvathira' => 'Thiruvathira',
                                                'Punartham' => 'Punartham',
                                                'Pooyam' => 'Pooyam',
                                                'Aayilyam' => 'Aayilyam',
                                                'Makam'=> 'Makam',
                                                'Pooram' => 'Pooram',
                                                'Uthram' => 'Uthram',
                                                'Atham' => 'Atham',
                                                'Chithira' => 'Chithira',
                                                'Chothi' => 'Chothi',
                                                'Vishakam' => 'Vishakam',
                                                'Anizham' => 'Anizham',
                                                'Thrikketta' => 'Thrikketta',
                                                'Moolam' => 'Moolam',
                                                'Pooradam' => 'Pooradam',
                                                'Uthradam' => 'Uthradam',
                                                'Thiruvonam' => 'Thiruvonam',
                                                'Avittam' => 'Avittam',
                                                'Chathayam' => 'Chathayam',
                                                'Pooruruthathi' => 'Pooruruthathi',
                                                'Uthrattathi' => 'Uthrattathi',
                                                'Revathi' => 'Revathi'],
                                                ['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('rasi')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'rasi')->dropDownList(['Chingam' => 'Chingam', 
                                                'Kanni' => 'Kanni', 
                                                'Thulam' => 'Thulam',
                                                'Vrischikam' => 'Vrischikam', 
                                                'Dhanu' => 'Dhanu', 
                                                'Makaram' => 'Makaram',
                                                'Kumbham' => 'Kumbham', 
                                                'Meenam' => 'Meenam', 
                                                'Medam' => 'Medam',
                                                'Edavam' => 'Edavam', 
                                                'Mithunam' => 'Mithunam', 
                                                'Karkidakam' => 'Karkidakam'],
                                                ['prompt' => 'Select'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('sudha_jathakam')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'sudha_jathakam')->radioList([0 => 'No', 1 => 'Yes'])->label(false);  ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$model->getAttributeLabel('gothram')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $form->field($model, 'gothram')->textInput()->label(false);  ?>
</div>
</div>
</div>
<div class="saveButtons">
<?= Html::submitButton('Save', ['class' => 'savebtns']) ?>
<?= Html::a('Family Details', ['/profile/family'],['class' => 'cancelbtns']) ?>
</div>
<?php ActiveForm::end(); ?>

</div>
</div>
</div>
</div>
</main>
</div>
</div>