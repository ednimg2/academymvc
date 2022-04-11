<?php

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once "../vendor/autoload.php";

use App\Libraries\Application;

if ($_SERVER['REQUEST_URI'] === '/home') {
    header('Location: /');
}

$url = (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/')
    ? explode('/', trim($_SERVER['REQUEST_URI'], '/'))
    : ['home'];

$controllerName = $url[0];
$controllerMethod = $url[1] ?? 'index';

$app = new Application($controllerName);

try {
    $controller = $app->loadController();
    $app->loadMethod($controller, $controllerMethod);
} catch (Exception $exception) {
    throw new Exception($exception);
}

