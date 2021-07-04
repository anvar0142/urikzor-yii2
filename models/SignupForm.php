<?php

namespace app\models;

use yii\base\Model;

class SignupForm extends Model {
    public $username;
    public $password;
    public $email;
    public $phone_num;
    public $name;
    public $surname;

    public function rules()
    {
        return [
          [['name', 'surname', 'username', 'password', 'email', 'phone_num'], 'required']
        ];
    }
}