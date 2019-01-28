<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image_products extends Model
{
    protected $table = 'images_products';
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany('Product', 'id_images_products', 'id');
    }
}
