<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
<?php \yii\widgets\Pjax::begin(['id' => 'si-User', 

'timeout' => false, 

'enablePushState' => false, 

'clientOptions' => ['method' => 'GET']]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'responsiveWrap' => false,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fullname',
            'username',
            // 'first_name',
            // 'last_name',
            'phone',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($data) {
                    if($data->status == 10){
                        return "Active";
                    }else{
                        return "Inactive";
                    }
                },
                'filter'=> [ 10 => 'Active',9 => 'Inactive'],
                'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'All'],

            ],

            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            ],
        ],
    ]); ?>

<?php \yii\widgets\Pjax::end(); ?>
</div>
