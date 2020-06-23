<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Purchase;

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

    public function showTotalSalesHistory()
    {
        $storeTotalSalesHistory = Purchase::get();

        if(count($storeTotalSalesHistory) == 0){
            return $this->index()->withMessage('The store has not sold anything yet');
        }

        return $this->index()->with('storeTotalSalesHistory', $storeTotalSalesHistory);
    }
}
