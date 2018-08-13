<?php

namespace App\Models;

use Lib\Database\Record;


class QuizQuestion extends Record
{
    protected $table = 'QuizQuestion';
    protected $fields = ['idQuizQuestion', 'QuestionWording', 'idQuestionFolderFK'];
}