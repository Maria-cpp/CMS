<?php

namespace app\controllers;

use zum\phpmvc\Application;
use zum\phpmvc\Controller;
use zum\phpmvc\Request;
use zum\phpmvc\Response;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function home(){
        $params = [
            'name' => "TheCodeholic"
        ];
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

}