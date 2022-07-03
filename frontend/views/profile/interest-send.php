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
<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4 left-navs col-xs-6 col-12 contentFull">
<?= $this->render(
    '@frontend/views/common/menu',
    ['user' => $user]
) ?>
<?= $this->render(
    '@frontend/views/common/match'
) ?>
</ul>
<div class="col-lg-9 col-md-8 col-xs-6 col-12 contentFull">
<?php if ($dataProvider->totalCount > 0): ?>
<?=
ListView::widget([
    'dataProvider' => $dataProvider,
    'emptyText' => '',
        'itemOptions' => [

        'tag' => false

    ],
    'layout' => "{items}\n<nav class='pagination-nav'>
                                    {pager}
                                </nav>",
    'itemView' => function ($model, $key, $index, $widget) {
        if(isset($model->profile)){
          return $this->render('_send',['model' => $model]);  
        }
    },
    'pager' => [
                    'nextPageLabel' => "<i class='fa fa-arrow-circle-right' aria-hidden='true'></i> ",
                    'prevPageLabel' => " <i class='fa fa-arrow-circle-left' aria-hidden='true'></i>",
                    'maxButtonCount' => 1,
                    'options' => [
                        'tag' => 'ul',
                        'class' => 'pagination',
                    ]
                ],
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