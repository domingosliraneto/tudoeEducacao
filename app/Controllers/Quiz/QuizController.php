<?php

namespace App\Controllers\Quiz;

use App\Controllers\Controller;

class QuizController extends Controller
{
    public function index()
    {
        require_once __DIR__.'/../../Views/Quiz/addquiz.php';
    }

    public function teste($param = '')
    {
        echo 'home/teste '.$param;
    }
}