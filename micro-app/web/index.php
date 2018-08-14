<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

// Composer vendor
require(__DIR__ . '/../vendor/autoload.php');

// Environments
require (__DIR__ . '/../environments/env.php');

// Yii
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

// config
$config = \yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../config/base.php'),
    require(__DIR__ . '/../config/web.php'),
    require(__DIR__ . '/../config/db.php')
);

if(YII_ENV_DEV){
	$config['bootstrap'][] = 'gii';
	$config['modules']['gii'] = [
		'class' => 'yii\gii\Module',
	];
}

(new yii\web\Application($config))->run();
