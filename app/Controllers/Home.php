<?php

namespace App\Controllers;

use Config\View;

class Home extends BaseController
{
    public function index()
    {
        return view('landing_page');
    }
    public function coba()
    {
        echo 'Hello World!';
    }
}
