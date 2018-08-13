<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

//require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
//require_once dirname(__FILE__).'/../../../lib/database/Record.php';
//require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
//require_once dirname(__FILE__).'/../../../lib/database/Where.php';
//require_once dirname(__FILE__).'/../../models/quiz/UserTEAskedQuizQuestion.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


class UserTEAskedQuizQuestion
{

    public function addUserTEAskedQuizQuestion($Favoritequestion, $idUserTEAskedQuizFK, $idQuizQuestionFK, $idAlternativeFK)
    {
        $quiz = new \App\Models\UserTEAskedQuiz();
        return $quiz->create(
                [
                    'Favoritequestion' => $Favoritequestion,
                    'idUserTEAskedQuizFK' => $idUserTEAskedQuizFK,
                    'idQuizQuestionFK' => $idQuizQuestionFK,
                    'idAlternativeFK' => $idAlternativeFK
                    
                ]);
        

    }

    public function listUserTEAskedQuizQuestion($idUserTEAskedQuiz = null)
    {
        $quiz = new \App\Models\UserTEAskedQuiz();
        if ($idUserTEAskedQuiz == null){
            return $quiz->all();    
        } else {
            $filtro = new \Lib\Database\Filter('idUserTEAskedQuiz', '=', $idUserTEAskedQuiz);
            $where = new \Lib\Database\Where();
            $where->add($filtro);
            return $quiz->all($where);
            
        }
        

    }

    public function deleteUserTEAskedQuizQuestion($idUserTEAskedQuiz)
    {
        $quiz = new \App\Models\UserTEAskedQuiz($idUserTEAskedQuiz);
        $quiz->delete();

    }
    
    public function updateUserTEAskedQuizQuestion($Favoritequestion, $idUserTEAskedQuizFK, $idQuizQuestionFK, $idAlternativeFK)
    {
        $quiz = new \App\Models\UserTEAskedQuiz($idUserTEAskedQuiz);
        $quiz->update(
                [
                    'Favoritequestion' => $Favoritequestion,
                    'idUserTEAskedQuizFK' => $idUserTEAskedQuizFK,
                    'idQuizQuestionFK' => $idQuizQuestionFK,
                    'idAlternativeFK' => $idAlternativeFK
                ]);
    }
}
