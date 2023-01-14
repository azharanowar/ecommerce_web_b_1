@extends('admin.master')
@section('title')
    Manage Orders
@endsection
@section('content')
    <div class="container-fluid px-4">

        <div class="card my-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                All Orders Information
            </div>
            <div class="card-body">
                <table id="datatablesSimple" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>SL No</th>
                        <th>Order No</th>
                        <th>Customer Info</th>
                        <th>Order Total</th>
                        <th>Order Date</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->customer->name . ' (' . $order->customer->mobile . ')' }}</td>
                            <td>{{ $order->order_total }} Tk</td>
                            <td>{{ $order->order_date }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>
                                <a href="{{ route('admin.order-details', ['id' => $order->id]) }}" class="btn btn-success btn-sm">Details</a>
                                <a href="{{ route('admin.order-invoice', ['id' => $order->id]) }}" class="btn btn-secondary btn-sm">Invoice</a>
                                <a href="{{ route('admin.order-delete', ['id' => $order->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this product?')">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


