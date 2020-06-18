<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('purchaseView');
    }


    public function purchaseProduct(REQUEST $request)
    {
        // logic to purchase a product here
    }
}
