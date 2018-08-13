<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEAlert extends Record
{
    protected $table = 'UserTEAlert';
    protected $fields = ['idUserTEAlert',
                            'AlertContent', 
                            'AlertDate', 
                            'AlertLink',
                            'AlertVisualized',
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