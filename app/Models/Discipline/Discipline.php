<?php

namespace App\Models;

use Lib\Database\Record;


class Discipline extends Record
{
    protected $table = 'Discipline';
    protected $fields = ['idDiscipline', 'DisciplineName', 'idStudyAreaFK'];
}