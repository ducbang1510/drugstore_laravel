<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified']);
    }

    public function index()
    {
        return view('dashboard');
    }

    public function reportPage()
    {
        return view('admin.report.report');
    }

    public function totalRevenue($year, $month, $day=null)
    {
        $tong = 0;
        $dt = Carbon::now();
        $dt->setYear($year);
        $dt->setMonth($month);
        if($day !== null) {
            $dt->setDay($day);
            $orders = Order::whereDate('order_date', $dt)->get();
        }
        else {
            $orders = Order::whereYear('order_date', $dt->year)->whereMonth('order_date', $dt->month)->get();
        }

        foreach ($orders as $i) {
            $tong += $i->total_price;
        }

        return $tong;
    }

    public function reportRevenue(Request $request)
    {
        $data_revenue = array();
        $month = $request->input('month');
        $year = $request->input('year');
        $dt = Carbon::now();
        if($year !== null)
        {
            $dt->setYear($year);
            if($month !== null)
            {
                $dt->setMonth($month);
                for($i = 1; $i <= $dt->daysInMonth; $i++) {
                    $data_revenue[] = $this->totalRevenue($year, $month, $i);
                }
            }
            else
            {
                for($i = 1; $i < 13; $i++) {
                    $data_revenue[] = $this->totalRevenue($year, $i);
                }
                return view('admin.report.report', compact(['data_revenue', 'year']));
            }
        }
        return view('admin.report.report', compact(['data_revenue', 'month', 'year']));
    }

    public function listOrders()
    {
        $orders = Order::orderBy('order_id')->paginate(10);
        return view('admin.order.list_orders', compact(['orders']));
    }

    public function searchOrderById(Request $request)
    {
        $order = Order::where("order_id", $request->orderId)->first();
        return view('admin.order.list_orders', compact(['order']));
    }

    public function orderDetails($orderId)
    {
        $arr_products = array();
        $order = Order::where("order_id", $orderId)->first();
        $orderDetails = OrderDetails::where("order_id", $orderId)->get();
        foreach ($orderDetails as $item)
        {
            $arr_products[] = Product::where("product_id", $item->product_id)->first();
        }
        return view('admin.order_details.order_details', compact(['orderDetails', 'arr_products', 'order']));
    }
}
