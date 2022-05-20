<?php
namespace common\base;

use Yii;
use yii\base\BootstrapInterface;

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

        // Get settings from database
        $sql = $this->db->createCommand("SELECT name,value,module FROM setting");
        $settings = $sql->queryAll();

        // Now let's load the settings into the global params array

        foreach ($settings as $key => $val) {
            Yii::$app->params[$val['module'].'.'.$val['name']] = $val['value'];
        }

Yii::$app->set('mailer',[
                'class' => 'yii\swiftmailer\Mailer',
                'viewPath' => '@common/mail',
                'useFileTransport'=>false,
                'transport' => [
                    'class' => 'Swift_SmtpTransport',
                    'host' => Yii::$app->params['smtp.host'],
                    'username' => Yii::$app->params['smtp.username'],
                    'password' => Yii::$app->params['smtp.password'],
                    'port' => Yii::$app->params['smtp.port'],
                    'encryption' => Yii::$app->params['smtp.encryption'],
                ],
            ]);

    }

}