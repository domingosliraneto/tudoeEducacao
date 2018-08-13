<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

// require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
// require_once dirname(__FILE__).'/../../../lib/database/Record.php';
// require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
// require_once dirname(__FILE__).'/../../../lib/database/Where.php';
// require_once dirname(__FILE__).'/../../models/quiz/UserTEAskedQuiz.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


class UserTEAskedQuiz
{

    public function addUserTEAskedQuiz($askedQuiz, $idUserTEFK, $idUserTEQuizCreatedFK)
    {
        $quiz = new \App\Models\UserTEAskedQuiz();
        return $quiz->create(
                [
                    'askedQuiz' => $askedQuiz,
                    'idUserTEFK' => $idUserTEFK,
                    'idUserTEQuizCreatedFK' => $idUserTEQuizCreatedFK
                    
                ]);
        

    }

    public function listUserTEAskedQuiz($idUserTEAskedQuiz = null)
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

    public function deleteUserTEAskedQuiz($idUserTEAskedQuiz)
    {
        $quiz = new \App\Models\UserTEAskedQuiz($idUserTEAskedQuiz);
        $quiz->delete();

    }
    
    public function updateUserTEAskedQuiz($idUserTEAskedQuiz, $QuizName, $CreationDateTime, $idUserTEFK, $idStudySubjectFK, $idDisciplineFK)
    {
        $quiz = new \App\Models\UserTEAskedQuiz($idUserTEAskedQuiz);
        $quiz->update(
                [
                    'askedQuiz' => $askedQuiz,
                    'idUserTEFK' => $idUserTEFK,
                    'idUserTEQuizCreatedFK' => $idUserTEQuizCreatedFK
                ]);
    }
}
