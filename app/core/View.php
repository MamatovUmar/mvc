<?php

namespace app\core;

class View
{
	public $route;
	public $layout;
	public $controller;
	public $errorController;

	public $title;
	public $description;
	public $keywords;

	public function __construct($route = null)
	{
		if ($route != null) {
			$this->route = $route;
			$this->controller = $route['controller'];
		}
	}

	public function render($view, $vars = [])
	{
		extract($vars);
		$view = 'app/views/' . $this->controller . '/' . $view . '.php';
		
		if (file_exists($view)) {
			ob_start();
			require $view;
			$content = ob_get_clean();
			require 'app/views/layouts/' . $this->layout . '.php';
		} else {
			self::errorCode(404);
		}
	}

	public static function errorCode($code)
	{
		http_response_code($code);
		$view = 'app/views/errors/' . $code . '.php';
		if (file_exists($view)) {
			require $view;
			exit;
		}
	}
}
