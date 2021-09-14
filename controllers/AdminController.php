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
        return $this->renderAdmin('admin/dashboard' , $params);
    }


    public function posts(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
            if($post->validate() && $post->send()) {
                Application::$app->session->setFlash('success', 'Thanks for creating Blog.');
                if(Application::$app->session->get('role')==='admin'){
                    Application::$app->controller->setLayout('admin');
                    return $this->renderAdmin('admin/posts');
                }
                return $response->redirect('/_error');
            }
        }
        return $this->renderAdmin('admin/posts', [
            'model' =>$post
        ]);
    }


    public function post(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
            if($post->validate() && $post->send()) {
                Application::$app->session->setFlash('success', 'Thanks for creating Blog.');
                if(Application::$app->session->get('role')==='admin'){
                    Application::$app->controller->setLayout('admin');
                    return $this->renderAdmin('admin/post');
                }
                return $response->redirect('/_error');
            }
        }
        return $this->renderAdmin('admin/post', [
            'model' =>$post
        ]);
    }

    public function edit(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
                Application::$app->session->setFlash('success', 'Data Updated.');
                if(Application::$app->session->get('role')==='admin'){
                    Application::$app->controller->setLayout('admin');
                    return $this->renderAdmin('admin/editpost');
                }

            return $response->redirect('/_error');
        }

        return $this->renderAdmin('admin/editpost', [
            'model' =>$post
        ]);
    }

    public function edituser(Request $request, Response $response){
        $user = new user();
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if(Application::$app->session->get('role')==='admin'){
                Application::$app->controller->setLayout('admin');
                return $this->renderAdmin('admin/edituser');
            }
            return $response->redirect('/_error');
        }
        return $this->renderAdmin('admin/edituser', [
            'model' =>$user
        ]);
    }

    public function createuser(Request $request, Response $response){
        $user = new user();
        if($request->isPost()) {
            $user->loadData($request->getBody());
            if(Application::$app->session->get('role')==='admin'){
                Application::$app->controller->setLayout('admin');
                return $this->renderAdmin('admin/createuser');
            }
            return $response->redirect('/_error');
        }
        return $this->renderAdmin('admin/createuser', [
            'model' =>$user
        ]);
    }


    public function profile()
    {
        $this->setLayout('admin');
        return $this->render('profile');
    }

    public function delete()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->renderAdmin('admin/delete');
        }
        else{
            $restrict = new AuthMiddleware();
            $restrict->execute();
        }
    }

    public function update()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->renderAdmin('admin/update');
        }
        else{
            $restrict = new AuthMiddleware();
            $restrict->execute();
        }
    }

    public function users()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->renderAdmin('admin/users');
        }
        else{
            $restrict = new AuthMiddleware();
            $restrict->execute();
        }
    }

    public function user()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->renderAdmin('admin/user');
        }
        else{
            $restrict = new AuthMiddleware();
            $restrict->execute();
        }
    }

    public function category()
    {
        Application::$app->controller->setLayout('admin');
        return $this->renderAdmin('admin/category');
    }

    public function tags()
    {
        Application::$app->controller->setLayout('admin');
        return $this->render('tags');
    }
}