<?php

namespace App\Models\Acl;

use Lib\Database\Record;

class Group extends Record
{
    protected $table = 'groups';
    protected $fields = ['id', 'group_name', 'created_at'];

    private $permissions = [];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function addPermission(Permission $permission)
    {
        if (!in_array($permission->id, $this->permissions)){
            $this->permissions[] = $permission->id;
        }
    }

    public function getPermissions()
    {
        $aggregates = array();
        $group_permission = new GroupPermission();
        $permissions = $group_permission->getPermissionOnGroup($this->id);

        if ($permissions) {
            foreach ($permissions as $value) {
                $aggregates[] = new Permission($value->id);
            }
        }
        return $aggregates;
    }
}