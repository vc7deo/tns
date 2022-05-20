<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Asia/Kolkata',
    'bootstrap' => [
        'log',
        'frontend\base\Settings',
    ],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => '/profile/index',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl' => '',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        // 'assetManager' => [
        //     'bundles' => [

        //         'yii\web\JqueryAsset' => [
        //             'sourcePath' => '@webroot/dist',
        //             // 'basePath' => '@webroot/dist',
        //             // 'baseUrl' => '@web',
        //             'js' => [
        //                 'js/jquery.min.js',
        //             ]
        //         ],
        //         'yii\bootstrap4\BootstrapPluginAsset' => [
        //             'sourcePath' => '@webroot/dist',
        //             'js'=>[
        //                 'js/bootstrap.min.js',
        //             ]
        //         ],
        //         'yii\bootstrap4\BootstrapAsset' => [
        //             'sourcePath' => '@webroot/dist',
        //             'css' => [
        //                     'css/bootstrap.min.css',
        //             ],
        //         ],
        //         'kartik\grid\GridViewAsset' => [
        //             'css' => [],
        //         ]
        //     ],
        // ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '/profile/<token:[A-Za-z0-9 -_.]+>$/page-one' => '/profile/page-one', 
                '<controller:\w+>/create' => '<controller>/create',
                '<controller:[\w\-]+>/<token:[A-Za-z0-9 -_.]+>$' => '<controller>/view',
                '<controller:[\w\-]+>/<token:[A-Za-z0-9 -_.]+>$/<action:[\w-]+>' => '<controller>/<action>',
                '<controller:[\w-]+>s' => '<controller>/index',
                '<alias:[\w-]+>' => 'site/<alias>',
            ],
        ],
        
    ],
    'params' => $params,
];
