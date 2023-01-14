<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
    public function dashboard() {
        return view('frontEnd.customer.dashboard');
    }

    public function allOrders() {
        return view('frontEnd.customer.all-orders', [
            'orders'    =>  Order::where('customer_id', Session::get('customer_id'))->get(),
//            'orders'    =>  Order::all(),
        ]);
    }
}
