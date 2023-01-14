<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    public function customerLogin() {
        return view('frontEnd.customer.auth');
    }
    public function customerLogout(Request $request) {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
