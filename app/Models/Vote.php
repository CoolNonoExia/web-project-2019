<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function suggestion_box()
    {
        return $this->belongsTo('suggestion_box', 'id_suggestion_box', 'id');
    }
}
