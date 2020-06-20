<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Stock;

/**
 * Controller that will handle all of the admin search actions
 */
class ModifyProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin'); 
    }
    
    public function index()
    {
        return view('modifyProduct');
    }

    private function makeImages($searchedData)
    {
        $target_dir = "uploads/temp/products/";
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

    private function updateNewStock($validData, $validCode)
    {
        Stock::where('product_code', $validCode)
        ->update([
            's_stock' => $validData['new_s_stock'],
            'm_stock' => $validData['new_m_stock'],
            'l_stock' => $validData['new_l_stock'],
            'xl_stock' => $validData['new_xl_stock']
        ]);
    }

    private function updateNewInfo($validData, $imageValue, $validCode)
    {
        $this->updateNewStock($validData, $validCode);
        if($imageValue === null)
        {
            Product::where('code', $validCode)
            ->update([
                'name' => $validData['new_name'],
                'description' => $validData['new_description'],
                'price' => $validData['new_price']
            ]);
        }
        else
        {
            $imageDataBLOB = base64_encode(file_get_contents($_FILES['new_image']['tmp_name']) );
            $validData['new_image'] = $imageDataBLOB;

            Product::where('code', $validCode)
            ->update([
                'name' => $validData['new_name'],
                'description' => $validData['new_description'],
                'price' => $validData['new_price'],
                'image' => $validData['new_image']
            ]);
        }
    }

    public function modifyProduct(REQUEST $request)
    {   
        $validCode = $request->input('update_code');

        $validData = $request->validate([
            'new_name' => ['required', 'string', 'max:100'],
            'new_description' => ['required', 'string', 'max:100'],
            'new_price' => ['required', 'numeric:min:2:max:10'],
            'new_image' => ['image', 'nullable', 'mimes:jpeg,jpg,png', 'max:10240'],
            'new_s_stock' => ['required', 'numeric'],
            'new_m_stock' => ['required', 'numeric'],
            'new_l_stock' => ['required', 'numeric'],
            'new_xl_stock' => ['required', 'numeric'],
        ]);

        $imageValue = $request->input('new_image');
        
        $this->updateNewInfo($validData, $imageValue, $validCode);

        return view('admin')->withMessage('The product was successfully updated!');
    }
}
