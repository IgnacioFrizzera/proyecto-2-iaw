<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    protected $fillable = [
        'name', 'code', 'description','price',
        'image_one', 'image_two', 'image_three'  
    ];
}
