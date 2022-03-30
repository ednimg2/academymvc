<?php

class Application
{
    private Controller $controller;

    public function __construct()
    {
        if ($_SERVER['REQUEST_URI'] === '/home') {
            header('Location: /');
        }

        $url = (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/')
            ? explode('/', trim($_SERVER['REQUEST_URI'], '/'))
            : ['home'];

        $controllerIndex = $url[0];
        $method = $url[1] ?? 'index';

        $this->controller = $this->createController($controllerIndex);

        $method = method_exists($this->controller, $method) ? $method : 'index';
        $this->controller->$method();
    }

    public function createController($controllerIndex): Controller
    {
        $controllerName = ucfirst($controllerIndex) . 'Controller';

        if (class_exists($controllerName)) {
            return new $controllerName($controllerIndex);
        }

        return new NotFoundController($controllerIndex);
    }
}