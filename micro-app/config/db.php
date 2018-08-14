<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:39
 */

return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => env("DB_DSN"),
            'username' => env("DB_USERNAME"),
            'password' => env("DB_PASSWORD"),
            'charset' => env("DB_CHARSET"),
        ],
    ]
];
