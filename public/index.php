<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Lib\Render\Render;
use Lib\Session\Session;

//session_start();

if (Session::exists('idQuizCreated')) {
    Session::destroy('idQuizCreated');
}

Render::render('header');

Render::renderRoute('routes');

Render::render('footer');