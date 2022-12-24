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
                                    <td>{{ $category->status == 1 ? "Published" : "Unpublished" }}</td>
                                    <td>Action</td>
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
