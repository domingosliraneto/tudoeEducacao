<?php

namespace App\Models;

use Lib\Database\Record;

class UserTEFavorite extends Record
{
    protected $table = 'UserTEFavorite';
    protected $fields = ['idUserTEFavorite', 'idUserTEFK', 'idUserTEFavoritedFK'];
}
