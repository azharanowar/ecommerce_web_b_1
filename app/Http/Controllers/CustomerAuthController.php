<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    private $customer;

    public function customerLogin() {
        return view('frontEnd.customer.auth');
    }
    public function customerLogout(Request $request) {
        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }

    public function customerLoginCheck(Request $request) {
        $this->customer = Customer::where('email', $request->email)->first();

        if ($this->customer) {
            if (password_verify($request->password, $this->customer->password)) {
                Session::put('customer_id', $this->customer->id);
                Session::put('customer_name', $this->customer->name);

                return redirect('/customer/dashboard');
            } else {
                return back()->with('message', 'Invalid password!!!');
            }
        } else {
            return back()->with('message', 'Invalid email address!!!');
        }
    }

    public function customerRegister(Request $request) {
        $this->validate($request, [
            'name'  =>  'required',
            'email'  =>  'required|unique:customers,email',
            'password'  =>  'required',
            'mobile'  =>  'required|unique:customers,mobile',
        ]);

        $this->customer = new Customer();
        $this->customer->name = $request->name;
        $this->customer->email = $request->email;
        $this->customer->password = bcrypt($request->password);
        $this->customer->mobile = $request->mobile;
        $this->customer->save();

        Session::put('customer_id', $this->customer->id);
        Session::put('customer_name', $this->customer->name);

        return redirect('/customer/dashboard');
    }
}
