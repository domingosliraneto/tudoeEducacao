<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEScore extends Record
{
    protected $table = 'UserTEScore';
    protected $fields = ['idUserTEScore',
                            'Gold',
                            'Silver',
                            'Bronze',
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
