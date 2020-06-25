<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

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

    public function deleteProduct(REQUEST $request)
    {   
        $validCode = $request->input('code');

        Product::where('code', $validCode)->delete();

        return view('admin')->withMessage('Product with code: '.$validCode.' was removed successfully!');
    }   
}
