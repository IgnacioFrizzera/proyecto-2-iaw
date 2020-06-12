<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class AddProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('addProduct');
    }

    public function addProduct(REQUEST $request)
    {
        // Verifies if the input data is valid regardless db schema
        $validData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'brand' => ['required', 'string', 'max:255'],
            'code' => [ 'bail', 'unique:products', 'required', 'string', 'max:10'],
            'description' => ['nullable', 'string', 'max:100'],
            'price' => ['required', 'numeric:min:2:max:10'],
            'image_one' => ['image', 'nullable', 'mimes:jpeg,jpg,png,gif'],
            'image_two' => ['image', 'nullable', 'mimes:jpeg,jpg,png,gif'],
            'image_three' => ['image', 'nullable', 'mimes:jpeg,jpg,png,gif'],
        ]);

        //'image_two' => $validData['image_two'],
        //'image_three' => $validData['image_three']
 
        // Once all data is verified, creates the product in the database
        Product::create([
            'name' => $validData['name'],
            'brand' => $validData['brand'],
            'code' => $validData['code'],
            'description' => $validData['description'],
            'price' => $validData['price'],
            'image_one' => $validData['image_one']
        ]); 

        $nextData['product_code'] = $validData['code'];
        $nextData['product_image'] = $validData['image_one'];

        return view('addStockToUploadedProduct')->with('data', $nextData);
    }
}
