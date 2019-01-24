<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('Category', 'id_categories', 'id');
    }

    public function image_products()
    {
        return $this->belongsTo('Image_products', 'id_images_products', 'id');
    }

    public function orders()
    {
        return $this->hasMany('Order', 'id_products', 'id');
    }
}
