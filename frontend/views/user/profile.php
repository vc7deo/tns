<?php
use yii\bootstrap4\Html;
use common\helpers\Cms;
use common\models\Interest;
use yii\helpers\ArrayHelper;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');

$my_id= Yii::$app->user->identity->id;
// $query1 = (new \yii\db\Query())
//     ->select("user_to AS user, user_by, sent_at")
//     ->from('interest')
//     ->where(['user_from' => $my_id]);

// $query2 = (new \yii\db\Query())
//     ->select("user_from AS user, user_by, sent_at")
//     ->from('interest')
//     ->where(['user_to' => $my_id]);


// $query3 = $query1->union($query2);
// $results = $query3->createCommand()->queryAll();
// $users = ArrayHelper::index($results, 'user');
$send = Interest::find()->where(['user_from' => $my_id,'user_to'=> $model->id])->one();
$receive = Interest::find()->where(['user_to' => $my_id,'user_from'=> $model->id])->one();


  if(!empty($model->profile->photo1)){
      $img1= Yii::getAlias('@site/uploads/profile/') . $model->profile->photo1;
  }else{
      $img1= Yii::getAlias('@site/dist/images/user.jpg');
  }

  if(!empty($model->profile->photo2)){
      $img2= Yii::getAlias('@site/uploads/profile/') . $model->profile->photo2;
  }else{
      $img2= Yii::getAlias('@site/dist/images/user.jpg');
  }
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


<!--   -->

    <div class="sliderPopups">

  <div id="aniimated-thumbnials" class="slider-for">


          <a href="<?=$img1?>">
            <img src="<?=$img1?>" />
          </a>
          <?php if(!empty($model->profile->photo2)){ ?>
          <a href="<?=$img2?>">
            <img src="<?=$img2?>" />
          </a>
          <?php } ?>
   

      </div>
      <div class="slider-nav">
        <div class="item-slick">
          <img src="<?=$img1?>" alt="Alt">
        </div>
        <?php if(!empty($model->profile->photo2)){ ?>
        <div class="item-slick">
          <img src="<?=$img2?>" alt="Alt">
        </div>
        <?php } ?>

      </div>


    </div>



<!--   -->


</div>
<div class="aboutMe">
<h3><?= $model->fullname ?></h3>
<h5><?= $model->username ?></h5>
<h6>
<div><span>Last Login:</span><?= Cms::timeago($model->active); ?></div>
</h6>
<ul>
<li><?= ($model->age != '') ? $model->age. ' , ' : ''?><?=$model->profile->height.' '.$model->profile->height_unit?></li>
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
<?php if(empty($send->user_to)):?>
<?= Html::a('<i class="fa fa-heart" aria-hidden="true"></i> Send interest', ['/user/send','token' => $model->token],['class' => 'interestBtns']) ?>
<?php else:?>
  <div class="int-rec"><span>Sent an interest On:</span> <?= Cms::timeago($send->sent_at); ?></div>
<?php endif;?>

<?php if(!empty($receive->sent_at)):?>
  <div class="int-sent"><span>Received an interest On:</span> <?= Cms::timeago($receive->sent_at); ?></div>
<?php endif;?>
</div>
</div>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/layers.png" alt=""> Basic Details</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>First Name</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->first_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Last Name</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->last_name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Age</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?=($model->age != '') ? $model->age. ' ': '' ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Height</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><span><?= $model->profile->height ?></span> <?= $model->profile->height_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Weight</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><span><?= $model->profile->weight ?></span> <?= $model->profile->weight_unit ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Marital Status</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->marital_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Body Type</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->body_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Physical Status</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->physical_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Language Known</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->languages_known ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Eating Habits</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->eating_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Drinking Habits</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->drinking_habits ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Smoking Habits</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->smoking_habits ?></label>
</div>
</div>
<?php endif;?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/briefcase.png"> Professional Details</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Education</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->education ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Education Detail</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->education_details ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Employed in</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->employed_in ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Occupation</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->occupation ?></label>
</div>
</div>
<!--
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Occupation Detail</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->occupation_details ?></label>
</div>
</div>-->
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Annual Income</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->income ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/pray.png"> Religious Information</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Religion</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->religion ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Caste</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->caste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Subcaste</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->subCaste ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Star</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->star ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Raasi</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->rasi ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Suddha Jadhagam</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= !empty($model->profile->sudha_jathakam) ? 'Yes' : 'No' ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Gothram</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->gothram ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/family.png"> Family Details</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Family Type</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->family_type ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Family Status</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->family_status ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Father's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->fathers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Mother's Occupation</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->mothers_occupation ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Family Origin</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->origin ?></label>
</div>
</div>
<?php /*<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Contact Number</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label class="phoneShow">xxxxxxxxxx</label>
</div>
</div> */ ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>No. of Brothers</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->brothers ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>No. of Sister's</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->sisters ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>City</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->city ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>State</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->state ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Country</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->cntry->name ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Citizenship</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->citizenship ?></label>
</div>
</div>
<?php endif; ?>
</div>
<div class="detailSeprate">
<h3><img src="<?=$directoryAsset?>/images/hobby.png"> Hobbies &amp; Interests</h3>
<?php if(isset($model->profile)): ?>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Hobbies</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
<label><?= $model->profile->hobbies ?></label>
</div>
</div>
<div class="row arrageFiled">
<div class="col-xs-12 col-lg-5 hardFont">
<label>Interests</label>
</div>
<div class="col-xs-12 col-lg-7 lightFont">
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
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
        
            <div class="modal-body">
              <div class="modalPhone">
                  <img src="<?=$directoryAsset?>/images/call.png" />
              <?php if(Yii::$app->params['user.premium']==0){ ?>
                  <p>
                  Upgrade Your Profile
                  To View Phone Number
                  </p>
                  <p>Call : <?= !empty(Yii::$app->params['custom.upgrade-ph']) ? Yii::$app->params['custom.upgrade-ph'] : ""; ?></p>
              <?php }else{ ?>
                  <p>
                    <span>Thanks You for Being our Customer !!!</span>
                    <div>We sincerely appreciate your interest and hop you to contact <element><?= $model->first_name ?></element> on <element><?= $model->phone ?></element></div>
                    <p>Best Wishes for Your Future</p>
                 </p>
              <?php } ?>

              
              
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
