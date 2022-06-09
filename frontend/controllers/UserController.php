<?php

namespace frontend\controllers;

use Yii;

use common\models\User;
use common\models\Interest;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\helpers\Cms;
use yii\bootstrap4\ActiveForm;

/**
 * UserController implements the CRUD actions for Profile model.
 */
class UserController extends Controller
{
    /**
     * @inheritDoc
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
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionProfile($token)
    {
        $model = $this->findModel($token);
        return $this->render('profile',[
            'model' => $model,
        ]);
    }
    public function actionSend($token)
    {
        $my_id= Yii::$app->user->identity->id;
        if (($user = User::findOne(['token' => $token])) !== null) {
            $model = new Interest();
            $model->user_to = $user->id;
            $model->user_from = $my_id;
            $model->user_by = $my_id;
            $model->sent_at = time();
            $model->user_by = $my_id;
            $model->save();
            return $this->redirect(['profile','token' => $token]);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModel($token)
    {
        if (($model = User::findOne(['token' => $token])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
