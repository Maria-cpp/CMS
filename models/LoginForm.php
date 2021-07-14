<?php


namespace app\models;


use zum\phpmvc\Application;
use zum\phpmvc\DbModel;
use zum\phpmvc\Model;

class LoginForm extends Model
{
    public string $email='';
    public string $password='';

    public function rules(): array
    {
        return [
            'email'=>[self::RULE_REQUIRED, self::RULE_EMAIL],
            'password'=>[self::RULE_REQUIRED]
        ];
    }

    public function login(){

        $user = user::findOne(['email'=> $this->email]);
        if(!$user){
            $this->addError('email', 'User does not exist with this email');
            return false;
        }
        if(password_verify(this-$this->password, $user->password)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }

    public function labels(): array
    {
        return [
            'email'=>'Your Email',
            'password' => 'Password'
        ];
    }
}