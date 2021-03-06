<?php

namespace backend\controllers;

use Yii;
use common\models\User;
use common\models\Profile;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\ProfileForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->get(),'n');
        $dataProvider->pagination->pageSize=15;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $user = $this->findModel($id);

        $model = new ProfileForm($user->getAttributes(['first_name','last_name','phone','email','package_id','expired_at','status']));
        $model->old_email = $model->email;
        $model->old_phone = $model->phone;
        if ($model->load(Yii::$app->request->post()) && $model->profile($user)) {
            Yii::$app->session->setFlash('success', 'You have successfully updated your profile.');
        return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    public function actionUpdatedob($id)
    {
        $user = $this->findModel($id);
        $model = Profile::findOne(['user_id' => $user->id]);
        if ($model->load(Yii::$app->request->post())) {
             //if (($model = Profile::findOne(['user_id' => $user->id])) !== null) {
                $model->dob = strtotime($model->dob);
                $model->save(false);
            //}
            Yii::$app->session->setFlash('success', 'You have successfully updated your profile.');
        return $this->redirect(['view', 'id' => $user->id]);
        }

        return $this->render('updatedob', [
            'model' => $model,
            'user' => $user,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionApprove($id)
    {
        $user = $this->findModel($id);
        if (($model = Profile::findOne(['user_id' => $user->id])) !== null) {
            $model->status = 1;
            $model->save(false);
        }
        return $this->redirect(['index']);
    }
    public function actionDisablePremium($id)
    {
        $user = $this->findModel($id);
        $user->is_premium = 0;
        $user->save(false);
        return $this->redirect(['index']);
    }
    public function actionEnablePremium($id)
    {
        $user = $this->findModel($id);
        $user->is_premium = 1;
        $user->save(false);
        return $this->redirect(['index']);
    }
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
