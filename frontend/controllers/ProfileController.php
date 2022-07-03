<?php

namespace frontend\controllers;

use Yii;

use common\models\Profile;
use common\models\Interest;
use common\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\AvatarForm;
use frontend\models\ProfileForm;
use yii\web\UploadedFile;
use common\helpers\Cms;
use yii\bootstrap4\ActiveForm;
use frontend\models\SearchForm;
use yii\imagine\Image;
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
    // public function actions()
    // {
    //     return [
    //         'uploadPhoto' => [
    //             'class' => 'budyaga\cropper\actions\UploadAction',
    //             'url' => Yii::getAlias('@site/uploads/profile'),
    //             'path' => Yii::getAlias('@frontend/web/uploads/profile'),
    //         ]
    //     ];
    // }
     public function actionIndex()
     {
        $token = $user = Yii::$app->user->identity->token;
        if(Yii::$app->params['user.profile'] == 'PROFILE_PAGE_ONE'){
            return $this->redirect(['/profile/page-one', 'token' => $token]);
        }elseif(Yii::$app->params['user.profile'] == 'PROFILE_PAGE_TWO'){
            return $this->redirect(['/profile/page-two', 'token' => $token]);
        }elseif(Yii::$app->params['user.profile'] == 'PROFILE_PAGE_THREE'){
            return $this->redirect(['/profile/page-three', 'token' => $token]);
        }elseif(Yii::$app->params['user.profile'] == 'PROFILE_NOT_APPROVED'){
            return $this->redirect(['/profile/not-approved', 'token' => $token]);
        }else{
            return $this->redirect(['/home/index']);
        }     
    }

    public function actionEdit()
    {   
        $user= Yii::$app->user->identity;
        $model = $this->findModel($user->id);
        $photo1 = $model->photo1;
        $photo2 = $model->photo2;
        $avatar = new AvatarForm();
        $account = new ProfileForm($user->getAttributes(['first_name','last_name','phone','phone1','email']));
        $account->old_email = $account->email;
        $account->old_phone = $account->phone;
        $account->old_phone1 = $account->phone1;
       
        if ($account->load(Yii::$app->request->post()) && $account->profile($user)) {
            Yii::$app->session->setFlash('success', 'You have successfully updated your profile.');
        return $this->refresh();
        }

        if ($avatar->load(Yii::$app->request->post())) {
             //echo "<pre>"; print_r(Yii::$app->request->post()); echo "</pre>"; exit;
            $avatar->image1 = UploadedFile::getInstance($avatar,'image1');
            $avatar->image2 = UploadedFile::getInstance($avatar,'image2');
            //print_r($avatar->getErrors());exit();
            //echo "<pre>"; print_r($avatar); exit;

            if($avatar->image1 != NULL){
            $model->photo1 = Cms::clean($avatar->image1->baseName).'-'.time().'.'.$avatar->image1->extension;
            }
            if($avatar->image2 != NULL){
            $model->photo2 = Cms::clean($avatar->image2->baseName).'-'.time().'.'.$avatar->image2->extension;
            }
             $model->save(false);
             //print_r($avatar->getErrors());exit();
            if ($avatar->image1 != NULL){
                $avatar->image1->saveAs(Yii::getAlias('@frontend/web/uploads/profile/').$model->photo1);
                if(file_exists(Yii::getAlias('@frontend/web/uploads/profile/').$photo1) && !empty($photo1)){
                     unlink(Yii::getAlias('@frontend/web/uploads/profile/').$photo1);
                 }
/*
$watermarkImage = '@webroot/dist/images/wt.png';
$image = '@webroot/uploads/profile/'.$model->photo1;
// Store the Image object in a variable
$newImage = Image::watermark($image, $watermarkImage,[10,10]);
// Call the save function to write the file to the disk.
$newImage->save(Yii::getAlias('@webroot/uploads/profile/'.$model->photo1));*/

            }
            if ($avatar->image2 != NULL){
                $avatar->image2->saveAs(Yii::getAlias('@frontend/web/uploads/profile/').$model->photo2);
                if(file_exists(Yii::getAlias('@frontend/web/uploads/profile/').$photo2) && !empty($photo2)){
                     unlink(Yii::getAlias('@frontend/web/uploads/profile/').$photo2);
                 }
            }
/*
$watermarkImage1 = '@webroot/dist/images/wt.png';
$image1 = '@webroot/uploads/profile/'.$model->photo2;
// Store the Image object in a variable
$newImage1 = Image::watermark($image1, $watermarkImage1,[10,10]);
// Call the save function to write the file to the disk.
$newImage1->save(Yii::getAlias('@webroot/uploads/profile/'.$model->photo2));*/
         
         return $this->refresh();
        }
        return $this->render('edit', [
            'model' => $model,
            'user' => $user,
            'avatar' => $avatar,
            'account' => $account,
        ]);
    }
    public function actionBasic()
    {   
        $user= Yii::$app->user->identity;
        $model = $this->findModel($user->id);

        $model->scenario = 'page-one';
        if ($model->load(Yii::$app->request->post())) {
            //$model->dob = strtotime($model->dob);
            $model->languages_known = implode(',',$model->languages_known);
            $model->save(false);
         return $this->refresh();
        }
        return $this->render('basic', [
            'model' => $model,
            'user' => $user,
        ]);
    }
    public function actionFamily()
    {   
        $user= Yii::$app->user->identity;
        $model = $this->findModel($user->id);

        $model->scenario = 'page-two';
        if ($model->load(Yii::$app->request->post())) {
            $model->save(false);
         return $this->refresh();
        }
        return $this->render('family', [
            'model' => $model,
            'user' => $user,
        ]);
    }
    public function actionInterestSend()
    {   
        $user = Yii::$app->user->identity;
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
          'query' => $query,
          'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        $query->joinWith(['sends'])
              ->where(['user_from' => $user->id])
              ->andWhere(['user.status' => 10])->all();
//         echo "<pre>";
// print_r($dataProvider->getModels());exit();
        return $this->render('interest-send',[
            'user' => $user,
            'dataProvider' => $dataProvider,
        ]);
  
    }
    public function actionInterestReceive()
    {   
        $user = Yii::$app->user->identity;
        $query = User::find();
        $dataProvider = new ActiveDataProvider([
          'query' => $query,
          'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        $query->joinWith(['receives'])
              ->where(['user_to' => $user->id])
              ->andWhere(['user.status' => 10])->all();
        return $this->render('interest-receive',[
            'user' => $user,
            'dataProvider' => $dataProvider,
        ]);
  
    }
    public function actionPhotoOne()
    {
        $id = Yii::$app->user->identity->id;
        $profile = $this->findModel($id);
        // $model = new AvatarForm($profile->getAttributes(['photo1','photo2']));
        $model = new AvatarForm();
        //$photo1 = $model->photo1;
        //$photo2 = $model->photo2;
        if ($model->load(Yii::$app->request->post())) {
            $model->photo1 = UploadedFile::getInstance($model,'photo1');
            if($model->photo1 != NULL){
            $profile->photo1 = Cms::clean($model->photo1).'-'.time().'.'.$model->photo1->extension;
            }
           
            if ($model->photo1 != NULL){
                $model->photo1->saveAs(Yii::getAlias('@frontend/web/uploads/profile/').$model->photo1);
            }

         
         return $this->redirect(['index']);
        }
         return $this->renderAjax('_photo_one', [
             'model' => $model
         ]);
        
    }
    public function actionPhotoTwo()
    {
        $id = Yii::$app->user->identity->id;
        $user = $this->findModel($id);
        $model = new AvatarForm($user->getAttributes(['photo']));
        $photo = $model->photo;
        if ($model->load(Yii::$app->request->post())) {
            $model->photo = str_replace(Yii::getAlias('@site/uploads/profile/'),'',$model->photo);
             
            if($model->profile($user)){
                 if(file_exists(Yii::getAlias('@frontend/web/uploads/profile/').$photo) && !empty($photo)){
                     unlink(Yii::getAlias('@frontend/web/uploads/profile/').$photo);
                 }
            Yii::$app->session->setFlash('success', 'Profile picture have been saved successfully.');
            }
         
         return $this->redirect(['index']);
        }
         return $this->renderAjax('_photo_two', [
             'model' => $model
         ]);
        
    }
    public function actionSearch(){

        $user= Yii::$app->user->identity;
        $model = new SearchForm();
        if ($model->load(Yii::$app->request->post())  && !empty(Yii::$app->params['user.search'])) 
        {   
            $term = $model->term;
            if(!empty($term)){
                $gender = Yii::$app->params['user.search'];
                $dataProvider = new ActiveDataProvider([
                'query' => User::find(),
                'sort'=> ['defaultOrder' => ['created_at'=>SORT_DESC]],
                'pagination' => false
                ]);
                $dataProvider->query
                            ->where(['gender' => $gender])
                            ->andWhere(['or',
                                   ['like','username',$term],
                                   ['like','first_name',$term],
                                   ['like','last_name',$term]
                            ])
                            ->all();
            }else{
                $dataProvider = new ActiveDataProvider([
                    'query' => User::find(),
                ]);
                $dataProvider->query
                                ->where(['status' => 0])
                                ->all();
                }
        }else{
            $dataProvider = new ActiveDataProvider([
                'query' => User::find(),
            ]);
            $dataProvider->query
                            ->where(['status' => 0])
                            ->all();
        }
        return $this->render('search',[
            'user' => $user,
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
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
    public function actionPageThree($token)
    {   
        if(Yii::$app->params['user.profile'] != 'PROFILE_PAGE_THREE'){
            return $this->redirect('index');
        }
        $this->layout = 'profile';
        $uid = Yii::$app->user->identity->id;
        $model = $this->findModel($uid);
        $model->scenario = 'page-three';
        $avatar = new AvatarForm();

        if ($avatar->load(Yii::$app->request->post())) {
            $model->page_no = 3;
            $photo1 = $model->photo1;
            $photo2 = $model->photo2;
        
            $avatar->image1 = UploadedFile::getInstance($avatar,'image1');
            $avatar->image2 = UploadedFile::getInstance($avatar,'image2');
            if($avatar->image1 != NULL){
            $model->photo1 = Cms::clean($avatar->image1->baseName).'-'.time().'.'.$avatar->image1->extension;
            }
            if($avatar->image2 != NULL){
            $model->photo2 = Cms::clean($avatar->image2->baseName).'-'.time().'.'.$avatar->image2->extension;
            }
             $model->save(false);
             //print_r($avatar->getErrors());exit();
            if ($avatar->image1 != NULL){
                $avatar->image1->saveAs(Yii::getAlias('@frontend/web/uploads/profile/').$model->photo1);
                if(file_exists(Yii::getAlias('@frontend/web/uploads/profile/').$photo1) && !empty($photo1)){
                     unlink(Yii::getAlias('@frontend/web/uploads/profile/').$photo1);
                 }

            }
            if ($avatar->image2 != NULL){
                $avatar->image2->saveAs(Yii::getAlias('@frontend/web/uploads/profile/').$model->photo2);
                if(file_exists(Yii::getAlias('@frontend/web/uploads/profile/').$photo2) && !empty($photo2)){
                     unlink(Yii::getAlias('@frontend/web/uploads/profile/').$photo2);
                 }
            }


            return $this->redirect('index');
        }
        return $this->render('page-three', [
            'model' => $model,
            'avatar' => $avatar
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
    public function actionValidation() {
        $user= Yii::$app->user->identity;
        $model = new ProfileForm($user->getAttributes(['first_name','last_name','phone','email']));                
        $model->old_email = $model->email;
        $model->old_phone = $model->phone;
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
     
    }  
    public function actionSkipphoto() {
        $uid = Yii::$app->user->identity->id;
        $model = $this->findModel($uid);                
        $model->page_no = 3;
        $model->save(false);
            return $this->redirect('index');
     
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
            return $this->redirect(Yii::$app->request->referrer);
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    protected function findModel($id)
    {
        if (($model = Profile::findOne(['user_id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
