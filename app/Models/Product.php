<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function category()
    {
        return $this->belongsTo('category', 'id_categories', 'id');
    }

    public function image_products()
    {
        return $this->belongsTo('image_products', 'id_images_products', 'id');
    }

    public function orders()
    {
        return $this->hasMany('order', 'id_products', 'id');
    }
}
