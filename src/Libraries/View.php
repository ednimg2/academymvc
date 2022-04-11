<?php

namespace App\Libraries;

class View
{
    public string $pathToView;
    private array $data;

    public function __construct($pathToView, $data)
    {
        $this->pathToView = $pathToView;
        $this->data = $data;
    }

    public function render(): void
    {
        include '../src/Views/base.php';
    }
}