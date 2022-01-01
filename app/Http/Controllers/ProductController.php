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
        $products = Product::orderBy('product_id')->paginate(12);
        $productImages = ProductImages::all();
        return view('pages.products', compact(['products', 'productImages']));
    }

    public function getProductDetail($id)
    {
        $prod = Product::where("product_id",$id)->first();
        $productImage = ProductImages::where("product_id",$id)->first();
        return view("pages.product_details", compact(['prod', 'productImage']));
    }

    public function sortProduct($sType)
    {
        $products = Product::orderBy('product_id')->paginate(12);
        switch ($sType) {
            case 'name a-z':
                $products = Product::orderBy('product_name', 'asc')->paginate(12);
                break;
            case 'name z-a':
                $products = Product::orderBy('product_name', 'desc')->paginate(12);
                break;
            case 'price desc':
                $products = Product::orderBy('price', 'desc')->paginate(12);
                break;
            case 'price asc':
                $products = Product::orderBy('price', 'asc')->paginate(12);
                break;
            default:
        }
        $productImages = ProductImages::all();
        return view('pages.products', compact(['products', 'productImages']));
    }

    public function searchByCate($category)
    {
        $products = Product::where('category_id', $category)->paginate(12);
        $productImages = ProductImages::all();
        return view('pages.products', compact(['products', 'productImages']));
    }

    public function searchByKeyword(Request $request)
    {
        $keyword = $request->input('search-key');
        $products = Product::where('product_name', 'like', '%'.$keyword.'%')->paginate(12);
        $productImages = ProductImages::all();
        return view('pages.products', compact(['products', 'productImages']));
    }

    public function searchByPrice(Request $request)
    {
        $minPrice = $request->amount1;
        $maxPrice = $request->amount2;
        $products = Product::where('price', '>', $minPrice)->where('price', '<', $maxPrice)->paginate(12);
        $productImages = ProductImages::all();
        return view('pages.products', compact(['products', 'productImages']));
    }
}
