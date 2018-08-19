<?php

namespace app\controllers;

use app\models\Student;

/**
 * Class StudentController
 * @package app\controllers
 */

/**
 * @SWG\Tag(
 *   name = "student",
 *   description = "学生相关api"
 * )
 */
class StudentController extends ApiController {
    public $modelClass = 'app\models\Student';
    public $defaultAction = 'index';
    // behaviors is overwritten in app\ApiController

    /**
     * @SWG\GET(
     *     path="/student",
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
