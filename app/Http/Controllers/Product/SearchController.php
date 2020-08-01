<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

/**
 * Controller that will handle most of the searchs made
 * Such as by input or by brand
 */
class SearchController extends Controller
{
 
    public function index()
    {
        return view('displayProducts');
    }

    /**
     * Makes an image from the product image field
    */
    private function makeImages($searchedProducts)
    {
        $target_dir = "uploads/temp/products/";
        if (!file_exists($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        foreach($searchedProducts AS $value):
            $target_name = $value->code;
            $path = $target_dir.$target_name;
    
            $imageBLOB = $value->image;

            $file = fopen($path, "w");
            fwrite($file, base64_decode($imageBLOB));
        endforeach; 
    }

    /**
     * Searchs all products in DB that are like the user input
     * Compares input with the product name and description
     */
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

        return $this->index()->with('searchedProducts', $searchedProducts);
    }

    /**
     * Searchs all products in DB that belong to the specified brand
     */
    public function searchByBrand(REQUEST $request)
    {
        $brand = $request->input('brand');

        $searchedProducts = Product::where('brand', '=', $brand)
        ->select('name', 'code', 'description', 'price', 'image')
        ->paginate(8);

        $this->makeImages($searchedProducts);
        
        return $this->index()->with('searchedProducts', $searchedProducts);
    }
}
