@extends('frontEnd.master')
@section('title')
    product Details
@endsection
@section('content')
    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="{{ route('home') }}">Home</a>
                            <a href="{{ route('shop.category', ['id' => $product->category_id]) }}">{{ $product->category->category_name }}</a>
                            <a href="{{ route('product-details', ['id' => $product->id]) }}">{{ $product->name }}</a>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="product-images">
                                    <div class="product-main-img img-fluid w-75">
                                        <img src="{{ asset($product->image) }}" class="img-fluid" style="max-width: 70%" alt="">
                                    </div>
                                    <div class="product-gallery">
                                        <img src="{{ asset($product->image) }}" alt="">
                                        @foreach($product->otherImages as $otherImage)
                                            <img src="{{ asset($otherImage->image) }}" alt="">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-inner">
                                    <h2 class="product-name">{{ $product->name }}</h2>
                                    <p class="text-muted">{{ $product->short_description }}</p>
                                    <div class="product-inner-price">
                                        <ins>{{ $product->selling_price }} Tk</ins> <del>{{ $product->regular_price }} Tk</del>
                                    </div>


                                    <form action="{{ route('cart.add', ['id' => $product->id]) }}" method="POST" class="cart">

                                        @csrf

                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <button class="add_to_cart_button" type="submit">Add to cart</button>
                                    </form>


                                    <div class="product-inner-category">
                                        <p>Category: <a href="{{ route('shop.category', ['id' => $product->category_id]) }}">{{ $product->category->category_name }}</a>. Brand: <a href="">{{ $product->brand->name }}</a>.</p>
                                    </div>
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                {!! $product->long_description !!}
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>
                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Latest Products</h2>
                            <div class="product-carousel">
                                @foreach($product->category->products as $product)
                                    <div class="single-product">
                                        <div class="product-f-image">
                                            <a href="{{ route('product-details', ['id' => $product->id]) }}"><img src="{{ asset($product->image) }}" alt="" class="img-fluid h-100 w-100"></a>
                                            <div class="product-hover">
                                                <a href="#" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                                <a href="{{ route('product-details', ['id' => $product->id]) }}" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                            </div>
                                        </div>
                                        <h2><a href="{{ route('product-details', ['id' => $product->id]) }}">{{ $product->name }}</a></h2>
                                        <div class="product-carousel-price">
                                            <ins>{{ $product->selling_price }} Tk</ins> <del>{{ $product->regular_price }} Tk</del>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
