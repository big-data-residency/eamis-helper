<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/25
 * Time: 22:02
 */

namespace app\controllers;


use app\models\Student;

class LoginController extends ApiController
{
    public $modelClass = 'app\models\student';
    public $defaultAction = 'login';

    public function actionLogin(){
        $model = new Student();
        $request = \Yii::$app->getRequest();
        $model->load($request->post());
        return $model;
    }
}
