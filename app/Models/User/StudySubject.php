<?php

namespace App\Models;

use Lib\Database\Record;


class StudySubject extends Record
{
    protected $table = 'StudySubject';
    protected $fields = ['idStudySubject', 'StudySubjectName', 'StudySubjectDesciption'];
}