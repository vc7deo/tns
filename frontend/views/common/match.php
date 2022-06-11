<?php
use yii\helpers\Html;
use yii\helpers\Url;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<div class="topSliders">
<h4><img src="<?=$directoryAsset?>/images/couple.png" alt="" /> Matching Profiles</h4>
<?= \frontend\widgets\PrimeSlider::widget() ?>
<?= \frontend\widgets\RecentSlider::widget() ?>

</div>