<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
use yii\bootstrap4\ActiveForm;
$photo1 = $photo2 = \yii\helpers\Html::img(Yii::getAlias('@site/dist/images/user.jpg'));
if(!empty(Yii::$app->user->identity->profile->photo1)){
    $photo1 = \yii\helpers\Html::img(Yii::getAlias('@site/uploads/profile/').Yii::$app->user->identity->profile->photo1);
}
if(!empty(Yii::$app->user->identity->profile->photo2)){
    $photo2 = \yii\helpers\Html::img(Yii::getAlias('@site/uploads/profile/').Yii::$app->user->identity->profile->photo2);
}
?>

<div class="container">
<div class="page-wrapper">
<main class="main account">
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

<div class="detailSeprate">
<h3>Photos</h3>
<div class="uploadImg">
<?php if(isset($user->profile)): ?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

     <div class="wrap-image">
    <?= $form->field($avatar, 'image1')->widget(\dosamigos\fileinput\FileInput::className(), [
    'options' => ['accept' => 'image/*'],
    'thumbnail' => $photo1,
    'style' => \dosamigos\fileinput\FileInput::STYLE_CUSTOM,
    'customView' => '@frontend/views/profile/imageField.php',
])->hint('')->label(false)?>
   <div style="visibility: hidden">
    <?= $form->field($avatar, 'image2')->widget(\dosamigos\fileinput\FileInput::className(), [
    'options' => ['accept' => 'image/*'],
    'thumbnail' => $photo2,
    'style' => \dosamigos\fileinput\FileInput::STYLE_CUSTOM,
    'customView' => '@frontend/views/profile/imageField.php',
])->hint('') ->label(false)?>
   </div>
</div>
  
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
<?php endif; ?>

</div>
</div>
<?php 
// $form = ActiveForm::begin([
//     'layout' => 'horizontal',
//     'fieldConfig' => [
//         'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
//         'horizontalCssClasses' => [
//             'label' => 'col-xs-12 col-lg-5',
//             //'offset' => 'offset-sm-4',
//             'wrapper' => 'col-xs-12 col-lg-7',
//             'error' => '',
//             'hint' => '',
//         ],
//         'options' => ['class' => 'row arrageFiled'],
//     ],
// ]);
$accountForm =  ActiveForm::begin(['id' => 'signup-form','enableAjaxValidation' => true, 'validationUrl' => ['profile/validation']]);
 ?>
<div class="detailSeprate">
<h3>Account Details</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$account->getAttributeLabel('first_name')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $accountForm->field($account, 'first_name')->textInput()->label(false); ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$account->getAttributeLabel('last_name')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $accountForm->field($account, 'last_name')->textInput()->label(false); ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$account->getAttributeLabel('email')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $accountForm->field($account, 'email')->textInput()->label(false); ?>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label><?=$account->getAttributeLabel('phone')?></label>
</div>
<div class="col-xs-12 col-lg-7">
<?= $accountForm->field($account, 'phone')->textInput()->label(false); ?>
</div>
</div>
<div class="saveButtons">
<?= Html::submitButton('Save', ['class' => 'savebtns']) ?>
<?= Html::a('Basic Details', ['/profile/basic'],['class' => 'cancelbtns']) ?>
</div>
</div>
<?php ActiveForm::end(); ?>
<!-- 
<div class="detailSeprate">
<h3>Professional Details</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Education</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" value="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Education Detail</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" value="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Employed in</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>
Select
</option>
<option>
Private Sector
</option>
<option>
Public Sector
</option>
<option>
Social
</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>
Select
</option>
<option>
Business
</option>
<option>
Software
</option>
<option>
hardware
</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Occupation Detail</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" value="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Annual Income</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>
Select
</option>
<option>
< 100000
</option>
<option>
2000000 to 500000
</option>
</select>
</div>
</div>
<div class="saveButtons">
<input type="button" class="savebtns" value="save" name="">
<input type="button" class="cancelbtns" value="cancel" name="">
</div>
</div> -->

<!-- <div class="detailSeprate">
<h3>Religious Information</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Religion</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" value="Hindu">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Caste</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" value="Nair">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Subcaste</label>
</div>
<div class="col-xs-12 col-lg-7">
<div class="row">
<div class="col-sm-6 ful-width">
<select>
<option>
Select
</option>
<option>
Menon
</option>
<option>
Nambiar
</option>
<option>
Pillai
</option>
<option>
Unnithan
</option>
</select>
</div>
<div class="col-sm-6">
<input type="text" placeholder="if any" name="">
</div>
</div>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Star</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Select</option>
<option>Chothi</option>
<option>Uthradam</option>
<option>Vishakam</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Raasi</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Select</option>
<option>Thulam(Libra)</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Suddha Jadhagam</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="radio" value="yes" name="">
Yes
<input type="radio" value="no" name="">
No
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Gothram</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" value="" name="">
</div>
</div>
<div class="saveButtons">
<input type="button" class="savebtns" value="save" name="">
<input type="button" class="cancelbtns" value="cancel" name="">
</div>
</div> -->

<!-- 
<div class="detailSeprate">
<h3>Family Details</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Type</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>
Select
</option>
<option>
Nuclear Familt
</option>
<option>
Join Family
</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>
Select
</option>
<option>
Affulent
</option>
<option>
Upper Middle Class
</option>
<option>
Middle Class
</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Father's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" name="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Mother's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" name="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Origin</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Select</option>
<option>ernakulam</option>
<option>kannur</option>
<option>kollam</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Contact Number</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" name="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>No. of Brothers</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" name="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>No. of Sister's</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" name="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>City</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Current City</option>
<option>Kollam</option>
<option>Ernakulam</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>State</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Current State</option>
<option>Kerala</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Country</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Current Country</option>
<option>India</option>
</select>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Citizenship</label>
</div>
<div class="col-xs-12 col-lg-7">
<select>
<option>Citizenship</option>
<option>Indian</option>
</select>
</div>
</div>
<div class="saveButtons">
<input type="button" class="savebtns" value="save" name="">
<input type="button" class="cancelbtns" value="cancel" name="">
</div>
</div> -->

<!-- <div class="detailSeprate">
<h3>Hobbies & Interests</h3>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Hobbies</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" placeholder="eg: Singing, Dancing" value="">
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Interests</label>
</div>
<div class="col-xs-12 col-lg-7">
<input type="text" placeholder="eg: Movies, Photography" value="">
</div>
</div>
<div class="saveButtons">
<input type="button" class="savebtns" value="save" name="">
<input type="button" class="cancelbtns" value="cancel" name="">
</div>
</div> -->

</div>



</div>
</div>
</div>
</main>
</div>
</div>