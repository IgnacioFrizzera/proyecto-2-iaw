<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
 
    private function makeImages($searchedProducts)
    {
        $target_dir = "uploads/temp/products/";
        foreach($searchedProducts AS $value):
            $target_name = $value->code;
            $path = $target_dir.$target_name;
    
            $imageBLOB = $value->image;

            $file = fopen($path, "w");
            fwrite($file, base64_decode($imageBLOB));
        endforeach; 
    }


    public function searchByInput(REQUEST $request)
    {
        $validInput = $request->validate([
            'search_text' => [ 'required', 'string', 'max:255']
        ]);

        $searchedProducts = Product::where('name', 'ilike', '%'.$validInput['search_text'].'%')
        ->orWhere('description', 'ilike', '%'.$validInput['search_text'].'%')
        ->select('name', 'code', 'description', 'price', 'image')
        ->paginate(8);

        $this->makeImages($searchedProducts);

        if(count($searchedProducts) == 0)
        {
            return view('welcome')->withMessage('No product matched your search');
        }

        return view('displayProducts')->with('searchedProducts', $searchedProducts);
    }
}
