<?php

namespace App\Http\Controllers\Product;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Stock;

class AddStockController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('addStockToUploadedProduct');
    }

    public function addStockToUploadedProduct(Request $request)
    {
        print_r("hola");
    }

}
