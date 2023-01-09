<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function customerLogout(Request $request) {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
}
