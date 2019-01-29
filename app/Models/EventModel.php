<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventModel extends Model
{
    protected $table = 'events';
    public $timestamps = false;

    public static function find($id)
    {
    }

    public function image_events()
    {
        return $this->belongsTo('Image_events', 'id_images_events', 'id');
    }

    public function likes()
    {
        return $this->hasMany('Like', 'id_events', 'id');
    }

    public function comments()
    {
        return $this->hasMany('Comment', 'id_events', 'id');
    }

    public function registrations()
    {
        return $this->hasMany('Registration', 'id_events', 'id');
    }
}

