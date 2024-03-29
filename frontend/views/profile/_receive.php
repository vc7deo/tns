<?php
use common\helpers\Cms;
use yii\bootstrap4\Html;
use yii\helpers\ArrayHelper;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');


$my_id= Yii::$app->user->identity->id;


//         echo "<pre>";
       // echo "<pre>";
// print_r($model->send);exit();
$receives = Yii::$app->user->identity->receives;
$users = ArrayHelper::getColumn($receives, 'user_to');
//echo "<pre>"; print_r($users); exit;
?>

<div class="boxSizing">
<div class="ft-detail">
<div class="userSelect">
<img src="<?=$model->avatar?>" alt=""/>
</div>
<div class="userDetails">
<ul>
<li><?=$model->fullname?></li>
<li><?= ($model->age != '') ? $model->age. ' ,' : ''?> <?=$model->profile->height.' '.$model->profile->height_unit?>, <?= $model->profile->state ?></li>
<li><?= $model->profile->education ?>, <?= $model->profile->occupation ?>, <?= $model->profile->employed_in ?></li>
<li><?= $model->profile->cntry->name ?></li>
<!--<li><button><img src="<?=$directoryAsset?>/images/callWhite.png" altr="" /> Call</button></li>-->
</ul>
</div>
</div>
<div class="ft-detail int-getBack">

<div class="sentIntrestLogin">
<span>Received an interest On:</span> <?= Cms::timeago($model->receive->sent_at); ?>
</div>
<div>
<?php if(array_key_exists($model->id, $users)):?>

    <?= Html::a('<i class="fa fa-heart" aria-hidden="true"></i> Send interest', ['/user/send','token' => $model->token],['class' => 'interestBtns']) ?>
<?php else:?>

<?php endif;?>
</div>

<?php if(!in_array($model->id, $users)):?>
<?= Html::a('<i class="fa fa-heart" aria-hidden="true"></i> Send interest', ['/profile/send','token' => $model->token],['class' => 'interestBtns']) ?>
<?php endif; ?>


</div>
<div class="lastLogin">
<span>Last Login:</span>
<?= Cms::timeago($model->active); ?>
</div>
<div class="profileView">

<?= Html::a('View Profile', ['/user/profile','token' => $model->token],['class' => 'btn btn-success']) ?>
</div>
</div>