<?php

namespace App\Models\Auth;

use Lib\Database\Record;

class User extends Record
{
    protected $table = 'users';
    protected $fields = ['id', 'username', 'email'];

    private $groups = [];

    public function __construct($id = null)
    {
        parent::__construct($id);
    }

    public function addGroup(Group $group)
    {
        if (!in_array($group->id, $this->groups)){
            $this->groups[] = $group->id;
        }
    }

    public function get_groups()
    {
        $aggregates = array();
        $user_group = new UserGroup;
        $groups = $user_group->getGroupOnUser($this->id);

        if ($groups) {
            foreach ($groups as $value) {
                $aggregates[] = new Group($value->id);
            }
        }
        return $aggregates;
    }

    public function saveAggregate()
    {
        if ($this->groups) {
            foreach ($this->groups as $value) {
                $userGroup = new UserGroup;
                $execute = $userGroup->create(['user_id' => $this->id, 'group_id' => $value]);
            }
        }

        return $execute;
    }
}