<?php

class View
{
    public string $controllerIndex;
    public string $pathToView;

    public function __construct($controllerIndex, $pathToView)
    {
        $this->controllerIndex = $controllerIndex;
        $this->pathToView = $pathToView;
    }

    public function render()
    {
        include 'src/views/template.php';
    }
}