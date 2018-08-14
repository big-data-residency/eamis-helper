<?php

namespace app\controllers;

use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\JsonParser;

class StudentController extends GenericController {
    public $modelClass = 'app\models\Student';
    public $defaultAction = "index";
    // behaviors is overwritten in app\GenericController

    public function actionTest(){
        $response = \Yii::$app->response;
        $response->content = "test response from student controller by yii";
        $response->format = 'json';
    }
}
