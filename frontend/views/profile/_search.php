<?php
use common\helpers\Cms;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<div class="boxSizing">
<div class="ft-detail">
<div class="userSelect">
<img src="<?=$model->avatar?>" alt=""/>
</div>
<div class="userDetails">
<ul>
<li>Vishnu</li>
<li><?= ($model->age != '') ? $model->age. ' Yrs ,' : ''?> <?=$model->profile->height.' '.$model->profile->height_unit?>, <?= $model->profile->state ?></li>
<li><?= $model->profile->education ?>, <?= $model->profile->occupation ?>, <?= $model->profile->employed_in ?></li>
<li><?= $model->profile->cntry->name ?></li>
<li><button><img src="<?=$directoryAsset?>/images/callWhite.png" altr="" /> Call</button></li>
</ul>
</div>
</div>
<div class="ft-detail">
<div class="sentIntrestLogin">
<span>Send Interest On:</span> Yesterday
</div>
<div class="profileView">
<button>
View Profile
</button>
</div>
</div>
<div class="lastLogin">
<span>Last Login:</span>
<?= Cms::timeago($model->active); ?>
</div>
</div>