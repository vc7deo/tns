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
<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4 left-navs">
<?= $this->render(
    '@frontend/views/common/menu',
    ['user' => $user]
) ?>
<?= $this->render(
    '@frontend/views/common/match'
) ?>

</ul>
<div class="col-lg-9 col-md-8">
<div class="detailSeprate">
<h3>About Me</h3>
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
<div class="col-xs-12 col-lg-5">
<label>First Name</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->first_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Last Name</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->last_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Date of birth</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= date("d-m-Y",$user->profile->dob) ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Height</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><span><?= $user->profile->height ?></span> <?= $user->profile->height_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Weight</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><span><?= $user->profile->weight ?></span> <?= $user->profile->weight_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Marital Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->marital_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Body Type</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->body_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Physical Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->physical_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Language Known</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->languages_known ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Eating Habits</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->eating_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Drinking Habits</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->drinking_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Smoking Habits</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->smoking_habits ?></label>
</div>
</div>
<?php endif;?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/briefcase.png"> Professional Details</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Education</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->education ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Education Detail</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->education_details ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Employed in</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->employed_in ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Occupation Detail</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->occupation_details ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Annual Income</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->income ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/pray.png"> Religious Information</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Religion</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->religion ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Caste</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->caste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Subcaste</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->subCaste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Star</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->star ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Raasi</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->rasi ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Suddha Jadhagam</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= !empty($user->profile->sudha_jathakam) ? 'Yes' : 'No' ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Gothram</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->gothram ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/family.png"> Family Details</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Type</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->family_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->family_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Father's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->fathers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Mother's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->mothers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Origin</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->origin ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Contact Number</label>
</div>
<div class="col-xs-12 col-lg-7">
<label class="phoneShow">xxxxxxxxxx</label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>No. of Brothers</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->brothers ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>No. of Sister's</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->sisters ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>City</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->city ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>State</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->state ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Country</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->cntry->name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Citizenship</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->citizenship ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/hobby.png"> Hobbies &amp; Interests</h3>
<?php if(isset($user->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Hobbies</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $user->profile->hobbies ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Interests</label>
</div>
<div class="col-xs-12 col-lg-7">
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