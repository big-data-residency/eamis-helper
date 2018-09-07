<?php
/**
 * Created by PhpStorm.
 * User: 98203
 * Date: 2018/9/6
 * Time: 11:40
 */

namespace app\modules\api\v0\models;

use yii\base\Model;

/**
 * Class Login
 * @package app\modules\api\v0\models
 * @property Student _user
 */
class Login extends Model
{

    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['rememberMe'], 'boolean'],
            [['password'], 'validatePassword']
        ];
    }

    public function validatePassword()
    {

    }

    /**
     * @return Student|null
     */
    public function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Student::findIdentityByNickName($this->username);

        }

        return $this->_user;
    }

    public function login()
    {
        $access_token = $this->getUser()->generateAccessToken();
        if ($this->_user->save()) {
            return $access_token;
        }
        return false;
    }

}
