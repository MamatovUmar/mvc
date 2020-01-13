<?php

namespace app\core;

use app\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $layout = 'default';
    public $errorController = 'main';
	public $errorLayout = 'default';

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->view->layout= $this->layout;
        $this->view->errorController= $this->errorController;
        $this->view->errorLayout= $this->errorLayout;
    }

    public function render($title, $vars = []) {
        $this->view->render($title, $vars);
    }

    public function actionError() 
    {
        // http_response_code(404);
        $this->render('error');
    }

    protected function redirect($url) {		
		header('location: ' . $url);
		exit;
    }
    
    public function getMethod()
    {
        return Request::getMethod();
    }

    public function get($param = null)
    {
        if(is_null($param))
        {
            return $_GET;
        }else {
            return $_GET[$param] ?? $_GET;
        }
    }

    public function post($param = null)
    {
        return $param ? $_POST[$param] : $_POST;
    }
}