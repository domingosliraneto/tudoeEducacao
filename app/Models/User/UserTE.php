<?php

namespace App\Models;

use Lib\Database\Record;

class UserTE extends Record
{
    protected $table = 'UserTE';
    protected $fields = ['idUser', 
                            'Login',
                            'Senha',
                            'UserTELevel',
                            'UserTEStatus'];
}
