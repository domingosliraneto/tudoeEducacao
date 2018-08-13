<?php

namespace App\Models\Acl;

use Lib\Database\Filter;
use Lib\Database\Record;
use Lib\Database\Where;

class UserGroup extends Record
{
    protected $table = 'user_groups';
    protected $fields = ['id', 'user_id', 'group_id'];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function getGroupOnUser($user)
    {
        $where = new Where;
        $where->addFilter(new Filter('user_id', '=', $user));
        return $this->all($where);
    }

    public function getGroupOnGroup($group)
    {
        $where = new Where;
        $where->addFilter(new Filter('group_id', '=', $group));
        return $this->all($where);
    }
}