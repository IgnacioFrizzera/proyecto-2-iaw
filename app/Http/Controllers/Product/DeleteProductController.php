<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

/**
 * Controller that will handle the delete a product process 
 */
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

    /**
     * Makes an image from the product image field
     */
    private function makeImages($searchedData)
    {
        $target_dir = "uploads/temp/products/";
        if (!file_exists($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        
        foreach($searchedData AS $value):
            $target_name = $value->code;
            $path = $target_dir.$target_name;
    
            $imageBLOB = $value->image;

            $file = fopen($path, "w");
            fwrite($file, base64_decode($imageBLOB));
        endforeach; 
    }

    /**
     * Searchs product by code
     * In case no product was found returns with message
     * Other case returns the product with it's info
     */
    public function searchProductByCode(REQUEST $request)
    {
        $validCode = $request->validate([
            'code' => [ 'bail', 'required', 'string', 'max:10']
        ]);

        $searchedData = Product::where('code', $validCode)
        ->join('product_stock', 'products.code', '=', 'product_stock.product_code')
        ->get();

        $this->makeImages($searchedData);

        if(count($searchedData) > 0)
        {
            return $this->index()->with('searchedData', $searchedData);   
        }
        else
        {
            return $this->index()->withMessage('No product was found');
        }
    }

    /**
     * Deletes a product from storage
     * Stock is automatically deleted due to foreign keys, etc.
     */
    public function deleteProduct(REQUEST $request)
    {   
        $validCode = $request->input('code');

        Product::where('code', $validCode)->delete();

        return view('admin')->withMessage('Product with code: '.$validCode.' was removed successfully!');
    }   
}
