<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizCreatedToQuestion.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


class QuizCreatedToQuestion 
{

    public function addQuizCreatedToQuestion($idUserTEQuizCreatedFK, $idQuizQuestionFK){
        $quest = new \App\Models\QuizCreatedToQuestion();
        return $quest->create(
                [
                    'idUserTEQuizCreatedFK' => $idUserTEQuizCreatedFK,
                    'idQuizQuestionFK' => $idQuizQuestionFK
                ]);

    }

    public function listQuizCreatedToQuestionByQuiz($idUserTEQuizCreatedFK = null){
        $quest = new \App\Models\QuizCreatedToQuestion();
        if ($idUserTEQuizCreatedFK == null){
            return $quest->all();    
        } else {
            $filtro = new \Lib\Database\Filter('idUserTEQuizCreatedFK', '=', $idUserTEQuizCreatedFK);
            $where = new \Lib\Database\Where();
            $where->add($filtro);
            return $quest->all($where);
        }
        

    }
    public function listQuizCreatedToQuestion($idQuizQuestion = null){
        $quest = new \App\Models\QuizCreatedToQuestion();
        if ($idQuizQuestion == null){
            return $quest->all();    
        } else {
            $filtro = new \Lib\Database\Filter('idQuizQuestion', '=', $idQuizQuestion);
            $where = new \Lib\Database\Where();
            $where->add($filtro);
            return $quest->all($where);
        }
        

    }

    public function deleteQuizCreatedToQuestion($idQuizQuestion){
        $quest = new \App\Models\QuizCreatedToQuestion($idQuizQuestion);
        $quest->delete();

    }
    
    public function updateQuizCreatedToQuestion($idUserTEQuizCreatedFK, $idQuizQuestionFK){
        $quest = new \App\Models\QuizCreatedToQuestion($idQuizQuestionFK);
        $quest->update(
                [
                    'idUserTEQuizCreatedFK' => $idUserTEQuizCreatedFK,
                    'idQuizQuestionFK' => $idQuizQuestionFK
                ]);
    }
}