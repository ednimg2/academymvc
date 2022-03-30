<?php

class NotFoundController extends Controller
{
    public function __construct($name)
    {
        echo 'Controller '. $name .' not exist!';
    }

    public function index()
    {
        // TODO: Implement index() method.
    }
}