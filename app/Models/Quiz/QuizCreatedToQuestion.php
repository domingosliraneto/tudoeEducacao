<?php

namespace App\Models;

use Lib\Database\Record;


class QuizCreatedToQuestion extends Record
{
    protected $table = 'QuizCreatedToQuestion';
    protected $fields = ['idUserTEQuizCreatedFK', 'idQuizQuestionFK'];
}