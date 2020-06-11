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

    public function addProduct($request)
    {
        // Validates the input data according to DB tables
        $validData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'code' => [ 'bail', 'required', 'string', 'primary:products', 'max:10'],
            'description' => ['nullable', 'string', 'max:100'],
            'price' => ['required','unsigned', 'float'],
            'image_one' => ['nullable', 'mediumText'],
            'image_two' => ['nullable', 'mediumText'],
            'image_three' => ['nullable', 'mediumText'],
            'stock' => ['required', 'integer', 'unsigned'],
            'size' => ['required', 'string', 'max:4']
        ]);
        
        // If all the given data is valid, creates the entries in DB

        Product::create([
            'name' => $validData['name'],
            'code' => $validData['code'],
            'description' => $validData['description'],
            'price' => $validData['price'],
            'image_one' => $validData['image_one'],
            'image_two' => $validData['image_two'],
            'image_three' => $validData['image_three']
        ]);

        Stock::create([
            'product_code' => $validData['code'],
            'stock' => $validData['stock'],
            'size' => $validData['size']
        ]);
    }
}
