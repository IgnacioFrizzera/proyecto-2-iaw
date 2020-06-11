<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'products_stock';

    protected $primary_key = ['product_code', 'size'];

    protected $fillable = [
        'product_code', 'stock', 'size'
    ];
}
