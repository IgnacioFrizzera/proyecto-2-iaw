<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Stock;

class ApiRequestsController extends Controller
{
    
    /**
     * Returns a specific product name, price and stock
     * Response will looke like this:
     *  [   
     *      name: product_name
     *      price: product_price
     *      s_stock: product_s_stock
     *      m_stock: product_m_stock
     *      l_stock: product_l_stock
     *      xl_stock: product_xl_stock
     *  ]
     *  
     */
    public function getProductInfo($code)
    {
    }

    /**
     * Returns the whole stock of the store
     * Will be an array where each entry looks like this:
     *  [
     *      product_code: product_code
     *      s_stock: product_s_stock
     *      m_stock: product_m_stock
     *      l_stock: product_l_stock
     *      xl_stock: product_xl_stock
     *  ]
     */
    public function getStoreTotalStock()
    {
        $totalStock = Stock::get()->toJson(JSON_PRETTY_PRINT);
        return response($totalStock, 200);
    }
}
