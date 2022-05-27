<?php

namespace frontend\controllers;

use Yii;

use common\models\Profile;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
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
        $token = $user = Yii::$app->user->identity->token;
        if(Yii::$app->params['user.profile'] == 'PROFILE_PAGE_ONE'){
            return $this->redirect(['/profile/page-one', 'token' => $token]);
        }elseif(Yii::$app->params['user.profile'] == 'PROFILE_PAGE_TWO'){
            return $this->redirect(['/profile/page-two', 'token' => $token]);
        }elseif(Yii::$app->params['user.profile'] == 'PROFILE_NOT_APPROVED'){
            return $this->redirect(['/profile/not-approved', 'token' => $token]);
        }else{
            return $this->redirect(['/dashboard/index']);
        }     
    }


    public function actionPageOne($token)
    {   
        if(Yii::$app->params['user.profile'] != 'PROFILE_PAGE_ONE'){
            return $this->redirect('index');
        }
        $this->layout = 'profile';
        $uid = Yii::$app->user->identity->id;
        if (($model = Profile::findOne(['user_id' => $uid])) === null) {
            $model = new Profile();
        }
        
        $model->scenario = 'page-one';
        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $uid;
            $model->page_no = 1;
            $model->dob = strtotime($model->dob);
            $model->languages_known = implode(',',$model->languages_known);
            $model->save(false);
            return $this->redirect('index');
        }
        return $this->render('page-one', [
            'model' => $model,
        ]);
    }
    public function actionPageTwo($token)
    {   
        if(Yii::$app->params['user.profile'] != 'PROFILE_PAGE_TWO'){
            return $this->redirect('index');
        }
        $this->layout = 'profile';
        $uid = Yii::$app->user->identity->id;
        $model = $this->findModel($uid);
        $model->scenario = 'page-two';
        if ($model->load(Yii::$app->request->post())) {
            $model->page_no = 2;
            $model->save(false);
            return $this->redirect('index');
        }
        return $this->render('page-two', [
            'model' => $model,
        ]);
    }
    public function actionNotApproved($token)
    {
        if(Yii::$app->params['user.profile'] != 'PROFILE_NOT_APPROVED'){
            return $this->redirect('index');
        }
        $this->layout = 'profile';
        return $this->render('not-approved');
    }   
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
