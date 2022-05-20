<?php
Yii::setAlias('@logo', 'http://tns.local/dist/images/logo.png');
Yii::setAlias('@site', 'http://tns.local/');
return [
    'name' => 'Thottakkattukara Nair Samajam',
    'timeZone' => 'Asia/Kolkata',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'bootstrap' => [
        'common\base\Settings'
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module',
            // enter optional module parameters below - only if you need to  
            // use your own export download action or custom translation 
            // message source
            'downloadAction' => 'gridview/export/download',
            'i18n' => []
            ],
            'gridviewKrajee' =>  [
                'class' => '\kartik\grid\Module',
                // your other grid module settings
            ]
    ],
    'components' => [
        // 'i18n' => [
        //     'translations' => [
        //         '*' => [
        //             'class' => 'yii\i18n\DbMessageSource',
        //             'forceTranslation'=>true,
        //         ]
        //     ],
        // ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'class' => 'yii\i18n\Formatter',
            'nullDisplay' => '',
            'dateFormat' => 'php:d-M-Y',
            'datetimeFormat' => 'php:d-M-Y H:i:s',
            'timeFormat' => 'php:H:i:s',
            'defaultTimeZone' => 'Asia/Kolkata', // time zone
       ],
        'settings'=>[
            'class'=>'common\components\Settings',
        ],
    ],
];
