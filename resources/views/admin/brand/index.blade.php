@extends('admin.master')
@section('title')
    Brand
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-1">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light">Create Brand</h3>
                        <p class="text-center text-success ">{{ session('message') }}</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class=" mb-3 mb-md-0">
                                        <input class="form-control" name="name" type="text" placeholder="Brand name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="">
                                        <input class="form-control" name="image" type="file"/>
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
                                <th>Brand Name</th>
                                <th>Image</th>
                                <th>status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $i=1 @endphp
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        <img src="{{ asset($brand->image) }}" alt="" style="width: 50px;height: 50px">
                                    </td>
                                    <td>{{ $brand->status == 1 ? 'active' : 'Inactive' }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('edit',['id'=>$brand->id]) }}" class="btn btn-primary btn-sm">edit</a>

                                        @if($brand->status == 1)
                                            <a href="{{ route('status',['id'=>$brand->id]) }}" class="btn btn-warning btn-sm">Inactive</a>
                                        @else
                                            <a href="{{ route('status',['id'=>$brand->id]) }}" class="btn btn-success btn-sm">Active</a>
                                        @endif
                                        <form action="{{ route('delete') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $brand->id }}" name="cat_id">
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
