<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Premium Users';
$this->params['breadcrumbs'][] = $this->title;
$packages = [ 1 => 'Normal',2 => '3 Months', 3 => '6 Months'];

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
        // 'rowOptions' => function($model) {
        //     if ($model->is_premium === 1) {
        //         return ['style' => 'background-color: #d7fae0'];
        //     }else{
        //         return ['style' => 'background-color: #fad7da'];
        //     }
        // },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fullname',
            'username',
            // 'first_name',
            // 'last_name',
            'phone',
            'email:email',
            [
                'attribute' => 'package_id',
                'label' => 'Package',
                'value' => function($data) use ($packages) {
                    return array_key_exists($data->package_id, $packages) ? $packages[$data->package_id] : '';
                },

            ],
            [
              'attribute' => 'expired_at',
              'label' => 'Expiry Date',
              'format' => 'date',
              'contentOptions' => function ($model){
                $today = time();
                $ten_day = $today + 864000;
                if($model->expired_at < $today){
                  return ['class' => 'bg-danger'];
                }
                elseif($model['expired_at'] < $ten_day){
                    return ['class' => 'bg-warning'];
                }
                else{
                  return ['class' => 'bg-success'];
                }
              },
            ],            [
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
            // [
            //     'attribute' => 'is_premium',
            //     'label' => 'Premium',
            //     'value' => function($data) {
            //         if($data->is_premium == 1){
            //             return Html::a('Disable',['/user/disable-premium', 'id' => $data->id],['class' => 'btn btn-danger','data-method' => 'post','data-confirm' => "Are you sure?", 'title' => 'Disable']);
            //         }else{
            //             return Html::a('Enable',['/user/enable-premium', 'id' => $data->id],['class' => 'btn btn-success','data-method' => 'post','data-confirm' => "Are you sure?", 'title' => 'Enable']);
            //         }
            //     },
            //     'format' => 'raw',

            // ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
            ],
        ],
    ]); ?>

<?php \yii\widgets\Pjax::end(); ?>
</div>
