<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                        <li><a href="{{ route('cart.show') }}"><i class="fa fa-user"></i> My Cart</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        @if(Session::get('customer_id'))
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="{{ route('customer.dashboard') }}"><span class="key">{{ Session::get('customer_name') }}</span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('customer.dashboard') }}">My Dashboard</a></li>
                                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logoutFormForm').submit()">Logout</a></li>
                                    <form action="{{ route('customer.logout') }}" method="POST" id="logoutFormForm">
                                        @csrf
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ route('customer.login') }}"><i class="fa fa-user"></i> My Account</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="{{ route('home') }}"><img src="{{ asset('frontEndAsset') }}/img/logo.png"></a></h1>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="{{ route('cart.show') }}">Cart - <span class="cart-amunt">@if(Session::get('order_total')) {{ Session::get('order_total') }} @else {{ 0 }} @endif</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">{{ count(Cart::getContent()) }}</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('shop') }}">Shop</a></li>
                    @foreach($categories as $category)
                        <li><a href="{{ route('shop.category', ['id' => $category->id]) }}">{{ $category->category_name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
