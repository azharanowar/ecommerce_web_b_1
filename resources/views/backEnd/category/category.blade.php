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
                        <h5 class="text-success text-center">
                            {{ session('message') }}
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('create-category') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <input class="form-control" id="categoryName" name="category_name" type="text" placeholder="Enter your category name" />
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control" id="categoryImage" type="file" name="image" accept="image/*"/>
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
    <div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow border-0 rounded-lg mt-5">
                    <h4 class="text-center font-weight-light my-3">All Categories</h4>
                    <h5 class="text-success text-center">
                        {{ session('allCategoriesMessage') }}
                    </h5>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>SL. N</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            @php $i = 1 @endphp
                            @foreach($categories as $category)
                                <tr valign="middle">
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td width="150"><img class="d-block mx-auto" src="{{ $category->image }}" style="height: 50px; width: 50px"></td>
                                    <td class="text-center">
                                        {{ $category->status == 1 ? "Active" : "Inactive" }}
                                    </td>
                                    <td>
                                        @if($category->status == 1)
                                            <a href="{{ route('change-status', ['id' => $category->id]) }}" class="btn btn-warning btn-sm my-1">Make Inactive</a>
                                        @endif
                                        @if($category->status == 0)
                                            <a href="{{ route('change-status', ['id' => $category->id]) }}" class="btn btn-success btn-sm my-1">Make Active</a>
                                        @endif

                                        <a href="{{ route('edit-category', ['id' => $category->id]) }}" class="btn btn-primary btn-sm my-1">Edit</a>

                                        <form action="{{ route('delete-category') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="category_id" value="{{ $category->id }}"/>
                                            <button type="submit" class="btn btn-danger btn-sm my-1">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
