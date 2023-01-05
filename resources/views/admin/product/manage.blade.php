@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')
    <div class="container-fluid px-4">

            <div class="card my-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    All Product Information
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL NO</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->category_name }}</td>
                                    <td><img src="{{ asset($product->image) }}" height="50px" width="50px"/></td>
                                    <td>{{ $product->selling_price }} Taka</td>
                                    <td>{{ $product->status == 1 ? "Active" : "Inactive" }}</td>
                                    <td>
                                        <a href="{{ route('product.details', ['id' => $product->id]) }}" class="btn btn-info btn-sm">Details</a>
                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection


