<?php

namespace frontend\widgets;

use Yii;
use yii\base\Widget;
use common\models\User;

class PrimeSlider extends Widget implements \yii\base\ViewContextInterface
{         
        public $model;
        public function init()
        {
        	parent::init();
            $gender = Yii::$app->params['user.search'];
            $this->model = User::find()->where(['gender' => $gender,'status' => 10])->andWhere(['>','package_id', 1])->all();
        }
        public function run()
        {
    	   return $this->render('prime-slider', [
            'models' => $this->model,
        ]);

        }
}
?>
