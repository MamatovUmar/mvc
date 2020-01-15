<?php


define('ROOT', dirname(__DIR__));
define('APP', dirname(__FILE__));
define('CONTROLLERS', APP . '/controllers/');

define('CONTROLLER_NAMESPACE', 'app\controllers\\');

// dump(ROOT);
require "app/libs/rb.php";
use app\core\Router;

spl_autoload_register(function($class){
    $path = str_replace('\\', '/', $class . '.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();

$router = new Router();
$router->run();