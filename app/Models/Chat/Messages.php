<?php


namespace App\Models;

use Lib\Database\Record;

class Messages extends Record
{
    protected $table = 'Messages';
    protected $fields = ['ContentMessage',
                            'DataTimeMessage',
                            'idGroupChatFK',
                            'idUserTEFromFK',
                            'idUserTEToFK'];
}
