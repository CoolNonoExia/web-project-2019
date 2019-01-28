<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo('Product', 'id_products', 'id');
    }
}
