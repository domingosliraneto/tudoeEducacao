<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEAcessObject extends Record
{
    protected $table = 'UserTEAcessObject';
    protected $fields = ['idUserTEFK', 'idPageObjectFK'];
}
