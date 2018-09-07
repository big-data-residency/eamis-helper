<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:39
 */

$config = [
    'components' => [
        'request' => [
            'cookieValidationKey' => env("COOKIE_VALIDATION_KEY"),
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => '\yii\web\JsonParser'
            ],
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => true,
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                ]
            ],
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
//               指明 siteController下的action
                'site/<action>' => 'site/<action>',

                'api/<module>/<controller>/<action>' => '<module>/<controller>/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['v0/teacher', 'v0/student', 'v0/login', 'v0/auth'],
                    'pluralize' => false
                ],
            ],
        ],
    ]
];



return $config;
