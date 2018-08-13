<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEAcessInfo extends Record
{
    protected $table = 'UserTEAcessInfo';
    protected $fields = ['idUserTEAcessInfo',
                            'Device',
                            'IP',
                            'Provider',
                            'MAC',
                            'Browser',
                            'Region',
                            'DateTimeAccess',
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
