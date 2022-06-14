<?php
use yii\bootstrap4\Html;
use common\helpers\Cms;
use yii\helpers\ArrayHelper;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');

$my_id= Yii::$app->user->identity->id;
$query1 = (new \yii\db\Query())
    ->select("user_to AS user, user_by, sent_at")
    ->from('interest')
    ->where(['user_from' => $my_id]);

$query2 = (new \yii\db\Query())
    ->select("user_from AS user, user_by, sent_at")
    ->from('interest')
    ->where(['user_to' => $my_id]);

$query3 = $query1->union($query2);
$results = $query3->createCommand()->queryAll();
$users = ArrayHelper::index($results, 'user');
?>
<div class="container">
<div class="page-wrapper">
<main class="main account">
<div class="page-content mt-4 mb-10 pb-6">
<div class="container">
<div class="tab tab-vertical row">
<div class="col-lg-12 col-md-12">
<div class="detailSeprate">
<div class="uploadImgProfile">
<div class="editUserPic">
<img src="<?= (isset($model->avatar))? $model->avatar : $model->avatar ?>" />
</div>
<div class="editUserPic">
<img src="<?= (isset($model->avatar))? $model->avatar : $model->avatar ?>" />
</div>
<div class="aboutMe">
<h3><?= $model->fullname ?></h3>
<h5><?= $model->username ?></h5>
<h6>
<div><span>Last Login:</span><?= Cms::timeago($model->active); ?></div>
</h6>
<ul>
<li><?= ($model->age != '') ? $model->age. ' Yrs , ' : ''?><?=$model->profile->height.' '.$model->profile->height_unit?></li>
<!-- <li>Mother Tongue is <span>Marathi</span></li> -->
</ul>
<button type="button" class="otherprofileCall" data-toggle="modal" data-target="#exampleModal1">
<img src="<?=$directoryAsset?>/images/callWhite.png" altr="" /> Call
</button>
</div>
<div class="aboutMe">
<ul>
<li>Lives in <span><?= $model->profile->city ?></span></li>
<li>Studied <span><?= $model->profile->education ?></span></li>
<li><?= $model->profile->occupation ?></li>
</ul>
<?php if(array_key_exists($model->id, $users)):?>
<?php if($users[$model->id]['user'] == $users[$model->id]['user_by']):?>
<span>Received an interest On:</span> <?= Cms::timeago($users[$model->id]['sent_at']); ?>
<?php else:?>
<span>Sent an interest On:</span> <?= Cms::timeago($users[$model->id]['sent_at']); ?>
<?php endif;?>
<?php else:?>
<?= Html::a('<i class="fa fa-heart" aria-hidden="true"></i> Send interest', ['/user/send','token' => $model->token],['class' => 'interestBtns']) ?>
<?php endif;?>

</div>
</div>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/layers.png" alt=""> Basic Details</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>First Name</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->first_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Last Name</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->last_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Age</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?=($model->age != '') ? $model->age. ' Yrs ': '' ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Height</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><span><?= $model->profile->height ?></span> <?= $model->profile->height_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Weight</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><span><?= $model->profile->weight ?></span> <?= $model->profile->weight_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Marital Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->marital_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Body Type</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->body_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Physical Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->physical_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Language Known</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->languages_known ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Eating Habits</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->eating_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Drinking Habits</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->drinking_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Smoking Habits</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->smoking_habits ?></label>
</div>
</div>
<?php endif;?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/briefcase.png"> Professional Details</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Education</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->education ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Education Detail</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->education_details ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Employed in</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->employed_in ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Occupation Detail</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->occupation_details ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Annual Income</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->income ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/pray.png"> Religious Information</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Religion</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->religion ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Caste</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->caste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Subcaste</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->subCaste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Star</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->star ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Raasi</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->rasi ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Suddha Jadhagam</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= !empty($model->profile->sudha_jathakam) ? 'Yes' : 'No' ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Gothram</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->gothram ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/family.png"> Family Details</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Type</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->family_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Status</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->family_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Father's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->fathers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Mother's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->mothers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Family Origin</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->origin ?></label>
</div>
</div>
<?php /*<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Contact Number</label>
</div>
<div class="col-xs-12 col-lg-7">
<label class="phoneShow">xxxxxxxxxx</label>
</div>
</div> */ ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>No. of Brothers</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->brothers ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>No. of Sister's</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->sisters ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>City</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->city ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>State</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->state ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Country</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->cntry->name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Citizenship</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->citizenship ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/hobby.png"> Hobbies &amp; Interests</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Hobbies</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->hobbies ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5">
<label>Interests</label>
</div>
<div class="col-xs-12 col-lg-7">
<label><?= $model->profile->interests ?></label>
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