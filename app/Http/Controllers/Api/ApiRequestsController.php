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
        $productInfo = Product::where('code', $code)
        ->join('product_stock', 'products.code', '=', 'product_stock.product_code')
        ->select('products.name', 'products.price', 'product_stock.s_stock',
                 'product_stock.m_stock', 'product_stock.l_stock', 'product_stock.xl_stock')
        ->get();

        if(count($productInfo) == 0)
        {
            return response(['message' => 'No products where found with that code']);
        }
        else
        {
            $productInfo->toJson(JSON_PRETTY_PRINT);
            return response($productInfo, 200);
        }
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
        $totalStock = Stock::get();

        if(count($totalStock) == 0)
        {
            return response(['message' => 'Store has no stock yet']);
        }
        else
        {
            $totalStock->toJson(JSON_PRETTY_PRINT);
            return response($totalStock, 200);
        }
    }
}
