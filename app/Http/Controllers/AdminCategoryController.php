<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listCategories()
    {
        $categories = Category::orderBy('category_id')->paginate(10);
        return view('admin.category.list_categories', compact(['categories']));
    }

    public function addCategoryPage()
    {
        return view('admin.category.add_category');
    }

    public function addCategory(Request $request)
    {
        $messages = [
            'category_name.required' => 'Bạn phải nhập tên danh mục !',
        ];

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ], $messages)->validate();

        $category_add = Category::create([
            'category_name' => $request->category_name,
        ]);

        $categories = Category::paginate(10);
        return view('admin.category.list_categories', compact(['categories']));
    }

    public function editCategoryPage($id)
    {
        $category = Category::where('category_id', $id)->first();
        return view('admin.category.edit_category', compact(['category']));
    }

    public function editCategory($id, Request $request)
    {
        $messages = [
            'category_name.required' => 'Bạn phải nhập tên danh mục !',
        ];

        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ], $messages)->validate();

        $category_edit = Category::where('category_id', $id)->update([
            'category_name' => $request->category_name,
        ]);

        $category = Category::where('category_id', $id)->first();
        return view('admin.category.edit_category', compact(['category']));
    }
}
