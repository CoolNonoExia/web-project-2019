<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public $timestamps = false;

    public function suggestion_box()
    {
        return $this->belongsTo('Suggestion_box', 'id_suggestion_box', 'id');
    }
}
