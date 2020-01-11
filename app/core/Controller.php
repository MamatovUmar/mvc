<?php

namespace app\core;

use app\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $layout = 'default';
    public $errorController = 'main';

    public function __construct($route) {
        $this->route = $route;
        $this->view = new View($route);
        $this->view->layout= $this->layout;
        $this->view->errorController= $this->errorController;
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
}