<?php


namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Purchase;


class ShowPurchaseController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('showPurchaseView');
    }

    public function showPurchases()
    {
        $currentUserEmail = Auth::user()->email;
        $userPurchaseHistory = Purchase::where('email', $currentUserEmail)
        ->get();

        if(count($userPurchaseHistory) == 0)
        {
            return $this->index()->withMessage('No purchases have been made, what are you waiting for?');    
        }

        return $this->index()->with('userPurchaseHistory', $userPurchaseHistory);
    }
}
