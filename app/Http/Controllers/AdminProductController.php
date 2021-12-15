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
        return view('admin.product.list_products', compact(['products', 'productImages']));
    }

    public function addProductPage()
    {
        $categories = Category::all();
        $countries = Country::all();
        $manufacturers = Manufacturer::all();
        return view('admin.product.add_product', compact(['categories', 'countries', 'manufacturers']));
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
            'product_Ingredient' => trim($request->product_ingredient),
            'dosage_forms' => $request->dosage_forms,
            'is_prescription_drugs' => 0,
            'warning' => trim($request->warning),
            'effect' => trim($request->effect),
            'dosage' => trim($request->dosage),
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
        return view('admin.product.list_products', compact(['products', 'productImages']));
    }

    public function editProductPage($id)
    {
        $categories = Category::all();
        $countries = Country::all();
        $manufacturers = Manufacturer::all();
        $product = Product::where("product_id",$id)->first();
        $productImage = ProductImages::where("product_id",$id)->first();
        return view('admin.product.edit_product', compact(['categories', 'countries', 'manufacturers', 'productImage', 'product']));
    }

    public function editProduct($id, Request $request)
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
        if($request->hasFile('fileUpload'))
        {
            if ($request->file('fileUpload')->isValid()) {
                $filename = $request->fileUpload->getClientOriginalName();
                $request->fileUpload->move('images/', $filename);
            }
        }
        $product_edit = Product::where('product_id', $id)->update([
            'product_name' => $request->product_name,
            'unit' => $request->unit,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'created_date' => date_create(),
            'product_Ingredient' => trim($request->product_ingredient),
            'dosage_forms' => $request->dosage_forms,
            'is_prescription_drugs' => 0,
            'warning' => trim($request->warning),
            'effect' => trim($request->effect),
            'dosage' => trim($request->dosage),
            'manufacturer_id' => $request->manufacturers,
            'category_id' => $request->categories,
            'country_id' => $request->countries,
            'description' => '',
        ]);

        if($filename != "")
        {
            $productId = $id;
            $image_edit = ProductImages::where('product_id', $id)->update([
                'path' => $filename,
            ]);
        }

        $categories = Category::all();
        $countries = Country::all();
        $manufacturers = Manufacturer::all();
        $product = Product::where("product_id",$id)->first();
        $productImage = ProductImages::where("product_id",$id)->first();
        return view('admin.product.edit_product', compact(['categories', 'countries', 'manufacturers', 'productImage', 'product']));
    }

    public function delProduct($id)
    {
        $productImageDel = ProductImages::where("product_id",$id);
        foreach ($productImageDel as $p)
        {
            if(file_exists(public_path('images/'.$p->path)))
            {
                unlink(public_path('images/'.$p->path));
            }
        }
        $productDel = Product::where('product_id', $id);
        $productImageDel->delete();
        $productDel->delete();

        $products = Product::paginate(10);
        $productImages = ProductImages::all();
        return view('admin.product.list_products', compact(['products', 'productImages']));
    }
}
