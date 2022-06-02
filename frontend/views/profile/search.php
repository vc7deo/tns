<?php
use yii\bootstrap4\Html;
use yii\helpers\Url;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
use yii\bootstrap4\ActiveForm;
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
<div class="col-lg-9 col-md-8">
<div class="searcBy">
<?php $form = ActiveForm::begin([
                
                    'fieldConfig' => [
                        'template' => "{input}",
                        'options' => [
                            'tag'=> false,
                        ],

    ]]); ?>
 <div class="p-1 rounded rounded-pill shadow-sm mb-4">
<div class="input-group">

<?= $form->field($model, 'term')->textInput(['class' => 'form-control border-0','placeholder' =>'Search by ID or Name' ])->label(false);  ?>
<div class="input-group-append">
<?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-link text-primary','id' =>'button-addon1']) ?>
</div>
</div>
</div>
<?php ActiveForm::end(); ?>
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
          return $this->render('_search',['model' => $model]);  
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