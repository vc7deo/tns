<?php
namespace backend\assets;

use yii\base\Exception;
use yii\web\AssetBundle as BaseAdminLteAsset;

/**
 * AdminLte AssetBundle
 * @since 0.1
 */
class AdminLteAsset extends BaseAdminLteAsset
{
    public $sourcePath = '@webroot/dist';
    public $css = [
        'fontawesome-free/css/all.min.css',
        'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
        'css/icheck-bootstrap.min.css',
        'css/adminlte.min.css',
        'css/style.css'
    ];
    public $js = [
        'js/adminlte.min.js'
    ];
    public $depends = [
        //'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];

    /**
     * @var string|bool Choose skin color, eg. `'skin-blue'` or set `false` to disable skin loading
     * @see https://almsaeedstudio.com/themes/AdminLTE/documentation/index.html#layout
     */
    public $skin = '_all-skins';

    /**
     * @inheritdoc
     */
    // public function init()
    // {
    //     // Append skin color file if specified
    //     if ($this->skin) {
    //         if (('_all-skins' !== $this->skin) && (strpos($this->skin, 'skin-') !== 0)) {
    //             throw new Exception('Invalid skin specified');
    //         }

    //         $this->css[] = sprintf('css/skins/%s.min.css', $this->skin);
    //     }

    //     parent::init();
    // }
}
