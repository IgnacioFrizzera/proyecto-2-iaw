<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $table = 'purchases';

    protected $fillable = [
        'email', 'product_code', 'product_size'
    ];

}
