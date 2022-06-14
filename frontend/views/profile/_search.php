<?php
use common\helpers\Cms;
use yii\bootstrap4\Html;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<div class="boxSizing">
<div class="ft-detail">
<div class="userSelect">
<img src="<?=$model->avatar?>" alt="<?=$model->fullname?>"/>
</div>
<div class="userDetails">
<ul>
<li><?=$model->fullname?></li>
<li><?= ($model->age != '') ? $model->age. ' Yrs ,' : ''?> <?=$model->profile->height.' '.$model->profile->height_unit?>, <?= $model->profile->state ?></li>
<li><?= $model->profile->education ?>, <?= $model->profile->occupation ?>, <?= $model->profile->employed_in ?></li>
<li><?= $model->profile->cntry->name ?></li>
<li><button><img src="<?=$directoryAsset?>/images/callWhite.png" altr="" /> Call</button></li>
</ul>
</div>
</div>
<div class="ft-detail">
<div class="sentIntrestLogin">
<?php if(array_key_exists($model->id, $users)):?>
<?php if($users[$model->id]['user'] == $users[$model->id]['user_by']):?>
<span>Received an interest On:</span> <?= Cms::timeago($users[$model->id]['sent_at']); ?>
<?php else:?>
<span>Sent an interest On:</span> <?= Cms::timeago($users[$model->id]['sent_at']); ?>
<?php endif;?>
<?php else:?>
<?php endif;?>
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