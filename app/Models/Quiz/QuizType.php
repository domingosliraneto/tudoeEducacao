<?php

namespace App\Models;

use Lib\Database\Record;


class QuizType extends Record
{
    protected $table = 'QuizType';
    protected $fields = ['idQuizType', 'QuizType'];
}