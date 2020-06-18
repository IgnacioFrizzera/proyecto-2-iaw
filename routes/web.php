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

Auth::routes(); 

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/userDashboard', 'UserController@index')->name('user');

Route::get('/searchProduct', 'Product\SearchController@searchByInput');

Route::get('/purchaseProduct', 'Product\PurchaseController@index');

Route::group(['middleware' => 'admin'], function () {
    
    Route::get('/adminDashboard', 'AdminController@index')->name('admin');

    Route::get('/admin/addProducts', 'Product\AddProductController@index')->name('product');

    Route::post('/adminDashboard-after-uploaded-product', 'Product\AddProductController@addProduct');

    Route::get('/admin/showStock', 'Product\ShowStockController@searchAllStock');

    Route::get('/admin/modifyProduct', 'Product\ModifyProductController@index');

    Route::get('/admin/modifyProduct-search', 'Product\ModifyProductController@searchProductByCode');

    Route::post('/adminDashboard-after-modified-product', 'Product\ModifyProductController@modifyProduct');

    Route::get('/admin/deleteProduct', 'Product\DeleteProductController@index');

    Route::get('/admin/deleteProduct-search', 'Product\DeleteProductController@searchProductByCode');

    Route::post('/adminDashboard-after-deleted-product', 'Product\DeleteProductController@deleteProduct');
});