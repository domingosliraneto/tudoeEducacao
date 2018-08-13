<?php

namespace App\Models;

use Lib\Database\Record;

class PageObject extends Record
{
    protected $table = 'PageObject';
    protected $fields = ['idPageObject', 'PageObjectName'];
}