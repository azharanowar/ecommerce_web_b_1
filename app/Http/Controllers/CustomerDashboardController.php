<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard() {
        return view('frontEnd.customer.dashboard');
    }
}
