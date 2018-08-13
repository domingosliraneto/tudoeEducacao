<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizConfig.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


class QuizConfig
{

    public function addQuizConfig($LimitTime, $Points, $NofQuestions, $Randomize, $idQuizTypeFK, $idUserTEQuizCreatedFK){
        $disc = new \App\Models\QuizConfig();
        return $disc->create(
                [
                    'LimitTime' => $LimitTime,
                    'Points' => $Points,
                    'NofQuestions' => $NofQuestions,
                    'Randomize' => $Randomize,
                    'idQuizTypeFK' => $idQuizTypeFK,
                    'idUserTEQuizCreatedFK' => $idUserTEQuizCreatedFK
                    
                ]);

    }

    public function listQuizConfig(){
        $disc = new \App\Models\QuizConfig();
        return $disc->All();

    }

    public function deleteQuizConfig($idQuizConfig){
        $disc = new \App\Models\QuizConfig($idQuizConfig);
        $disc->delete();

    }
    
    public function updateQuizConfig($idQuizConfig, $LimitTime, $Points, $NofQuestions, $Randomize, $idQuizTypeFK, $idUserTEQuizCreatedFK){
        $disc = new \App\Models\QuizConfig($idQuizConfig);
        $disc->update(
                [
                    'LimitTime' => $LimitTime,
                    'Points' => $Points,
                    'NofQuestions' => $NofQuestions,
                    'Randomize' => $Randomize,
                    'idQuizTypeFK' => $idQuizTypeFK,
                    'idUserTEQuizCreatedFK' => $idUserTEQuizCreatedFK
                ]);
    }
}