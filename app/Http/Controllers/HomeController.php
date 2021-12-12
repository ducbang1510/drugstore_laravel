<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productpopular = Product::all()->take(6);
        return view('pages.home', compact('productpopular'));
    }
}
