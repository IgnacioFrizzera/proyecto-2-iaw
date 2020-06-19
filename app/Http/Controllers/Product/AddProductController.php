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

    public function addProduct(REQUEST $request)
    {
        // Verifies if the input data is valid regardless db schema
        $validData = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'brand' => ['required', 'string', 'max:100'],
            'code' => [ 'bail', 'unique:products', 'required', 'string', 'max:15'],
            'description' => ['required', 'string', 'max:100'],
            'price' => ['required', 'numeric:min:2:max:10'],
            'image' => ['image', 'required','mimes:jpeg,jpg,png', 'max:10240'],
            's_stock' => ['numeric'],
            'm_stock' => ['numeric'],
            'l_stock' => ['numeric'],
            'xl_stock' => ['numeric'],
        ]);
            
        $imageDataBLOB = base64_encode(file_get_contents($_FILES['image']['tmp_name']) );
        $validData['image'] = $imageDataBLOB;

        // Once all data is verified, creates the product in the database
        Product::create([
            'name' => $validData['name'],
            'brand' => $validData['brand'],
            'code' => $validData['code'],
            'description' => $validData['description'],
            'price' => $validData['price'],
            'image' => $validData['image']
        ]);

        // Once the product is created, make the stock for it
        Stock::create([
            'product_code' => $validData['code'],
            's_stock' => $validData['s_stock'],
            'm_stock' => $validData['m_stock'],
            'l_stock' => $validData['l_stock'],
            'xl_stock' => $validData['xl_stock']
        ]);

        return view('admin')->withMessage('Product was uploaded successfully!');
    }

}
