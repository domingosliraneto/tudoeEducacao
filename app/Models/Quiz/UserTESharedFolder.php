<?php

namespace App\Models;

use Lib\Database\Record;


class UserTESharedFolder extends Record
{
    protected $table = 'UserTESharedFolder';
    protected $fields = ['idUserTESharedFolder', 'FolderPermission', 'idUserTEFK', 'idQuestionFolderFK'];
}