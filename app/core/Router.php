<?php

namespace app\core;

use app\core\View;

class Router
{
	protected $routes = [];
	protected $params = [];

	public function __construct()
	{
		$routes = require 'app/config/routes.php';
		foreach($routes as $route => $params)
		{
			$this->add($route, $params);
		}
	}

	public function add($route, $params )
	{
		$route = '#^' . $route . '$#';
		$this->routes[$route] = $params;
	}

	public function match()
	{
		$url = trim($_SERVER['REQUEST_URI'], '/');
		$ex = explode('/', $url); 
		$id = '';
		if(count($ex) == 3){
			$url = $ex[0] . '/' . $ex[1];
			$id = $ex[2];
		}
		foreach ($this->routes as $route => $params) 
		{
			if(preg_match($route, $url, $matches))
			{
				if(isset($params['id'])){
					if(empty($id)){
						View::errorCode(404);
					}
					$params['id'] = $id;
				}
				$this->params = $params;
				return true;
			}
		} 
		return false;
	}

	public function run()
	{
		if($this->match())
		{
			$path = 'app\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
			if(class_exists($path))
			{
				$action = 'action' . ucfirst($this->params['action']);
				if(method_exists($path, $action)){
					$controller = new $path($this->params);
					$controller->$action();
				}else{
					View::errorCode(404);
				}
			}else{
				View::errorCode(404);
			}
		}else{
			View::errorCode(404);
		}
	}

}