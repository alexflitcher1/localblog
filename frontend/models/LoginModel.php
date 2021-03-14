<?php
namespace frontend\models;

use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            
        ];
    }
}
