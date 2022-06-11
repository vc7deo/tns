<?php
use yii\helpers\Html;
use yii\helpers\Url;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
$action = Yii::$app->controller->action->id;
$edits = ['edit','basic','family'];
?>
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
<li class="nav-item">
<a class="nav-link <?=(in_array($action,$edits) === true) ? 'active' : '';?>" href="<?=Url::to(['profile/edit'])?>"><img src="<?=$directoryAsset?>/images/edit.png" alt=""/> Edit Profile</a>
</li>
<li class="nav-item">
<a class="nav-link <?=($action == 'interest-send') ? 'active' : '';?>"  href="<?=Url::to(['profile/interest-send'])?>"><img src="<?=$directoryAsset?>/images/send.png" alt=""/> Send Intrest</a>
</li>
<li class="nav-item">
<a class="nav-link <?=($action == 'interest-receive') ? 'active' : '';?>" href="<?=Url::to(['profile/interest-receive'])?>"><img src="<?=$directoryAsset?>/images/receive.png" alt=""/> Receive Intrest</a>
</li>
<li class="nav-item">
<a class="nav-link" href="<?=Url::to(['site/logout'])?>" data-method="post" ><img src="<?=$directoryAsset?>/images/logout.png" alt=""  /> Logout</a>
</li>
