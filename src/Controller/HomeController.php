<?php

namespace App\Controller;

use App\Libraries\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('home/index.php', [
            'order_id' => 1234,
        ]);
    }

    public function get()
    {
        echo 'Load get method';
    }
}