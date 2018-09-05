<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/8/30
 * Time: 15:56
 */

namespace app\controllers;


use yii\web\Controller;

class AuthController extends ApiController
{
    public $modelClass = '';

    public function actionLogin(){
        $request = \Yii::$app->request;
        $username = $request->post('username');
        $password = $request->post('password');
        if($username == 'admin' && $password == 'admin'){
            return [
              'token' => 'admin_TOKEN',
            ];
        }
        else{
            return [
                'success' => false,
                'error' => 'login error'
            ];
        }
    }

}