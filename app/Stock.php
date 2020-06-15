<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'products_stock';

    protected $primary_key = 'product_code';

    protected $fillable = [
        'product_code', 's_stock', 'm_stock','l_stock', 'xl_stock'
    ];
}
