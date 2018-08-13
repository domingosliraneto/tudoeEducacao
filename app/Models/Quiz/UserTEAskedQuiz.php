<?php

namespace App\Models;

use Lib\Database\Record;


class UserTEAskedQuiz extends Record
{
    protected $table = 'UserTEAskedQuiz';
    protected $fields = ['idUserTEAskedQuiz', 'askedQuiz', 'idUserTEFK', 'idUserTEQuizCreatedFK'];

    // private $owner;

    // public function get_owner()
    // {
    //     if (empty($this->owner)) {
    //         $this->owner = new User($this->user_id);
    //     }

    //     return $this->owner->usename;
    // }
}