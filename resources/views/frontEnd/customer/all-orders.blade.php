@extends('frontEnd.master')
@section('title')
    All Orders
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto" style="margin: 3rem auto">
            <div class="container-fluid px-4">
                <div class="card my-4">
                    <div class="card-header">
                        <h2 class="text-center">All Orders</h2>
                    </div>
                    <div class="card-body">
                        @foreach($orders as $order)
                            <h4>Order No: #00{{ $order->id }}</h4>
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


