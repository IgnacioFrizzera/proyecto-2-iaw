<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Auth::routes(); 

Route::get('/search-product', 'Product\SearchController@searchByInput');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', 'HomeController@index');
    
    Route::get('/purchase-product', 'Product\PurchaseController@getProduct');

    Route::post('/finish-purchase', 'Product\PurchaseController@purchaseProduct');

    Route::get('/show-purchase-history', 'Product\ShowPurchaseController@showPurchases');
});

Route::group(['middleware' => 'user'], function() {

    Route::get('/user-dashboard', 'UserController@index');
});

Route::group(['middleware' => 'auth', 'admin'], function () {
    
    Route::get('/admin-dashboard', 'AdminController@index');

    Route::get('/admin/add-products', 'Product\AddProductController@index');

    Route::post('/admin-dashboard-after-uploaded-product', 'Product\AddProductController@addProduct');

    Route::get('/admin/show-stock', 'Product\ShowStockController@searchAllStock');

    Route::get('/admin/modify-product', 'Product\ModifyProductController@index');

    Route::get('/admin/modify-product-search', 'Product\ModifyProductController@searchProductByCode');

    Route::post('/admin-dashboard-after-modified-product', 'Product\ModifyProductController@modifyProduct');

    Route::get('/admin/delete-product', 'Product\DeleteProductController@index');

    Route::get('/admin/delete-product-search', 'Product\DeleteProductController@searchProductByCode');

    Route::post('/admin-dashboard-after-deleted-product', 'Product\DeleteProductController@deleteProduct');

    Route::get('/admin/show-total-sales-history', 'Product\ShowTotalSalesController@showTotalSalesHistory');
});