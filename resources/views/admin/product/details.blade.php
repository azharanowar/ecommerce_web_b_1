
@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')
    <section class="my-3 py-3">
        <div class="row mx-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center py-4">Product Details Page</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th class="col-md-2">Product Name</th>
                                <td>{{ $product->name }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-2">Product Category</th>
                                <td>{{ $product->category->category_name }}</td>
                            </tr>
                            <tr>
                                <th class="col-md-2">Sub Category</th>
                                <td>{{ $product->subCategory->sub_category_name }}</td>
                            </tr>
                            <tr>
                                <th>Brand Name</th>
                                <td>{{ $product->brand->name }}</td>
                            </tr>
                            <tr>
                                <th>Regular Price</th>
                                <td>{{ $product->regular_price }}</td>
                            </tr>
                            <tr>
                                <th>Selling Price</th>
                                <td>{{ $product->selling_price }}</td>
                            </tr>
                            <tr>
                                <th>Stock Amount</th>
                                <td>{{ $product->stock_amount }}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>{{ $product->code }}</td>
                            </tr>
                            <tr>
                                <th>Short Description</th>
                                <td>{{ $product->short_description }}</td>
                            </tr>
                            <tr>
                                <th>Long Description</th>
                                <td>{!! $product->long_description !!}</td>
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ asset($product->image) }}" class="img-fluid img-25 m-2"/>
                                </td>
                            </tr>
                            <tr>
                                <th>Other Images</th>
                                <td>
                                    @foreach($product->otherImages as $otherImage)
                                        <img src="{{ asset($otherImage->image) }}" class="img-fluid w-25 m-2"/>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Product Publication Status</th>
                                <td>{{ $product->status == 1 ? "Active" : "Inactive" }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


