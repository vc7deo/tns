<?php
use yii\bootstrap4\Html;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Modal;
Modal::begin([
'title'=>'Photo',
'headerOptions' => ['id' => 'modalHeader'],
'id' => 'modal-image',
'size'=>'modal-lg',
]);
echo "<div id='modalContentImage'></div>";
Modal::end();
?>
<div class="container">
<div class="page-wrapper">
<main class="main account">
<div class="page-content mt-4 mb-10 pb-6">
<div class="container">
<div class="tab tab-vertical row">
<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4 left-navs">
<div class="profileSide">
<div class="upgradient">
<div class="profileSmallImg">
<img src="<?=$user->avatar?>" alt="user">
</div>
<h5>Good Morning !</h5>
<h3><?= $user->fullname ?></h3>
<h4><?= $user->username ?></h4>
</div>
<div class="profileUpgarde">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
Upgrade Your Profile
</button>
</div>
</div>
<div class="topSliders">
<h4><img src="<?=$directoryAsset?>/images/couple.png" alt=""> Matching Profiles</h4>
<div class="sliderPrime">
<div class="primeslider slick-initialized slick-slider">
<div class="slick-list draggable"><div class="slick-track" style="opacity:1;width:774px;transform:translate3d(-86px,0px,0px)"><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="-1" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-current slick-active" tabindex="0" style="width:86px" data-slick-index="0" aria-hidden="false">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="0">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="1" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="2" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="3" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="4" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="5" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="6" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="7" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div></div></div></div>
</div>
<div class="sliderPrime">
<div class="favslider slick-initialized slick-slider">
<div class="slick-list draggable"><div class="slick-track" style="opacity:1;width:774px;transform:translate3d(-172px,0px,0px)"><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="-1" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="0" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-current slick-active" tabindex="0" style="width:86px" data-slick-index="1" aria-hidden="false">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="0">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="2" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="3" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="4" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="5" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="6" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="7" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div></div></div></div>
</div>
<div class="sliderPrime">
<div class="matchslider slick-initialized slick-slider">
<div class="slick-list draggable"><div class="slick-track" style="opacity:1;width:774px;transform:translate3d(-172px,0px,0px);transition:transform 500ms ease 0s"><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="-1" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="0" style="width:86px" data-slick-index="0" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="0">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-current slick-active" tabindex="-1" style="width:86px" data-slick-index="1" aria-hidden="false">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="2" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide" tabindex="-1" style="width:86px" data-slick-index="3" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="4" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="5" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="6" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div><div class="slide slick-slide slick-cloned" tabindex="-1" style="width:86px" data-slick-index="7" id="" aria-hidden="true">
<div class="boxSizingHome primeMembers">
<a href="" tabindex="-1">
<div class="userSelectHome">
<img src="<?=$directoryAsset?>/images/user.jpg" alt="">
</div>
<div class="homeuserDetails">
<ul>
<li>Vishnu</li>
<li>29 yrs, B.Tech</li>
<li>Ernakulam</li>
</ul>
</div>
</a>
</div>
</div></div></div></div>
</div>
</div>
</ul>
<div class="col-lg-9 col-md-8">
<div class="detailSeprate">
<h3>Photos</h3>
<?php if(isset($user->profile)): ?>
<div class="image1">
<div class="uploadImgProfile">
<div class="editUserPic">
<img src="<?=$directoryAsset?>/images/user.jpg">
</div>
</div>
<?= Html::a('Upload', ['/profile/photo-one'], [
                'class' => 'upload-image mx-2 btn btn-primary',
                'data-toggle' => 'tooltip',
                'data-placement' => 'top',
                'title' => 'Upload'
                ]) ;
?>
<?= Html::a('Delete', ['/profile/delete-image'], [
                'class' => 'change mx-2 btn btn-primary',
                'data-toggle' => 'tooltip',
                'data-placement' => 'top',
                'title' => 'Delete'
                ]) ;
?>
</div>

<div class="image2">
<div class="uploadImgProfile">
<div class="editUserPic">
<img src="<?=$directoryAsset?>/images/user.jpg">
</div>
</div>
<?= Html::a('Upload', ['/profile/photo-two'], [
                'class' => 'upload-image mx-2 btn btn-primary',
                'data-toggle' => 'tooltip',
                'data-placement' => 'top',
                'title' => 'Upload'
                ]) ;
?>
<?= Html::a('Delete', ['/profile/delete-image'], [
                'class' => 'change mx-2 btn btn-primary',
                'data-toggle' => 'tooltip',
                'data-placement' => 'top',
                'title' => 'Delete'
                ]) ;
?>
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
<?php
$script = 
"$(document).ready(function(){

    $('.upload-image').on('click', function(event) {
      event.preventDefault();
      $('#modal-image').modal('show')
      .find('#modalContentImage')
      .load($(this).attr('href'));
    });


 });
";
$this->registerJs($script);