<?php


namespace app\controllers;


use zum\phpmvc\Application;
use zum\phpmvc\Controller;
use zum\phpmvc\middlewares\AuthMiddleware;
use zum\phpmvc\Request;
use zum\phpmvc\Response;
use app\models\LoginForm;
use app\models\user;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
    }

    public function login(Request $request, Response $response)
    {
        $loginFOrm = new LoginForm();
        if($request->isPost()){
            $loginFOrm->loadData($request->getBody());

            if($loginFOrm->validate() && $loginFOrm->login(Application::$app->db)){
                Application::$app->controller->setLayout('admin');
                if(Application::$app->session->get('role')==='admin'){
                    Application::$app->controller->setLayout('admin');
                    $response->redirect('/admin/dashboard');
                }
                else{
                    $response->redirect('/home');
                }
                return;
            }
        }
        $this->setLayout('/auth');
        return $this->render('login',['model'=>$loginFOrm]);
    }

    public function register(Request $request)
    {
        $user = new user();

        if ($request->isPost()) {
            $user->loadData($request->getBody());
            if($user->validate() && $user->save()){
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                }

            return $this->render('register', ['model' => $user]);
        }
        $this->setLayout('auth');
        return $this->render('register', ['model' => $user]);
    }

    public function logout(Request $request, Response $response){
        Application::$app->logout();
        $response->redirect('/login');
    }

    public function profile(){
        return $this->render('profile');
    }
}