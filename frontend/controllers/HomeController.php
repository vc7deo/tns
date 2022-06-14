<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\bootstrap4\ActiveForm;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * Site controller
 */
class HomeController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $user = Yii::$app->user->identity;
        $gender = Yii::$app->params['user.search'];
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC]]
        ]);
        $dataProvider->query
            ->where(['gender' => $gender])
            ->andWhere(['status' => 10])->all();
        return $this->render('index', [
            'user' => $user,
            'dataProvider' => $dataProvider,
        ]);
    }
     public function actionProfile()
    {
        $user = Yii::$app->user->identity;
        return $this->render('profile', [
            'user' => $user,
        ]);
    }  
}
