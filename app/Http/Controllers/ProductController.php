<?php

namespace App\Http\Controllers;

use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Country;
use App\Models\Manufacturer;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $productImages = ProductImages::all();
        return view('pages.products', compact(['products', 'productImages']));
    }

    public function getProductDetail($id)
    {
        $prod = Product::where("product_id",$id)->first();
        $productImage = ProductImages::where("product_id",$id)->first();
        return view("pages.product_details", compact(['prod', 'productImage']));
    }
}
