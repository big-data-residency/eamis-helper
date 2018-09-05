<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:39
 */

return [
    'id' => 'micro-app',
    // the basePath of the application will be the `micro-app` directory
    'basePath' => dirname(__DIR__),
    // this is where the application will find all controllers
    'controllerNamespace' => 'app\controllers',
    // set an alias to enable autoloading of classes from the 'micro' namespace
    'aliases' => [
        '@app' => dirname(__DIR__),
        '@bower' => '@vendor/bower-asset',
        '@apiRoot' => '@app/controllers',
        '@webRoot' => '@app/web',
        '@runtime' => '@app/runtime'
    ],
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'error' => [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/error.log',
                    'levels' => ['error'],
                    'logVars' => ['_GET', '_POST', '_FILE', '_COOKIE', '_SESSION']
                ],
                'warning' => [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/warning.log',
                    'levels' => ['warning'],
                    'logVars' => ['_GET', '_POST', '_FILE', '_COOKIE', '_SESSION']
                ],
                'info' => [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/info.log',
                    'levels' => ['info'],
                    'logVars' => [],
                    'maxFileSize' => 40
                ],
                /*把日志记录到数据库中
                'db' => [
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['info', 'error']
                ]*/
            ]
        ],

        'user' => [
            'identityClass' => 'app\models\Student'
        ]

    ]
];
