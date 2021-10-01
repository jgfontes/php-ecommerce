<?php

require __DIR__ . '/../vendor/autoload.php';

use Jfontes\EdirectoryExercise\Controler\LoginController;
use Jfontes\EdirectoryExercise\Controler\SearchListingController;

$path = $_SERVER['PATH_INFO'];
$routes = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($path, $routes)){
    http_response_code(404);
    exit();
}

session_start();

//Add blocked pages in order to redirect users without login
$blockedPage = stripos($path, 'create-listing');
if(!isset($_SESSION['logged']) && $blockedPage !== false){
    echo 'REDIRECT USER';
    header('Location: /login');
    exit();
}

$controllerClass = $routes[$path];
$controller = new $controllerClass();
$controller->ProcessRequisite();
