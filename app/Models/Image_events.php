<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_events extends Model
{
    public function suggestion_box()
    {
        return $this->hasMany('suggestion_box', 'id_images_events', 'id');
    }

    public function events()
    {
        return $this->hasMany('event', 'id_images_events', 'id');
    }
}
