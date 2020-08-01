<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

/**
 * Controller that will return all the unique brands in storage
 */
class ShowBrandsController extends Controller
{
    public function index()
    {
        return view('brands');
    }

    /**
     * Returns all the brands in the shop's stock
     * If there are no brands returns message
     */
    public function displayBrands()
    {
        $shopBrands = Product::select('brand')->distinct()->get();

        if(count($shopBrands) == 0)
        {
            return $this->index()->withMessage('Our shop does not have any brands yet');
        }
        return $this->index()->with('shopBrands', $shopBrands);
    }
}
