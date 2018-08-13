<?php

namespace App\Models;

use Lib\Database\Record;


class UserTEAskedQuizQuestion extends Record
{
    protected $table = 'UserTEAskedQuizQuestion';
    protected $fields = ['idUserTEAskedQuizQuestion', 'Hit',  'Favoritequestion', 'idUserTEAskedQuizFK', 'idQuizQuestionFK', 'idAlternativeFK'];

    // private $owner;

    // public function get_owner()
    // {
    //     if (empty($this->owner)) {
    //         $this->owner = new User($this->user_id);
    //     }

    //     return $this->owner->usename;
    // }
}