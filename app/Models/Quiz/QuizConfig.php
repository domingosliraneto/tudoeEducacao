<?php

namespace App\Models;

use Lib\Database\Record;


class QuizConfig extends Record
{
    protected $table = 'QuizConfig';
    protected $fields = ['idQuizConfig', 'LimitTime', 'Points' , 'NofQuestions', 'Randomize', 'idQuizTypeFK', 'idUserTEQuizCreatedFK'];
}