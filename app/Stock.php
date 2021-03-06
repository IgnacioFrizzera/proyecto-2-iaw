<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'product_stock'; 

    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = 'product_code';

    protected $fillable = [
        'product_code', 's_stock', 'm_stock','l_stock', 'xl_stock'
    ];

    public function product()
    {
        return $this->hasOne('App\Product');
    }
}
