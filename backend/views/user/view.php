<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/web/dist');
/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = $model->fullname;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
<div class="user-view">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'first_name',
            'last_name',
            'phone',
            [
                'attribute'=>'phone1',
                'label' => 'Sec: Phone',
            ],
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    if($model->status == 10){
                        return "Active";
                    }else{
                        return "Inactive";
                    }
                },

            ],
        ],
    ]) ?>

</div>
<h3>Profile</h3>
<?php if(isset($model->profile)): ?>
<?php if($model->profile->status == 0 && ($model->profile->page_no == 2 || $model->profile->page_no == 3)): ?>
    <p>
        <?= Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
<?php endif;?>
<?php if($model->profile->status == 1): ?>
    <p>
        <?= Html::a('DOB update', ['updatedob', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </p>
<?php endif;?>
    <?= DetailView::widget([
        'model' => $model->profile,
        'attributes' => [
            [
                'attribute'=>'photo1',
                'value'=>$model->profile->photo1 != null ? '<img width="200" src="'.Yii::getAlias('@site/uploads/profile/').$model->profile->photo1.'">
                ' : "",
                'format' => 'raw',
            ],
            [
                'attribute'=>'photo2',
                'value'=>$model->profile->photo2 != null ? '<img width="200" src="'.Yii::getAlias('@site/uploads/profile/').$model->profile->photo2.'">
                ' : "",
                'format' => 'raw',
            ],
            'height',
            'weight',
            'dob:date',
            'marital_status',
            'body_type',
            'physical_status',
            'languages_known',
            'eating_habits',
            'drinking_habits',
            'smoking_habits',
            'education',
            'education_details',
            'employed_in',
            'occupation',
            'occupation_details',
            'income',
            //'religion',
            //'caste',
            'sub_caste',
            //'other',
            'star',
            'rasi',
            [
                'attribute' => 'sudha_jathakam',
                'value' => function($model) {
                    if($model->sudha_jathakam == 0){
                        return "No";
                    }else{
                        return "Yes";
                    }
                },

            ],
            'gothram',
            'family_type',
            'family_status',
            'fathers_occupation',
            'mothers_occupation',
            'origin',
            'brothers',
            'sisters',
            'city',
            'state',
            [
                'attribute' => 'country',
                'value' => function($model) {
                    return !empty($model->cntry->name) ? $model->cntry->name : "";
                  },

            ],
            'citizenship',
            'hobbies',
            'interests',
            'about_me',
        ],
    ]) ?>

<?php endif;?>