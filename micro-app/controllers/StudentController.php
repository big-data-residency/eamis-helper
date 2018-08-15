<?php

namespace app\controllers;

use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\JsonParser;

/**
 * Class StudentController
 * @package app\controllers
 */
class StudentController extends GenericController {
    public $modelClass = 'app\models\Student';
    public $defaultAction = "index";
    // behaviors is overwritten in app\GenericController

    /**
     * @SWG\GET(
     *     path="/student/index",
     *     tags={"student"},
     *     @SWG\Response(
     *         response="200",
     *         description="返回学生列表"
     *     )
     * )
     */
    public function actionIndex(){

    }

    public function actionTest(){
        $response = \Yii::$app->response;
        $response->content = "test response from student controller by yii";
        $response->format = 'json';
    }
}
