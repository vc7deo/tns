<?php
use yii\helpers\Html;
use yii\helpers\Url;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<div class="container">
<div class="page-wrapper">
<main class="main account">
<div class="page-content mt-4 mb-10 pb-6">
<div class="container">
<div class="tab tab-vertical row">
<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4 left-navs col-xs-6 col-12 contentFull">
<?= $this->render(
    '@frontend/views/common/menu',
    ['user' => $user]
) ?>
<?= $this->render(
    '@frontend/views/common/match'
) ?>

</ul>
<div class="col-lg-9 col-md-8 col-xs-6 col-12 contentFull">
<div class="detailSeprate">
<h3>About <?= $user->first_name ?></h3>
<div class="uploadImgProfile">
<div class="editUserPic">
<img src="<?=$user->avatar?>" alt="user">
</div>
<div class="aboutMe">
<?php if(isset($user->profile)): ?>
<p><?= $user->profile->about_me ?></p>
<?php endif;?>
</div>
</div>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/layers.png" alt=""> Basic Details</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>First Name</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->first_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Last Name</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->last_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Date of birth</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= date("d-m-Y",$user->profile->dob) ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Height</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><span><?= $user->profile->height ?></span> <?= $user->profile->height_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Weight</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><span><?= $user->profile->weight ?></span> <?= $user->profile->weight_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Marital Status</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->marital_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Body Type</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->body_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Physical Status</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->physical_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Language Known</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->languages_known ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Eating Habits</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->eating_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Drinking Habits</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->drinking_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Smoking Habits</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->smoking_habits ?></label>
</div>
</div>
<?php endif;?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/briefcase.png"> Professional Details</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Education</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->education ?></label>
</div>
</div>
<!--<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Education Detail</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->education_details ?></label>
</div>
</div>-->
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Employed in</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->employed_in ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Occupation</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->occupation ?></label>
</div>
</div>
<!--<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Occupation Detail</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->occupation_details ?></label>
</div>
</div>-->
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Annual Income</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->income ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/pray.png"> Religious Information</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Religion</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->religion ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Caste</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->caste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Subcaste</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->subCaste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Star</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->star ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Raasi</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->rasi ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Suddha Jadhagam</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= !empty($user->profile->sudha_jathakam) ? 'Yes' : 'No' ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Gothram</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->gothram ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/family.png"> Family Details</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Family Type</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->family_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Family Status</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->family_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Father's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->fathers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Mother's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->mothers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Family Origin</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->origin ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Contact Number</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label class="phoneShow"><?= $user->phone ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>No. of Brothers</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->brothers ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>No. of Sister's</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->sisters ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>City</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->city ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>State</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->state ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Country</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->cntry->name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Citizenship</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->citizenship ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/hobby.png"> Hobbies &amp; Interests</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Hobbies</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->hobbies ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Interests</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $user->profile->interests ?></label>
</div>
</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>