<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEGroupChat extends Record
{
    protected $table = 'UserTEGroupChat';
    protected $fields = ['idUserTEGroupChat',
                            'UserTEEnabled',
                            'EntryDate',
                            'ExitDate',
                            'idGroupChat',
                            'idUserTEFK'];

    private $userTE;
    private $groupChat;
    
    public function get_userTE()
    {
        if(empty($this->userTE)){
            $this->userTE = new UserTE($this->idUserTEFK);
        }
        
        return $this->userTE->Login;
    }
    
    public function get_groupChat() {
        if(empty($this->groupChat)){
            $this->groupChat = new GroupChat($this->idGroupChat);
        }
        
        return $this->groupChat->GroupName;
    }
}
