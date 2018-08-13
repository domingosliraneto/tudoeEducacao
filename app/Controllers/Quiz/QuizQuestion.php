<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/QuizQuestion.php';
require_once dirname(__FILE__).'/../../../lib/core/Loader.php';


class QuizQuestion 
{

    public function addQuestion($QuestionWording, $idQuestionFolderFK){
        $quest = new \App\Models\QuizQuestion();
        return $quest->create(
                [
                    'QuestionWording' => $QuestionWording,
                    'idQuestionFolderFK' => $idQuestionFolderFK
                ]);

    }

    public function listQuestionByQuiz($QuizCreatedToQuestion){
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
    public function listQuestion($idQuizQuestion = null){
        $quest = new \App\Models\QuizQuestion();
        if ($idQuizQuestion == null){
            return $quest->all();    
        } else {
            $filtro = new \Lib\Database\Filter('idQuizQuestion', '=', $idQuizQuestion);
            $where = new \Lib\Database\Where();
            $where->add($filtro);
            return $quest->all($where);
        }
        

    }

    public function deleteQuestion($idQuizQuestion){
        $quest = new \App\Models\QuizQuestion($idQuizQuestion);
        $quest->delete();

    }
    
    public function updateQuestion($idQuizQuestion, $QuestionWording, $idQuestionFolderFK){
        $quest = new \App\Models\QuizQuestion($idQuizQuestion);
        $quest->update(
                [
                    'QuestionWording' => $QuestionWording,
                    'idQuestionFolderFK' => $idQuestionFolderFK
                ]);
    }
}