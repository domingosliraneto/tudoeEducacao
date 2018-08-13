<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEInfo extends Record
{
    protected $table = 'UserTEInfo';
    protected $fields = ['idUserTEInfo',
                            'UserTEName',
                            'Institution',
                            'Birthday',
                            'Phone',
                            'Address',
                            'Email',
                            'SubscribtionDate',
                            'UserTEimage',
                            'idUserTEFK'];

    private $userTE;
    
    public function get_userTE()
    {
        if(empty($this->userTE)){
            $this->userTE = new UserTE($this->idUserTEFK);
        }
        
        return $this->userTE->Login;
    }
}
