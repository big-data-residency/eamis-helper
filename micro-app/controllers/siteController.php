<?php

namespace app\controllers;

use yii\web\Controller;
/**
 * @Class SiteController
 * @package app\controllers
 *
 * @SWG\Get(
 *     path="/api/resources.json",
 *     @SWG\Response(response="200", description="An example")
 * )
 */
class SiteController extends Controller{
	public function actionIndex(){
		return "Hello World From micro-app";
	}

	public function actionSwagger(){
	    define('API_HOST', (YII_ENV === 'dev')? 'localhost/eamis-helper/micro-app/web': '');
	    $apiRoot = \Yii::getAlias('@apiRoot');
        $swagger = \Swagger\scan($apiRoot);
        $webRoot = \Yii::getAlias('@webRoot');
        $jsonFile = $webRoot . '/swagger/swagger-json';
        if(file_put_contents($jsonFile, $swagger)){
            echo $swagger;
        } else {
            echo $swagger;
        }
//        echo $swagger;
    }

    public function actionEnv(){
	 return $_ENV;
    }

    public function actionTest(){
	    echo'<pre>';
	    return `${1/0}`;
    }

    public function actionError(){
        $exception = \Yii::$app->errorHandler->exception;
        return $exception;
    }
}
