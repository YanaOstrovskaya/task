<?php

namespace Core;

use PDO;
use PDOException;

class Model
{
    public static $pdo;

    public function __construct()
    {
        $config = \Core\Config::get();
        try {
            self::$pdo = new PDO('mysql:host='.$config['DB_HOST'].';dbname='.
                                 $config['DB_NAME'].';charset=utf8', $config['DB_USER'], $config['DB_PASSWORD']);
        } catch (PDOException $exception) {
            die('Could not connect '.$exception);
        }
    }
}
