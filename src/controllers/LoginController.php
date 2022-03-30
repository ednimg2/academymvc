<?php

class LoginController extends Controller
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo 'Kreipkis i service login ir patikrink ar toks useris yra sukurk session id';
        }

        echo 'Login forma';
    }
}