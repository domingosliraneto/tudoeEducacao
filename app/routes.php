<?php

use Lib\Core\Route\Route;

$route = new Route;

/**
 * Route Login
 */

$route->controller('/login/autentica', 'Home\LoginController');
$route->controller('/login', 'Home\LoginController');

/**
 * Route Quiz
 */

$route->controller('/quiz', 'Quiz\QuizController');

/**
 * Route Home
 */

$route->controller('/', 'Home\HomeController');