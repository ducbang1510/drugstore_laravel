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
// Home
Route::get('/', 'HomeController@index');
Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);
// Products
Route::get('/products', ['as' => 'shop', 'uses' => 'ProductController@index']);
Route::get('/products/{sType}', ['as' => 'sort-products', 'uses' => 'ProductController@sortProduct']);
Route::get('/products/{category}', ['as' => 'search-by-cate', 'uses' => 'ProductController@searchByCate']);
Route::post('/products/search', ['as' => 'search-by-key', 'uses' => 'ProductController@searchByKeyword']);
Route::post('/products/search-by-price', ['as' => 'search-by-price', 'uses' => 'ProductController@searchByPrice']);
// Product-Details
Route::get('product-details/{product_id}', ['as'=>'prodDetail', 'uses' => 'ProductController@getProductDetail']);
// Cart (show, add, update, remove-item)
Route::get('/show-cart', ['as' => 'showCart', 'uses' => 'CartController@showCart']);
Route::post('/cart/add-cart', ['as' => 'cart', 'uses' => 'CartController@addCart']);
Route::get('/cart/remove-item/{itemId},', ['as' => 'remove-item', 'uses' => 'CartController@removeItem']);
Route::post('/cart/update-cart', ['as' => 'update-cart', 'uses' => 'CartController@updateCart']);
Route::get('/cart/destroy-cart', ['as' => 'destroy-cart', 'uses' => 'CartController@destroyCart']);
// Checkout
Route::get('/checkout', ['as' => 'checkout', 'uses' => 'CheckoutController@index']);
// About
Route::get('/about', ['as' => 'about', 'uses' => 'AboutController@index']);
// Contact
Route::get('/contact', ['as' => 'contact', 'uses' => 'ContactController@index']);

// Backend
// Dashboard
Route::get('/admin/dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@index']);
// Product
Route::get('admin/products/list-products', ['as' => 'list-products', 'uses' => 'AdminProductController@listProducts']);
Route::get('admin/products/add-product', ['as' => 'add-product-page', 'uses' => 'AdminProductController@addProductPage']);
Route::post('add-product', ['as' => 'add-product', 'uses' => 'AdminProductController@addProduct']);
Route::get('admin/products/edit-product/{product_id}', ['as' => 'edit-product-page', 'uses' => 'AdminProductController@editProductPage']);
Route::post('admin/products/edit-product/{product_id}', ['as' => 'edit-product', 'uses' => 'AdminProductController@editProduct']);
Route::get('admin/products/list-products/{product_id}', ['as' => 'del-product', 'uses' => 'AdminProductController@delProduct']);
// Category
Route::get('admin/categories/list-categories', ['as' => 'list-categories', 'uses' => 'AdminCategoryController@listCategories']);
Route::get('admin/categories/add-category', ['as' => 'add-category-page', 'uses' => 'AdminCategoryController@addCategoryPage']);
Route::post('add-category', ['as' => 'add-category', 'uses' => 'AdminCategoryController@addCategory']);
Route::get('admin/categories/edit-category/{category_id}', ['as' => 'edit-category-page', 'uses' => 'AdminCategoryController@editCategoryPage']);
Route::post('admin/categories/edit-category/{category_id}', ['as' => 'edit-category', 'uses' => 'AdminCategoryController@editCategory']);
// Manufacturer
Route::get('admin/manufacturers/list-manufacturers', ['as' => 'list-manufacturers', 'uses' => 'AdminManufacturerController@listManufacturers']);
Route::get('admin/manufacturers/add-manufacturer', ['as' => 'add-manufacturer-page', 'uses' => 'AdminManufacturerController@addManufacturerPage']);
Route::post('add-manufacturer', ['as' => 'add-manufacturer', 'uses' => 'AdminManufacturerController@addManufacturer']);
Route::get('admin/manufacturers/edit-manufacturer/{manufacturer_id}', ['as' => 'edit-manufacturer-page', 'uses' => 'AdminManufacturerController@editManufacturerPage']);
Route::post('admin/manufacturers/edit-manufacturer/{manufacturer_id}', ['as' => 'edit-manufacturer', 'uses' => 'AdminManufacturerController@editManufacturer']);
// Country
Route::get('admin/countries/list-countries', ['as' => 'list-countries', 'uses' => 'AdminCountryController@listCountries']);
Route::get('admin/countries/add-country', ['as' => 'add-country-page', 'uses' => 'AdminCountryController@addCountryPage']);
Route::post('add-country', ['as' => 'add-country', 'uses' => 'AdminCountryController@addCountry']);
Route::get('admin/countries/edit-country/{country_id}', ['as' => 'edit-country-page', 'uses' => 'AdminCountryController@editCountryPage']);
Route::post('admin/countries/edit-country/{country_id}', ['as' => 'edit-country', 'uses' => 'AdminCountryController@editCountry']);
// Employee
Route::get('admin/employees/list-employees', ['as' => 'list-employees', 'uses' => 'AdminEmployeeController@listEmployees']);
Route::get('admin/employees/add-employee', ['as' => 'add-employee-page', 'uses' => 'AdminEmployeeController@addEmployeePage']);
Route::post('add-employee', ['as' => 'add-employee', 'uses' => 'AdminEmployeeController@addEmployee']);
Route::get('admin/employees/edit-employee/{employee_id}', ['as' => 'edit-employee-page', 'uses' => 'AdminEmployeeController@editEmployeePage']);
Route::post('admin/employees/edit-employee/{employee_id}', ['as' => 'edit-employee', 'uses' => 'AdminEmployeeController@editEmployee']);
// Customer
Route::get('admin/customers/list-customers', ['as' => 'list-customers', 'uses' => 'AdminCustomerController@listCustomers']);
Route::get('admin/customers/add-customer', ['as' => 'add-customer-page', 'uses' => 'AdminCustomerController@addCustomerPage']);
Route::post('add-customer', ['as' => 'add-customer', 'uses' => 'AdminCustomerController@addCustomer']);
Route::get('admin/customers/edit-customer/{customer_id}', ['as' => 'edit-customer-page', 'uses' => 'AdminCustomerController@editCustomerPage']);
Route::post('admin/customers/edit-customer/{customer_id}', ['as' => 'edit-customer', 'uses' => 'AdminCustomerController@editCustomer']);
// User
Route::get('admin/users/list-users', ['as' => 'list-users', 'uses' => 'AdminUserController@listUsers']);
Route::get('admin/users/edit-user/{user_id}', ['as' => 'edit-user-page', 'uses' => 'AdminUserController@editUserPage']);
Route::post('admin/users/edit-user/{user_id}', ['as' => 'edit-user', 'uses' => 'AdminUserController@editUser']);
// Order
//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');
