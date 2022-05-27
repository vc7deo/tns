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
        'rowOptions' => function($model) {
            if ($model->is_premium === 1) {
                return ['style' => 'background-color: #d7fae0'];
            }else{
                return ['style' => 'background-color: #fad7da'];
            }
        },
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
            [
                'attribute' => 'is_premium',
                'label' => 'Premium',
                'value' => function($data) {
                    if($data->is_premium == 1){
                        return Html::a('Disable',['/user/disable-premium', 'id' => $data->id],['class' => 'btn btn-danger','data-method' => 'post','data-confirm' => "Are you sure?", 'title' => 'Disable']);
                    }else{
                        return Html::a('Enable',['/user/enable-premium', 'id' => $data->id],['class' => 'btn btn-success','data-method' => 'post','data-confirm' => "Are you sure?", 'title' => 'Enable']);
                    }
                },
                'format' => 'raw',

            ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            ],
        ],
    ]); ?>

<?php \yii\widgets\Pjax::end(); ?>
</div>
