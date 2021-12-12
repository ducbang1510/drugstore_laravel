<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Country;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('pages.products', compact('products'));
    }

    public function getProductDetail($id)
    {
        $prod = Product::where("product_id",$id)->first();
        return view("pages.product_details", compact('prod'));
    }

    public function list_products()
    {
        $products = Product::all();
        return view('admin.list_products', compact('products'));
    }

    public function add_product()
    {
        return view('admin.add_product');
    }
}
