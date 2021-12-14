<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Manufacturer;

class AdminManufacturerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listManufacturers()
    {
        $manufacturers = Manufacturer::orderBy('manufacturer_id')->paginate(10);
        return view('admin.list_manufacturers', compact(['manufacturers']));
    }

    public function addManufacturerPage()
    {
        return view('admin.add_manufacturer');
    }

    public function addManufacturer(Request $request)
    {
        $messages = [
            'company_name.required' => 'Bạn phải nhập tên nhà sản xuất !',
        ];

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
        ], $messages)->validate();

        $manufacturer_add = Manufacturer::create([
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $manufacturers = Manufacturer::paginate(10);
        return view('admin.list_manufacturers', compact(['manufacturers']));
    }

    public function editManufacturerPage($id)
    {
        $manufacturer = Manufacturer::where('manufacturer_id', $id)->first();
        return view('admin.edit_manufacturer', compact(['manufacturer']));
    }

    public function editManufacturer($id, Request $request)
    {
        $messages = [
            'company_name.required' => 'Bạn phải nhập tên nhà sản xuất !',
        ];

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
        ], $messages)->validate();

        $manufacturer_edit = Manufacturer::where('manufacturer_id', $id)->update([
            'company_name' => $request->company_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $manufacturer = Manufacturer::where('manufacturer_id', $id)->first();
        return view('admin.edit_manufacturer', compact(['manufacturer']));
    }
}
