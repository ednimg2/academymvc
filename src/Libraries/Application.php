<?php

namespace App\Libraries;

use Exception;

class Application
{
    private string $controllerName;

    public function __construct($controllerName)
    {
        $this->controllerName = $controllerName;
    }

    /**
     * @return Controller
     * @throws Exception
     */
    public function loadController(): Controller
    {
        $class = 'App\\Controller\\' . ucfirst($this->controllerName) . 'Controller';

        if (!class_exists($class)) {
            throw new Exception('Class ' . $class . ' not found');
        }

        return new $class($this->controllerName);
    }

    /**
     * @param Controller $controller
     * @param string $controllerMethod
     * @throws Exception
     */
    public function loadMethod(Controller $controller, string $controllerMethod): void
    {
        if (!method_exists($controller, $controllerMethod)) {
            throw new Exception('Method ' . $controllerMethod. 'not exist');
        }

        $controller->$controllerMethod();
    }
}