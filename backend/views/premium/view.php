<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
<?php if($model->profile->status == 0 && $model->profile->page_no == 2): ?>
    <p>
        <?= Html::a('Approve', ['approve', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>
<?php endif;?>
    <?= DetailView::widget([
        'model' => $model->profile,
        'attributes' => [
            'height',
            'weight',
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