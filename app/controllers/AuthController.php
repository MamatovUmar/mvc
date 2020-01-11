<?php


namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{
    public function actionLogin() 
    {
        $this->render('login');
    }
}