<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index() {
        return view('frontEnd.home.home');
    }

    public function shop() {
        return view('frontEnd.shop.shop');
    }

    public function productDetails() {
        return view('frontEnd.shop.product-details');
    }

    public function cart() {
        return view('frontEnd.shop.cart');
    }

    public function checkout() {
        return view('frontEnd.shop.checkout');
    }
}
