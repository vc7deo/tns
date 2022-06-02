<?php
namespace frontend\base;

use Yii;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

/*
/* The base class that you use to retrieve the settings from the database
*/

class Settings implements BootstrapInterface {

    private $db;

    public function __construct() {
        $this->db = Yii::$app->db;
    }

    /**
    * Bootstrap method to be called during application bootstrap stage.
    * Loads all the settings into the Yii::$app->params array
    * @param Application $app the application currently running
    */

    public function bootstrap($app) {
        if (!Yii::$app->user->isGuest) {
            $user = Yii::$app->user->identity;
            if($user->gender == 'Male'){
                Yii::$app->params['user.search'] = 'Female';
            }elseif($user->gender == 'Female'){
                Yii::$app->params['user.search'] = 'Male';
            }else{
                Yii::$app->params['user.search'] = '';
            }
            if($user->profile){
                if(isset($user->profile->page_no) && $user->profile->page_no == 1){
                    Yii::$app->params['user.profile'] = 'PROFILE_PAGE_TWO';
                }elseif(isset($user->profile->page_no) && $user->profile->page_no == 2 && $user->profile->status == 0){
                    Yii::$app->params['user.profile'] = 'PROFILE_NOT_APPROVED';
                }elseif(isset($user->profile->page_no) && $user->profile->page_no == 0 && $user->profile->status == 0){
                    Yii::$app->params['user.profile'] = 'PROFILE_PAGE_ONE';
                }else{
                    Yii::$app->params['user.profile'] = 'PROFILE_APPROVED';
                }
                $time = time();
                if(empty($user->active) || date('Ymd',$user->active) != date('Ymd',$time)){
                    \Yii::$app->db->createCommand()
                        ->update('user', ['active' => $time], ['id' => $user->id])
                        ->execute();
                }  
            }else{
                Yii::$app->params['user.profile'] = 'PROFILE_PAGE_ONE';
            }
        }
    }

}