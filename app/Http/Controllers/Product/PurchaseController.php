<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Stock;
use App\Product;
use App\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('purchaseView');
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

    private function getProductFromCode($productCode)
    {
        return Product::where('code', $productCode)
        ->select('name', 'description', 'price', 'image')
        ->get();
    }

    public function getProduct(REQUEST $request)
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
            return $this->index()->withMessage('There is no more stock of the product you wish to purchase, sorry!');
        }

        $productInfo = $this->getProductFromCode($productCode);

        $this->makeImage($productInfo, $productCode);

        return $this->index()->with('productStock', $productStock)->with('productInfo', $productInfo)
            ->with('productCode', $productCode);
    }

    /**
     * Decrements product stock if it's available
     */
    private function decrementStock($productSize, $productStock)
    {
        $message = 'Sorry! We just ran out of stock on that size!';
        switch ($productSize) {
            case "s":
                if($productStock->s_stock == 0)
                {
                    return $message;
                }
                else
                {
                    $productStock->decrement('s_stock');
                }
                break;
            case "m":
                if($productStock->m_stock == 0)
                {
                    return $message;
                }
                else
                {
                    $productStock->decrement('m_stock');
                }
                break;
            case "l":
                if($productStock->l_stock == 0)
                {
                    return $message;
                }
                else
                {
                    $productStock->decrement('l_stock');
                }
                break;
            case "xl":
                if($productStock->xl_stock == 0)
                {
                    return $message;
                }
                else
                {
                    $productStock->decrement('xl_stock');
                }
                break;
        }
    }

    public function purchaseProduct(REQUEST $request)
    {
        $productCode = $request->input('code');
        $productSize = $request->input('size');

        $productStock = Stock::where('product_code', $productCode);


        // Do ->first() to get the only model obtained from the query
        $message = $this->decrementStock($productSize, $productStock->first());

        $productInfo = $this->getProductFromCode($productCode);
        foreach ($productInfo as $value) :
            $productName = $value->name;
            $productPrice = $value->price;
        endforeach;

        // Log the purchase to the currently logged user
        $user = Auth::user();
        Purchase::create([
            'email' => $user->email,    
            'product_name' => $productName,
            'product_price' => $productPrice,
            'product_size' => strtoupper($productSize)
        ]);

        // If message is empty it means there was stock available so the purchase was made
        if(empty($message))
        {
            $message = 'Thank you for your purchase!';
        }

        return view('welcome')->withMessage($message);
    }
}
