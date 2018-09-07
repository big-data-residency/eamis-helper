<?php

namespace app\modules\api\v0\controllers;

use app\modules\api\v0\models\Student;

/**
 * @SWG\Tag(
 *   name = "student",
 *   description = "学生相关api"
 * )
 */
class StudentController extends ApiController {
    public $modelClass = 'app\modules\api\v0\models\Student';

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


    public function actionInfo(){
        $token = \Yii::$app->request->get();
        return Student::findIdentityByAccessToken($token);
    }
}
