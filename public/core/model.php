<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
	public static $pdo;

	public function __construct(){		
		//$dsn ='mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8';
		try
		{
			self::$pdo = new PDO('mysql:host=127.0.0.1;dbname=task;charset=utf8', 'root', '');
		}
		catch (PDOException $exception)
		{
			 die('Could not connect '.$exception);
		}
		
	}




}