<?php

namespace App\Controllers;

ini_set('display_errors', true);
error_reporting(E_ALL);

//require_once dirname(__FILE__).'/../../../lib/database/Connection.php';
//require_once dirname(__FILE__).'/../../../lib/database/Record.php';
//require_once dirname(__FILE__).'/../../../lib/database/Filter.php';
//require_once dirname(__FILE__).'/../../../lib/database/Where.php';
//require_once dirname(__FILE__).'/../../models/quiz/UserTEQuizCreated.php';
require_once __DIR__.'/../../../lib/core/Loader.php';


class UserTEQuizCreated
{

    public function addQuiz($QuizName, $CreationDateTime, $idUserTEFK, $idStudySubjectFK, $idDisciplineFK)
    {
        $quiz = new \App\Models\UserTEQuizCreated();
        return $quiz->create(
                [
                    'QuizName' => $QuizName,
                    'CreationDateTime' => $CreationDateTime,
                    'idUserTEFK' => $idUserTEFK,
                    'idStudySubjectFK' => $idStudySubjectFK,
                    'idDisciplineFK' => $idDisciplineFK
                ]);
        

    }

    public function listQuiz($idUserTEQuizCreated = null)
    {
        $quiz = new \App\Models\UserTEQuizCreated();
        if ($idUserTEQuizCreated == null){
            return $quiz->all();    
        } else {
            $filtro = new \Lib\Database\Filter('idUserTEQuizCreated', '=', $idUserTEQuizCreated);
            $where = new \Lib\Database\Where();
            $where->add($filtro);
            return $quiz->all($where);
            
        }
        

    }

    public function deleteQuiz($idUserTEQuizCreated)
    {
        $quiz = new \App\Models\UserTEQuizCreated($idUserTEQuizCreated);
        $quiz->delete();

    }
    
    public function updateQuiz($idUserTEQuizCreated, $QuizName, $CreationDateTime, $idUserTEFK, $idStudySubjectFK, $idDisciplineFK)
    {
        $quiz = new \App\Models\UserTEQuizCreated($idUserTEQuizCreated);
        $quiz->update(
            [
                'QuizName' => $QuizName,
                'CreationDateTime' => $CreationDateTime,
                'idUserTEFK' => $idUserTEFK,
                'idStudySubjectFK' => $idStudySubjectFK,
                'idDisciplineFK' => $idDisciplineFK
            ]);
    }
}
