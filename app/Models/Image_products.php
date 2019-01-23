<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_products extends Model
{
    public function products()
    {
        return $this->hasMany('product', 'id_images_products', 'id');
    }
}
