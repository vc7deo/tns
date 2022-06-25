<?php
use yii\bootstrap4\Html;
?>
<div class="boxSizingHome">
<div class="userSelectDemo">
<img src="<?=$model->avatar?>" alt="<?=$model->fullname?>"/>
</div>
<div class="homeuserDetails">
<ul>
<li><?=$model->first_name?></li>
<li><?= ($model->age != '') ? $model->age. ' ,' : ''?> <?=$model->profile->height.' '.$model->profile->height_unit?></li>
<li>Ernakulam</li>
<li>
<?= Html::a('View Profile', ['/user/profile','token' => $model->token],['class' => '']) ?>
</li>
</ul>
</div>
</div>