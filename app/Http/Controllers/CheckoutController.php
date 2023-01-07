<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index() {
        return view('frontEnd.checkout.checkout', [
            'cart_products' =>  Cart::getContent(),
        ]);
    }
}
