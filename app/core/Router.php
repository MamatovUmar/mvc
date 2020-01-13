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
		foreach ($routes as $route => $params) {
			$this->add($route, $params);
		}
	}

	public function add($route, $path)
	{
		$route = '#^' . $route . '$#';
		$arr = explode('/', $path);
		$params['controller'] = array_shift($arr);
		$params['action'] = array_shift($arr);

		$this->routes[$route] = $params;
	}

	public function match()
	{
		$url = Request::getUri();
		
		foreach ($this->routes as $route => $params) {
			
			if (preg_match($route, $url, $matches)) {
				array_shift($matches);
				$this->params = $params;
				$this->params['params'] = $matches;
				return true;
			}
		}
		return false;
	}

	public function run()
	{
		$error = new View();
		if ($this->match()) {
			$path = CONTROLLER_NAMESPACE . ucfirst($this->params['controller']) . 'Controller';
			if (class_exists($path)) {
				$action = 'action' . ucfirst($this->params['action']);
				if (method_exists($path, $action)) {
					$controller = new $path($this->params);
					call_user_func_array([$controller, $action], $this->params['params']);
				} else {
					$error->errorCode(404);
				}
			} else {
				$error->errorCode(404);
			}
		} else {
			$error->errorCode(404);
		}
	}

}
