<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizType.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


class QuizType
{

    public function addQuizType($QuizType){
        $disc = new \App\Models\QuizType();
        return $disc->create(
                [
                    'QuizType' => $QuizType
                ]);

    }

    public function listQuizType(){
        $disc = new \App\Models\QuizType();
        return $disc->All();

    }

    public function deleteQuizType($idQuizType){
        $disc = new \App\Models\QuizType($idQuizType);
        $disc->delete();

    }
    
    public function updateQuizType($idQuizType, $QuizType){
        $disc = new \App\Models\QuizType($idQuizType);
        $disc->update(
                [
                  'QuizType' => $QuizType
                ]);
    }
}