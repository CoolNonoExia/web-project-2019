<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class image_products extends Model
{
    public function products()
    {
        return $this->hasMany('product', 'id_images_products', 'id');
    }
}
