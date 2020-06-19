<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    
    public function searchByInput(REQUEST $request)
    {
        $validInput = $request->validate([
            'search_text' => [ 'required', 'string', 'max:255']
        ]);

        $searchedProducts = Product::where('name', 'ilike', '%'.$validInput['search_text'].'%')
        ->orwhere('description', 'ilike', '%'.$validInput['search_text'].'%')
        ->select('name', 'code', 'description', 'price', 'image')
        ->get();

        return view('displayProducts')->with('searchedProducts', $searchedProducts);
    }
}
