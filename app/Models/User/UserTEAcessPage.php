<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEAcessPage extends Record
{
    protected $table = 'UserTEAcessPage';
    protected $fields = ['idUserTEAcessPage',
                            'PageAccessDataTime',
                            'TimeInPage',
                            'idUserTEFK',
                            'idPageFK'];
}
