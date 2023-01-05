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
                        <h3 class="text-center font-weight-light">Create Category</h3>
                        <p class="text-center text-success ">{{ session('message') }}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('sub-category') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class=" mb-3 mb-md-0">
                                        <select class="form-control" name="category_id" >
                                            <option value="">Select A Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" mb-3 mb-md-0">
                                        <input class="form-control" name="sub_category_name" type="text" placeholder="Sub Category name"/>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block">submit</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-1">
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>sl no</th>
                                <th>Category Name</th>
                                <th>Sub Category Name</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($subCategories as $subCategory)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $subCategory->category_name }}</td>
                                    <td>{{ $subCategory->sub_category_name }}</td>
                                    <td>{{ $subCategory->status == 1 ? 'active' : 'Inactive' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('sub-edit', ['id' => $subCategory->id]) }}" class="btn btn-primary btn-sm">edit</a>

                                        @if($subCategory->status == 1)
                                            <a href="{{ route('sub-status',['id'=>$subCategory->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                        @else
                                            <a href="{{ route('sub-status',['id'=>$subCategory->id]) }}" class="btn btn-success btn-sm">Active</a>
                                        @endif
                                        <form action="{{ route('sub-delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $subCategory->id }}" name="cat_id">
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('are you sure Delete this!!')">Delete</button>
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

