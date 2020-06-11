<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Product;
use App\Stock;
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

    private function validateData(REQUEST $request)
    {
        $validData = $request->validate([
            'ProductName' => ['required', 'string', 'max:255'],
            'ProductCode' => [ 'bail', 'required', 'string', 'primary:products', 'max:10'],
            'ProductDescription' => ['nullable', 'string', 'max:100'],
            'ProductPrice' => ['required','unsigned', 'float'],
            'ProductFirstImage' => ['nullable', 'mediumText'],
            'ProductSecondImage' => ['nullable', 'mediumText'],
            'ProductThirdImage' => ['nullable', 'mediumText'],
        ]);

        return $validData;
    }

    public function addProduct(REQUEST $request)
    {
        // Verifies if the input data is valid regardless db schema
        $validData = $request->validate([
            'ProductName' => ['required', 'string', 'max:255'],
            'ProductBrand' => ['required', 'string', 'max:255'],
            'ProductCode' => [ 'bail', 'required', 'string', 'max:10'],
            'ProductDescription' => ['nullable', 'string', 'max:100'],
            'ProductPrice' => ['required', 'numeric:min:2:max:10'],
            'ProductFirstImage' => ['binary', 'nullable'],
            'ProductSecondImage' => ['binary', 'nullable'],
            'ProductThirdImage' => ['binary', 'nullable'],
        ]);

        /**
         * 
         *  'image_one' => $validData['ProductFirstImage'],
            'image_two' => $validData['ProductSecondImage'],
            'image_three' => $validData['ProductThirdImage']

            'image_one' => null,
            'image_two' => null,
            'image_three' => null
         * 
         */
 
        // Once all data is verified, creates the product in the database
        Product::create([
            'name' => $validData['ProductName'],
            'brand' => $validData['ProductBrand'],
            'code' => $validData['ProductCode'],
            'description' => $validData['ProductDescription'],
            'price' => $validData['ProductPrice'],
        ]);

    }
}
