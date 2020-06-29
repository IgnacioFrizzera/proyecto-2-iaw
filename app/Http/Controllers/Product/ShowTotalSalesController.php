<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Purchase;

/**
 * Controller that will handle the process of returning
 * all the purchases ever made
 */
class ShowTotalSalesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('showTotalSalesView');
    }

    /**
     * Returns all the purchases ever made 
     * If there are none, shows message
     */
    public function showTotalSalesHistory()
    {
        $storeTotalSalesHistory = Purchase::join('products', 'products.code', '=', 'purchases.product_code')
        ->select('purchases.id', 'purchases.email', 'purchases.product_code','products.name','products.price',
                 'purchases.product_size', 'purchases.created_at')
        ->get();


        if(count($storeTotalSalesHistory) == 0){
            return $this->index()->withMessage('The store has not sold anything yet');
        }

        return $this->index()->with('storeTotalSalesHistory', $storeTotalSalesHistory);
    }
}
