<?php
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\User;
use common\models\Interest;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
$action = Yii::$app->controller->action->id;
$edits = ['edit','basic','family'];

$user = Yii::$app->user->identity;
$receives  = Interest::find()
                         ->leftJoin('user', 'user.id = interest.user_from')
                         ->where(['user_to' => $user->id, 'user.status' => 10])->count();
$send 		= Interest::find()
                         ->leftJoin('user', 'user.id = interest.user_to')
                         ->where(['user_by' => $user->id, 'user.status' => 10])->count();
?>
<div class="profileSide">
<div class="upgradient">
<div class="profileSmallImg">
<img src="<?=$user->avatar?>" alt="user">
</div>
<h5>Hello !</h5>
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
<a class="nav-link <?=($action == 'interest-send') ? 'active' : '';?>"  href="<?=Url::to(['profile/interest-send'])?>"><img src="<?=$directoryAsset?>/images/send.png" alt=""/> Send Interest (<?= $send; ?>)</a>
</li>
<li class="nav-item">
<a class="nav-link <?=($action == 'interest-receive') ? 'active' : '';?>" href="<?=Url::to(['profile/interest-receive'])?>"><img src="<?=$directoryAsset?>/images/receive.png" alt=""/> Receive Interest (<?= $receives; ?>)</a>
</li>

<li class="nav-item">
<a class="nav-link" href="<?=Url::to(['site/logout'])?>" data-method="post" ><img src="<?=$directoryAsset?>/images/logout.png" alt=""  /> Logout</a>
</li>
<li class="nav-item">
<a class="nav-link deactivate" href="<?=Url::to(['user/deactivate'])?>" data-confirm="Do You Want To Deactivate Your Account?" data-method="post" ><img src="<?=$directoryAsset?>/images/disable.png" alt=""  /> Deactivate</a>
</li>
