<?php

namespace App\Libraries;

use Exception;

abstract class Controller
{
    public View $view;

    public abstract function index();

    /**
     * @param $templatePath
     * @param $data
     * @throws Exception
     */
    public function render($templatePath, $data): void
    {
        $pathToView = '../src/Views/'. $templatePath;

        if (!file_exists($pathToView)) {
            throw new Exception('Template '. $pathToView . 'not found!');
        }

        (new View($pathToView, $data))->render();
    }
}