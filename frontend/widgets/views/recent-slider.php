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
<li><?= substr($model->first_name, 0, 15) ?><?php if (strlen($model->first_name) > 15) { echo ".."; } ?></li>
<li><?= ($model->age != '') ? $model->age. ' ,' : ''?></li>
<li><?= substr($model->profile->city, 0, 15) ?><?php if (strlen($model->profile->city) > 15) { echo ".."; } ?></li>
</ul>
</div>
</a>
</div>
</div>
<?php endif;?>
<?php endforeach;?>
</div>
</div>