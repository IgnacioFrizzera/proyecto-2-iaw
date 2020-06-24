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

Route::get('/search-product', 'Product\SearchController@searchByInput')->name('search-products');

Route::get('/search-by-brand', 'Product\SearchController@searchByBrand')->name('search-products-by-brand');

Route::get('/brands', 'Product\ShowBrandsController@displayBrands')->name('brands');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    
    Route::get('/purchase-product', 'Product\PurchaseController@getProduct')->name('purchase-product');

    Route::post('/finish-purchase', 'Product\PurchaseController@purchaseProduct')->name('finish-purchase');

    Route::get('/show-purchase-history', 'Product\ShowPurchaseController@showPurchases')->name('show-purchase-history');
});

Route::group(['middleware' => 'user'], function() {

    Route::get('/user-dashboard', 'UserController@index');
});

Route::group(['middleware' => 'auth', 'admin'], function () {
    
    Route::get('/admin-dashboard', 'AdminController@index');

    Route::get('/admin/add-products', 'Product\AddProductController@index')->name('add-product');

    Route::post('/admin-dashboard-after-uploaded-product', 'Product\AddProductController@addProduct')->name('after-add-product');

    Route::get('/admin/show-stock', 'Product\ShowStockController@searchAllStock')->name('show-stock');

    Route::get('/admin/modify-product', 'Product\ModifyProductController@index')->name('modify');

    Route::get('/admin/modify-product-search', 'Product\ModifyProductController@searchProductByCode')->name('modify-search');

    Route::post('/admin-dashboard-after-modified-product', 'Product\ModifyProductController@modifyProduct')->name('after-modify');

    Route::get('/admin/delete-product', 'Product\DeleteProductController@index')->name('delete');

    Route::get('/admin/delete-product-search', 'Product\DeleteProductController@searchProductByCode')->name('delete-search');

    Route::post('/admin-dashboard-after-deleted-product', 'Product\DeleteProductController@deleteProduct')->name('after-delete');

    Route::get('/admin/show-total-sales-history', 'Product\ShowTotalSalesController@showTotalSalesHistory')->name('show-sales');
});