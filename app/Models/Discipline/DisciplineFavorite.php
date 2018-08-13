<?php

namespace App\Models;

use Lib\Database\Record;

class DisciplineFavorite extends Record
{
    protected $table = 'DisciplineFavorite';
    protected $fields = ['DisciplineFavorite',
                            'idUserTEFK',
                            'idDisciplineFK'];
}