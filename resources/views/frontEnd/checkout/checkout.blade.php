@extends('frontEnd.master')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Shopping Cart</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center mb-3" style="margin: 3rem 0;">Checkout Form</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('order.new') }}" method="POST">

                                @csrf

                                <div class="form-group row">
                                    <label class="col-md-4">Full Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="name" placeholder="Your full name..." required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Email Address</label>
                                    <div class="col-md-8">
                                        <input type="email" class="form-control" name="email" placeholder="Your email address..." autocomplete="email" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" name="password" placeholder="Your password..." autocomplete="password" required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Mobile Number</label>
                                    <div class="col-md-8">
                                        <input type="number" class="form-control" name="mobile" placeholder="Your mobile number..." required/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Delivery Address</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control" rows="5" name="delivery_address"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4">Payment Methods</label>
                                    <div class="col-md-8">
                                        <label><input type="radio" class="form-check-input" name="payment_method" value="1" checked/> Cast on Delivery</label>
                                        <label><input type="radio" class="form-check-input" name="payment_method" value="2"/> bKash</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="" value="Place Order"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center mb-3" style="margin: 3rem 0;">My Cart Summery</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Product Info</th>
                                    <th>Unit Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                                </thead>
                                <tbody>

                                @php($sum = 0)

                                @foreach($cart_products as $cart_product)
                                    <tr>
                                        <td>{{ $cart_product->name }}</td>
                                        <td>{{ $cart_product->price }}</td>
                                        <td>{{ $cart_product->quantity }}</td>
                                        <td>{{ $cart_product->price * $cart_product->quantity }} Tk</td>
                                    </tr>

                                    @php($sum += $cart_product->price * $cart_product->quantity)

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <h2 class="text-center">Cart Totals</h2>
                        <table class="table table-bordered" cellspacing="0">
                            <tbody>
                            <tr class="cart-subtotal">
                                <th>Tax Amount (20%)</th>
                                <td>
                                        <span class="amount">
                                            {{ $taxCost = $sum * 20 / 100 }} Tk
                                        </span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping Amount (10%)</th>
                                <td>
                                    {{ $shippingCost = $sum * 10 / 100 }} Tk
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Order Total</th>
                                <td><strong><span class="amount">{{ $orderTotal = $sum + $taxCost + $shippingCost }} Tk</span></strong> </td>
                            </tr>
                            </tbody>

                            <?php
                                Session::put('order_total', $orderTotal);
                                Session::put('tax_total', $taxCost);
                                Session::put('shipping_total', $shippingCost);
                            ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
