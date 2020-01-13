<?php

namespace app\core;

class View
{
	public $route;
	public $layout = 'default';
	public $controller;
	public $errorController;
	public $errorLayout = 'default';

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
			$this->errorCode(404);
		}
	}

	public function errorCode($code)
	{
		http_response_code($code);
		switch ($code) {
			case 404:
				$message = 'Страница не найдено';
				break;
			case 403:
				$message = 'Доступ запрешен';
				break;
			case 500:
				$message = 'Внутренная ошибка сервера';
				break;
			default:
				$message = 'Неизвесная ошибка';
		}
		$view = 'app/views/error/index.php';
		if (file_exists($view)) {
			ob_start();
			require $view;
			$content = ob_get_clean();
			require 'app/views/layouts/' . $this->errorLayout . '.php';
			exit;
		}
	}
}
