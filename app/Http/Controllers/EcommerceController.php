<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    public function index(){
        return view('frontEnd.home.home', [
            'latest_products'   =>  Product::where('status', 1)->orderBy('id', 'desc')->take(10)->get(),
            'categories'        =>  Category::where('status', 1)->get(),
            'brands'            =>  Brand::all(),
            'home_categories'   =>  Category::where('home_status', 1)->get(),
        ]);
    }
    public function shop()
    {
        return view('frontEnd.shop.shop');
    }
    public function productDetails(){
        return view('frontEnd.shop.product-details');
    }
    public function cart(){
        return view('frontEnd.cart.add-cart');
    }
    public function checkout(){
        return view('frontEnd.checkout.checkout');
    }
}
