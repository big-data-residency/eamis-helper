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
            /*'on beforeSend' => function ($event) {
                $response = $event->sender;
                if ($response->data != null) {
                    if($response->format == \yii\web\Response::FORMAT_JSON || $response->format == \yii\web\Response::FORMAT_XML) {
                        $response->data = yii\helpers\ArrayHelper::merge([
                            'success' => $response->isSuccessful,
                        ], $response->data);

                        $response->statusCode = 200;
                    }
                }
            }*/
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
//               指明 siteController下的action
                'site/<action>' => 'site/<action>',
                'login/<action>' => 'login/<action>',
                'auth/<action>' => 'auth/<action>',
                'student/<action>' => 'student/<action>',
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['teacher', 'student', 'login'],
                    'pluralize' => false
                ],
            ],
        ],
    ]
];



return $config;
