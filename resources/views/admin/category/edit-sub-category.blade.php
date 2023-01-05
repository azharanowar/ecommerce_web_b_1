@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-1">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light">Edit Sub Category Form</h3>
                        <p class="text-center text-success ">{{ session('message') }}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-sub-category', ['id' => $sub_category->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class=" mb-3 mb-md-0">
                                        <select class="form-control" name="category_id" >
                                            <option value="">Select A Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{$category->id == $sub_category->category_id ? 'selected' : ''}}>{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-3 mb-md-0">
                                        <input class="form-control" name="sub_category_name" value="{{$sub_category->sub_category_name}}" type="text" placeholder="Sub Category name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">Update Sub Category</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr/>
    <hr/>

@endsection

