<?php

namespace App\Models;

use Lib\Database\Record;

class StudySubjectFavorite extends Record
{
    protected $table = 'StudySubjectFavorite';
    protected $fields = ['idStudySubjectFavorite',
                            'idUserTEFK',
                            'idStudySubjectFK'];
}
