<?php

namespace app\controllers;

use app\models\Post;
use app\models\Admin;
use zum\phpmvc\Application;
use zum\phpmvc\Controller;
use zum\phpmvc\middlewares\AuthMiddleware;
use zum\phpmvc\Request;
use zum\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home(){
        $params = [
            'name' => "TheCodeholic"
        ];
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->render('home' , $params);
        }
        return $this->render('home' , $params);
    }
    public function contact(Request $request, Response $response){
        $contact = new ContactForm();
        if($request->isPost()) {
            $contact->loadData($request->getBody());
            if($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Thanks for Contacting us.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' =>$contact
        ]);
    }

    public function posts(Request $request, Response $response){
        $post = new Post();
        if($request->isPost()) {
            $post->loadData($request->getBody());
            if($post->validate() && $post->send()) {
                if(Application::$app->session->get('role')==='admin'){
                    Application::$app->controller->setLayout('admin');
                    Application::$app->session->setFlash('success', 'Thanks for creating Blog.');
                    return $response->redirect('/posts');
                }
                Application::$app->session->setFlash('success', 'Thanks for creating Blog.');
                return $response->redirect('/posts');
            }
        }
        return $this->render('posts', [
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
                    return $response->redirect('/posts');
                }
                return $response->redirect('/post');
            }
        }
        return $this->render('post', [
            'model' =>$post
        ]);
    }

    public function dashboard(){
        $params = [
            'name' => "Admin"
        ];
        Application::$app->layout = 'admin';
        Application::$app->controller->setLayout('admin');
        return $this->render('dashboard' , $params);
    }
    public function category()
    {
        if(Application::$app->session->get('role')==='admin'){
        Application::$app->controller->setLayout('admin');
        return $this->render('category');
        }
        return $this->render('category');
    }
    public function tags()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->render('tags');
        }
        return $this->render('tags');
    }


    public function users()
    {
        if(Application::$app->session->get('role')==='admin'){
            Application::$app->controller->setLayout('admin');
            return $this->render('users');
        }
        else{
            $restrict = new AuthMiddleware();
            $restrict->execute();
        }
    }
}
