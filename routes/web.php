<?php

use Illuminate\Support\Facades\Route;

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
// Frontend
Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('/products', ['as' => 'shop', 'uses' => 'ProductController@index']);

Route::get('productdetail/{product_id}', ['as'=>'prodDetail', 'uses' => 'ProductController@getProductDetail']);

// Backend
Route::get('/admin/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@index']);
Route::get('admin/products/list-products', ['as' => 'list-products', 'uses' => 'AdminProductController@listProducts']);

Route::get('admin/products/add-product', ['as' => 'add-product-page', 'uses' => 'AdminProductController@addProductPage']);
Route::post('', ['as' => 'add-product', 'uses' => 'AdminProductController@addProduct']);

Route::get('admin/products/edit-product/{product_id}', ['as' => 'edit-product-page', 'uses' => 'AdminProductController@editProductPage']);
Route::post('admin/products/edit-product/{product_id}', ['as' => 'edit-product', 'uses' => 'AdminProductController@editProduct']);

Route::get('admin/products/list-products/{product_id}', ['as' => 'del-product', 'uses' => 'AdminProductController@delProduct']);
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
