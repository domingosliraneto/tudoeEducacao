<?php

namespace App\Models;

use Lib\Database\Record;

class PageTOObject extends Record
{
    protected $table = 'PageTOObject';
    protected $fields = ['idPageFK', 'idPageObjectFK'];
}
