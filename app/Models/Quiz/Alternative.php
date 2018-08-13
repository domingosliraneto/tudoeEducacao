<?php

namespace App\Models;

use Lib\Database\Record;


class Alternative extends Record
{
    protected $table = 'Alternative';
    protected $fields = ['idAlternative', 'content', 'isCorrect', 'idQuizQuestionFK'];
}