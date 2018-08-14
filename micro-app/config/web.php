<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:39
 */

return [
    'components' => [
        'request' => [
            'cookieValidationKey' => '88_oT06Lji9-aPDoJEixtWRKr7z5v76K',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'response' => [
            'format' => 'json',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '<controller:(post|comment|student)>' => '<controller>/index',
            ],
        ],
    ]
];