<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vote extends Model
{
    public function suggestion_box()
    {
        return $this->belongsTo('suggestion_box', 'id_suggestion_box', 'id');
    }
}
