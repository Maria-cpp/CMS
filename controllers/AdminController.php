<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\Post;
use app\models\user;
use zum\phpmvc\AdminApp;
use zum\phpmvc\Controller;
use zum\phpmvc\middlewares\AdminMiddleware;
use zum\phpmvc\Request;
use zum\phpmvc\Response;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->setLayout('admin');
        $this->registerMiddleware(new AdminMiddleware(['profile']));
    }

    public function home(){
        $this->setLayout('admin');
        $params = [
            'name' => "Admin"
        ];
        return $this->renderAdmin('home' , $params);
    }
    public function dashboard(){
        $params = [
            'name' => "Admin"
        ];
        return $this->renderAdmin('dashboard' , $params);
    }
    public function login(Request $request, Response $response)
    {
        $loginFOrm = new LoginForm();
        if($request->isPost()){
            $loginFOrm->loadData($request->getBody());
            if($loginFOrm->validateAdmin() && $loginFOrm->adminlogin(AdminApp::$app->db)){
                $response->redirect('dashboard');
                return;
            }
        }
        $this->setLayout('admin');
        return $this->renderAdmin('login',['model'=>$loginFOrm]);
    }


    public function posts(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
            if($post->validateAdmin() && $post->send()) {
                AdminApp::$app->session->setFlash('success', 'Thanks for creating Blog.');
                return $response->redirectAdmin('/posts');
            }
        }
        return $this->renderAdmin('posts', [
            'model' =>$post
        ]);
    }


    public function post(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
            if($post->validateAdmin() && $post->send()) {
                AdminApp::$app->session->setFlash('success', 'Thanks for creating Blog.');
                return $response->redirectAdmin('/post');
            }
        }
        return $this->renderAdmin('posts', [
            'model' =>$post
        ]);
    }

    public function admin(Request $request, Response $response){
        $admin = new user();
        if($request->isPost()) {
            $admin->loadData($request->getBody());
            if($admin->validate() && $admin->send()) {
                AdminApp::$app->session->setFlash('success', 'Thanks for creating Blog.');
                return $response->redirect('/dashboard');
            }
            return;
        }
        $this->setLayout('admin');
        return $this->renderAdmin('admin_dashboard', ['model' => $admin]);
    }

    public function logout(Request $request, Response $response){
        AdminApp::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        $this->setLayout('admin');
        return $this->renderAdmin('profile');
    }

    public function user()
    {
        $this->setLayout('admin');
        return $this->renderAdmin('users');
    }

    public function category()
    {
        $this->setLayout('admin');
        return $this->renderAdmin('category');
    }

    public function tags()
    {
        $this->setLayout('admin');
        return $this->renderAdmin('tags');
    }
}