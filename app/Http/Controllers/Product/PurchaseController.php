<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Stock;
use App\Product;
use App\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 * Controller that will handle a purchase process
 */
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

    /**
     * Makes an image from the product image field
    */
    private function makeImage($productInfo, $productCode)
    {
        $target_dir = "uploads/temp/products/";
        if (!file_exists($target_dir)){
            mkdir($target_dir, 0777, true);
        }
        foreach ($productInfo as $value) :
            $path = $target_dir . $productCode;

            $imageBLOB = $value->image;

            $file = fopen($path, "w");
            fwrite($file, base64_decode($imageBLOB));
        endforeach;
    }

    /**
     * Returns name, description, price and image field from a product with the
     * same code as $productCode
     */
    private function getProductFromCode($productCode)
    {
        return Product::where('code', $productCode)
        ->select('name', 'description', 'price', 'image')
        ->get();
    }

    /**
     * Gets a product if it has stock available.
     * If there's no stock available message is shown
     * Other case, the product is returned
     */
    public function getProduct(REQUEST $request)
    {
        $productCode = $request->input('code');

        // Checks if there's stock of any size of the product
        $productStock = Stock::where('product_code', $productCode)
            ->where(function ($query) {
                $query->orWhere('s_stock', '>', 0)
                    ->orWhere('m_stock', '>', 0)
                    ->orWhere('l_stock', '>', 0)
                    ->orWhere('xl_stock', '>', 0);
            })
            ->get();

        // If there is no stock returns message
        if (count($productStock) == 0) {
            return $this->index()->withMessage('There is no more stock of the product you wish to purchase, sorry!');
        }

        // If there is stock, gets the product info
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
                if($productStock->s_stock == 0) {
                    return $message;
                }
                else {
                    $productStock->decrement('s_stock');
                }
                break;
            case "m":
                if($productStock->m_stock == 0) {
                    return $message;
                }
                else {
                    $productStock->decrement('m_stock');
                }
                break;
            case "l":
                if($productStock->l_stock == 0) {
                    return $message;
                }
                else {
                    $productStock->decrement('l_stock');
                }
                break;
            case "xl":
                if($productStock->xl_stock == 0) {
                    return $message;
                }
                else {
                    $productStock->decrement('xl_stock');
                }
                break;
        }
    }

    /**
     * Proceeds to purchase a product, decrementing it's stock
     * according to the purchased size
     */
    public function purchaseProduct(REQUEST $request)
    {
        $productCode = $request->input('code');
        $productSize = $request->input('size');

        $productStock = Stock::where('product_code', $productCode);

        // Do ->first() to get the only model obtained from the query
        $message = $this->decrementStock($productSize, $productStock->first());

        // If message is empty it means there was stock available so the purchase was made
        if(empty($message))
        {
            $message = 'Thank you for your purchase!';
            
            // Log the purchase to the currently logged user
            $user = Auth::user();
            Purchase::create([
                'email' => $user->email,    
                'product_code' => $productCode,
                'product_size' => strtoupper($productSize)
            ]);
        }

        return view('welcome')->withMessage($message);
    }
}
