<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\User;

class RecentSlider extends Widget implements \yii\base\ViewContextInterface
{         
        public $model;
        public function init()
        {
        	parent::init();
            $gender = Yii::$app->params['user.search'];
            $this->model = User::find()->where(['gender' => $gender,'status' => 10])->orderBy('id DESC')->all();
        }
        public function run()
        {
    	   return $this->render('recent-slider', [
            'models' => $this->model,
        ]);

        }
}
?>
