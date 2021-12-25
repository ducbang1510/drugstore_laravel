<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class CheckoutController extends Controller
{
    private $customer_save;

    public function index()
    {
        return view('pages.checkout');
    }

    public function saveCustomer(Request $request)
    {
        $messages = [
            'cName.required' => 'Vui lòng nhập họ tên !',
            'cGender.required' => 'Vui lòng nhập giới tính !',
            'cAddress.required' => 'Vui lòng nhập địa chỉ !',
            'cEmail.required' => 'Vui lòng nhập email !',
            'cPhone.required' => 'Vui lòng nhập số điện thoại !',
        ];

        try {
            $validator = Validator::make($request->all(), [
                'cName' => 'required',
                'cGender' => 'required',
                'cAddress' => 'required',
                'cEmail' => 'required',
                'cPhone' => 'required',
            ], $messages)->validate();
        } catch (ValidationException $e) {
        }

        $customer_save = Customer::create([
            'name' => $request->input('cName'),
            'gender' => $request->input('cGender'),
            'address' => $request->input('cAddress'),
            'email' => $request->input('cEmail'),
            'phone' => $request->input('cPhone'),
        ]);
        $id = $customer_save->id;
        $cus = Customer::where("customer_id", $id)->first();
        return view('pages.checkout_info', compact('cus'));
    }

    public function addOrder(Request $request)
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh');
        echo $date->toDateString();
        $order_add = Order::create([
            'customer_id' => $request->input('customer_id_hidden'),
            'order_date' => $date,
            'total_price' => (float)$request->input('total_price'),
        ]);

        $content = Cart::content();
        foreach ($content as $item) {
            $order_detail_add = OrderDetails::create([
                'order_id' => $order_add->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'unit_price' => (float)$item->price,
            ]);
        }
        if(isset($order_detail_add))
        {
            $isSuccess = "1";
            Cart::destroy();
        }
        else {
            $isSuccess = "0";
        }
        return view('pages.confirm', compact(['isSuccess']));
    }
}
