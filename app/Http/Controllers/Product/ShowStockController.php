<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;

class ShowStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Gets all the store stock
     * Returns name, code and stock of every size of each product
     */
    public function searchAllStock(Request $request)
    {   
        $searchedData = DB::table('products')
        ->join('product_stock', 'products.code','=','product_stock.product_code')
        ->get();

        return view('showStock')->with('searchedData', $searchedData);
    }


}
