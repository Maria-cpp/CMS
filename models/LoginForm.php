<?php

namespace app\models;


use zum\phpmvc\Application;
use zum\phpmvc\db\DbModel;

class LoginForm extends DBModel
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

    public function sessionCredentials($userdata): bool
    {
        if(!$userdata){
            $this->addError('email', 'User does not exist with this email');
            return false;
        }
        $id = $userdata->id;
        $user = $userdata->username;
        $pass = $userdata->password;
        $firstname = $userdata->firstname;
        $lastname = $userdata->lastname;
        $email = $userdata->email;
        $role= $userdata->role;
        if(!password_verify($this->password, $pass)){
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $user;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email']  = $email;
        $_SESSION['role'] = $role;

        return true;
    }

    public function login(){
        $userdata = user::findOne(['email'=> $this->email]);
        if(!$this->sessionCredentials($userdata)){
            return false;
        }
        return Application::$app->login($userdata);
    }


    public function labels(): array
    {
        return [
            'email'=>'Your Email',
            'password' => 'Password'
        ];
    }


    public function tableName():string{
        return 'users';
    }

    public function primaryKey():string{
        return 'id';
    }

    public function attributes(): array
    {
        return ['email', 'password'];
    }

    public function setAttributres(string $email, string $password)
    {
       $this->email = $email;
       $this->password=$password;
    }
}