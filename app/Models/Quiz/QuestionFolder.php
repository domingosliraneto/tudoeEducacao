<?php

namespace App\Models;

use Lib\Database\Record;


class QuestionFolder extends Record
{
    protected $table = 'QuestionFolder';
    protected $fields = ['idQuestionFolder', 'FolderName', 'Shared', 'idUserTE_FK'];
}