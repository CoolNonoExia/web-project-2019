<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    public $timestamps = false;

    public function event()
    {
        return $this->belongsTo('Event', 'id_events', 'id');
    }
}
