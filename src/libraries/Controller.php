<?php

abstract class Controller
{
    public View $view;

    public function __construct($controllerIndex)
    {
        $pathToView = 'src/views/'. $controllerIndex .'/index.php';

        if (file_exists($pathToView)) {
            $this->view = new View($controllerIndex, $pathToView);
        }
    }

    public abstract function index();
}