@extends('admin.master')
@section('title')
    Add Product
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card m-3">
                    <div class="card-header">
                        Add Product Form
                    </div>
                    <div class="card-body">

                        <p class="text-center text-success py-2">{{session('message')}}</p>

                        <form action="{{ route('product.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3">Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" required name="category_id">
                                        <option value="" disabled selected> -- Select Product Category -- </option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{ $category->id == $product->category_id ? 'selected' : '' }}> {{$category->category_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Sub Category Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" required name="sub_category_id">
                                        <option value="" disabled selected> -- Select Product Sub Category -- </option>
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}" {{ $sub_category->id == $product->sub_category_id ? 'selected' : '' }}> {{$sub_category->sub_category_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Brand Name</label>
                                <div class="col-md-9">
                                    <select class="form-control" required name="brand_id">
                                        <option value="" disabled selected> -- Select Product Brand -- </option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}> {{$brand->name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Name</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Product Name" value="{{ $product->name }}" class="form-control" name="name"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Code</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Product Code" value="{{ $product->code }}" class="form-control" name="code"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Short Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" placeholder="Short Description" name="short_description">{{ $product->short_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Long Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control summernote" placeholder="Long description" name="long_description">{{ $product->long_description }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Price</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="number" placeholder="Product Regular Price" value="{{ $product->regular_price }}" class="form-control" name="regular_price"/>
                                        <input type="number" placeholder="Product Selling Price" value="{{ $product->selling_price }}" class="form-control" name="selling_price"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"> Stock Amount</label>
                                <div class="col-md-9">
                                    <input type="number" placeholder="Product Stock Amount" value="{{ $product->stock_amount }}" class="form-control" name="stock_amount"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Image</label>
                                <div class="col-md-9">
                                    <img src="{{ asset($product->image) }}" class="w-25 img-fluid m-2"/>
                                    <input type="file" class="form-control" name="image"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Other Images</label>
                                <div class="col-md-9">
                                    @foreach($product->otherImages as $otherImage)
                                        <img src="{{ asset($otherImage->image) }}" class="w-25 img-fluid m-2"/>
                                    @endforeach
                                    <input type="file" class="form-control" name="other_image[]" multiple/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success px-5" value="Create New Product"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

