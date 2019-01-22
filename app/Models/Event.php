<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    public function image_events()
    {
        return $this->belongsTo('image_events', 'id_images_events', 'id');
    }

    public function likes()
    {
        return $this->hasMany('like', 'id_events', 'id');
    }

    public function comments()
    {
        return $this->hasMany('comment', 'id_events', 'id');
    }

    public function registrations()
    {
        return $this->hasMany('registration', 'id_events', 'id');
    }
}
