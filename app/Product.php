<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'products';

    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'code';

    protected $fillable = [
        'name', 'brand', 'code','description', 'price', 'image'
    ];

    public function stock()
    {
        return $this->hasOne('App\Stock');
    }
}
