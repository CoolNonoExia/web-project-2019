<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    public function products()
    {
        return $this->hasMany('product', 'id_categories', 'id');
    }
}
