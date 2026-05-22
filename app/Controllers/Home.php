<?php

namespace App\Controllers;

use Config\View;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function coba()
    {
        echo 'Hello World!';
    }
}
