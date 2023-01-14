@extends('admin.master')
@section('title')
    Order Details
@endsection
@section('content')
    <div class="container-fluid px-4">

        <div class="card my-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Order Details Page
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>Order No</th>
                        <td>{{ $order->id }}</td>
                    </tr>
                    <tr>
                        <th>Order Date</th>
                        <td>{{ $order->order_date }}</td>
                    </tr>
                    <tr>
                        <th>Order Total</th>
                        <td>{{ $order->order_total }}</td>
                    </tr>
                    <tr>
                        <th>Tax Total</th>
                        <td>{{ $order->tax_total }}TK.</td>
                    </tr>
                    <tr>
                        <th>Shipping Total</th>
                        <td>{{ $order->shipping_total }}TK.</td>
                    </tr>
                    <tr>
                        <th>Customer Info</th>
                        <td>{{ $order->customer->name . ' (' . $order->customer->mobile . ')' }}</td>
                    </tr>
                    <tr>
                        <th>Delivery Address</th>
                        <td>{{ $order->delivery_address }}</td>
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        <td>{{ $order->payment_status }}</td>
                    </tr>
                    <tr>
                        <th>Delivery Status</th>
                        <td>{{ $order->delivery_status }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="card my-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Order Product Information
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $orderDetail->product_name }}</td>
                            <td>{{ $orderDetail->product_price }} Tk</td>
                            <td>{{ $orderDetail->product_quantity }}</td>
                            <td>{{ $orderDetail->product_price * $orderDetail->product_quantity }} Tk</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


