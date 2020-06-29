<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;

/**
 * Controller that will handle the process of returning
 * all the stock in storage
 */
class ShowStockController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin'); 
    }

    public function index()
    {
        return view('showStock');
    }

    /**
     * Gets all the stock
     * Returns name, code and stock of every size of each product
     */
    public function searchAllStock()
    {   
        
        $searchedData = Product::join('product_stock', 'products.code','=','product_stock.product_code')
        ->select('products.name', 'products.code', 'product_stock.s_stock', 
                'product_stock.m_stock', 'product_stock.l_stock', 'product_stock.xl_stock')
        ->get();

        return $this->index()->with('searchedData', $searchedData);
    }
}
