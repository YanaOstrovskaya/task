<?php
session_start();
require_once '../vendor/autoload.php';
// require_once 'core/model.php';
// require_once 'core/router.php';
// require_once 'core/controller.php';
// require_once 'core/view.php';
// require_once 'core/view.php';
// require_once 'core/config.php';
use Core\Router;


Router::run();

		// try{
		// $pdo = new PDO('mysql:host=127.0.0.1;dbname=task;charset=utf8', 'root', '');
		// }
		// catch (PDOException $Exception){
		// 	 die('error');
		// }
//var_dump($_SERVER['REQUEST_URI']);

//echo '<pre>'.print_r($_SERVER, true).'</pre>';