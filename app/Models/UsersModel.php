<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $connection='mysql2';
    public function campuses()
    {
        return $this->belongsTo('CampusesModel', 'id_campuses',  'id');
    }
}
