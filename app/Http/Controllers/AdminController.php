<?php

namespace App\Http\Controllers;

use App\Models\Order;
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
        $orders = Order::all();
        return view('admin.report.report', compact(['orders']));
    }
}
