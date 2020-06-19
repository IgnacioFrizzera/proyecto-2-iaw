<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Stock;
use App\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function makeImage($productInfo, $productCode)
    {
        $target_dir = "uploads/temp/products/";
        foreach ($productInfo as $value) :
            $path = $target_dir . $productCode;

            $imageBLOB = $value->image;

            $file = fopen($path, "w");
            fwrite($file, base64_decode($imageBLOB));
        endforeach;
    }

    public function index(REQUEST $request)
    {
        $productCode = $request->input('code');

        $productStock = Stock::where('product_code', $productCode)
            ->where(function ($query) {
                $query->orWhere('s_stock', '>', 0)
                    ->orWhere('m_stock', '>', 0)
                    ->orWhere('l_stock', '>', 0)
                    ->orWhere('xl_stock', '>', 0);
            })
            ->get();

        if (count($productStock) == 0) {
            return view('purchaseView')->withMessage('There is no more stock of the product you wish to purchase, sorry!');
        }

        $productInfo = Product::where('code', $productCode)
            ->select('name', 'description', 'price', 'image')
            ->get();

        $this->makeImage($productInfo, $productCode);

        return view('purchaseView')->with('productStock', $productStock)->with('productInfo', $productInfo)
            ->with('productCode', $productCode);
    }

    public function purchaseProduct(REQUEST $request)
    {
        $productCode = $request->input('code');
        $productSize = $request->input('size');

        $productStock = Stock::where('product_code', $productCode);

        switch ($productSize) {
            case "s":
                $productStock->decrement('s_stock');
                break;
            case "m":
                $productStock->decrement('m_stock');
                break;
            case "l":
                $productStock->decrement('l_stock');
                break;
            case "xl":
                $productStock->decrement('xl_stock');
                break;
        }
        return view('welcome');
    }
}
