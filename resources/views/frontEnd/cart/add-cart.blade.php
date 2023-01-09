@extends('frontEnd.master')
@section('title')
    cart
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
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            @if(session('message'))
                                <h4 class="py-4 text-center text-success">{{ session('message') }}</h4>
                            @endif
                            <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @php($productCost = 0)

                                    @foreach($cart_products as $cart_product)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="{{ route('cart.remove', ['id' => $cart_product->id]) }}" onclick="return confirm('Are you sure do remove this product from cart?')">X</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="{{ route('product-details', ['id' => $cart_product->id]) }}">
                                                    <img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ asset($cart_product->attributes->image) }}">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="{{ route('product-details', ['id' => $cart_product->id]) }}">{{ $cart_product->name }}</a>
                                            </td>
                                            <td class="product-price">
                                                <span class="amount">{{ $cart_product->price }} Tk</span>
                                            </td>
                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <form action="{{ route('cart.update', ['id' => $cart_product->id]) }}" method="POST">

                                                        @csrf

                                                        <input type="number" name="quantity" size="4" class="input-text qty text" title="Qty" value="{{ $cart_product->quantity }}" min="0" step="1">
                                                        <button type="submit">Update</button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="amount">{{ $cart_product->price * $cart_product->quantity }} Tk</span>
                                            </td>
                                        </tr>

                                        @php($productCost += $cart_product->price * $cart_product->quantity)

                                    @endforeach
                                    </tbody>
                                </table>
                            <div class="cart-collaterals">
                                <div class="cross-sells">
                                    <h2>You may be interested in...</h2>
                                    <ul class="products">
                                        <li class="product">
                                            <a href="single-product.html">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{ asset('frontEndAsset') }}/img/product-2.jpg">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">£20.00</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>
                                        <li class="product">
                                            <a href="single-product.html">
                                                <img width="325" height="325" alt="T_4_front" class="attachment-shop_catalog wp-post-image" src="{{ asset('frontEndAsset') }}/img/product-4.jpg">
                                                <h3>Ship Your Idea</h3>
                                                <span class="price"><span class="amount">£20.00</span></span>
                                            </a>
                                            <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="22" rel="nofollow" href="single-product.html">Select options</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="cart_totals ">
                                    <h2>Cart Totals</h2>
                                    <table cellspacing="0">
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Tax Amount (20%)</th>
                                            <td>
                                                <span class="amount">
                                                    {{ $taxCost = $productCost * 20 / 100 }} Tk
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping Amount (10%)</th>
                                            <td>
                                                {{ $shippingCost = $productCost * 10 / 100 }} Tk
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">{{ $total = $productCost + $taxCost + $shippingCost }} Tk</span></strong> </td>
                                        </tr>
                                        <?php Session::put('order_total', $productCost);?>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('checkout') }}" class="btn btn-primary btn-lg">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
