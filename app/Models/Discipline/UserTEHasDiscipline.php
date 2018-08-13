<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEHasDiscipline extends Record
{
    protected $table = 'UserTEHasDiscipline';
    protected $fields = ['idUserTEFK', 'idDisciplineFK'];
}
