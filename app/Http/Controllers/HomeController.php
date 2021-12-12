<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productpopular = Product::all()->take(6);
        $productImages = ProductImages::all();
        return view('pages.home', compact(['productpopular', 'productImages']));
    }
}
