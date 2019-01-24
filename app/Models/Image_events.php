<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_events extends Model
{
    protected $table = 'images_events';

    public function suggestion_box()
    {
        return $this->hasMany('Suggestion_box', 'id_images_events', 'id');
    }

    public function events()
    {
        return $this->hasMany('EventModel', 'id_images_events', 'id');
    }
}
