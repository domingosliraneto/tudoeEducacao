<?php

namespace App\Models;

use Lib\Database\Record;

class GroupChat extends Record 
{
    protected $table = 'GroupChat';
    protected $fields = ['idGroupChat', 'GroupName'];
}
