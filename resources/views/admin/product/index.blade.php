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
                    <h5 class="text-success py-3 text-center">{{session('message')}}</h5>
                    <div class="card-body">
                        <form action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-md-3">Category Name</label>
                                <div class="col-md-9">
                                    <select name="category_id" required class="form-control">
                                        <option value="" disabled selected >-- Select Product Category --</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Sub Category Name</label>
                                <div class="col-md-9">
                                    <select name="sub_category_id"  required class="form-control">
                                        <option value="" disabled selected >-- Select Product Sub Category --</option>
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}">{{$sub_category->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Brand Name</label>
                                <div class="col-md-9">
                                    <select name="brand_id" required class="form-control">
                                        <option value="" disabled selected >-- Select Product Brand --</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Name</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Product Name" class="form-control" name="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product code</label>
                                <div class="col-md-9">
                                    <input type="text" placeholder="Product code"  class="form-control" name="code">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Short Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control"  placeholder="Short Description" name="short_description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Long Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" placeholder="Full Description" rows="7"  name="long_description"></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Price</label>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <input type="number" placeholder="Regular Price"  class="form-control" name="regular_price"/>
                                        <input type="number"  placeholder="Selling Price" class="form-control" name="selling_price"/>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"> Stock Amount</label>
                                <div class="col-md-9">
                                    <input type="number"  placeholder="Stock Amount" class="form-control" name="stock_amount"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Image</label>
                                <div class="col-md-9">
                                    <input type="file" class="form-control" name="image"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Product Other Images</label>
                                <div class="col-md-9">
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
















{{--           <div class="col-md-12">--}}
{{--               <div class="card">--}}
{{--                   <div class="card-header">--}}
{{--                       Add Product From--}}
{{--                   </div>--}}
{{--                   <div class="card-body">--}}
{{--                       <form action="" method="post" enctype="multipart/form-data">--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3">Category Name</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <select name="category_id" class="form-control" id="">--}}
{{--                                       <option value="">-- select Product Category --</option>--}}
{{--                                       <option value="">-- Category Name --</option>--}}
{{--                                   </select>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Sub Category Name</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <select name="sub_category_id" class="form-control" id="">--}}
{{--                                       <option value="">-- select Product Sub Category --</option>--}}
{{--                                       <option value="">-- Sub Category Name --</option>--}}
{{--                                   </select>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Brand Name</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <select name="sub_category_id" class="form-control" id="">--}}
{{--                                       <option value="">-- select Product Brand --</option>--}}
{{--                                       <option value="">-- Brand Name --</option>--}}
{{--                                   </select>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Product Name</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="text" class="form-control" name="name"/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Product code</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="text" class="form-control" name="code"/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Short Description</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <textarea type="text" class="form-control" name="short_description"></textarea>--}}
{{--                           </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Long Description</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <textarea type="text" class="form-control" name="long_description"></textarea>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Product Price</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="number" class="form-control" name="regular_price"/>--}}
{{--                                   <input type="number" class="form-control" name="selling_price"/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> stock Amount</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="number" class="form-control" name="stock_amount"/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Product Image</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="file" class="form-control" name="image"/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"> Product Other Image</label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="file" class="form-control" name="other_image"/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                           <div class="row md-3">--}}
{{--                               <label class="col-md-3"></label>--}}
{{--                               <div class="col-md-9">--}}
{{--                                   <input type="submit" class="btn btn-danger" name=""/>--}}
{{--                               </div>--}}
{{--                           </div>--}}
{{--                       </form>--}}
{{--                   </div>--}}
{{--               </div>--}}
{{--           </div>--}}
    </div>
    </div>
@endsection
