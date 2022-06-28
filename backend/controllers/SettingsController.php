<?php

namespace backend\controllers;

use Yii;
use backend\models\Model;
use yii\web\Controller;
use common\models\Setting;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use yii\web\NotFoundHttpException;

/**
 * SettingsController implements the CRUD actions for Setting model.
 */
class SettingsController extends Controller
{
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
        ];
    }
//    public function actionIndex()
//     {
//         $settings = Setting::find()->where(['module' => 'time'])->indexBy('id')->all();

//         if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
//             foreach ($settings as $setting) {
//                 $setting->save(false);
//             }
//             return $this->redirect(Url::toRoute('settings/index'));
//         }

//         return $this->render('index', ['settings' => $settings]);
//     }
    public function actionImage()
    {
        $model = $this->findModel(35);
            $model->file = UploadedFile::getInstance($model,'file');
            if ($model->file != NULL){
                if(file_exists(Yii::getAlias('@frontend/web/uploads/images/').$model->value) && !empty($model->value)){
                    unlink(Yii::getAlias('@frontend/web/uploads/images/').$model->value);
                };
                $model->value = $this->clean($model->file->baseName).time().'.'.$model->file->extension;
                $model->save(false);
                $model->file->saveAs(Yii::getAlias('@frontend/web/uploads/images/').$model->value);
                Yii::$app->session->setFlash('success', 'successfully uploaded');

                return $this->refresh();
            }
            return $this->render('image', [
                'model' => $model,
            ]);
 
    }
    
    public function actionMain()
    {
        $settings = Setting::find()->where(['module' => 'site'])->indexBy('id')->all();

        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            return $this->redirect(Url::toRoute('settings/main'));
        }

        return $this->render('main', ['settings' => $settings]);
    }

    public function actionSmtp()
    {
        $settings = Setting::find()->where(['module' => 'smtp'])->indexBy('id')->all();

        if (Model::loadMultiple($settings, Yii::$app->request->post()) && Model::validateMultiple($settings)) {
            foreach ($settings as $setting) {
                $setting->save(false);
            }
            return $this->redirect(Url::toRoute('settings/smtp'));
        }

        return $this->render('smtp', ['settings' => $settings]);
    }
    // public function actionImage()
    // {
    //     $flag = true;
    //     $settings = Setting::find()->where(['module' => 'img'])->all();
    //     if (Yii::$app->request->isPost){

    //         $oldIDs = ArrayHelper::map($settings, 'id', 'id');
    //         $settings = Model::createMultiple(Setting::classname(),$settings);
    //         Model::loadMultiple($settings, Yii::$app->request->post());
    //         $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($settings, 'id', 'id')));
    //         $valid = Model::validateMultiple($settings);
    //         if ($valid) {
    //             $transaction = \Yii::$app->db->beginTransaction();
    //             try {
    //               if (!empty($deletedIDs)) {
    //                         Setting::deleteAll(['id' => $deletedIDs]);
    //                     }
    //                 foreach ($settings as $setting) {
    //                         $setting->module = 'img';
    //                         $setting->name = $this->clean($setting->title);
    //                         if (! ($flag = $setting->save(false))) {
    //                             $transaction->rollBack();
    //                             break;
    //                         }
    //                     }
                    

    //                 if ($flag) {
    //                     $transaction->commit();
    //     $subQuery1 = (new Query())->select('MIN(id)')->from('setting')->groupBy(['module','name']);
    //     $subQuery = (new Query())->from(['u' => $subQuery1]);
    //     $query = (new Query())->createCommand()->delete('setting', ['NOT IN','id', $subQuery]);
    //     $query->execute();
    //     //DELETE FROM `settings` WHERE `id` NOT IN (SELECT * FROM (SELECT MIN(id) FROM `setting` GROUP BY `module`, `name`) `u`)
    //                     return $this->redirect(['image']);
    //                 }
    //             } catch (Exception $e) {
    //                 $transaction->rollBack();
    //             }
    //         }
    //     }
    //     return $this->render('img', [
    //         'settings' => (empty($settings)) ? [new Setting] : $settings
    //     ]);
    // }	
    public function actionIndex()
    {
        $settings = Setting::find()->where(['module' => 'custom'])->all();
        if (Yii::$app->request->isPost){

            $oldIDs = ArrayHelper::map($settings, 'id', 'id');
            $settings = Model::createMultiple(Setting::classname(),$settings);
            Model::loadMultiple($settings, Yii::$app->request->post());
            $deletedIDs = array_diff($oldIDs, array_filter(ArrayHelper::map($settings, 'id', 'id')));
            $valid = Model::validateMultiple($settings);
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                  if (!empty($deletedIDs)) {
                            Setting::deleteAll(['id' => $deletedIDs]);
                        }
                    foreach ($settings as $setting) {
                            $setting->module = 'custom';
                            $setting->name = $this->clean($setting->title);
                            if (! ($flag = $setting->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    

                    if ($flag) {
                        $transaction->commit();
        $subQuery1 = (new Query())->select('MIN(id)')->from('setting')->groupBy(['module','name']);
        $subQuery = (new Query())->from(['u' => $subQuery1]);
        $query = (new Query())->createCommand()->delete('setting', ['NOT IN','id', $subQuery]);
        $query->execute();
        //DELETE FROM `settings` WHERE `id` NOT IN (SELECT * FROM (SELECT MIN(id) FROM `setting` GROUP BY `module`, `name`) `u`)
                        return $this->redirect(['settings/index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        return $this->render('custom', [
            'settings' => (empty($settings)) ? [new Setting] : $settings
        ]);
    }
    public function clean($string) {
       $string = trim($string);
       $string = strtolower($string); 
       $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
       return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }
    protected function findModel($id)
    {
        if (($model = Setting::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

