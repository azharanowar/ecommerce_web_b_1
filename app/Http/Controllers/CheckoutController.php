<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;

class CheckoutController extends Controller
{
    private $customer, $order, $orderDetails;
    public function index() {
        return view('frontEnd.checkout.checkout', [
            'cart_products' =>  Cart::getContent(),
        ]);
    }

    public function newOrder(Request $request) {

        if (Session::get('customer_id')) {
            $this->customer = Customer::find(Session::get('customer_id'));
        } else {
            $this->validate($request, [
                'name'              =>  'required',
                'email'             =>  'required|unique:customers,email',
                'mobile'            =>  'required|unique:customers,mobile',
                'password'          =>  'required',
                'delivery_address'  =>  'required',
            ]);

            $this->customer = new Customer();
            $this->customer->name = $request->name;
            $this->customer->email = $request->email;
            $this->customer->password = bcrypt($request->password);
            $this->customer->mobile = $request->mobile;
            $this->customer->save();

            Session::put('customer_id', $this->customer->id);
            Session::put('customer_name', $this->customer->name);
        }

        $this->order = new Order();
        $this->order->customer_id = $this->customer->id;
        $this->order->order_total = Session::get('order_total');
        $this->order->tax_total = Session::get('tax_total');;
        $this->order->shipping_total = Session::get('shipping_total');;
        $this->order->order_date = date('Y-m-d');
        $this->order->order_timestamp = strtotime(date('Y-m-d'));
        $this->order->delivery_address = $request->delivery_address;
        $this->order->payment_type = $request->payment_method;
        $this->order->save();

        foreach (Cart::getContent() as $item) {
            $this->orderDetails = new OrderDetail();
            $this->orderDetails->order_id = $this->order->id;
            $this->orderDetails->product_id = $item->id;
            $this->orderDetails->product_name = $item->name;
            $this->orderDetails->product_price = $item->price;
            $this->orderDetails->product_quantity = $item->quantity;
            $this->orderDetails->save();

            Cart::remove($item->id);
        }

        Session::forget('order_total');
        Session::forget('tax_total');
        Session::forget('tax_total');




        return redirect('/order/complete');
    }

    public function completeOrder() {
        return view('frontEnd.checkout.complete-order');
    }
}
