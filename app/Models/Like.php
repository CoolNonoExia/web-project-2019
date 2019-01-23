<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function event()
    {
        return $this->belongsTo('event', 'id_events', 'id');
    }
}
