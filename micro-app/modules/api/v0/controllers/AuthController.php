<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/30
 * Time: 15:56
 */

namespace app\modules\api\v0\controllers;


use app\modules\api\v0\models\Login;

class AuthController extends ApiController
{
    public $modelClass = '';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        unset($behaviors['authenticator']);
        return $behaviors;
    }

    public function actionLogin(){
        $model = new Login();
        $model->load(\Yii::$app->request->post(),'');
        if($model->validate() && $model->login()){
            return ['token' => $model->login()];
        }
        else {
            return $model;
        }
    }

}
