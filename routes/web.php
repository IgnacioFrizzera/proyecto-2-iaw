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

Route::get('/adminDashboard', 'AdminController@index')->name('admin');

Route::get('/admin/addProducts', 'Product\AddProductController@index')->name('product');

Route::post('/adminDashboard', 'Product\AddProductController@addProduct');

Route::get('/admin/showStock', 'Product\ShowStockController@searchAllStock');

Route::get('admin/modifyProduct', 'Product\ModifyProductController@index');

Route::post('admin/modifyProduct', 'Product\ModifyProductController@searchProductByCode');

Route::get('admin/deleteProduct', 'Product\DeleteProductController@index');

Route::post('admin/deleteProduct', 'Product\DeleteProductController@searchProductByCode');

Route::post('/adminDashboard', 'Product\DeleteProductController@deleteProduct');