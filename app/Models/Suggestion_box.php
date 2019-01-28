<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suggestion_box extends Model
{
    public $table = "suggestion_box";
    public function votes()
    {
        return $this->hasMany('Vote', 'id_suggestion_box', 'id');
    }

    public function image_events()
    {
        return $this->belongsTo('Image_events', 'id_images_events', 'id');
    }
}
