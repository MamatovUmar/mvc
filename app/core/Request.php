<?php

namespace app\core;

class Request
{
    public static $params;
    
    public function __construct()
    {
        
    }

    /**
     * Возвращает строку запроса без get параметров
     *
     * @return string
     */
    public static function getUri()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return trim($uri, '/');
    }

    /**
     * Возвращает метод запроса 
     *
     * @return string
     */
    public static function getMethod()
    {
        if (isset($_SERVER['REQUEST_METHOD'])) {
            return strtoupper($_SERVER['REQUEST_METHOD']);
        }

        return 'GET';
    }
}