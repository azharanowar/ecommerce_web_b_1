@extends('frontEnd.master')
@section('title')
    Customer Dashboard
@endsection
@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Customer Dashboard</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item"><a href="">My Dashboard</a></li>
                                <li class="list-group-item"><a href="">My Profile</a></li>
                                <li class="list-group-item"><a href="">My Order</a></li>
                                <li class="list-group-item"><a href="">Change Password</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center">My Dashboard</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
