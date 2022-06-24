<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
?>
<div class="container">
<div class="page-wrapper">
<main class="main account">
<div class="page-content mt-4 mb-10 pb-6">
<div class="container">
<div class="tab tab-vertical row">
<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4 left-navs col-xs-6 col-12 contentFull">
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
<?= $this->render(
    '@frontend/views/common/match'
) ?>

</ul>
<div class="col-lg-9 col-md-8 col-xs-6 col-12 contentFull">
<div class="homeSection">
<?php if ($dataProvider->totalCount > 0): ?>
<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '',
    'options' => ['class' => 'row'],
    'itemOptions'  => ['class' => "col-lg-4 col-sm-6 width-full"],
    'layout' => "{items}\n{pager}",
    'itemView' => function ($model, $key, $index, $widget) {
        if(isset($model->profile) && $model->profile->status == 1){
          return $this->render('_match',['model' => $model]);  
        }
    },
]);
?>
<?php else:?>
<p>No results found</p>
<?php endif;?>
</div>
</div>
</div>
</div>
</div>
</main>
</div>
</div>