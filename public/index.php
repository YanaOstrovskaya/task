<?php
session_start();
require_once '../vendor/autoload.php';

use Core\Router;

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
Router::run();
