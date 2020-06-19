<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Stock;
use App\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(REQUEST $request)
    {   
        $productCode = $request->input('code');

        $productStock = Stock::where('product_code', $productCode)
        ->where(function($query) {
            $query->orWhere('s_stock', '>', 0)
                  ->orWhere('m_stock', '>', 0)
                  ->orWhere('l_stock', '>', 0)
                  ->orWhere('xl_stock', '>', 0);
        })
        ->get();

        if(count($productStock) == 0)
        {
            return view('purchaseView')->withMessage('There is no more stock of the product you wish to purchase, sorry!');
        }

        $productInfo = Product::where('code', $productCode)
        ->select('name', 'price', 'image')
        ->get();

        return view('purchaseView')->with('productStock', $productStock)->with('productInfo', $productInfo);
    }

    public function purchaseProduct(REQUEST $request)
    {
        return view('welcome');
        // logic to purchase a product here
    }
}
