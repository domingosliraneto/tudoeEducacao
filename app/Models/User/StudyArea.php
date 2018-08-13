<?php


namespace App\Models;

use Lib\Database\Record;

class StudyArea extends Record
{
    protected $table = 'StudyArea';
    protected $fields = ['idStudyArea', 'StudyAreaName'];
}
