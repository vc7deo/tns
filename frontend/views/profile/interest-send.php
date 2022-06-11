<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
use yii\widgets\ListView;
?>
<div class="container">
<div class="page-wrapper">
<main class="main account">
<div class="page-content mt-4 mb-10 pb-6">
<div class="container">
<div class="tab tab-vertical row">
<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4 left-navs">
<?= $this->render(
    '@frontend/views/common/menu',
    ['user' => $user]
) ?>
<?= $this->render(
    '@frontend/views/common/match'
) ?>
</ul>
<div class="col-md-9">
<?php if ($dataProvider->totalCount > 0): ?>
<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '',
        'itemOptions' => [

        'tag' => false

    ],
    'layout' => "{items}\n{pager}",
    'itemView' => function ($model, $key, $index, $widget) {
        if(isset($model->profile)){
          return $this->render('_send',['model' => $model]);  
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
</main>
</div>
</div>