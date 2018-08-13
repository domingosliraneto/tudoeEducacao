<?php

namespace App\Models\Quiz;

use Lib\Database\Record;


class UserTEQuizCreated extends Record
{
    protected $table = 'UserTEQuizCreated';
    protected $fields = ['idUserTEQuizCreated', 'QuizName', 'CreationDateTime', 'idUserTEFK', 'idStudySubjectFK', 'idDisciplineFK'];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }
}