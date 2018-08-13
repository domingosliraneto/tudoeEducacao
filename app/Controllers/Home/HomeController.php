<?php

namespace App\Controllers\Home;

use App\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->view('Home/index');
    }
}