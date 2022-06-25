<?php
use common\helpers\Cms;
use yii\bootstrap4\Html;
use common\models\Interest;
use yii\helpers\ArrayHelper;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
//         echo "<pre>";
// print_r($model->send);exit();
$my_id= Yii::$app->user->identity->id;
$receives = Yii::$app->user->identity->receives;
$send = Interest::find()->where(['user_from' => $my_id,'user_to'=> $model->id])->one();
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
<li><button><img src="<?=$directoryAsset?>/images/callWhite.png" altr="" /> Call</button></li>
</ul>
</div>
</div>
<div class="ft-detail">
<div class="sentIntrestLogin">
<span>Sent an interest On:</span> <?= Cms::timeago($send->sent_at); ?>
</div>

<div class="profileView">

<?= Html::a('View Profile', ['/user/profile','token' => $model->token],['class' => 'btn btn-success']) ?>

</div>
</div>
<div class="lastLogin">
<span>Last Login:</span>
<?= Cms::timeago($model->active); ?>
</div>
</div>