<?php
use yii\helpers\Html;
use yii\helpers\Url;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<div class="sliderPrime">
<div class="primeslider">
<?php foreach ($models as $model):?>
<?php if(isset($model->profile) && $model->profile->status == 1): ?>
<div class="slide">
<div class="boxSizingHome primeMembers">
<a href="<?=Url::to(['/user/profile','token' => $model->token])?>">
<div class="userSelectHome">
<img src="<?=$model->avatar?>" alt=""/>
</div>
<div class="homeuserDetails">
<ul>
<li><?=$model->first_name?></li>
<li><?= ($model->age != '') ? $model->age. ' ,' : ''?></li>
<li><?= $model->profile->city ?></li>
</ul>
</div>
</a>
</div>
</div>
<?php endif;?>
<?php endforeach;?>
</div>
</div>