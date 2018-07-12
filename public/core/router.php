<?php
namespace Core;

use Exception;

class Router
{
    public static function run()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url_segments = explode('/', $url);
        $mainUrl = strlen($url_segments[1])>0?$url_segments[1]:'task';
        $mainUrl = ucwords($mainUrl);
        $fileController = 'controllers/'.$mainUrl.'Controller.php';
        if (file_exists($fileController)) {
            $nameController = $mainUrl.'Controller';
            $namesp = '\\Controllers';
            $fullNameClass = $namesp.'\\'.$nameController;
            $controller = new $fullNameClass;
            $method = isset($url_segments[2])?$url_segments[2]:'index';
            if (method_exists($controller, $method)) {
                $controller->$method();
            } else {
                throw new Exception("Page not found!", 404);
            }
        } else {
            throw new Exception("Page not found!", 404);
        }
    }
}
