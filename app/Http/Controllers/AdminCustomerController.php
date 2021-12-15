<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function listCustomers()
    {
        $customers = Customer::orderBy('customer_id')->paginate(10);
        return view('admin.customer.list_customers', compact(['customers']));
    }

    public function addCustomerPage()
    {
        return view('admin.customer.add_customer');
    }

    public function addCustomer(Request $request)
    {
        $messages = [
            'name.required' => 'Bạn phải nhập tên khách hàng !',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $messages)->validate();

        $customer_add = Customer::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $customers = Customer::paginate(10);
        return view('admin.customer.list_customers', compact(['customers']));
    }

    public function editCustomerPage($id)
    {
        $customer = Customer::where('customer_id', $id)->first();
        return view('admin.customer.edit_customer', compact(['customer']));
    }

    public function editCustomer($id, Request $request)
    {
        $messages = [
            'name.required' => 'Bạn phải nhập tên khách hàng !',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ], $messages)->validate();

        $customer_edit = Customer::where('customer_id', $id)->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        $customer = Customer::where('customer_id', $id)->first();
        return view('admin.customer.edit_customer', compact(['customer']));
    }
}
