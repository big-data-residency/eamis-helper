<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:12
 */

namespace app\controllers;


use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

/**
 * Class ApiController
 * @package app\controllers
 */
class ApiController extends ActiveController
{

    public function behaviors()
    {

        $behaviors = parent::behaviors();
        // 去除用户认证
        unset($behaviors["rateLimiter"]);

        return array_merge([
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Origin' => ['*'],
                    'Access-Control-Allow-Credentials' => true,
                ],
            ],
            'contentNegotiator' => [
                'formats' => [
                    'text/html' => Response::FORMAT_JSON,
                ]
            ],
        ], $behaviors);
    }

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'data',
    ];


}
