<?php

namespace App\Models;

use Lib\Database\Record;

class Page extends Record
{
    protected $table = 'Page';
    protected $fields = ['idPage', 'linkPage'];
}
