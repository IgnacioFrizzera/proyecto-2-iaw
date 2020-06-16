<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteProductController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('deleteProduct');
    }



}
