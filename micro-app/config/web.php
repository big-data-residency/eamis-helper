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
            ],
        ],
        'response' => [
            'class' => 'yii\web\Response',
//            格式化输出内容
            'on beforeSend' => function($event){
                $response = $event->sender;
                if($response->data !== null){
                    $response->data = [
                        'success' => $response->isSuccessful,
                        'data' => $response->data
                    ];
                    $response->statusCode = 200;
                }
            },
            'format' => yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
//                when enable strict parsing enable below
//                'debug/<controller>/<action>' => 'debug/<controller>/<action>',
            ],
        ],
    ]
];



return $config;
