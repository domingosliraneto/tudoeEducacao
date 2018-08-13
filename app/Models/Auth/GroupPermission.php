<?php

namespace App\Models\Acl;

use Lib\Database\Record;
use Lib\Database\Where;
use Lib\Database\Filter;

class GroupPermission extends Record
{
    protected $table = 'group_permissions';
    protected $fields = ['id', 'group_id', 'permission_id'];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function getPermissionOnGroup($group)
    {
        $where = new Where;
        $where->addFilter(new Filter('group_id', '=', $group));
        return $this->all($where);
    }
}