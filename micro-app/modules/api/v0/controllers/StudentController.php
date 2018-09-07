<?php

namespace app\modules\api\v0\controllers;

use app\modules\api\v0\models\Student;

class StudentController extends ApiController {
    public $modelClass = 'app\modules\api\v0\models\Student';

    public function actionInfo(){
        $token = \Yii::$app->request->get();
        return Student::findIdentityByAccessToken($token);
    }
}
