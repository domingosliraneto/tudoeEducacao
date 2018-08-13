<?php

namespace App\Models;

use Lib\Database\Record;

class StudyAreaFavorite extends Record
{
    protected $table = 'StudyAreaFavorite';
    protected $fields = ['idStudyAreaFavorite', 'idUserTEFK', 'idStudyAreaFK'];
}
