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
    ]
];
