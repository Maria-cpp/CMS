<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\Post;
use app\models\user;
use zum\phpmvc\AdminApp;
use zum\phpmvc\Application;
use zum\phpmvc\Controller;
use zum\phpmvc\middlewares\AdminMiddleware;
use zum\phpmvc\middlewares\AuthMiddleware;
use zum\phpmvc\Request;
use zum\phpmvc\Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setLayout('admin');
        $this->registerMiddleware(new AdminMiddleware(['profile']));
    }

    public function dashboard(){
        $params = [
            'name' => "Admin"
        ];
        Application::$app->layout = 'admin';
        Application::$app->controller->setLayout('admin');
        return $this->render('dashboard' , $params);
    }


    public function addposts(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
            if($post->validate() && $post->send()) {
                Application::$app->session->setFlash('success', 'Thanks for creating Blog.');
                if(Application::$app->session->get('role')==='admin'){
                    Application::$app->controller->setLayout('admin');
                    return $this->render('adposts');
                }
                return $response->redirect('/_error');
            }
        }
        return $this->render('adposts', [
            'model' =>$post
        ]);
    }

    public function profile()
    {
        $this->setLayout('admin');
        return $this->render('profile');
    }

    public function users()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->render('adusers');
        }
        else{
            $restrict = new AuthMiddleware();
            $restrict->execute();
        }
    }

    public function category()
    {
        Application::$app->controller->setLayout('admin');
        return $this->render('category');
    }

    public function tags()
    {
        Application::$app->controller->setLayout('admin');
        return $this->render('tags');
    }
}