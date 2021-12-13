<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listProducts()
    {
        $products = Product::paginate(10);
        $productImages = ProductImages::all();
        return view('admin.list_products', compact(['products', 'productImages']));
    }

    public function editProduct($id)
    {
        $product = Product::where("product_id",$id)->first();
        $categories = Category::all();
        return view('admin.edit_product', compact(['product', 'categories']));
    }

    public function addProductPage()
    {
        $categories = Category::all();
        $countries = Country::all();
        $manufacturers = Manufacturer::all();
        return view('admin.add_product', compact(['categories', 'countries', 'manufacturers']));
    }

    public function addProduct(Request $request)
    {
        $messages = [
            'product_name.required' => 'Bạn phải nhập tên sản phẩm !',
            'price.required' => 'Bạn phải nhập giá sản phẩm',
        ];

        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'price' => 'required',
        ], $messages)->validate();

        $filename = "";
        if ($request->file('fileUpload')->isValid()) {
            $filename = $request->fileUpload->getClientOriginalName();
            $request->fileUpload->move('images/', $filename);
        }
        $product_add = Product::create([
            'product_name' => $request->product_name,
            'unit' => $request->unit,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'created_date' => date_create(),
            'product_Ingredient' => $request->product_ingredient,
            'dosage_forms' => $request->dosage_forms,
            'is_prescription_drugs' => 0,
            'warning' => $request->warning,
            'effect' => $request->effect,
            'dosage' => $request->dosage,
            'manufacturer_id' => $request->manufacturers,
            'category_id' => $request->categories,
            'country_id' => $request->countries,
            'description' => '',
        ]);
        $productId = $product_add->id;

        $image_add = ProductImages::create([
            'path' => $filename,
            'product_id' => $productId,
        ]);

        $products = Product::paginate(10);
        $productImages = ProductImages::all();
        return view('admin.list_products', compact(['products', 'productImages']));
    }

    public function delProduct($id)
    {
        $record = Product::where('product_id', $id)->first();
        if(file_exists(public_path('images/'.$record->Img)))
        {
            unlink(public_path('images/'.$record->Img));
        }
        Product::where('product_id', $id)->delete();

        $products = Product::paginate(10);
        $productImages = ProductImages::all();
        return view('admin.list_products', compact(['products', 'productImages']));
    }
}
