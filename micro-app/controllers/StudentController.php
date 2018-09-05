<?php

namespace app\controllers;

use app\models\Student;
use yii\filters\auth\HttpBearerAuth;
/**
 * @SWG\Tag(
 *   name = "student",
 *   description = "学生相关api"
 * )
 */
class StudentController extends ApiController {
    public $modelClass = 'app\models\Student';

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
        return [
            'success' => false
        ];
    }


    public function actionTest(){
        $response = \Yii::$app->response;
        $response->content = "test response from student controller by yii";
        $response->format = 'json';
    }

}
