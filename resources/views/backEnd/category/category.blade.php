@extends('backEnd.master')

@section('title')
    Category
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-3">Create Category</h3></div>
                    <div class="card-body">
                        <form>
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
@endsection
