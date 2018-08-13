<?php

namespace App\Models;

use Lib\Database\Record;

class DisciplineHasSubject extends Record
{
    protected $table = 'DisciplineHasSubject';
    protected $fields = ['idDisciplineFK', 'idStudySubjectFK'];
}

