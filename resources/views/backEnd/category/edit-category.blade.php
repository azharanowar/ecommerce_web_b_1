@extends('backEnd.master')

@section('title')
    Category
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-3">Create Category</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update-category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input class="form-control" id="categoryName" name="category_name" value="{{ $category->category_name }}" type="text" placeholder="Enter your category name" />
                                    <input class="form-control" id="categoryId" name="category_id" value="{{ $category->id }}" type="hidden"/>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" id="categoryImage" type="file" name="image" accept="image/*"/>
                                    <img src="{{ asset($category->image) }}" style="height: 100px; width: 100px">
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block py-2">Submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
