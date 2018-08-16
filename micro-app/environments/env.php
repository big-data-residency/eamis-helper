<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 11:47
 */

require_once (__DIR__ . '/../utils/utils.php');

/**
 * load .env
 */
$dotEnv = new \Dotenv\Dotenv(dirname(__DIR__) . '/..');
$dotEnv->load();

/**
 * Init environment
 */
defined('YII_DEBUG') or define('YII_DEBUG', env('YII_DEBUG'));
defined('YII_ENV') or define('YII_ENV', env('YII_ENV', 'prod'));
