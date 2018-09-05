<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/14
 * Time: 15:12
 */

namespace app\controllers;


use yii\filters\auth\HttpBearerAuth;
use yii\filters\ContentNegotiator;
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
        unset($behaviors['authenticator']);

        $behaviors['corsFilter'] = [
          'class' => Cors::className(),
          'cors' => [
              'Origin' => [
                  'http://' . env('HOST') . ':'.env('PORT'),
              ],
              'Access-Control-Request-Method' => ['*'],
              'Access-Control-Request-Headers' => ['*'],
              'Access-Control-Allow-Credentials' => true,
              'Access-Control-Max-Age' => 3600,
              'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
          ],
        ];

        $behaviors['contentNegotiator'] = [
          'class' => ContentNegotiator::className(),
          'formats' => [
              'application/json' => Response::FORMAT_JSON,
          ]
        ];

        if (\Yii::$app->getRequest()->getMethod() !== 'OPTION') {
            $behaviors['authenticator'] = [
                'class' => HttpBearerAuth::className()
            ];
        }

        return $behaviors;
    }

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'data',
    ];


}
