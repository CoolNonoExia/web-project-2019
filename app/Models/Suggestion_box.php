<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion_box extends Model
{
    public function votes()
    {
        return $this->hasMany('vote', 'id_suggestion_box', 'id');
    }

    public function image_events()
    {
        return $this->belongsTo('image_events', 'id_images_events', 'id');
    }
}
