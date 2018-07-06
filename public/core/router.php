<?php
namespace Core;

use Controllers\TypeController;
use Exception;


class Router{
	public static function run(){
		
		$url = $_SERVER['REQUEST_URI'];
		

		$url_segments = explode('/', $url);
		//var_dump($url_segments[2]);

		
		$mainUrl = strlen($url_segments[1])>0?$url_segments[1]:'task';
		$mainUrl = ucwords($mainUrl);
		
		//var_dump($mainUrl);					}

		$fileController = 'controllers/'.$mainUrl.'Controller.php';


		if(file_exists($fileController))
		{
			//require_once $fileController;
			//$controller = new $mainUrl.'Controller';
			//var_dump($mainUrl.'Controller');
			$nameController = $mainUrl.'Controller';
			//var_dump($nameController);
			$namesp = '\\Controllers';
			$fullNameClass = $namesp.'\\'.$nameController;
			$controller = new $fullNameClass;
			//var_dump($controller);
			$method = isset($url_segments[2])?$url_segments[2]:'index';
			if(method_exists($controller, $method))
			{
				$controller->$method();
			}
			else
			{
				throw new Exception("Page not found!", 404);
			}
		}
		else
		{
			//echo "Error";
			throw new Exception("Page not found!", 404);
		}



	}
}
