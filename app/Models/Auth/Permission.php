<?php

namespace App\Models\Acl;

use Lib\Database\Record;

class Permission extends Record
{

    protected $table = 'permissions';
    protected $fields = ['id', 'permission', 'description', 'created_at'];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }


}