<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public $timestamps = false;

    protected $primaryKey = 'code';

    protected $fillable = [
        'name', 'brand', 'code','description', 'price',
        'image_one', 'image_two', 'image_three'  
    ];
}
